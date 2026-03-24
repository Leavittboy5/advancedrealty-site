<?php
/*
Plugin Name:  Rent Manager Unit Availability
Plugin URI:   https://rentmanager.com
Description:  Custom-built unit availability plugin (Refactored & Stabilized)
Version:      1.2
Author:       Rent Manager 
Author URI:   https://rentmanager.com
*/

$dbid = get_field('co_code', 'options');
$unitTemplate = get_field('unit_temp', 'options');
$propertyTemplate = get_field('property_temp', 'options');
$date = date('Y-m-d');
$rmua_url = 'https://ua-api.rentmanager.com/get_ua_int_ua.php';
$rm_cache = true;
$locations = sanitize_text_field(get_field('rm_location', 'options'));

if(!$locations){
    $locations = "default";
}

//ACF Registration
require_once(plugin_dir_path(__FILE__) . 'inc/acf-registration.php');

function add_ua_styles() {
    $pluginURL = plugin_dir_url(__FILE__);
    wp_enqueue_style('listings-style', $pluginURL . 'css/listing.css');
    wp_enqueue_style('lightbox-style', $pluginURL . 'inc/lightbox/css/lightbox.css');
    wp_enqueue_script('lightbox-script', $pluginURL . 'inc/lightbox/js/lightbox.js', array('jquery'));
    wp_enqueue_script('filters', $pluginURL . 'inc/js/filters.js', array('jquery'));
}
add_action('wp_enqueue_scripts', 'add_ua_styles');

function rentmanager_generate_transient_name($uaurl, $api_ua_options, $dbid, $locations) {
    return 'rentmanager_ua_' . md5(serialize([$uaurl, $api_ua_options, $dbid, $locations]));
}

function rentmanager_get_ua($uaurl, $api_ua_options, $dbid, $locations = 'default') {   
    $rm_cached_data = false;
    global $rm_cache;

    if ($rm_cache) {
        $transient_name = rentmanager_generate_transient_name($uaurl, $api_ua_options, $dbid, $locations);
        $rm_cached_data = get_transient($transient_name);
        if ($rm_cached_data !== false) {
            return $rm_cached_data;
         }
    }

    if (false === $rm_cached_data) {
        $api_error = "";
        $fullList = array(); 
        global $rmua_url;
        $splitLocations = explode(',', $locations); 

        foreach ($splitLocations as $location) {
            $api_ua_options['LocationName'] = $location; 
            $data = array('dbid' => $dbid, 'api_ua_options' => $api_ua_options, 'url' => $uaurl);

            $options = array(
                'http' => array(
                    'method' => 'POST',
                    'header' => 'Content-type: application/x-www-form-urlencoded',
                    'content' => http_build_query($data),
                ),
            );

            $context = stream_context_create($options); 
            $response = file_get_contents($rmua_url, false, $context);
            $response = trim($response); 
            $response = json_decode($response); 

            if (is_array($response)) {
                foreach ($response as $entity) {
                    $entity->location = $location;
                }
                $fullList = array_merge($fullList, $response);
            } else if(is_object($response) && isset($response->Exception)){
                $api_error .= esc_html($response->DeveloperMessage);
                continue;
            }else {
                if(empty($fullList)){
                    $fullList = $response;
                } else {
                    $fullList[] = $response;
                }
            }
        }

        $response = $fullList; 
        
        if(empty($response) && $api_error){
            $response = "API Error: ". $api_error. ". ";
        }

        if ($rm_cache && (is_array($response)) && (sizeof($response) > 0)) {
            // Updated from 3600 (1 hour) to 600 (10 minutes)
            set_transient($transient_name, $response, 600);
        }
    }
    return $response;
}

function flush_rentmanager_cache() {
    global $wpdb;
    global $rm_cache;
    if (!$rm_cache) {
        return false; 
    }
    
    // 1. Clear Rent Manager data from the Database
    $wpdb->query(
        "DELETE FROM $wpdb->options WHERE option_name LIKE '%\_transient\_rentmanager\_ua\_%'"
    );

    // 2. Clear Server Object Cache
    if ( function_exists( 'wp_cache_flush' ) ) {
        wp_cache_flush();
    }

    // 3. Specifically Clear LiteSpeed Cache
    if ( class_exists( 'LiteSpeed_Cache_API' ) ) {
        LiteSpeed_Cache_API::purge_all();
    }

    return true;
}

add_action('admin_bar_menu', 'add_item', 100);
function add_item( $admin_bar ){
    $admin_bar->add_menu( array(  
        'id' => 'refresh_cached_ua',
        'title' => 'Refresh Cached UA',
        'href' => '#',
        'meta' => array(
            'class' => 'refresh-cached',
            'title' => 'Refresh Cached UA',
            'onclick' => 'refreshCachedUA(); return false;', 
        ),
    ));
}

add_action('wp_enqueue_scripts', 'enqueue_admin_scripts');
add_action('admin_enqueue_scripts', 'enqueue_admin_scripts');
function enqueue_admin_scripts() {
    wp_enqueue_script('refresh-cache-script', plugin_dir_url(__FILE__) . 'inc/js/refresh-cache.js', array('jquery'), null, true );
    wp_localize_script('refresh-cache-script', 'refreshCacheAjax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('refresh_cache_nonce')
    ));
}

add_action('wp_ajax_refresh_cached_ua', 'handle_refresh_cached_ua');
function handle_refresh_cached_ua() {
    check_ajax_referer('refresh_cache_nonce', 'nonce');
    $result = flush_rentmanager_cache();
    if ($result) {
        wp_send_json_success(array('message' => 'Cache cleared successfully.'));
    } else {
        wp_send_json_error(array('message' => 'Failed to clear the cache.'));
    }
}


// =====================================================================
// SHORTCODES & DATA FETCHING (Refactored to prevent Fatal Errors)
// =====================================================================

global $unit_detail_data;
global $prop_detail_data;

// 1. Fetch Data on Init (Does NOT output anything, only builds objects)
function rentmanager_fetch_detail_data() {
    global $date, $dbid, $unitTemplate, $propertyTemplate, $locations;
    global $unit_detail_data, $prop_detail_data;

    // Unit Detail Fetch
    if (isset($_GET['uid'])) {
        $uid = sanitize_text_field($_GET['uid']);
        $location = isset($_GET['location']) ? sanitize_text_field($_GET['location']) : $locations;
        
        $api_ua_options = array(
            "UnitFilters" => [],
            "AsOfDate" => $date,
            "ProfileName" => $unitTemplate,
            "MetaTag" => null
        );
        $rmua_url = 'https://' . $dbid . '.api.rentmanager.com/Units/' . $uid . '/Availability';
        $response = rentmanager_get_ua($rmua_url, $api_ua_options, $dbid, $location);
        
        if (!is_string($response) && !empty($response)) {
            include_once(plugin_dir_path(__FILE__) . 'inc/build/build_property.php');
            include_once(plugin_dir_path(__FILE__) . 'inc/build/build_unit.php');
            include_once(plugin_dir_path(__FILE__) . '/inc/acf_listing_options.php');
            $unit_detail_data = new Unit($response);
        }
    }

    // Property Detail Fetch
    if (isset($_GET['pid'])) {
        $pid = sanitize_text_field($_GET['pid']);
        $location = isset($_GET['location']) ? sanitize_text_field($_GET['location']) : $locations;

        $api_ua_options = array(
            "PropertyFilters" => [],
            "AsOfDate" => $date,
            "ProfileName" => $propertyTemplate,
            "MetaTag" => null
        );
        $rmua_url = 'https://' . $dbid . '.api.rentmanager.com/Properties/' . $pid . '/Availability';
        $response = rentmanager_get_ua($rmua_url, $api_ua_options, $dbid, $location);

        if (!is_string($response) && !empty($response)) {
            include_once(plugin_dir_path(__FILE__) . 'inc/build/build_property.php');
            include_once(plugin_dir_path(__FILE__) . 'inc/build/build_unit.php');
            include_once(plugin_dir_path(__FILE__) . '/inc/acf_listing_options.php');
            $prop_detail_data = new Property($response);
        }
    }
}
add_action('init', 'rentmanager_fetch_detail_data', 5);

// 2. Unit Detail Shortcode
function rentmanager_unitdetail_shortcode($atts) {
    global $unit_detail_data;
    if (!$unit_detail_data) {
        return '<div style="padding:40px; text-align:center; background:#f9fafb; border-radius:12px;"><h3 style="color:#374151;">Listing details could not be loaded.</h3><p style="color:#6b7280;">Please return to the main listings page and select a valid unit.</p></div>';
    }
    
    $unit = $unit_detail_data;
    ob_start();
    include_once(plugin_dir_path(__FILE__) . '/inc/template-functions.php');
    include(plugin_dir_path(__FILE__) . '/templates/unit_detail.php');
    return ob_get_clean();
}
add_shortcode('rm_unitdetail', 'rentmanager_unitdetail_shortcode');

// 3. Property Detail Shortcode
function rentmanager_propertydetail_shortcode($atts) {
    global $prop_detail_data;
    if (!$prop_detail_data) {
        return '<div style="padding:40px; text-align:center; background:#f9fafb; border-radius:12px;"><h3 style="color:#374151;">Property details could not be loaded.</h3><p style="color:#6b7280;">Please return to the main listings page and select a valid property.</p></div>';
    }
    
    $property = $prop_detail_data;
    ob_start();
    include_once(plugin_dir_path(__FILE__) . '/inc/template-functions.php');
    include(plugin_dir_path(__FILE__) . '/templates/property_detail.php');
    return ob_get_clean();
}
add_shortcode('rm_propertydetail', 'rentmanager_propertydetail_shortcode');


// 4. Dynamic Page Title Filters
function rm_ua_detail_title($title, $post_id = null) {
    global $unit_detail_data, $prop_detail_data;
    $post = get_post($post_id);
    
    if ($post) {
        if ($unit_detail_data && has_shortcode($post->post_content, 'rm_unitdetail')) {
            $uName = !empty($unit_detail_data->name) ? $unit_detail_data->name : (!empty($unit_detail_data->unitName) ? $unit_detail_data->unitName : null);
            return $uName ? $uName : $title;
        }
        if ($prop_detail_data && has_shortcode($post->post_content, 'rm_propertydetail')) {
            $pName = !empty($prop_detail_data->name) ? $prop_detail_data->name : (!empty($prop_detail_data->propertyName) ? $prop_detail_data->propertyName : null);
            return $pName ? $pName : $title;
        }
    }
    return $title;
}
add_filter('the_title', 'rm_ua_detail_title', 10, 2);

function wpnav_remove_title_filter_nav_menu($nav_menu, $args) {
    remove_filter('the_title', 'rm_ua_detail_title', 10, 2);
    return $nav_menu;
}
add_filter('pre_wp_nav_menu', 'wpnav_remove_title_filter_nav_menu', 10, 2);

function wpnav_add_title_filter_non_menu($items, $args) {
    add_filter('the_title', 'rm_ua_detail_title', 10, 2);
    return $items;
}
add_filter('wp_nav_menu_items', 'wpnav_add_title_filter_non_menu', 10, 2);


// =====================================================================
// LISTING SHORTCODES
// =====================================================================

// Property Listing
function rentmanager_propertylisting($atts) {
    ob_start();
    $default = array('listtype' => 'all');
    $a = shortcode_atts($default, $atts);
    $listType = $a['listtype'];

    global $date, $dbid, $propertyTemplate, $locations;

    $api_ua_options = array(
        "PropertyFilters" => [],
        "AsOfDate" => $date,
        "ProfileName" => $propertyTemplate,
        "MetaTag" => null
    );

    $rmua_url = 'https://' . $dbid . '.api.rentmanager.com/Properties/Availability';
    $response = rentmanager_get_ua($rmua_url, $api_ua_options, $dbid, $locations);
    
    include_once('inc/build/build_property.php');
    include_once('inc/acf_listing_options.php');
    $propertyListObject = new PropertyList();

    if(!is_string($response)){
        foreach ($response as $rm_property) {
            $propertyListObject->addProperty(new Property($rm_property));
        }
        $propertyList = $propertyListObject->properties;
    } else {
        $propertyList = array();
    }

    include_once(plugin_dir_path(__FILE__) . '/inc/template-functions.php');
    if ($listType == "featured") {
        include(plugin_dir_path(__FILE__) . '/templates/featured_list.php');
    } else {
        include(plugin_dir_path(__FILE__) . '/templates/property_list.php');
    }

    return ob_get_clean();
}
add_shortcode('rm_propertyavailability', 'rentmanager_propertylisting');


// Unit Listing
function rentmanager_unitlisting($atts) {
    // 1. Check if this is an ESI request or a standard page load
    $a = shortcode_atts(array('is_esi' => false), $atts);
    
    // 2. If LiteSpeed ESI is active, and we are NOT already inside the ESI hole, return the hole wrapper
    if ( !$a['is_esi'] && class_exists( 'LiteSpeed_Cache_API' ) && LiteSpeed_Cache_API::control( 'esi' ) ) {
        return LiteSpeed_Cache_API::esi_url( 'rmua_listings_fragment', 'RMUA Listings' );
    }

    // 3. Render the actual content (either for the ESI hole, or a standard un-cached page load)
    ob_start();
    global $date, $dbid, $unitTemplate, $locations;

    $api_ua_options = array(
        "UnitFilters" => [],
        "AsOfDate" => $date,
        "ProfileName" => $unitTemplate,
        "MetaTag" => null
    );

    $rmua_url = 'https://' . $dbid . '.api.rentmanager.com/Units/Availability';
    $response = rentmanager_get_ua($rmua_url, $api_ua_options, $dbid, $locations);

    include_once('inc/build/build_property.php');
    include_once('inc/build/build_unit.php');
    include_once('inc/acf_listing_options.php');
    $unitListObject = new UnitList();

    if(!is_string($response)) {
        foreach ($response as $rm_unit) {
            $unitListObject->addUnit(new Unit($rm_unit));
        }
        $unitList = $unitListObject->units;
    } else {
        $unitList = array();
    }

    include_once(plugin_dir_path(__FILE__) . '/inc/template-functions.php');
    include(plugin_dir_path(__FILE__). '/templates/search_form.php');
    include(plugin_dir_path(__FILE__) . '/templates/unit_list.php');

    return ob_get_clean();
}
add_shortcode('rm_unitavailability', 'rentmanager_unitlisting');


// Unit List on Property           
function rentmanager_unit_list_on_prop($atts) {
    $default = array('propertyidlist' => '5');
    $a = shortcode_atts($default, $atts);
    $propertyIDs = explode(',', $a['propertyidlist']);
    $propertyIDs = array_map(function ($value) { return "'" . trim($value) . "'"; }, $propertyIDs);
    $propertyIDsString = '[' . implode(', ', $propertyIDs) . ']';

    global $date, $dbid, $unitTemplate, $locations;
    $location = isset($_GET['location']) ? sanitize_text_field($_GET['location']) : $locations;

    $api_ua_options = array(
        'UnitFilters' => [
            array(
                'Field' => 'PropertyID',
                'FilterOperation' => 'In',
                'Values' => eval("return $propertyIDsString;")
            )
        ],
        'AsOfDate' => $date,
        'ProfileName' => $unitTemplate,
        'MetaTag' => null
    );
    
    $rmua_url = 'https://' . $dbid . '.api.rentmanager.com/Units/Availability';
    $response = rentmanager_get_ua($rmua_url, $api_ua_options, $dbid, $location);

    $PropUnitList = "";
    $propUnitListObject = new UnitList();
    if ($response && !is_string($response)) {
        foreach ($response as $rm_unit) {
            $propUnitListObject->addUnit(new Unit($rm_unit));
        }
        $PropUnitList = $propUnitListObject->units;
    }
    
    ob_start();
    include_once(plugin_dir_path(__FILE__) . '/inc/template-functions.php');
    include(plugin_dir_path(__FILE__) . '/templates/property_unit_list.php');
    return ob_get_clean();
}
add_shortcode('rm_unitlistproperty', 'rentmanager_unit_list_on_prop');


// Map 
function get_rm_map() {
    wp_enqueue_script('rm_map_js');
    wp_localize_script('rm_map_js', 'php_vars', array('plugindir' => plugin_dir_url(__FILE__)));
}
add_action('get_map', 'get_rm_map');

// =====================================================================
// LITESPEED ESI BLOCK INTEGRATION
// =====================================================================

// Register the ESI block with LiteSpeed
add_action( 'litespeed_esi_load-rmua_listings_fragment', 'rmua_render_listings_esi' );

function rmua_render_listings_esi() {
    // This function acts as a wrapper to render the content live inside the cache hole.
    // We pass 'is_esi' => true so the shortcode knows to actually render the content 
    // instead of returning another ESI tag.
    echo rentmanager_unitlisting(array('is_esi' => true)); 
}

?>
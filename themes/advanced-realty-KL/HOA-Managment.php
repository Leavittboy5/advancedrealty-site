<?php
/* Template Name: Advanced Realty - HOA Management */

if ( isset( $_GET['hoa_url'] ) && ! empty( $_GET['hoa_url'] ) ) {
    $redirect_url = esc_url_raw( $_GET['hoa_url'] );
    wp_redirect( $redirect_url );
    exit;
}
get_header(); 
?>

<style>
    .contact-form-wrapper .frm_style_formidable-style.with_frm_style .frm_submit button { background-color: #366366 !important; }
    .contact-form-wrapper .frm_style_formidable-style.with_frm_style .frm_submit button:hover { background-color: #2b4f51 !important; }
</style>

<section class="relative flex items-center justify-center text-center px-4 min-h-[400px]">
    <img src="https://advancedrealty.com/wp-content/uploads/2026/02/HOAbg.jpg" 
         alt="HOA Management Hero" 
         fetchpriority="high" 
         decoding="sync"
         class="absolute inset-0 w-full h-full object-cover z-0">
    <div class="absolute inset-0 bg-gradient-to-b from-black/30 to-black/50 z-0"></div>

    <div class="relative max-w-4xl z-10">
        <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-4 drop-shadow-lg">HOA Management: Building Better Communities in Utah</h1>
        <p class="text-xl md:text-2xl text-gray-100 mb-8 font-medium drop-shadow-md">Professional governance and personal support for HOAs right here in St. George and throughout Southern Utah.</p>
    </div>
</section>

<section class="pt-12 pb-32 bg-white border-b border-gray-200">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-2xl font-bold text-gray-900 mb-2">Already a Resident? Find Your Community Website</h2>
        <p class="text-gray-600 mb-8">Select your association below to access your dedicated community portal, governing documents, and latest news.</p>
        
        <form method="GET" action="" target="_blank" class="flex flex-col sm:flex-row justify-center items-center gap-4 max-w-lg mx-auto w-full">
            <div class="relative w-full">
                <div class="pointer-events-none absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400"><i data-lucide="home" class="w-5 h-5"></i></div>
                <select name="hoa_url" required class="block w-full pl-10 pr-10 py-3 text-base border-gray-300 focus:outline-none focus:ring-2 focus:ring-adv-teal focus:border-adv-teal sm:text-sm rounded-lg shadow-sm appearance-none bg-gray-50 border text-gray-700 font-medium">
                    <option value="" disabled selected>Select your Community...</option>
                    <?php
                    $locations = get_nav_menu_locations();
                    if ( isset( $locations['hoa_menu'] ) && $locations['hoa_menu'] != 0 ) {
                        $menu_items = wp_get_nav_menu_items( $locations['hoa_menu'] );
                        if ( $menu_items ) {
                            foreach ( $menu_items as $item ) { echo '<option value="' . esc_url($item->url) . '">' . esc_html($item->title) . '</option>'; }
                        } else { echo '<option value="" disabled>No communities in menu.</option>'; }
                    } else { echo '<option value="" disabled>Setup: Assign a menu to "HOA Communities Dropdown" in Appearance > Menus.</option>'; }
                    ?>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-500"><svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></div>
            </div>
            <button type="submit" class="w-full sm:w-auto bg-gray-900 hover:bg-gray-800 text-white font-bold py-3 px-6 rounded-lg shadow-lg hover:shadow-xl transition duration-150 whitespace-nowrap flex items-center justify-center">Go to Page <i data-lucide="external-link" class="w-4 h-4 ml-2"></i></button>
        </form>
    </div>
</section>

<section class="bg-gray-900 border-y border-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 flex flex-col md:flex-row items-center justify-between">
        <div class="mb-6 md:mb-0 flex items-center text-left w-full md:w-auto">
            <div class="bg-gray-800 p-4 rounded-full mr-5 border border-gray-700 hidden sm:block"><i data-lucide="file-check-2" class="w-8 h-8 text-adv-teal"></i></div>
            <div>
                <h2 class="text-2xl font-bold text-white mb-1">Lender & Mortgage Questionnaires</h2>
                <p class="text-gray-400">Need HOA forms or certifications filled out for a loan approval?</p>
            </div>
        </div>
        <a href="https://advr.twa.rentmanager.com/ApplyNow?propertyID=837&locations=1" target="_blank" class="w-full md:w-auto bg-adv-teal hover:bg-adv-teal-dark text-white font-bold py-3 px-8 rounded-xl shadow-lg transition duration-300 transform hover:scale-105 whitespace-nowrap flex items-center justify-center">Document Request <i data-lucide="arrow-right" class="w-5 h-5 ml-2"></i></a>
    </div>
</section>

<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-2 gap-12">
        <div>
            <h2 class="text-3xl font-extrabold text-gray-900 mb-6">Support for Your Board</h2>
            <div class="space-y-6">
                <div class="flex items-start">
                    <div class="flex-shrink-0 p-3 bg-white rounded-lg shadow-sm border border-gray-100"><i data-lucide="scale" class="w-6 h-6 text-adv-teal"></i></div>
                    <div class="ml-4">
                        <h3 class="text-xl font-bold text-gray-900">CCR Enforcement</h3>
                        <p class="text-gray-600 mt-1">Consistent and fair enforcement of community rules and regulations to protect property values.</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="flex-shrink-0 p-3 bg-white rounded-lg shadow-sm border border-gray-100"><i data-lucide="calculator" class="w-6 h-6 text-adv-teal"></i></div>
                    <div class="ml-4">
                        <h3 class="text-xl font-bold text-gray-900">Financial Management</h3>
                        <p class="text-gray-600 mt-1">Dues collection, budget preparation, reserve planning, and transparent bookkeeping.</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="flex-shrink-0 p-3 bg-white rounded-lg shadow-sm border border-gray-100"><i data-lucide="calendar" class="w-6 h-6 text-adv-teal"></i></div>
                    <div class="ml-4">
                        <h3 class="text-xl font-bold text-gray-900">Meeting Facilitation</h3>
                        <p class="text-gray-600 mt-1">We organize Annual Meetings, Board Meetings, and handle all association correspondence.</p>
                    </div>
                </div>
                <?php
/**
 * HOA Page Banner - Promoting Residential Management
 */
?>
<div class="adv-promo-banner bg-slate-900 rounded-2xl overflow-hidden shadow-xl my-12 flex flex-col md:flex-row items-center border-l-8 border-adv-teal">
    <div class="p-8 md:p-12 flex-grow">
        <span class="text-adv-teal font-bold uppercase tracking-widest text-sm">Need Help With Your Rental?</span>
        <h3 class="text-3xl md:text-4xl font-extrabold text-white mt-2 mb-4">Professional Residential Management</h3>
        <p class="text-gray-300 text-lg max-w-xl">Transitioning from a Board Member to a Landlord? We provide end-to-end management for individual homes and multiplexes with the same care we give your association.</p>
        <div class="mt-8">
            <a href="/residential-management" class="inline-block bg-adv-teal hover:bg-white hover:text-adv-teal text-white font-bold py-4 px-8 rounded-lg transition duration-300 shadow-lg">View Residential Services</a>
        </div>
    </div>
    <div class="hidden lg:block w-1/3 bg-adv-teal/10 p-12 text-center">
        <svg class="w-32 h-32 text-adv-teal mx-auto opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
    </div>
</div>
            </div>
        </div>

        <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-200">
            <h3 class="text-2xl font-bold text-gray-900 mb-2">Request an HOA Proposal</h3>
            <p class="text-gray-600 mb-6">Are you a Board Member? Let's discuss your community's needs.</p>
            
            <div class="contact-form-wrapper">
                <?php echo do_shortcode('[formidable id="7"]'); ?>
            </div>
            
            <div class="mt-6 p-4 bg-white border border-gray-200 rounded-lg shadow-sm text-xs text-gray-600 leading-relaxed">
                By providing your phone number, you agree to receive text messages from <strong>Trent W. Leavitt P.C., dba Advanced Realty</strong> for the purpose of communicating community news, urgent notifications, and events. Reply “STOP” to opt-out anytime or reply “HELP” for more information. Message and data rates may apply. Message frequency will vary. For more information, please read our <a href="https://advancedrealty.com/privacy-policy" class="text-teal-600 underline hover:text-teal-800" target="_blank" rel="noopener noreferrer">Privacy Policy</a> and <a href="https://advancedrealty.com/terms-and-conditions" class="text-teal-600 underline hover:text-teal-800" target="_blank" rel="noopener noreferrer">Terms and Conditions</a>.
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
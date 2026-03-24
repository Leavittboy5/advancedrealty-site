<?php
/* Template Name: Advanced Realty - Rental Details */
get_header(); 
?>

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 min-h-screen">
    
    <?php 
        /* * Output the content of the page. 
         * Make sure the WordPress page using this template contains the Rent Manager detail shortcode 
         * (or if the plugin automatically hijacks the content based on the ?uid parameter, this will output it).
         */
        if ( have_posts() ) : 
            while ( have_posts() ) : the_post();
                the_content();
            endwhile; 
        endif; 
    ?>

</main>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    });
</script>

<?php get_footer(); ?>
<?php
/**
 * Template Name: Single Agent
 */
get_header(); ?>

<main class="container mx-auto px-4 py-16">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
        
        // Pull data using the same meta keys used on the Real Estate page
        $agent_role  = get_post_meta(get_the_ID(), 'role', true);
        $agent_phone = get_post_meta(get_the_ID(), 'phone', true);
        $agent_email = get_post_meta(get_the_ID(), 'email', true);
        
        // FORMAT THE PHONE NUMBER
        // 1. Strip everything except the numbers
        $clean_phone = preg_replace('/[^0-9]/', '', $agent_phone);
        $formatted_phone = $agent_phone; // Fallback just in case
        
        // 2. If it is exactly 10 digits, format it as (xxx) xxx-xxxx
        if (strlen($clean_phone) === 10) {
            $formatted_phone = preg_replace('/(\d{3})(\d{3})(\d{4})/', '($1) $2-$3', $clean_phone);
        } elseif (strlen($clean_phone) === 11 && substr($clean_phone, 0, 1) === '1') {
            // Also handles it if you accidentally type a '1' in front of the number
            $formatted_phone = preg_replace('/1(\d{3})(\d{3})(\d{4})/', '($1) $2-$3', $clean_phone);
        }

        // Pull the Agent Photo
        $agent_photo = get_the_post_thumbnail_url(get_the_ID(), 'large');
        if (!$agent_photo) {
            $encoded_name = urlencode(get_the_title());
            $agent_photo = "https://placehold.co/400x500/00A699/ffffff?text=" . $encoded_name;
        }
    ?>
        
        <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-xl border border-gray-100 p-8 md:p-12">
            
            <div class="flex flex-col md:flex-row gap-8 items-center md:items-start mb-10">
                
                <div class="flex-shrink-0">
                    <img src="<?php echo esc_url($agent_photo); ?>" alt="<?php the_title(); ?>" class="w-48 h-64 md:w-56 md:h-72 object-cover rounded-xl shadow-md border-4 border-white">
                </div>

                <div class="flex-grow text-center md:text-left pt-2">
                    <h1 class="text-4xl font-extrabold text-gray-900 mb-2"><?php the_title(); ?></h1>
                    
                    <p class="text-adv-teal font-bold text-xl mb-8 uppercase tracking-wide">
                        <?php echo esc_html($agent_role ?: 'Realtor®'); ?>
                    </p>

                    <div class="flex flex-wrap justify-center md:justify-start gap-4">
                        <?php if( $agent_phone ): ?>
                            <a href="tel:<?php echo esc_attr($clean_phone); ?>" class="flex items-center gap-2 bg-gray-900 hover:bg-adv-teal text-white font-bold py-3 px-6 rounded-xl transition duration-300 shadow-sm">
                                <i data-lucide="phone" class="w-5 h-5"></i>
                                <?php echo esc_html($formatted_phone); ?>
                            </a>
                        <?php endif; ?>
                        
                        <?php if( $agent_email ): ?>
                            <a href="mailto:<?php echo esc_attr($agent_email); ?>" class="flex items-center gap-2 bg-adv-teal hover:bg-adv-teal-dark text-white font-bold py-3 px-6 rounded-xl transition duration-300 shadow-sm">
                                <i data-lucide="mail" class="w-5 h-5"></i>
                                Email <?php $first_name = explode(' ', get_the_title())[0]; echo esc_html($first_name); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>

            </div>

            <div class="border-t border-gray-100 pt-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">About <?php the_title(); ?></h2>
                
                <div class="text-gray-600 leading-relaxed text-lg [&>p]:mb-6">
                    <?php 
                        $content = get_the_content(); 
                        if (!empty($content)) {
                            the_content();
                        } else {
                            echo "<p>Reach out to " . esc_html(get_the_title()) . " today to discuss your real estate goals.</p>";
                        }
                    ?>
                </div>
            </div>
            
        </div>

    <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>
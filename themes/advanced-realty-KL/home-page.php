<?php
/* Template Name: Advanced Realty - Home */
get_header(); 
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

<section class="relative w-full h-[500px] lg:h-[650px] bg-gray-900 border-b-8 border-adv-teal">
    <div class="swiper myHeroSwiper w-full h-full">
        <div class="swiper-wrapper">
            
            <?php 
            // ----------------------------------------------------------------------
            // 1. ACF DYNAMIC SLIDES
            // This checks if you have created the 'hero_slider' repeater field in ACF
            // ----------------------------------------------------------------------
            if ( function_exists('have_rows') && have_rows('hero_slider') ) : 
                
                while ( have_rows('hero_slider') ) : the_row(); 
                    $bg_image = get_sub_field('background_image'); // Set to return Image URL
                    $headline = get_sub_field('headline');
                    $subheadline = get_sub_field('subheadline');
                    $button_text = get_sub_field('button_text');
                    $button_link = get_sub_field('button_link');
            ?>
                <div class="swiper-slide relative w-full h-full">
                    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('<?php echo esc_url($bg_image); ?>');"></div>
                    <div class="absolute inset-0 bg-gradient-to-b from-black/50 to-black/80 z-0"></div>
                    
                    <div class="relative z-10 flex flex-col items-center justify-center w-full h-full px-4 sm:px-6 lg:px-8">
                        <div class="max-w-4xl mx-auto text-center">
                            <h2 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight mb-4 drop-shadow-lg text-white">
                                <?php echo esc_html($headline); ?>
                            </h2>
                            <p class="text-lg sm:text-xl lg:text-2xl font-medium mb-8 opacity-95 drop-shadow-md text-gray-200">
                                <?php echo esc_html($subheadline); ?>
                            </p>
                            <?php if( $button_text && $button_link ): ?>
                                <a href="<?php echo esc_url($button_link); ?>" class="bg-adv-gold hover:bg-adv-gold-dark text-white font-bold text-lg py-3 px-10 rounded-xl shadow-2xl transition duration-300 transform hover:scale-105 inline-block border-2 border-adv-gold hover:border-white">
                                    <?php echo esc_html($button_text); ?> →
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php 
                endwhile; 

            // ----------------------------------------------------------------------
            // 2. STATIC HTML FALLBACK SLIDES
            // These will show until you add content into the ACF fields in the dashboard
            // ----------------------------------------------------------------------
            else : 
            ?>
                <div class="swiper-slide relative w-full h-full">
                    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://advancedrealty.com/wp-content/uploads/2026/02/R6KL1685-HDR-scaled-1.jpg');"></div>
                    <div class="absolute inset-0 bg-gradient-to-b from-black/50 to-black/80 z-0"></div>
                    
                    <div class="relative z-10 flex flex-col items-center justify-center w-full h-full px-4 sm:px-6 lg:px-8">
                        <div class="max-w-4xl mx-auto text-center">
                            <h2 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight mb-4 drop-shadow-lg text-white">Buy & Sell Real Estate</h2>
                            <p class="text-lg sm:text-xl lg:text-2xl font-medium mb-8 opacity-95 drop-shadow-md text-gray-200">Connect with our licensed brokerage team for buying, selling, and investment consultation.</p>
                            <a href="<?php echo home_url('/real-estate'); ?>" class="bg-adv-gold hover:bg-adv-gold-dark text-white font-bold text-lg py-3 px-10 rounded-xl shadow-2xl transition duration-300 transform hover:scale-105 inline-block border-2 border-adv-gold hover:border-white">
                                View Listings →
                            </a>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide relative w-full h-full">
                    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://advancedrealty.com/wp-content/uploads/2026/02/R6KL6998-Pano-scaled.jpg');"></div>
                    <div class="absolute inset-0 bg-gradient-to-b from-black/50 to-black/80 z-0"></div>
                    
                    <div class="relative z-10 flex flex-col items-center justify-center w-full h-full px-4 sm:px-6 lg:px-8">
                        <div class="max-w-4xl mx-auto text-center">
                            <h2 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight mb-4 drop-shadow-lg text-white">Looking for a Rental?</h2>
                            <p class="text-lg sm:text-xl lg:text-2xl font-medium mb-8 opacity-95 drop-shadow-md text-gray-200">View our current availability of houses, condos, and apartments. Apply online easily.</p>
                            <a href="https://advancedrealty.com/rental-listings/" class="bg-adv-gold hover:bg-adv-gold-dark text-white font-bold text-lg py-3 px-10 rounded-xl shadow-2xl transition duration-300 transform hover:scale-105 inline-block border-2 border-adv-gold hover:border-white">
                                Search Rentals →
                            </a>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide relative w-full h-full">
                    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://advancedrealty.com/wp-content/uploads/2023/09/Advanced-Realty-Office-e1761926141250.jpg');"></div>
                    <div class="absolute inset-0 bg-gradient-to-b from-black/50 to-black/80 z-0"></div>
                    
                    <div class="relative z-10 flex flex-col items-center justify-center w-full h-full px-4 sm:px-6 lg:px-8">
                        <div class="max-w-4xl mx-auto text-center">
                            <h2 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight mb-4 drop-shadow-lg text-white">Residential Management</h2>
                            <p class="text-lg sm:text-xl lg:text-2xl font-medium mb-8 opacity-95 drop-shadow-md text-gray-200">Maximize returns on your investment property with our comprehensive management service.</p>
                            <a href="<?php echo home_url('/residential-management'); ?>" class="bg-adv-gold hover:bg-adv-gold-dark text-white font-bold text-lg py-3 px-10 rounded-xl shadow-2xl transition duration-300 transform hover:scale-105 inline-block border-2 border-adv-gold hover:border-white">
                                Get a Quote →
                            </a>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide relative w-full h-full">
                    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://advancedrealty.com/wp-content/uploads/2026/02/HOAbg-1.jpg');"></div>
                    <div class="absolute inset-0 bg-gradient-to-b from-black/50 to-black/80 z-0"></div>
                    
                    <div class="relative z-10 flex flex-col items-center justify-center w-full h-full px-4 sm:px-6 lg:px-8">
                        <div class="max-w-4xl mx-auto text-center">
                            <h2 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight mb-4 drop-shadow-lg text-white">Expert HOA Management</h2>
                            <p class="text-lg sm:text-xl lg:text-2xl font-medium mb-8 opacity-95 drop-shadow-md text-gray-200">Trusted administrative, financial, and maintenance management for community associations.</p>
                            <a href="<?php echo home_url('/hoa-management'); ?>" class="bg-adv-gold hover:bg-adv-gold-dark text-white font-bold text-lg py-3 px-10 rounded-xl shadow-2xl transition duration-300 transform hover:scale-105 inline-block border-2 border-adv-gold hover:border-white">
                                Inquire Now →
                            </a>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide relative w-full h-full">
                    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://advancedrealty.com/wp-content/uploads/2022/07/20220509202832632862000000-o.jpg');"></div>
                    <div class="absolute inset-0 bg-gradient-to-b from-black/50 to-black/80 z-0"></div>
                    
                    <div class="relative z-10 flex flex-col items-center justify-center w-full h-full px-4 sm:px-6 lg:px-8">
                        <div class="max-w-4xl mx-auto text-center">
                            <h2 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight mb-4 drop-shadow-lg text-white">Commercial Management</h2>
                            <p class="text-lg sm:text-xl lg:text-2xl font-medium mb-8 opacity-95 drop-shadow-md text-gray-200">Specialized leasing, accounting, and management for office, retail, and industrial properties.</p>
                            <a href="<?php echo home_url('/commercial-management'); ?>" class="bg-adv-gold hover:bg-adv-gold-dark text-white font-bold text-lg py-3 px-10 rounded-xl shadow-2xl transition duration-300 transform hover:scale-105 inline-block border-2 border-adv-gold hover:border-white">
                                View Services →
                            </a>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide relative w-full h-full">
                    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://classiccommercial.stgeorgestorage.com/wp-content/uploads/sites/3/2026/03/20260325_091604-scaled.jpg');"></div>
                    <div class="absolute inset-0 bg-gradient-to-b from-black/50 to-black/80 z-0"></div>
                    
                    <div class="relative z-10 flex flex-col items-center justify-center w-full h-full px-4 sm:px-6 lg:px-8">
                        <div class="max-w-4xl mx-auto text-center">
                            <h2 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight mb-4 drop-shadow-lg text-white">Dedicated Storage Facilities</h2>
                            <p class="text-lg sm:text-xl lg:text-2xl font-medium mb-8 opacity-95 drop-shadow-md text-gray-200">Find climate-controlled, commercial-grade, or drive-up units across multiple local sites.</p>
                            <a href="https://stgeorgestorage.com" target="_blank" class="bg-adv-gold hover:bg-adv-gold-dark text-white font-bold text-lg py-3 px-10 rounded-xl shadow-2xl transition duration-300 transform hover:scale-105 inline-block border-2 border-adv-gold hover:border-white">
                                Visit StGeorgeStorage.com →
                            </a>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

        </div>
        
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next !text-adv-gold opacity-80 hover:opacity-100 hover:scale-110 transition-all"></div>
        <div class="swiper-button-prev !text-adv-gold opacity-80 hover:opacity-100 hover:scale-110 transition-all"></div>
    </div>
</section>

<section id="service-hub" class="py-20 bg-[#f7fbfd]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-sm font-bold tracking-wider text-adv-gold uppercase mb-2">Our Expertise</h2>
            <h3 class="text-4xl font-extrabold text-gray-900 mb-4">
                Advanced Realty's Six Pillars
            </h3>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Select your area of interest to get started with our dedicated, expert teams.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <a href="<?php echo home_url('/real-estate'); ?>" class="service-card p-6 sm:p-8 block group">
                <div class="text-adv-gold mb-6 transform group-hover:scale-110 transition-transform duration-300"><i data-lucide="key" class="w-12 h-12"></i></div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-adv-teal transition-colors">Buy & Sell Real Estate</h3>
                <p class="text-gray-600 mb-6 text-sm leading-relaxed">Connect with our licensed brokerage team for buying, selling, and investment consultation.</p>
                <p class="font-semibold text-adv-teal text-sm flex items-center group-hover:text-adv-gold transition-colors">Contact a Broker →</p>
            </a>

            <a href="https://advancedrealty.com/rental-listings/" class="service-card p-6 sm:p-8 block group">
                <div class="text-adv-gold mb-6 transform group-hover:scale-110 transition-transform duration-300"><i data-lucide="home" class="w-12 h-12"></i></div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-adv-teal transition-colors">Available Rentals</h3>
                <p class="text-gray-600 mb-6 text-sm leading-relaxed">View our current availability of houses, condos, and apartments. Apply online easily.</p>
                <p class="font-semibold text-adv-teal text-sm flex items-center group-hover:text-adv-gold transition-colors">Search Available Rentals →</p>
            </a>
            
            <a href="<?php echo home_url('/residential-management'); ?>" class="service-card p-6 sm:p-8 block group">
                <div class="text-adv-gold mb-6 transform group-hover:scale-110 transition-transform duration-300"><i data-lucide="users" class="w-12 h-12"></i></div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-adv-teal transition-colors">Residential Management</h3>
                <p class="text-gray-600 mb-6 text-sm leading-relaxed">Maximize returns on your investment property with our comprehensive management service.</p>
                <p class="font-semibold text-adv-teal text-sm flex items-center group-hover:text-adv-gold transition-colors">Get Your Management Quote →</p>
            </a>
            
            <a href="<?php echo home_url('/hoa-management'); ?>" class="service-card p-6 sm:p-8 block group">
                <div class="text-adv-gold mb-6 transform group-hover:scale-110 transition-transform duration-300"><i data-lucide="building-2" class="w-12 h-12"></i></div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-adv-teal transition-colors">HOA Management</h3>
                <p class="text-gray-600 mb-6 text-sm leading-relaxed">Trusted administrative, financial, and maintenance management for community associations.</p>
                <p class="font-semibold text-adv-teal text-sm flex items-center group-hover:text-adv-gold transition-colors">Inquire About HOA Services →</p>
            </a>

            <a href="<?php echo home_url('/commercial-management'); ?>" class="service-card p-6 sm:p-8 block group">
                <div class="text-adv-gold mb-6 transform group-hover:scale-110 transition-transform duration-300"><i data-lucide="briefcase" class="w-12 h-12"></i></div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-adv-teal transition-colors">Commercial Management</h3>
                <p class="text-gray-600 mb-6 text-sm leading-relaxed">Specialized leasing, accounting, and management for office, retail, and industrial properties.</p>
                <p class="font-semibold text-adv-teal text-sm flex items-center group-hover:text-adv-gold transition-colors">View Commercial Services →</p>
            </a>

            <a href="https://stgeorgestorage.com" target="_blank" class="service-card storage-card p-6 sm:p-8 block group">
                <div class="text-adv-gold mb-6 transform group-hover:scale-110 transition-all duration-300"><i data-lucide="archive" class="w-12 h-12"></i></div>
                <h3 class="text-2xl font-bold mb-3 transition-colors duration-300">Dedicated Storage</h3>
                <p class="desc-text mb-6 text-sm leading-relaxed transition-colors duration-300">Find climate-controlled, commercial-grade, or drive-up units across multiple local sites.</p>
                <p class="link-text font-semibold text-sm flex items-center transition-colors duration-300">Visit StGeorgeStorage.com →</p>
            </a>
        </div>
    </div>
</section>

<section id="quote" class="py-20 bg-adv-teal text-white relative overflow-hidden">
    <div class="absolute top-0 right-0 -mr-20 -mt-20 w-64 h-64 rounded-full bg-adv-gold opacity-10 blur-3xl pointer-events-none"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col lg:flex-row justify-between items-center text-center lg:text-left relative z-10">
        <div class="mb-8 lg:mb-0 max-w-2xl">
            <h2 class="text-4xl font-extrabold mb-4 text-white">Start Managing Your Assets Today</h2>
            <p class="text-xl text-teal-100 opacity-90">Get a personalized consultation on maximizing your property's performance with our award-winning team.</p>
        </div>
        <a href="<?php echo home_url('/contact'); ?>" class="bg-adv-gold hover:bg-adv-gold-dark text-white font-bold text-xl py-4 px-10 rounded-xl shadow-2xl transition duration-300 transform hover:scale-105 border-2 border-adv-gold hover:border-white whitespace-nowrap">
            Contact Management
        </a>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var swiper = new Swiper(".myHeroSwiper", {
            loop: true,
            effect: 'fade', 
            fadeEffect: {
                crossFade: true
            },
            autoplay: {
                delay: 5000, 
                disableOnInteraction: false, 
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    });
</script>

<?php get_footer(); ?>
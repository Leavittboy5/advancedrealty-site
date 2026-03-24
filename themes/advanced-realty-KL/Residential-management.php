<?php
/* Template Name: Advanced Realty - Residential Management */
get_header(); 
?>

<style>
    .hero-section-residential {
        background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.5)), 
                          url('https://advancedrealty.com/wp-content/uploads/2023/03/20230308220640065433000000-o-e1772320056680.jpg');
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        height: 400px;
    }
    
    .contact-form-wrapper .frm_style_formidable-style.with_frm_style .frm_submit button {
        background-color: #00A699 !important;
    }
    .contact-form-wrapper .frm_style_formidable-style.with_frm_style .frm_submit button:hover {
        background-color: #008f83 !important;
    }
</style>

<section class="hero-section-residential flex items-center justify-center text-center px-4">
    <div class="max-w-4xl z-10">
        <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-4 drop-shadow-lg">Residential Property Management in St. George & Washington County</h1>
        <p class="text-xl md:text-2xl text-gray-100 mb-8 font-medium drop-shadow-md">Stress-free property management for St. George homeowners.</p>
    </div>
</section>

<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-2 gap-12">
        
        <div>
            <h2 class="text-3xl font-extrabold text-gray-900 mb-6">Why Choose Advanced Realty?</h2>
            <div class="space-y-6">
                <div class="flex items-start">
                    <div class="flex-shrink-0 p-3 bg-teal-50 rounded-lg"><i data-lucide="award" class="w-6 h-6 text-adv-teal"></i></div>
                    <div class="ml-4">
                        <h3 class="text-xl font-bold text-gray-900">30+ Years of Local Expertise</h3>
                        <p class="text-gray-600 mt-1">As a locally owned and operated firm in St. George, we understand the Southern Utah market better than anyone else.</p>
                    </div>
                </div>

                <div class="flex items-start">
                    <div class="flex-shrink-0 p-3 bg-teal-50 rounded-lg"><i data-lucide="users" class="w-6 h-6 text-adv-teal"></i></div>
                    <div class="ml-4">
                        <h3 class="text-xl font-bold text-gray-900">Rigorous Tenant Screening</h3>
                        <p class="text-gray-600 mt-1">We perform criminal, credit, and eviction checks to ensure high-quality residents for your investment.</p>
                    </div>
                </div>
                
                <div class="flex items-start">
                    <div class="flex-shrink-0 p-3 bg-teal-50 rounded-lg"><i data-lucide="wrench" class="w-6 h-6 text-adv-teal"></i></div>
                    <div class="ml-4">
                        <h3 class="text-xl font-bold text-gray-900">24/7 Maintenance Coordination</h3>
                        <p class="text-gray-600 mt-1">We handle emergencies and coordinate repairs with trusted local vendors to protect your asset.</p>
                    </div>
                </div>

                <div class="flex items-start">
                    <div class="flex-shrink-0 p-3 bg-teal-50 rounded-lg"><i data-lucide="bar-chart-3" class="w-6 h-6 text-adv-teal"></i></div>
                    <div class="ml-4">
                        <h3 class="text-xl font-bold text-gray-900">Transparent Accounting</h3>
                        <p class="text-gray-600 mt-1">Maximize your ROI with detailed financial reports available anytime via our secure Owner Portal.</p>
                    </div>
                </div>

                <div class="adv-promo-banner bg-adv-teal rounded-2xl overflow-hidden shadow-xl my-12 flex flex-col md:flex-row items-center">
                    <div class="p-8 md:p-12 flex-grow">
                        <span class="text-white opacity-80 font-bold uppercase tracking-widest text-sm">Looking to Buy or Sell?</span>
                        <h3 class="text-3xl md:text-4xl font-extrabold text-white mt-2 mb-4">Full-Service Real Estate Brokerage</h3>
                        <p class="text-teal-50 text-lg max-w-xl">Our expertise goes beyond management. Whether you’re expanding your portfolio or finding a home, our agents are here to guide you.</p>
                        <div class="mt-8">
                            <a href="/real-estate" class="inline-block bg-gray-900 hover:bg-white hover:text-gray-900 text-white font-bold py-4 px-8 rounded-lg transition duration-300 shadow-lg">Contact a Real Estate Expert</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-gray-50 p-8 rounded-xl shadow-lg border border-gray-200 h-fit sticky top-24">
            <h3 class="text-2xl font-bold text-gray-900 mb-2">Request a Management Proposal</h3>
            <p class="text-gray-600 mb-6">Fill out the form below to receive a free rental analysis for your St. George property.</p>
            
            <div class="contact-form-wrapper">
                <?php echo do_shortcode('[formidable id="9"]'); ?>
            </div>
            
            <div class="mt-6 p-4 bg-white border border-gray-200 rounded-lg shadow-sm text-xs text-gray-600 leading-relaxed">
                By providing your phone number, you agree to receive text messages from <strong>Trent W. Leavitt dba Advanced Realty</strong> for the purpose of communicating community news, urgent notifications, and events. Reply “STOP” to opt-out anytime or reply “HELP” for more information. Message and data rates may apply. Message frequency will vary. For more information, please read our <a href="https://advancedrealty.com/privacy-policy" class="text-teal-600 underline hover:text-teal-800" target="_blank" rel="noopener noreferrer">Privacy Policy</a> and <a href="https://advancedrealty.com/terms-and-conditions" class="text-teal-600 underline hover:text-teal-800" target="_blank" rel="noopener noreferrer">Terms and Conditions</a>.
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
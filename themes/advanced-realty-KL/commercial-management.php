<?php
/* Template Name: Advanced Realty - Commercial Management */
get_header(); 
?>

<style>
    .contact-form-wrapper .frm_style_formidable-style.with_frm_style .frm_submit button { background-color: #00A699 !important; }
    .contact-form-wrapper .frm_style_formidable-style.with_frm_style .frm_submit button:hover { background-color: #008f83 !important; }
</style>

<section class="relative flex items-center justify-center text-center px-4 min-h-[400px]">
    <img src="https://advancedrealty.com/wp-content/uploads/2022/07/20220509202832632862000000-o.jpg" 
         alt="Commercial Management Hero" 
         fetchpriority="high" 
         decoding="sync"
         class="absolute inset-0 w-full h-full object-cover z-0">
    <div class="absolute inset-0 bg-gradient-to-b from-black/60 to-black/80 z-0"></div>

    <div class="relative max-w-4xl z-10 flex flex-col items-center">
        <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-4 drop-shadow-lg">Commercial Property Management & Real Estate Solutions</h1>
        <p class="text-xl md:text-2xl text-gray-100 mb-8 font-medium drop-shadow-md">Expert management for Retail, Office, and Industrial properties in St. George, Utah.</p>
        
        <div class="bg-white/95 backdrop-blur px-4 py-2 rounded-xl shadow-lg inline-block">
            <img src="https://advancedrealty.com/wp-content/uploads/2026/03/nar-membership-mark-commercial-red.png" 
                 alt="NAR Commercial" 
                 class="h-12 md:h-16 w-auto object-contain">
        </div>
    </div>
</section>

<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-2 gap-12">
        <div>
            <h2 class="text-3xl font-extrabold text-gray-900 mb-6">Comprehensive Commercial Asset Management Services</h2>
            
            <div class="space-y-6">
                <div class="flex items-start">
                    <div class="flex-shrink-0 p-3 bg-teal-50 rounded-lg"><i data-lucide="briefcase" class="w-6 h-6 text-adv-teal"></i></div>
                    <div class="ml-4">
                        <h3 class="text-xl font-bold text-gray-900">Lease Administration</h3>
                        <p class="text-gray-600 mt-1">We handle complex lease negotiations, renewals, and escalations to maximize occupancy.</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="flex-shrink-0 p-3 bg-teal-50 rounded-lg"><i data-lucide="pie-chart" class="w-6 h-6 text-adv-teal"></i></div>
                    <div class="ml-4">
                        <h3 class="text-xl font-bold text-gray-900">CAM Reconciliation</h3>
                        <p class="text-gray-600 mt-1">Accurate calculation and billing of Common Area Maintenance charges to tenants.</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="flex-shrink-0 p-3 bg-teal-50 rounded-lg"><i data-lucide="building" class="w-6 h-6 text-adv-teal"></i></div>
                    <div class="ml-4">
                        <h3 class="text-xl font-bold text-gray-900">Facilities Management</h3>
                        <p class="text-gray-600 mt-1">Proactive maintenance of building systems, landscaping, and safety compliance.</p>
                    </div>
                </div>
                
                <div class="adv-promo-banner bg-slate-800 rounded-2xl overflow-hidden shadow-xl my-12 flex flex-col md:flex-row items-center border-b-8 border-adv-teal">
                    <div class="p-8 md:p-12 flex-grow">
                        <span class="text-adv-teal font-bold uppercase tracking-widest text-sm">Strategic Asset Disposition</span>
                        <h3 class="text-3xl md:text-4xl font-extrabold text-white mt-2 mb-4">Commercial Sales & Acquisition</h3>
                        <p class="text-gray-300 text-lg max-w-xl">Ready to exit or trade? We specialize in commercial asset management and brokerage, ensuring you get maximum value for your commercial property.</p>
                        <div class="mt-8">
                            <a href="/real-estate" class="inline-block bg-adv-teal hover:bg-white hover:text-adv-teal text-white font-bold py-4 px-8 rounded-lg transition duration-300 shadow-lg">Talk to a Commercial Agent</a>
                        </div>
                    </div>
                    <div class="hidden lg:block w-1/3 bg-adv-teal/5 p-12 text-center">
                        <svg class="w-32 h-32 text-adv-teal mx-auto opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-gray-50 p-8 rounded-xl shadow-lg border border-gray-200">
            <h3 class="text-2xl font-bold text-gray-900 mb-2">Commercial Inquiry</h3>
            <p class="text-gray-600 mb-6">Contact our commercial division for management or leasing.</p>
            
            <div class="contact-form-wrapper">
                <?php echo do_shortcode('[formidable id="8"]'); ?>
            </div>
            
            <div class="mt-6 p-4 bg-white border border-gray-200 rounded-lg shadow-sm text-xs text-gray-600 leading-relaxed">
                By providing your phone number, you agree to receive text messages from <strong>Trent W. Leavitt dba Advanced Realty</strong> for the purpose of communicating community news, urgent notifications, and events. Reply “STOP” to opt-out anytime or reply “HELP” for more information. Message and data rates may apply. Message frequency will vary. For more information, please read our <a href="https://advancedrealty.com/privacy-policy" class="text-teal-600 underline hover:text-teal-800" target="_blank" rel="noopener noreferrer">Privacy Policy</a> and <a href="https://advancedrealty.com/terms-and-conditions" class="text-teal-600 underline hover:text-teal-800" target="_blank" rel="noopener noreferrer">Terms and Conditions</a>.
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
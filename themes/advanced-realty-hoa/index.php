<?php get_header(); ?>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            
            <?php if(get_hoa_var('announcement_text') !== ''): ?>
            <div class="bg-hoa-amber text-white p-4 rounded-xl shadow-lg mb-8 text-center text-base font-semibold">
                ANNOUNCEMENT: <?php echo get_hoa_var('announcement_text'); ?>
            </div>
            <?php endif; ?>
            
            <section class="bg-white rounded-xl shadow-2xl mb-8 border-t-8 border-adv-teal overflow-hidden flex flex-col md:flex-row">
                
                <div class="p-8 md:p-12 md:w-3/5 flex flex-col justify-center">
                    <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4">Welcome, <?php echo get_hoa_var('hoa_name'); ?> Homeowners</h2>
                    <p class="text-lg text-gray-600 mb-8 max-w-2xl">
                        Your hub for community documents, payment options, meeting schedules, and direct management contact.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="<?php echo esc_url(get_hoa_var('owner_portal_url')); ?>" target="_blank" class="inline-block w-full sm:w-auto text-center px-8 py-4 bg-adv-teal text-white font-bold text-lg rounded-xl shadow-xl hover:bg-adv-teal-dark transition duration-300 transform hover:scale-[1.01]">
                            Owner Portal / Payments →
                        </a>
                    </div>
                </div>

                <div class="md:w-2/5 bg-gray-200 min-h-[250px] md:min-h-full">
                    <img src="<?php echo esc_url(get_hoa_var('hero_image_url')); ?>" 
                         alt="HOA Community" 
                         class="w-full h-full object-cover">
                </div>
            </section>
            
            <div class="bg-blue-50 text-blue-700 p-4 rounded-xl shadow-md mb-12 text-center text-base font-medium border border-blue-200">
                Most Recent Annual Meeting: <span class="font-bold text-gray-800"><?php echo do_shortcode('[hoa_meeting_direct]'); ?></span>
            </div>

            <section id="documents" class="mb-12">
                <h3 class="text-3xl font-extrabold text-gray-800 mb-6 border-b pb-2">Community Resources</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    
                    <div class="bg-white p-6 rounded-xl shadow-lg border-l-4 border-hoa-amber hover:shadow-xl transition duration-300">
                        <h4 class="text-xl font-bold text-gray-900 mb-2">Architectural Change (ACC)</h4>
                        <p class="text-gray-600 mb-4 text-sm">Download the required form for all exterior home improvements, landscaping, and changes.</p>
                        <a href="<?php echo esc_url(get_hoa_var('acc_form_url')); ?>" target="_blank" class="text-adv-teal font-semibold hover:underline text-base flex items-center">
                            Download ACC Request Form →
                        </a>
                    </div>
                    
                    <div class="bg-white p-6 rounded-xl shadow-lg border-l-4 border-hoa-amber hover:shadow-xl transition duration-300">
                        <h4 class="text-xl font-bold text-gray-900 mb-2">Governing Documents</h4>
                        <p class="text-gray-600 mb-4 text-sm">Access the CC&Rs, By-Laws, community rules, and other official documents.</p>
                        <a href="<?php echo do_shortcode('[hoa_document_link]'); ?>" target="_blank" class="text-adv-teal font-semibold hover:underline text-base flex items-center">View All Documents →</a>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-lg border-l-4 border-hoa-amber hover:shadow-xl transition duration-300">
                        <h4 class="text-xl font-bold text-gray-900 mb-2">Utah HOA Registry Search</h4>
                        <p class="text-gray-600 mb-4 text-sm">Find official registration and contact information for the association through the state database.</p>
                        <a href="https://services.commerce.utah.gov/hoa/" target="_blank" class="text-adv-teal font-semibold hover:underline text-base flex items-center">Search Utah Registry →</a>
                    </div>
                </div>
            </section>
            
            <section id="contact" class="mb-12 bg-white p-8 rounded-xl shadow-lg">
                 <div class="flex flex-col md:flex-row md:items-center justify-between border-b pb-4 mb-6">
                     <h3 class="text-3xl font-extrabold text-gray-800 mb-4 md:mb-0">HOA Management Contact</h3>
                     <a href="https://advancedrealty.com/contact-about-us/" target="_blank" class="inline-flex justify-center items-center px-6 py-3 bg-adv-teal text-white font-bold rounded-lg hover:bg-adv-teal-dark transition duration-300 shadow-md">
                         Contact Us
                         <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                     </a>
                 </div>
                 <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 text-base">
                    <div>
                        <p class="font-semibold text-gray-700">Phone:</p>
                        <p class="text-gray-600 font-bold">
                            <?php $phone = get_hoa_var('contact_phone'); ?>
                            <a href="tel:<?php echo preg_replace('/[^0-9]/', '', (string)$phone); ?>" class="hover:text-adv-teal transition duration-200">
                                <?php echo esc_html($phone); ?>
                            </a>
                        </p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-700">Email:</p>
                        <p class="text-gray-600 break-words font-bold">
                            <?php $email = get_hoa_var('contact_email'); ?>
                            <a href="mailto:<?php echo esc_attr($email); ?>" class="hover:text-adv-teal transition duration-200">
                                <?php echo esc_html($email); ?>
                            </a>
                        </p>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-700">Office:</p>
                        <p class="text-gray-600 font-medium">
                            <a href="https://maps.app.goo.gl/a5ziFRdUFV7eYis97" target="_blank" rel="noopener noreferrer" class="hover:text-adv-teal transition duration-200">
                                <?php echo esc_html(get_hoa_var('contact_address')); ?>
                            </a>
                        </p>
                    </div>
                 </div>
            </section>

            <section class="bg-gray-900 border border-gray-800 rounded-xl shadow-xl overflow-hidden mb-16">
                <div class="px-6 py-8 md:px-8 flex flex-col md:flex-row items-center justify-between">
                    <div class="mb-6 md:mb-0 flex items-center text-left w-full md:w-auto">
                        <div class="bg-gray-800 p-4 rounded-full mr-5 border border-gray-700 hidden sm:block">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="file-check-2" aria-hidden="true" class="lucide lucide-file-check-2 w-8 h-8 text-adv-teal"><path d="M10.5 22H6a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h8a2.4 2.4 0 0 1 1.706.706l3.588 3.588A2.4 2.4 0 0 1 20 8v6"></path><path d="M14 2v5a1 1 0 0 0 1 1h5"></path><path d="m14 20 2 2 4-4"></path></svg>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-white mb-1">Lender & Mortgage Questionnaires</h2>
                            <p class="text-gray-400">Need HOA forms or certifications filled out for a loan approval?</p>
                        </div>
                    </div>
                    <a href="https://advr.twa.rentmanager.com/ApplyNow?propertyID=837&locations=1" target="_blank" class="w-full md:w-auto bg-adv-teal hover:bg-adv-teal-dark text-white font-bold py-3 px-8 rounded-xl shadow-lg transition duration-300 transform hover:scale-105 whitespace-nowrap flex items-center justify-center">
                        Document Request 
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
            </section>

            <section class="mb-8">
                <div class="text-center mb-10">
                    <span class="text-adv-teal font-bold uppercase tracking-widest text-sm">Sponsored Services</span>
                    
                    <div class="flex justify-center items-center mt-6 mb-4">
                        <img src="https://advancedrealty.com/wp-content/uploads/2026/05/Logo-3at-small.png" alt="Advanced Realty Logo" class="h-16 md:h-20 object-contain drop-shadow-sm mix-blend-multiply">
                    </div>
                    
                    <p class="text-gray-600 max-w-2xl mx-auto mt-3">Explore our trusted services in Southern Utah, offering expert solutions for your residential and commercial needs.</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100 flex flex-col hover:shadow-2xl transition-shadow duration-300">
                        <div class="relative h-48 w-full">
                            <img src="https://advancedrealty.com/wp-content/uploads/2026/02/HOAbg.jpg" alt="Property Management Investments" class="absolute inset-0 w-full h-full object-cover">
                            <div class="absolute inset-0 bg-slate-900/40 flex flex-col justify-center items-center p-4">
                                <svg class="w-12 h-12 text-adv-teal mx-auto mb-3 drop-shadow-md" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                                <h4 class="text-xl font-bold text-white text-center drop-shadow-md">Property Management</h4>
                            </div>
                        </div>
                        <div class="p-6 flex-grow flex flex-col justify-between">
                            <p class="text-gray-600 mb-6 text-sm text-center">Turn your property into a hands-off investment. We provide full-service residential and commercial property management.</p>
                            <a href="https://advancedrealty.com/residential-management/" target="_blank" class="block w-full text-center px-4 py-3 bg-adv-teal text-white font-bold rounded-lg hover:bg-adv-teal-dark transition duration-300">Get a Free Quote</a>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100 flex flex-col hover:shadow-2xl transition-shadow duration-300">
                        <div class="relative h-48 w-full">
                            <img src="https://advancedrealty.com/wp-content/uploads/sites/28/2026/02/R6KL1685-HDR-scaled.jpg" alt="Real Estate Sales" class="absolute inset-0 w-full h-full object-cover">
                            <div class="absolute inset-0 bg-slate-900/40 flex flex-col justify-center items-center p-4">
                                <svg class="w-12 h-12 text-adv-teal mx-auto mb-3 drop-shadow-md" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                                <h4 class="text-xl font-bold text-white text-center drop-shadow-md">Real Estate Sales</h4>
                            </div>
                        </div>
                        <div class="p-6 flex-grow flex flex-col justify-between">
                            <p class="text-gray-600 mb-6 text-sm text-center">Looking to buy, sell, or expand your portfolio? Our expert agents know the Southern Utah market inside and out.</p>
                            <a href="https://advancedrealty.com/real-estate/" target="_blank" class="block w-full text-center px-4 py-3 bg-gray-900 text-white font-bold rounded-lg hover:bg-gray-800 transition duration-300">View Listings</a>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100 flex flex-col hover:shadow-2xl transition-shadow duration-300">
                        <div class="relative h-48 w-full">
                            <img src="https://classiccommercial.stgeorgestorage.com/wp-content/uploads/sites/3/2026/03/20260325_091604-scaled.jpg" alt="Local Storage Units" class="absolute inset-0 w-full h-full object-cover">
                            <div class="absolute inset-0 bg-slate-900/40 flex flex-col justify-center items-center p-4">
                                <svg class="w-12 h-12 text-adv-teal mx-auto mb-3 drop-shadow-md" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                                <h4 class="text-xl font-bold text-white text-center drop-shadow-md">Local Storage Units</h4>
                            </div>
                        </div>
                        <div class="p-6 flex-grow flex flex-col justify-between">
                            <p class="text-gray-600 mb-6 text-sm text-center">Need more space? Secure, accessible, and affordable local storage units managed right here in the community.</p>
                            <a href="<?php echo esc_url(get_hoa_var('storage_url')); ?>" target="_blank" class="block w-full text-center px-4 py-3 border-2 border-slate-900 text-slate-900 font-bold rounded-lg hover:bg-slate-900 hover:text-white transition duration-300">Find Storage Space</a>
                        </div>
                    </div>
                </div>
            </section>

        </div>

<?php get_footer(); ?>

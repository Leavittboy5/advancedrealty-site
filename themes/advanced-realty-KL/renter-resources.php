<?php
/* Template Name: Advanced Realty - Renter Resources */
get_header(); 
?>

<section class="relative flex items-center justify-center text-center px-4 min-h-[350px]">
    <img src="https://advancedrealty.com/wp-content/uploads/2023/05/B0A8079-scaled.jpg" 
         alt="Renter Resources Hero" 
         fetchpriority="high" 
         decoding="sync"
         class="absolute inset-0 w-full h-full object-cover z-0">
    <div class="absolute inset-0 bg-gradient-to-b from-black/30 to-black/50 z-0"></div>

    <div class="relative max-w-4xl z-10">
        <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-4 drop-shadow-lg">Resident Resources</h1>
        <p class="text-xl text-gray-100 font-medium drop-shadow-md">Everything you need to manage your home with Advanced Realty.</p>
    </div>
</section>

<section class="py-12 -mt-16 relative z-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <a href="http://residentwebaccess.rentmanager.com/CustomerLogin.aspx?corpid=advr" target="_blank" class="bg-white p-8 rounded-xl shadow-xl border-t-8 border-adv-gold hover:transform hover:-translate-y-2 transition duration-300 group flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-2xl font-bold text-gray-900 group-hover:text-adv-gold">Resident Portal</h3>
                        <div class="flex space-x-2">
                            <div class="bg-teal-50 p-2 rounded-full"><i data-lucide="credit-card" class="w-6 h-6 text-adv-gold"></i></div>
                            <div class="bg-teal-50 p-2 rounded-full"><i data-lucide="wrench" class="w-6 h-6 text-adv-gold"></i></div>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-4">Log in to your secure account to pay rent, set up auto-pay, or submit maintenance requests.</p>
                </div>
                <span class="text-adv-gold font-bold text-lg flex items-center mt-2 group-hover:text-adv-gold-dark">Access Portal <i data-lucide="arrow-right" class="w-5 h-5 ml-2"></i></span>
            </a>

            <a href="https://services.commerce.utah.gov/hoa/" target="_blank" class="bg-white p-8 rounded-xl shadow-xl border-t-8 border-blue-600 hover:transform hover:-translate-y-2 transition duration-300 group flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-2xl font-bold text-gray-900 group-hover:text-blue-600">HOA Documents</h3>
                        <div class="bg-blue-50 p-2 rounded-full"><i data-lucide="file-check" class="w-6 h-6 text-blue-600"></i></div>
                    </div>
                    <p class="text-gray-600 mb-4">Live in an HOA and would like to receive the governing documents?</p>
                </div>
                <span class="text-blue-600 font-bold text-lg flex items-center mt-2 group-hover:text-blue-800">View Registry <i data-lucide="external-link" class="w-5 h-5 ml-2"></i></span>
            </a>

            <div class="bg-white p-8 rounded-xl shadow-xl border-t-8 border-red-500 flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-2xl font-bold text-gray-900">Emergency Support</h3>
                        <div class="bg-red-50 p-2 rounded-full"><i data-lucide="phone-call" class="w-6 h-6 text-red-500"></i></div>
                    </div>
                    <p class="text-gray-600 mb-2"><strong>Life Safety:</strong> Call 911 immediately.</p>
                    <p class="text-gray-600 mb-4 text-sm">Active leaks or HVAC failure? Call our 24/7 line.</p>
                </div>
                <a href="tel:4356744343" class="text-red-600 hover:text-red-800 font-bold text-lg flex items-center mt-2">Call (435) 674-4343</a>
            </div>
        </div>
    </div>
</section>

<section class="py-12 bg-f7fbfd">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <div class="lg:col-span-2 space-y-10">
                
                <div class="bg-white rounded-xl shadow-md p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center"><i data-lucide="zap" class="w-6 h-6 mr-3 text-adv-gold"></i> Utility Provider Contacts</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="border p-4 rounded-lg bg-gray-50">
                            <h4 class="font-bold text-gray-800">City of St. George</h4>
                            <p class="text-sm text-gray-500 mb-3">Power & Water</p>
                            <div class="space-y-2">
                                <a href="tel:4356274000" class="text-gray-700 hover:text-adv-gold text-sm font-medium flex items-center transition"><i data-lucide="phone" class="w-4 h-4 mr-2 text-adv-gold"></i> (435) 627-4000</a>
                                <a href="https://sgcityutah.gov/departments/utilities.php" target="_blank" class="text-gray-700 hover:text-adv-gold text-sm font-medium flex items-center transition"><i data-lucide="external-link" class="w-4 h-4 mr-2 text-adv-gold"></i> Visit Website</a>
                            </div>
                        </div>
                        <div class="border p-4 rounded-lg bg-gray-50">
                            <h4 class="font-bold text-gray-800">Dixie Power</h4>
                            <p class="text-sm text-gray-500 mb-3">Electricity (County)</p>
                            <div class="space-y-2">
                                <a href="tel:4356733297" class="text-gray-700 hover:text-adv-gold text-sm font-medium flex items-center transition"><i data-lucide="phone" class="w-4 h-4 mr-2 text-adv-gold"></i> (435) 673-3297</a>
                                <a href="https://www.dixiepower.com/" target="_blank" class="text-gray-700 hover:text-adv-gold text-sm font-medium flex items-center transition"><i data-lucide="external-link" class="w-4 h-4 mr-2 text-adv-gold"></i> Visit Website</a>
                            </div>
                        </div>
                        <div class="border p-4 rounded-lg bg-gray-50">
                            <h4 class="font-bold text-gray-800">Enbridge Gas</h4>
                            <p class="text-sm text-gray-500 mb-3">Natural Gas</p>
                            <div class="space-y-2">
                                <a href="tel:8003235517" class="text-gray-700 hover:text-adv-gold text-sm font-medium flex items-center transition"><i data-lucide="phone" class="w-4 h-4 mr-2 text-adv-gold"></i> (800) 323-5517</a>
                                <a href="https://www.enbridgegas.com/utwyid" target="_blank" class="text-gray-700 hover:text-adv-gold text-sm font-medium flex items-center transition"><i data-lucide="external-link" class="w-4 h-4 mr-2 text-adv-gold"></i> Visit Website</a>
                            </div>
                        </div>
                        <div class="border p-4 rounded-lg bg-gray-50">
                            <h4 class="font-bold text-gray-800">WashCo Solid Waste</h4>
                            <p class="text-sm text-gray-500 mb-3">Trash / Recycling</p>
                            <div class="space-y-2">
                                <a href="tel:4356282821" class="text-gray-700 hover:text-adv-gold text-sm font-medium flex items-center transition"><i data-lucide="phone" class="w-4 h-4 mr-2 text-adv-gold"></i> (435) 628-2821</a>
                                <a href="https://www.washcosolidwasteut.gov/" target="_blank" class="text-gray-700 hover:text-adv-gold text-sm font-medium flex items-center transition"><i data-lucide="external-link" class="w-4 h-4 mr-2 text-adv-gold"></i> Visit Website</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4 flex items-center"><i data-lucide="map-pin" class="w-6 h-6 mr-3 text-adv-gold"></i> Surrounding City Utilities</h2>
                    <p class="text-gray-600 mb-6">If your rental property is located outside of St. George proper, you will need to set up your city utility services directly with your municipality prior to move-in.</p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="border p-4 rounded-lg bg-gray-50">
                            <h4 class="font-bold text-gray-800">Hurricane City</h4>
                            <p class="text-sm text-gray-500 mb-3">Power, Water, Trash</p>
                            <div class="space-y-2">
                                <a href="tel:4356352811" class="text-gray-700 hover:text-adv-gold text-sm font-medium flex items-center transition"><i data-lucide="phone" class="w-4 h-4 mr-2 text-adv-gold"></i> (435) 635-2811</a>
                                <a href="https://www.cityofhurricane.com/219/Utility-Billing" target="_blank" class="text-gray-700 hover:text-adv-gold text-sm font-medium flex items-center transition"><i data-lucide="external-link" class="w-4 h-4 mr-2 text-adv-gold"></i> Visit Website</a>
                            </div>
                        </div>
                        <div class="border p-4 rounded-lg bg-gray-50">
                            <h4 class="font-bold text-gray-800">Ivins City</h4>
                            <p class="text-sm text-gray-500 mb-3">Water, Sewer, Trash</p>
                            <div class="space-y-2">
                                <a href="tel:4356280606" class="text-gray-700 hover:text-adv-gold text-sm font-medium flex items-center transition"><i data-lucide="phone" class="w-4 h-4 mr-2 text-adv-gold"></i> (435) 628-0606</a>
                                <a href="https://www.ivins.com/utilities/" target="_blank" class="text-gray-700 hover:text-adv-gold text-sm font-medium flex items-center transition"><i data-lucide="external-link" class="w-4 h-4 mr-2 text-adv-gold"></i> Visit Website</a>
                            </div>
                        </div>
                        <div class="border p-4 rounded-lg bg-gray-50">
                            <h4 class="font-bold text-gray-800">Santa Clara City</h4>
                            <p class="text-sm text-gray-500 mb-3">Power, Water, Trash</p>
                            <div class="space-y-2">
                                <a href="tel:4356736712" class="text-gray-700 hover:text-adv-gold text-sm font-medium flex items-center transition"><i data-lucide="phone" class="w-4 h-4 mr-2 text-adv-gold"></i> (435) 673-6712</a>
                                <a href="https://sccity.org/utilities" target="_blank" class="text-gray-700 hover:text-adv-gold text-sm font-medium flex items-center transition"><i data-lucide="external-link" class="w-4 h-4 mr-2 text-adv-gold"></i> Visit Website</a>
                            </div>
                        </div>
                        <div class="border p-4 rounded-lg bg-gray-50">
                            <h4 class="font-bold text-gray-800">Washington City</h4>
                            <p class="text-sm text-gray-500 mb-3">Power, Water, Trash</p>
                            <div class="space-y-2">
                                <a href="tel:4356566300" class="text-gray-700 hover:text-adv-gold text-sm font-medium flex items-center transition"><i data-lucide="phone" class="w-4 h-4 mr-2 text-adv-gold"></i> (435) 656-6300</a>
                                <a href="https://washingtoncity.org/utilities" target="_blank" class="text-gray-700 hover:text-adv-gold text-sm font-medium flex items-center transition"><i data-lucide="external-link" class="w-4 h-4 mr-2 text-adv-gold"></i> Visit Website</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4 flex items-center"><i data-lucide="wifi" class="w-6 h-6 mr-3 text-adv-gold"></i> Internet Service Providers (ISPs)</h2>
                    <p class="text-gray-600 mb-6">Internet service is typically set up and paid for directly by the tenant. Availability varies by neighborhood, so please check with the providers below to see who services your new address.</p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="border p-4 rounded-lg bg-gray-50">
                            <h4 class="font-bold text-gray-800">InfoWest</h4>
                            <p class="text-sm text-gray-500 mb-3">Fiber & Wireless</p>
                            <div class="space-y-2">
                                <a href="tel:4356740165" class="text-gray-700 hover:text-adv-gold text-sm font-medium flex items-center transition"><i data-lucide="phone" class="w-4 h-4 mr-2 text-adv-gold"></i> (435) 674-0165</a>
                                <a href="https://www.infowest.com/" target="_blank" class="text-gray-700 hover:text-adv-gold text-sm font-medium flex items-center transition"><i data-lucide="external-link" class="w-4 h-4 mr-2 text-adv-gold"></i> Visit Website</a>
                            </div>
                        </div>
                        <div class="border p-4 rounded-lg bg-gray-50">
                            <h4 class="font-bold text-gray-800">TDS Telecom</h4>
                            <p class="text-sm text-gray-500 mb-3">Cable & Fiber</p>
                            <div class="space-y-2">
                                <a href="tel:7026134870" class="text-gray-700 hover:text-adv-gold text-sm font-medium flex items-center transition"><i data-lucide="phone" class="w-4 h-4 mr-2 text-adv-gold"></i> Darren Sieben: (702) 613-4870</a>
                                <a href="https://tdstelecom.com/" target="_blank" class="text-gray-700 hover:text-adv-gold text-sm font-medium flex items-center transition"><i data-lucide="external-link" class="w-4 h-4 mr-2 text-adv-gold"></i> Visit Website</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center"><i data-lucide="help-circle" class="w-6 h-6 mr-3 text-adv-gold"></i> Frequently Asked Questions</h2>
                    <div class="space-y-4">
                        <details class="group p-4 border rounded-lg bg-gray-50 open:bg-white open:shadow-sm">
                            <summary class="flex justify-between items-center font-medium cursor-pointer list-none text-gray-800">
                                <span>When is rent considered late?</span><span class="transition group-open:rotate-180"><i data-lucide="chevron-down" class="w-5 h-5"></i></span>
                            </summary>
                            <p class="text-gray-600 mt-3 group-open:animate-fadeIn">Rent is due on the 1st of every month. It is considered late if not received by 5:00 PM on the 5th. Late fees will apply automatically as per your lease agreement.</p>
                        </details>
                        <details class="group p-4 border rounded-lg bg-gray-50 open:bg-white open:shadow-sm">
                            <summary class="flex justify-between items-center font-medium cursor-pointer list-none text-gray-800">
                                <span>Can I get a pet?</span><span class="transition group-open:rotate-180"><i data-lucide="chevron-down" class="w-5 h-5"></i></span>
                            </summary>
                            <p class="text-gray-600 mt-3 group-open:animate-fadeIn">Pet policies vary by property owner. You must submit a "Pet Request" in writing before bringing an animal into the home. Unauthorized pets are a lease violation and may result in fines or eviction.</p>
                        </details>
                        <details class="group p-4 border rounded-lg bg-gray-50 open:bg-white open:shadow-sm">
                            <summary class="flex justify-between items-center font-medium cursor-pointer list-none text-gray-800">
                                <span>How do I give notice to move out?</span><span class="transition group-open:rotate-180"><i data-lucide="chevron-down" class="w-5 h-5"></i></span>
                            </summary>
                            <p class="text-gray-600 mt-3 group-open:animate-fadeIn">A written "Notice to Vacate" is required at least 30 days prior to your move-out date. You can submit this form through your tenant portal or drop it off at our office.</p>
                        </details>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl shadow-md p-6 sticky top-24">
                    <h3 class="text-xl font-bold text-gray-900 mb-4 border-b pb-2">Important Documents</h3>
                    
                    <?php
                    // Fetch dynamic menu links from WordPress Appearance -> Menus
                    $menu_items = wp_get_nav_menu_items('Important Documents');

                    if ($menu_items) {
                        echo '<ul class="space-y-3 mb-8">';
                        foreach ($menu_items as $menu_item) {
                            $title  = esc_html($menu_item->title);
                            $url    = esc_url($menu_item->url);
                            // Default to opening PDFs in a new tab if they didn't explicitly check the box in the menu settings
                            $target = !empty($menu_item->target) ? ' target="' . esc_attr($menu_item->target) . '"' : ' target="_blank"';
                            
                            echo '<li>
                                    <a href="' . $url . '"' . $target . ' class="flex items-center p-3 rounded-lg hover:bg-teal-50 text-gray-700 hover:text-adv-gold transition group">
                                        <i data-lucide="file-text" class="w-5 h-5 mr-3 text-gray-400 group-hover:text-adv-gold"></i>
                                        <span class="font-medium">' . $title . '</span>
                                    </a>
                                  </li>';
                        }
                        echo '</ul>';
                    } else {
                        // Fallback message so you know exactly what to do!
                        echo '<div class="p-4 bg-amber-50 border border-amber-200 rounded-lg text-amber-800 text-sm mb-8">
                                <strong>Setup Required:</strong> Please go to <em>Appearance &rarr; Menus</em> and create a new menu named exactly <strong>Important Documents</strong> to populate this list.
                              </div>';
                    }
                    ?>
                    
                    <div class="mt-8 bg-gray-100 p-6 rounded-lg border border-gray-200">
                        <h4 class="font-bold text-gray-900 mb-4 border-b border-gray-300 pb-2">Contact & Hours</h4>
                        
                        <div class="space-y-3 mb-6">
                            <p class="text-sm font-bold text-gray-900">Advanced Realty</p>
                            <a href="tel:4356744343" class="text-sm text-gray-700 hover:text-adv-gold flex items-center transition">
                                <i data-lucide="phone" class="w-4 h-4 mr-2 text-adv-gold"></i> (435) 674-4343
                            </a>
                            <a href="mailto:info@advancedrealty.com" class="text-sm text-gray-700 hover:text-adv-gold flex items-center transition">
                                <i data-lucide="mail" class="w-4 h-4 mr-2 text-adv-gold"></i> info@advancedrealty.com
                            </a>
                            <p class="text-xs text-gray-600 flex items-start">
                                <i data-lucide="map-pin" class="w-4 h-4 mr-2 mt-1 text-adv-gold flex-shrink-0"></i>
                                <span>1156 E 700 S Ste. 1<br>St. George, UT 84790</span>
                            </p>
                        </div>

                        <div class="pt-4 border-t border-gray-300">
                            <p class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Office Hours</p>
                            <p class="text-sm text-gray-600">Monday - Friday</p>
                            <p class="text-sm text-gray-800 font-semibold mb-2">9:00 AM - 5:00 PM</p>
                            <p class="text-xs text-gray-500">Closed Weekends & Holidays</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
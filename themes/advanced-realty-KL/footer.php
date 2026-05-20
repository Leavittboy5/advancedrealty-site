<footer class="bg-gray-900 text-gray-300 py-16 mt-auto border-t-4 border-adv-gold">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
            
           <div class="lg:col-span-1">
    <a href="https://advancedrealty.com/linktree" class="inline-block mb-4">
        <img src="https://advancedrealty.com/wp-content/uploads/2026/05/Logo-3at-small.png" 
             alt="Advanced Realty Logo" 
             class="h-12 w-auto">
    </a>
    <p class="text-sm text-gray-400 leading-relaxed mb-6">
        Full-service property management and real estate brokerage partner in St. George, Utah.
    </p>
    <div class="flex space-x-4">
        <a href="#" class="text-gray-400 hover:text-adv-gold transition-colors"><i data-lucide="facebook" class="w-5 h-5"></i></a>
        <a href="#" class="text-gray-400 hover:text-adv-gold transition-colors"><i data-lucide="instagram" class="w-5 h-5"></i></a>
        <a href="#" class="text-gray-400 hover:text-adv-gold transition-colors"><i data-lucide="linkedin" class="w-5 h-5"></i></a>
    </div>
</div>
            
            <div>
                <h4 class="text-lg font-bold mb-6 text-adv-gold">Quick Links</h4>
                <ul class="space-y-3 text-sm">
                    <li><a href="<?php echo home_url('/'); ?>#service-hub" class="hover:text-white hover:translate-x-1 inline-block transition-all duration-200">All Services</a></li>
                    <li><a href="https://stgeorgestorage.com" target="_blank" class="hover:text-white hover:translate-x-1 inline-block transition-all duration-200">Storage Facilities</a></li>
                    <li><a href="<?php echo home_url('/contact'); ?>" class="hover:text-white hover:translate-x-1 inline-block transition-all duration-200">Contact Us</a></li>
                </ul>
            </div>
            
            <div>
                <h4 class="text-lg font-bold mb-6 text-adv-gold">Client Portals</h4>
                <ul class="space-y-3 text-sm">
                    <li><a href="http://ownerwebaccess.rentmanager.com/OwnerLogin.aspx?CorpID=advr" target="_blank" class="hover:text-white hover:translate-x-1 inline-block transition-all duration-200">Owner Portal</a></li>
                    <li><a href="<?php echo home_url('/renter-resources'); ?>" target="_blank" class="hover:text-white hover:translate-x-1 inline-block transition-all duration-200">Renter Portal</a></li>
                    <li><a href="http://residentwebaccess.rentmanager.com/CustomerLogin.aspx?corpid=advr" target="_blank" class="hover:text-white hover:translate-x-1 inline-block transition-all duration-200">HOA Portal</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-lg font-bold mb-6 text-adv-gold">Contact Office</h4>
                <ul class="space-y-4 text-sm">
                    <li class="flex items-start">
                        <i data-lucide="phone" class="w-5 h-5 mr-3 text-adv-teal"></i>
                        <a href="tel:4356744343" class="hover:text-white transition duration-150 font-semibold">(435) 674-4343</a>
                    </li>
                    <li class="flex items-start">
                        <i data-lucide="mail" class="w-5 h-5 mr-3 text-adv-teal"></i>
                        <a href="mailto:info@advancedrealty.com" class="hover:text-white transition duration-150">info@advancedrealty.com</a>
                    </li>
                    <li class="flex items-start">
                        <i data-lucide="map-pin" class="w-5 h-5 mr-3 text-adv-teal shrink-0"></i>
                        <a href="https://maps.app.goo.gl/xvcs4HZL6zqiY3rT8" 
                           target="_blank" 
                           rel="noopener noreferrer" 
                           class="hover:text-white transition duration-150 leading-relaxed">
                           1156 E 700 S Ste. 1,<br>St. George, UT 84790
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="mt-12 pt-8 border-t border-gray-800 flex flex-col md:flex-row items-center justify-between gap-4 text-center md:text-left text-sm text-gray-500">
            <div>
                © <?php echo date('Y'); ?> Advanced Realty. All Rights Reserved. Utah Brokerage License #5472064-CN00. <br class="md:hidden">
                <span class="hidden md:inline">|</span> 
                <a href="<?php echo home_url('/privacy-policy'); ?>" class="hover:text-adv-gold transition-colors">Privacy Policy</a> | 
                <a href="<?php echo home_url('/terms-and-conditions'); ?>" class="hover:text-adv-gold transition-colors">Terms & Conditions</a>
            </div>
            
            <div class="flex justify-center md:justify-end">
                <div class="flex items-center space-x-2 text-xs font-bold text-gray-400 bg-gray-800 px-3 py-1.5 rounded">
                    <i data-lucide="home" class="w-4 h-4"></i>
                    <span>EQUAL HOUSING</span>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="https://unpkg.com/lucide@latest"></script>
<script>
    // Initialize Lucide Icons
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }

    // Logo Fallback Logic
    window.onload = function() {
        const img = document.querySelector('img[alt="Advanced Realty Logo"]');
        const fallback = document.getElementById('logo-text-fallback');

        if (img) {
            img.onerror = function() {
                img.classList.add('hidden');
                fallback.classList.remove('hidden');
            };

            if (!img.complete || img.naturalHeight === 0) {
                img.classList.add('hidden');
                fallback.classList.remove('hidden');
            } else {
                 img.classList.remove('hidden');
                 fallback.classList.add('hidden');
            }
        }
    };
</script>

<?php wp_footer(); ?>
</body>
</html>
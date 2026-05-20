</main> 

<footer class="bg-gray-900 py-12 border-t-4 border-adv-gold">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-gray-400 text-sm">
        <p class="font-medium">
            &copy; <?php echo date("Y"); ?> <?php echo get_hoa_var('hoa_name'); ?>. 
            Managed Exclusively by <span class="text-adv-teal font-bold"><?php echo get_hoa_var('management_name'); ?></span>.
        </p>
        
        <p class="mt-4 text-gray-500 flex flex-wrap justify-center gap-3">
            <a href="<?php echo get_hoa_var('tos_url'); ?>" class="hover:text-adv-gold transition-colors">Terms of Service</a> 
            <span class="text-gray-700">|</span> 
            <a href="<?php echo get_hoa_var('privacy_url'); ?>" class="hover:text-adv-gold transition-colors">Privacy Policy</a> 
            <span class="text-gray-700">|</span> 
            <a href="<?php echo get_hoa_var('owner_portal_url'); ?>" target="_blank" class="hover:text-adv-gold transition-colors font-bold text-adv-teal">Member Login</a>
        </p>
        
        <div class="flex justify-center mt-8">
            <div class="flex items-center space-x-2 text-xs font-bold text-gray-400 bg-gray-800 px-4 py-2 rounded-lg">
                <i data-lucide="home" class="w-4 h-4"></i>
                <span class="tracking-widest uppercase">Equal Housing Opportunity</span>
            </div>
        </div>
    </div>
</footer>
    
    <script>
        // Initialize Lucide Icons
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }

        window.onload = function() {
            const img = document.querySelector('img[alt="Management Logo"]');
            const fallback = document.getElementById('logo-text-fallback-hoa');

            if (img) {
                img.onerror = function() {
                    img.classList.add('hidden');
                    fallback.classList.remove('hidden');
                };

                // Check if image failed to load or has 0 height (broken)
                if (!img.complete || img.naturalHeight === 0) {
                    img.classList.add('hidden');
                    fallback.classList.remove('hidden');
                }
            }
        };
    </script>

    <?php wp_footer(); ?>
</body>
</html>
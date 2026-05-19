</main> <footer class="bg-gray-800 mt-12 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-gray-400 text-sm">
            <p>&copy; <?php echo date("Y"); ?> <?php echo get_hoa_var('hoa_name'); ?>. Managed Exclusively by <?php echo get_hoa_var('management_name'); ?>.</p>
            <p class="mt-2 text-gray-500">
                <a href="<?php echo get_hoa_var('tos_url'); ?>" class="hover:text-adv-gold">Terms of Service</a> |
                <a href="<?php echo get_hoa_var('privacy_url'); ?>" class="hover:text-adv-gold">Privacy Policy</a> |
                <a href="<?php echo get_hoa_var('owner_portal_url'); ?>" target="_blank" class="hover:text-adv-gold">Member Login</a>
            </p>
            
            <div class="flex justify-center mt-6 opacity-75">
                <img src="https://advancedrealty.com/wp-content/uploads/2026/03/equal-housing-opportunity-logo-1200w.png" 
                     alt="Equal Housing Opportunity" 
                     class="h-6 w-auto bg-white p-1 rounded-sm hover:opacity-100 transition duration-150">
            </div>
        </div>
    </footer>
    
    <script>
        // Initialize Lucide Icons if loaded
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
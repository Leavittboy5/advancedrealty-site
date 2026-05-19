<?php
/*
Template Name: Linktree
*/

// Handle the HOA Dropdown redirect
if ( isset( $_GET['hoa_url'] ) && ! empty( $_GET['hoa_url'] ) ) {
    $redirect_url = esc_url_raw( $_GET['hoa_url'] );
    wp_redirect( $redirect_url );
    exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Links | <?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
    <style>
        /* Base fallbacks to ensure colors load */
        body { font-family: 'Inter', sans-serif; }
        
        /* Brand Teal */
        .bg-adv-teal { background-color: #00A699; }
        .text-adv-teal { color: #00A699; }
        .border-adv-teal { border-color: #00A699; }
        
        /* Brand Gold */
        .bg-adv-gold { background-color: #C5A059; }
        .text-adv-gold { color: #C5A059; }
        .border-adv-gold { border-color: #C5A059; }
        .hover\:text-adv-gold:hover { color: #C5A059; }

        /* Storage Orange */
        .bg-storage-orange { background-color: #d97706; }
        .hover\:bg-storage-orange-dark:hover { background-color: #b46305; }
        
        /* Smooth Dropdown Fixes */
        details > summary { list-style: none; }
        details > summary::-webkit-details-marker { display: none; }
        details[open] summary svg.dropdown-arrow { transform: rotate(180deg); }
        
        /* Hide scrollbar for a cleaner app feel */
        ::-webkit-scrollbar { display: none; }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center py-10 px-4 relative bg-slate-50 antialiased overflow-x-hidden">
    
    <div class="fixed top-[-10%] left-[-10%] w-[50vw] h-[50vw] rounded-full bg-adv-teal opacity-10 blur-3xl z-0 pointer-events-none"></div>
    <div class="fixed bottom-[-10%] right-[-10%] w-[50vw] h-[50vw] rounded-full bg-slate-400 opacity-10 blur-3xl z-0 pointer-events-none"></div>

    <div class="w-full max-w-md bg-white/95 backdrop-blur-xl rounded-[2.5rem] shadow-[0_20px_50px_-12px_rgba(0,0,0,0.15)] border border-white p-6 sm:p-10 z-10 relative">
        
        <div class="mb-8 text-center flex flex-col items-center">
            <div class="relative group">
                <div class="absolute -inset-0.5 bg-gradient-to-r from-adv-teal to-teal-200 rounded-full blur opacity-40 group-hover:opacity-60 transition duration-500"></div>
                <img src="https://advancedrealty.com/wp-content/uploads/2026/05/Logo-3at-small.png" 
                     alt="Advanced Realty Logo" 
                     class="relative h-28 w-28 rounded-full shadow-md object-contain p-2.5 border-4 border-white bg-white">
            </div>
            <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight mt-5">Advanced Realty</h1>
            <p class="text-slate-500 mt-1 font-medium text-sm">Southern Utah's Premier Property Management</p>
        </div>

        <div class="space-y-4">

            <a href="<?php echo home_url('/real-estate'); ?>" class="group flex items-center justify-center w-full p-4 bg-adv-gold border-2 border-adv-gold text-white hover:bg-white hover:text-adv-gold font-bold rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                <span class="text-lg transition-colors duration-200">Real Estate (Buy/Sell)</span>
            </a>
            
            <a href="https://advancedrealty.com/rental-listings/" class="group flex items-center justify-center w-full p-4 bg-adv-teal text-white font-bold rounded-2xl shadow-md hover:shadow-xl hover:bg-[#008f83] transition-all duration-300 transform hover:-translate-y-1">
                <span class="text-lg">Available Rentals</span>
            </a>

            <details class="w-full group bg-slate-900 text-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden">
                <summary class="w-full p-4 font-bold cursor-pointer flex items-center justify-center hover:bg-slate-800 transition-colors outline-none select-none relative">
                    <span class="text-lg">HOA Portal</span>
                    <svg class="w-5 h-5 absolute right-6 transition-transform duration-300 dropdown-arrow opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7"></path></svg>
                </summary>
                
                <div class="px-4 pb-4 bg-slate-50 pt-4 border-t border-slate-700/50">
                    <form method="GET" action="" target="_blank" class="flex flex-col gap-3 w-full">
                        <select name="hoa_url" required class="block w-full px-3 py-3 text-sm sm:text-base border border-gray-200 focus:outline-none focus:ring-2 focus:ring-adv-teal focus:border-adv-teal rounded-xl shadow-sm bg-white text-gray-800 font-medium">
                            <option value="" disabled selected>Select your Community...</option>
                            <?php
                            $locations = get_nav_menu_locations();
                            if ( isset( $locations['hoa_menu'] ) && $locations['hoa_menu'] != 0 ) {
                                $menu_items = wp_get_nav_menu_items( $locations['hoa_menu'] );
                                if ( $menu_items ) {
                                    foreach ( $menu_items as $item ) { echo '<option value="' . esc_url($item->url) . '">' . esc_html($item->title) . '</option>'; }
                                } else { echo '<option value="" disabled>No communities in menu.</option>'; }
                            } else { echo '<option value="" disabled>Setup: Assign a menu to "HOA Communities Dropdown" in Appearance > Menus.</option>'; }
                            ?>
                        </select>
                        <button type="submit" class="w-full bg-slate-900 hover:bg-slate-800 text-white font-bold py-3 px-6 rounded-xl shadow-md hover:shadow-lg transition duration-150 flex items-center justify-center">
                            Go to Portal <svg class="w-4 h-4 ml-2 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                        </button>
                    </form>
                </div>
            </details>

            <a href="https://stgeorgestorage.com" target="_blank" class="group flex items-center justify-center w-full p-4 bg-storage-orange text-white font-bold rounded-2xl shadow-md hover:shadow-xl hover:bg-storage-orange-dark transition-all duration-300 transform hover:-translate-y-1">
                <span class="text-lg flex justify-center items-center gap-2">
                    Storage
                    <svg class="w-4 h-4 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                </span>
            </a>

            <details class="w-full group bg-white border-2 border-adv-teal/20 hover:border-adv-teal text-slate-800 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden">
                <summary class="w-full p-4 font-bold cursor-pointer flex items-center justify-center transition-colors outline-none select-none relative">
                    <span class="text-lg text-adv-teal">Request a Quote</span>
                    <svg class="w-5 h-5 text-adv-teal absolute right-6 transition-transform duration-300 dropdown-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7"></path></svg>
                </summary>
                
                <div class="px-4 pb-4 space-y-2 bg-slate-50 pt-2 border-t border-gray-100/50">
                    <a href="<?php echo home_url('/commercial-management'); ?>" class="block w-full p-3 text-center bg-white hover:bg-slate-100 hover:text-adv-teal text-slate-700 font-bold rounded-xl border border-gray-200 shadow-sm transition-all duration-200">
                        Commercial
                    </a>
                    <a href="<?php echo home_url('/residential-management'); ?>" class="block w-full p-3 text-center bg-white hover:bg-slate-100 hover:text-adv-teal text-slate-700 font-bold rounded-xl border border-gray-200 shadow-sm transition-all duration-200">
                        Residential
                    </a>
                    <a href="<?php echo home_url('/hoa-management'); ?>" class="block w-full p-3 text-center bg-white hover:bg-slate-100 hover:text-adv-teal text-slate-700 font-bold rounded-xl border border-gray-200 shadow-sm transition-all duration-200">
                        HOA
                    </a>
                </div>
            </details>

            <a href="<?php echo home_url('/contact'); ?>" class="group flex items-center justify-center w-full p-4 bg-slate-100 text-slate-700 font-bold rounded-2xl shadow-sm hover:shadow-md hover:bg-slate-200 transition-all duration-300 transform hover:-translate-y-1">
                <span class="text-lg">Contact Us Form</span>
            </a>

        </div>

        <div class="mt-8 pt-6 border-t border-gray-100">
            <div class="flex flex-col items-center gap-4">
                
                <div class="flex items-center justify-center gap-3 w-full">
                    <a href="tel:4356744343" class="flex-1 flex items-center justify-center gap-2 py-3 px-4 bg-teal-50 hover:bg-teal-100 text-adv-teal rounded-xl transition-colors duration-300 font-bold text-sm shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        Call Us
                    </a>
                    <a href="mailto:info@advancedrealty.com" class="flex-1 flex items-center justify-center gap-2 py-3 px-4 bg-teal-50 hover:bg-teal-100 text-adv-teal rounded-xl transition-colors duration-300 font-bold text-sm shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        Email Us
                    </a>
                </div>

                <div class="flex items-center justify-center gap-1.5 text-xs font-semibold text-slate-500 bg-slate-100 px-4 py-2 rounded-full border border-gray-200">
                    <svg class="w-3.5 h-3.5 text-adv-teal" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Mon-Fri: 9:00am - 5:00pm
                </div>

            </div>
        </div>

        <div class="mt-8 text-center">
            <a href="<?php echo home_url(); ?>" class="text-xs font-bold text-slate-300 hover:text-adv-teal transition-colors tracking-widest uppercase">advancedrealty.com</a>
        </div>
    </div>

    <?php wp_footer(); ?>
</body>
</html>
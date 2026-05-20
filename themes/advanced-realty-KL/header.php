<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?></title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">
    
    <?php wp_head(); ?>
</head>
<body <?php body_class('min-h-screen antialiased flex flex-col font-sans'); ?>>
<?php wp_body_open(); ?>

<header class="bg-white shadow-xl sticky top-0 z-50 border-b-4 border-adv-gold">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
        
        <a href="<?php echo home_url(); ?>" class="flex items-center space-x-2">
            <img src="https://advancedrealty.com/wp-content/uploads/2026/05/Logo-3at-small.png" 
                 onerror="this.style.display='none'; document.getElementById('logo-text-fallback').classList.remove('hidden');"
                 alt="Advanced Realty Logo" class="h-16 w-auto">
            <span id="logo-text-fallback" class="text-3xl font-extrabold text-adv-teal tracking-tight hidden">
                ADVANCED <span class="text-adv-gold">REALTY</span>
            </span>
        </a>
        
        <nav class="hidden md:flex space-x-4 items-center h-full">
            
            <div class="relative group h-full flex items-center">
                <button class="bg-slate-900 text-sm font-bold text-white hover:bg-slate-800 py-2.5 px-4 rounded-lg flex items-center shadow-md hover:shadow-lg transition duration-300">
                    Services
                    <i data-lucide="chevron-down" class="w-4 h-4 ml-1"></i>
                </button>
                <div class="dropdown-menu absolute left-0 top-full pt-2 w-64 opacity-0 invisible group-hover:opacity-100 group-hover:visible transform translate-y-2 group-hover:translate-y-0 z-50">
                    <div class="bg-white rounded-lg shadow-xl border border-gray-100 overflow-hidden">
                        <a href="<?php echo home_url('/real-estate'); ?>" class="block px-5 py-3 text-gray-800 hover:bg-gray-50 hover:text-adv-gold transition-colors text-sm font-medium border-b border-gray-50">Real Estate (Buy/Sell)</a>
                        <a href="https://advancedrealty.com/rental-listings/" class="block px-5 py-3 text-gray-800 hover:bg-gray-50 hover:text-adv-gold transition-colors text-sm font-medium border-b border-gray-50">Available Rentals</a>
                        <a href="<?php echo home_url('/residential-management'); ?>" class="block px-5 py-3 text-gray-800 hover:bg-gray-50 hover:text-adv-gold transition-colors text-sm font-medium border-b border-gray-50">Residential Management</a>
                        <a href="<?php echo home_url('/hoa-management'); ?>" class="block px-5 py-3 text-gray-800 hover:bg-gray-50 hover:text-adv-gold transition-colors text-sm font-medium border-b border-gray-50">HOA Management</a>
                        <a href="<?php echo home_url('/commercial-management'); ?>" class="block px-5 py-3 text-gray-800 hover:bg-gray-50 hover:text-adv-gold transition-colors text-sm font-medium">Commercial Management</a>
                    </div>
                </div>
            </div>
            
            <a href="https://stgeorgestorage.com" target="_blank" class="inline-flex items-center justify-center px-4 py-2 border-2 border-adv-gold text-sm font-bold rounded-lg text-adv-gold hover:bg-adv-gold hover:text-white transition-all duration-300 shadow-sm hover:shadow-md">
                Storage Facilities
                <i data-lucide="external-link" class="w-4 h-4 ml-2"></i>
            </a>
            
            <div class="relative group h-full flex items-center">
                <button class="bg-adv-gold text-sm font-bold text-white hover:bg-adv-gold-dark py-2.5 px-5 rounded-lg flex items-center shadow-md hover:shadow-lg transition duration-300">
                    Client Portals
                    <i data-lucide="chevron-down" class="w-4 h-4 ml-1"></i>
                </button>
                <div class="dropdown-menu absolute right-0 top-full pt-2 w-48 opacity-0 invisible group-hover:opacity-100 group-hover:visible transform translate-y-2 group-hover:translate-y-0 z-50">
                    <div class="bg-white rounded-lg shadow-xl border border-gray-100 overflow-hidden">
                        <a href="http://ownerwebaccess.rentmanager.com/OwnerLogin.aspx?CorpID=advr" target="_blank" class="block px-5 py-3 text-gray-800 hover:bg-gray-50 hover:text-adv-teal transition-colors text-sm font-medium border-b border-gray-50">Owner Portal</a>
                        <a href="<?php echo home_url('/Renter-resources'); ?>" class="block px-5 py-3 text-gray-800 hover:bg-gray-50 hover:text-adv-teal transition-colors text-sm font-medium border-b border-gray-50">Renter Portal</a>
                        <a href="https://advancedrealty.com/hoa-management/" class="block px-5 py-3 text-gray-800 hover:bg-gray-50 hover:text-adv-teal transition-colors text-sm font-medium border-b border-gray-50">HOA Portal</a>
                        <a href="http://residentwebaccess.rentmanager.com/CustomerLogin.aspx?corpid=advr" target="_blank" class="block px-5 py-3 text-gray-800 hover:bg-gray-50 hover:text-adv-teal transition-colors text-sm font-medium border-b border-gray-50">Commercial Portal</a>
                        <a href="http://residentwebaccess.rentmanager.com/CustomerLogin.aspx?corpid=advr" target="_blank" class="block px-5 py-3 text-gray-800 hover:bg-gray-50 hover:text-adv-teal transition-colors text-sm font-medium">Storage Portal</a>
                    </div>
                </div>
            </div>
        </nav>
        
        <div class="md:hidden flex flex-col items-end space-y-2 w-56">
            <div class="relative w-full">
                <button onclick="document.getElementById('mobile-services').classList.toggle('hidden')" class="bg-slate-900 text-sm font-bold text-white hover:bg-slate-800 py-2 px-4 rounded-lg flex items-center justify-between transition duration-150 w-full text-left shadow-md">
                    <span>Our Services</span>
                    <i data-lucide="chevron-down" class="w-4 h-4 ml-1 shrink-0"></i>
                </button>
                <div id="mobile-services" class="hidden absolute right-0 top-full mt-2 w-full bg-white rounded-lg shadow-xl border border-gray-200 overflow-hidden z-50">
                    <a href="<?php echo home_url('/real-estate'); ?>" class="block px-4 py-3 text-gray-800 hover:bg-gray-50 hover:text-adv-gold transition-colors text-sm font-medium border-b border-gray-50">Real Estate (Buy/Sell)</a>
                    <a href="https://advancedrealty.com/rental-listings/" class="block px-4 py-3 text-gray-800 hover:bg-gray-50 hover:text-adv-gold transition-colors text-sm font-medium border-b border-gray-50">Available Rentals</a>
                    <a href="<?php echo home_url('/residential-management'); ?>" class="block px-4 py-3 text-gray-800 hover:bg-gray-50 hover:text-adv-gold transition-colors text-sm font-medium border-b border-gray-50">Residential Mgmt</a>
                    <a href="<?php echo home_url('/hoa-management'); ?>" class="block px-4 py-3 text-gray-800 hover:bg-gray-50 hover:text-adv-gold transition-colors text-sm font-medium border-b border-gray-50">HOA Mgmt</a>
                    <a href="<?php echo home_url('/commercial-management'); ?>" class="block px-4 py-3 text-gray-800 hover:bg-gray-50 hover:text-adv-gold transition-colors text-sm font-medium">Commercial Mgmt</a>
                </div>
            </div>

            <div class="relative w-full">
                <button onclick="document.getElementById('mobile-client-portals').classList.toggle('hidden')" class="bg-adv-gold text-sm font-bold text-white hover:bg-adv-gold-dark py-2 px-4 rounded-lg flex items-center justify-between transition duration-150 w-full text-left shadow-md">
                    <span>Client Portals</span>
                    <i data-lucide="chevron-down" class="w-4 h-4 ml-1 shrink-0"></i>
                </button>
                <div id="mobile-client-portals" class="hidden absolute right-0 top-full mt-2 w-full bg-white rounded-lg shadow-xl border border-gray-200 overflow-hidden z-50">
                    <a href="http://ownerwebaccess.rentmanager.com/OwnerLogin.aspx?CorpID=advr" target="_blank" class="block px-4 py-3 text-gray-800 hover:bg-gray-50 hover:text-adv-teal transition-colors text-sm font-medium border-b border-gray-50">Owner Portal</a>
                    <a href="<?php echo home_url('/Renter-resources'); ?>" class="block px-4 py-3 text-gray-800 hover:bg-gray-50 hover:text-adv-teal transition-colors text-sm font-medium border-b border-gray-50">Renter Portal</a>
                    <a href="https://advancedrealty.com/hoa-management/" class="block px-4 py-3 text-gray-800 hover:bg-gray-50 hover:text-adv-teal transition-colors text-sm font-medium border-b border-gray-50">HOA Portal</a>
                    <a href="http://residentwebaccess.rentmanager.com/CustomerLogin.aspx?corpid=advr" target="_blank" class="block px-4 py-3 text-gray-800 hover:bg-gray-50 hover:text-adv-teal transition-colors text-sm font-medium border-b border-gray-50">Commercial Portal</a>
                    <a href="http://residentwebaccess.rentmanager.com/CustomerLogin.aspx?corpid=advr" target="_blank" class="block px-4 py-3 text-gray-800 hover:bg-gray-50 hover:text-adv-teal transition-colors text-sm font-medium">Storage Portal</a>
                </div>
            </div>

            <a href="<?php echo home_url('/contact'); ?>" class="bg-gray-100 hover:bg-gray-200 text-gray-900 border border-gray-300 font-bold py-2 px-4 rounded-lg shadow-sm transition duration-150 text-sm w-full text-center">
                Contact Us
            </a>
        </div>
    </div>
</header>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title><?php echo get_hoa_var('hoa_name'); ?> | Managed by <?php echo get_hoa_var('management_name'); ?></title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">
    
    <?php wp_head(); ?>
</head>
<body <?php body_class("min-h-screen flex flex-col antialiased"); ?>>

    <header class="bg-white shadow-xl sticky top-0 z-50 border-b-4 border-adv-gold">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
            
            <div class="flex flex-col">
                <h1 class="text-2xl md:text-3xl font-extrabold text-adv-teal leading-none tracking-tight">
                    <?php echo get_hoa_var('hoa_name'); ?>
                </h1>
                <p class="text-[10px] md:text-xs font-bold text-gray-500 uppercase tracking-widest mt-1">
                    Managed by <span class="text-adv-gold"><?php echo get_hoa_var('management_name'); ?></span>
                </p>
            </div>
            
            <a href="<?php echo get_hoa_var('management_url'); ?>" target="_blank" class="flex items-center space-x-2 group">
                 <img src="https://advancedrealty.com/wp-content/uploads/2026/05/Logo-3at-small.png" 
                      onerror="this.style.display='none'; document.getElementById('logo-text-fallback-hoa').classList.remove('hidden');"
                      alt="Management Logo" class="h-12 opacity-90 group-hover:opacity-100 transition duration-150">
                <span id="logo-text-fallback-hoa" class="text-xl font-extrabold text-adv-gold hidden">
                    <?php echo strtoupper(get_hoa_var('management_name')); ?>
                </span>
            </a>
        </div>
    </header>
    
    <main class="flex-grow bg-[#f7fbfd]">
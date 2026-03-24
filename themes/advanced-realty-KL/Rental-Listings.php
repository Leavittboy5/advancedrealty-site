<?php
/* Template Name: Advanced Realty - Rental Listings */
get_header(); 
?>

<section class="bg-gray-100 py-12 border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-center">
            
            <div class="flex flex-col gap-4 order-2 md:order-1 items-center md:items-start">
                <a href="https://advancedrealty.com/renter-resources/" class="w-full sm:w-64 justify-center inline-flex items-center bg-adv-teal hover:bg-adv-teal-dark text-white font-bold py-3 px-8 rounded-xl shadow-lg transition duration-300 transform hover:scale-105">
                    <i data-lucide="book-open" class="w-5 h-5 mr-2"></i>
                    View Renter Resources
                </a>
                <a href="#idx-listings" class="w-full sm:w-64 justify-center inline-flex items-center bg-white border-2 border-gray-200 hover:border-adv-teal text-gray-700 font-bold py-3 px-8 rounded-xl shadow-sm transition duration-300">
                    Browse Listings ↓
                </a>
            </div>

            <div class="md:col-span-2 text-center md:text-left order-1 md:order-2">
                <h1 class="text-4xl sm:text-5xl font-extrabold text-gray-900 mb-4">
                    Available Rentals in St. George & Washington County
                </h1>
                <p class="text-xl text-gray-600 max-w-3xl">
                    Find your next home with our current St. George rental listings. Browse available houses and apartments for rent throughout Southern Utah.
                </p>
            </div>

        </div>
    </div>
</section>

<section id="owner-quote" class="py-10 bg-gray-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col lg:flex-row justify-between items-center text-center lg:text-left">
        <div class="mb-6 lg:mb-0 max-w-2xl">
            <h2 class="text-3xl font-extrabold mb-2">
                Maximize Your Rental Income. Get a Free Management Quote Today.
            </h2>
            <p class="text-lg text-gray-300 opacity-90">
                See how our expert residential team can handle leasing, maintenance, and accounting for your St. George asset.
            </p>
        </div>
        <a href="https://advancedrealty.com/residential-management" class="bg-adv-teal hover:bg-adv-teal-dark text-white font-bold text-lg py-3 px-8 rounded-xl shadow-2xl transition duration-300 transform hover:scale-105 inline-block border-2 border-adv-teal hover:border-white">
            Request Management Quote &rarr;
        </a>
    </div>
</section>

<main id="idx-listings" class="py-12 min-h-[500px] bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <?php 
            /* The rental listings grid and side filters are handled by the RM Unit Availability plugin */
            echo do_shortcode('[rm_unitavailability]'); 
        ?>
    </div>
</main>

<section class="bg-sky-700 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center text-center md:text-left rounded-xl p-6 border-l-8 border-adv-teal shadow-xl bg-white">
        <div class="mb-6 md:mb-0">
            <h2 class="text-3xl font-extrabold text-gray-900">
                Moving In or Out? Need Temporary Storage?
            </h2>
            <p class="text-lg text-gray-700 mt-2">
                Advanced Realty manages local storage facilities, including climate-controlled and oversized units.
            </p>
        </div>
        <a href="https://stgeorgestorage.com" target="_blank" class="bg-adv-teal hover:bg-adv-teal-dark text-white font-bold text-lg py-3 px-8 rounded-xl shadow-2xl transition duration-300 transform hover:scale-105">
            Find Storage Near You &rarr;
        </a>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    });
</script>

<?php get_footer(); ?>
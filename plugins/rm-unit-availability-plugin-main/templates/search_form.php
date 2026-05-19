<?php
/* City Filter Logic */
$cityHTML = "";
if(have_rows('cities', 'options')){
    $cityHTML = '<div><label for="city" class="block text-sm font-medium text-gray-700 mb-1 md:text-left text-center">City</label><select name="city" id="city" class="block w-full pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-adv-gold focus:border-adv-gold sm:text-sm rounded-md shadow-sm"><option value="">All Cities</option>';
    $searchFields->addSearchField('cityeq', 'City', 'select');
    while(have_rows('cities', 'options') ) : the_row();
        $cityHTML .='<option value="'.get_sub_field('city').'">'.get_sub_field('city').'</option>';
        $searchFields->addSearchFieldOptions('cityeq', get_sub_field('city') );
    endwhile;
    $cityHTML .='</select></div>';
}

$searchHTML = '
<div class="flex flex-col gap-8 w-full">
    
    <div class="w-full flex justify-center">
        <form id="rmwb_search_form" class="unit-search bg-white p-6 rounded-xl shadow-lg border border-gray-200 w-full">
            
            <div class="flex flex-col md:flex-row gap-4 items-end justify-center">
                
                <div class="flex-1 w-full md:w-auto md:max-w-[200px]">
                    '.$cityHTML.'
                </div>

                <div class="flex-1 w-full md:w-auto md:max-w-[150px]">
                    <label for="min-rent" class="block text-sm font-medium text-gray-700 mb-1 md:text-left text-center">Min. Price</label>
                    <input type="number" id="min-rent" placeholder="$1000" class="block w-full pl-3 pr-3 py-2 text-base border border-gray-300 focus:outline-none focus:ring-adv-gold focus:border-adv-gold sm:text-sm rounded-md shadow-sm">
                </div>

                <div class="flex-1 w-full md:w-auto md:max-w-[150px]">
                    <label for="max-rent" class="block text-sm font-medium text-gray-700 mb-1 md:text-left text-center">Max. Price</label>
                    <input type="number" id="max-rent" placeholder="$3500" class="block w-full pl-3 pr-3 py-2 text-base border border-gray-300 focus:outline-none focus:ring-adv-gold focus:border-adv-gold sm:text-sm rounded-md shadow-sm">
                </div>
                
                <div class="flex-1 w-full md:w-auto md:max-w-[120px]">
                    <label for="bedrooms" class="block text-sm font-medium text-gray-700 mb-1 md:text-left text-center">Beds</label>
                    <select name="bedrooms" id="bedrooms" class="numeric-filter block w-full pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-adv-gold focus:border-adv-gold sm:text-sm rounded-md shadow-sm">
                        <option value="">Any</option>
                        <option value="1">1+</option>
                        <option value="2">2+</option>
                        <option value="3">3+</option>
                        <option value="4">4+</option>
                    </select>
                </div>

                <div class="flex-1 w-full md:w-auto md:max-w-[120px]">
                    <label for="bathrooms" class="block text-sm font-medium text-gray-700 mb-1 md:text-left text-center">Baths</label>
                    <select name="bathrooms" id="bathrooms" class="numeric-filter block w-full pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-adv-gold focus:border-adv-gold sm:text-sm rounded-md shadow-sm">
                        <option value="">Any</option>
                        <option value="1">1+</option>
                        <option value="2">2+</option>
                        <option value="3">3+</option>
                        <option value="4">4+</option>
                    </select>
                </div>
                
                <div class="flex-none w-full md:w-auto mt-4 md:mt-0">
                    <button id="submit_form" type="submit" class="w-full md:w-auto bg-adv-gold hover:bg-adv-gold-dark text-white font-bold py-2 px-8 rounded-md shadow transition duration-150 border border-transparent h-[42px] flex items-center justify-center text-center">
                        Search
                    </button>
                </div>
                
            </div>
        </form>
    </div>

    <div class="w-full">
';
echo $searchHTML;
?>
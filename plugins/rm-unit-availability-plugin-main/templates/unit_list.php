<?php
$coCode = get_field('co_code', 'options');
$fallback = get_field('default_listing_image', 'options');

$autoHTML = '<div class="rmwb_listings grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">';

foreach($unitList as $unit) {
    $location = !empty($unit->location) ? $unit->location : 'default';

    $rmBtns = "";
    if ((getBoolOptions($unit, 'unitListMojo'))) {
        $rmBtns .= '<a target="_blank" class="w-full text-center block bg-adv-gold hover:bg-adv-gold-dark text-white font-bold py-2 rounded-lg transition duration-150 mb-2" href="https://showmojo.com/rentmanager/'.$coCode.'/location='.$location.'/'.$unit->unitID.'">Schedule a Showing</a>';
    }
    if ((getBoolOptions($unit, 'unitListApply'))) {
        $rmBtns .= '<a target="_blank" class="w-full text-center block bg-gray-900 hover:bg-gray-800 text-white font-bold py-2 rounded-lg transition duration-150 mb-2" href="https://'.$coCode.'.twa.rentmanager.com/ApplyNow?locations='.$location.'&unitID='.$unit->unitID.'">Apply Now</a>';
    }
    if ((getBoolOptions($unit, 'unitListProp'))) {
        $rmBtns .= '<a class="w-full text-center block bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 rounded-lg transition duration-150 mb-2" href="/Property?pid='.$unit->propID.'">View Property</a>';
    }
    if ((getBoolOptions($unit, 'unitListDetail')))  {
        $locationQuery = "&location=".$location;
        $rmBtns .= '<a class="w-full text-center block bg-sky-700 hover:bg-sky-800 text-white font-bold py-2 rounded-lg transition duration-150" href="'.getLinkOptions($unit, 'unitDetailPage').'?uid='.$unit->unitID.$locationQuery.'">Details</a>';
    }

    // Safely structure all data sources
    $udf = !empty($unit->udf) ? $unit->udf : null;
    $marketing = !empty($unit->marketing) ? $unit->marketing : null;
    $prop = !empty($unit->property) ? $unit->property : null;
    $propUdf = (!empty($prop) && !empty($prop->udf)) ? $prop->udf : null;
    $propMarketing = (!empty($prop) && !empty($prop->marketing)) ? $prop->marketing : null;
    $sources = [$propUdf, $propMarketing, $udf, $marketing];

    // --- OMNI-FETCHER: PROMOTIONS ---
    $promoRaw = '';
    $promoKeys = ['promotion', 'promotions', 'promo', 'special', 'specials'];
    foreach ($sources as $src) {
        if ($promoRaw !== '') break;
        if (!$src) continue;
        if (!empty($src->marketingValues) && is_array($src->marketingValues)) {
            foreach ($src->marketingValues as $item) {
                if (isset($item->Name) && isset($item->Value)) {
                    $cleanName = strtolower(preg_replace('/[^a-zA-Z0-9]/', '', $item->Name));
                    if (in_array($cleanName, $promoKeys)) { $promoRaw = trim($item->Value); break; }
                }
            }
        }
        if ($promoRaw === '') {
            foreach ($promoKeys as $key) {
                if (isset($src->$key) && trim($src->$key) !== '') { $promoRaw = trim($src->$key); break; }
            }
        }
    }
    $promoBadge = '';
    if ($promoRaw !== '') {
        $promoBadge = '<span class="bg-red-600 text-white text-xs font-bold px-4 py-2 uppercase tracking-widest shadow-lg rounded-r-md">' . htmlspecialchars($promoRaw) . '</span>';
    }

    // --- OMNI-FETCHER: APP PENDING ---
    $appPendingRaw = '';
    $appPendingKeys = ['applicationpending', 'apppending'];
    foreach ($sources as $src) {
        if ($appPendingRaw !== '') break;
        if (!$src) continue;
        if (!empty($src->marketingValues) && is_array($src->marketingValues)) {
            foreach ($src->marketingValues as $item) {
                if (isset($item->Name) && isset($item->Value)) {
                    $cleanName = strtolower(preg_replace('/[^a-zA-Z0-9]/', '', $item->Name));
                    if (in_array($cleanName, $appPendingKeys)) { $appPendingRaw = trim($item->Value); break; }
                }
            }
        }
        if ($appPendingRaw === '') {
            foreach ($appPendingKeys as $key) {
                if (isset($src->$key) && trim($src->$key) !== '') { $appPendingRaw = trim($src->$key); break; }
            }
        }
    }
    $appPendingBadge = '';
    if (strtolower($appPendingRaw) === 'yes' || strtolower($appPendingRaw) === 'true') {
        $appPendingBadge = '<span class="bg-amber-500 text-white text-xs font-bold px-4 py-2 uppercase tracking-widest shadow-lg rounded-r-md">App. Pending</span>';
    }

    // Stack badges
    $leftBadges = '';
    if ($appPendingBadge !== '' || $promoBadge !== '') {
        $leftBadges = '<div class="absolute top-4 left-0 flex flex-col gap-2 items-start z-10">' . $promoBadge . $appPendingBadge . '</div>';
    }

    // --- UNIT NAME ---
    $uName = !empty($unit->name) ? $unit->name : null;
    $uName2 = !empty($unit->unitName) ? $unit->unitName : null;
    $unitNameRaw = $uName ? $uName : ($uName2 ? $uName2 : '');

    // Image setup
    $images = !empty($unit->images) ? $unit->images : null;
    $imageUrl = ($images && is_array($images) && isset($images[0]->url)) ? $images[0]->url : $fallback;
        
    // --- AVAILABILITY DATE ---
    $udfAvailDate = $udf ? $udf->availabilitydate : null;
    $availDateObj = !empty($unit->availDate) ? $unit->availDate : '';
    $dateAvailable = $udfAvailDate ? trim($udfAvailDate) : displayAvailability($availDateObj, "Now", 0);
    $availability = $dateAvailable; 

    // Formatting checks
    $sqft = !empty($unit->squarefootage) ? $unit->squarefootage : '-';
    $beds = !empty($unit->bedrooms) ? $unit->bedrooms : 'Studio';
    $baths = !empty($unit->bathrooms) ? $unit->bathrooms : '-';
    $rentValue = !empty($unit->marketrent) ? $unit->marketrent : 0;
    $rent = $rentValue ? '$' . number_format((float)$rentValue) . '/mo' : 'Call for Rent';

    $unitType = !empty($unit->unitType) ? $unit->unitType : '';
    $street = !empty($unit->street) ? $unit->street : 'Address Not Listed';
    $uid = !empty($unit->unitID) ? $unit->unitID : '';
    $csz = !empty($unit->csz) ? $unit->csz : '';

    $autoHTML .= '<div class="rmwb_listing-wrapper property-card bg-white rounded-xl overflow-hidden shadow-lg border-t-4 border-adv-gold flex flex-col relative" data-show="no" data-availability="'.$availability.'" data-unittype="'.$unitType.'" data-rent="'.$rentValue.'" data-street="'.$street.'" data-uid="'.$uid.'" data-availabledate="'.$availDateObj.'" data-bathrooms="'.$baths.'" data-bedrooms="'.$beds.'">
        
        '.$leftBadges.'
        
        <img class="w-full h-64 object-cover" src="'.$imageUrl.'" alt="'.$street.'">
        
        <div class="p-8 flex-grow flex flex-col">
            <div class="flex justify-between items-center mb-2">
                <p class="text-sm font-semibold text-adv-gold">Available: '.$dateAvailable.'</p>
                '.($unitNameRaw !== '' ? '<p class="text-sm font-bold text-gray-700 bg-gray-100 px-2 py-0.5 rounded">Unit: '.$unitNameRaw.'</p>' : '').'
            </div>
            
            <h3 class="text-2xl font-bold text-gray-900 mb-2 truncate">'.$street.'</h3>
            <p class="text-gray-600 mb-4">'.$csz.'</p>
            
            <div class="flex flex-col border-t border-gray-100 pt-5">
                <div class="flex justify-between items-baseline mb-5">
                    <span class="text-sm font-bold text-gray-700">Rent:</span>
                    <span class="text-3xl text-adv-gold font-extrabold">'.$rent.'</span>
                </div>
            </div>
            
            <div class="flex justify-around text-center text-gray-700 border-t border-gray-100 pt-5 mb-5">
                <div><p class="font-bold text-lg">'.$beds.'</p><p class="text-xs uppercase tracking-wider text-gray-500">Bed</p></div>
                <div><p class="font-bold text-lg">'.$baths.'</p><p class="text-xs uppercase tracking-wider text-gray-500">Bath</p></div>
                <div><p class="font-bold text-lg">'.$sqft.'</p><p class="text-xs uppercase tracking-wider text-gray-500">Sqft</p></div>
            </div>
            
            <div class="mt-auto pt-4 border-t border-gray-100 w-full">
                '.$rmBtns.'
            </div>
        </div>
    </div>';
}

$autoHTML .= '
    </div>
</div>
</div>
';

echo $autoHTML;
return $autoHTML; 
?>
<?php
$coCode = get_field('co_code', 'options');
$fallback = get_field('default_detail_image', 'options');

if (!empty($unit)) {
    $location = !empty($unit->location) ? $unit->location : 'default';
    
    // Fallback variable assignments
    $street = !empty($unit->street) ? $unit->street : 'Address Not Listed';
    $csz = !empty($unit->csz) ? $unit->csz : '';
    $beds = !empty($unit->bedrooms) ? $unit->bedrooms : '-';
    $baths = !empty($unit->bathrooms) ? $unit->bathrooms : '-';
    $sqft = !empty($unit->squarefootage) ? number_format((float)$unit->squarefootage) : '-';
    $rentValue = !empty($unit->marketrent) ? $unit->marketrent : 0;
    $rent = $rentValue ? '$' . number_format((float)$rentValue) : 'Call for Pricing';
    
    // Safely assign objects
    $udf = !empty($unit->udf) ? $unit->udf : null;
    $marketing = !empty($unit->marketing) ? $unit->marketing : null;
    $prop = !empty($unit->property) ? $unit->property : null;
    $propUdf = (!empty($prop) && !empty($prop->udf)) ? $prop->udf : null;
    $propMarketing = (!empty($prop) && !empty($prop->marketing)) ? $prop->marketing : null;
    $sources = [$propUdf, $propMarketing, $udf, $marketing];

    // --- AVAILABILITY DATE ---
    $udfAvailDate = $udf ? $udf->availabilitydate : null;
    $availDateObj = !empty($unit->availDate) ? $unit->availDate : '';
    $dateAvailable = $udfAvailDate ? trim($udfAvailDate) : displayAvailability($availDateObj, "Now", 0);
    
    // --- UNIT NAME BADGE ---
    $uName = !empty($unit->name) ? $unit->name : null;
    $uName2 = !empty($unit->unitName) ? $unit->unitName : null;
    $unitNameRaw = $uName ? $uName : ($uName2 ? $uName2 : '');
    $unitBadgeHTML = '';
    if (trim($unitNameRaw) !== '') {
        $unitBadgeHTML = '<span class="bg-gray-200 text-gray-800 text-xs sm:text-sm font-bold px-2.5 py-1 rounded-full">Unit: '.$unitNameRaw.'</span>';
    }

    // --- PROMOTIONS ---
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
    }
    $promoGalleryBadge = ($promoRaw !== '') ? '<span class="bg-red-600 text-white text-xs md:text-sm font-bold px-4 py-2 uppercase tracking-widest shadow-lg rounded-r-md">'.htmlspecialchars($promoRaw).'</span>' : '';

    // --- APP PENDING ---
    $appPendingRaw = '';
    foreach ($sources as $src) {
        if ($appPendingRaw !== '') break;
        if ($src && !empty($src->marketingValues)) {
            foreach ($src->marketingValues as $item) {
                $cleanName = strtolower(preg_replace('/[^a-zA-Z0-9]/', '', $item->Name));
                if ($cleanName === 'applicationpending') { $appPendingRaw = trim($item->Value); break; }
            }
        }
    }
    $appPendingBadge = (strtolower($appPendingRaw) === 'yes') ? '<span class="bg-amber-500 text-white text-xs md:text-sm font-bold px-4 py-2 uppercase tracking-widest shadow-lg rounded-r-md">App. Pending</span>' : '';

    $leftBadges = '<div class="absolute top-4 left-0 flex flex-col gap-2 items-start z-10">'.$promoGalleryBadge.$appPendingBadge.'</div>';

    // --- ADDITIONAL FEES ---
    $addFeesRaw = '';
    foreach ($sources as $src) {
        if ($addFeesRaw !== '') break;
        if ($src && !empty($src->marketingValues)) {
            foreach ($src->marketingValues as $item) {
                $cleanName = strtolower(preg_replace('/[^a-zA-Z0-9]/', '', $item->Name));
                if (in_array($cleanName, ['additionalfeesutilities', 'additionalfees'])) { $addFeesRaw = trim($item->Value); break; }
            }
        }
    }
    $addFeesHTML = ($addFeesRaw !== '') ? '<div class="mt-6 bg-gray-50 border border-gray-200 rounded-lg p-5 shadow-sm"><h4 class="text-lg font-extrabold text-gray-900 mb-2">Additional Fees & Utilities</h4><p class="text-gray-700 text-sm md:text-base leading-relaxed whitespace-pre-line break-words">'.htmlspecialchars($addFeesRaw).'</p></div>' : '';

    // --- DEEP DISCOVERY DESCRIPTION LOGIC ---
    $finalDesc = null;

    // 1. Check Property UDFs (Strictly Priority)
    if ($propUdf) {
        if (!empty($propUdf->description)) { $finalDesc = $propUdf->description; }
        elseif (!empty($propUdf->propertydescription)) { $finalDesc = $propUdf->propertydescription; }
        elseif (!empty($propUdf->marketingdescription)) { $finalDesc = $propUdf->marketingdescription; }
    }

    // 2. Check Unit UDFs & Marketing Array
    if (empty($finalDesc) && $udf) {
        if (!empty($udf->unitdescription)) { $finalDesc = $udf->unitdescription; }
        elseif (!empty($udf->description)) { $finalDesc = $udf->description; }
        
        // Loop through the UDF array just in case it's trapped in the format shown in the dump
        if (empty($finalDesc) && !empty($udf->marketingValues)) {
            foreach ($udf->marketingValues as $item) {
                if (strtolower($item->Name) === 'description' && !empty(trim($item->Value))) {
                    $finalDesc = trim($item->Value);
                    break;
                }
            }
        }
    }

    // 3. Last Resort: Check Base Marketing Objects
    if (empty($finalDesc)) {
        if ($propMarketing && !empty($propMarketing->description)) { $finalDesc = $propMarketing->description; }
        elseif ($marketing && !empty($marketing->description)) { $finalDesc = $marketing->description; }
    }

    $desc = !empty($finalDesc) ? $finalDesc : 'No description available.';
    
    // Security Deposit & Cleaning Fee
    $sd = $udf ? $udf->securitydeposit : ($udf ? $udf->deposit : '');
    $secDep = (trim($sd) !== '') ? (is_numeric(str_replace(['$', ','], '', $sd)) ? '$' . number_format((float)str_replace(['$', ','], '', $sd)) : $sd) : 'Call for Details';
    $cf = $udf ? $udf->cleaningfee : '';
    $cleanFee = (trim($cf) !== '') ? (is_numeric(str_replace(['$', ','], '', $cf)) ? '$' . number_format((float)str_replace(['$', ','], '', $cf)) : $cf) : 'Call for Details';

    $applyLink = "https://" . $coCode . ".twa.rentmanager.com/ApplyNow?locations=" . $location . "&unitID=" . $unit->unitID;

    // Gallery Logic
    $images = !empty($unit->images) ? $unit->images : null;
    $imageSources = [];
    if ($images && is_array($images)) {
        foreach($images as $img) { if (!empty($img->url)) { $imageSources[] = $img->url; } }
    }
    if (empty($imageSources)) { $imageSources[] = $fallback; }
    
    $thumbnailsHTML = '';
    foreach($imageSources as $index => $url) {
        $activeClass = $index === 0 ? 'border-adv-teal opacity-100 scale-105' : 'border-transparent opacity-60';
        $thumbnailsHTML .= '<div class="snap-center shrink-0">
            <img src="'.$url.'" class="property-thumbnail w-24 h-16 md:w-32 md:h-20 object-cover rounded-lg cursor-pointer border-2 transition duration-300 '.$activeClass.'" onclick="changeMainImage(this, \''.$url.'\', '.$index.')" alt="Thumbnail">
        </div>';
    }
    $jsImageArray = json_encode($imageSources);

    // Amenities
    $amenitiesHTML = '';
    $amenityList = !empty($unit->amenities) ? $unit->amenities : null;
    if($amenityList) {
        foreach((array)$amenityList as $amenity) {
            $amenitiesHTML .= '<li class="flex items-start"><svg class="w-5 h-5 mr-2 mt-0.5 text-adv-teal flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg><span class="break-words">'.trim($amenity).'</span></li>';
        }
    }

    $uStreet = !empty($unit->street) ? $unit->street : '';
    $mapStreet = urlencode(explode('#', $uStreet)[0]);
    $mapURL = "https://maps.google.com/maps?f=q&source=s_q&hl=en&q=" . $mapStreet . ",_" . urlencode($unit->city) . "," . urlencode($unit->state) . "," . urlencode($unit->zip) . "&ie=UTF8&hq=&hnear=" . $mapStreet . "&output=embed&z=14";

    $autoHTML = '
    <style>
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        #thumbnail-gallery { 
            display: flex !important;
            flex-wrap: nowrap !important;
            overflow-x: auto !important;
            scroll-snap-type: x mandatory !important;
            -webkit-overflow-scrolling: touch !important;
            scroll-behavior: smooth;
            gap: 12px;
        }
        @media (max-width: 768px) {
            #main-image-container { height: 250px !important; min-height: 250px !important; }
        }
    </style>
    <div class="rmwb_unit_detail antialiased w-full max-w-full overflow-x-hidden pb-10">
        <div class="mb-4">
            <a href="javascript:history.back()" class="text-gray-700 hover:text-adv-teal font-semibold transition text-sm flex items-center w-fit">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Back to Listings
            </a>
        </div>

        <div class="mb-6 border-b pb-4 w-full">
            <h1 class="text-3xl sm:text-5xl font-extrabold text-gray-900 leading-tight break-words mb-3">'.$street.'</h1>
            <p class="text-lg text-gray-600 mb-3">'.$csz.'</p>
            <div class="flex flex-wrap gap-2 items-center">
                <span class="bg-amber-100 text-amber-800 text-xs sm:text-sm font-semibold px-2.5 py-1 rounded-full">Available: '.$dateAvailable.'</span>
                '.$unitBadgeHTML.'
                <span class="bg-adv-teal text-white text-xs sm:text-sm font-semibold px-2.5 py-1 rounded-full">'.$beds.' Bed | '.$baths.' Bath | '.$sqft.' Sqft</span>
            </div>
        </div>

        <section class="mb-10 w-full min-w-0">
            <div id="main-image-container" class="w-full h-[300px] md:h-[500px] overflow-hidden rounded-xl shadow-2xl mb-4 bg-gray-100 relative group cursor-pointer" onclick="openLightbox()">
                '.$leftBadges.'
                <img id="main-property-image" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105" src="'.$imageSources[0].'" alt="'.$street.'">
                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-10 transition flex justify-center items-center">
                    <span class="text-white opacity-0 group-hover:opacity-100 font-bold bg-black bg-opacity-50 px-4 py-2 rounded-lg">Click to Enlarge</span>
                </div>
            </div>
            <div id="thumbnail-gallery" class="pb-4 hide-scrollbar">
                '.$thumbnailsHTML.'
            </div>
        </section>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 md:gap-12 w-full">
            <div class="lg:col-span-2 w-full">

                <section class="mb-10 w-full">
                    <h2 class="text-2xl md:text-3xl font-extrabold text-gray-900 mb-4 border-b pb-2">Home Description</h2>
                    <p class="text-gray-700 text-base md:text-lg leading-relaxed break-words whitespace-pre-line">'.$desc.'</p>
                    '.$addFeesHTML.'
                </section>
                <section class="mb-10 w-full">
                    <h2 class="text-2xl md:text-3xl font-extrabold text-gray-900 mb-4 border-b pb-2">Amenities & Details</h2>
                    <ul class="grid grid-cols-1 sm:grid-cols-2 gap-x-8 gap-y-3 text-gray-700">'.$amenitiesHTML.'</ul>
                </section>
                <section class="mb-10 p-5 md:p-6 bg-red-50 rounded-xl border-l-4 border-red-500 shadow-inner w-full min-w-0">
                    <h2 class="text-xl md:text-2xl font-extrabold text-gray-900 mb-2 border-b border-red-200 pb-2">Pet Policy & Requirements</h2>
                    <p class="text-gray-800 text-base md:text-lg leading-relaxed">
                     <span class="font-bold text-red-700">No Pets Policy:</span> This property and all Advanced Realty managed rental homes maintain a strict <strong>No Pets Allowed</strong> policy (excluding verified service animals). No exceptions can be made.
                </p>
                <ul class="mt-4 space-y-2 text-xs md:text-sm text-gray-600 font-medium">
                    <li>• A $40 application fee per adult is required.</li>
                    <li>• All applicants must meet minimum credit, income, and rental history requirements.</li>
                </ul>
                </section>
                <section class="mb-10 w-full">
                    <div class="bg-gray-200 rounded-xl shadow-inner h-64 md:h-80 w-full overflow-hidden border">
                        <iframe src="'.$mapURL.'" width="100%" height="100%" frameborder="0"></iframe>
                    </div>
                </section>
            </div>
            <div class="lg:col-span-1 w-full">
                <div class="sticky top-24 bg-white p-5 md:p-6 rounded-xl shadow-2xl border-t-8 border-adv-teal w-full">
                    <h3 class="text-xl md:text-2xl font-extrabold text-gray-900 mb-4">Pricing Summary</h3>
                    <div class="space-y-4 border-b pb-4 mb-5">
                        <div class="flex justify-between items-center gap-2"><span class="font-bold text-gray-700">Monthly Rent:</span><span class="text-2xl text-adv-teal font-extrabold">'.$rent.'</span></div>
                        <div class="flex justify-between items-center gap-2"><span class="text-sm font-bold text-gray-700">Security Deposit:</span><span class="font-bold">'.$secDep.'</span></div>
                        <div class="flex justify-between items-center gap-2"><span class="text-sm font-bold text-gray-700">Cleaning Fee:</span><span class="font-bold">'.$cleanFee.'</span></div>
                    </div>
                    <a href="'.$applyLink.'" target="_blank" class="w-full block text-center bg-gray-900 hover:bg-gray-800 text-white font-bold py-3 rounded-lg shadow-md transition">Apply Now Online</a>
                </div>
            </div>
        </div>
    </div>

    <div id="custom-lightbox" class="fixed inset-0 bg-black bg-opacity-95 z-[9999] hidden flex justify-center items-center">
        <button onclick="closeLightbox()" class="absolute top-4 right-4 text-white text-5xl">×</button>
        <button onclick="prevImage(event)" class="absolute left-2 text-white text-5xl p-4">❮</button>
        <button onclick="nextImage(event)" class="absolute right-2 text-white text-5xl p-4">❯</button>
        <div class="w-full h-full flex justify-center items-center p-4" id="lightbox-touch-area" onclick="closeLightbox()">
            <img id="lightbox-img" class="max-w-full max-h-full object-contain" src="">
        </div>
        <div id="lightbox-counter" class="absolute bottom-6 left-1/2 transform -translate-x-1/2 text-white font-bold text-sm bg-black bg-opacity-60 px-5 py-2 rounded-full tracking-widest z-50"></div>
    </div>

    <script>
        const galleryImages = '.$jsImageArray.';
        let currentImageIndex = 0;
        function changeMainImage(thumbElement, url, index) {
            document.getElementById("main-property-image").src = url;
            currentImageIndex = index;
            const thumbs = document.querySelectorAll(".property-thumbnail");
            thumbs.forEach(t => { t.classList.remove("border-adv-teal", "opacity-100", "scale-105"); t.classList.add("border-transparent", "opacity-60"); });
            thumbElement.classList.remove("border-transparent", "opacity-60");
            thumbElement.classList.add("border-adv-teal", "opacity-100", "scale-105");
            thumbElement.scrollIntoView({ behavior: "smooth", block: "nearest", inline: "center" });
        }
        function updateLightboxImage() { if (galleryImages.length > 0) { document.getElementById("lightbox-img").src = galleryImages[currentImageIndex]; document.getElementById("lightbox-counter").innerText = (currentImageIndex + 1) + " / " + galleryImages.length; } }
        function openLightbox() { updateLightboxImage(); document.getElementById("custom-lightbox").classList.remove("hidden"); document.body.style.overflow = "hidden"; }
        function closeLightbox() { document.getElementById("custom-lightbox").classList.add("hidden"); document.body.style.overflow = ""; }
        function prevImage(e) { if (e) e.stopPropagation(); currentImageIndex = (currentImageIndex - 1 + galleryImages.length) % galleryImages.length; updateLightboxImage(); }
        function nextImage(e) { if (e) e.stopPropagation(); currentImageIndex = (currentImageIndex + 1) % galleryImages.length; updateLightboxImage(); }
        let touchstartX = 0; let touchendX = 0;
        const touchArea = document.getElementById("lightbox-touch-area");
        touchArea.addEventListener("touchstart", e => { touchstartX = e.changedTouches[0].screenX; }, {passive: true});
        touchArea.addEventListener("touchend", e => { touchendX = e.changedTouches[0].screenX; if (touchendX < touchstartX - 50) nextImage(); if (touchendX > touchstartX + 50) prevImage(); }, {passive: true});
    </script>
    ';
    echo $autoHTML;
    return $autoHTML; 
}
?>
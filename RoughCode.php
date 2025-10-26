// foreach($flights as $index => $flight) {
    //     $segmentKey = $flight['SegmentKey'];
    //     $flightOffer = [];
    //     foreach($offers as $offer) {
    //         $segmentID = $offer['OfferItem'][0]['FareComponent'][0]['SegmentRefs'];
    //         $segmentID = explode(' ', $segmentID);
    //         if(in_array($segmentKey, $segmentID)) {
    //             $offers[array_search($offer, $offers)]['SegmentDetails'][] = $flight;
    //             $owners[] = $offer['OwnerName'];
    //             $owners   = array_unique($owners);
    //             $flightOffer[] = $offer; 
    //         }
    //     }
    //     $flights[$index]['offers'] = $flightOffer;
    // }
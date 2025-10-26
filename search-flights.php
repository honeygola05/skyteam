<?php
require 'helper.php';

$departure_from = isset($_POST['departure_from']) ? $_POST['departure_from'] : '';
$arrival_to     = isset($_POST['arrival_to']) ? $_POST['arrival_to'] : '';
$departure_date = isset($_POST['departure_date']) ? $_POST['departure_date'] : '';
$return_date    = isset($_POST['return_date']) ? $_POST['return_date'] : '';
$adults         = isset($_POST['adults']) ? intval($_POST['adults']) : 1;
$children       = isset($_POST['children']) ? intval($_POST['children']) : 0;
$cabin_class    = isset($_POST['cabin_class']) ? $_POST['cabin_class'] : 'Y';
$trip_type      = isset($_POST['trip_type']) ? $_POST['trip_type'] : 'ONEWAY';

$flightSearchResult = getFlightSearchResult($departure_from, $arrival_to, $departure_date, $return_date, $adults, $children, $cabin_class, $trip_type);
// if($trip_type == 'ROUND') {
//     $flightSearchResult = predefinedRoundTrip();
// } else {
//     $flightSearchResult = predefinedOneWayTrip(); // Use the predefined response for testing
// }

if(!isset($flightSearchResult)){
    header('Location: ../');
    exit;
}

// Check if AirlineOffers exist
if (isset($flightSearchResult['AirShoppingRS']['Success'])) {
    $shoppingResponseID    = $flightSearchResult['AirShoppingRS']['ShoppingResponseId'];
    $airlineOffers         = $flightSearchResult['AirShoppingRS']['OffersGroup']['AirlineOffers'][0];
    
    $lowest                = $airlineOffers['AirlineOfferSnapshot']['Lowest']['BookingCurrencyPrice'];
    $highest               = $airlineOffers['AirlineOfferSnapshot']['Highest']['BookingCurrencyPrice'];

    $originDestinationList = $flightSearchResult['AirShoppingRS']['DataLists']['OriginDestinationList']['OriginDestination'];

    $owners                = [];
    $stops                 = [];
    $offers                = $airlineOffers['Offer'];
    $flightSegments        = $flightSearchResult['AirShoppingRS']['DataLists']['FlightSegmentList']['FlightSegment'];
    $flightList            = $flightSearchResult['AirShoppingRS']['DataLists']['FlightList']['Flight'];
    $offersCount           = count($offers);

    $flightsData           = [];
    
    if(count($originDestinationList) == 2){
        if(!empty($originDestinationList[0]['FlightReferences'])) {
            $onewayFlights = explode(' ', $originDestinationList[0]['FlightReferences']);
        } else {
            $onewayFlights = [];
        }

        if(!empty($originDestinationList[1]['FlightReferences'])) {
            $roundTripFlights = explode(' ', $originDestinationList[1]['FlightReferences']);
        } else {
            $roundTripFlights = [];
        }
        for($i = 0; $i < count($onewayFlights); $i++) {
            $flightsData[$i]  = array(
                "oneway" =>       array(
                    "Departure" => $originDestinationList[0]['DepartureCode'],
                    "Arrival"   => $originDestinationList[0]['ArrivalCode'],
                    "FlghtKey"  => $onewayFlights[$i]
                ),
                "roundtrip" =>    array(
                    "Departure" => isset($originDestinationList[1]['DepartureCode']) ? $originDestinationList[1]['DepartureCode'] : '',
                    "Arrival"   => isset($originDestinationList[1]['ArrivalCode']) ? $originDestinationList[1]['ArrivalCode'] : '',
                    "FlghtKey"  => isset($roundTripFlights[$i]) ? $roundTripFlights[$i] : ''
                )
            );
        }
    } else {
        if(!empty($originDestinationList[0]['FlightReferences'])) {
            $onewayFlights = explode(' ', $originDestinationList[0]['FlightReferences']);
        } else {
            $onewayFlights = [];
        }
        for($i = 0; $i < count($onewayFlights); $i++) {
            $flightsData[$i]  = array(
                "oneway" =>       array(
                    "Departure" => $originDestinationList[0]['DepartureCode'],
                    "Arrival"   => $originDestinationList[0]['ArrivalCode'],
                    "FlghtKey"  => $onewayFlights[$i]
                )
            );
        }
    }

    foreach($flightsData as $index => $data){
        if(isset($data['roundtrip'])) {
            $onewayFlightKey = $data['oneway']['FlghtKey'];
            $roundTripFlightKey = $data['roundtrip']['FlghtKey'];
            foreach($flightList as $flightIndex => $flight) {
                $segmentRefs = $flight['SegmentReferences'];
                $segmentRefs = explode(' ', $segmentRefs);
                if($flight['FlightKey']  == $onewayFlightKey) {
                    $flightsData[$index]['oneway']['FlightDetails'] = $flight;
                    foreach($flightSegments as $segment){
                        if(in_array($segment['SegmentKey'], $segmentRefs)){
                            $flightsData[$index]['oneway']['SegmentDetails'][] = $segment;
                        }
                    }
                }
                else if($flight['FlightKey']  == $roundTripFlightKey) {
                    $flightsData[$index]['roundtrip']['FlightDetails'] = $flight;
                    foreach($flightSegments as $segment){
                        if(in_array($segment['SegmentKey'], $segmentRefs)){
                            $flightsData[$index]['roundtrip']['SegmentDetails'][] = $segment;
                        }
                    }
                }
            }
        }
        else{
            $onewayFlightKey = $data['oneway']['FlghtKey'];
            foreach($flightList as $flight) {
                $segmentRefs = $flight['SegmentReferences'];
                $segmentRefs = explode(' ', $segmentRefs);
                if($flight['FlightKey']  == $onewayFlightKey) {
                    $flightsData[$index]['oneway']['FlightDetails'] = $flight;
                    foreach($flightSegments as $segment){
                        if(in_array($segment['SegmentKey'], $segmentRefs)){
                            $flightsData[$index]['oneway']['SegmentDetails'][] = $segment;
                        }
                    }
                }
            }
        }
    }

    foreach($flightsData as $data){
        $owners[] = $data['oneway']['SegmentDetails'][0]['OperatingCarrier']['Name'] ?? '';
        $stops[] = $data['oneway']['FlightDetails']['Journey']['Stops'] ?? '';
        if(isset($data['roundtrip'])){
            $owners[] = $data['roundtrip']['SegmentDetails'][0]['OperatingCarrier']['Name'] ?? '';
            $stops[] = $data['roundtrip']['FlightDetails']['Journey']['Stops'] ?? '';
        }
    }

    $owners = array_filter(array_unique($owners), function($value) { return !empty($value); });
    $stops = array_unique($stops);
    sort($stops, SORT_NUMERIC);
        
} else {
    $lowest  = 0;
    $highest = 0;
    $offers  = [];
}
?>

<!DOCTYPE html>
<html lang="en" data-x="html" data-x-toggle="html-overflow-hidden">

<head>
    <?php include('include/head.php');  ?>
</head>

<body>
    <?php include('include/preloader.php') ?>
    <main>
        <?php include('include/header.php') ?>
        <section class="pt-90 pb-40">
            <div class="container">
                <?php include('include/flights-form.php') ?>
            </div>
        </section>
        <?php if(count($offers) > 0): ?>
        <section class="layout-pt-md layout-pb-md bg-light-2">
            <div class="container">
                <div class="row y-gap-30">
                    <!-- Filter -->
                    <div class="col-xl-3 col-lg-4">
                        <aside class="sidebar py-20 px-20 rounded-4 bg-white">
                            <div class="row y-gap-40">
                                <div class="sidebar__item -no-border">
                                    <h5 class="text-18 fw-500 mb-10">Stops</h5>
                                    <div class="sidebar-checkbox">
                                        <?php foreach ($stops as $stop): ?>
                                            <?php if ($stop === '' || $stop === null) continue; ?> <!-- skip empty values -->
                                            
                                            <div class="row y-gap-10 items-center justify-between">
                                                <div class="col-auto">
                                                    <div class="d-flex items-center">
                                                        <div class="form-checkbox">
                                                            <input type="checkbox" name="Stops" value="<?= htmlspecialchars($stop) ?>" checked>
                                                            <div class="form-checkbox__mark">
                                                                <div class="form-checkbox__icon icon-check"></div>
                                                            </div>
                                                        </div>

                                                        <div class="text-15 ml-10">
                                                            <?php 
                                                                if ($stop == 0) {
                                                                    echo 'Non-Stop';
                                                                } elseif ($stop == 1) {
                                                                    echo '1 Stop';
                                                                } else {
                                                                    echo '2+ Stops';
                                                                }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>

                                <!-- <div class="sidebar__item">
                                    <h5 class="text-18 fw-500 mb-10">Cabin</h5>
                                    <div class="sidebar-checkbox">

                                        <div class="row y-gap-10 items-center justify-between">
                                            <div class="col-auto">

                                                <div class="d-flex items-center">
                                                    <div class="form-checkbox ">
                                                        <input type="checkbox" name="name">
                                                        <div class="form-checkbox__mark">
                                                            <div class="form-checkbox__icon icon-check"></div>
                                                        </div>
                                                    </div>

                                                    <div class="text-15 ml-10">Basic Economy</div>

                                                </div>

                                            </div>

                                            <div class="col-auto">
                                                <div class="text-15 text-light-1">$92</div>
                                            </div>
                                        </div>

                                        <div class="row y-gap-10 items-center justify-between">
                                            <div class="col-auto">

                                                <div class="d-flex items-center">
                                                    <div class="form-checkbox ">
                                                        <input type="checkbox" name="name">
                                                        <div class="form-checkbox__mark">
                                                            <div class="form-checkbox__icon icon-check"></div>
                                                        </div>
                                                    </div>

                                                    <div class="text-15 ml-10">Economy</div>

                                                </div>

                                            </div>

                                            <div class="col-auto">
                                                <div class="text-15 text-light-1">$92</div>
                                            </div>
                                        </div>

                                        <div class="row y-gap-10 items-center justify-between">
                                            <div class="col-auto">

                                                <div class="d-flex items-center">
                                                    <div class="form-checkbox ">
                                                        <input type="checkbox" name="name">
                                                        <div class="form-checkbox__mark">
                                                            <div class="form-checkbox__icon icon-check"></div>
                                                        </div>
                                                    </div>

                                                    <div class="text-15 ml-10">Mixed</div>

                                                </div>

                                            </div>

                                            <div class="col-auto">
                                                <div class="text-15 text-light-1">$92</div>
                                            </div>
                                        </div>

                                    </div>
                                </div> -->

                                <!-- <div class="sidebar__item pb-30">
                                    <h5 class="text-18 fw-500 mb-20">Flight Times</h5>
                                    <div class="row x-gap-10 y-gap-30">

                                        <div class="col-12">
                                            <div class="js-time-rangeSlider">
                                                <div class="text-14 fw-500">Take-off Boston (BOS)</div>

                                                <div class="d-flex justify-between mb-15">
                                                    <div class="text-14 text-light-1">
                                                        Tue <span class="js-lower"></span>
                                                    </div>

                                                    <div class="text-14 text-light-1 js-upper"></div>
                                                </div>

                                                <div class="js-slider"></div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="js-time-rangeSlider">
                                                <div class="text-14 fw-500">Landing London (LON)</div>

                                                <div class="d-flex justify-between mb-15">
                                                    <div class="text-14 text-light-1">
                                                        Tue <span class="js-lower"></span>
                                                    </div>

                                                    <div class="text-14 text-light-1 js-upper"></div>
                                                </div>

                                                <div class="js-slider"></div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="js-time-rangeSlider">
                                                <div class="text-14 fw-500">Take-off London (LON)</div>

                                                <div class="d-flex justify-between mb-15">
                                                    <div class="text-14 text-light-1">
                                                        Tue <span class="js-lower"></span>
                                                    </div>

                                                    <div class="text-14 text-light-1 js-upper"></div>
                                                </div>

                                                <div class="js-slider"></div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="js-time-rangeSlider">
                                                <div class="text-14 fw-500">Landing Boston (BOS)</div>

                                                <div class="d-flex justify-between mb-15">
                                                    <div class="text-14 text-light-1">
                                                        Tue <span class="js-lower"></span>
                                                    </div>

                                                    <div class="text-14 text-light-1 js-upper"></div>
                                                </div>

                                                <div class="js-slider"></div>
                                            </div>
                                        </div>

                                    </div>
                                </div> -->

                                <div class="sidebar__item">
                                    <h5 class="text-18 fw-500 mb-10">Airlines</h5>
                                    <div class="sidebar-checkbox">
                                        <?php foreach($owners as $owner): ?>
                                        <div class="row y-gap-10 items-center justify-between">
                                            <div class="col-auto">

                                                <div class="d-flex items-center">
                                                    <div class="form-checkbox ">
                                                        <input type="checkbox" name="Airlines" checked value="<?php echo $owner; ?>">
                                                        <div class="form-checkbox__mark">
                                                            <div class="form-checkbox__icon icon-check"></div>
                                                        </div>
                                                    </div>

                                                    <div class="text-15 ml-10"><?php print_r($owner); ?></div>

                                                </div>

                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>

                                <div class="sidebar__item pb-30">
                                    <h5 class="text-18 fw-500 mb-10">Price</h5>
                                    <div class="row x-gap-10 y-gap-30">
                                        <div class="col-12">
                                            <div class="js-price-rangeSlider">
                                                <div class="text-14 fw-500"></div>

                                                <div class="px-5">
                                                    <input type="range" name="priceRange" class="form-range" min="<?= $lowest ?>" max="<?= $highest ?>" step="10" value="<?= $highest ?>" id="priceRange">
                                                </div>
                                                <div class="d-flex mb-20" style="justify-content: space-between;">
                                                    <span class="js-lower"> <?= $lowest ?></span>
                                                    <span class="js-cuurent-value"></span>
                                                    <span class="js-upper"> <?= $highest ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </aside>
                    </div>
                    <!-- Offers -->
                    <div class="col-xl-9 col-lg-8">
                        <div class="row y-gap-10 justify-between items-center">
                            <div class="col-auto">
                                <div class="text-18">
                                    <span class="fw-500">Total <span class="js-accordion-count"><?= $offersCount ?></span> offers found
                                </div>
                            </div>

                            <div class="col-auto">
                                <button class="button -blue-1 h-40 px-30 rounded-100 bg-blue-1-05 text-15 text-blue-1" data-sort="desc" onclick="sortFlights()">
                                    <i class="icon-up-down text-14 mr-10"></i>
                                    Sort
                                </button>
                            </div>
                        </div>
                        
                        <div class="offers-list">
                            <?php 
                                $serviceProvider   = '';
                                $onewayProvider    = '';
                                $roundTripProvider = '';
                                foreach($offers as $offer){ 
                                    $services = $offer['OfferItem'][0]['Service'];
                                    $flightDetails  = [];
                                    if(count($services) == 2){
                                        $onewayFlightRefs = $services[0]['FlightRefs'];
                                        $roundtripFlightRefs = $services[1]['FlightRefs'];
                                        foreach($flightsData as $flight){
                                            if($flight['oneway']['FlghtKey'] == $onewayFlightRefs){
                                                $flightDetails = $flight;
                                                $segmentDetails = $flight['oneway']['SegmentDetails'][0] ?? [];
                                                $serviceProvider = $segmentDetails['OperatingCarrier']['Name'];
                                                $onewayProvider  = $segmentDetails['OperatingCarrier']['AirlineID'];
                                            }
                                            if($flight['roundtrip']['FlghtKey'] == $roundtripFlightRefs){
                                                $flightDetails   = $flight;
                                                $segmentDetails  = $flight['roundtrip']['SegmentDetails'][0] ?? [];
                                                $serviceProvider = $segmentDetails['OperatingCarrier']['Name'];
                                                $roundTripProvider  = $segmentDetails['OperatingCarrier']['AirlineID'];
                                            }
                                        }
                                    }
                                    else{
                                        $onewayFlightRefs = $services[0]['FlightRefs'];
                                        foreach($flightsData as $flight){
                                            if($flight['oneway']['FlghtKey'] == $onewayFlightRefs){
                                                $flightDetails = $flight;
                                                $segmentDetails = $flight['oneway']['SegmentDetails'][0] ?? [];
                                                $serviceProvider = $segmentDetails['OperatingCarrier']['Name'];
                                                $onewayProvider  = $segmentDetails['OperatingCarrier']['AirlineID'];
                                            }
                                        }
                                    }
                                    $stops = $flightDetails['oneway']['FlightDetails']['Journey']['Stops'];
                            ?>
                            <div class="js-accordion" data-stops="<?= $stops; ?>" data-airlines="<?= $serviceProvider ?>">
                                <div class="accordion__item py-30 px-30 bg-white rounded-4 base-tr mt-30" data-x="flight-item-1" data-x-toggle="shadow-2">
                                    <div class="row y-gap-30 justify-between">
                                        <div class="col align-self-center">
                                            <div class="row y-gap-10 items-center">
                                                <div class="col-sm-auto">
                                                    <img class="width-100" src="https://images.daisycon.io/airline/?width=100&height=50&iata=<?= $onewayProvider; ?>" alt="<?=  $offer['OwnerName']; ?>">
                                                </div>
                                                
                                                <div class="col">
                                                    <div class="row x-gap-20 items-end">
                                                        <div class="col-auto">
                                                            <div class="lh-15 fw-500"><?= date('H:i', strtotime($flightDetails['oneway']['SegmentDetails'][0]['Departure']['Time'])) ?></div>
                                                            <div class="text-15 lh-15 text-light-1"><?= $flightDetails['oneway']['SegmentDetails'][0]['Departure']['AirportCode'] ?></div>
                                                        </div>

                                                        <div class="col text-center">
                                                            <div class="flightLine">
                                                                <div></div>
                                                                <div></div>
                                                            </div>
                                                            <div class="text-15 lh-15 text-light-1 mt-10">
                                                                <?php if($stops == 0){
                                                                    echo "Non Stop";
                                                                } else if($stops == 1){
                                                                    echo "1 Stop";
                                                                } else if($stops == 2){
                                                                    echo $stops." Stops";
                                                                } ?>
                                                            </div>
                                                        </div>

                                                        <div class="col-auto">
                                                            <div class="lh-15 fw-500"><?= date('H:i', strtotime($flightDetails['oneway']['SegmentDetails'][0]['Arrival']['Time'])) ?></div>
                                                            <div class="text-15 lh-15 text-light-1"><?= $flightDetails['oneway']['SegmentDetails'][0]['Arrival']['AirportCode'] ?></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-auto">
                                                    <div class="text-15 text-light-1 px-20 md:px-0"><?= $flightDetails['oneway']['FlightDetails']['Journey']['Time'] ?></div>
                                                </div>
                                            </div>
                                            <?php if(isset($flightDetails['roundtrip']) && isset($flightDetails['roundtrip']['SegmentDetails']) ){ ?>
                                                <div class="row y-gap-10 items-center pt-30">
                                                    <div class="col-sm-auto">
                                                        <img class="width-100" src="https://images.daisycon.io/airline/?width=100&height=50&iata=<?= $roundTripProvider; ?>" alt="<?=  $offer['OwnerName']; ?>">
                                                    </div>
                                                    <div class="col">
                                                        <div class="row x-gap-20 items-end">
                                                            <div class="col-auto">
                                                                <div class="lh-15 fw-500"><?= date('H:i', strtotime($flightDetails['roundtrip']['SegmentDetails'][0]['Departure']['Time'])) ?></div>
                                                                <div class="text-15 lh-15 text-light-1"><?= $flightDetails['roundtrip']['SegmentDetails'][0]['Departure']['AirportCode'] ?></div>
                                                            </div>

                                                            <div class="col text-center">
                                                                <div class="flightLine">
                                                                    <div></div>
                                                                    <div></div>
                                                                </div>
                                                                <div class="text-15 lh-15 text-light-1 mt-10">
                                                                    <?php if($flightDetails['roundtrip']['FlightDetails']['Journey']['Stops'] == 0){
                                                                        echo "Non Stop";
                                                                    } else if($flightDetails['roundtrip']['FlightDetails']['Journey']['Stops'] == 1){
                                                                        echo "1 Stop";
                                                                    } else if($flightDetails['roundtrip']['FlightDetails']['Journey']['Stops'] == 2){
                                                                        echo $flightDetails['roundtrip']['FlightDetails']['Journey']['Stops']." Stops";
                                                                    } ?>
                                                                </div>
                                                            </div>

                                                            <div class="col-auto">
                                                                <div class="lh-15 fw-500"><?= date('H:i', strtotime($flightDetails['roundtrip']['SegmentDetails'][0]['Arrival']['Time'])) ?></div>
                                                                <div class="text-15 lh-15 text-light-1"><?= $flightDetails['roundtrip']['SegmentDetails'][0]['Arrival']['AirportCode'] ?></div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-auto">
                                                        <div class="text-15 text-light-1 px-20 md:px-0"><?= $flightDetails['roundtrip']['FlightDetails']['Journey']['Time'] ?></div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <div class="col-md-auto">
                                            <div class="d-flex items-center h-full">
                                                <div class="pl-30 border-left-light h-full md:d-none"></div>

                                                <div>
                                                    <div class="text-right md:text-left mb-10">
                                                        <div class="text-18 lh-16 fw-500 price"><?=  $offer['BookingCurrencyCode']?> <?= $offer['TotalPrice']['BookingCurrencyPrice'] ?></div>
                                                    </div>

                                                    <div class="accordion__button">
                                                        <a href="flight-details.php?shoppingid=<?= $shoppingResponseID ?>&offerid=<?= $offer['OfferID'] ?>&adults=<?= $adults ?>&children=<?= $children ?>&cabinclass=<?= $cabin_class ?>&tripType=<?= $trip_type ?>" class="button -blue-1 px-30 h-50 bg-blue-1 text-white">View Offer</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php else: ?>
            <section class="layout-pt-md layout-pb-md">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center">
                                <h2 class="text-30 fw-600">No offers found</h2>
                                <p class="text-16 text-light-1 mt-10">Try adjusting your search criteria.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <section class="layout-pt-md layout-pb-md bg-dark-2">
            <div class="container">
                <div class="row y-gap-30 justify-between items-center">
                    <div class="col-auto">
                        <div class="row y-gap-20  flex-wrap items-center">
                            <div class="col-auto">
                                <div class="icon-newsletter text-60 sm:text-40 text-white"></div>
                            </div>

                            <div class="col-auto">
                                <h4 class="text-26 text-white fw-600">Your Travel Journey Starts Here</h4>
                                <div class="text-white">Sign up and we'll send the best deals to you</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-auto">
                        <div class="single-field -w-410 d-flex x-gap-10 y-gap-20">
                            <div>
                                <input class="bg-white h-60" type="text" placeholder="Your Email">
                            </div>

                            <div>
                                <button class="button -md h-60 bg-blue-1 text-white">Subscribe</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php include('include/footer.php') ?>
    </main>
    <?php include('include/foot.php') ?>
    <script>
        function sortFlights(order = 'desc') {
            const sortButton = document.querySelector('[data-sort]');
            order = sortButton.getAttribute('data-sort');
            const newOrder = order === 'asc' ? 'desc' : 'asc';
            // 1️⃣ Select the container that holds all flight offers
            const offersContainer = document.querySelector('.offers-list');

            // 2️⃣ Get all the offer elements inside
            const offers = Array.from(offersContainer.querySelectorAll('.js-accordion'));

            // 3️⃣ Sort the offers by price
            offers.sort((a, b) => {
                const priceA = parseFloat(
                    a.querySelector('.text-18.lh-16.fw-500')?.textContent.replace(/[^0-9.]/g, '') || 0
                );
                const priceB = parseFloat(
                    b.querySelector('.text-18.lh-16.fw-500')?.textContent.replace(/[^0-9.]/g, '') || 0
                );

                console.log(priceA, priceB);

                return order === 'asc' ? priceA - priceB : priceB - priceA;
            });

            // 4️⃣ Re-append sorted offers to the container
            offersContainer.innerHTML = '';
            offers.forEach(offer => offersContainer.appendChild(offer));

            // 5️⃣ Update the button state
            sortButton.setAttribute('data-sort', newOrder);
        }

        // Stops Filter
        $("input[name='Stops']").on('change', function() {
            // Get selected stop filters (e.g. ["0","1"])
            var selectedStops = $("input[name='Stops']:checked").map(function() {
                return $(this).val();
            }).get();

            // Loop through all flight offers
            $(".offers-list .js-accordion").each(function() {
                var offerStops = $(this).data('stops'); // value from data-stops attribute

                // If no filter selected, show all
                if (selectedStops.length === 0) {
                    $(this).show();
                    return;
                }

                // If offer has 2+ stops, match with "2"
                if (offerStops >= 2 && selectedStops.includes("2")) {
                    $(this).show();
                }
                // Otherwise, match exactly (0 or 1)
                else if (selectedStops.includes(offerStops.toString())) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
            updateofferCount();
        });

        // Airlines Filter
        document.addEventListener('DOMContentLoaded', () => {
            const checkboxes = document.querySelectorAll('input[name="Airlines"]');
            const offers = document.querySelectorAll('.offers-list .js-accordion');

            // Run once initially
            filterFlights();

            // Listen for checkbox changes
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', filterFlights);
            });

            function filterFlights() {
                // Get all selected airlines
                const selectedAirlines = Array.from(checkboxes)
                    .filter(cb => cb.checked)
                    .map(cb => cb.value.toLowerCase());

                offers.forEach(offer => {
                    const airline = offer.getAttribute('data-airlines')?.trim().toLowerCase();

                    // Show if airline is selected OR if "all" are selected
                    if (selectedAirlines.length === 0 || selectedAirlines.includes(airline)) {
                        offer.style.display = '';
                    } else {
                        offer.style.display = 'none';
                    }
                });
                updateofferCount();
            }
        });


        // Price Range Slider
        $("input[name='priceRange']").on('input change', function() {
            var maxPrice = parseFloat($(this).val());
            $('.js-cuurent-value').text(maxPrice);

            // Loop through all offers
            $('.js-accordion').each(function() {
                var priceText = $(this).find('.price').text();
                var priceValue = parseFloat(priceText.replace(/[^0-9.]/g, ''));

                // Show/hide based on range
                if (priceValue <= maxPrice) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });

            // Update count after filtering
            updateofferCount();
        });

        // Initialize current value display
        function updateofferCount(){
            // Select all visible .js-accordion elements
            const visibleOffers = document.querySelectorAll('.js-accordion:not([style*="display: none"])');
            const count = visibleOffers.length;
            document.querySelector('.js-accordion-count').textContent = `${count}`;
        }

    </script>
</body>

</html>
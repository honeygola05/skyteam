<?php
require 'helper.php';

$shoppingResponseID     = $_GET['shoppingid'] ?? null;
$offerID                = $_GET['offerid'] ?? null;
$adults                 = $_GET['adults'] ?? 1;
$children               = $_GET['children'] ?? 0;
$cabinClass             = $_GET['cabinclass'] ?? 'Y';
$tripType               = $_GET['tripType'] ?? 'oneway';

if ($shoppingResponseID !== null && $offerID !== null) {
    // $offerDetails       = getOfferDetails($shoppingResponseID, $offerID, $adults, $children, $cabinClass, $tripType);
    $offerDetails       = predefinedOfferPrice();

    if (isset($offerDetails['OfferPriceRS']['Success'])) {
        $shoppingResponseID = $offerDetails['OfferPriceRS']['ShoppingResponseId'];
        $OfferResponseId    = $offerDetails['OfferPriceRS']['OfferResponseId'];
        $offerPricing       = $offerDetails['OfferPriceRS']['PricedOffer'];
        $flightDetails      = $offerDetails['OfferPriceRS']['DataLists'];
        $stops              = $flightDetails['FlightList']['Flight'][0]['Journey']['Stops'];
        $AircarrierName     = $flightDetails['FlightSegmentList']['FlightSegment'][0]['MarketingCarrier']['Name'];
        $AircarrierCode     = $flightDetails['FlightSegmentList']['FlightSegment'][0]['MarketingCarrier']['AirlineID'];
    }
    else{
        $error              = $offerDetails['OfferPriceRS']['Errors'];
    }
} else {
    header('Location: ../');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en" data-x="html" data-x-toggle="html-overflow-hidden">
<head>
    <?php include('include/head.php');  ?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>
<body>
    <?php include('include/preloader.php') ?>
    <main>
        <?php include('include/header.php') ?>
        <section class="layout-pt-md layout-pb-md bg-light-2 pt-40 pb-40">
            <div class="container">
                <div class="row y-gap-30">
                    <div class="col-xl-12 col-lg-12">

                        <div class="js-accordion pt-40">
                            <?php if (isset($error)): ?>
                                <div class="accordion__item py-30 px-30 bg-white rounded-4 base-tr mt-30" data-x="flight-item-1" data-x-toggle="shadow-2">
                                    <div class="text-center py-30 mt-30 mb-30">
                                        <h2>Error Code: <?= $error['Error']['Code']; ?></h2>
                                        <h2>Some thing went wrong</h2>
                                        <p><?= $error['Error']['Value']; ?></p>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="accordion__item py-30 px-30 bg-white rounded-4 base-tr mt-30" data-x="flight-item-1" data-x-toggle="shadow-2">
                                    <div class="accordion__content" style="max-height: 100%;">
                                        <div class="flex justify-between items-center">
                                            <h5 class="h5 text-primary flex items-center font-medium">
                                                <span class=""><?= $flightDetails['OriginDestinationList']['OriginDestination'][0]['DepartureCode'] ?></span>
                                                <svg width="1em" height="1em" font-size="1.5rem" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-testid="ArrowRightIcon" style="user-select: none; display: inline-block;">
                                                    <path fill-rule="evenodd" d="M18.7669 12a.725.725 0 0 1-.2127.5131l-6.0481 6.0425a.7254.7254 0 1 1-1.0253-1.0262l4.8085-4.8041H5.9585a.7253.7253 0 1 1 0-1.4506h10.3308l-4.8085-4.804a.7253.7253 0 1 1 1.0253-1.0263l6.0481 6.0425a.725.725 0 0 1 .2127.5131" clip-rule="evenodd"></path>
                                                </svg>
                                                <span class=""> <?= $flightDetails['OriginDestinationList']['OriginDestination'][0]['ArrivalCode'] ?></span>
                                            </h5>
                                            <p class="body-sm text-primary ">
                                            <ul class="unordered-list d-flex x-gap-15">
                                                <li><?= date('D, j M', strtotime($flightDetails['FlightSegmentList']['FlightSegment'][0]['Departure']['Date'])) ?></li>
                                                <li><?php $StopCount = $stops;
                                                    echo ($StopCount == 0) ? 'Non-stop' : $StopCount . ' stops'; ?></li>
                                                <li><?php if ($StopCount > 1) {
                                                        $total_hours = 0;
                                                        $total_minutes = 0;

                                                        foreach ($flightDetails['FlightSegmentList']['FlightSegment'] as $key => $segment) {
                                                            $departure_date = $segment['Departure']['Date'];
                                                            $departure_time = $segment['Departure']['Time'];
                                                            $arrival_date = $segment['Arrival']['Date'];
                                                            $arrival_time = $segment['Arrival']['Time'];

                                                            $departure_datetime = new DateTime($departure_date . ' ' . $departure_time);
                                                            $arrival_datetime = new DateTime($arrival_date . ' ' . $arrival_time);

                                                            $interval = $departure_datetime->diff($arrival_datetime);

                                                            // Duration for this segment
                                                            $segment_hours = $interval->h + ($interval->days * 24);
                                                            $segment_minutes = $interval->i;

                                                            // Add to totals
                                                            $total_hours += $segment_hours;
                                                            $total_minutes += $segment_minutes;
                                                        }

                                                        // Convert extra minutes into hours
                                                        if ($total_minutes >= 60) {
                                                            $extra_hours = floor($total_minutes / 60);
                                                            $total_hours += $extra_hours;
                                                            $total_minutes = $total_minutes % 60;
                                                        }
                                                    } else {
                                                        echo $flightDetails['FlightSegmentList']['FlightSegment'][0]['FlightDetail']['FlightDuration']['Value'];
                                                    } ?>
                                                </li>
                                                <li><?= checkCabinType($offerPricing[0]['OfferItem'][0]['FareComponent'][0]['FareBasis']['CabinType']); ?></li>
                                            </ul>
                                            </p>
                                            <p><?= $AircarrierName ?> | <?= $flightDetails['FlightSegmentList']['FlightSegment'][0]['Equipment']['Name'] ?></p>
                                        </div>
                                        <?php foreach ($flightDetails['FlightSegmentList']['FlightSegment'] as $flightDetail): ?>
                                            <div class="border-light rounded-4 mt-30">
                                                <div class="py-20 px-30">
                                                    <div class="row justify-between items-center">
                                                        <div class="col-auto">
                                                            <div class="fw-500 text-dark-1">Depart • <?= date('D, j M', strtotime($flightDetail['Departure']['Date'])) ?></div>
                                                        </div>
                                                        <div class="col-auto">
                                                            <div class="text-14 text-light-1"><?= date('H:i A', strtotime($flightDetail['Departure']['Time'])) ?></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="py-30 px-30 border-top-light">
                                                    <div class="row y-gap-10 justify-between">
                                                        <div class="col-auto">
                                                            <div class="d-flex items-center mb-15">
                                                                <!-- <div class="w-28 d-flex justify-center mr-15">
                                                            <img src="img/flights/1.png" alt="image">
                                                        </div> -->

                                                                <div class="text-14 text-light-1"><?= $offerPricing[0]['OwnerName'] . ' ' . $flightDetail['Equipment']['Name'] ?></div>
                                                            </div>

                                                            <div class="relative z-0">
                                                                <div class="border-line-2"></div>

                                                                <div class="d-flex items-center">
                                                                    <div class="w-28 d-flex justify-center mr-15">
                                                                        <div class="size-10 border-light rounded-full bg-white"></div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-auto">
                                                                            <div class="lh-14 fw-500"><?= date('H:i A', strtotime($flightDetail['Departure']['Time'])) ?></div>
                                                                        </div>
                                                                        <div class="col-auto">
                                                                            <div class="lh-14 fw-500"><?= $flightDetail['Departure']['AirportName'];  ?> (Terminal <?= $flightDetail['Departure']['Terminal']['Name'] ?>)</div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="d-flex items-center mt-15">
                                                                    <div class="w-28 d-flex justify-center mr-15">
                                                                        <img src="img/flights/plane.svg" alt="image">
                                                                    </div>

                                                                    <div class="text-14 text-light-1"><?= $flightDetail['FlightDetail']['FlightDuration']['Value'] ?></div>
                                                                </div>

                                                                <div class="d-flex items-center mt-15">
                                                                    <div class="w-28 d-flex justify-center mr-15">
                                                                        <div class="size-10 border-light rounded-full bg-border"></div>
                                                                    </div>

                                                            <div class="row">
                                                                <div class="col-auto">
                                                                    <div class="lh-14 fw-500"><?= date('H:i A', strtotime($flightDetail['Arrival']['Time'])) ?></div>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <div class="lh-14 fw-500"><?= $flightDetail['Arrival']['AirportName'];  ?> (Terminal <?= $flightDetail['Arrival']['Terminal']['Name'] ?>)</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-auto text-right md:text-left">
                                                    <div class="text-14 text-light-1"><?= checkCabinType($offerPricing[0]['OfferItem'][0]['FareComponent'][0]['FareBasis']['CabinType']) ?></div>
                                                    <div class="text-14 mt-15 md:mt-5">
                                                        <?= $flightDetail['Equipment']['Name'] ?> (Narrow-body jet)<br>
                                                        Check-in : <?= $flightDetails['BaggageAllowanceList']['BaggageAllowance'][0]['PieceAllowance']['TotalQuantity'] .' '. $flightDetails['BaggageAllowanceList']['BaggageAllowance'][0]['PieceAllowance']['Unit'] ?><br>
                                                        Seats Left: <?= $offerPricing[0]['OfferItem'][0]['FareComponent'][0]['FareBasis']['SeatLeft'] ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="py-30 px-30 border-top-light">
                                                <form id="travellerForm">
                                                    <?php $travellers = $adults + $children;
                                                        for($i = 1; $i <= $travellers; $i++) { 
                                                            $isAdult = $i <= $adults;
                                                            $travellerType = $isAdult ? 'Adult' : 'Child';
                                                            $index = $isAdult ? $i : $i - $adults;
                                                        ?>
                                                        <div class="row <?= ($i > 1) ? 'mt-30' : '' ?>">
                                                            <h5><?= $travellerType . ' ' . $index ?></h5>
                                                            <div class="col-md-2 col-sm-12">
                                                                <label for="traveller-<?= $i + 1 ?>-title" class="text-14 text-light-1">Title</label>
                                                                <select name="title[]" id="traveller-<?= $i + 1 ?>-title" class="form-select" style="padding:5px; border:1px solid #ddd; border-radius:5px;">
                                                                    <option value="Mr">Mr</option>
                                                                    <option value="Miss">Miss</option>
                                                                    <option value="Mrs">Mrs</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4 col-sm-12">
                                                                <label for="traveller-<?= $i + 1 ?>-first-name" class="text-14 text-light-1">First Name</label>
                                                                <input type="text" name="first-name[]" id="traveller-<?= $i + 1 ?>-first-name" class="form-control" required style="padding:5px; border:1px solid #ddd; border-radius:5px;">
                                                                <span class="error text-danger first-name-error font-12"></span>
                                                            </div>
                                                            <div class="col-md-4 col-sm-12">
                                                                <label for="traveller-<?= $i + 1 ?>-first-name" class="text-14 text-light-1">Middle Name(optional)</label>
                                                                <input type="text" name="middle-name[]" id="traveller-<?= $i + 1 ?>-middle-name" class="form-control" required style="padding:5px; border:1px solid #ddd; border-radius:5px;">
                                                            </div>
                                                            <div class="col-md-4 col-sm-12">
                                                                <label for="traveller-<?= $i + 1 ?>-last-name" class="text-14 text-light-1">Last Name</label>
                                                                <input type="text" name="last-name[]" id="traveller-<?= $i + 1 ?>-last-name" class="form-control" required style="padding:5px; border:1px solid #ddd; border-radius:5px;">
                                                                <span class="error text-danger last-name-error font-12"></span>
                                                            </div>
                                                            <div class="col-md-4 col-sm-12">
                                                                <label for="traveller-<?= $i + 1 ?>-date-of-birth" class="text-14 text-light-1">Date of Birth</label>
                                                                <input type="date" name="dob[]" id="traveller-<?= $i + 1 ?>-date-of-birth" class="form-control" required style="padding:5px; border:1px solid #ddd; border-radius:5px;">
                                                                <span class="error text-danger dob-error font-12"></span>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="border-light rounded-4 mt-30">
                                            <div class="py-20 px-30">
                                                <div class="row justify-between items-center">
                                                    <div class="col-auto">
                                                        <div class="fw-500 text-dark-1">Contact Details</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="py-30 px-30 border-top-light">
                                                <form id="contactDetails">
                                                    <div class="row y-gap-10">
                                                        <div class="col-lg-3">
                                                            <?php $countryCodes = fetchCountryCodes($con); ?>
                                                            <label for="traveller-country-code" class="text-14 text-light-1">Country Code</label>
                                                            <select class="form-select form-select-lg select2" 
                                                                data-placeholder="Search Country Code" 
                                                                name="traveller-country-code" 
                                                                id="traveller-country-code">
                                                            <option value="" disabled selected>Search Country Code</option>
                                                            <?php foreach($countryCodes as $countryCode) { ?>
                                                                <option value="<?= $countryCode['dial_code'] ?>" <?= ($countryCode['name'] == 'Canada') ? 'selected' : '' ?>>
                                                                    <?= $countryCode['name'] ?> (<?= $countryCode['dial_code'] ?>)
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <label for="traveller-mobile-number" class="text-14 text-light-1">Mobile Number</label>
                                                            <input type="tel" name="traveller-mobile-number" id="traveller-mobile-number" class="form-control" required style="padding:5px; border:1px solid #ddd; border-radius:5px;">
                                                            <span class="error text-danger mobile-error font-12"></span>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <label for="traveller-email" class="text-14 text-light-1">Email</label>
                                                            <input type="email" name="traveller-email" id="traveller-email" class="form-control" required style="padding:5px; border:1px solid #ddd; border-radius:5px;">
                                                            <span class="error text-danger email-error font-12"></span>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="border-light rounded-4 mt-30">
                                            <div class="py-20 px-30">
                                                <div class="row justify-between items-center">
                                                    <div class="col-auto">
                                                        <div class="fw-500 text-dark-1">Billing Details</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="py-30 px-30 border-top-light">
                                                <form id="billingDetails">
                                                    <div class="row y-gap-10 justify-between">
                                                        <div class="col-lg-12">
                                                            <div class=" mt-15">
                                                                <div class="row y-gap-10">
                                                                    <div class="col-lg-12">
                                                                        <label for="billing-address" class="text-14 text-light-1">Billing Address</label>
                                                                        <input type="text" name="billing-address" id="billing-address" class="form-control" style="padding:5px; border:1px solid #ddd; border-radius:5px;">
                                                                        <span class="error text-danger address-error font-12"></span>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <label for="billing-city" class="text-14 text-light-1">City</label>
                                                                        <input type="text" name="billing-city" id="billing-city" class="form-control" style="padding:5px; border:1px solid #ddd; border-radius:5px;">
                                                                        <span class="error text-danger city-error font-12"></span>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <label for="traveller-country" class="text-14 text-light-1">Country</label>
                                                                        <input type="text" name="traveller-country" id="traveller-country" class="form-control" style="padding:5px; border:1px solid #ddd; border-radius:5px;">
                                                                        <span class="error text-danger country-error font-12"></span>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <label for="traveller-zipcode" class="text-14 text-light-1">Zipcode</label>
                                                                        <input type="number" name="traveller-zipcode" id="traveller-zipcode" class="form-control" style="padding:5px; border:1px solid #ddd; border-radius:5px;">
                                                                        <span class="error text-danger zipcode-error font-12"></span>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <label for="traveller-phone" class="text-14 text-light-1">Phone</label>
                                                                        <input type="tel" name="traveller-phone" id="traveller-phone" class="form-control" style="padding:5px; border:1px solid #ddd; border-radius:5px;">
                                                                        <span class="error text-danger phone-error font-12"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                    <div class="border-light rounded-4 mt-30">
                                        <div class="py-20 px-30">
                                            <div class="row justify-between items-center">
                                                <div class="col-auto">
                                                    <div class="fw-500 text-dark-1">Fare Summary</div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="text-14 text-light-1">
                                                        <?= $offerPricing[0]['OfferItem'][0]['PassengerQuantity'] ?> Passenger
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="py-30 px-30 border-top-light">
                                            <div class="row y-gap-10 justify-between">
                                                <div class="col-auto">
                                                    <div class="text-16 text-dark">Base Fare</div>
                                                    <div class="text-16 text-dark">Taxes & Fees</div>
                                                    <div class="text-18 text-dark">Total Amount</div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="text-16 text-dark text-right">
                                                        <span class="text-16 text-light"><?= $offerPricing[0]['BookingCurrencyCode'] ?></span>
                                                        <?= $offerPricing[0]['BasePrice']['BookingCurrencyPrice'] ?>
                                                    </div>
                                                    <div class="text-16 text-dark text-right">
                                                        <span class="text-16 text-light"><?= $offerPricing[0]['BookingCurrencyCode'] ?></span>
                                                        <?= $offerPricing[0]['TaxPrice']['BookingCurrencyPrice'] ?>
                                                    </div>
                                                    <div class="text-18 text-dark text-right">
                                                        <span class="text-16 text-light"><?= $offerPricing[0]['BookingCurrencyCode'] ?></span>
                                                        <?= $offerPricing[0]['TotalPrice']['BookingCurrencyPrice'] ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-center mt-30">
                                        <button id="continue" class="button px-30 fw-400 text-14 -blue-1 bg-blue-1 h-50 text-white">Continue</button>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</body>
<script>
    $(document).ready(function() {

        $('#traveller-country-code').select2({
            placeholder: "Search Country Code",
            allowClear: true,
            width: '100%' // ensures full-width responsiveness
        });

        $('#continue').on('click', function (e) {
        e.preventDefault();

        // Validate all forms
        const travellerValid = validateTravellerForm();
        const contactValid = validateContactForm();
        const billingValid = validateBillingForm();

        if (travellerValid && contactValid && billingValid) {
            submitAllForms();
        }
    });

    // ✅ Traveller form validation
    function validateTravellerForm() {
        const form = document.getElementById('travellerForm');
        let isValid = true;

        // Reset old errors
        form.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
        form.querySelectorAll('.error').forEach(el => el.textContent = '');

        const titles = form.querySelectorAll('select[name="title[]"]');
        const firstNames = form.querySelectorAll('input[name="first-name[]"]');
        const lastNames = form.querySelectorAll('input[name="last-name[]"]');
        const dobs = form.querySelectorAll('input[name="dob[]"]');
        const firstNameErrors = form.querySelectorAll('.first-name-error');
        const lastNameErrors = form.querySelectorAll('.last-name-error');
        const dobErrors = form.querySelectorAll('.dob-error');

        firstNames.forEach((_, i) => {
            const title = titles[i];
            const first = firstNames[i];
            const last = lastNames[i];
            const dob = dobs[i];
            const firstErr = firstNameErrors[i];
            const lastErr = lastNameErrors[i];
            const dobErr = dobErrors[i];

            if (!title.value.trim()) {
                title.classList.add('is-invalid');
                isValid = false;
            }
            if (!first.value.trim()) {
                first.classList.add('is-invalid');
                firstErr.textContent = 'First name is required.';
                isValid = false;
            }
            if (!last.value.trim()) {
                last.classList.add('is-invalid');
                lastErr.textContent = 'Last name is required.';
                isValid = false;
            }
            if (!dob.value) {
                dob.classList.add('is-invalid');
                dobErr.textContent = 'Date of birth is required.';
                isValid = false;
            } else {
                const dobDate = new Date(dob.value);
                if (dobDate > new Date()) {
                    dob.classList.add('is-invalid');
                    dobErr.textContent = 'Date of birth cannot be in the future.';
                    isValid = false;
                }
            }
        });

        return isValid;
    }

    // ✅ Contact Details Validation
    function validateContactForm() {
        const form = document.getElementById('contactDetails');
        let isValid = true;

        const countryCode = $('#traveller-country-code');
        const mobile = $('#traveller-mobile-number');
        const email = $('#traveller-email');
        const mobileError = $('.mobile-error');
        const emailError = $('.email-error');

        // Reset old styles
        form.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));

        if (!countryCode.val()) {
            countryCode.addClass('is-invalid');
            isValid = false;
        }

        if (!mobile.val().trim() || !/^[0-9]{7,15}$/.test(mobile.val())) {
            mobile.addClass('is-invalid');
            mobileError.textContent = 'Please enter a valid mobile number.';
            isValid = false;
        }

        if (!email.val().trim() || !/^\S+@\S+\.\S+$/.test(email.val())) {
            email.addClass('is-invalid');
            emailError.textContent = 'Please enter a valid email address.';
            isValid = false;
        }

        return isValid;
    }

    // ✅ Billing Details Validation
    function validateBillingForm() {
        const form = document.getElementById('billingDetails');
        let isValid = true;

        form.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));

        const address = $('#billing-address');
        const city = $('#billing-city');
        const country = $('#traveller-country');
        const zipcode = $('#traveller-zipcode');
        const phone = $('#traveller-phone');
        const addressErrror = $('.address-error');
        const cityError = $('.city-error');
        const countryError = $('.country-error');
        const zipcodeError = $('.zipcode-error');
        const phoneError = $('.phone-error');

        if (!address.val().trim()) { address.addClass('is-invalid'); addressErrror.textContent = 'Address is required.'; isValid = false; }
        if (!city.val().trim()) { city.addClass('is-invalid'); cityError.textContent = 'City is required.'; isValid = false; }
        if (!country.val().trim()) { country.addClass('is-invalid'); countryError.textContent = 'Country is required.'; isValid = false; }
        if (!zipcode.val().trim()) { zipcode.addClass('is-invalid'); zipcodeError.textContent = 'Zipcode is required.'; isValid = false; }
        if (!phone.val().trim()) { phone.addClass('is-invalid'); phoneError.textContent = 'Phone is required.'; isValid = false; }

        return isValid;
    }

    // ✅ AJAX Submit all forms together
    function submitAllForms() {
        // Combine data from all forms
        const travellerData = $('#travellerForm').serializeArray();
        const contactData = $('#contactDetails').serializeArray();
        const billingData = $('#billingDetails').serializeArray();

        const combinedData = [...travellerData, ...contactData, ...billingData];

        $.ajax({
            url: 'process_data.php', // change this to your endpoint
            method: 'POST',
            data: combinedData,
            beforeSend: function () {
                $('button[type="submit"]').prop('disabled', true).text('Submitting...');
            },
            success: function (response) {
                alert('Form submitted successfully!');
                console.log(response);
            },
            error: function (xhr) {
                alert('Something went wrong. Please try again.');
                console.error(xhr.responseText);
            },
            complete: function () {
                $('button[type="submit"]').prop('disabled', false).text('Submit');
            }
        });
    }

    });
</script>

</html>
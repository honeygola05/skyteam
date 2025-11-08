<?php
require 'helper.php';

$shoppingResponseID     = $_GET['shoppingid'] ?? null;
$offerID                = $_GET['offerid'] ?? null;
$adults                 = $_GET['adults'] ?? 1;
$children               = $_GET['children'] ?? 0;
$cabinClass             = $_GET['cabinclass'] ?? 'Y';
$tripType               = $_GET['tripType'] ?? 'oneway';

if ($shoppingResponseID !== null && $offerID !== null) {
    $offerDetails       = getOfferDetails($shoppingResponseID, $offerID, $adults, $children, $cabinClass, $tripType);

    if (isset($offerDetails['OfferPriceRS']['Success'])) {
        $shoppingResponseID = $offerDetails['OfferPriceRS']['ShoppingResponseId'];
        $OfferResponseId    = $offerDetails['OfferPriceRS']['OfferResponseId'];
        $offerPricing       = $offerDetails['OfferPriceRS']['PricedOffer'];
        $flightDetails      = $offerDetails['OfferPriceRS']['DataLists'];
        $stops              = $flightDetails['FlightList']['Flight'][0]['Journey']['Stops'];
        $AircarrierName     = $flightDetails['FlightSegmentList']['FlightSegment'][0]['MarketingCarrier']['Name'];
        $AircarrierCode     = $flightDetails['FlightSegmentList']['FlightSegment'][0]['MarketingCarrier']['AirlineID'];

        // seating plan api call
        $seatingPlan          = getSeatingPlan($shoppingResponseID, $offerID, $adults, $children, $cabinClass, $tripType);
        $columnLayout         = $seatingPlan['AirSeatMapRS']['SeatMap'][0]['ColumnLayOut'];
        $rowInfo              = $seatingPlan['AirSeatMapRS']['SeatMap'][0]['RowInfo'];
        $wingRow              = $seatingPlan['AirSeatMapRS']['SeatMap'][0]['WingRow'];
        $rows                 = $seatingPlan['AirSeatMapRS']['SeatMap'][0]['Rows'];
        $aisleIndex           = 0;
        foreach ($columnLayout as $index => $column) {
            if ($column['Name'] == 'GAP') {
                $aisleIndex = $index;
            }
        }
    } else {
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
</head>

<body>
    <?php include('include/preloader.php') ?>
    <main>
        <?php include('include/header.php') ?>

        <section class="layout-pt-md layout-pb-md bg-light-2 pt-40 pb-40">
            <div class="container">
                <div class="row y-gap-30">
                    <div class="col-xl-8 col-lg-8 col-12">

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
                                                                Check-in : <?= $flightDetails['BaggageAllowanceList']['BaggageAllowance'][0]['PieceAllowance']['TotalQuantity'] . ' ' . $flightDetails['BaggageAllowanceList']['BaggageAllowance'][0]['PieceAllowance']['Unit'] ?><br>
                                                                Seats Left: <?= $offerPricing[0]['OfferItem'][0]['FareComponent'][0]['FareBasis']['SeatLeft'] ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                        <div class="px-20 py-20 sm:px-20 sm:py-20 bg-white shadow-4 rounded-4 text-center">
                                            <div class="plane-wrapper">
                                                <span>Windows this side</span>
                                                <div class="plane-body">
                                                    <?php
                                                    $totalCols = count($rows);
                                                    $wingStart = $wingRow['Start'];
                                                    $wingEnd   = $wingRow['End'];

                                                    foreach ($rows as $index => $row): ?>
                                                        <div class="seat-column">
                                                            <?php foreach ($row['Seat'] as $index => $seat): ?>
                                                                <?php
                                                                $PaxRef    = $seat['PaxRef'] ?? null;
                                                                $offer     = $seat['OfferItemRefs'] ?? null;
                                                                $seatID    = $seat['SeatId'] ?? null;
                                                                $chargable = $seat['Chargable'] ?? '0';
                                                                $available = $seat['Available'] ?? '0';
                                                                $class = $seat['Available'] == 1 ? 'seat' : 'seat booked';
                                                                ?>
                                                                <?php if (isset($aisleIndex) && $index == $aisleIndex): ?>
                                                                    <div class="aisle"></div>
                                                                <?php endif; ?>
                                                                <div class="<?= $class ?>" data-seat="<?= $row['Number'] . $seat['Column'] ?>"><?= $row['Number'] . $seat['Column'] ?></div>
                                                            <?php endforeach; ?>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                                <span>Windows this side</span>
                                                <p class="text-light-1">Please note that seats <?= $wingStart ?> to <?= $wingEnd ?> are in the wing area of the plane.</p>
                                                <div class="legend">
                                                    <span><span class="legend-box available-box"></span> Available</span>
                                                    <span><span class="legend-box booked-box"></span> Booked</span>
                                                    <span><span class="legend-box selected-box"></span> Selected</span>
                                                    <span><span class="legend-box" style="background:#bfdbfe;border:1px solid #93c5fd;"></span> Wing Area</span>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="border-light rounded-4 mt-30">
                                            <div class="py-20 px-30">
                                                <div class="row justify-between items-center">
                                                    <div class="col-auto">
                                                        <div class="fw-500 text-dark-1">Traveller Details</div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <div class="text-14 text-light-1">
                                                            <?php
                                                            $adults = (int)$_GET['adults'];
                                                            $children = (int)$_GET['children'];
                                                            $traveller = $adults + $children;
                                                            ?>
                                                            <?= $traveller ?> Passenger
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="py-30 px-30 border-top-light">
                                                <form action="">
                                                    <div class="row y-gap-10 justify-between">
                                                        <?php
                                                        for ($i = 0; $i < $traveller; $i++) {
                                                        ?>
                                                            <div class="col-lg-12">
                                                                <div class=" mt-15">
                                                                    <?php
                                                                    $passenger = $i + 1;
                                                                    if ($i < $adults) {
                                                                        echo "Adult " . $passenger;
                                                                    } else {
                                                                        echo "Child " . ($passenger - $adults);
                                                                    }
                                                                    ?>
                                                                    <div class="row">
                                                                        <div class="col-lg-4">
                                                                            <label for="traveller-<?= $i + 1 ?>-title" class="text-14 text-light-1">Title</label>
                                                                            <select name="traveller-<?= $i + 1 ?>-title" id="traveller-<?= $i + 1 ?>-title" class="form-select" style=" padding:5px; border:1px solid #ddd; border-radius:5px;">
                                                                                <option value="Mr">Mr</option>
                                                                                <option value="Miss">Miss</option>
                                                                                <option value="Mrs">Mrs</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <label for="traveller-first-<?= $i + 1 ?>-name" class="text-14 text-light-1">First Name</label>
                                                                            <input type="text" name="traveller-first-<?= $i + 1 ?>-name" id="traveller-first-<?= $i + 1 ?>-name" class="form-control" style="    padding:5px; border:1px solid #ddd; border-radius:5px;">
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <label for="traveller-middle-<?= $i + 1 ?>-name" class="text-14 text-light-1">Middle Name</label>
                                                                            <input type="text" name="traveller-middle-<?= $i + 1 ?>-name" id="traveller-middle-<?= $i + 1 ?>-name" class="form-control" style="    padding:5px; border:1px solid #ddd; border-radius:5px;">
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <label for="traveller-last-<?= $i + 1 ?>-name" class="text-14 text-light-1">Last Name</label>
                                                                            <input type="text" name="traveller-last-<?= $i + 1 ?>-name" id="traveller-last-<?= $i + 1 ?>-name" class="form-control" style="    padding:5px; border:1px solid #ddd; border-radius:5px;">
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <label for="traveller-<?= $i + 1 ?>-age" class="text-14 text-light-1">Age</label>
                                                                            <input type="number" name="traveller-<?= $i + 1 ?>-age" id="traveller-<?= $i + 1 ?>-age" class="form-control" style="     padding:5px; border:1px solid #ddd; border-radius:5px;">
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <label for="traveller-<?= $i + 1 ?>-gender" class="text-14 text-light-1">Gender</label>
                                                                            <select name="traveller-<?= $i + 1 ?>-gender" id="traveller-<?= $i + 1 ?>-gender" class="form-control"  style="     padding:5px; border:1px solid #ddd; border-radius:5px;">
                                                                                <option value="Male">Male</option>
                                                                                <option value="Female">Female</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </form>
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
                                                    <form action="">
                                                        <div class="row y-gap-10 justify-between">
                                                            <div class="col-lg-12">
                                                                <div class=" mt-15">
                                                                    <div class="row y-gap-10">
                                                                        <div class="col-lg-4">
                                                                            <label for="traveller-name" class="text-14 text-light-1">Name</label>
                                                                            <input type="text" name="traveller-name" id="traveller-name" class="form-control" style="    padding:5px; border:1px solid #ddd; border-radius:5px;">
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <label for="traveller-email" class="text-14 text-light-1">Email</label>
                                                                            <input type="email" name="traveller-email" id="traveller-email" class="form-control" style="    padding:5px; border:1px solid #ddd; border-radius:5px;">
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <label for="traveller-phone" class="text-14 text-light-1">Mobile No.</label>
                                                                            <input type="tel" name="traveller-phone" id="traveller-phone" class="form-control" style="     padding:5px; border:1px solid #ddd; border-radius:5px;">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="border-light rounded-4 mt-30">
                                            <div class="py-20 px-30">
                                                <div class="row justify-between items-center">
                                                    <div class="col-auto">
                                                        <div class="fw-500 text-dark-1">Payment Details</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="py-30 px-30 border-top-light">
                                                <form action="">
                                                    <div class="row y-gap-10 justify-between">
                                                        <div class="col-lg-12">
                                                            <div class=" mt-15">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <label for="name_on_card" class="text-14 text-light-1">Name On Card</label>
                                                                        <input type="text" name="name_on_card" id="name_on_card" class="form-control" style="    padding:5px; border:1px solid #ddd; border-radius:5px;">
                                                                    </div>
                                                                    <div class="col-lg-12">
                                                                        <label for="card_number" class="text-14 text-light-1">Card Number</label>
                                                                        <input type="number" name="card_number" id="card_number" class="form-control" style="padding:5px; border:1px solid #ddd; border-radius:5px;">
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <label for="expiry" class="text-14 text-light-1">Expiry</label>
                                                                        <input type="number" name="expiry" id="expiry" class="form-control" style="padding:5px; border:1px solid #ddd; border-radius:5px;">
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <label for="cvv" class="text-14 text-light-1">CVV</label>
                                                                        <input type="number" name="cvv" id="cvv" class="form-control" style="padding:5px; border:1px solid #ddd; border-radius:5px;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
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
                                                    <form action="">
                                                        <div class="row y-gap-10 justify-between">
                                                            <div class="col-lg-12">
                                                                <div class=" mt-15">
                                                                    <div class="row y-gap-10">
                                                                        <div class="col-lg-12">
                                                                            <label for="billing-address" class="text-14 text-light-1">Billing Address</label>
                                                                            <input type="text" name="billing-address" id="billing-address" class="form-control" style="    padding:5px; border:1px solid #ddd; border-radius:5px;">
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <label for="billing-city" class="text-14 text-light-1">City</label>
                                                                            <input type="text" name="billing-city" id="billing-city" class="form-control" style="    padding:5px; border:1px solid #ddd; border-radius:5px;">
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <label for="traveller-country" class="text-14 text-light-1">Country</label>
                                                                            <input type="text" name="traveller-country" id="traveller-country" class="form-control" style="     padding:5px; border:1px solid #ddd; border-radius:5px;">
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <label for="traveller-zipcode" class="text-14 text-light-1">Zipcode</label>
                                                                            <input type="number" name="traveller-zipcode" id="traveller-zipcode" class="form-control" style="     padding:5px; border:1px solid #ddd; border-radius:5px;">
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <label for="traveller-phone" class="text-14 text-light-1">Phone</label>
                                                                            <input type="tel" name="traveller-phone" id="traveller-phone" class="form-control" style="     padding:5px; border:1px solid #ddd; border-radius:5px;">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>

                    </div>
                    <div class="col-xl-4 col-lg-4 col-12">
                        <div class="js-accordion pt-40 sticky-right-div">
                            <div class="accordion__item py-30 px-30 bg-white rounded-4 base-tr mt-30">
                                <div class="accordion__content" style="max-height: 100%;">
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
                                        <button type="submit" class="button px-30 fw-400 text-14 -blue-1 bg-blue-1 h-50 text-white">Continue</button>
                                    </div>
                                </div>
                            </div>
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
</body>

</html>
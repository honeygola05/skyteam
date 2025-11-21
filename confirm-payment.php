<?php
session_start();
require 'helper.php';
require 'include/connection.php';

$shoppingResponseID         = $_GET['shoppingid'] ?? null;
$offerID                    = $_GET['offerid'] ?? null;
$orderID                    = $_GET['orderID'] ?? null;

if(isset($_POST['action']) && $_POST['action'] == 'pay_now') {
    $orderID                = $_POST['orderID'];
    $amount                 = $_SESSION['amount'];
    $currency               = $_SESSION['currency'];
    $sql                    = "INSERT INTO `payment_confirmation`(`order_id`, `amount`, `currency`) VALUES ('$orderID', $amount, '$currency')";
    if($con->query($sql)){
        header('Location: payment/index.php?o_id='.$orderID);
    }
    else{
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}

$fetchOrderDetails          = "SELECT * FROM `booking_details` WHERE `order_id` = '$orderID' LIMIT 1";
$result                     = $con->query($fetchOrderDetails);
$bookingDetails             = $result->fetch_assoc();

$id                         = $bookingDetails['id'];
$fetchTravellers            = "SELECT * FROM `travellers_details` WHERE `order_id` = $id";
$result                     = $con->query($fetchTravellers);
$travellerDetails           = $result->fetch_all(MYSQLI_ASSOC);

$fetchPriceDetails          = fetchBookingPrice($shoppingResponseID, $offerID, $bookingDetails['adults'], $bookingDetails['children']);
if(isset($fetchPriceDetails['OfferPriceRS']['Success'])) {
    $priceDetails           = $fetchPriceDetails['OfferPriceRS']['PricedOffer'];
    $flightDetails          = $fetchPriceDetails['OfferPriceRS']['DataLists'];
    $currency               = $priceDetails[0]['BookingCurrencyCode'];
    $totalPrice             = $priceDetails[0]['TotalPrice']['BookingCurrencyPrice'];
    $_SESSION['amount']     = $totalPrice;
    $_SESSION['currency']   = $currency;
}
else{
    $error              = "Unable to fetch Offer Details. Please try again";
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
                    <div class="col-xl-12 col-lg-12 col-12">
                        <div class="js-accordion pt-40">
                            <div class="accordion__item py-30 px-30 bg-white rounded-4 base-tr mt-30" data-x="flight-item-1" data-x-toggle="shadow-2">
                                <div class="accordion__content" style="max-height: 100%;">
                                    <div class="flex justify-between items-center">
                                        <h5 class="h5 text-primary flex items-center font-medium">Confirm & Pay</h5>
                                    </div>
                                </div>
                                <?php if(isset($error)){ ?>
                                    <div class="text-center">
                                        <h5><?php echo $error; ?></h5>
                                        <a href="javascript:window.history.back();" class="text-primary">Go Back</a>
                                    </div>
                                <?php  } else{ ?>
                                <div class="border-light rounded-4 mt-30">
                                    <div class="py-20 px-30">
                                        <div class="row justify-between items-center">
                                            <div class="col-auto">
                                                <div class="fw-500 text-dark-1">Review Booking Details</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="py-30 px-30 border-top-light">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-12" style="border-right: 1px solid #ccc;">
                                                <h5 class="h5 text-primary flex items-center font-medium">
                                                    <span class=""><?= $flightDetails['OriginDestinationList']['OriginDestination'][0]['DepartureCode'] ?></span>
                                                    <svg width="1em" height="1em" font-size="1.5rem" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-testid="ArrowRightIcon" style="user-select: none; display: inline-block;">
                                                        <path fill-rule="evenodd" d="M18.7669 12a.725.725 0 0 1-.2127.5131l-6.0481 6.0425a.7254.7254 0 1 1-1.0253-1.0262l4.8085-4.8041H5.9585a.7253.7253 0 1 1 0-1.4506h10.3308l-4.8085-4.804a.7253.7253 0 1 1 1.0253-1.0263l6.0481 6.0425a.725.725 0 0 1 .2127.5131" clip-rule="evenodd"></path>
                                                    </svg>
                                                    <span class=""> <?= $flightDetails['OriginDestinationList']['OriginDestination'][0]['ArrivalCode'] ?></span>
                                                </h5>
                                                <p class="body-sm text-primary ">
                                                <ul class="unordered-list x-gap-15">
                                                    <li><?= date('D, j M Y', strtotime($flightDetails['FlightSegmentList']['FlightSegment'][0]['Departure']['Date'])) ?></li>
                                                    <li><?= $flightDetails['FlightSegmentList']['FlightSegment'][0]['Departure']['AirportName'] ?></li>
                                                    <li><?= $flightDetails['FlightSegmentList']['FlightSegment'][0]['Departure']['Time'] ?></li>
                                                    <li>Terminal <?= $flightDetails['FlightSegmentList']['FlightSegment'][0]['Departure']['Terminal']['Name'] ?></li>
                                                    <li>Flight Duration : <?= $flightDetails['FlightList']['Flight'][0]['Journey']['Time'] ?></li>
                                                    <li>No. of Stops : <?= $flightDetails['FlightList']['Flight'][0]['Journey']['Stops'] ?></li>
                                                    <li>Terminal <?= $flightDetails['FlightSegmentList']['FlightSegment'][0]['OperatingCarrier']['Name'] ?> <?= $flightDetails['FlightSegmentList']['FlightSegment'][0]['OperatingCarrier']['FlightNumber'] ?></li>
                                                    <li><?= $flightDetails['FlightSegmentList']['FlightSegment'][0]['Equipment']['Name'] ?></li>
                                                </ul>
                                                </p>
                                            </div>
                                            <div class="col-md-4 col-sm-12" style="border-right: 1px solid #ccc;">
                                                <h5 class="h5 text-primary flex items-center font-medium">Passenger & Billing</h5>
                                                    <ul class="list-group list-group-flush">
                                                    <?php foreach($travellerDetails as $traveller){ ?>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        <span class="fw-bold"><?= $traveller['title'] . ' ' . $traveller['fname'] . ' '. $traveller['mname'] .' ' . $traveller['lname']; ?></span>
                                                        <span class="fw-bold"><?= $traveller['date_of_birth']; ?></span>
                                                    </li>
                                                    <?php } ?>
                                                </ul>
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        <span class="fw-bold">Email</span>
                                                        <span class="fw-bold"><?= $bookingDetails['email']; ?></span>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        <span class="fw-bold">Phone</span>
                                                        <span class="fw-bold"><?= $bookingDetails['mobile_number']; ?></span>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        <span class="fw-bold">Address</span>
                                                        <span class="fw-bold"><?= $bookingDetails['billing_address']; ?></span>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        <span class="fw-bold">City</span>
                                                        <span class="fw-bold"><?= $bookingDetails['city']; ?></span>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        <span class="fw-bold">Zipcode</span>
                                                        <span class="fw-bold"><?= $bookingDetails['zipcode']; ?></span>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        <span class="fw-bold">Country</span>
                                                        <span class="fw-bold"><?= $bookingDetails['country']; ?></span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <h5 class="h5 text-primary flex items-center font-medium">Payment Details</h5>
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        <span class="fw-bold">Base Price</span>
                                                        <span class="fw-bold"><?= $priceDetails[0]['BasePrice']['BookingCurrencyPrice']; ?></span>
                                                    </li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        <span class="fw-bold">Tax Price</span>
                                                        <span class="fw-bold"><?= $priceDetails[0]['TaxPrice']['BookingCurrencyPrice']; ?></span>
                                                    </li>
                                                    <hr>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        <strong><span class="fw-bold">Total Price</span></strong>
                                                        <strong><span class="fw-bold"><?= $currency ?> <?= $totalPrice; ?></span></strong>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="row" style="border-top: 1px solid #ccc; padding-top: 20px;">
                                            <div class="d-flex justify-content-center">
                                                <form id="paymentForm" action="confirm-payment.php" method="post">
                                                    <input type="hidden" name="orderID" value="<?=  $_GET['orderID'] ?>" />
                                                    <input type="hidden" name="action" value="pay_now" />
                                                    <button type="submit" class="button px-30 fw-400 text-14 -blue-1 bg-blue-1 h-50 text-white">Pay Now</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
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
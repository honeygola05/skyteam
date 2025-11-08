<?php
require 'helper.php';
$shoppingResponseID     = $_GET['shoppingid'] ?? null;
$offerID                = $_GET['offerid'] ?? null;
$adults                 = $_GET['adults'] ?? 1;
$children               = $_GET['children'] ?? 0;
$cabinClass             = $_GET['cabinclass'] ?? 'Y';
$tripType               = $_GET['tripType'] ?? 'oneway';

if ($shoppingResponseID !== null && $offerID !== null) {
    $seatingPlan       = getSeatingPlan($shoppingResponseID, $offerID, $adults, $children, $cabinClass, $tripType);
    // $seatingPlan          = predefinedSeatmap();
    $offers               = $seatingPlan['AirSeatMapRS']['ALaCarteOffer']['ALaCarteOfferItem'];
    $columnLayout         = $seatingPlan['AirSeatMapRS']['SeatMap'][0]['ColumnLayOut'];
    $rowInfo              = $seatingPlan['AirSeatMapRS']['SeatMap'][0]['RowInfo'];
    $wingRow              = $seatingPlan['AirSeatMapRS']['SeatMap'][0]['WingRow'] ?? [];
    $rows                 = $seatingPlan['AirSeatMapRS']['SeatMap'][0]['Rows'];
    $passengersCount      = count($seatingPlan['AirSeatMapRS']['DataLists']['PassengerList']['Passengers']) ?? 0;
    
    // echo "<pre>";
    // print_r($columnLayout);
    // die;
} else{
    header('Location: ../');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en" data-x="html" data-x-toggle="html-overflow-hidden">

<head>
    <?php include('include/head.php'); ?>
</head>

<body>
    <?php include('include/preloader.php') ?>

    <main>

        <div class="header-margin"></div>
        <?php include('include/header.php');  ?>

        <section class="layout-pt-lg layout-pt-sm bg-light-2">
            <div class="container-fluid">
                <div class="row justify-center">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="px-20 py-20 sm:px-20 sm:py-20 bg-white shadow-4 rounded-4 text-center">

                            <div class="plane-wrapper">
                                <span>Windows this side</span>
                                <div class="plane-body">
                                <?php
                                $totalCols = count($rows);
                                $wingStart = $wingRow['Start'] ?? null;
                                $wingEnd   = $wingRow['End'] ?? null;

                                foreach($rows as $index => $row): ?>
                                    <div class="seat-column">
                                        <?php foreach($columnLayout as $layout): ?>
                                        <?php if($layout['Name'] == "GAP"): ?>
                                          <div class='aisle'></div>
                                        <?php else: ?>
                                          <?php foreach($row['Seat'] as $seatIndex => $seat): ?>
                                          <?php  if($seat['Column'] == $layout['Name']): ?>
                                          <?php
                                              $PaxRef         = $seat['PaxRef'] ?? null;
                                              $seatOffer      = $seat['OfferItemRefs'] ?? null;
                                              $seatID         = $seat['SeatId'] ?? null;
                                              $chargable      = $seat['Chargable'] ?? '0';
                                              $available      = $seat['Available'] ?? '0';
                                              $class          = $seat['Available'] == 1 ? 'seat' : 'seat booked';
                                              $offerDetails   = [];
                                              foreach($offers as $index => $offer){
                                                  if($seatOffer == $offer['OfferItemID'] && $available == 1){
                                                      $offerDetails = $offer;
                                                  }
                                              }
                                          ?>
                                          <div class="<?= $class ?>" <?= ($available == 1) ? '' : 'disabled' ?> data-price="<?= ($available == 1) ? $offerDetails['Price']['Total']['BookingCurrencyPrice'] : '0' ?>"  data-seat="<?= $row['Number']. $seat['Column'] ?>"><?= $row['Number']. $seat['Column'] ?></div>
                                          <?php endif; ?>
                                          <?php endforeach; ?>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endforeach; ?>
                                </div>
                                <span>Windows this side</span>
                                <?php if(!empty($wingRow)): ?>
                                    <p class="text-light-1">Please note that seats <?= $wingStart ?> to <?= $wingEnd ?> are in the wing area of the plane.</p>
                                <?php endif; ?>
                                <div class="seats-and-legends">
                                    <div id="selected-seats"></div>
                                    <div class="legend">
                                        <span><span class="legend-box available-box"></span> Available</span>
                                        <span><span class="legend-box booked-box"></span> Booked</span>
                                        <span><span class="legend-box selected-box"></span> Selected</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include('include/footer.php');  ?>
    </main>
    <?php include('include/foot.php');  ?>
</body>
<script>
    $(document).ready(function() {
        const maxSeats = <?= $passengersCount; ?>; // limit
        let selectedSeats = [];

        // Handle seat click
        $(".seat").on("click", function() {
            const seat = $(this).data("seat");

            if ($(this).hasClass("selected")) {
            // Deselect
            $(this).removeClass("selected");
            selectedSeats = selectedSeats.filter(s => s !== seat);
            } else {
            if (selectedSeats.length >= maxSeats) {
                alert(`You can select only ${maxSeats} seats.`);
                return;
            }
            // Select
            $(this).addClass("selected");
            selectedSeats.push(seat);
            }

            updateSelectedSeatsUI();
        });

        // Update UI for selected seats
        function updateSelectedSeatsUI() {
            $("#selected-seats").empty();

            selectedSeats.forEach(seat => {
            $("#selected-seats").append(
                `<span class="selected-seat-tag" data-seat="${seat}">
                ${seat} ✕
                </span>`
            );
            });

            $("#selected-count").text(selectedSeats.length);
        }

        // Handle removing from selected list
        $("#selected-seats").on("click", ".selected-seat-tag", function() {
            const seat = $(this).data("seat");

            // Remove from array
            selectedSeats = selectedSeats.filter(s => s !== seat);

            // Unselect in map
            $(`.seat[data-seat='${seat}']`).removeClass("selected");

            updateSelectedSeatsUI();
        });
    });
</script>
</html>
<?php
require 'helper.php';
$shoppingResponseID     = $_GET['shoppingid'] ?? null;
$offerID                = $_GET['offerid'] ?? null;
$adults                 = $_GET['adults'] ?? 1;
$children               = $_GET['children'] ?? 0;
$cabinClass             = $_GET['cabinclass'] ?? 'Y';
$tripType               = $_GET['tripType'] ?? 'oneway';

if ($shoppingResponseID !== null && $offerID !== null) {
    $seatingPlan          = getSeatingPlan($shoppingResponseID, $offerID, $adults, $children, $cabinClass, $tripType);
    $offers               = $seatingPlan['AirSeatMapRS']['ALaCarteOffer']['ALaCarteOfferItem'] ?? [];    
    $flightDetails        = $seatingPlan['AirSeatMapRS']['DataLists']['FlightSegmentList']['FlightSegment'] ?? [];
    $passengersCount      = count($seatingPlan['AirSeatMapRS']['DataLists']['PassengerList']['Passengers'] ?? []) ?? 0;
} else {
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
                        <div class="border-light rounded-4 mt-30">
                            <div class="py-20 px-30">
                                <div class="row justify-between items-center">
                                    <div class="col-auto">
                                        <div class="fw-500 text-dark-1">Select Seats(Recommended)</div>
                                    </div>
                                </div>
                            </div>
                            <div class="border-top-light">
                                <div class="flight-selection-box">
                                    <?php foreach($flightDetails as $index => $flight):  ?>
                                    <button class="flight-seat-selector <?= $index == 0 ? 'active' : '' ?>" data-tab-target="flight-<?= $index + 1 ?>">
                                        <span>Flight <?= $index + 1 ?></span><br>
                                        <span>
                                            <?= $flight['Departure']['AirportCode'] ?>
                                            <i class="icon-arrow-right"></i>
                                            <?= $flight['Arrival']['AirportCode'] ?>
                                        </span>
                                    </button>
                                    <?php endforeach; ?>
                                </div>
                                <?php foreach($flightDetails as $index => $flight):  ?>
                                <?php 
                                    $columnLayout         = $seatingPlan['AirSeatMapRS']['SeatMap'][$index]['ColumnLayOut'] ?? [];
                                    $rowInfo              = $seatingPlan['AirSeatMapRS']['SeatMap'][$index]['RowInfo'] ?? [];
                                    $wingRow              = $seatingPlan['AirSeatMapRS']['SeatMap'][$index]['WingRow'] ?? [];
                                    $rows                 = $seatingPlan['AirSeatMapRS']['SeatMap'][$index]['Rows'] ?? [];    
                                ?>
                                <div class="seating-map-box <?= $index == 0 ? 'active' : '' ?>" id="flight-<?= $index + 1 ?>">
                                    <div class="px-20 py-20 sm:px-20 sm:py-20 bg-white shadow-4 rounded-4 text-center">
                                        <div class="mt-10">
                                            <p>Windows this side</p>
                                            <div class="plane-wrapper">
                                                <div class="plane-body">
                                                    <?php
                                                    $totalCols = count($rows);

                                                    foreach ($rows as $index => $row): ?>
                                                        <div class="seat-column">
                                                            <?php foreach ($columnLayout as $layout): ?>
                                                                <?php if ($layout['Name'] == "GAP"): ?>
                                                                    <div class='aisle'></div>
                                                                <?php else: ?>
                                                                    <?php foreach ($row['Seat'] as $seatIndex => $seat): ?>
                                                                        <?php if ($seat['Column'] == $layout['Name']): ?>
                                                                            <?php
                                                                            $PaxRef         = $seat['PaxRef'] ?? null;
                                                                            $seatOffer      = $seat['OfferItemRefs'] ?? null;
                                                                            $seatID         = $seat['SeatId'] ?? null;
                                                                            $chargable      = $seat['Chargable'] ?? '0';
                                                                            $available      = $seat['Available'] ?? '0';
                                                                            $class          = $seat['Available'] == 1 ? 'seat' : 'seat booked';
                                                                            $offerDetails   = [];
                                                                            foreach ($offers as $index => $offer) {
                                                                                if ($seatOffer == $offer['OfferItemID'] && $available == 1) {
                                                                                    $offerDetails = $offer;
                                                                                }
                                                                            }
                                                                            ?>
                                                                            <div class="<?= $class ?>" <?= ($available == 1) ? '' : 'disabled' ?> data-price="<?= ($available == 1) ? $offerDetails['Price']['Total']['BookingCurrencyPrice'] : '0' ?>" data-seat="<?= $row['Number'] . $seat['Column'] ?>"><?= $row['Number'] . $seat['Column'] ?></div>
                                                                        <?php endif; ?>
                                                                    <?php endforeach; ?>
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                            <p>Windows this side</p>
                                            <?php if (!empty($wingRow)) {
                                                $wingStart = $wingRow['Start'];
                                                $wingEnd   = $wingRow['End'];
                                            ?>
                                                <p class="text-light-1">Please note that seats <?= $wingStart ?> to <?= $wingEnd ?> are in the wing area of the plane.</p>
                                            <?php } ?>
                                            <div class="legend">
                                                <span><span class="legend-box available-box"></span> Available</span>
                                                <span><span class="legend-box booked-box"></span> Booked</span>
                                                <span><span class="legend-box selected-box"></span> Selected</span>
                                                <span><span class="legend-box" style="background:#bfdbfe;border:1px solid #93c5fd;"></span> Wing Area</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
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

        $(".flight-seat-selector").on("click", function () {
            $(".flight-seat-selector").removeClass("active");
            $(this).addClass("active");
            $(".seating-map-box.active").removeClass("active");
            const target = $(this).data("tab-target");
            $(".flight-tab-content").removeClass("active");
            $("#" + target).addClass("active");
        });

        $(".seat").on("mousemove", function(e) {
            let seat = $(this).data("seat");
            let price = $(this).data("price");

            $("#seatTooltip")
                .text(`Seat: ${seat} | Price: ₹${price}`)
                .css({
                    top: e.pageY + 10,
                    left: e.pageX + 10
                })
                .show();
        });

        $(".seat").on("mouseleave", function () {
            $("#seatTooltip").hide();
        });

    });
</script>

</html>
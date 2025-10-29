<?php
require 'helper.php';
$shoppingResponseID     = $_GET['shoppingid'] ?? null;
$offerID                = $_GET['offerid'] ?? null;
$adults                 = $_GET['adults'] ?? 1;
$children               = $_GET['children'] ?? 0;
$cabinClass             = $_GET['cabinclass'] ?? 'Y';
$tripType               = $_GET['tripType'] ?? 'oneway';

if ($shoppingResponseID !== null && $offerID !== null) {
    // $seatingPlan       = getSeatingPlan($shoppingResponseID, $offerID, $adults, $children, $cabinClass, $tripType);
    $seatingPlan          = predefinedSeatmap();
    $columnLayout         = $seatingPlan['AirSeatMapRS']['SeatMap'][0]['ColumnLayOut'];
    $rowInfo              = $seatingPlan['AirSeatMapRS']['SeatMap'][0]['RowInfo'];
    $wingRow              = $seatingPlan['AirSeatMapRS']['SeatMap'][0]['WingRow'];
    $rows                 = $seatingPlan['AirSeatMapRS']['SeatMap'][0]['Rows'];
    $aisleIndex           = 0;
    foreach($columnLayout as $index => $column){
        if($column['Name'] == 'GAP'){
            $aisleIndex = $index;
        }
    }
    // echo "<pre>";
    // print_r($rows);
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
                                $wingStart = $wingRow['Start'];
                                $wingEnd   = $wingRow['End'];

                                foreach($rows as $index => $row): ?>
                                    <div class="seat-column">
                                        <?php foreach($row['Seat'] as $index => $seat): ?>
                                        <?php
                                            $PaxRef    = $seat['PaxRef'] ?? null;
                                            $offer     = $seat['OfferItemRefs'] ?? null;
                                            $seatID    = $seat['SeatId'] ?? null;
                                            $chargable = $seat['Chargable'] ?? '0';
                                            $available = $seat['Available'] ?? '0';
                                            $class = $seat['Available'] == 1 ? 'seat' : 'seat booked';    
                                        ?>
                                        <?php if(isset($aisleIndex) && $index == $aisleIndex): ?>
                                            <div class="aisle"></div>
                                        <?php endif; ?>
                                        <div class="<?= $class ?>" data-seat="<?= $row['Number']. $seat['Column'] ?>"><?= $row['Number']. $seat['Column'] ?></div>
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
                    </div>
                </div>
            </div>
        </section>

        <?php include('include/footer.php');  ?>

    </main>

    <?php include('include/foot.php');  ?>
</body>
</html>
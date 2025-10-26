<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <?php include('include/head_admin.php');
    $o_id = $_GET['o_id'];
    $net_weight = '';
    $net_length = '';
    $net_width = '';
    $net_height = '';

    if (isset($_POST['update_order'])) {
        $o_id = isset($_GET['o_id']) ? $_GET['o_id'] : null;
        $shipped = isset($_POST['shipped']) ? 1 : 0;
        $net_weight = $_POST['net_weight'];
        $net_length = $_POST['net_length'];
        $net_width = $_POST['net_width'];
        $net_height = $_POST['net_height'];

        $update_status_sql = "UPDATE `orders` SET `shipped`='$shipped' WHERE `order_id`='$o_id'";
        if ($shipped == '1') {
            $store_code = "PL3574" ;
            placeShipmentOrder($o_id, $con, $net_weight, $net_length, $net_width, $net_height, $store_code);
        }
        // die();
        mysqli_query($con, $update_status_sql);

        header('location:all-orders.php');
        exit();
    }
    function placeShipmentOrder($o_id, $con, $net_weight, $net_length, $net_width, $net_height, $store_code)
    {
        // Fetch order details from the database
        $sql = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `orders` WHERE `order_id` = '$o_id'"));
        $name = $sql['fname'] . " " . $sql['lname'];
        $address = $sql['address'] . " " . $sql['city'] . " " . $sql['state'];
        $pincode = $sql['pincode'];
        $email = $sql['email'];
        $phone = $sql['phone'];
        $final_price = $sql['final_price'];
        $shipping_method = $sql['shipping_method'];

        // Set COD value based on the shipping method and final price
        if ($shipping_method == 'cod') {
            $codValue = ($final_price >= 0 && $final_price <= 50000) ? $final_price : 0;
            $ship_m = "cash";
        } else {
            $codValue = '';
            $ship_m = "";
        }

        // JSON payload for the NON-DOC shipment
        $curl = curl_init();

        // Create JSON Payload
        $jsonPayload = json_encode([
            "consignments" => [
                [
                    "customer_code" => "PL3574" ,
                    "reference_number" => "REF-" . uniqid(),
                    "service_type_id" => "B2C PRIORITY",
                    "load_type" => "NON-DOCUMENT",
                    "description" => "Shipment Details",
                    "cod_amount" => $codValue,
                    "cod_favor_of" => "",
                    "cod_collection_mode" => $ship_m,
                    "num_pieces" => "1",
                    "dimension_unit" => "cm",
                    "length" => $net_length, // Make sure $net_length is set
                    "width" => $net_width, // Make sure $net_width is set
                    "height" => $net_height, // Make sure $net_height is set
                    "weight_unit" => "kg",
                    "weight" => $net_weight, // Make sure $net_weight is set
                    "declared_value" => "1",
                    "eway_bill" => "12320012385958",
                    "invoice_number" => "INV" . $o_id,
                    "invoice_date" => date("d M Y"),
                    "customer_reference_number" => $o_id,
                    "commodity_id" => "Goods",
                    "consignment_type" => "Forward",
                    "origin_details" => [
                        "name" => "PP SATYUG PRODUCTS",
                        "phone" => "7447330158",
                        "alternate_phone" => "",
                        "address_line_1" => "Sr.No. 314, Plot No. 09,",
                        "address_line_2" => "Lane No. 09, Khandoba Maal, Nirgudi Road,",
                        "pincode" => "411014",
                        "city" => "PUNE",
                        "state" => "MAHARASHTRA"
                    ],
                    "destination_details" => [
                        "name" => $name,
                        "alternate_phone" => "",
                        "phone" => $phone,
                        "address_line_1" => $address,
                        "address_line_2" => "",
                        "pincode" => $pincode,
                        "city" => $sql['city'],
                        "state" => $sql['state']
                    ],
                    "pieces_detail" => [
                        [
                            "description" => "Item 1",
                            "declared_value" => "100",
                            "weight" => "0.5",
                            "height" => "5",
                            "length" => "5",
                            "width" => "5"
                        ]
                    ]
                ]
            ]
        ]);

        // cURL request configuration
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://dtdcapi.shipsy.io/api/customer/integration/consignment/softdata", // API endpoint
            // CURLOPT_URL => "http://demodashboardapi.shipsy.in/api/customer/integration/consignment/softdata", // API endpoint
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $jsonPayload,
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                // "Authorization: Bearer c096d7ba-830d-440a-9de4-10425e62e52f", // Replace with your Bearer token
                "api-key: 7c033e3dc6eb14ae9d285e4fe74a3e" // Replace with your actual API key if needed
            ),
        ));

        // Execute cURL request
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response; // Check the API response
        }

        die();


        // Execute cURL request and capture the response
        // $response = curl_exec($curl);
        // if (curl_errno($curl)) {
        //     echo 'cURL error: ' . curl_error($curl);
        //     curl_close($curl);
        //     return;
        // }
        // curl_close($curl);

        // Decode the JSON response
        $response = json_decode($response, true);

        // Decode the JSON response
        // $response = json_decode($response, true);

        // Check the status of the response
        if (isset($response['success']) && $response['success'] === true) {
            // $data = $response['data'];

            echo $awb_number = $response['awb_number'];
            echo $client_order_id = $response['Client_order_id'];
            echo $shipcorrect_order_no = $response['shipcorrect_order_no'];

            $query = "INSERT INTO `shipping`(`order_id`, `awb_number`, `store_code`, `net_weight`, `net_length`, `net_width`, `net_height`, `client_order_id`, `shipcorrect_order_no`) VALUES ('$o_id','$awb_number','$store_code','$net_weight','$net_length','$net_width','$net_height','$client_order_id','$shipcorrect_order_no')";

            $result = mysqli_query($con, $query);

            if ($result) {
                echo "Data inserted successfully!";
            } else {
                echo "Error inserting data: " . mysqli_error($con);
            }
        } else {
            echo "Error: Status is not true";
        }
    }

    $o_id = isset($_GET['o_id']) ? $_GET['o_id'] : null;
    $sql = "SELECT * FROM `orders` WHERE `order_id` = '$o_id' ";
    $res = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($res);
    $sql1 = "SELECT * FROM `shipping` WHERE `order_id` = '$o_id' ";
    $res1 = mysqli_query($con, $sql1);
    $row1 = mysqli_fetch_assoc($res1);
    $net_weight = $row1['net_weight'];
    $net_length = $row1['net_length'];
    $net_width = $row1['net_width'];
    $net_height = $row1['net_height'];
    ?>
</head>

<body>
    <!-- tap on top start -->
    <div class="tap-top">
        <i data-feather="chevrons-up"></i>
    </div>
    <!-- tap on tap end -->

    <!-- page-wrapper Start -->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        <?php include('include/header_admin.php'); ?>
        <!-- Page Header Ends-->

        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->
            <?php include('include/sidebar_admin.php'); ?>
            <!-- Page Sidebar Ends-->

            <!-- tracking section start -->
            <div class="page-body">
                <!-- tracking table start -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="title-header title-header-block package-card">
                                        <div>
                                            <h5>Order #<?php echo $row['order_id']; ?></h5>
                                        </div>
                                        <div class="card-order-section">
                                            <ul>
                                                <li><?php echo $row['date']; ?></li>
                                                <!-- <li>6 items</li> -->
                                                <li>
                                                    Total ₹
                                                    <?php echo $row['final_price'] ?>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="bg-inner cart-section order-details-table">
                                        <div class="row g-4">
                                            <div class="col-xl-8">
                                                <div class="table-responsive table-details">
                                                    <table class="table cart-table table-borderless">
                                                        <thead>
                                                            <tr>
                                                                <th colspan="2">Items</th>
                                                                <!-- <th class="text-end" colspan="2">
                                                                    <a href="javascript:void(0)" class="theme-color">Edit
                                                                        Items</a>
                                                                </th> -->
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <?php
                                                            $product_name = json_decode($row['product_name']);
                                                            $product_quantity = json_decode($row['product_quantity']);
                                                            $product_price = json_decode($row['product_price']);

                                                            for ($i = 0; $i < count($product_name); $i++) {
                                                            ?>
                                                                <tr class="table-order">
                                                                    <!-- <td>
                                                                        <a href="javascript:void(0)">
                                                                            <img src="assets/images/profile/1.jpg" class="img-fluid blur-up lazyload" alt="">
                                                                        </a>
                                                                    </td> -->
                                                                    <td>
                                                                        <p>Product Name</p>
                                                                        <h5><?= $product_name[$i] ?></h5>
                                                                    </td>
                                                                    <td>
                                                                        <p>Quantity</p>
                                                                        <h5><?= $product_quantity[$i] ?></h5>
                                                                    </td>
                                                                    <td>
                                                                        <p>Price</p>
                                                                        <h5>
                                                                            ₹
                                                                            <?= $product_price[$i] ?>
                                                                        </h5>
                                                                    </td>
                                                                </tr>
                                                            <?php } ?>
                                                        </tbody>

                                                        <tfoot>
                                                            <tr class="table-order">
                                                                <td colspan="3">
                                                                    <h5>Subtotal :</h5>
                                                                </td>
                                                                <td>
                                                                    <h4>
                                                                        ₹
                                                                        <?php echo $row['subtotal'] ?>
                                                                    </h4>
                                                                </td>
                                                            </tr>

                                                            <!-- <tr class="table-order">
                                                                <td colspan="3">
                                                                    <h5>Shipping :</h5>
                                                                </td>
                                                                <td>
                                                                    <h4>$12.00</h4>
                                                                </td>
                                                            </tr> -->

                                                            <!-- <tr class="table-order">
                                                                <td colspan="3">
                                                                    <h5>Tax(GST) :</h5>
                                                                </td>
                                                                <td>
                                                                    <h4>$10.00</h4>
                                                                </td>
                                                            </tr> -->

                                                            <tr class="table-order">
                                                                <td colspan="3">
                                                                    <h4 class="theme-color fw-bold">
                                                                        Total Price :
                                                                    </h4>
                                                                </td>
                                                                <td>
                                                                    <h4 class="theme-color fw-bold">
                                                                        ₹
                                                                        <?php echo $row['final_price'] ?>
                                                                    </h4>
                                                                </td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>

                                                <form method="post">
                                                    <div class="row align-items-center">
                                                        <label class="col-sm-3 col-form-label form-label-title">Order Shipped</label>
                                                        <div class="col-sm-9">
                                                            <label class="switch">
                                                                <input type="checkbox" name="shipped" value="<?php if ($row['shipped'] == '1') {
                                                                                                                    echo '1';
                                                                                                                } else {
                                                                                                                    echo '0';
                                                                                                                } ?>" <?php if ($row['shipped'] == '1') {
                                                                                                                            echo 'checked';
                                                                                                                        } else {
                                                                                                                            echo '';
                                                                                                                        } ?>><span class="switch-state"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center">
                                                        <label class="col-sm-3 col-form-label form-label-title">Net Weight(Kg)</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="net_weight" value="<?= $net_weight ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center">
                                                        <label class="col-sm-3 col-form-label form-label-title">Net Length(cm)</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="net_length" value="<?= $net_length ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center">
                                                        <label class="col-sm-3 col-form-label form-label-title">Net Width(cm)</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="net_width" value="<?= $net_width ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center">
                                                        <label class="col-sm-3 col-form-label form-label-title">Net Height(cm)</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="net_height" value="<?= $net_height ?>" required>
                                                        </div>
                                                    </div>


                                                    <button class="btn btn-solid" name="update_order" type="submit">
                                                        Update
                                                    </button>
                                                    <a href="orders-all.php" class="waves-effect waves-light btn-large">Back</a>
                                                </form>
                                            </div>

                                            <div class="col-xl-4">
                                                <div class="order-success">
                                                    <div class="row g-4">
                                                        <h4>Personal Details</h4>
                                                        <ul class="order-details">
                                                            <li>
                                                                Name:
                                                                <?php echo $row['fname'] . " " . $row['lname'] ?>
                                                            </li>
                                                            <li>
                                                                Email:
                                                                <?php echo $row['email'] ?>
                                                            </li>
                                                            <li>
                                                                Mobile No.:
                                                                <?php echo $row['phone'] ?>
                                                            </li>
                                                        </ul>
                                                        <h4>summery</h4>
                                                        <ul class="order-details">
                                                            <li>
                                                                Order ID:
                                                                <?php echo $row['order_id']; ?>
                                                            </li>
                                                            <li>
                                                                Order Date:
                                                                <?php echo $row['date']; ?>
                                                            </li>
                                                            <li>
                                                                Order Total: ₹
                                                                <?php echo $row['final_price'] ?>
                                                            </li>
                                                        </ul>

                                                        <h4>shipping address</h4>
                                                        <ul class="order-details">
                                                            <li>
                                                                <?php echo $row['address'] . ", " . $row['city'] ?>
                                                            </li>
                                                            <li><?php echo $row['state']  ?></li>
                                                            <li><?php echo $row['pincode'] ?></li>
                                                        </ul>

                                                        <div class="payment-mode">
                                                            <h4>Shipping method</h4>
                                                            <p><?php echo $row['shipping_method'] ?></p>
                                                        </div>

                                                        <!-- <div class="delivery-sec">
                                                            <h3>expected date of delivery: <span>october 22, 2018</span>
                                                            </h3>
                                                            <a href="order-tracking.html">track order</a>
                                                        </div> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- section end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- tracking table end -->

                <?php include('include/footer_admin.php'); ?>
            </div>
            <!-- tracking section End -->
        </div>
    </div>
    <!-- page-wrapper End -->

    <?php include('include/foot_admin.php'); ?>
</body>

<!-- Mirrored from themes.pixelstrap.com/fastkart/back-end/order-detail.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 Apr 2024 05:07:06 GMT -->

</html>
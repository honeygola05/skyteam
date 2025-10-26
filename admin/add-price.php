<!DOCTYPE html>
<html lang="en" dir="ltr">



<head>
    <?php include('include/head_admin.php');


    $product_id = '';
    $base_price = '';
    $discounted_price = '';
    $measure = '';
    $height = '';

    if (isset($_GET['id']) && $_GET['id'] != '') {
        $id = get_safe_value($con, $_GET['id']);
        $image_required = '';
        $res = mysqli_query($con, "SELECT * from `price` where id='$id'");
        $check = mysqli_num_rows($res);
        if ($check > 0) {
            $row = mysqli_fetch_assoc($res);
            $product_id = $row['product_id'];
            $base_price = $row['base_price'];
            $discounted_price = $row['discounted_price'];
            $measure = $row['measure'];
            $height = $row['height'];
        } else {
            header('location:all-price.php');
            die();
        }
    }

    if (isset($_POST['submit_price'])) {
        // Retrieve and sanitize form data
        $product_id = get_safe_value($con, $_POST['product_id']);
        $base_prices = $_POST['base_price'];
        $discounted_prices = $_POST['discounted_price'];
        $measures = $_POST['measure'];
        $heights = $_POST['height'];

        // Initialize arrays to hold the data
        $base_prices_array = [];
        $discounted_prices_array = [];
        $measures_array = [];
        $heights_array = [];

        // $base_price = json_decode($base_prices);
        // Combine base_price and discounted_price into arrays
        for ($i = 0; $i < count($base_prices); $i++) {
            $base_prices_array[] = get_safe_value($con, $base_prices[$i]);
            $discounted_prices_array[] = get_safe_value($con, $discounted_prices[$i]);
            $measures_array[] = get_safe_value($con, $measures[$i]);
            $heights_array[] = get_safe_value($con, $heights[$i]);
        }

        // Convert arrays to JSON format
        $base_prices_json = json_encode($base_prices_array);
        $discounted_prices_json = json_encode($discounted_prices_array);
        $measures_json = json_encode($measures_array);
        $heights_json = json_encode($heights_array);

        // Initialize message
        $msg = "";

        if ($msg == '') {
            if (isset($_GET['id']) && $_GET['id'] != '') {
                // Update existing record
                $id = $_GET['id']; // Ensure `$id` is set
                echo $update_query = "UPDATE `price` SET `product_id`='$product_id', `base_price`='$base_prices_json', `discounted_price`='$discounted_prices_json', `measure`='$measures_json', `height`='$heights_json' WHERE `id`='$id'";
                mysqli_query($con, $update_query);
            } else {
                // Insert new record
                echo $insert_query = "INSERT INTO `price` (`product_id`, `base_price`, `discounted_price`,`measure`,`height`) VALUES ('$product_id', '$base_prices_json', '$discounted_prices_json','$measures_json','$heights_json')";
                mysqli_query($con, $insert_query);
            }

            // Redirect after insertion
            header('location:all-price.php');
            die();
        }
    }

    ?>
</head>

<body>
    <!-- tap on top start -->
    <div class="tap-top">
        <span class="lnr lnr-chevron-up"></span>
    </div>
    <!-- tap on tap end -->

    <!-- page-wrapper start -->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        <?php include('include/header_admin.php'); ?>
        <!-- Page Header Ends-->

        <!-- Page Body start -->
        <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->
            <?php include('include/sidebar_admin.php'); ?>
            <!-- Page Sidebar Ends-->

            <div class="page-body">

                <!-- New Product Add Start -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-sm-8 m-auto">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-header-2">
                                                <h5>price Information</h5>
                                            </div>
                                            <form method="post" enctype="multipart/form-data">
                                                <div class="theme-form theme-form-2 mega-form">


                                                    <div class="mb-4 row align-items-center">
                                                        <label class="col-sm-3 col-form-label form-label-title">Select Product</label>
                                                        <div class="col-sm-9">
                                                            <select class="js-example-basic-single w-100" name="product_id" required>
                                                                <?php
                                                                if ($product_id != '') {
                                                                    $sql1 = "SELECT * FROM `product` WHERE `id` = '$product_id'";
                                                                    $res1 = mysqli_query($con, $sql1);
                                                                    $row1 = mysqli_fetch_assoc($res1);
                                                                    echo '<option value="' . $product_id . '" selected>' . $row1['name'] . '</option>';
                                                                } else {
                                                                    echo '<option value="" selected>Choose Product</option>';
                                                                }

                                                                $sql = "SELECT * FROM `product`";
                                                                $res = mysqli_query($con, $sql);
                                                                while ($row = mysqli_fetch_assoc($res)) {
                                                                    echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <?php if (isset($_GET['id'])) { ?>
                                                        <?php
                                                        $base_prices = json_decode($base_price);
                                                        $discounted_prices = json_decode($discounted_price);
                                                        $measures = json_decode($measure);
                                                        $heights = json_decode($height);

                                                        foreach ($base_prices as $index => $base_price) { ?>
                                                            <div class="mb-4 row align-items-center dynamic-field" data-id="<?= $index ?>">
                                                                <label class="form-label-title col-sm-3 mb-0">Base Price</label>
                                                                <div class="col-sm-9">
                                                                    <input class="form-control" name="base_price[]" type="text" placeholder="Base Price" value="<?= htmlspecialchars($base_price) ?>">
                                                                </div>

                                                                <label class="form-label-title col-sm-3 mb-0">Discounted Price</label>
                                                                <div class="col-sm-9">
                                                                    <input class="form-control" name="discounted_price[]" type="text" placeholder="Discounted Price" value="<?= htmlspecialchars($discounted_prices[$index] ?? '') ?>">
                                                                </div>

                                                                <label class="form-label-title col-sm-3 mb-0">Measure</label>
                                                                <div class="col-sm-9">
                                                                    <input class="form-control" name="measure[]" type="text" placeholder="Measure" value="<?= htmlspecialchars($measures[$index] ?? '') ?>">
                                                                </div>

                                                                <label class="form-label-title col-sm-3 mb-0">Height</label>
                                                                <div class="col-sm-9">
                                                                    <input class="form-control" name="height[]" type="text" placeholder="Height" value="<?= htmlspecialchars($heights[$index] ?? '') ?>">
                                                                </div>

                                                                <div class="col-sm-12 text-end mt-2">
                                                                    <?php if ($index > 0) { // Don't show remove button for the first item 
                                                                    ?>
                                                                        <button type="button" class="btn btn-danger remove-field" data-id="<?= $index ?>">Remove</button>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        <?php } ?>

                                                    <?php } else { ?>
                                                        <!-- Default empty input for new entry -->
                                                        <div class="mb-4 row align-items-center dynamic-field" data-id="0">
                                                            <label class="form-label-title col-sm-3 mb-0">Base Price</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" name="base_price[]" type="text" placeholder="Base Price">
                                                            </div>
                                                            <label class="form-label-title col-sm-3 mb-0">Discounted Price</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" name="discounted_price[]" type="text" placeholder="Discounted Price">
                                                            </div>
                                                            <label class="form-label-title col-sm-3 mb-0">Measure</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" name="measure[]" type="text" placeholder="Measure">
                                                            </div>
                                                            <label class="form-label-title col-sm-3 mb-0">Height</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" name="height[]" type="text" placeholder="Height">
                                                            </div>
                                                            <!-- <div class="col-sm-12 text-end mt-2">
                                                                <button type="button" class="btn btn-danger remove-field" data-id="0">Remove</button>
                                                            </div> -->
                                                        </div>
                                                    <?php } ?>
                                                    <div id="dynamic-fields"></div>

                                                    <!-- Button to add more fields -->
                                                    <button type="button" id="add-more" class="btn btn-primary mb-4 align-items-center">Add More</button>
                                                </div>
                                                <button class="btn btn-solid" name="submit_price" type="submit">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- New Product Add End -->

                <!-- footer Start -->
                <?php include('include/footer_admin.php'); ?>
                <!-- footer En -->
            </div>
            <!-- Container-fluid End -->
        </div>
        <!-- Page Body End -->
    </div>
    <!-- page-wrapper End -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            // Add new fields dynamically
            $('#add-more').click(function() {
                // Get the current number of dynamic fields to ensure unique IDs
                let currentIndex = $('.dynamic-field').length ?
                    Math.max(...$('.dynamic-field').map(function() {
                        return parseInt($(this).data('id'));
                    }).get()) + 1 :
                    0;

                let newField = `
            <div class="mb-4 row align-items-center dynamic-field" data-id="${currentIndex}">
                <label class="form-label-title col-sm-3 mb-0">Base Price</label>
                <div class="col-sm-9">
                    <input class="form-control" name="base_price[]" type="text" placeholder="Base Price">
                </div>
                <label class="form-label-title col-sm-3 mb-0">Discounted Price</label>
                <div class="col-sm-9">
                    <input class="form-control" name="discounted_price[]" type="text" placeholder="Discounted Price">
                </div>
                <label class="form-label-title col-sm-3 mb-0">Measure</label>
                <div class="col-sm-9">
                    <input class="form-control" name="measure[]" type="text" placeholder="Measure">
                </div>
                <label class="form-label-title col-sm-3 mb-0">Height</label>
                <div class="col-sm-9">
                    <input class="form-control" name="height[]" type="text" placeholder="Height">
                </div>
                <div class="col-sm-12 text-end mt-2">
                    <button type="button" class="btn btn-danger remove-field" data-id="${currentIndex}">Remove</button>
                </div>
            </div>`;
                $('#dynamic-fields').append(newField);
            });

            // Remove a specific field
            $(document).on('click', '.remove-field', function() {
                let fieldId = $(this).data('id');
                $('.dynamic-field').filter(`[data-id="${fieldId}"]`).remove();
            });
        });
    </script>
    <?php include('include/foot_admin.php'); ?>
</body>



</html>
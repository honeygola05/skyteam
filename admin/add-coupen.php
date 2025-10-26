<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from themes.pixelstrap.com/fastkart/back-end/add-new-category.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 Apr 2024 05:07:03 GMT -->

<head>
    <?php include('include/head_admin.php');

    $code = '';
    $discount = '';
    $active = '';

    if (isset($_GET['id']) && $_GET['id'] != '') {
        $id = get_safe_value($con, $_GET['id']);
        $image_required = '';
        $res = mysqli_query($con, "select * from coupen where id='$id'");
        $check = mysqli_num_rows($res);
        if ($check > 0) {
            $row = mysqli_fetch_assoc($res);
            $code = $row['code'];
            $discount = $row['discount'];
            $active = $row['active'];
        } else {
            header('location:all-coupen.php');
            die();
        }
    }

    if (isset($_POST['submit_coupen'])) {
        // prx($_POST);
        $code = get_safe_value($con, $_POST['code']);
        $discount = get_safe_value($con, $_POST['discount']);
        $active = isset($_POST['active']) ? 1 : 0;
        $msg = "";

        if ($msg == '') {
            if (isset($_GET['id']) && $_GET['id'] != '') {

                $update_query = "UPDATE `coupen` SET `code`='$code', `discount`='$discount',`active`='$active' WHERE `id`='$id'";

                mysqli_query($con, $update_query);
            } else {
                $insert_query = "INSERT INTO `coupen` ( `code`, `discount`,`active`)
            VALUES ('$code','$discount','$active')";
                mysqli_query($con, $insert_query);
            }

            header('location:all-coupen.php');
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
                                                <h5>Coupen Details</h5>
                                            </div>
                                            <form method="post" enctype="multipart/form-data">
                                                <div class="theme-form theme-form-2 mega-form">
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="col-sm-3 col-form-label form-label-title">Active</label>
                                                        <div class="col-sm-9">
                                                            <label class="switch">
                                                                <input type="checkbox" name="active" value="<?php if ($active == '1') {
                                                                                                                echo '1';
                                                                                                            } else {
                                                                                                                echo '0';
                                                                                                            } ?>" <?php if ($active == '1') {
                                                                                                                            echo 'checked';
                                                                                                                        } else {
                                                                                                                            echo '';
                                                                                                                        } ?>><span class="switch-state"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-3 mb-0">Coupen Code</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" name="code" type="text" placeholder="code" value="<?php echo $code ?>">
                                                        </div>
                                                    </div>
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-3 mb-0">Discount (in %)</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" name="discount" type="text" placeholder="discount" value="<?php echo $discount ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="btn btn-solid" name="submit_coupen" type="submit">Submit</button>
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

    <?php include('include/foot_admin.php'); ?>
</body>


<!-- Mirrored from themes.pixelstrap.com/fastkart/back-end/add-new-category.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 Apr 2024 05:07:04 GMT -->

</html>
<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from themes.pixelstrap.com/fastkart/back-end/add-new-category.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 Apr 2024 05:07:03 GMT -->

<head>
    <?php include('include/head_admin.php');


    $category = '';
    $name = '';

    if (isset($_GET['id']) && $_GET['id'] != '') {
        $id = get_safe_value($con, $_GET['id']);
        $res = mysqli_query($con, "select * from size where id='$id'");
        $check = mysqli_num_rows($res);
        if ($check > 0) {
            $row = mysqli_fetch_assoc($res);
            $category = $row['category'];
            $name = $row['name'];
        } else {
            header('location:all-size.php');
            die();
        }
    }

    if (isset($_POST['submit_size'])) {
        // prx($_POST);
        $category = get_safe_value($con, $_POST['category']);
        $name = get_safe_value($con, $_POST['name']);


        $msg = "";

        if ($msg == '') {
            if (isset($_GET['id']) && $_GET['id'] != '') {

                $update_query = "UPDATE `size` SET `category`='$category',`name`='$name' WHERE `id`='$id'";

                mysqli_query($con, $update_query);
            } else {
                $insert_query = "INSERT INTO `size` (`category`, `name`) VALUES ('$category','$name')";
                mysqli_query($con, $insert_query);
            }
            header('location:all-size.php');
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
                                                <h5>Size Information</h5>
                                            </div>
                                            <form method="post" enctype="multipart/form-data">
                                                <div class="theme-form theme-form-2 mega-form">

                                                    <div class="mb-4 row align-items-center">
                                                        <label class="col-sm-3 col-form-label form-label-title">Select Category</label>
                                                        <div class="col-sm-9">
                                                            <select class="js-example-basic-single w-100" name="category" required>
                                                                <?php if ($category) { ?>
                                                                    <option value="<?php echo $category; ?>" selected><?php echo $category; ?></option>
                                                                <?php } else { ?>
                                                                    <option value="" selected>Choose Category</option>
                                                                <?php } ?>

                                                                <?php
                                                                $sql = "SELECT * FROM `category` WHERE `status` = '1' ";
                                                                $res = mysqli_query($con, $sql);
                                                                while ($row = mysqli_fetch_assoc($res)) {
                                                                ?>
                                                                    <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="mb-4 row align-items-center">
                                                        <label class="col-sm-3 col-form-label form-label-title">Size</label>
                                                        <div class="form-group col-sm-9">
                                                            <input class="form-control" type="text" name="name" placeholder="Size" value="<?php echo $name ?>">
                                                        </div>
                                                    </div>

                                                    <!-- <div class="mb-4 row align-items-center">
                                                    <div class="col-sm-3 form-label-title">Select Category Icon</div>
                                                    <div class="col-sm-9">
                                                        <div class="dropdown icon-dropdown">
                                                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                                                Select Icon
                                                            </button>
                                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                                <li>
                                                                    <a class="dropdown-item" href="#">
                                                                        <img src="https://themes.pixelstrap.com/fastkart/assets/svg/1/vegetable.svg" class="img-fluid" alt="">
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item" href="#">
                                                                        <img src="https://themes.pixelstrap.com/fastkart/assets/svg/1/cup.svg" class="blur-up lazyload" alt="">
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item" href="#">
                                                                        <img src="https://themes.pixelstrap.com/fastkart/assets/svg/1/meats.svg" class="img-fluid" alt="">
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item" href="#">
                                                                        <img src="https://themes.pixelstrap.com/fastkart/assets/svg/1/breakfast.svg" class="img-fluid" alt="">
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item" href="#">
                                                                        <img src="https://themes.pixelstrap.com/fastkart/assets/svg/1/frozen.svg" class="img-fluid" alt="">
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item" href="#">
                                                                        <img src="https://themes.pixelstrap.com/fastkart/assets/svg/1/biscuit.svg" class="img-fluid" alt="">
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item" href="#">
                                                                        <img src="https://themes.pixelstrap.com/fastkart/assets/svg/1/grocery.svg" class="img-fluid" alt="">
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item" href="#">
                                                                        <img src="https://themes.pixelstrap.com/fastkart/assets/svg/1/drink.svg" class="img-fluid" alt="">
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item" href="#">
                                                                        <img src="https://themes.pixelstrap.com/fastkart/assets/svg/1/milk.svg" class="img-fluid" alt="">
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item" href="#">
                                                                        <img src="https://themes.pixelstrap.com/fastkart/assets/svg/1/pet.svg" class="img-fluid" alt="">
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div> -->
                                                </div>
                                                <button class="btn btn-solid" name="submit_size" type="submit">Submit</button>
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
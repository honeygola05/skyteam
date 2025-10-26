<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from themes.pixelstrap.com/fastkart/back-end/add-new-material.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 Apr 2024 05:07:03 GMT -->

<head>
    <?php include('include/head_admin.php');


    $name = '';
    $url = '';

    if (isset($_GET['id']) && $_GET['id'] != '') {
        $id = get_safe_value($con, $_GET['id']);
        $image_required = '';
        $res = mysqli_query($con, "select * from material where id='$id'");
        $check = mysqli_num_rows($res);
        if ($check > 0) {
            $row = mysqli_fetch_assoc($res);
            $name = $row['name'];
            $url = $row['url'];
        } else {
            header('location:all-material.php');
            die();
        }
    }

    if (isset($_POST['submit_material'])) {
        // prx($_POST);
        $name = get_safe_value($con, $_POST['name']);
        $url = generate_seo_friendly_title($name);



        $msg = "";

        if ($msg == '') {
            if (isset($_GET['id']) && $_GET['id'] != '') {

                mysqli_query($con, "UPDATE `material` SET `name`='$name', `url`='$url' WHERE `id`='$id'");
            } else {
             
                $insert_query = "INSERT INTO `material` (`name`, `url`) VALUES ('$name','$url')";
                mysqli_query($con, $insert_query);
            }
            header('location:all-material.php');
            die();
        }
    }
    function generate_seo_friendly_title($title)
    {
        // Convert the title to lowercase
        $title = strtolower($title);

        // Replace spaces with dashes
        $title = str_replace(' ', '-', $title);

        // Remove special characters
        $title = preg_replace('/[^A-Za-z0-9\-]/', '', $title);

        return $title;
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
                                                <h5>Material Information</h5>
                                            </div>
                                            <form method="post" enctype="multipart/form-data">
                                                <div class="theme-form theme-form-2 mega-form">
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-3 mb-0">Material Name</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" name="name" type="text" placeholder="Material Name" value="<?php echo $name ?>"  required>
                                                        </div>
                                                    </div>


                                                  

                                                    <!-- <div class="mb-4 row align-items-center">
                                                    <div class="col-sm-3 form-label-title">Select material Icon</div>
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
                                                <button class="btn btn-solid" name="submit_material" type="submit">Submit</button>
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


<!-- Mirrored from themes.pixelstrap.com/fastkart/back-end/add-new-material.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 Apr 2024 05:07:04 GMT -->

</html>
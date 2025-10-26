<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from themes.pixelstrap.com/fastkart/back-end/add-new-category.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 Apr 2024 05:07:03 GMT -->

<head>
    <?php include('include/head_admin.php');

    $blog_title = '';
    $short_description = '';
    $image = '';
    $image_alt_tag = '';
    $description = '';
    $blog_url = '';
    $meta_title = '';
    $meta_desc = '';

    if (isset($_GET['id']) && $_GET['id'] != '') {
        $id = get_safe_value($con, $_GET['id']);
        $image_required = '';
        $res = mysqli_query($con, "select * from blogs where id='$id'");
        $check = mysqli_num_rows($res);
        if ($check > 0) {
            $row = mysqli_fetch_assoc($res);
            $blog_title = $row['blog_title'];
            $short_description = $row['short_description'];
            $image = $row['image'];
            $image_alt_tag = $row['image_alt_tag'];
            $description = $row['description'];
            $blog_url = $row['blog_url'];
            $meta_title = $row['meta_title'];
            $meta_desc = $row['meta_desc'];
        } else {
            header('location:all-blog.php');
            die();
        }
    }

    if (isset($_POST['submit_blog'])) {
        // prx($_POST);
        $blog_title = get_safe_value($con, $_POST['blog_title']);
        $short_description = get_safe_value($con, $_POST['short_description']);
        $image_alt_tag = get_safe_value($con, $_POST['image_alt_tag']);
        $description = get_safe_value($con, $_POST['description']);
        $blog_url = generate_seo_friendly_title($blog_title);
        $meta_title = get_safe_value($con, $_POST['meta_title']);
        $meta_desc = get_safe_value($con, $_POST['meta_desc']);

        if (isset($_GET['id']) && $_GET['id'] == 0) {
            if ($_FILES['image']['type'] != 'image/png' && $_FILES['image']['type'] != 'image/jpg' && $_FILES['image']['type'] != 'image/jpeg' && $_FILES['image']['type'] != 'image/webp') {
                $msg = "Please select only png, jpg, webp and jpeg image format";
            }
        } else {
            if ($_FILES['image']['type'] != '') {
                if ($_FILES['image']['type'] != 'image/png' && $_FILES['image']['type'] != 'image/jpg' && $_FILES['image']['type'] != 'image/jpeg' && $_FILES['image']['type'] != 'image/jpeg') {
                    $msg = "Please select only png, jpg, webp and jpeg image format";
                }
            }
        }


        $msg = "";

        if ($msg == '') {
            if (isset($_GET['id']) && $_GET['id'] != '') {
                if ($_FILES['image']['name'] != '') {
                    $image =  $_FILES['image']['name'];
                    move_uploaded_file($_FILES['image']['tmp_name'], "../media/blogs/" . $image);
                    mysqli_query($con, "UPDATE `blogs` SET `blog_title`='$blog_title',`short_description`='$short_description', `image`='$image',`image_alt_tag`='$image_alt_tag',`description`='$description', `blog_url`='$blog_url',`meta_title`='$meta_title',`meta_desc`='$meta_desc' WHERE `id`='$id'");
                } else {
                    $update_query = "UPDATE `blogs` SET `blog_title`='$blog_title',`short_description`='$short_description', `image`='$image',`image_alt_tag`='$image_alt_tag',`description`='$description',`blog_url`='$blog_url',`meta_title`='$meta_title',`meta_desc`='$meta_desc' WHERE `id`='$id'";

                    mysqli_query($con, $update_query);
                }
            } else {
                $image = rand(111111111, 999999999) . '_' . $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'], "../media/blogs/" . $image);
                $insert_query = "INSERT INTO `blogs`(`blog_title`, `short_description`, `image`,`image_alt_tag`, `description`, `blog_url`, `meta_title`,`meta_desc`) 
        VALUES ('$blog_title','$short_description', '$image','$image_alt_tag','$description','$blog_url', '$meta_title','$meta_desc')";
                mysqli_query($con, $insert_query);
                // print_r($insert_query);
            }
            header('location:all-blog.php');
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
                                                <h5>Blog Details</h5>
                                            </div>
                                            <form method="post" enctype="multipart/form-data">
                                                <div class="theme-form theme-form-2 mega-form">
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-3 mb-0">Blog Title</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" name="blog_title" type="text" placeholder="Blog Title" value="<?php echo $blog_title ?>">
                                                        </div>
                                                    </div>
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-3 mb-0">Short Description</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" name="short_description" type="text" placeholder="Short Description" value="<?php echo $short_description ?>">
                                                        </div>
                                                    </div>

                                                    <div class="mb-4 row align-items-center">
                                                        <label class="col-sm-3 col-form-label form-label-title">Blog Image</label>
                                                        <div class="form-group col-sm-9">
                                                            <input class="form-control" type="file" name="image" placeholder="Blog Image" value="<?php echo $image ?>" <?php echo $image ?>>

                                                            <?php
                                                            if ($image != '') {
                                                                echo "<a target='_blank' href='" . "../media/blogs/" . $image . "'><img width='150px' src='" . "../media/blogs/" . $image . "'/></a>";
                                                            }
                                                            ?>
                                                        </div>

                                                    </div>

                                                    <div class="mb-4 row align-items-center">
                                                        <label class="col-sm-3 col-form-label form-label-title">Image Alt Text</label>
                                                        <div class="form-group col-sm-9">
                                                            <input class="form-control" type="text" name="image_alt_tag" <?php echo $image_alt_tag ?> placeholder="Image Alt Text" value="<?php echo $image_alt_tag ?>">

                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <label class="form-label-title col-sm-12 mb-0">Product
                                                            Description</label>
                                                        <div class="col-sm-12">
                                                            <textarea id="editor" name="description"><?php echo $description ?></textarea>
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
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="card-header-2">
                                                            <h5>Search Engine Listing</h5>
                                                        </div>

                                                        <div class="mb-4 row align-items-center">
                                                            <label class="form-label-title col-sm-3 mb-0">Meta title</label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" name="meta_title" value="<?= $meta_title ?>" type="text" placeholder="Meta title">
                                                            </div>
                                                        </div>

                                                        <div class="mb-4 row">
                                                            <label class="form-label-title col-sm-3 mb-0">Meta
                                                                Description</label>
                                                            <div class="col-sm-9">
                                                                <textarea class="form-control" name="meta_desc" rows="3"><?= $meta_desc ?></textarea>
                                                            </div>
                                                        </div>

                                                     
                                                    </div>
                                                </div>
                                                <button class="btn btn-solid" name="submit_blog" type="submit">Submit</button>
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
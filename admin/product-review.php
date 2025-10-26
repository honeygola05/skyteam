<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from themes.pixelstrap.com/fastkart/back-end/product-review.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 Apr 2024 05:07:06 GMT -->

<head>
    <?php include('include/head_admin.php');

    $sql = "SELECT * FROM `product_review`";
    $res = mysqli_query($con, $sql);
    ?>
</head>

<body>
    <!-- tap on top start-->
    <div class="tap-top">
        <span class="lnr lnr-chevron-up"></span>
    </div>
    <!-- tap on tap end-->

    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        <?php include('include/header_admin.php'); ?>
        <!-- Page Header Ends-->

        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->
            <?php include('include/sidebar_admin.php'); ?>
            <!-- Page Sidebar Ends-->

            <!-- product review section start -->
            <div class="page-body">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card card-table">
                                <!-- Table Start -->
                                <div class="card-body">
                                    <div class="title-header option-title">
                                        <h5>Product Reviews</h5>
                                    </div>
                                    <div>
                                        <div class="table-responsive">
                                            <table class="user-table ticket-table review-table theme-table table" id="table_id">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Customer Name</th>
                                                        <th>Product Name</th>
                                                        <th>Rating</th>
                                                        <th>Comment</th>
                                                        <th>Published</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $i = 1;
                                                    while ($row = mysqli_fetch_assoc($res)) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $i++ ?></td>
                                                            <td><?= $row['name'] ?></td>
                                                            <td><?php
                                                                $p_id = $row['product_id'];
                                                                $product = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `product` WHERE `id` = '$p_id'"));
                                                                echo $product['name'];
                                                                ?></td>
                                                            <td>
                                                                <ul class="rating">
                                                                    <?php
                                                                    $rating = $row['rating'];
                                                                    for ($i = 1; $i <= 5; $i++) {
                                                                        if ($i <= $rating) {
                                                                            echo '<li><i class="fas fa-star theme-color"></i></li>';
                                                                        } else {
                                                                            echo '<li><i class="fas fa-star"></i></li>';
                                                                        }
                                                                    }
                                                                    ?>
                                                                </ul>
                                                            </td>
                                                            <td><?= $row['review'] ?></td>
                                                            <td class="td-check">
                                                                <i class="ri-checkbox-circle-line"></i>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Table End -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Container-fluid Ends-->

                <div class="container-fluid">
                    <!-- footer start-->
                    <?php include('include/footer_admin.php'); ?>
                </div>
            </div>
            <!-- product review section End -->
        </div>
        <!-- Page Body end-->


    </div>
    <!-- page-wrapper end-->

    <?php include('include/foot_admin.php'); ?>
</body>


<!-- Mirrored from themes.pixelstrap.com/fastkart/back-end/product-review.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 Apr 2024 05:07:06 GMT -->

</html>
<!DOCTYPE html>
<html lang="en">


<head>
    <?php include('include/head_admin.php'); ?>
    <?php isNotAdmin(); ?>
    <?php
    $msg = '';
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "select * from admin_users where `username`='$username' and password='$password'";

        $res = mysqli_query($con, $sql);
        $count = mysqli_num_rows($res);
        if ($count > 0) {
            $row = mysqli_fetch_assoc($res);
            if ($row['status'] == '0') {
                $msg = "Account deactivated";
            } else {
                $_SESSION['ADMIN_LOGIN'] = 'yes';
                $_SESSION['ADMIN_ID'] = $row['id'];
                $_SESSION['ADMIN_USERNAME'] = $username;
                header('location: index.php');
                die();
            }
        } else {
            $msg = "Please enter correct login details";
        }
    }
    ?> 
</head>

<body>
    <!-- tap on top start -->

    <!-- tap on tap end -->

    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">

        <div class="login">

            <form class="theme-form theme-form-2 mega-form" method="post">
                <div class="text-center">
                    <img src="../img/logo.webp" style="margin: auto; width: 50%;">
                </div>
                <div class="row">
                    <div class="mb-4 row align-items-center">
                        <label class="col-lg-2 col-md-3 col-form-label form-label-title">Username</label>
                        <div class="col-md-9 col-lg-10">
                            <input class="form-control" name="username" type="text">
                        </div>
                    </div>

                    <div class="mb-4 row align-items-center">
                        <label class="col-lg-2 col-md-3 col-form-label form-label-title">Password</label>
                        <div class="col-md-9 col-lg-10">
                            <input class="form-control" name="password" type="password">
                        </div>
                    </div>

                </div>
                <button class="btn btn-solid" name="submit" type="submit">Login</button>
                <p><?= $msg ?></p>
            </form>
        </div>

    </div>
    <!-- page-wrapper End-->


    <?php include('include/foot_admin.php'); ?>

</body>

<!-- Mirrored from rn53themes.net/themes/demo/lava-admin/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Feb 2024 16:25:14 GMT -->

</html>
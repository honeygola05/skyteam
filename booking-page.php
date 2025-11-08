<!DOCTYPE html>
<html lang="en" data-x="html" data-x-toggle="html-overflow-hidden">


<!-- Mirrored from creativelayers.net/themes/gotrip-html/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 25 Jun 2025 05:58:09 GMT -->

<head>
    <?php include('include/head.php'); ?>
</head>

<body>
    <?php include('include/preloader.php') ?>

    <main>

        <div class="header-margin"></div>
        <?php include('include/header.php');  ?>
        <section class="section-bg layout-pt-lg layout-pb-lg">
            <div class="section-bg__item col-12">
                <img src="img/pages/about/1.png" alt="image">
            </div>

            <div class="container">
                <div class="row justify-center text-center">
                    <div class="col-xl-6 col-lg-8 col-md-10">
                        <h1 class="text-40 md:text-25 fw-600 text-white">Booking Page</h1>
                        <div class="text-white mt-15">Your trusted trip companion</div>
                    </div>
                </div>
            </div>
        </section>

        <section class="layout-pt-lg layout-pb-lg bg-blue-2">
            <div class="container">
                <div class="row justify-center">
                    <div class="col-xl-7 col-lg-7 col-md-9">
                        <div class="px-50 py-50 sm:px-20 sm:py-20 bg-white shadow-4 rounded-4">

                            <form method="POST">
                                <div class="row y-gap-20">
                                    <div class="col-12">
                                        <h1 class="text-22 fw-500">Passenger Details</h1>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-input">
                                            <input type="text" name="name" required>
                                            <label class="lh-1 text-14 text-light-1">Name</label>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-input">
                                            <input type="date" name="dob" required>
                                            <label class="lh-1 text-14 text-light-1">Date Of Birth</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-input">
                                            <input type="text" name="passport_no" required>
                                            <label class="lh-1 text-14 text-light-1">Passport No.</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-input">
                                            <input type="text" name="id" required>
                                            <label class="lh-1 text-14 text-light-1">Id No.</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <h1 class="text-22 fw-500">Contact Details</h1>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-input">
                                            <input type="email" name="email" required>
                                            <label class="lh-1 text-14 text-light-1">Email</label>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-input">
                                            <input type="tel" name="phone" required>
                                            <label class="lh-1 text-14 text-light-1">Phone</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" name="booking_submit" class="button py-20 -dark-1 bg-blue-1 text-white w-100" style="width: 100%;">
                                            Continue <div class="icon-arrow-top-right ml-15"></div>
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-5 col-md-3">
                        <div class="px-50 py-50 sm:px-20 sm:py-20 bg-white shadow-4 rounded-4">
                            <div class="row y-gap-20">
                                <div class="col-12">
                                    <h1 class="text-22 fw-500">Your Booking</h1>
                                </div>
                                <div class="col-12">
                                    <div class="row y-gap-10">
                                        <div class="col-6">
                                            <div class="text-16 text-dark-1">Flight Number</div>
                                            <div class="text-16 text-light-1">Dummy Flight Number</div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-16 text-dark-1">From</div>
                                            <div class="text-16 text-light-1">Dummy From</div>
                                        </div>
                                    </div>
                                    <div class="row y-gap-10 mt-10">
                                        <div class="col-6">
                                            <div class="text-16 text-dark-1">To</div>
                                            <div class="text-16 text-light-1">Dummy To</div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-16 text-dark-1">Date</div>
                                            <div class="text-16 text-light-1">Dummy Date</div>
                                        </div>
                                    </div>
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
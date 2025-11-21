<?php
$about = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `about` "));
$contact = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `info_co`"));
?>
<!-- <header data-add-bg="" class="header bg-white js-header" data-x="header" data-x-toggle="is-menu-opened">
    <div data-anim="fade" class="header__container px-30 sm:px-20">
        <div class="row justify-between items-center">
            <div class="col-auto">
                <div class="d-flex items-center">
                    <a href="index.php" class="header-logo mr-20" data-x="header-logo" data-x-toggle="is-logo-dark">
                        <img src="img/logo.webp" alt="logo icon">
                        <img src="img/logo.webp" alt="logo icon">
                    </a>
                    <div class="header-menu " data-x="mobile-menu" data-x-toggle="is-menu-active">
                        <div class="mobile-overlay"></div>
                        <div class="header-menu__content">
                            <div class="mobile-bg js-mobile-bg"></div>
                            <div class="menu js-navList">
                                <ul class="menu__nav text-dark-1 -is-active">
                                    <li>
                                        <a href="index.php">
                                            Home
                                        </a>
                                    </li>
                                    <li>
                                        <a href="about.php">
                                            About
                                        </a>
                                    </li>
                                    <li>
                                        <a href="flights.php">
                                            Flights
                                        </a>
                                    </li>
                                    <li>
                                        <a href="packages.php">
                                            Packages
                                        </a>
                                    </li>
                                    <li>
                                        <a href="contact.php">Contact</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="mobile-footer px-20 py-20 border-top-light js-mobile-footer">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-auto">
                <div class="d-flex items-center">
                    <div class="row x-gap-20 items-center xxl:d-none">
                        <div class="col-auto">
                            <button class="d-flex items-center text-14 text-dark-1">
                                <span class="js-currencyMenu-mainTitle">CAD</span>
                            </button>
                        </div>
                      
                        <div class="col-auto">
                            <div class="w-1 h-20 bg-black-20"></div>
                        </div>

                        <div class="col-auto">
                            <button class="d-flex items-center text-14 text-dark-1">
                                <img src="img/general/cd.png" alt="image" class="rounded-full mr-10">
                                <span class="js-language-mainTitle">CANADA</span>
                            </button>
                        </div>
                    </div>
                    <?php
                    if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != '') {
                    ?>
                        <div class="d-flex items-center ml-20 is-menu-opened-hide md:d-none">
                            <a href="account.php" class="button px-30 fw-400 text-14 -outline-blue-1 h-50 text-blue-1 ml-20">My Account</a>
                        </div>
                        <div class="d-none xl:d-flex x-gap-20 items-center pl-30" data-x="header-mobile-icons" data-x-toggle="text-white">
                            <div><a href="account.php" class="d-flex items-center icon-user text-inherit text-22"></a></div>
                            <div><button class="d-flex items-center icon-menu text-20" data-x-click="html, header, header-logo, header-mobile-icons, mobile-menu"></button></div>
                        </div>
                    <?php } else { ?>
                        <div class="d-flex items-center ml-20 is-menu-opened-hide md:d-none">
                            <div class="d-flex items-center ml-20 is-menu-opened-hide md:d-none">

                                <a href="signup.php" class="button px-30 fw-400 text-14 -outline-blue-1 h-50 text-blue-1 ml-20">Sign In / Register</a>
                            </div>
                            <div class="d-none xl:d-flex x-gap-20 items-center pl-30" data-x="header-mobile-icons" data-x-toggle="text-white">
                                <div>
                                    <a href="login.php" class="d-flex items-center icon-user text-inherit text-22"></a>
                                </div>
                                <div>
                                    <button class="d-flex items-center icon-menu text-20" data-x-click="html, header, header-logo, header-mobile-icons, mobile-menu"></button>
                                </div>
                            </div>
                        <?php } ?>
                        </div>
                </div>
            </div>
        </div>
</header> -->


<header data-add-bg="" class="header bg-white js-header" data-x="header" data-x-toggle="is-menu-opened">
    <div data-anim="fade" class="header__container px-30 sm:px-20 is-in-view">
        <div class="row justify-between items-center">

            <div class="col-auto">
                <div class="d-flex items-center">
                    <a href="index.html" class="header-logo mr-20" data-x="header-logo" data-x-toggle="is-logo-dark">
                        <img src="img/logo.webp" alt="logo icon">
                        <img src="img/logo.webp" alt="logo icon">
                    </a>


                    <div class="header-menu " data-x="mobile-menu" data-x-toggle="is-menu-active">
                        <div class="mobile-overlay"></div>

                        <div class="header-menu__content">
                            <div class="mobile-bg js-mobile-bg"></div>

                            <div class="menu js-navList">
                                <ul class="menu__nav text-dark-1 -is-active">
                                    <li>
                                        <a href="index.php">
                                            Home
                                        </a>
                                    </li>
                                    <li>
                                        <a href="about.php">
                                            About
                                        </a>
                                    </li>
                                    <li>
                                        <a href="flights.php">
                                            Flights
                                        </a>
                                    </li>
                                    <li>
                                        <a href="packages.php">
                                            Packages
                                        </a>
                                    </li>
                                    <li>
                                        <a href="contact.php">Contact</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="mobile-footer px-20 py-20 border-top-light js-mobile-footer">
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <div class="col-auto">
                <div class="d-flex items-center">

                    <div class="row x-gap-20 items-center xxl:d-none">
                        <div class="col-auto">
                            <button class="d-flex items-center text-14 text-dark-1">
                                <span class="js-currencyMenu-mainTitle">CAD</span>
                                <!-- <i class="icon-chevron-sm-down text-7 ml-10"></i> -->
                            </button>
                        </div>
                        <!-- <div class="col-auto">
                            <button class="d-flex items-center text-14 text-dark-1" data-x-click="currency">
                                <span class="js-currencyMenu-mainTitle">CAD</span>
                                <i class="icon-chevron-sm-down text-7 ml-10"></i>
                            </button>
                        </div> -->

                        <!-- <div class="col-auto">
                            <div class="w-1 h-20 bg-black-20"></div>
                        </div>

                        <div class="col-auto">
                            <button class="d-flex items-center text-14 text-dark-1" data-x-click="lang">
                                <img src="img/general/lang.png" alt="image" class="rounded-full mr-10">
                                <span class="js-language-mainTitle">United Kingdom</span>
                                <i class="icon-chevron-sm-down text-7 ml-15"></i>
                            </button>
                        </div> -->
                        <div class="col-auto">
                            <div class="w-1 h-20 bg-black-20"></div>
                        </div>

                        <div class="col-auto">
                            <button class="d-flex items-center text-14 text-dark-1">
                                <img src="img/general/cd.png" alt="image" class="rounded-full mr-10">
                                <span class="js-language-mainTitle">CANADA</span>
                            </button>
                        </div>
                    </div>


                    <div class="d-flex items-center ml-20 is-menu-opened-hide md:d-none">
                        <a href="<?php
                                    if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != '') {
                                        echo "login.php";
                                    } else {
                                        echo "account.php";
                                    }
                                    ?>" class="button px-30 fw-400 text-14 border-white -blue-1 h-50 text-white ml-20">
                            <?php
                            if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != '') {
                                echo "Register/Login";
                            } else {
                                echo "Account";
                            }
                            ?>
                        </a>
                    </div>

                    <div class="d-none xl:d-flex x-gap-20 items-center pl-30 text-white" data-x="header-mobile-icons" data-x-toggle="text-white">
                        <div><a href="<?php
                                        if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != '') {
                                            echo "login.php";
                                        } else {
                                            echo "account.php";
                                        }
                                        ?>" class="d-flex items-center icon-user text-inherit text-22" style="color: black;"></a></div>
                        <div>
                            <button class="d-flex items-center icon-menu text-inherit text-20" data-x-click="html, header, header-logo, header-mobile-icons, mobile-menu" style="color: black;"></button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</header>
<!DOCTYPE html>
<html lang="en" data-x="html" data-x-toggle="html-overflow-hidden">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="css/vendors.css">
    <link rel="stylesheet" href="css/main.css">

    <title>Skyteam Travel</title>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body>
    <div class="preloader js-preloader">
        <div class="preloader__wrap">
            <div class="preloader__icon">
                <svg width="38" height="37" viewBox="0 0 38 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_1_41)">
                        <path d="M32.9675 13.9422C32.9675 6.25436 26.7129 0 19.0251 0C11.3372 0 5.08289 6.25436 5.08289 13.9422C5.08289 17.1322 7.32025 21.6568 11.7327 27.3906C13.0538 29.1071 14.3656 30.6662 15.4621 31.9166V35.8212C15.4621 36.4279 15.9539 36.92 16.561 36.92H21.4895C22.0965 36.92 22.5883 36.4279 22.5883 35.8212V31.9166C23.6849 30.6662 24.9966 29.1071 26.3177 27.3906C30.7302 21.6568 32.9675 17.1322 32.9675 13.9422V13.9422ZM30.7699 13.9422C30.7699 16.9956 27.9286 21.6204 24.8175 25.7245H23.4375C25.1039 20.7174 25.9484 16.7575 25.9484 13.9422C25.9484 10.3587 25.3079 6.97207 24.1445 4.40684C23.9229 3.91841 23.6857 3.46886 23.4347 3.05761C27.732 4.80457 30.7699 9.02494 30.7699 13.9422ZM20.3906 34.7224H17.6598V32.5991H20.3906V34.7224ZM21.0007 30.4014H17.0587C16.4167 29.6679 15.7024 28.8305 14.9602 27.9224H16.1398C16.1429 27.9224 16.146 27.9227 16.1489 27.9227C16.152 27.9227 23.0902 27.9224 23.0902 27.9224C22.3725 28.8049 21.6658 29.6398 21.0007 30.4014ZM19.0251 2.19765C20.1084 2.19765 21.2447 3.33365 22.1429 5.3144C23.1798 7.60078 23.7508 10.6649 23.7508 13.9422C23.7508 16.6099 22.8415 20.6748 21.1185 25.7245H16.9322C15.2086 20.6743 14.2994 16.6108 14.2994 13.9422C14.2994 10.6649 14.8706 7.60078 15.9075 5.3144C16.8057 3.33365 17.942 2.19765 19.0251 2.19765V2.19765ZM7.28053 13.9422C7.28053 9.02494 10.3184 4.80457 14.6157 3.05761C14.3647 3.46886 14.1273 3.91841 13.9059 4.40684C12.7425 6.97207 12.102 10.3587 12.102 13.9422C12.102 16.7584 12.9462 20.7176 14.6126 25.7245H13.2259C9.33565 20.6126 7.28053 16.5429 7.28053 13.9422Z" fill="#3554D1" />
                    </g>

                    <defs>
                        <clipPath id="clip0_1_41">
                            <rect width="36.92" height="36.92" fill="white" transform="translate(0.540039)" />
                        </clipPath>
                    </defs>
                </svg>
            </div>
        </div>

        <div class="preloader__title"><img src="img/logo.webp" alt=""></div>
    </div>
    <main>
        <header data-add-bg="" class="header bg-white js-header" data-x="header" data-x-toggle="is-menu-opened">
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


                                            <!-- <li class="menu-item-has-children -has-mega-menu">
                                        <a data-barba href="#">
                                            <span class="mr-10">Categories</span>
                                            <i class="icon icon-chevron-sm-down"></i>
                                        </a>

                                        <div class="mega">
                                            <div class="tabs -underline-2 js-tabs">
                                                <div class="tabs__controls row x-gap-40 y-gap-10 lg:x-gap-20 pb-30 js-tabs-controls">

                                                    <div class="col-auto">
                                                        <button class="tabs__button text-light-1 fw-500 js-tabs-button is-tab-el-active" data-tab-target=".-tab-item-1">Hotel</button>
                                                    </div>

                                                    <div class="col-auto">
                                                        <button class="tabs__button text-light-1 fw-500 js-tabs-button " data-tab-target=".-tab-item-2">Tour</button>
                                                    </div>

                                                    <div class="col-auto">
                                                        <button class="tabs__button text-light-1 fw-500 js-tabs-button " data-tab-target=".-tab-item-3">Activity</button>
                                                    </div>

                                                    <div class="col-auto">
                                                        <button class="tabs__button text-light-1 fw-500 js-tabs-button " data-tab-target=".-tab-item-4">Holiday Rentals</button>
                                                    </div>

                                                    <div class="col-auto">
                                                        <button class="tabs__button text-light-1 fw-500 js-tabs-button " data-tab-target=".-tab-item-5">Car</button>
                                                    </div>

                                                    <div class="col-auto">
                                                        <button class="tabs__button text-light-1 fw-500 js-tabs-button " data-tab-target=".-tab-item-6">Cruise</button>
                                                    </div>

                                                    <div class="col-auto">
                                                        <button class="tabs__button text-light-1 fw-500 js-tabs-button " data-tab-target=".-tab-item-7">Flights</button>
                                                    </div>

                                                </div>

                                                <div class="tabs__content js-tabs-content">
                                                    <div class="tabs__pane -tab-item-1 is-tab-el-active">
                                                        <div class="mega__content">
                                                            <div class="mega__grid">

                                                                <div class="mega__item">
                                                                    <div class="text-15 fw-500">Hotel List</div>
                                                                    <div class="y-gap-5 text-15 pt-5">

                                                                        <div><a href="hotel-list-1.html">Hotel List v1</a></div>

                                                                        <div><a href="hotel-list-2.html">Hotel List v2</a></div>

                                                                        <div><a href="hotel-half-map.html">Hotel List v3</a></div>

                                                                        <div><a href="hotel-grid-1.html">Hotel List v4</a></div>

                                                                        <div><a href="hotel-grid-2.html">Hotel List v5</a></div>

                                                                    </div>
                                                                </div>

                                                                <div class="mega__item">
                                                                    <div class="text-15 fw-500">Hotel Single</div>
                                                                    <div class="y-gap-5 text-15 pt-5">

                                                                        <div><a href="hotel-single-1.html">Hotel Single v1</a></div>

                                                                        <div><a href="hotel-single-2.html">Hotel Single v2</a></div>

                                                                    </div>
                                                                </div>

                                                                <div class="mega__item">
                                                                    <div class="text-15 fw-500">Hotel Booking</div>
                                                                    <div class="y-gap-5 text-15 pt-5">

                                                                        <div><a href="booking-pages.html">Booking Page</a></div>

                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="mega__image d-flex relative">
                                                                <img src="#" data-src="img/backgrounds/7.png" alt="image" class="rounded-4 js-lazy">

                                                                <div class="absolute w-full h-full px-30 py-24">
                                                                    <div class="text-22 fw-500 lh-15 text-white">Things to do on <br> your trip</div>
                                                                    <button class="button h-50 px-30 -blue-1 text-dark-1 bg-white mt-20">Experinces</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="tabs__pane -tab-item-2">
                                                        <div class="mega__content">
                                                            <div class="mega__grid">

                                                                <div class="mega__item">
                                                                    <div class="text-15 fw-500">Tour List</div>
                                                                    <div class="y-gap-5 text-15 pt-5">

                                                                        <div><a href="tour-list-1.html">Tour List v1</a></div>

                                                                        <div><a href="tour-grid-1.html">Tour List v2</a></div>

                                                                    </div>
                                                                </div>

                                                                <div class="mega__item">
                                                                    <div class="text-15 fw-500">Tour Pages</div>
                                                                    <div class="y-gap-5 text-15 pt-5">

                                                                        <div><a href="tour-map.html">Tour Map</a></div>

                                                                        <div><a href="tour-single.html">Tour Single</a></div>

                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="mega__image d-flex relative">
                                                                <img src="img/backgrounds/7.png" alt="image" class="rounded-4">

                                                                <div class="absolute w-full h-full px-30 py-24">
                                                                    <div class="text-22 fw-500 lh-15 text-white">Things to do on <br> your trip</div>
                                                                    <button class="button h-50 px-30 -blue-1 text-dark-1 bg-white mt-20">Experinces</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="tabs__pane -tab-item-3">
                                                        <div class="mega__content">
                                                            <div class="mega__grid">

                                                                <div class="mega__item">
                                                                    <div class="text-15 fw-500">Activity List</div>
                                                                    <div class="y-gap-5 text-15 pt-5">

                                                                        <div><a href="activity-list-1.html">Activity List v1</a></div>

                                                                        <div><a href="activity-grid-1.html">Activity List v2</a></div>

                                                                    </div>
                                                                </div>

                                                                <div class="mega__item">
                                                                    <div class="text-15 fw-500">Activity Pages</div>
                                                                    <div class="y-gap-5 text-15 pt-5">

                                                                        <div><a href="activity-map.html">Activity Map</a></div>

                                                                        <div><a href="activity-single.html">Activity Single</a></div>

                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="mega__image d-flex relative">
                                                                <img src="img/backgrounds/7.png" alt="image" class="rounded-4">

                                                                <div class="absolute w-full h-full px-30 py-24">
                                                                    <div class="text-22 fw-500 lh-15 text-white">Things to do on <br> your trip</div>
                                                                    <button class="button h-50 px-30 -blue-1 text-dark-1 bg-white mt-20">Experinces</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="tabs__pane -tab-item-4">
                                                        <div class="mega__content">
                                                            <div class="mega__grid">

                                                                <div class="mega__item">
                                                                    <div class="text-15 fw-500">Rental List</div>
                                                                    <div class="y-gap-5 text-15 pt-5">

                                                                        <div><a href="rental-list-1.html">Rental List v1</a></div>

                                                                        <div><a href="rental-grid-1.html">Rental List v2</a></div>

                                                                    </div>
                                                                </div>

                                                                <div class="mega__item">
                                                                    <div class="text-15 fw-500">Rental Pages</div>
                                                                    <div class="y-gap-5 text-15 pt-5">

                                                                        <div><a href="rental-map.html">Rental Map</a></div>

                                                                        <div><a href="rental-single.html">Rental Single</a></div>

                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="mega__image d-flex relative">
                                                                <img src="img/backgrounds/7.png" alt="image" class="rounded-4">

                                                                <div class="absolute w-full h-full px-30 py-24">
                                                                    <div class="text-22 fw-500 lh-15 text-white">Things to do on <br> your trip</div>
                                                                    <button class="button h-50 px-30 -blue-1 text-dark-1 bg-white mt-20">Experinces</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="tabs__pane -tab-item-5">
                                                        <div class="mega__content">
                                                            <div class="mega__grid">

                                                                <div class="mega__item">
                                                                    <div class="text-15 fw-500">Car List</div>
                                                                    <div class="y-gap-5 text-15 pt-5">

                                                                        <div><a href="car-list-1.html">Car List v1</a></div>

                                                                        <div><a href="car-grid-1.html">Car List v2</a></div>

                                                                    </div>
                                                                </div>

                                                                <div class="mega__item">
                                                                    <div class="text-15 fw-500">Car Pages</div>
                                                                    <div class="y-gap-5 text-15 pt-5">

                                                                        <div><a href="car-map.html">Car Map</a></div>

                                                                        <div><a href="car-single.html">Car Single</a></div>

                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="mega__image d-flex relative">
                                                                <img src="img/backgrounds/7.png" alt="image" class="rounded-4">

                                                                <div class="absolute w-full h-full px-30 py-24">
                                                                    <div class="text-22 fw-500 lh-15 text-white">Things to do on <br> your trip</div>
                                                                    <button class="button h-50 px-30 -blue-1 text-dark-1 bg-white mt-20">Experinces</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="tabs__pane -tab-item-6">
                                                        <div class="mega__content">
                                                            <div class="mega__grid">

                                                                <div class="mega__item">
                                                                    <div class="text-15 fw-500">Cruise List</div>
                                                                    <div class="y-gap-5 text-15 pt-5">

                                                                        <div><a href="cruise-list-1.html">Cruise List v1</a></div>

                                                                        <div><a href="cruise-grid-1.html">Cruise List v2</a></div>

                                                                    </div>
                                                                </div>

                                                                <div class="mega__item">
                                                                    <div class="text-15 fw-500">Cruise Pages</div>
                                                                    <div class="y-gap-5 text-15 pt-5">

                                                                        <div><a href="cruise-map.html">Cruise Map</a></div>

                                                                        <div><a href="cruise-single.html">Cruise Single</a></div>

                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="mega__image d-flex relative">
                                                                <img src="img/backgrounds/7.png" alt="image" class="rounded-4">

                                                                <div class="absolute w-full h-full px-30 py-24">
                                                                    <div class="text-22 fw-500 lh-15 text-white">Things to do on <br> your trip</div>
                                                                    <button class="button h-50 px-30 -blue-1 text-dark-1 bg-white mt-20">Experinces</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="tabs__pane -tab-item-7">
                                                        <div class="mega__content">
                                                            <div class="mega__grid">

                                                                <div class="mega__item">
                                                                    <div class="text-15 fw-500">Flight List</div>
                                                                    <div class="y-gap-5 text-15 pt-5">

                                                                        <div><a href="flights-list.html">Flight list v1</a></div>

                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="mega__image d-flex relative">
                                                                <img src="img/backgrounds/7.png" alt="image" class="rounded-4">

                                                                <div class="absolute w-full h-full px-30 py-24">
                                                                    <div class="text-22 fw-500 lh-15 text-white">Things to do on <br> your trip</div>
                                                                    <button class="button h-50 px-30 -blue-1 text-dark-1 bg-white mt-20">Experinces</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <ul class="subnav mega-mobile">
                                            <li class="subnav__backBtn js-nav-list-back">
                                                <a href="#"><i class="icon icon-chevron-sm-down"></i> Category</a>
                                            </li>

                                            <li class="menu-item-has-children">
                                                <a data-barba href="#">
                                                    <span class="mr-10">Hotel</span>
                                                    <i class="icon icon-chevron-sm-down"></i>
                                                </a>

                                                <ul class="subnav">
                                                    <li class="subnav__backBtn js-nav-list-back">
                                                        <a href="#"><i class="icon icon-chevron-sm-down"></i> Hotel</a>
                                                    </li>


                                                    <li><a href="hotel-list-1.html">Hotel List v1</a></li>

                                                    <li><a href="hotel-list-2.html">Hotel List v2</a></li>

                                                    <li><a href="hotel-single-1.html">Hotel Single v1</a></li>

                                                    <li><a href="hotel-single-2.html">Hotel Single v2</a></li>

                                                    <li><a href="booking-pages.html">Booking Page</a></li>

                                                </ul>
                                            </li>

                                            <li class="menu-item-has-children">
                                                <a data-barba href="#">
                                                    <span class="mr-10">Tour</span>
                                                    <i class="icon icon-chevron-sm-down"></i>
                                                </a>

                                                <ul class="subnav">
                                                    <li class="subnav__backBtn js-nav-list-back">
                                                        <a href="#"><i class="icon icon-chevron-sm-down"></i> Tour</a>
                                                    </li>

                                                    <li><a href="tour-list-1.html">Tour List v1</a></li>

                                                    <li><a href="tour-grid-1.html">Tour List v2</a></li>

                                                    <li><a href="tour-map.html">Tour Map</a></li>

                                                    <li><a href="tour-single.html">Tour Single</a></li>

                                                </ul>
                                            </li>

                                            <li class="menu-item-has-children">
                                                <a data-barba href="#">
                                                    <span class="mr-10">Activity</span>
                                                    <i class="icon icon-chevron-sm-down"></i>
                                                </a>

                                                <ul class="subnav">
                                                    <li class="subnav__backBtn js-nav-list-back">
                                                        <a href="#"><i class="icon icon-chevron-sm-down"></i> Activity</a>
                                                    </li>

                                                    <li><a href="activity-list-1.html">Activity List v1</a></li>

                                                    <li><a href="activity-grid-1.html">Activity List v2</a></li>

                                                    <li><a href="activity-map.html">Activity Map</a></li>

                                                    <li><a href="activity-single.html">Activity Single</a></li>

                                                </ul>
                                            </li>

                                            <li class="menu-item-has-children">
                                                <a data-barba href="#">
                                                    <span class="mr-10">Rental</span>
                                                    <i class="icon icon-chevron-sm-down"></i>
                                                </a>

                                                <ul class="subnav">
                                                    <li class="subnav__backBtn js-nav-list-back">
                                                        <a href="#"><i class="icon icon-chevron-sm-down"></i> Rental</a>
                                                    </li>

                                                    <li><a href="rental-list-1.html">Rental List v1</a></li>

                                                    <li><a href="rental-grid-1.html">Rental List v2</a></li>

                                                    <li><a href="rental-map.html">Rental Map</a></li>

                                                    <li><a href="rental-single.html">Rental Single</a></li>

                                                </ul>
                                            </li>

                                            <li class="menu-item-has-children">
                                                <a data-barba href="#">
                                                    <span class="mr-10">Car</span>
                                                    <i class="icon icon-chevron-sm-down"></i>
                                                </a>

                                                <ul class="subnav">
                                                    <li class="subnav__backBtn js-nav-list-back">
                                                        <a href="#"><i class="icon icon-chevron-sm-down"></i> Car</a>
                                                    </li>

                                                    <li><a href="car-list-1.html">Car List v1</a></li>

                                                    <li><a href="car-grid-1.html">Car List v2</a></li>

                                                    <li><a href="car-map.html">Car Map</a></li>

                                                    <li><a href="car-single.html">Car Single</a></li>

                                                </ul>
                                            </li>

                                            <li class="menu-item-has-children">
                                                <a data-barba href="#">
                                                    <span class="mr-10">Cruise</span>
                                                    <i class="icon icon-chevron-sm-down"></i>
                                                </a>

                                                <ul class="subnav">
                                                    <li class="subnav__backBtn js-nav-list-back">
                                                        <a href="#"><i class="icon icon-chevron-sm-down"></i> Cruise</a>
                                                    </li>

                                                    <li><a href="cruise-list-1.html">Cruise List v1</a></li>

                                                    <li><a href="cruise-grid-1.html">Cruise List v2</a></li>

                                                    <li><a href="cruise-map.html">Cruise Map</a></li>

                                                    <li><a href="cruise-single.html">Cruise Single</a></li>

                                                </ul>
                                            </li>

                                            <li class="menu-item-has-children">
                                                <a data-barba href="#">
                                                    <span class="mr-10">Flights</span>
                                                    <i class="icon icon-chevron-sm-down"></i>
                                                </a>

                                                <ul class="subnav">
                                                    <li class="subnav__backBtn js-nav-list-back">
                                                        <a href="#"><i class="icon icon-chevron-sm-down"></i> Flights</a>
                                                    </li>

                                                    <li><a href="flights-list.html">Flights List v1</a></li>

                                                </ul>
                                            </li>
                                        </ul>
                                    </li> -->

                                            <li>
                                                <a href="packages.php">
                                                    Packages
                                                </a>
                                            </li>
                                            <!-- <li>
                                        <a href="blogs.php">
                                            Blogs
                                        </a>
                                    </li> -->

                                            <!-- <li class="menu-item-has-children">
                                        <a data-barba href="#">
                                            <span class="mr-10">Pages</span>
                                            <i class="icon icon-chevron-sm-down"></i>
                                        </a>


                                        <ul class="subnav">
                                            <li class="subnav__backBtn js-nav-list-back">
                                                <a href="#"><i class="icon icon-chevron-sm-down"></i> Pages</a>
                                            </li>

                                            <li><a href="404.html">404</a></li>

                                            <li><a href="about.html">About</a></li>

                                            <li><a href="become-expert.html">Become expert</a></li>

                                            <li><a href="help-center.html">Help center</a></li>

                                            <li><a href="login.html">Login</a></li>

                                            <li><a href="signup.html">Register</a></li>

                                            <li><a href="terms.html">Terms</a></li>

                                            <li><a href="invoice.html">Invoice</a></li>

                                            <li><a href="ui-elements.html">UI elements</a></li>

                                        </ul>

                                    </li> -->


                                            <!-- <li class="menu-item-has-children">
                                        <a data-barba href="#">
                                            <span class="mr-10">Dashboard</span>
                                            <i class="icon icon-chevron-sm-down"></i>
                                        </a>


                                        <ul class="subnav">
                                            <li class="subnav__backBtn js-nav-list-back">
                                                <a href="#"><i class="icon icon-chevron-sm-down"></i> Dashboard</a>
                                            </li>

                                            <li><a href="db-dashboard.html">Dashboard</a></li>

                                            <li><a href="db-booking.html">Booking</a></li>

                                            <li><a href="db-settings.html">Settings</a></li>

                                            <li><a href="db-wishlist.html">Wishlist</a></li>

                                            <li><a href="db-vendor-dashboard.html">Vendor dashboard</a></li>

                                            <li><a href="db-vendor-add-hotel.html">Vendor add hotel</a></li>

                                            <li><a href="db-vendor-booking.html">Vendor booking</a></li>

                                            <li><a href="db-vendor-hotels.html">Vendor hotels</a></li>

                                            <li><a href="db-vendor-recovery.html">Vendor recovery</a></li>

                                        </ul>

                                    </li> -->


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
                                <!-- <a href="login.php" class="button px-30 fw-400 text-14 -blue-1 bg-blue-1 h-50 text-white">Become An Expert</a> -->
                                <!-- <a href="#" class="button px-30 fw-400 text-14 -blue-1 bg-blue-1 h-50 text-white" id="openLoginModal">Become An Expert</a> -->
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
                            </div>
                        </div>
                    </div>
                </div>
        </header>
        <section class="layout-pt-md layout-pb-md bg-light-2 pt-40 pb-40">
            <div class="container">
                <div class="row y-gap-30">
                    <div class="col-xl-8 col-lg-8 col-12">

                        <div class="js-accordion pt-40">
                            <div class="accordion__item py-30 px-30 bg-white rounded-4 base-tr mt-30" data-x="flight-item-1" data-x-toggle="shadow-2">
                                <div class="accordion__content" style="max-height: 100%;">
                                    <div class="flex justify-between items-center">
                                        <h5 class="h5 text-primary flex items-center font-medium">
                                            <span class="">DEL</span>
                                            <svg width="1em" height="1em" font-size="1.5rem" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-testid="ArrowRightIcon" style="user-select: none; display: inline-block;">
                                                <path fill-rule="evenodd" d="M18.7669 12a.725.725 0 0 1-.2127.5131l-6.0481 6.0425a.7254.7254 0 1 1-1.0253-1.0262l4.8085-4.8041H5.9585a.7253.7253 0 1 1 0-1.4506h10.3308l-4.8085-4.804a.7253.7253 0 1 1 1.0253-1.0263l6.0481 6.0425a.725.725 0 0 1 .2127.5131" clip-rule="evenodd"></path>
                                            </svg>
                                            <span class=""> YVR</span>
                                        </h5>
                                        <p class="body-sm text-primary ">
                                        <ul class="unordered-list d-flex x-gap-15">
                                            <li>Tue, 18 Nov</li>
                                            <li>1 stops</li>
                                            <li>9 H 15 M </li>
                                            <li>Economy</li>
                                        </ul>
                                        </p>
                                        <p>Delta Air Lines | 789</p>
                                    </div>
                                    <div class="border-light rounded-4 mt-30">
                                        <div class="py-20 px-30">
                                            <div class="row justify-between items-center">
                                                <div class="col-auto">
                                                    <div class="fw-500 text-dark-1">Depart • Tue, 18 Nov</div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="text-14 text-light-1">01:30 AM</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="py-30 px-30 border-top-light">
                                            <div class="row y-gap-10 justify-between">
                                                <div class="col-auto">
                                                    <div class="d-flex items-center mb-15">
                                                        <!-- <div class="w-28 d-flex justify-center mr-15">
                                                            <img src="img/flights/1.png" alt="image">
                                                        </div> -->

                                                        <div class="text-14 text-light-1">Delta Air Lines 789</div>
                                                    </div>

                                                    <div class="relative z-0">
                                                        <div class="border-line-2"></div>

                                                        <div class="d-flex items-center">
                                                            <div class="w-28 d-flex justify-center mr-15">
                                                                <div class="size-10 border-light rounded-full bg-white"></div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-auto">
                                                                    <div class="lh-14 fw-500">01:30 AM</div>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <div class="lh-14 fw-500">Indira Gandhi International Airport (Terminal 3)</div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="d-flex items-center mt-15">
                                                            <div class="w-28 d-flex justify-center mr-15">
                                                                <img src="img/flights/plane.svg" alt="image">
                                                            </div>

                                                            <div class="text-14 text-light-1">9 H 15 M</div>
                                                        </div>

                                                        <div class="d-flex items-center mt-15">
                                                            <div class="w-28 d-flex justify-center mr-15">
                                                                <div class="size-10 border-light rounded-full bg-border"></div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-auto">
                                                                    <div class="lh-14 fw-500">06:15 AM</div>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <div class="lh-14 fw-500">Charles de Gaulle International Airport (Terminal 2E)</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-auto text-right md:text-left">
                                                    <div class="text-14 text-light-1">Economy</div>
                                                    <div class="text-14 mt-15 md:mt-5">
                                                        789 (Narrow-body jet)<br>
                                                        Check-in : 1 Pieces<br>
                                                        Seats Left: 9 9 </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border-light rounded-4 mt-30">
                                        <div class="py-20 px-30">
                                            <div class="row justify-between items-center">
                                                <div class="col-auto">
                                                    <div class="fw-500 text-dark-1">Depart • Tue, 18 Nov</div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="text-14 text-light-1">10:20 AM</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="py-30 px-30 border-top-light">
                                            <div class="row y-gap-10 justify-between">
                                                <div class="col-auto">
                                                    <div class="d-flex items-center mb-15">
                                                        <!-- <div class="w-28 d-flex justify-center mr-15">
                                                            <img src="img/flights/1.png" alt="image">
                                                        </div> -->

                                                        <div class="text-14 text-light-1">Delta Air Lines 359</div>
                                                    </div>

                                                    <div class="relative z-0">
                                                        <div class="border-line-2"></div>

                                                        <div class="d-flex items-center">
                                                            <div class="w-28 d-flex justify-center mr-15">
                                                                <div class="size-10 border-light rounded-full bg-white"></div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-auto">
                                                                    <div class="lh-14 fw-500">10:20 AM</div>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <div class="lh-14 fw-500">Charles de Gaulle International Airport (Terminal 2E)</div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="d-flex items-center mt-15">
                                                            <div class="w-28 d-flex justify-center mr-15">
                                                                <img src="img/flights/plane.svg" alt="image">
                                                            </div>

                                                            <div class="text-14 text-light-1">10 H 5 M</div>
                                                        </div>

                                                        <div class="d-flex items-center mt-15">
                                                            <div class="w-28 d-flex justify-center mr-15">
                                                                <div class="size-10 border-light rounded-full bg-border"></div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-auto">
                                                                    <div class="lh-14 fw-500">11:25 AM</div>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <div class="lh-14 fw-500">Vancouver International Airport (Terminal M)</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-auto text-right md:text-left">
                                                    <div class="text-14 text-light-1">Economy</div>
                                                    <div class="text-14 mt-15 md:mt-5">
                                                        359 (Narrow-body jet)<br>
                                                        Check-in : 1 Pieces<br>
                                                        Seats Left: 9 9 </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border-light rounded-4 mt-30">
                                        <div class="py-20 px-30">
                                            <div class="row justify-between items-center">
                                                <div class="col-auto">
                                                    <div class="fw-500 text-dark-1">Select Seats(Recommended)</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="border-top-light">
                                            <div class="flight-selection-box">
                                                <button class="flight-seat-selector active" data-tab-target="flight-1">Flight 1</button>
                                                <button class="flight-seat-selector" data-tab-target="flight-2">Flight 2</button>
                                            </div>
                                            <div class="" id="flight-1">
                                                <div class="px-20 py-20 sm:px-20 sm:py-20 bg-white shadow-4 rounded-4 text-center">
                                                    <div class="mt-10">
                                                        <p>Windows this side</p>
                                                        <div class="plane-wrapper">
                                                            <div class="plane-body">
                                                                <div class="seat-column">
                                                                    <div class="seat booked" disabled data-price="0" data-seat="15A">15A</div>
                                                                    <div class="seat" data-price="0" data-seat="15B">15B</div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="15C">15C</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="15D">15D</div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="15E">15E</div>
                                                                    <div class="seat" data-price="0" data-seat="15G">15G</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="15H">15H</div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="15J">15J</div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="15K">15K</div>
                                                                </div>
                                                                <div class="seat-column">
                                                                    <div class="seat booked" disabled data-price="0" data-seat="16A">16A</div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="16B">16B</div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="16C">16C</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat" data-price="0" data-seat="16D">16D</div>
                                                                    <div class="seat" data-price="0" data-seat="16E">16E</div>
                                                                    <div class="seat" data-price="0" data-seat="16G">16G</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat" data-price="0" data-seat="16H">16H</div>
                                                                    <div class="seat" data-price="0" data-seat="16J">16J</div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="16K">16K</div>
                                                                </div>
                                                                <div class="seat-column">
                                                                    <div class="seat" data-price="0" data-seat="17A">17A</div>
                                                                    <div class="seat" data-price="0" data-seat="17B">17B</div>
                                                                    <div class="seat" data-price="0" data-seat="17C">17C</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="17D">17D</div>
                                                                    <div class="seat" data-price="0" data-seat="17E">17E</div>
                                                                    <div class="seat" data-price="0" data-seat="17G">17G</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat" data-price="0" data-seat="17H">17H</div>
                                                                    <div class="seat" data-price="0" data-seat="17J">17J</div>
                                                                    <div class="seat" data-price="0" data-seat="17K">17K</div>
                                                                </div>
                                                                <div class="seat-column">
                                                                    <div class="seat" data-price="0" data-seat="18A">18A</div>
                                                                    <div class="seat" data-price="0" data-seat="18B">18B</div>
                                                                    <div class="seat" data-price="0" data-seat="18C">18C</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat" data-price="0" data-seat="18D">18D</div>
                                                                    <div class="seat" data-price="0" data-seat="18E">18E</div>
                                                                    <div class="seat" data-price="0" data-seat="18G">18G</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat" data-price="0" data-seat="18H">18H</div>
                                                                    <div class="seat" data-price="0" data-seat="18J">18J</div>
                                                                    <div class="seat" data-price="0" data-seat="18K">18K</div>
                                                                </div>
                                                                <div class="seat-column">
                                                                    <div class="seat" data-price="0" data-seat="19A">19A</div>
                                                                    <div class="seat" data-price="0" data-seat="19B">19B</div>
                                                                    <div class="seat" data-price="0" data-seat="19C">19C</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat" data-price="0" data-seat="19D">19D</div>
                                                                    <div class="seat" data-price="0" data-seat="19E">19E</div>
                                                                    <div class="seat" data-price="0" data-seat="19G">19G</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat" data-price="0" data-seat="19H">19H</div>
                                                                    <div class="seat" data-price="0" data-seat="19J">19J</div>
                                                                    <div class="seat" data-price="0" data-seat="19K">19K</div>
                                                                </div>
                                                                <div class="seat-column">
                                                                    <div class="seat" data-price="0" data-seat="20A">20A</div>
                                                                    <div class="seat" data-price="0" data-seat="20B">20B</div>
                                                                    <div class="seat" data-price="0" data-seat="20C">20C</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat" data-price="0" data-seat="20D">20D</div>
                                                                    <div class="seat" data-price="0" data-seat="20E">20E</div>
                                                                    <div class="seat" data-price="0" data-seat="20G">20G</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat" data-price="0" data-seat="20H">20H</div>
                                                                    <div class="seat" data-price="0" data-seat="20J">20J</div>
                                                                    <div class="seat" data-price="0" data-seat="20K">20K</div>
                                                                </div>
                                                                <div class="seat-column">
                                                                    <div class="seat" data-price="0" data-seat="21A">21A</div>
                                                                    <div class="seat" data-price="0" data-seat="21B">21B</div>
                                                                    <div class="seat" data-price="0" data-seat="21C">21C</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat" data-price="0" data-seat="21D">21D</div>
                                                                    <div class="seat" data-price="0" data-seat="21E">21E</div>
                                                                    <div class="seat" data-price="0" data-seat="21G">21G</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat" data-price="0" data-seat="21H">21H</div>
                                                                    <div class="seat" data-price="0" data-seat="21J">21J</div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="21K">21K</div>
                                                                </div>
                                                                <div class="seat-column">
                                                                    <div class="seat" data-price="0" data-seat="22A">22A</div>
                                                                    <div class="seat" data-price="0" data-seat="22B">22B</div>
                                                                    <div class="seat" data-price="0" data-seat="22C">22C</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat" data-price="0" data-seat="22D">22D</div>
                                                                    <div class="seat" data-price="0" data-seat="22E">22E</div>
                                                                    <div class="seat" data-price="0" data-seat="22G">22G</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="22H">22H</div>
                                                                    <div class="seat" data-price="0" data-seat="22J">22J</div>
                                                                    <div class="seat" data-price="0" data-seat="22K">22K</div>
                                                                </div>
                                                                <div class="seat-column">
                                                                    <div class="seat" data-price="0" data-seat="23A">23A</div>
                                                                    <div class="seat" data-price="0" data-seat="23B">23B</div>
                                                                    <div class="seat" data-price="0" data-seat="23C">23C</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat" data-price="0" data-seat="23D">23D</div>
                                                                    <div class="seat" data-price="0" data-seat="23E">23E</div>
                                                                    <div class="seat" data-price="0" data-seat="23G">23G</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat" data-price="0" data-seat="23H">23H</div>
                                                                    <div class="seat" data-price="0" data-seat="23J">23J</div>
                                                                    <div class="seat" data-price="0" data-seat="23K">23K</div>
                                                                </div>
                                                                <div class="seat-column">
                                                                    <div class="seat" data-price="0" data-seat="24A">24A</div>
                                                                    <div class="seat" data-price="0" data-seat="24B">24B</div>
                                                                    <div class="seat" data-price="0" data-seat="24C">24C</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat" data-price="0" data-seat="24D">24D</div>
                                                                    <div class="seat" data-price="0" data-seat="24E">24E</div>
                                                                    <div class="seat" data-price="0" data-seat="24G">24G</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat" data-price="0" data-seat="24H">24H</div>
                                                                    <div class="seat" data-price="0" data-seat="24J">24J</div>
                                                                    <div class="seat" data-price="0" data-seat="24K">24K</div>
                                                                </div>
                                                                <div class="seat-column">
                                                                    <div class="seat" data-price="0" data-seat="25A">25A</div>
                                                                    <div class="seat" data-price="0" data-seat="25B">25B</div>
                                                                    <div class="seat" data-price="0" data-seat="25C">25C</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="25D">25D</div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="25E">25E</div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="25G">25G</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat" data-price="0" data-seat="25H">25H</div>
                                                                    <div class="seat" data-price="0" data-seat="25J">25J</div>
                                                                    <div class="seat" data-price="0" data-seat="25K">25K</div>
                                                                </div>
                                                                <div class="seat-column">
                                                                    <div class="seat booked" disabled data-price="0" data-seat="26A">26A</div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="26B">26B</div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="26C">26C</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="26D">26D</div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="26E">26E</div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="26G">26G</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="26H">26H</div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="26J">26J</div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="26K">26K</div>
                                                                </div>
                                                                <div class="seat-column">
                                                                    <div class="seat booked" disabled data-price="0" data-seat="27A">27A</div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="27B">27B</div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="27C">27C</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="27D">27D</div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="27E">27E</div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="27G">27G</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="27H">27H</div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="27J">27J</div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="27K">27K</div>
                                                                </div>
                                                                <div class="seat-column">
                                                                    <div class="seat booked" disabled data-price="0" data-seat="28A">28A</div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="28B">28B</div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="28C">28C</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="28D">28D</div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="28E">28E</div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="28G">28G</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="28H">28H</div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="28J">28J</div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="28K">28K</div>
                                                                </div>
                                                                <div class="seat-column">
                                                                    <div class="seat booked" disabled data-price="0" data-seat="29A">29A</div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="29B">29B</div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="29C">29C</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="29D">29D</div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="29E">29E</div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="29G">29G</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="29H">29H</div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="29J">29J</div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="29K">29K</div>
                                                                </div>
                                                                <div class="seat-column">
                                                                    <div class="seat" data-price="0" data-seat="30A">30A</div>
                                                                    <div class="seat" data-price="0" data-seat="30B">30B</div>
                                                                    <div class="seat" data-price="0" data-seat="30C">30C</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="30D">30D</div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="30E">30E</div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="30G">30G</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat" data-price="0" data-seat="30H">30H</div>
                                                                    <div class="seat" data-price="0" data-seat="30J">30J</div>
                                                                    <div class="seat" data-price="0" data-seat="30K">30K</div>
                                                                </div>
                                                                <div class="seat-column">
                                                                    <div class="seat" data-price="0" data-seat="31A">31A</div>
                                                                    <div class="seat" data-price="0" data-seat="31B">31B</div>
                                                                    <div class="seat" data-price="0" data-seat="31C">31C</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="31D">31D</div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="31E">31E</div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="31G">31G</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="31H">31H</div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="31J">31J</div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="31K">31K</div>
                                                                </div>
                                                                <div class="seat-column">
                                                                    <div class="seat" data-price="0" data-seat="32A">32A</div>
                                                                    <div class="seat" data-price="0" data-seat="32B">32B</div>
                                                                    <div class="seat" data-price="0" data-seat="32C">32C</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat" data-price="0" data-seat="32D">32D</div>
                                                                    <div class="seat" data-price="0" data-seat="32E">32E</div>
                                                                    <div class="seat" data-price="0" data-seat="32G">32G</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat" data-price="0" data-seat="32H">32H</div>
                                                                    <div class="seat" data-price="0" data-seat="32J">32J</div>
                                                                    <div class="seat" data-price="0" data-seat="32K">32K</div>
                                                                </div>
                                                                <div class="seat-column">
                                                                    <div class="seat" data-price="0" data-seat="33A">33A</div>
                                                                    <div class="seat" data-price="0" data-seat="33B">33B</div>
                                                                    <div class="seat" data-price="0" data-seat="33C">33C</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat" data-price="0" data-seat="33D">33D</div>
                                                                    <div class="seat" data-price="0" data-seat="33E">33E</div>
                                                                    <div class="seat" data-price="0" data-seat="33G">33G</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat" data-price="0" data-seat="33H">33H</div>
                                                                    <div class="seat" data-price="0" data-seat="33J">33J</div>
                                                                    <div class="seat" data-price="0" data-seat="33K">33K</div>
                                                                </div>
                                                                <div class="seat-column">
                                                                    <div class="seat" data-price="0" data-seat="34A">34A</div>
                                                                    <div class="seat" data-price="0" data-seat="34B">34B</div>
                                                                    <div class="seat" data-price="0" data-seat="34C">34C</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat" data-price="0" data-seat="34D">34D</div>
                                                                    <div class="seat" data-price="0" data-seat="34E">34E</div>
                                                                    <div class="seat" data-price="0" data-seat="34G">34G</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat" data-price="0" data-seat="34H">34H</div>
                                                                    <div class="seat" data-price="0" data-seat="34J">34J</div>
                                                                    <div class="seat" data-price="0" data-seat="34K">34K</div>
                                                                </div>
                                                                <div class="seat-column">
                                                                    <div class="seat" data-price="0" data-seat="35A">35A</div>
                                                                    <div class="seat" data-price="0" data-seat="35B">35B</div>
                                                                    <div class="seat" data-price="0" data-seat="35C">35C</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat" data-price="0" data-seat="35D">35D</div>
                                                                    <div class="seat" data-price="0" data-seat="35E">35E</div>
                                                                    <div class="seat" data-price="0" data-seat="35G">35G</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat" data-price="0" data-seat="35H">35H</div>
                                                                    <div class="seat" data-price="0" data-seat="35J">35J</div>
                                                                    <div class="seat" data-price="0" data-seat="35K">35K</div>
                                                                </div>
                                                                <div class="seat-column">
                                                                    <div class="seat" data-price="0" data-seat="36A">36A</div>
                                                                    <div class="seat" data-price="0" data-seat="36B">36B</div>
                                                                    <div class="seat" data-price="0" data-seat="36C">36C</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat" data-price="0" data-seat="36D">36D</div>
                                                                    <div class="seat" data-price="0" data-seat="36E">36E</div>
                                                                    <div class="seat" data-price="0" data-seat="36G">36G</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat" data-price="0" data-seat="36H">36H</div>
                                                                    <div class="seat" data-price="0" data-seat="36J">36J</div>
                                                                    <div class="seat" data-price="0" data-seat="36K">36K</div>
                                                                </div>
                                                                <div class="seat-column">
                                                                    <div class="seat" data-price="0" data-seat="37A">37A</div>
                                                                    <div class="seat" data-price="0" data-seat="37B">37B</div>
                                                                    <div class="seat" data-price="0" data-seat="37C">37C</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat" data-price="0" data-seat="37D">37D</div>
                                                                    <div class="seat" data-price="0" data-seat="37E">37E</div>
                                                                    <div class="seat" data-price="0" data-seat="37G">37G</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat" data-price="0" data-seat="37H">37H</div>
                                                                    <div class="seat" data-price="0" data-seat="37J">37J</div>
                                                                    <div class="seat" data-price="0" data-seat="37K">37K</div>
                                                                </div>
                                                                <div class="seat-column">
                                                                    <div class="seat" data-price="0" data-seat="38A">38A</div>
                                                                    <div class="seat" data-price="0" data-seat="38B">38B</div>
                                                                    <div class="seat" data-price="0" data-seat="38C">38C</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat" data-price="0" data-seat="38D">38D</div>
                                                                    <div class="seat" data-price="0" data-seat="38E">38E</div>
                                                                    <div class="seat" data-price="0" data-seat="38G">38G</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat" data-price="0" data-seat="38H">38H</div>
                                                                    <div class="seat" data-price="0" data-seat="38J">38J</div>
                                                                    <div class="seat" data-price="0" data-seat="38K">38K</div>
                                                                </div>
                                                                <div class="seat-column">
                                                                    <div class="seat booked" disabled data-price="0" data-seat="39A">39A</div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="39B">39B</div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="39C">39C</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat" data-price="0" data-seat="39D">39D</div>
                                                                    <div class="seat" data-price="0" data-seat="39E">39E</div>
                                                                    <div class="seat" data-price="0" data-seat="39G">39G</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat" data-price="0" data-seat="39H">39H</div>
                                                                    <div class="seat" data-price="0" data-seat="39J">39J</div>
                                                                    <div class="seat" data-price="0" data-seat="39K">39K</div>
                                                                </div>
                                                                <div class="seat-column">
                                                                    <div class="seat booked" disabled data-price="0" data-seat="40A">40A</div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="40B">40B</div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="40C">40C</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat" data-price="0" data-seat="40D">40D</div>
                                                                    <div class="seat" data-price="0" data-seat="40E">40E</div>
                                                                    <div class="seat" data-price="0" data-seat="40G">40G</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat" data-price="0" data-seat="40H">40H</div>
                                                                    <div class="seat" data-price="0" data-seat="40J">40J</div>
                                                                    <div class="seat" data-price="0" data-seat="40K">40K</div>
                                                                </div>
                                                                <div class="seat-column">
                                                                    <div class="seat" data-price="0" data-seat="41A">41A</div>
                                                                    <div class="seat" data-price="0" data-seat="41B">41B</div>
                                                                    <div class="seat" data-price="0" data-seat="41C">41C</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat" data-price="0" data-seat="41D">41D</div>
                                                                    <div class="seat" data-price="0" data-seat="41E">41E</div>
                                                                    <div class="seat" data-price="0" data-seat="41G">41G</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat" data-price="0" data-seat="41H">41H</div>
                                                                    <div class="seat" data-price="0" data-seat="41J">41J</div>
                                                                    <div class="seat" data-price="0" data-seat="41K">41K</div>
                                                                </div>
                                                                <div class="seat-column">
                                                                    <div class="seat" data-price="0" data-seat="42A">42A</div>
                                                                    <div class="seat" data-price="0" data-seat="42B">42B</div>
                                                                    <div class="seat" data-price="0" data-seat="42C">42C</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat" data-price="0" data-seat="42D">42D</div>
                                                                    <div class="seat" data-price="0" data-seat="42E">42E</div>
                                                                    <div class="seat" data-price="0" data-seat="42G">42G</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat" data-price="0" data-seat="42H">42H</div>
                                                                    <div class="seat" data-price="0" data-seat="42J">42J</div>
                                                                    <div class="seat" data-price="0" data-seat="42K">42K</div>
                                                                </div>
                                                                <div class="seat-column">
                                                                    <div class="seat" data-price="0" data-seat="43A">43A</div>
                                                                    <div class="seat" data-price="0" data-seat="43B">43B</div>
                                                                    <div class="seat" data-price="0" data-seat="43C">43C</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat" data-price="0" data-seat="43D">43D</div>
                                                                    <div class="seat" data-price="0" data-seat="43E">43E</div>
                                                                    <div class="seat" data-price="0" data-seat="43G">43G</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat" data-price="0" data-seat="43H">43H</div>
                                                                    <div class="seat" data-price="0" data-seat="43J">43J</div>
                                                                    <div class="seat" data-price="0" data-seat="43K">43K</div>
                                                                </div>
                                                                <div class="seat-column">
                                                                    <div class="seat booked" disabled data-price="0" data-seat="44A">44A</div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="44B">44B</div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="44C">44C</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat" data-price="0" data-seat="44D">44D</div>
                                                                    <div class="seat" data-price="0" data-seat="44E">44E</div>
                                                                    <div class="seat" data-price="0" data-seat="44G">44G</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="44H">44H</div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="44J">44J</div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="44K">44K</div>
                                                                </div>
                                                                <div class="seat-column">
                                                                    <div class="seat booked" disabled data-price="0" data-seat="45A">45A</div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="45B">45B</div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="45C">45C</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat" data-price="0" data-seat="45D">45D</div>
                                                                    <div class="seat" data-price="0" data-seat="45E">45E</div>
                                                                    <div class="seat" data-price="0" data-seat="45G">45G</div>
                                                                    <div class='aisle'></div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="45H">45H</div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="45J">45J</div>
                                                                    <div class="seat booked" disabled data-price="0" data-seat="45K">45K</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <p>Windows this side</p>
                                                        <p class="text-light-1">Please note that seats 15 to 25 are in the wing area of the plane.</p>
                                                        <div class="legend">
                                                            <span><span class="legend-box available-box"></span> Available</span>
                                                            <span><span class="legend-box booked-box"></span> Booked</span>
                                                            <span><span class="legend-box selected-box"></span> Selected</span>
                                                            <span><span class="legend-box" style="background:#bfdbfe;border:1px solid #93c5fd;"></span> Wing Area</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="border-light rounded-4 mt-30">
                                        <div class="py-20 px-30">
                                            <div class="row justify-between items-center">
                                                <div class="col-auto">
                                                    <div class="fw-500 text-dark-1">Traveller Details</div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="text-14 text-light-1">
                                                        1 Passenger
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="py-30 px-30 border-top-light">
                                            <form id="travellerForm">
                                                <div class="row ">
                                                    <h5>Adult 1</h5>
                                                    <div class="col-md-2 col-sm-12">
                                                        <label for="traveller-2-title" class="text-14 text-light-1">Title</label>
                                                        <select name="title[]" id="traveller-2-title" class="form-select" style="padding:5px; border:1px solid #ddd; border-radius:5px;">
                                                            <option value="Mr">Mr</option>
                                                            <option value="Miss">Miss</option>
                                                            <option value="Mrs">Mrs</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4 col-sm-12">
                                                        <label for="traveller-2-first-name" class="text-14 text-light-1">First Name</label>
                                                        <input type="text" name="first-name[]" id="traveller-2-first-name" class="form-control" required style="padding:5px; border:1px solid #ddd; border-radius:5px;">
                                                        <span class="error text-danger first-name-error font-12"></span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-12">
                                                        <label for="traveller-2-first-name" class="text-14 text-light-1">Middle Name(optional)</label>
                                                        <input type="text" name="middle-name[]" id="traveller-2-middle-name" class="form-control" required style="padding:5px; border:1px solid #ddd; border-radius:5px;">
                                                    </div>
                                                    <div class="col-md-4 col-sm-12">
                                                        <label for="traveller-2-last-name" class="text-14 text-light-1">Last Name</label>
                                                        <input type="text" name="last-name[]" id="traveller-2-last-name" class="form-control" required style="padding:5px; border:1px solid #ddd; border-radius:5px;">
                                                        <span class="error text-danger last-name-error font-12"></span>
                                                    </div>
                                                    <div class="col-md-4 col-sm-12">
                                                        <label for="traveller-2-date-of-birth" class="text-14 text-light-1">Date of Birth</label>
                                                        <input type="date" name="dob[]" id="traveller-2-date-of-birth" class="form-control" required style="padding:5px; border:1px solid #ddd; border-radius:5px;">
                                                        <span class="error text-danger dob-error font-12"></span>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="border-light rounded-4 mt-30">
                                        <div class="py-20 px-30">
                                            <div class="row justify-between items-center">
                                                <div class="col-auto">
                                                    <div class="fw-500 text-dark-1">Contact Details</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="py-30 px-30 border-top-light">
                                            <form id="contactDetails">
                                                <div class="row y-gap-10">
                                                    <div class="col-lg-3">
                                                        <label for="traveller-country-code" class="text-14 text-light-1">Country Code</label>
                                                        <select class="form-select form-select-lg select2"
                                                            data-placeholder="Search Country Code"
                                                            name="traveller-country-code"
                                                            id="traveller-country-code">
                                                            <option value="" disabled selected>Search Country Code</option>
                                                            <option value="+93">
                                                                Afghanistan (+93)
                                                            </option>
                                                            <option value="+355">
                                                                Albania (+355)
                                                            </option>
                                                            <option value="+213">
                                                                Algeria (+213)
                                                            </option>
                                                            <option value="+376">
                                                                Andorra (+376)
                                                            </option>
                                                            <option value="+244">
                                                                Angola (+244)
                                                            </option>
                                                            <option value="+54">
                                                                Argentina (+54)
                                                            </option>
                                                            <option value="+374">
                                                                Armenia (+374)
                                                            </option>
                                                            <option value="+61">
                                                                Australia (+61)
                                                            </option>
                                                            <option value="+43">
                                                                Austria (+43)
                                                            </option>
                                                            <option value="+994">
                                                                Azerbaijan (+994)
                                                            </option>
                                                            <option value="+1-242">
                                                                Bahamas (+1-242)
                                                            </option>
                                                            <option value="+973">
                                                                Bahrain (+973)
                                                            </option>
                                                            <option value="+880">
                                                                Bangladesh (+880)
                                                            </option>
                                                            <option value="+375">
                                                                Belarus (+375)
                                                            </option>
                                                            <option value="+32">
                                                                Belgium (+32)
                                                            </option>
                                                            <option value="+501">
                                                                Belize (+501)
                                                            </option>
                                                            <option value="+229">
                                                                Benin (+229)
                                                            </option>
                                                            <option value="+975">
                                                                Bhutan (+975)
                                                            </option>
                                                            <option value="+591">
                                                                Bolivia (+591)
                                                            </option>
                                                            <option value="+387">
                                                                Bosnia and Herzegovina (+387)
                                                            </option>
                                                            <option value="+267">
                                                                Botswana (+267)
                                                            </option>
                                                            <option value="+55">
                                                                Brazil (+55)
                                                            </option>
                                                            <option value="+673">
                                                                Brunei (+673)
                                                            </option>
                                                            <option value="+359">
                                                                Bulgaria (+359)
                                                            </option>
                                                            <option value="+226">
                                                                Burkina Faso (+226)
                                                            </option>
                                                            <option value="+257">
                                                                Burundi (+257)
                                                            </option>
                                                            <option value="+855">
                                                                Cambodia (+855)
                                                            </option>
                                                            <option value="+237">
                                                                Cameroon (+237)
                                                            </option>
                                                            <option value="+1" selected>
                                                                Canada (+1)
                                                            </option>
                                                            <option value="+56">
                                                                Chile (+56)
                                                            </option>
                                                            <option value="+86">
                                                                China (+86)
                                                            </option>
                                                            <option value="+57">
                                                                Colombia (+57)
                                                            </option>
                                                            <option value="+242">
                                                                Congo (+242)
                                                            </option>
                                                            <option value="+506">
                                                                Costa Rica (+506)
                                                            </option>
                                                            <option value="+385">
                                                                Croatia (+385)
                                                            </option>
                                                            <option value="+53">
                                                                Cuba (+53)
                                                            </option>
                                                            <option value="+357">
                                                                Cyprus (+357)
                                                            </option>
                                                            <option value="+420">
                                                                Czech Republic (+420)
                                                            </option>
                                                            <option value="+45">
                                                                Denmark (+45)
                                                            </option>
                                                            <option value="+253">
                                                                Djibouti (+253)
                                                            </option>
                                                            <option value="+1-809">
                                                                Dominican Republic (+1-809)
                                                            </option>
                                                            <option value="+593">
                                                                Ecuador (+593)
                                                            </option>
                                                            <option value="+20">
                                                                Egypt (+20)
                                                            </option>
                                                            <option value="+503">
                                                                El Salvador (+503)
                                                            </option>
                                                            <option value="+372">
                                                                Estonia (+372)
                                                            </option>
                                                            <option value="+251">
                                                                Ethiopia (+251)
                                                            </option>
                                                            <option value="+679">
                                                                Fiji (+679)
                                                            </option>
                                                            <option value="+358">
                                                                Finland (+358)
                                                            </option>
                                                            <option value="+33">
                                                                France (+33)
                                                            </option>
                                                            <option value="+995">
                                                                Georgia (+995)
                                                            </option>
                                                            <option value="+49">
                                                                Germany (+49)
                                                            </option>
                                                            <option value="+233">
                                                                Ghana (+233)
                                                            </option>
                                                            <option value="+30">
                                                                Greece (+30)
                                                            </option>
                                                            <option value="+299">
                                                                Greenland (+299)
                                                            </option>
                                                            <option value="+502">
                                                                Guatemala (+502)
                                                            </option>
                                                            <option value="+509">
                                                                Haiti (+509)
                                                            </option>
                                                            <option value="+504">
                                                                Honduras (+504)
                                                            </option>
                                                            <option value="+852">
                                                                Hong Kong (+852)
                                                            </option>
                                                            <option value="+36">
                                                                Hungary (+36)
                                                            </option>
                                                            <option value="+354">
                                                                Iceland (+354)
                                                            </option>
                                                            <option value="+91">
                                                                India (+91)
                                                            </option>
                                                            <option value="+62">
                                                                Indonesia (+62)
                                                            </option>
                                                            <option value="+98">
                                                                Iran (+98)
                                                            </option>
                                                            <option value="+964">
                                                                Iraq (+964)
                                                            </option>
                                                            <option value="+353">
                                                                Ireland (+353)
                                                            </option>
                                                            <option value="+972">
                                                                Israel (+972)
                                                            </option>
                                                            <option value="+39">
                                                                Italy (+39)
                                                            </option>
                                                            <option value="+1-876">
                                                                Jamaica (+1-876)
                                                            </option>
                                                            <option value="+81">
                                                                Japan (+81)
                                                            </option>
                                                            <option value="+962">
                                                                Jordan (+962)
                                                            </option>
                                                            <option value="+7">
                                                                Kazakhstan (+7)
                                                            </option>
                                                            <option value="+254">
                                                                Kenya (+254)
                                                            </option>
                                                            <option value="+965">
                                                                Kuwait (+965)
                                                            </option>
                                                            <option value="+996">
                                                                Kyrgyzstan (+996)
                                                            </option>
                                                            <option value="+856">
                                                                Laos (+856)
                                                            </option>
                                                            <option value="+371">
                                                                Latvia (+371)
                                                            </option>
                                                            <option value="+961">
                                                                Lebanon (+961)
                                                            </option>
                                                            <option value="+266">
                                                                Lesotho (+266)
                                                            </option>
                                                            <option value="+231">
                                                                Liberia (+231)
                                                            </option>
                                                            <option value="+218">
                                                                Libya (+218)
                                                            </option>
                                                            <option value="+370">
                                                                Lithuania (+370)
                                                            </option>
                                                            <option value="+352">
                                                                Luxembourg (+352)
                                                            </option>
                                                            <option value="+853">
                                                                Macau (+853)
                                                            </option>
                                                            <option value="+261">
                                                                Madagascar (+261)
                                                            </option>
                                                            <option value="+265">
                                                                Malawi (+265)
                                                            </option>
                                                            <option value="+60">
                                                                Malaysia (+60)
                                                            </option>
                                                            <option value="+960">
                                                                Maldives (+960)
                                                            </option>
                                                            <option value="+223">
                                                                Mali (+223)
                                                            </option>
                                                            <option value="+356">
                                                                Malta (+356)
                                                            </option>
                                                            <option value="+222">
                                                                Mauritania (+222)
                                                            </option>
                                                            <option value="+230">
                                                                Mauritius (+230)
                                                            </option>
                                                            <option value="+52">
                                                                Mexico (+52)
                                                            </option>
                                                            <option value="+373">
                                                                Moldova (+373)
                                                            </option>
                                                            <option value="+377">
                                                                Monaco (+377)
                                                            </option>
                                                            <option value="+976">
                                                                Mongolia (+976)
                                                            </option>
                                                            <option value="+382">
                                                                Montenegro (+382)
                                                            </option>
                                                            <option value="+212">
                                                                Morocco (+212)
                                                            </option>
                                                            <option value="+258">
                                                                Mozambique (+258)
                                                            </option>
                                                            <option value="+95">
                                                                Myanmar (+95)
                                                            </option>
                                                            <option value="+264">
                                                                Namibia (+264)
                                                            </option>
                                                            <option value="+977">
                                                                Nepal (+977)
                                                            </option>
                                                            <option value="+31">
                                                                Netherlands (+31)
                                                            </option>
                                                            <option value="+64">
                                                                New Zealand (+64)
                                                            </option>
                                                            <option value="+505">
                                                                Nicaragua (+505)
                                                            </option>
                                                            <option value="+227">
                                                                Niger (+227)
                                                            </option>
                                                            <option value="+234">
                                                                Nigeria (+234)
                                                            </option>
                                                            <option value="+850">
                                                                North Korea (+850)
                                                            </option>
                                                            <option value="+47">
                                                                Norway (+47)
                                                            </option>
                                                            <option value="+968">
                                                                Oman (+968)
                                                            </option>
                                                            <option value="+92">
                                                                Pakistan (+92)
                                                            </option>
                                                            <option value="+970">
                                                                Palestine (+970)
                                                            </option>
                                                            <option value="+507">
                                                                Panama (+507)
                                                            </option>
                                                            <option value="+675">
                                                                Papua New Guinea (+675)
                                                            </option>
                                                            <option value="+595">
                                                                Paraguay (+595)
                                                            </option>
                                                            <option value="+51">
                                                                Peru (+51)
                                                            </option>
                                                            <option value="+63">
                                                                Philippines (+63)
                                                            </option>
                                                            <option value="+48">
                                                                Poland (+48)
                                                            </option>
                                                            <option value="+351">
                                                                Portugal (+351)
                                                            </option>
                                                            <option value="+974">
                                                                Qatar (+974)
                                                            </option>
                                                            <option value="+40">
                                                                Romania (+40)
                                                            </option>
                                                            <option value="+7">
                                                                Russia (+7)
                                                            </option>
                                                            <option value="+250">
                                                                Rwanda (+250)
                                                            </option>
                                                            <option value="+966">
                                                                Saudi Arabia (+966)
                                                            </option>
                                                            <option value="+221">
                                                                Senegal (+221)
                                                            </option>
                                                            <option value="+381">
                                                                Serbia (+381)
                                                            </option>
                                                            <option value="+65">
                                                                Singapore (+65)
                                                            </option>
                                                            <option value="+421">
                                                                Slovakia (+421)
                                                            </option>
                                                            <option value="+386">
                                                                Slovenia (+386)
                                                            </option>
                                                            <option value="+252">
                                                                Somalia (+252)
                                                            </option>
                                                            <option value="+27">
                                                                South Africa (+27)
                                                            </option>
                                                            <option value="+82">
                                                                South Korea (+82)
                                                            </option>
                                                            <option value="+34">
                                                                Spain (+34)
                                                            </option>
                                                            <option value="+94">
                                                                Sri Lanka (+94)
                                                            </option>
                                                            <option value="+249">
                                                                Sudan (+249)
                                                            </option>
                                                            <option value="+46">
                                                                Sweden (+46)
                                                            </option>
                                                            <option value="+41">
                                                                Switzerland (+41)
                                                            </option>
                                                            <option value="+963">
                                                                Syria (+963)
                                                            </option>
                                                            <option value="+886">
                                                                Taiwan (+886)
                                                            </option>
                                                            <option value="+992">
                                                                Tajikistan (+992)
                                                            </option>
                                                            <option value="+255">
                                                                Tanzania (+255)
                                                            </option>
                                                            <option value="+66">
                                                                Thailand (+66)
                                                            </option>
                                                            <option value="+228">
                                                                Togo (+228)
                                                            </option>
                                                            <option value="+1-868">
                                                                Trinidad and Tobago (+1-868)
                                                            </option>
                                                            <option value="+216">
                                                                Tunisia (+216)
                                                            </option>
                                                            <option value="+90">
                                                                Turkey (+90)
                                                            </option>
                                                            <option value="+993">
                                                                Turkmenistan (+993)
                                                            </option>
                                                            <option value="+256">
                                                                Uganda (+256)
                                                            </option>
                                                            <option value="+380">
                                                                Ukraine (+380)
                                                            </option>
                                                            <option value="+971">
                                                                United Arab Emirates (+971)
                                                            </option>
                                                            <option value="+44">
                                                                United Kingdom (+44)
                                                            </option>
                                                            <option value="+1">
                                                                United States (+1)
                                                            </option>
                                                            <option value="+598">
                                                                Uruguay (+598)
                                                            </option>
                                                            <option value="+998">
                                                                Uzbekistan (+998)
                                                            </option>
                                                            <option value="+58">
                                                                Venezuela (+58)
                                                            </option>
                                                            <option value="+84">
                                                                Vietnam (+84)
                                                            </option>
                                                            <option value="+967">
                                                                Yemen (+967)
                                                            </option>
                                                            <option value="+260">
                                                                Zambia (+260)
                                                            </option>
                                                            <option value="+263">
                                                                Zimbabwe (+263)
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label for="traveller-mobile-number" class="text-14 text-light-1">Mobile Number</label>
                                                        <input type="tel" name="traveller-mobile-number" id="traveller-mobile-number" class="form-control" required style="padding:5px; border:1px solid #ddd; border-radius:5px;">
                                                        <span class="error text-danger mobile-error font-12"></span>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label for="traveller-email" class="text-14 text-light-1">Email</label>
                                                        <input type="email" name="traveller-email" id="traveller-email" class="form-control" required style="padding:5px; border:1px solid #ddd; border-radius:5px;">
                                                        <span class="error text-danger email-error font-12"></span>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="border-light rounded-4 mt-30">
                                        <div class="py-20 px-30">
                                            <div class="row justify-between items-center">
                                                <div class="col-auto">
                                                    <div class="fw-500 text-dark-1">Billing Details</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="py-30 px-30 border-top-light">
                                            <form id="billingDetails">
                                                <div class="row y-gap-10 justify-between">
                                                    <div class="col-lg-12">
                                                        <div class=" mt-15">
                                                            <div class="row y-gap-10">
                                                                <div class="col-lg-12">
                                                                    <label for="billing-address" class="text-14 text-light-1">Billing Address</label>
                                                                    <input type="text" name="billing-address" id="billing-address" class="form-control" style="padding:5px; border:1px solid #ddd; border-radius:5px;">
                                                                    <span class="error text-danger address-error font-12"></span>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label for="billing-city" class="text-14 text-light-1">City</label>
                                                                    <input type="text" name="billing-city" id="billing-city" class="form-control" style="padding:5px; border:1px solid #ddd; border-radius:5px;">
                                                                    <span class="error text-danger city-error font-12"></span>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label for="traveller-country" class="text-14 text-light-1">Country</label>
                                                                    <input type="text" name="traveller-country" id="traveller-country" class="form-control" style="padding:5px; border:1px solid #ddd; border-radius:5px;">
                                                                    <span class="error text-danger country-error font-12"></span>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label for="traveller-zipcode" class="text-14 text-light-1">Zipcode</label>
                                                                    <input type="number" name="traveller-zipcode" id="traveller-zipcode" class="form-control" style="padding:5px; border:1px solid #ddd; border-radius:5px;">
                                                                    <span class="error text-danger zipcode-error font-12"></span>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label for="traveller-phone" class="text-14 text-light-1">Phone</label>
                                                                    <input type="tel" name="traveller-phone" id="traveller-phone" class="form-control" style="padding:5px; border:1px solid #ddd; border-radius:5px;">
                                                                    <span class="error text-danger phone-error font-12"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-xl-4 col-lg-4 col-12">
                        <div class="js-accordion pt-40 sticky-right-div">
                            <div class="accordion__item py-30 px-30 bg-white rounded-4 base-tr mt-30">
                                <div class="accordion__content" style="max-height: 100%;">
                                    <div class="border-light rounded-4 mt-30">
                                        <div class="py-20 px-30">
                                            <div class="row justify-between items-center">
                                                <div class="col-auto">
                                                    <div class="fw-500 text-dark-1">Fare Summary</div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="text-14 text-light-1">
                                                        1 Passenger
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="py-30 px-30 border-top-light">
                                            <div class="row y-gap-10 justify-between">
                                                <div class="col-auto">
                                                    <div class="text-16 text-dark">Base Fare</div>
                                                    <div class="text-16 text-dark">Taxes & Fees</div>
                                                    <div class="text-18 text-dark">Total Amount</div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="text-16 text-dark text-right">
                                                        <span class="text-16 text-light">USD</span>
                                                        213.64
                                                    </div>
                                                    <div class="text-16 text-dark text-right">
                                                        <span class="text-16 text-light">USD</span>
                                                        316.46
                                                    </div>
                                                    <div class="text-18 text-dark text-right">
                                                        <span class="text-16 text-light">USD</span>
                                                        530.1
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-center mt-30">
                                        <button id="continue" class="button px-30 fw-400 text-14 -blue-1 bg-blue-1 h-50 text-white">Continue</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="layout-pt-md layout-pb-md bg-dark-2">
            <div class="container">
                <div class="row y-gap-30 justify-between items-center">
                    <div class="col-auto">
                        <div class="row y-gap-20  flex-wrap items-center">
                            <div class="col-auto">
                                <div class="icon-newsletter text-60 sm:text-40 text-white"></div>
                            </div>
                            <div class="col-auto">
                                <h4 class="text-26 text-white fw-600">Your Travel Journey Starts Here</h4>
                                <div class="text-white">Sign up and we'll send the best deals to you</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <form method="post" action="form.php" class="single-field -w-410 d-flex x-gap-10 y-gap-20">
                            <div>
                                <input class="bg-white h-60" type="text" name="email" placeholder="Your Email">
                            </div>
                            <div>
                                <button name="newsletter" type="submit" class="button -md h-60 bg-blue-1 text-white">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <footer class="footer -type-1">
            <div class="container">
                <div class="pt-60 pb-60">
                    <div class="row y-gap-40 justify-between ">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <h5 class="text-16 fw-500 mb-30">Contact Us</h5>

                            <div class="mt-30">
                                <div class="text-14 mt-30">Toll Free Customer Care</div>
                                <a href="tel:+1-778-312-2390" class="text-18 fw-500 text-blue-1 mt-5">+1-778-312-2390</a>
                            </div>

                            <div class="mt-35">
                                <div class="text-14 mt-30">Need live support?</div>
                                <a href="mailto:sales@skyteamtravel.ca" class="text-18 fw-500 text-blue-1 mt-5">sales@skyteamtravel.ca</a>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <h5 class="text-16 fw-500 mb-30">Company</h5>
                            <div class="d-flex y-gap-10 flex-column">
                                <a href="about.php">About Us</a>
                                <a href="flights.php">Flights</a>
                                <a href="packages.php">Packages</a>
                                <!-- <a href="blogs.php">Blogs</a> -->
                                <a href="contact.php">Contact</a>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <h5 class="text-16 fw-500 mb-30">Policies</h5>
                            <div class="d-flex y-gap-10 flex-column">
                                <a href="#">Privacy Policy</a>
                                <a href="#">Terms & Conditions</a>
                                <a href="#">Cancellation Policy</a>
                                <a href="#">Refund Policy</a>
                            </div>
                        </div>

                        <!-- <div class="col-xl-4 col-lg-4 col-sm-6">
                    <h5 class="text-16 fw-500 mb-30">Other Services</h5>
                    <div class="d-flex y-gap-10 flex-column">
                        <a href="#">Car hire</a>
                        <a href="#">Activity Finder</a>
                        <a href="#">Tour List</a>
                        <a href="#">Flight finder</a>
                        <a href="#">Cruise Ticket</a>
                        <a href="#">Holiday Rental</a>
                        <a href="#">Travel Agents</a>
                    </div>
                </div> -->

                        <!-- <div class="col-xl-2 col-lg-4 col-sm-6">
                    <h5 class="text-16 fw-500 mb-30">Mobile</h5>

                    <div class="d-flex items-center px-20 py-10 rounded-4 border-light">
                        <div class="icon-apple text-24"></div>
                        <div class="ml-20">
                            <div class="text-14 text-light-1">Download on the</div>
                            <div class="text-15 lh-1 fw-500">Apple Store</div>
                        </div>
                    </div>

                    <div class="d-flex items-center px-20 py-10 rounded-4 border-light mt-20">
                        <div class="icon-play-market text-24"></div>
                        <div class="ml-20">
                            <div class="text-14 text-light-1">Get in on</div>
                            <div class="text-15 lh-1 fw-500">Google Play</div>
                        </div>
                    </div>
                </div> -->
                    </div>
                </div>

                <div class="py-20 border-top-light">
                    <div class="row justify-between items-center y-gap-10">
                        <div class="col-auto">
                            <div class="row x-gap-30 y-gap-10">
                                <div class="col-auto">
                                    <div class="d-flex items-center">
                                        © 2025 Sky Team All rights reserved.
                                    </div>
                                </div>
                                <!-- 
                        <div class="col-auto">
                            <div class="d-flex x-gap-15">
                                <a href="#">Privacy</a>
                                <a href="#">Terms</a>
                                <a href="#">Site Map</a>
                            </div>
                        </div> -->
                            </div>
                        </div>

                        <div class="col-auto">
                            <div class="row y-gap-10 items-center">
                                <!-- <div class="col-auto">
                            <div class="d-flex items-center">
                                <button class="d-flex items-center text-14 fw-500 text-dark-1 mr-10">
                                    <i class="icon-globe text-16 mr-10"></i>
                                    <span class="underline">English (US)</span>
                                </button>

                                <button class="d-flex items-center text-14 fw-500 text-dark-1">
                                    <i class="icon-usd text-16 mr-10"></i>
                                    <span class="underline">USD</span>
                                </button>
                            </div>
                        </div> -->

                                <div class="col-auto">
                                    <div class="d-flex x-gap-20 items-center">
                                        <a href="#"><i class="icon-facebook text-14"></i></a>
                                        <a href="#"><i class="icon-twitter text-14"></i></a>
                                        <a href="#"><i class="icon-instagram text-14"></i></a>
                                        <a href="#"><i class="icon-linkedin text-14"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Login Popup Modal -->
        <div id="loginModal" style="
  display:none;
  position:fixed;
  top:0; left:0;
  width:100%; height:100%;
  background:rgba(0,0,0,0.6);
  z-index:9999;
  align-items:center;
  justify-content:center;
">
            <div style="
    position:relative;
    width:90%;
    max-width:400px;
    background:#fff;
    border-radius:10px;
    padding:30px;
    box-shadow:0 0 15px rgba(0,0,0,0.3);
  ">
                <span id="closeLoginModal" style="
      position:absolute;
      top:10px; right:15px;
      font-size:22px;
      cursor:pointer;
      color:#333;
    ">&times;</span>

                <h2 class="text-22 fw-600 mb-3">Welcome Back</h2>
                <p class="mb-20">Don't have an account?
                    <a href="signup.php" class="text-blue-1">Sign up</a>
                </p>

                <form id="loginForm" method="POST">
                    <div class="form-group" style="margin-bottom:15px;">
                        <label>Email</label>
                        <input type="email" name="email" required class="form-control" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:5px;">
                    </div>

                    <div class="form-group" style="margin-bottom:15px;">
                        <label>Password</label>
                        <input type="password" name="password" required class="form-control" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:5px;">
                    </div>

                    <div class="form-group" style="margin-bottom:15px;">
                        <a href="#" class="text-14 fw-500 text-blue-1 underline">Forgot your password?</a>
                    </div>

                    <button type="submit" class="button py-15 -dark-1 bg-blue-1 text-white w-100" style="width:100%; border:none; border-radius:5px; cursor:pointer;">
                        Sign In
                    </button>

                    <div id="loginMessage" style="margin-top:15px; font-size:14px; color:red;"></div>
                </form>
            </div>
        </div>
        <script>
            // Open popup
            var openLoginModal = document.getElementById("openLoginModal");
            if (openLoginModal) {
                openLoginModal.addEventListener("click", function(e) {
                    e.preventDefault();
                    document.getElementById("loginModal").style.display = "flex";
                });
            }
            // Close popup
            document.getElementById("closeLoginModal").addEventListener("click", function() {
                document.getElementById("loginModal").style.display = "none";
            });

            // Close on background click
            document.getElementById("loginModal").addEventListener("click", function(e) {
                if (e.target === this) {
                    this.style.display = "none";
                }
            });

            // Handle form submission (optional AJAX)
            document.getElementById("loginForm").addEventListener("submit", function(e) {
                e.preventDefault();
                const form = this;
                const message = document.getElementById("loginMessage");

                fetch("login_process.php", {
                        method: "POST",
                        body: new FormData(form)
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.status === "success") {
                            message.style.color = "green";
                            message.textContent = "Login successful!";
                            setTimeout(() => location.reload(), 1000);
                        } else {
                            message.style.color = "red";
                            message.textContent = data.message;
                        }
                    })
                    .catch(() => {
                        message.textContent = "Something went wrong. Please try again.";
                    });
            });
        </script>
    </main>
    <div class="langMenu is-hidden js-langMenu" data-x="lang" data-x-toggle="is-hidden">
        <div class="langMenu__bg" data-x-click="lang"></div>

        <div class="langMenu__content bg-white rounded-4">
            <div class="d-flex items-center justify-between px-30 py-20 sm:px-15 border-bottom-light">
                <div class="text-20 fw-500 lh-15">Select your language</div>
                <button class="pointer" data-x-click="lang">
                    <i class="icon-close"></i>
                </button>
            </div>

            <div class="modalGrid px-30 py-30 sm:px-15 sm:py-15">

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">English</div>
                        <div class="text-14 lh-15 mt-5 js-title">United States</div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Türkçe</div>
                        <div class="text-14 lh-15 mt-5 js-title">Turkey</div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Español</div>
                        <div class="text-14 lh-15 mt-5 js-title">España</div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Français</div>
                        <div class="text-14 lh-15 mt-5 js-title">France</div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Italiano</div>
                        <div class="text-14 lh-15 mt-5 js-title">Italia</div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">English</div>
                        <div class="text-14 lh-15 mt-5 js-title">United States</div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Türkçe</div>
                        <div class="text-14 lh-15 mt-5 js-title">Turkey</div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Español</div>
                        <div class="text-14 lh-15 mt-5 js-title">España</div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Français</div>
                        <div class="text-14 lh-15 mt-5 js-title">France</div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Italiano</div>
                        <div class="text-14 lh-15 mt-5 js-title">Italia</div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">English</div>
                        <div class="text-14 lh-15 mt-5 js-title">United States</div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Türkçe</div>
                        <div class="text-14 lh-15 mt-5 js-title">Turkey</div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Español</div>
                        <div class="text-14 lh-15 mt-5 js-title">España</div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Français</div>
                        <div class="text-14 lh-15 mt-5 js-title">France</div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Italiano</div>
                        <div class="text-14 lh-15 mt-5 js-title">Italia</div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">English</div>
                        <div class="text-14 lh-15 mt-5 js-title">United States</div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Türkçe</div>
                        <div class="text-14 lh-15 mt-5 js-title">Turkey</div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Español</div>
                        <div class="text-14 lh-15 mt-5 js-title">España</div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Français</div>
                        <div class="text-14 lh-15 mt-5 js-title">France</div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Italiano</div>
                        <div class="text-14 lh-15 mt-5 js-title">Italia</div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="currencyMenu is-hidden js-currencyMenu" data-x="currency" data-x-toggle="is-hidden">
        <div class="currencyMenu__bg" data-x-click="currency"></div>

        <div class="currencyMenu__content bg-white rounded-4">
            <div class="d-flex items-center justify-between px-30 py-20 sm:px-15 border-bottom-light">
                <div class="text-20 fw-500 lh-15">Select your currency</div>
                <button class="pointer" data-x-click="currency">
                    <i class="icon-close"></i>
                </button>
            </div>

            <div class="modalGrid px-30 py-30 sm:px-15 sm:py-15">

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">United States dollar</div>
                        <div class="text-14 lh-15 mt-5">
                            <span class="js-title">USD</span>
                            - $
                        </div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Australian dollar</div>
                        <div class="text-14 lh-15 mt-5">
                            <span class="js-title">AUD</span>
                            - $
                        </div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Brazilian real</div>
                        <div class="text-14 lh-15 mt-5">
                            <span class="js-title">BRL</span>
                            - R$
                        </div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Bulgarian lev</div>
                        <div class="text-14 lh-15 mt-5">
                            <span class="js-title">BGN</span>
                            - лв.
                        </div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Canadian dollar</div>
                        <div class="text-14 lh-15 mt-5">
                            <span class="js-title">CAD</span>
                            - $
                        </div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">United States dollar</div>
                        <div class="text-14 lh-15 mt-5">
                            <span class="js-title">USD</span>
                            - $
                        </div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Australian dollar</div>
                        <div class="text-14 lh-15 mt-5">
                            <span class="js-title">AUD</span>
                            - $
                        </div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Brazilian real</div>
                        <div class="text-14 lh-15 mt-5">
                            <span class="js-title">BRL</span>
                            - R$
                        </div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Bulgarian lev</div>
                        <div class="text-14 lh-15 mt-5">
                            <span class="js-title">BGN</span>
                            - лв.
                        </div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Canadian dollar</div>
                        <div class="text-14 lh-15 mt-5">
                            <span class="js-title">CAD</span>
                            - $
                        </div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">United States dollar</div>
                        <div class="text-14 lh-15 mt-5">
                            <span class="js-title">USD</span>
                            - $
                        </div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Australian dollar</div>
                        <div class="text-14 lh-15 mt-5">
                            <span class="js-title">AUD</span>
                            - $
                        </div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Brazilian real</div>
                        <div class="text-14 lh-15 mt-5">
                            <span class="js-title">BRL</span>
                            - R$
                        </div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Bulgarian lev</div>
                        <div class="text-14 lh-15 mt-5">
                            <span class="js-title">BGN</span>
                            - лв.
                        </div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Canadian dollar</div>
                        <div class="text-14 lh-15 mt-5">
                            <span class="js-title">CAD</span>
                            - $
                        </div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">United States dollar</div>
                        <div class="text-14 lh-15 mt-5">
                            <span class="js-title">USD</span>
                            - $
                        </div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Australian dollar</div>
                        <div class="text-14 lh-15 mt-5">
                            <span class="js-title">AUD</span>
                            - $
                        </div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Brazilian real</div>
                        <div class="text-14 lh-15 mt-5">
                            <span class="js-title">BRL</span>
                            - R$
                        </div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Bulgarian lev</div>
                        <div class="text-14 lh-15 mt-5">
                            <span class="js-title">BGN</span>
                            - лв.
                        </div>
                    </div>
                </div>

                <div class="modalGrid__item js-item">
                    <div class="py-10 px-15 sm:px-5 sm:py-5">
                        <div class="text-15 lh-15 fw-500 text-dark-1">Canadian dollar</div>
                        <div class="text-14 lh-15 mt-5">
                            <span class="js-title">CAD</span>
                            - $
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="mapFilter" data-x="mapFilter" data-x-toggle="-is-active">
        <div class="mapFilter__overlay"></div>

        <div class="mapFilter__close">
            <button class="button -blue-1 size-40 bg-white shadow-2" data-x-click="mapFilter">
                <i class="icon-close text-15"></i>
            </button>
        </div>

        <div class="mapFilter__grid" data-x="mapFilter__grid" data-x-toggle="-filters-hidden">
            <div class="mapFilter-filter scroll-bar-1">
                <div class="px-20 py-20 md:px-15 md:py-15">
                    <div class="d-flex items-center justify-between">
                        <div class="text-18 fw-500">Filters</div>

                        <button class="size-40 flex-center rounded-full bg-blue-1" data-x-click="mapFilter__grid">
                            <i class="icon-chevron-left text-12 text-white"></i>
                        </button>
                    </div>

                    <div class="mapFilter-filter__item">
                        <h5 class="text-18 fw-500 mb-10">Popular Filters</h5>
                        <div class="sidebar-checkbox">

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">
                                    <div class="d-flex items-center">
                                        <div class="form-checkbox">
                                            <input type="checkbox">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>
                                        <div class="text-15 ml-10">Breakfast Included</div>
                                    </div>
                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">92</div>
                                </div>
                            </div>

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">
                                    <div class="d-flex items-center">
                                        <div class="form-checkbox">
                                            <input type="checkbox">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>
                                        <div class="text-15 ml-10">Romantic</div>
                                    </div>
                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">45</div>
                                </div>
                            </div>

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">
                                    <div class="d-flex items-center">
                                        <div class="form-checkbox">
                                            <input type="checkbox">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>
                                        <div class="text-15 ml-10">Airport Transfer</div>
                                    </div>
                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">21</div>
                                </div>
                            </div>

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">
                                    <div class="d-flex items-center">
                                        <div class="form-checkbox">
                                            <input type="checkbox">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>
                                        <div class="text-15 ml-10">WiFi Included </div>
                                    </div>
                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">78</div>
                                </div>
                            </div>

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">
                                    <div class="d-flex items-center">
                                        <div class="form-checkbox">
                                            <input type="checkbox">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>
                                        <div class="text-15 ml-10">5 Star</div>
                                    </div>
                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">679</div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="mapFilter-filter__item">
                        <h5 class="text-18 fw-500 mb-10">Nightly Price</h5>
                        <div class="row x-gap-10 y-gap-30">
                            <div class="col-12">
                                <div class="js-price-rangeSlider">
                                    <div class="text-14 fw-500"></div>

                                    <div class="d-flex justify-between mb-20">
                                        <div class="text-15 text-dark-1">
                                            <span class="js-lower"></span>
                                            -
                                            <span class="js-upper"></span>
                                        </div>
                                    </div>

                                    <div class="px-5">
                                        <div class="js-slider"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mapFilter-filter__item">
                        <h5 class="text-18 fw-500 mb-10">Amenities</h5>
                        <div class="sidebar-checkbox">

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">

                                    <div class="d-flex items-center">
                                        <div class="form-checkbox ">
                                            <input type="checkbox" name="name">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>

                                        <div class="text-15 ml-10">Breakfast Included</div>

                                    </div>

                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">92</div>
                                </div>
                            </div>

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">

                                    <div class="d-flex items-center">
                                        <div class="form-checkbox ">
                                            <input type="checkbox" name="name">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>

                                        <div class="text-15 ml-10">WiFi Included </div>

                                    </div>

                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">45</div>
                                </div>
                            </div>

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">

                                    <div class="d-flex items-center">
                                        <div class="form-checkbox ">
                                            <input type="checkbox" name="name">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>

                                        <div class="text-15 ml-10">Pool</div>

                                    </div>

                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">21</div>
                                </div>
                            </div>

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">

                                    <div class="d-flex items-center">
                                        <div class="form-checkbox ">
                                            <input type="checkbox" name="name">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>

                                        <div class="text-15 ml-10">Restaurant </div>

                                    </div>

                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">78</div>
                                </div>
                            </div>

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">

                                    <div class="d-flex items-center">
                                        <div class="form-checkbox ">
                                            <input type="checkbox" name="name">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>

                                        <div class="text-15 ml-10">Air conditioning </div>

                                    </div>

                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">679</div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="mapFilter-filter__item">
                        <h5 class="text-18 fw-500 mb-10">Star Rating</h5>
                        <div class="row x-gap-10 y-gap-10 pt-10">

                            <div class="col-auto">
                                <a href="#" class="button -blue-1 bg-blue-1-05 text-blue-1 py-5 px-20 rounded-100">1</a>
                            </div>

                            <div class="col-auto">
                                <a href="#" class="button -blue-1 bg-blue-1-05 text-blue-1 py-5 px-20 rounded-100">2</a>
                            </div>

                            <div class="col-auto">
                                <a href="#" class="button -blue-1 bg-blue-1-05 text-blue-1 py-5 px-20 rounded-100">3</a>
                            </div>

                            <div class="col-auto">
                                <a href="#" class="button -blue-1 bg-blue-1-05 text-blue-1 py-5 px-20 rounded-100">4</a>
                            </div>

                            <div class="col-auto">
                                <a href="#" class="button -blue-1 bg-blue-1-05 text-blue-1 py-5 px-20 rounded-100">5</a>
                            </div>

                        </div>
                    </div>

                    <div class="mapFilter-filter__item">
                        <h5 class="text-18 fw-500 mb-10">Guest Rating</h5>
                        <div class="sidebar-checkbox">

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">

                                    <div class="form-radio d-flex items-center ">
                                        <div class="radio">
                                            <input type="radio" name="name">
                                            <div class="radio__mark">
                                                <div class="radio__icon"></div>
                                            </div>
                                        </div>
                                        <div class="ml-10">Any</div>
                                    </div>

                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">92</div>
                                </div>
                            </div>

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">

                                    <div class="form-radio d-flex items-center ">
                                        <div class="radio">
                                            <input type="radio" name="name">
                                            <div class="radio__mark">
                                                <div class="radio__icon"></div>
                                            </div>
                                        </div>
                                        <div class="ml-10">Wonderful 4.5+</div>
                                    </div>

                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">45</div>
                                </div>
                            </div>

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">

                                    <div class="form-radio d-flex items-center ">
                                        <div class="radio">
                                            <input type="radio" name="name">
                                            <div class="radio__mark">
                                                <div class="radio__icon"></div>
                                            </div>
                                        </div>
                                        <div class="ml-10">Very good 4+</div>
                                    </div>

                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">21</div>
                                </div>
                            </div>

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">

                                    <div class="form-radio d-flex items-center ">
                                        <div class="radio">
                                            <input type="radio" name="name">
                                            <div class="radio__mark">
                                                <div class="radio__icon"></div>
                                            </div>
                                        </div>
                                        <div class="ml-10">Good 3.5+ </div>
                                    </div>

                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">78</div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="mapFilter-filter__item">
                        <h5 class="text-18 fw-500 mb-10">Style</h5>
                        <div class="sidebar-checkbox">

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">

                                    <div class="d-flex items-center">
                                        <div class="form-checkbox ">
                                            <input type="checkbox" name="name">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>

                                        <div class="text-15 ml-10">Budget</div>

                                    </div>

                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">92</div>
                                </div>
                            </div>

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">

                                    <div class="d-flex items-center">
                                        <div class="form-checkbox ">
                                            <input type="checkbox" name="name">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>

                                        <div class="text-15 ml-10">Mid-range </div>

                                    </div>

                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">45</div>
                                </div>
                            </div>

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">

                                    <div class="d-flex items-center">
                                        <div class="form-checkbox ">
                                            <input type="checkbox" name="name">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>

                                        <div class="text-15 ml-10">Luxury</div>

                                    </div>

                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">21</div>
                                </div>
                            </div>

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">

                                    <div class="d-flex items-center">
                                        <div class="form-checkbox ">
                                            <input type="checkbox" name="name">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>

                                        <div class="text-15 ml-10">Family-friendly </div>

                                    </div>

                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">78</div>
                                </div>
                            </div>

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">

                                    <div class="d-flex items-center">
                                        <div class="form-checkbox ">
                                            <input type="checkbox" name="name">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>

                                        <div class="text-15 ml-10">Business </div>

                                    </div>

                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">679</div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="mapFilter-filter__item">
                        <h5 class="text-18 fw-500 mb-10">Neighborhood</h5>
                        <div class="sidebar-checkbox">

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">

                                    <div class="d-flex items-center">
                                        <div class="form-checkbox ">
                                            <input type="checkbox" name="name">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>

                                        <div class="text-15 ml-10">Central London</div>

                                    </div>

                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">92</div>
                                </div>
                            </div>

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">

                                    <div class="d-flex items-center">
                                        <div class="form-checkbox ">
                                            <input type="checkbox" name="name">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>

                                        <div class="text-15 ml-10">Guests&#39; favourite area </div>

                                    </div>

                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">45</div>
                                </div>
                            </div>

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">

                                    <div class="d-flex items-center">
                                        <div class="form-checkbox ">
                                            <input type="checkbox" name="name">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>

                                        <div class="text-15 ml-10">Westminster Borough</div>

                                    </div>

                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">21</div>
                                </div>
                            </div>

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">

                                    <div class="d-flex items-center">
                                        <div class="form-checkbox ">
                                            <input type="checkbox" name="name">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>

                                        <div class="text-15 ml-10">Kensington and Chelsea </div>

                                    </div>

                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">78</div>
                                </div>
                            </div>

                            <div class="row y-gap-10 items-center justify-between">
                                <div class="col-auto">

                                    <div class="d-flex items-center">
                                        <div class="form-checkbox ">
                                            <input type="checkbox" name="name">
                                            <div class="form-checkbox__mark">
                                                <div class="form-checkbox__icon icon-check"></div>
                                            </div>
                                        </div>

                                        <div class="text-15 ml-10">Oxford Street </div>

                                    </div>

                                </div>

                                <div class="col-auto">
                                    <div class="text-15 text-light-1">679</div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="mapFilter-results scroll-bar-1">
                <div class="px-20 py-20 md:px-15 md:py-15">
                    <div class="row y-gap-10 justify-between">
                        <div class="col-auto">
                            <div class="text-14 text-light-1">
                                <span class="text-dark-1 text-15 fw-500">3,269 properties</span>
                                in Europe
                            </div>
                        </div>

                        <div class="col-auto">
                            <button class="button -blue-1 h-40 px-20 md:px-5 text-blue-1 bg-blue-1-05 rounded-100">
                                <i class="icon-up-down mr-10"></i>
                                Top picks for your search
                            </button>
                        </div>
                    </div>


                    <div class="mapFilter-results__item">
                        <div class="row x-gap-20 y-gap-20">
                            <div class="col-md-auto">
                                <div class="ratio ratio-1:1 size-120">
                                    <img src="img/hotels/1.png" alt="image" class="img-ratio rounded-4">
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="row x-gap-20 y-gap-10 justify-between">
                                    <div class="col-lg">
                                        <h4 class="text-16 lh-17 fw-500">
                                            Great Northern Hotel, a Tribute Portfolio Hotel, London
                                            <span class="text-10 text-yellow-2">
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                            </span>
                                        </h4>
                                    </div>

                                    <div class="col-auto">
                                        <button class="button -blue-1 size-30 flex-center bg-light-2 rounded-full">
                                            <i class="icon-heart text-12"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="row y-gap-10 justify-between items-end pt-24 lg:pt-15">
                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="size-38 rounded-4 flex-center bg-blue-1">
                                                <span class="text-14 fw-600 text-white">4.8</span>
                                            </div>

                                            <div class="ml-10">
                                                <div class="text-13 lh-14 fw-500">Exceptional</div>
                                                <div class="text-12 lh-14 text-light-1">3,014 reviews</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="text-14 text-light-1 mr-10">8 nights</div>
                                            <div class="fw-500">US$72</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mapFilter-results__item">
                        <div class="row x-gap-20 y-gap-20">
                            <div class="col-md-auto">
                                <div class="ratio ratio-1:1 size-120">
                                    <img src="img/hotels/1.png" alt="image" class="img-ratio rounded-4">
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="row x-gap-20 y-gap-10 justify-between">
                                    <div class="col-lg">
                                        <h4 class="text-16 lh-17 fw-500">
                                            Great Northern Hotel, a Tribute Portfolio Hotel, London
                                            <span class="text-10 text-yellow-2">
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                            </span>
                                        </h4>
                                    </div>

                                    <div class="col-auto">
                                        <button class="button -blue-1 size-30 flex-center bg-light-2 rounded-full">
                                            <i class="icon-heart text-12"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="row y-gap-10 justify-between items-end pt-24 lg:pt-15">
                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="size-38 rounded-4 flex-center bg-blue-1">
                                                <span class="text-14 fw-600 text-white">4.8</span>
                                            </div>

                                            <div class="ml-10">
                                                <div class="text-13 lh-14 fw-500">Exceptional</div>
                                                <div class="text-12 lh-14 text-light-1">3,014 reviews</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="text-14 text-light-1 mr-10">8 nights</div>
                                            <div class="fw-500">US$72</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mapFilter-results__item">
                        <div class="row x-gap-20 y-gap-20">
                            <div class="col-md-auto">
                                <div class="ratio ratio-1:1 size-120">
                                    <img src="img/hotels/1.png" alt="image" class="img-ratio rounded-4">
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="row x-gap-20 y-gap-10 justify-between">
                                    <div class="col-lg">
                                        <h4 class="text-16 lh-17 fw-500">
                                            Great Northern Hotel, a Tribute Portfolio Hotel, London
                                            <span class="text-10 text-yellow-2">
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                            </span>
                                        </h4>
                                    </div>

                                    <div class="col-auto">
                                        <button class="button -blue-1 size-30 flex-center bg-light-2 rounded-full">
                                            <i class="icon-heart text-12"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="row y-gap-10 justify-between items-end pt-24 lg:pt-15">
                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="size-38 rounded-4 flex-center bg-blue-1">
                                                <span class="text-14 fw-600 text-white">4.8</span>
                                            </div>

                                            <div class="ml-10">
                                                <div class="text-13 lh-14 fw-500">Exceptional</div>
                                                <div class="text-12 lh-14 text-light-1">3,014 reviews</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="text-14 text-light-1 mr-10">8 nights</div>
                                            <div class="fw-500">US$72</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mapFilter-results__item">
                        <div class="row x-gap-20 y-gap-20">
                            <div class="col-md-auto">
                                <div class="ratio ratio-1:1 size-120">
                                    <img src="img/hotels/1.png" alt="image" class="img-ratio rounded-4">
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="row x-gap-20 y-gap-10 justify-between">
                                    <div class="col-lg">
                                        <h4 class="text-16 lh-17 fw-500">
                                            Great Northern Hotel, a Tribute Portfolio Hotel, London
                                            <span class="text-10 text-yellow-2">
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                            </span>
                                        </h4>
                                    </div>

                                    <div class="col-auto">
                                        <button class="button -blue-1 size-30 flex-center bg-light-2 rounded-full">
                                            <i class="icon-heart text-12"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="row y-gap-10 justify-between items-end pt-24 lg:pt-15">
                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="size-38 rounded-4 flex-center bg-blue-1">
                                                <span class="text-14 fw-600 text-white">4.8</span>
                                            </div>

                                            <div class="ml-10">
                                                <div class="text-13 lh-14 fw-500">Exceptional</div>
                                                <div class="text-12 lh-14 text-light-1">3,014 reviews</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="text-14 text-light-1 mr-10">8 nights</div>
                                            <div class="fw-500">US$72</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mapFilter-results__item">
                        <div class="row x-gap-20 y-gap-20">
                            <div class="col-md-auto">
                                <div class="ratio ratio-1:1 size-120">
                                    <img src="img/hotels/1.png" alt="image" class="img-ratio rounded-4">
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="row x-gap-20 y-gap-10 justify-between">
                                    <div class="col-lg">
                                        <h4 class="text-16 lh-17 fw-500">
                                            Great Northern Hotel, a Tribute Portfolio Hotel, London
                                            <span class="text-10 text-yellow-2">
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                            </span>
                                        </h4>
                                    </div>

                                    <div class="col-auto">
                                        <button class="button -blue-1 size-30 flex-center bg-light-2 rounded-full">
                                            <i class="icon-heart text-12"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="row y-gap-10 justify-between items-end pt-24 lg:pt-15">
                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="size-38 rounded-4 flex-center bg-blue-1">
                                                <span class="text-14 fw-600 text-white">4.8</span>
                                            </div>

                                            <div class="ml-10">
                                                <div class="text-13 lh-14 fw-500">Exceptional</div>
                                                <div class="text-12 lh-14 text-light-1">3,014 reviews</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="text-14 text-light-1 mr-10">8 nights</div>
                                            <div class="fw-500">US$72</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mapFilter-results__item">
                        <div class="row x-gap-20 y-gap-20">
                            <div class="col-md-auto">
                                <div class="ratio ratio-1:1 size-120">
                                    <img src="img/hotels/1.png" alt="image" class="img-ratio rounded-4">
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="row x-gap-20 y-gap-10 justify-between">
                                    <div class="col-lg">
                                        <h4 class="text-16 lh-17 fw-500">
                                            Great Northern Hotel, a Tribute Portfolio Hotel, London
                                            <span class="text-10 text-yellow-2">
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                            </span>
                                        </h4>
                                    </div>

                                    <div class="col-auto">
                                        <button class="button -blue-1 size-30 flex-center bg-light-2 rounded-full">
                                            <i class="icon-heart text-12"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="row y-gap-10 justify-between items-end pt-24 lg:pt-15">
                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="size-38 rounded-4 flex-center bg-blue-1">
                                                <span class="text-14 fw-600 text-white">4.8</span>
                                            </div>

                                            <div class="ml-10">
                                                <div class="text-13 lh-14 fw-500">Exceptional</div>
                                                <div class="text-12 lh-14 text-light-1">3,014 reviews</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="text-14 text-light-1 mr-10">8 nights</div>
                                            <div class="fw-500">US$72</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mapFilter-results__item">
                        <div class="row x-gap-20 y-gap-20">
                            <div class="col-md-auto">
                                <div class="ratio ratio-1:1 size-120">
                                    <img src="img/hotels/1.png" alt="image" class="img-ratio rounded-4">
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="row x-gap-20 y-gap-10 justify-between">
                                    <div class="col-lg">
                                        <h4 class="text-16 lh-17 fw-500">
                                            Great Northern Hotel, a Tribute Portfolio Hotel, London
                                            <span class="text-10 text-yellow-2">
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                            </span>
                                        </h4>
                                    </div>

                                    <div class="col-auto">
                                        <button class="button -blue-1 size-30 flex-center bg-light-2 rounded-full">
                                            <i class="icon-heart text-12"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="row y-gap-10 justify-between items-end pt-24 lg:pt-15">
                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="size-38 rounded-4 flex-center bg-blue-1">
                                                <span class="text-14 fw-600 text-white">4.8</span>
                                            </div>

                                            <div class="ml-10">
                                                <div class="text-13 lh-14 fw-500">Exceptional</div>
                                                <div class="text-12 lh-14 text-light-1">3,014 reviews</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="text-14 text-light-1 mr-10">8 nights</div>
                                            <div class="fw-500">US$72</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="mapFilter-map">
                <div class="map js-map"></div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAz77U5XQuEME6TpftaMdX0bBelQxXRlM"></script>

    <script src="js/vendors.js"></script>
    <script src="js/main.js"></script>
    <script src="js/jquery.min.js?v=1.0.0"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function() {
            var today = new Date();

            // Departure date
            $('[name="departure_date"]').datepicker({
                dateFormat: 'yy-mm-dd',
                minDate: today,
                onSelect: function(selectedDate) {
                    var departDate = $(this).datepicker('getDate');

                    // Set minDate for return date as selected departure date
                    $('[name="return_date"]').datepicker('option', 'minDate', departDate);

                    // If return date is before the new departure date, reset it
                    var currentReturn = $('[name="return_date"]').datepicker('getDate');
                    if (currentReturn && currentReturn < departDate) {
                        $('[name="return_date"]').datepicker('setDate', departDate);
                    }
                }
            });

            // Return date
            $('[name="return_date"]').datepicker({
                dateFormat: 'yy-mm-dd',
                minDate: today
            });

            // Prevent default browser datepicker
            $("input[type=date]").on('click', function(e) {
                e.preventDefault();
            });
        });

        function setReturnDateVisibility() {
            var value = $('.search-type.active').attr('data-value');
            $("#trip-type-input").val(value);
            if (value == "ONEWAY") {
                $('#return-date').slideUp(300);
            } else {
                $('#return-date').slideDown(300);
            }
        }

        $("input[name='departure_date']").on('focusout', function() {
            console.log($(this).val() || '');
        });

        $(document).ready(function() {
            setReturnDateVisibility();
        });

        $('.search-type').click(function() {
            $('.search-type.active').removeClass('active');
            $(this).addClass('active');
            setReturnDateVisibility();
        });

        $(document).ready(function() {
            function suggestAirports(inputName, suggestionsId) {
                $("input[name='" + inputName + "']").on('input', function() {
                    var airport = $(this).val();
                    if (airport.length == 0) $('#' + suggestionsId).html('').show();
                    if (airport.length <= 2) return false;
                    $.ajax({
                        url: 'functions/fetch_airport.php',
                        type: 'POST',
                        data: {
                            airport: airport
                        },
                        success: function(response) {
                            var airports = JSON.parse(response);
                            var suggestions = '';
                            airports.forEach(function(airport) {
                                suggestions += '<div class="suggestion-item" data-name="' + airport.airport_name + '" data-code="' + airport.airport_code + '">' + airport.airport_name + ' (' + airport.airport_code + ')</div>';
                            });
                            $('#' + suggestionsId).html(suggestions).show();
                        }
                    });
                });

                $('#' + suggestionsId).on('click', '.suggestion-item', function() {
                    var code = $(this).data('code');
                    $("input[name='" + inputName + "']").val(code);
                    $('#' + suggestionsId).html('').hide();
                });

                $(document).click(function(e) {
                    if (!$(e.target).closest('#' + suggestionsId).length) {
                        $('#' + suggestionsId).html('').hide();
                    }
                });
            }

            suggestAirports('departure_from', 'departure-suggestions');
            suggestAirports('arrival_to', 'arrival-suggestions');

            $("select[name='cabin_class'").on('change', function() {
                var cabinClass = $(this).find('option:selected').text();
                $(".travellers-class").text(cabinClass);
                $("#cabin-class-input").val(cabinClass.toLowerCase().replace(" ", "_"));
            });

            $(".increase").on('click', function() {
                event.preventDefault();
                var value = $(this).data('value');
                var countElement = $("#" + value + "-count");
                var count = parseInt(countElement.text());
                if (value === 'adult' && count >= 9) return;
                if (value === 'children' && count >= 8) return;
                count++;
                countElement.text(count);
                if (value === 'children' && count > 0) {
                    $(".travellers-type").text("travellers");
                } else if (value === 'children' && count === 0) {
                    $(".travellers-type").text("adults");
                }
                $("#adults-input").val($("#adult-count").text());
                $("#children-input").val($("#children-count").text());
                const totalTravellers = parseInt($("#adult-count").text()) + parseInt($("#children-count").text());
                $(".travellers-count").text(totalTravellers);
            });
            $(".decrease").on('click', function() {
                event.preventDefault();
                var value = $(this).data('value');
                var countElement = $("#" + value + "-count");
                var count = parseInt(countElement.text());
                if (value === 'adult' && count <= 1) return;
                if (value === 'children' && count <= 0) return;
                count--;
                countElement.text(count);
                if (value === 'children' && count > 0) {
                    $(".travellers-type").text("travellers");
                } else if (value === 'children' && count === 0) {
                    $(".travellers-type").text("adults");
                }
                $("#adults-input").val($("#adult-count").text());
                $("#children-input").val($("#children-count").text());
                const totalTravellers = parseInt($("#adult-count").text()) + parseInt($("#children-count").text());
                $(".travellers-count").text(totalTravellers);
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</body>
<script>
    $(document).ready(function() {

        $('#traveller-country-code').select2({
            placeholder: "Search Country Code",
            allowClear: true,
            width: '100%' // ensures full-width responsiveness
        });

        $('#continue').on('click', function(e) {
            e.preventDefault();

            // Validate all forms
            const travellerValid = validateTravellerForm();
            const contactValid = validateContactForm();
            const billingValid = validateBillingForm();

            if (travellerValid && contactValid && billingValid) {
                submitAllForms();
            }
        });

        // ✅ Traveller form validation
        function validateTravellerForm() {
            const form = document.getElementById('travellerForm');
            let isValid = true;

            // Reset old errors
            form.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
            form.querySelectorAll('.error').forEach(el => el.textContent = '');

            const titles = form.querySelectorAll('select[name="title[]"]');
            const firstNames = form.querySelectorAll('input[name="first-name[]"]');
            const lastNames = form.querySelectorAll('input[name="last-name[]"]');
            const dobs = form.querySelectorAll('input[name="dob[]"]');
            const firstNameErrors = form.querySelectorAll('.first-name-error');
            const lastNameErrors = form.querySelectorAll('.last-name-error');
            const dobErrors = form.querySelectorAll('.dob-error');

            firstNames.forEach((_, i) => {
                const title = titles[i];
                const first = firstNames[i];
                const last = lastNames[i];
                const dob = dobs[i];
                const firstErr = firstNameErrors[i];
                const lastErr = lastNameErrors[i];
                const dobErr = dobErrors[i];

                if (!title.value.trim()) {
                    title.classList.add('is-invalid');
                    isValid = false;
                }
                if (!first.value.trim()) {
                    first.classList.add('is-invalid');
                    firstErr.textContent = 'First name is required.';
                    isValid = false;
                }
                if (!last.value.trim()) {
                    last.classList.add('is-invalid');
                    lastErr.textContent = 'Last name is required.';
                    isValid = false;
                }
                if (!dob.value) {
                    dob.classList.add('is-invalid');
                    dobErr.textContent = 'Date of birth is required.';
                    isValid = false;
                } else {
                    const dobDate = new Date(dob.value);
                    if (dobDate > new Date()) {
                        dob.classList.add('is-invalid');
                        dobErr.textContent = 'Date of birth cannot be in the future.';
                        isValid = false;
                    }
                }
            });

            return isValid;
        }

        // ✅ Contact Details Validation
        function validateContactForm() {
            const form = document.getElementById('contactDetails');
            let isValid = true;

            const countryCode = $('#traveller-country-code');
            const mobile = $('#traveller-mobile-number');
            const email = $('#traveller-email');
            const mobileError = $('.mobile-error');
            const emailError = $('.email-error');

            // Reset old styles
            form.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));

            if (!countryCode.val()) {
                countryCode.addClass('is-invalid');
                isValid = false;
            }

            if (!mobile.val().trim() || !/^[0-9]{7,15}$/.test(mobile.val())) {
                mobile.addClass('is-invalid');
                mobileError.textContent = 'Please enter a valid mobile number.';
                isValid = false;
            }

            if (!email.val().trim() || !/^\S+@\S+\.\S+$/.test(email.val())) {
                email.addClass('is-invalid');
                emailError.textContent = 'Please enter a valid email address.';
                isValid = false;
            }

            return isValid;
        }

        // ✅ Billing Details Validation
        function validateBillingForm() {
            const form = document.getElementById('billingDetails');
            let isValid = true;

            form.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));

            const address = $('#billing-address');
            const city = $('#billing-city');
            const country = $('#traveller-country');
            const zipcode = $('#traveller-zipcode');
            const phone = $('#traveller-phone');
            const addressErrror = $('.address-error');
            const cityError = $('.city-error');
            const countryError = $('.country-error');
            const zipcodeError = $('.zipcode-error');
            const phoneError = $('.phone-error');

            if (!address.val().trim()) {
                address.addClass('is-invalid');
                addressErrror.textContent = 'Address is required.';
                isValid = false;
            }
            if (!city.val().trim()) {
                city.addClass('is-invalid');
                cityError.textContent = 'City is required.';
                isValid = false;
            }
            if (!country.val().trim()) {
                country.addClass('is-invalid');
                countryError.textContent = 'Country is required.';
                isValid = false;
            }
            if (!zipcode.val().trim()) {
                zipcode.addClass('is-invalid');
                zipcodeError.textContent = 'Zipcode is required.';
                isValid = false;
            }
            if (!phone.val().trim()) {
                phone.addClass('is-invalid');
                phoneError.textContent = 'Phone is required.';
                isValid = false;
            }

            return isValid;
        }

        // ✅ AJAX Submit all forms together
        function submitAllForms() {
            // Combine data from all forms
            const travellerData = $('#travellerForm').serializeArray();
            const contactData = $('#contactDetails').serializeArray();
            const billingData = $('#billingDetails').serializeArray();

            const combinedData = [...travellerData, ...contactData, ...billingData];

            $.ajax({
                url: 'process_data.php', // change this to your endpoint
                method: 'POST',
                data: combinedData,
                beforeSend: function() {
                    $('button[type="submit"]').prop('disabled', true).text('Submitting...');
                },
                success: function(response) {
                    alert('Form submitted successfully!');
                    console.log(response);
                },
                error: function(xhr) {
                    alert('Something went wrong. Please try again.');
                    console.error(xhr.responseText);
                },
                complete: function() {
                    $('button[type="submit"]').prop('disabled', false).text('Submit');
                }
            });

            $(".flight-seat-selector").on("click", function() {
                const target = $(this).data("tab-target");

                const previousActive = $(`.flight-seat-selector.active[data-tab-target="${target}"]`);

                if (!$(this).hasClass("active")) {
                    previousActive.removeClass("active");
                    $(this).addClass("active");
                }
            });
        }
        $(".flight-seat-selector").on("click", function () {
            $(".flight-seat-selector").removeClass("active");
            $(this).addClass("active");
        });
    });
</script>

</html>
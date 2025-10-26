<div class="mainSearch -w-900 bg-white px-10 py-10 lg:px-20 lg:pt-5 lg:pb-20 rounded-22">
    <div class="d-flex x-gap-30 y-gap-20 mb-16 justify-left sm:justify-start">
        <div class="select flight left-round search-type <?php echo (!isset($_POST['trip_type']) || $_POST['trip_type'] == 'ONEWAY' ? 'active' : ''); ?>" data-value="ONEWAY">
            <button class="tabs__button text-15 fw-500 pb-4">One Way</button>
        </div>
        <div class="select-flight right-round search-type <?php echo (isset($_POST['trip_type']) && $_POST['trip_type'] == 'ROUND' ? 'active' : ''); ?>" data-value="ROUND">
            <button class="tabs__button text-15 fw-500 text-black pb-4">Round Trip</button>
        </div>
    </div>
    <hr class="horizontal-divider" />
    <form id="flight-search-form" action="search-flights.php" method="POST" autocomplete="off">
        <input type="hidden" name="trip_type" id="trip-type-input" value="oneway">
        <div class="button-grid items-center">
            <div class="searchMenu-loc px-15 lg:py-15 lg:px-0  js-liverSearch">
                <div data-x-dd-click="searchMenu-loc">
                    <h4 class="text-15 fw-500 ls-2 lh-16">From</h4>
                    <div class="text-15 text-light-1 ls-2 lh-16">
                        <input autocomplete="off" type="search" name="departure_from" placeholder="Where are you going?" class="js-search js-dd-focus" value="<?= $_POST['departure_from'] ?? '' ?>" />
                        <div id="departure-suggestions" class="suggestions"></div>
                    </div>
                </div>
            </div>
            <div class="searchMenu-loc px-15 lg:py-15 lg:px-0  js-liverSearch">
                <div data-x-dd-click="searchMenu-loc">
                    <h4 class="text-15 fw-500 ls-2 lh-16">To</h4>
                    <div class="text-15 text-light-1 ls-2 lh-16">
                        <input autocomplete="off" type="search" name="arrival_to" placeholder="Where are you going?" class="js-search js-dd-focus" value="<?= $_POST['arrival_to'] ?? '' ?>" />
                        <div id="arrival-suggestions" class="suggestions"></div>
                    </div>
                </div>
            </div>
            <div class="searchMenu-date px-15 lg:py-15 lg:px-0  js-calendar js-calendar-el">
                <div data-x-dd-click="searchMenu-date">
                    <h4 class="text-15 fw-500 ls-2 lh-16">Depart</h4>
                    <input type="date" class="js-calendar-input js-dd-focus" name="departure_date" placeholder="Select date" min="<?php echo date('Y-m-d'); ?>" value="<?= $_POST['departure_date'] ?? '' ?>" />
                </div>
            </div>
            <div class="searchMenu-date px-15 lg:py-15 lg:px-0  js-calendar js-calendar-el" id="return-date" style="display: none;">
                <div data-x-dd-click="searchMenu-date">
                    <h4 class="text-15 fw-500 ls-2 lh-16">Return</h4>
                    <input type="date" class="js-calendar-input js-dd-focus" name="return_date" min="<?php echo date('Y-m-d'); ?>" value="<?= $_POST['return_date'] ?? '' ?>" placeholder="Select date" />
                </div>
            </div>
            <div class="searchMenu-guests px-30 lg:py-20 lg:px-0 js-form-dd js-form-counters">
                <input type="hidden" name="adults" id="adults-input" value="<?= $_POST['adults'] ?? '1' ?>">
                <input type="hidden" name="children" id="children-input" value="<?= $_POST['children'] ?? '0' ?>">
                <input type="hidden" name="cabin_class" id="cabin-class-input" value="<?= $_POST['cabin_class'] ?? 'Y' ?>">
                <div data-x-dd-click="searchMenu-guests">
                    <h4 class="text-15 fw-500 ls-2 lh-16">Guest</h4>

                    <div class="text-15 text-light-1 ls-2 lh-16">
                        <span class="js-count-adult travellers-count"><?= isset($_POST['adults']) && isset($_POST['children']) ? $_POST['adults'] + $_POST['children'] : '1' ?></span> <span class="travellers-type">adults</span>
                        -
                        <span class="js-count-child travellers-class"> Economy</span>
                    </div>
                </div>
                <div class="searchMenu-guests__field shadow-2" data-x-dd="searchMenu-guests" data-x-dd-toggle="-is-active">
                    <div class="bg-white px-30 py-30 rounded-4">
                        <div class="row y-gap-10 justify-between items-center">
                            <div class="col-auto">
                                <div class="text-15 fw-500">Cabin</div>
                            </div>

                            <div class="col-auto">
                                <div class="d-flex items-center js-counter">
                                    <select name="cabin_class" class="form-select">
                                        <option value="Y" <?= isset($_POST['cabin_class']) && $_POST['cabin_class'] == 'Y' ? 'selected' : '' ?>>Economy</option>
                                        <option value="S" <?= isset($_POST['cabin_class']) && $_POST['cabin_class'] == 'S' ? 'selected' : '' ?>>Premium Economy</option>
                                        <option value="C" <?= isset($_POST['cabin_class']) && $_POST['cabin_class'] == 'C' ? 'selected' : '' ?>>Business</option>
                                        <option value="F" <?= isset($_POST['cabin_class']) && $_POST['cabin_class'] == 'F' ? 'selected' : '' ?>>First Class</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="border-top-light mt-24 mb-24"></div>
                        <div class="row y-gap-10 justify-between items-center">
                            <div class="col-auto">
                                <div class="text-15 fw-500">Adults</div>
                            </div>

                            <div class="col-auto">
                                <div class="d-flex items-center js-counter">
                                    <button class="button -outline-blue-1 text-blue-1 size-38 rounded-4 js-down decrease" data-value="adult">
                                        <i class="icon-minus text-12"></i>
                                    </button>

                                    <div class="flex-center size-20 ml-15 mr-15">
                                        <div class="text-15 js-count" id="adult-count"><?= $_POST['adults'] ?? '1' ?></div>
                                    </div>

                                    <button class="button -outline-blue-1 text-blue-1 size-38 rounded-4 js-up increase" data-value="adult">
                                        <i class="icon-plus text-12"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="border-top-light mt-24 mb-24"></div>

                        <div class="row y-gap-10 justify-between items-center">
                            <div class="col-auto">
                                <div class="text-15 lh-12 fw-500">Children</div>
                                <div class="text-14 lh-12 text-light-1 mt-5">Ages 0 - 17</div>
                            </div>

                            <div class="col-auto">
                                <div class="d-flex items-center js-counter" data-value-change=".js-count-child">
                                    <button class="button -outline-blue-1 text-blue-1 size-38 rounded-4 js-down decrease" data-value="children">
                                        <i class="icon-minus text-12"></i>
                                    </button>

                                    <div class="flex-center size-20 ml-15 mr-15">
                                        <div class="text-15 js-count" id="children-count"><?= $_POST['children'] ?? '0' ?></div>
                                    </div>

                                    <button class="button -outline-blue-1 text-blue-1 size-38 rounded-4 js-up increase" data-value="children">
                                        <i class="icon-plus text-12"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="button-item">
                <button class="mainSearch__submit button -dark-1 h-60 px-35 col-12 rounded-100 bg-blue-1 text-white">
                    <i class="icon-search text-20 mr-10"></i>
                    Search
                </button>
            </div>
        </div>
    </form>
</div>
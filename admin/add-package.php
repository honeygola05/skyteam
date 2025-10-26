<!DOCTYPE html>
<html lang="en" dir="ltr">


<head>

    <?php include('include/head_admin.php');

    $url = '';
    $trending = '';
    $name = '';
    $price = '';
    $location = '';
    $map_location = '';
    $image = '';
    $image_alt_tag = '';
    $duration = '';
    $description = '';
    $inclusion = '';
    $exclusion = '';
    $additional_info = '';

    if (isset($_GET['id']) && $_GET['id'] != '') {
        $id = get_safe_value($con, $_GET['id']);
        $image_required = '';
        $res = mysqli_query($con, "select * from package where id='$id'");
        $check = mysqli_num_rows($res);
        if ($check > 0) {
            $row = mysqli_fetch_assoc($res);
            $id = $_GET['id'];
            $trending = $row['trending'];
            $url = $row['url'];
            $name = $row['name'];
            $image = $row['image'];
            $image_alt_tag = $row['image_alt_tag'];
            $price = $row['price'];
            $location = $row['location'];
            $map_location = $row['map_location'];
            $duration = $row['duration'];
            $inclusion = $row['inclusion'];
            $exclusion = $row['exclusion'];
            $description = $row['description'];
            $additional_info = $row['additional_info'];
            $itinerary = $row['itinerary'];
        } else {
            header('location:all-package.php');
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

                <!-- New package Add Start -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <form class="theme-form theme-form-2 mega-form" action="insert-package.php" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-sm-8 m-auto">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-header-2">
                                                    <h5>Package Information</h5>
                                                </div>


                                                <div class="row align-items-center">
                                                    <label class="col-sm-3 col-form-label form-label-title">Trending</label>
                                                    <div class="col-sm-9">
                                                        <label class="switch">
                                                            <input type="checkbox" name="trending" value="<?php if ($trending == '1') {
                                                                                                                echo '1';
                                                                                                            } else {
                                                                                                                echo '0';
                                                                                                            } ?>" <?php if ($trending == '1') {
                                                                                                                        echo 'checked';
                                                                                                                    } else {
                                                                                                                        echo '';
                                                                                                                    } ?>><span class="switch-state"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <?php
                                                if ($url != '') {
                                                ?>
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="form-label-title col-sm-3 mb-0">Package
                                                            Url</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" type="text" name="url" value="<?php echo $url ?>" placeholder="Package Url" required>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0">Package
                                                        Name</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="text" name="name" value="<?php echo $name ?>" placeholder="Package Name" required>
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0">Package
                                                        Price</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="text" name="price" value="<?php echo $price ?>" placeholder="Package Price" required>
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0">Package
                                                        Location</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="text" name="location" value="<?php echo $location ?>" placeholder="Package Location" required>
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0">Package
                                                        Map</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="text" name="map_location" value="<?php echo $map_location ?>" placeholder="Package Map">
                                                    </div>
                                                </div>
                                                <?php if (isset($_GET['id'])) { ?>
                                                    <div class="mb-4 row align-items-center" id="image_box">
                                                        <label class="col-sm-3 col-form-label form-label-title">Images</label>
                                                        <?php
                                                        $all_image = json_decode($image);
                                                        for ($i = 0; $i < count($all_image); $i++) { ?>
                                                            <div class="col-sm-6" id="image_container_<?php echo $i; ?>">
                                                                <input class="form-control form-choose" name="image[]" type="file" id="formFile_<?php echo $i; ?>">
                                                                <img src="../media/package/<?php echo $all_image[$i] ?>" alt="" style="width: 100px">
                                                            </div>

                                                            <div class="col-lg-3">
                                                                <button type="button" class="btn btn-sm btn-danger mt-2" onclick="remove_existing_image(<?php echo $i; ?>)">
                                                                    <span id="payment-button-amount">Remove</span>
                                                                </button>
                                                            </div>
                                                        <?php } ?>
                                                        <div class="col-lg-3">
                                                            <button type="button" class="btn btn-sm btn-info mt-2" onclick="add_more_images()">
                                                                <span id="payment-button-amount">Add Image</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="mb-4 row align-items-center" id="image_box">
                                                        <label class="col-sm-3 col-form-label form-label-title">Images</label>

                                                        <div class="col-sm-6">
                                                            <input class="form-control form-choose" name="image[]" type="file" id="formFile_1">
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <button type="button" class="btn btn-sm btn-info mt-2" onclick="add_more_images()">
                                                                <span id="payment-button-amount">Add Image</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0">Image Alt Tag</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="text" name="image_alt_tag" value="<?php echo $image_alt_tag ?>" placeholder="Image Alt Tag" required>
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0">Duration</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="text" name="duration" value="<?= $duration ?>" placeholder="Duration" required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="form-label-title col-sm-12 mb-0">Package
                                                        Description</label>
                                                    <div class="col-sm-12">
                                                        <textarea id="editor" name="description"><?php echo $description ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="form-label-title col-sm-12 mb-0">Inclusion</label>
                                                    <div class="col-sm-12">
                                                        <textarea id="editor2" name="inclusion"><?php echo $inclusion ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="form-label-title col-sm-12 mb-0">Exclusion</label>
                                                    <div class="col-sm-12">
                                                        <textarea id="editor3" name="exclusion"><?php echo $exclusion ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="form-label-title col-sm-12 mb-0">Additional
                                                        Information</label>
                                                    <div class="col-sm-12">
                                                        <textarea id="editor4" name="additional_info"><?php echo $additional_info     ?></textarea>
                                                    </div>
                                                </div>

                                                <!-- <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0">Base Price</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" name="base_price" value="<?php echo $base_price ?>" placeholder="Base Price" type="text" required>
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0">Discounted Price</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" name="discounted_price" value="<?php echo $discounted_price ?>" type="text" placeholder="Discounted Price" required>
                                                    </div>
                                                </div> -->
                                                <div class="mb-4 row align-items-start" id="itinerary_box">
                                                    <label class="col-sm-3 col-form-label form-label-title">Itinerary</label>
                                                    <div class="col-sm-9" id="itinerary_container">
                                                        <?php
                                                        $itinerary = [];
                                                        // Decode itinerary only if editing and valid data exists
                                                        if (isset($_GET['id']) && isset($row['itinerary']) && !empty($row['itinerary'])) {
                                                            $itinerary = json_decode($row['itinerary'], true);
                                                        }

                                                        // If itinerary exists
                                                        if (!empty($itinerary)) {
                                                            foreach ($itinerary as $index => $item) { ?>
                                                                <div class="row align-items-center itinerary_group mb-3" id="itinerary_group_<?php echo $index; ?>">
                                                                    <div class="col-sm-12 mb-2">
                                                                        <input class="form-control" name="itinerary[<?php echo $index; ?>][day]" type="text" placeholder="Day" value="<?= htmlspecialchars($item['day']) ?>" required>
                                                                    </div>
                                                                    <div class="col-sm-12 mb-2">
                                                                        <input class="form-control" name="itinerary[<?php echo $index; ?>][heading]" type="text" placeholder="Heading" value="<?= htmlspecialchars($item['heading']) ?>" required>
                                                                    </div>
                                                                    <div class="col-sm-12 mb-2">
                                                                        <input class="form-control" name="itinerary[<?php echo $index; ?>][description]" type="text" placeholder="Paragraph" value="<?= htmlspecialchars($item['description']) ?>" required>
                                                                    </div>
                                                                    <?php if ($index != 0) { ?>
                                                                        <div class="col-sm-12">
                                                                            <button type="button" class="btn btn-sm btn-danger mt-1" onclick="remove_existing_itinerary(<?php echo $index; ?>)">Remove</button>
                                                                        </div>
                                                                    <?php } ?>
                                                                </div>
                                                            <?php }
                                                        } else { ?>
                                                            <!-- Show 1 blank row if no data exists -->
                                                            <div class="row align-items-center itinerary_group mb-3" id="itinerary_group_0">
                                                                <div class="col-sm-12 mb-2">
                                                                    <input class="form-control" name="itinerary[0][day]" type="text" placeholder="Day" required>
                                                                </div>
                                                                <div class="col-sm-12 mb-2">
                                                                    <input class="form-control" name="itinerary[0][heading]" type="text" placeholder="Heading" required>
                                                                </div>
                                                                <div class="col-sm-12 mb-2">
                                                                    <input class="form-control" name="itinerary[0][description]" type="text" placeholder="Paragraph" required>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    </div>


                                                    <div class="col-sm-9 offset-sm-3 mt-2">
                                                        <button type="button" class="btn btn-sm btn-info" onclick="add_more_itinerary()">Add Day</button>
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-start" id="faqs_box">
                                                    <label class="col-sm-3 col-form-label form-label-title">faqs</label>
                                                    <div class="col-sm-9" id="faqs_container">
                                                        <?php
                                                        $faqs = [];
                                                        if (isset($_GET['id']) && !empty($row['faqs'])) {
                                                            $faqs = json_decode($row['faqs'], true);
                                                        }

                                                        if (!empty($faqs)) {
                                                            foreach ($faqs as $index => $item) { ?>
                                                                <div class="row align-items-center faqs_group mb-3" id="faqs_group_<?php echo $index; ?>">
                                                                    <div class="col-sm-12 mb-2">
                                                                        <input class="form-control" name="faqs[<?php echo $index; ?>][question]" type="text" placeholder="Question" value="<?= htmlspecialchars($item['question']) ?>" required>
                                                                    </div>
                                                                    <div class="col-sm-12 mb-2">
                                                                        <input class="form-control" name="faqs[<?php echo $index; ?>][answer]" type="text" placeholder="Answer" value="<?= htmlspecialchars($item['answer']) ?>" required>
                                                                    </div>
                                                                    <?php if ($index != 0) { ?>
                                                                        <div class="col-sm-12">
                                                                            <button type="button" class="btn btn-sm btn-danger mt-1" onclick="remove_existing_faqs(<?php echo $index; ?>)">Remove</button>
                                                                        </div>
                                                                    <?php } ?>
                                                                </div>
                                                            <?php }
                                                        } else { ?>
                                                            <div class="row align-items-center faqs_group mb-3" id="faqs_group_0">
                                                                <div class="col-sm-12 mb-2">
                                                                    <input class="form-control" name="faqs[0][question]" type="text" placeholder="Question" required>
                                                                </div>
                                                                <div class="col-sm-12 mb-2">
                                                                    <input class="form-control" name="faqs[0][answer]" type="text" placeholder="Answer" required>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    </div>

                                                    <div class="col-sm-9 offset-sm-3 mt-2">
                                                        <button type="button" class="btn btn-sm btn-info" onclick="add_more_faqs()">Add Day</button>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>

                                        <!-- <div class="card">
                                            <div class="card-body">
                                                <div class="card-header-2">
                                                    <h5>Search engine listing</h5>
                                                </div>

                                                <div class="seo-view">
                                                    <span class="link"><?= $meta_url ?></span>
                                                    <h5><?= $meta_title ?></h5>
                                                    <p><?= $meta_desc ?></p>
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

                                                <div class="row">
                                                    <label class="form-label-title col-sm-3 mb-0">URL handle</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="text" name="meta_url" value="<?= $meta_url ?>" placeholder="Url">
                                                    </div>
                                                </div>

                                            </div>
                                        </div> -->
                                    </div>
                                    <?php if (isset($_GET['id'])) { ?>
                                        <input type="hidden" name="id" value="<?php echo $id ?>">
                                        <button class="btn btn-solid" name="update_package_submit" type="submit">Update</button>
                                    <?php } else { ?>
                                        <button class="btn btn-solid" name="submit" type="submit">Submit</button>
                                    <?php } ?>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <!-- New package Add End -->

                <!-- footer Start -->
                <?php include('include/footer_admin.php'); ?>
                <!-- footer En -->
            </div>
            <!-- Container-fluid End -->
        </div>
        <!-- Page Body End -->
    </div>
    <!-- page-wrapper End -->



    <script>
        var total_image = <?php echo isset($_GET['id']) ? count($all_image) : 1; ?>;

        function add_more_images() {
            total_image++;
            var html = '<div class="row" id="add_image_box_' + total_image + '" ><div class="col-lg-3"></div><div class="col-lg-6">' +
                '<input class="form-control form-choose" type="file" name="image[]" id="formFile_' + total_image + '"></div>' +
                '<div class="col-lg-3"><button type="button" ' +
                'class="btn btn-sm btn-danger btn-info mt-2" onclick="remove_image(' + total_image + ')">' +
                '<span id="payment-button-amount">Remove</span></button>' +
                '</div></div>';
            jQuery('#image_box').append(html);
        }

        function remove_image(id) {
            jQuery('#add_image_box_' + id).remove();
        }

        function remove_existing_image(id) {
            jQuery('#image_container_' + id).remove();
        }
    </script>
    <!-- <script>
        let priceCount = <?php echo isset($count) ? $count : 1; ?>;

        function add_more_price() {
            let html = `
    <div class="row align-items-center price_group" id="price_group_${priceCount}">
        <div class="mb-3 col-sm-3">
            <input class="form-control" name="measure[]" type="text" placeholder="Measure" required>
        </div>
        <div class="mb-3 col-sm-3">
            <input class="form-control" name="base_price[]" type="text" placeholder="Base Price" required>
        </div>
        <div class="mb-3 col-sm-3">
            <input class="form-control" name="discounted_price[]" type="text" placeholder="Discounted Price" required>
        </div>
        <div class="mb-3 col-sm-2">
            <button type="button" class="btn btn-sm btn-danger mt-2" onclick="remove_existing_price(${priceCount})">Remove</button>
        </div>
    </div>`;
            document.getElementById('price_box').insertAdjacentHTML('beforeend', html);
            priceCount++;
        }

        function remove_existing_price(id) {
            let element = document.getElementById('price_group_' + id);
            if (element) {
                element.remove();
            }
        }
    </script> -->
    <script>
        let itineraryIndex = <?= isset($itinerary) ? count($itinerary) : 1 ?>;

        function add_more_itinerary() {
            const container = document.getElementById("itinerary_container");

            const group = document.createElement("div");
            group.classList.add("row", "align-items-center", "itinerary_group", "mb-3");
            group.id = `itinerary_group_${itineraryIndex}`;

            group.innerHTML = `
            <div class="col-sm-12 mb-2">
                <input class="form-control" name="itinerary[${itineraryIndex}][day]" type="text" placeholder="Day" required>
            </div>
            <div class="col-sm-12 mb-2">
                <input class="form-control" name="itinerary[${itineraryIndex}][heading]" type="text" placeholder="Heading" required>
            </div>
            <div class="col-sm-12 mb-2">
                <input class="form-control" name="itinerary[${itineraryIndex}][description]" type="text" placeholder="Paragraph" required>
            </div>
            <div class="col-sm-12">
                <button type="button" class="btn btn-sm btn-danger mt-1" onclick="remove_existing_itinerary(${itineraryIndex})">Remove</button>
            </div>
        `;

            container.appendChild(group);
            itineraryIndex++;
        }

        function remove_existing_itinerary(index) {
            const group = document.getElementById(`itinerary_group_${index}`);
            if (group) group.remove();
        }
    </script>

    <script>
        let faqsIndex = document.querySelectorAll('.faqs_group').length;

        function add_more_faqs() {
            const container = document.getElementById("faqs_container");

            const group = document.createElement("div");
            group.classList.add("row", "align-items-center", "faqs_group", "mb-3");
            group.id = `faqs_group_${faqsIndex}`;

            group.innerHTML = `
            <div class="col-sm-12 mb-2">
                <input class="form-control" name="faqs[${faqsIndex}][question]" type="text" placeholder="Question" required>
            </div>
            <div class="col-sm-12 mb-2">
                <input class="form-control" name="faqs[${faqsIndex}][answer]" type="text" placeholder="Answer" required>
            </div>
            <div class="col-sm-12">
                <button type="button" class="btn btn-sm btn-danger mt-1" onclick="remove_existing_faqs(${faqsIndex})">Remove</button>
            </div>
        `;

            container.appendChild(group);
            faqsIndex++;
        }

        function remove_existing_faqs(index) {
            const group = document.getElementById(`faqs_group_${index}`);
            if (group) {
                group.remove();
            }
        }
    </script>


    <?php include('include/foot_admin.php'); ?>

</body>


<!-- Mirrored from themes.pixelstrap.com/fastkart/back-end/add-new-package.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 Apr 2024 05:07:03 GMT -->

</html>
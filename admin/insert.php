<?php
include('include/head_admin.php');

function generate_seo_friendly_title($title)
{
    $title = strtolower($title);
    $title = str_replace(' ', '-', $title);
    $title = preg_replace('/[^A-Za-z0-9\-]/', '', $title);
    return $title;
}

if (isset($_POST['submit'])) {
    // Insert Product
    $trending = isset($_POST['trending']) ? 1 : 0;
    $hot_deals = isset($_POST['hot_deals']) ? 1 : 0;
    $availability = get_safe_value($con, $_POST['availability']);
    $stock_num = get_safe_value($con, $_POST['stock_num']);
    $name = get_safe_value($con, $_POST['name']);
    $url = generate_seo_friendly_title($name);
    $image_alt_tag = get_safe_value($con, $_POST['image_alt_tag']);
    $category = get_safe_value($con, $_POST['category']);
    $short_description = get_safe_value($con, $_POST['short_description']);
    $sku = get_safe_value($con, $_POST['sku']);
    $description = get_safe_value($con, $_POST['description']);
    $description2 = get_safe_value($con, $_POST['description2']);
    $meta_title = get_safe_value($con, $_POST['meta_title']);
    $meta_desc = get_safe_value($con, $_POST['meta_desc']);
    $meta_url = get_safe_value($con, $_POST['meta_url']);

    // Handle arrays
    $measure = isset($_POST['measure']) ? json_encode($_POST['measure']) : json_encode([]);
    $base_price = isset($_POST['base_price']) ? json_encode($_POST['base_price']) : json_encode([]);
    $discounted_price = isset($_POST['discounted_price']) ? json_encode($_POST['discounted_price']) : json_encode([]);

    // Handle images
    $image_array = $_FILES['image'];
    $image_names = [];

    if (!empty($image_array['name'][0])) {
        foreach ($image_array['name'] as $key => $img_name) {
            $new_image_name = rand(111111111, 999999999) . '_' . basename($img_name);
            $tmp_name = $image_array['tmp_name'][$key];
            move_uploaded_file($tmp_name, '../media/product/' . $new_image_name);
            $image_names[] = $new_image_name;
        }
    }

    $product_images = json_encode($image_names);

    $insert_query = "INSERT INTO `product`(`trending`, `hot_deals`, `availability`, `stock_num`, `url`, `name`, `image`, `image_alt_tag`, `category`, `base_price`, `discounted_price`, `short_description`, `sku`, `description`, `description2`, `meta_title`, `meta_desc`, `meta_url`, `measure`) 
    VALUES ('$trending', '$hot_deals', '$availability', '$stock_num', '$url', '$name', '$product_images', '$image_alt_tag', '$category', '$base_price', '$discounted_price', '$short_description', '$sku', '$description', '$description2', '$meta_title', '$meta_desc', '$meta_url', '$measure')";

    mysqli_query($con, $insert_query);
    header('location: all-product.php');
    die();
}

// Update Product
if (isset($_POST['update_product_submit'])) {
    $id = get_safe_value($con, $_POST['id']);
    $trending = isset($_POST['trending']) ? 1 : 0;
    $hot_deals = isset($_POST['hot_deals']) ? 1 : 0;
    $availability = get_safe_value($con, $_POST['availability']);
    $stock_num = get_safe_value($con, $_POST['stock_num']);
    $name = get_safe_value($con, $_POST['name']);
    $url = get_safe_value($con, $_POST['url']);
    $image_alt_tag = get_safe_value($con, $_POST['image_alt_tag']);
    $category = get_safe_value($con, $_POST['category']);
    $short_description = get_safe_value($con, $_POST['short_description']);
    $sku = get_safe_value($con, $_POST['sku']);
    $description = get_safe_value($con, $_POST['description']);
    $description2 = get_safe_value($con, $_POST['description2']);
    $meta_title = get_safe_value($con, $_POST['meta_title']);
    $meta_desc = get_safe_value($con, $_POST['meta_desc']);
    $meta_url = get_safe_value($con, $_POST['meta_url']);

    // Handle arrays
    $measure = isset($_POST['measure']) ? json_encode($_POST['measure']) : json_encode([]);
    $base_price = isset($_POST['base_price']) ? json_encode($_POST['base_price']) : json_encode([]);
    $discounted_price = isset($_POST['discounted_price']) ? json_encode($_POST['discounted_price']) : json_encode([]);

    // Fetch existing images
    $row = mysqli_query($con, "SELECT * FROM `product` WHERE `id`='$id'");
    $result = mysqli_fetch_assoc($row);
    $old_images = json_decode($result['image'], true) ?? [];

    $new_images = [];

    if (!empty($_FILES['image']['name'][0])) {
        foreach ($_FILES['image']['name'] as $key => $img_name) {
            if (!empty($img_name)) {
                $new_image_name = rand(111111111, 999999999) . '_' . basename($img_name);
                $tmp_name = $_FILES['image']['tmp_name'][$key];
                move_uploaded_file($tmp_name, '../media/product/' . $new_image_name);
                $new_images[] = $new_image_name;
            } else {
                $new_images[] = $old_images[$key] ?? '';
            }
        }
    } else {
        $new_images = $old_images;
    }

    $product_images = json_encode($new_images);

    $update_query = "UPDATE `product` SET 
        `trending`='$trending',
        `hot_deals`='$hot_deals',
        `availability`='$availability',
        `stock_num`='$stock_num',
        `url`='$url',
        `name`='$name',
        `image`='$product_images',
        `image_alt_tag`='$image_alt_tag',
        `category`='$category',
        `base_price`='$base_price',
        `discounted_price`='$discounted_price',
        `short_description`='$short_description',
        `sku`='$sku',
        `description`='$description',
        `description2`='$description2',
        `meta_title`='$meta_title',
        `meta_desc`='$meta_desc',
        `meta_url`='$meta_url',
        `measure`='$measure'
        WHERE `id`='$id'";

    mysqli_query($con, $update_query);
    header('location: all-product.php');
    die();
}

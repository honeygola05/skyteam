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
    // Insert package
    $trending = isset($_POST['trending']) ? 1 : 0;
    $name = get_safe_value($con, $_POST['name']);
    $url = generate_seo_friendly_title($name);
    $price = get_safe_value($con, $_POST['price']);
    $location = get_safe_value($con, $_POST['location']);
    $map_location = get_safe_value($con, $_POST['map_location']);
    $image_alt_tag = get_safe_value($con, $_POST['image_alt_tag']);
    $description = get_safe_value($con, $_POST['description']);
    $duration = get_safe_value($con, $_POST['duration']);
    $inclusion = get_safe_value($con, $_POST['inclusion']);
    $exclusion = get_safe_value($con, $_POST['exclusion']);
    $additional_info = get_safe_value($con, $_POST['additional_info']);
    if (isset($_POST['itinerary']) && is_array($_POST['itinerary'])) {
        $itinerary_array = array_values($_POST['itinerary']); // ensures indexed array
        $itinerary_json = json_encode($itinerary_array, JSON_UNESCAPED_UNICODE);
    } else {
        $itinerary_json = json_encode([]);
    }
    if (isset($_POST['faqs']) && is_array($_POST['faqs'])) {
        $faqs_array = array_values($_POST['faqs']); // ensures indexed array
        $faqs_json = json_encode($faqs_array, JSON_UNESCAPED_UNICODE);
    } else {
        $faqs_json = json_encode([]);
    }

    // Handle images
    $image_array = $_FILES['image'];
    $image_names = [];

    if (!empty($image_array['name'][0])) {
        foreach ($image_array['name'] as $key => $img_name) {
            $new_image_name = rand(111111111, 999999999) . '_' . basename($img_name);
            $tmp_name = $image_array['tmp_name'][$key];
            move_uploaded_file($tmp_name, '../media/package/' . $new_image_name);
            $image_names[] = $new_image_name;
        }
    }

    $package_images = json_encode($image_names);

     $insert_query = "INSERT INTO `package`(`trending`, `name`, `url`, `image`, `image_alt_tag`, `description`, `duration`, `inclusion`, `exclusion`, `additional_info`, `itinerary`, `price`, `location`, `map_location`, `faqs`) 
    VALUES ('$trending','$name','$url','$package_images','$image_alt_tag','$description','$duration','$inclusion','$exclusion','$additional_info','$itinerary_json','$price','$location','$map_location','$faqs_json')";

    mysqli_query($con, $insert_query);
    header('location: all-package.php');
    // die();
}

// Update package
if (isset($_POST['update_package_submit'])) {
    $id = get_safe_value($con, $_POST['id']);
    $trending = isset($_POST['trending']) ? 1 : 0;
    $name = get_safe_value($con, $_POST['name']);
    $url = get_safe_value($con, $_POST['url']);
    $price = get_safe_value($con, $_POST['price']);
    $location = get_safe_value($con, $_POST['location']);
    $map_location = get_safe_value($con, $_POST['map_location']);
    $image_alt_tag = get_safe_value($con, $_POST['image_alt_tag']);
    $description = get_safe_value($con, $_POST['description']);
    $duration = get_safe_value($con, $_POST['duration']);
    $inclusion = get_safe_value($con, $_POST['inclusion']);
    $exclusion = get_safe_value($con, $_POST['exclusion']);
    $additional_info = get_safe_value($con, $_POST['additional_info']);
    
    if (isset($_POST['itinerary']) && is_array($_POST['itinerary'])) {
        $itinerary_array = array_values($_POST['itinerary']); // ensures indexed array
        $itinerary_json = json_encode($itinerary_array, JSON_UNESCAPED_UNICODE);
    } else {
        $itinerary_json = json_encode([]);
    }
    if (isset($_POST['faqs']) && is_array($_POST['faqs'])) {
        $faqs_array = array_values($_POST['faqs']); // ensures indexed array
        $faqs_json = json_encode($faqs_array, JSON_UNESCAPED_UNICODE);
    } else {
        $faqs_json = json_encode([]);
    }


    // Fetch existing images
    $row = mysqli_query($con, "SELECT * FROM `package` WHERE `id`='$id'");
    $result = mysqli_fetch_assoc($row);
    $old_images = json_decode($result['image'], true) ?? [];

    $new_images = [];

    if (!empty($_FILES['image']['name'][0])) {
        foreach ($_FILES['image']['name'] as $key => $img_name) {
            if (!empty($img_name)) {
                $new_image_name = rand(111111111, 999999999) . '_' . basename($img_name);
                $tmp_name = $_FILES['image']['tmp_name'][$key];
                move_uploaded_file($tmp_name, '../media/package/' . $new_image_name);
                $new_images[] = $new_image_name;
            } else {
                $new_images[] = $old_images[$key] ?? '';
            }
        }
    } else {
        $new_images = $old_images;
    }

    $package_images = json_encode($new_images);

    $update_query = "UPDATE `package` SET 
        `trending`='$trending',
        `name`='$name',
        `url`='$url',
        `image`='$package_images',
        `image_alt_tag`='$image_alt_tag',
        `description`='$description',
        `duration`='$duration',
        `inclusion`='$inclusion',
        `exclusion`='$exclusion',
        `additional_info`='$additional_info',
        `itinerary`='$itinerary_json',    
        `price`='$price',
        `location`='$location',
        `map_location`='$map_location',
        `faqs`='$faqs_json'
        WHERE `id`='$id'";

    mysqli_query($con, $update_query);
    header('location: all-package.php');
    die();
}

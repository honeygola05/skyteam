<?php
include('include/connection.php'); // Include your database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    $brands = isset($data['brands']) ? $data['brands'] : [];
    $materials = isset($data['materials']) ? $data['materials'] : [];

    $brandFilter = '';
    $materialFilter = '';
    $catFilter = '';

    if (!empty($brands)) {
        $brandIds = implode(',', array_map('intval', $brands));
        $brandFilter = " AND `brand` IN ($brandIds)";
    }

    if (!empty($materials)) {
        $materialIds = implode(',', array_map('intval', $materials));
        $materialFilter = " AND `material` IN ($materialIds)";
    }
    if (isset($_GET['cat_url']) && $_GET['cat_url'] != '') {
        $cat_url = $_GET['cat_url'];
        $sqli = "SELECT * FROM `category` WHERE `url` = '$cat_url' AND `status` = '1'";
        $resss = mysqli_query($con, $sqli);
        $rowww = mysqli_fetch_assoc($resss);
        if ($rowww) {
            $category = $rowww['id'];
            $catFilter = " AND `category` = '$category'";
        } else {
            $catFilter = "";
        }
    }
    // Initialize the base SQL query
    $sql = "SELECT * FROM `product` WHERE `status` = '1' $brandFilter $materialFilter $catFilter";

    // Check if a category URL is provided and filter by category


    $res = mysqli_query($con, $sql);

    if (mysqli_num_rows($res) > 0) {
        while ($product = mysqli_fetch_assoc($res)) {
            $image = json_decode($product['image']);
?>
            <div class="col-xl-3 col-md-4 col-6 col-grid-box">
                <div class="product-box">
                    <div class="product-imgbox" style="border-top: 1px solid #02d3b3;border-left: 1px solid #02d3b3;border-right: 1px solid #02d3b3;">
                        <div class="product-front"><a href="product.php?url=<?= $product['url'] ?>"><img src="media/product/<?= $image[0] ?>" class="img-fluid" alt="product"></a></div>
                        <div class="product-back"><a href="product.php?url=<?= $product['url'] ?>"><img src="media/product/<?= $image[1] ?>" class="img-fluid" alt="product"></a></div>
                        <div class="product-icon icon-inline"><button class="tooltip-top" onclick="addtocart('<?php echo $product['id'] ?>','<?php echo $product['name'] ?>','<?php echo $image[0] ?>','<?php echo $product['discounted_price'] ?>','<?php echo $product['url'] ?>','<?php echo $product['base_price'] ?>')" data-tippy-content="Add to cart"><i data-feather="shopping-cart"></i></button>
                            <a <?php if (isset($_SESSION['u_email'])) { ?> onclick="add_to_wishlist('<?php echo $product['id'] ?>','<?php echo $user['id'] ?>')" <?php } else { ?> href="login.php" <?php } ?> class="add-to-wish tooltip-top" data-tippy-content="Add to Wishlist"><i data-feather="heart"></i></a>
                        </div>
                    </div>
                    <div class="product-detail detail-inline" style="border-bottom: 1px solid #02d3b3;border-left: 1px solid #02d3b3;border-right: 1px solid #02d3b3;">
                        <div class="detail-title">
                            <div class="detail-left">
                                <a href="product.php?url=<?= $product['url'] ?>">
                                    <h6 class="price-title"><?php echo $product['name'] ?></h6>
                                </a>
                            </div>
                            <div class="detail-right">
                                <div class="check-price">₹<?php echo $product['base_price'] ?></div>
                                <div class="price">₹<?php echo $product['discounted_price'] ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php
        }
    } else {
        echo "<div class='col-12'><p>No products found matching your criteria.</p></div>";
    }
}
?>
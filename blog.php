<!DOCTYPE html>
<html lang="en" data-x="html" data-x-toggle="html-overflow-hidden">


<!-- Mirrored from creativelayers.net/themes/gotrip-html/blog-single.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 25 Jun 2025 05:58:02 GMT -->

<head>
  <?php include('include/head.php');
  if (isset($_GET['url']) && !empty($_GET['url'])) {
    $url = $_GET['url'];
    $sql = "SELECT * FROM `blogs` WHERE `blog_url` = '$url'";
    $result = mysqli_query($con, $sql);
    $blog = mysqli_fetch_assoc($result);
  ?>
    <meta name="title" content="<?php echo $blog['meta_title']; ?>">
    <meta name="description" content="<?php echo $blog['meta_desc']; ?>">
</head>

<body>

  <?php include('include/preloader.php') ?>
  <main>

    <div class="header-margin"></div>
    <?php include('include/header.php');
    $url = $_GET['url'];
    $sql = "SELECT * FROM `blogs` WHERE `blog_url` = '$url'";
    $result = mysqli_query($con, $sql);
    $blog = mysqli_fetch_assoc($result);
    ?>



    <section data-anim="slide-up" class="layout-pt-md">
      <div class="container">
        <div class="row y-gap-40 justify-center text-center">
          <div class="col-auto">
            <h1 class="text-30 fw-600"><?php echo $blog['blog_title']; ?></h1>
            <div class="text-15 text-light-1 mt-10"><?= date('F d, Y', strtotime($blog['createdAt'])) ?></div>
          </div>

          <div class="col-12">
            <img src="media/blogs/<?php echo $blog['image']; ?>" alt="image" class="col-12 rounded-8">
          </div>
        </div>
      </div>
    </section>

    <section data-anim="slide-up" class="layout-pt-md layout-pb-md">
      <div class="container">
        <div class="row y-gap-30 justify-center">
          <div class="col-xl-8 col-lg-10">
            <div class="">
              <h3 class="text-20 fw-500"><?php echo $blog['blog_title']; ?></h3>
              <div class="text-15 mt-20"><?php echo $blog['description']; ?></div>

            </div>

          </div>
        </div>
      </div>
    </section>

    <?php include('include/footer.php') ?>

  </main>

<?php include('include/foot.php');
  } else {
    header("Location: blogs.php");
  }
?>
</body>


<!-- Mirrored from creativelayers.net/themes/gotrip-html/blog-single.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 25 Jun 2025 05:58:03 GMT -->

</html>
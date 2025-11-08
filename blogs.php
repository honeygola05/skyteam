<!DOCTYPE html>
<html lang="en" data-x="html" data-x-toggle="html-overflow-hidden">

<head>
  <?php include('include/head.php') ?>
</head>

<body>
  <?php include('include/preloader.php') ?>

  <main>


    <div class="header-margin"></div>
    <?php include('include/header.php') ?>


    <section class="layout-pt-lg layout-pb-md">
      <div data-anim-wrap class="container">
        <div data-anim-child="slide-up delay-1" class="row justify-center text-center">
          <div class="col-auto">
            <div class="sectionTitle -md">
              <h2 class="sectionTitle__title">Travel inspiration for your next adventure</h2>
              <p class=" sectionTitle__text mt-5 sm:mt-0">Discover the world's most beautiful destinations and get ready to plan your next trip</p>
            </div>
          </div>
        </div>

        <div class="row y-gap-30 pt-40">

          <?php
          $ii = 1;
          $sql = mysqli_query($con, "SELECT * FROM `blogs`");
          while ($blogs = mysqli_fetch_assoc($sql)) {
          ?>
            <div data-anim-child="slide-left delay-<?= $ii++ ?>" class="col-lg-4 col-sm-6">

              <a href="blog.php?url=<?= $blogs['blog_url'] ?>" class="blogCard -type-1 d-block ">
                <div class="blogCard__image">
                  <div class="ratio ratio-4:3 rounded-4 rounded-8">
                    <img class="img-ratio js-lazy" src="#" data-src="media/blogs/<?= $blogs['image'] ?>" alt="<?= $blogs['image_alt_tag'] ?>">
                  </div>
                </div>

                <div class="mt-20">
                  <h4 class="text-dark-1 text-18 fw-500"><?= $blogs['blog_title'] ?></h4>
                  <div class="text-light-1 text-15 lh-14 mt-5"><?= date('F d, Y', strtotime($blogs['createdAt'])) ?></div>
                </div>
              </a>

            </div>
          <?php } ?>

        </div>
      </div>
    </section>

    <?php include('include/footer.php') ?>

  </main>

  <?php include('include/foot.php') ?>
</body>

</html>
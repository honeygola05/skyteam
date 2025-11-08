<!DOCTYPE html>
<html lang="en" data-x="html" data-x-toggle="html-overflow-hidden">


<!-- Mirrored from creativelayers.net/themes/gotrip-html/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 25 Jun 2025 05:58:15 GMT -->

<head>
  <?php include('include/head.php') ?>
</head>

<body>
  <?php include('include/preloader.php') ?>

  <main>


    <div class="header-margin"></div>
    <?php include('include/header.php') ?>


    <!-- <section data-anim="fade" class="d-flex items-center py-15 border-top-light">
      <div class="container">
        <div class="row y-gap-10 items-center justify-between">
          <div class="col-auto">
            <div class="row x-gap-10 y-gap-5 items-center text-14 text-light-1">
              <div class="col-auto">
                <div class="">Europe</div>
              </div>
              <div class="col-auto">
                <div class="">></div>
              </div>
              <div class="col-auto">
                <div class="">United Kingdom (UK)</div>
              </div>
              <div class="col-auto">
                <div class="">></div>
              </div>
              <div class="col-auto">
                <div class="text-dark-1">London</div>
              </div>
            </div>
          </div>

          <div class="col-auto">
            <a href="#" class="text-14 text-light-1">London Tourism: Best of London</a>
          </div>
        </div>
      </div>
    </section> -->

    <div class="ratio ratio-16:9">
      <div class="map-ratio">
        <div class="map js-map-single"></div>
      </div>
    </div>

    <section>
      <div class="relative container">
        <div class="row justify-end">
          <div class="col-xl-5 col-lg-7">
            <div class="map-form px-40 pt-40 pb-50 lg:px-30 lg:py-30 md:px-24 md:py-24 bg-white rounded-4 shadow-4">
              <div class="text-22 fw-500">
                Send a message
              </div>

              <form method="POST" action="form.php" class="row y-gap-20 pt-20">
                <div class="col-12">

                  <div class="form-input ">
                    <input type="text" name="name" required>
                    <label class="lh-1 text-16 text-light-1">Full Name</label>
                  </div>

                </div>
                <div class="col-12">

                  <div class="form-input ">
                    <input type="text" name="email" required>
                    <label class="lh-1 text-16 text-light-1">Email</label>
                  </div>

                </div>
                <div class="col-12">

                  <div class="form-input ">
                    <input type="text" name="phone" required>
                    <label class="lh-1 text-16 text-light-1">Phone</label>
                  </div>

                </div>
                <div class="col-12">

                  <div class="form-input ">
                    <input type="text" name="subject" required>
                    <label class="lh-1 text-16 text-light-1">Subject</label>
                  </div>

                </div>
                <div class="col-12">

                  <div class="form-input ">
                    <textarea required rows="4" name="message"></textarea>
                    <label class="lh-1 text-16 text-light-1">Your Messages</label>
                  </div>

                </div>
                <div class="col-auto">

                  <button type="submit" name="contact" class="button px-24 h-50 -dark-1 bg-blue-1 text-white">
                    Send a Messsage <div class="icon-arrow-top-right ml-15"></div>
                  </button>

                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="layout-pt-md layout-pb-lg">
      <div class="container">
        <div class="row x-gap-80 y-gap-20 justify-between">
          <div class="col-12">
            <div class="text-30 sm:text-24 fw-600">Contact Us</div>
          </div>

          <div class="col-lg-3">
            <div class="text-14 text-light-1">Address</div>
            <div class="text-18 fw-500 mt-10"><?= $contact['address'] ?></div>
          </div>

          <div class="col-auto">
            <div class="text-14 text-light-1">Toll Free Customer Care</div>
            <div class="text-18 fw-500 mt-10"><?= $contact['phone'] ?></div>
            <div class="text-18 fw-500 mt-10"><?= $contact['phone2'] ?></div>
          </div>

          <div class="col-auto">
            <div class="text-14 text-light-1">Need live support?</div>
            <div class="text-18 fw-500 mt-10"><?= $contact['email'] ?></div>
          </div>

          <div class="col-auto">
            <div class="text-14 text-light-1">Follow us on social media</div>
            <div class="d-flex x-gap-20 items-center mt-10">
              <a href="#"><i class="icon-facebook text-14"></i></a>
              <a href="#"><i class="icon-twitter text-14"></i></a>
              <a href="#"><i class="icon-instagram text-14"></i></a>
              <a href="#"><i class="icon-linkedin text-14"></i></a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="layout-pt-lg layout-pb-lg bg-blue-2">
      <div class="container">
        <div class="row justify-center text-center">
          <div class="col-auto">
            <div class="sectionTitle -md">
              <h2 class="sectionTitle__title">Why Choose Us</h2>
              <p class=" sectionTitle__text mt-5 sm:mt-0">These popular destinations have a lot to offer</p>
            </div>
          </div>
        </div>

        <div class="row y-gap-40 justify-between pt-50">

          <div class="col-lg-3 col-sm-6">

            <div class="featureIcon -type-1 ">
              <div class="d-flex justify-center">
                <img src="#" data-src="img/featureIcons/1/1.svg" alt="image" class="js-lazy">
              </div>

              <div class="text-center mt-30">
                <h4 class="text-18 fw-500">Best Price Guarantee</h4>
                <p class="text-15 mt-10">With our Best Price Guarantee, you can book confidently knowing you’re getting the most for your money.
                </p>
              </div>
            </div>

          </div>

          <div class="col-lg-3 col-sm-6">

            <div class="featureIcon -type-1 ">
              <div class="d-flex justify-center">
                <img src="#" data-src="img/featureIcons/1/2.svg" alt="image" class="js-lazy">
              </div>

              <div class="text-center mt-30">
                <h4 class="text-18 fw-500">Easy & Quick Booking</h4>
                <p class="text-15 mt-10">With SkyTeam Travel, booking flights and packages is as smooth as your journey should be.</p>
              </div>
            </div>

          </div>

          <div class="col-lg-3 col-sm-6">

            <div class="featureIcon -type-1 ">
              <div class="d-flex justify-center">
                <img src="#" data-src="img/featureIcons/1/3.svg" alt="image" class="js-lazy">
              </div>

              <div class="text-center mt-30">
                <h4 class="text-18 fw-500">Customer Care 24/7</h4>
                <p class="text-15 mt-10">At SkyTeam Travel, our support never sleeps. Whether it’s day or night, our travel experts are here to help you — anytime, anywhere.</p>
              </div>
            </div>

          </div>

        </div>
      </div>
    </section>


    <?php include('include/footer.php') ?>

  </main>

  <?php include('include/foot.php') ?>
</body>


<!-- Mirrored from creativelayers.net/themes/gotrip-html/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 25 Jun 2025 05:58:16 GMT -->

</html>
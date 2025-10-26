<!DOCTYPE html>
<html lang="en" data-x="html" data-x-toggle="html-overflow-hidden">


<!-- Mirrored from creativelayers.net/themes/gotrip-html/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 25 Jun 2025 05:58:09 GMT -->

<head>
  <?php include('include/head.php');
  ensureUserIsLoggedOut();
  $error = '';

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = $_POST['password'];

    $query = "SELECT id, password, first_name FROM users WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) === 1) {
      $row = mysqli_fetch_assoc($result);
      if (password_verify($password, $row['password'])) {
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_name'] = $row['first_name'];
        header("Location: account.php");
        exit;
      } else {
        $error = "Invalid email or password.";
      }
    } else {
      $error = "No account found with that email.";
    }
  }
  ?>
</head>

<body>
  <?php include('include/preloader.php') ?>

  <main>

    <div class="header-margin"></div>
    <?php include('include/header.php');  ?>

    <section class="layout-pt-lg layout-pb-lg bg-blue-2">
      <div class="container">
        <div class="row justify-center">
          <div class="col-xl-6 col-lg-7 col-md-9">
            <div class="px-50 py-50 sm:px-20 sm:py-20 bg-white shadow-4 rounded-4">
              <?php if ($error): ?>
                <div class="alert alert-danger mb-20"><?= $error ?></div>
              <?php endif; ?>

              <form method="POST">
                <div class="row y-gap-20">
                  <div class="col-12">
                    <h1 class="text-22 fw-500">Welcome back</h1>
                    <p class="mt-10">Don't have an account yet?
                      <a href="signup.php" class="text-blue-1">Sign up for free</a>
                    </p>
                  </div>

                  <div class="col-12">
                    <div class="form-input">
                      <input type="text" name="email" required>
                      <label class="lh-1 text-14 text-light-1">Email</label>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-input">
                      <input type="password" name="password" required>
                      <label class="lh-1 text-14 text-light-1">Password</label>
                    </div>
                  </div>

                  <div class="col-12">
                    <a href="#" class="text-14 fw-500 text-blue-1 underline">Forgot your password?</a>
                  </div>

                  <div class="col-12">
                    <button type="submit" class="button py-20 -dark-1 bg-blue-1 text-white w-100" style="width: 100%;">
                      Sign In <div class="icon-arrow-top-right ml-15"></div>
                    </button>
                  </div>
                </div>
              </form>

            </div>
          </div>
        </div>

      </div>
    </section>

    <!-- <section class="layout-pt-md layout-pb-md bg-dark-2">
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
            <div class="single-field -w-410 d-flex x-gap-10 y-gap-20">
              <div>
                <input class="bg-white h-60" type="text" placeholder="Your Email">
              </div>

              <div>
                <button class="button -md h-60 bg-blue-1 text-white">Subscribe</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> -->

    <?php include('include/footer.php');  ?>

  </main>

  <?php include('include/foot.php');  ?>
</body>

</html>
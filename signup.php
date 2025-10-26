<!DOCTYPE html>
<html lang="en" data-x="html" data-x-toggle="html-overflow-hidden">

<head>
  <?php include('include/head.php');
  ensureUserIsLoggedOut();
  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Password match check
    if ($password !== $confirm_password) {
      echo "Passwords do not match.";
      exit;
    }

    // Check if email already exists
    $check = mysqli_query($con, "SELECT id FROM users WHERE email = '$email' AND phone = '$phone'");
    if (mysqli_num_rows($check) > 0) {
      echo "Email already registered.";
      exit;
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user
    $query = "INSERT INTO users (first_name, last_name, phone, email, password) 
              VALUES ('$first_name', '$last_name', '$phone', '$email', '$hashed_password')";

    if (mysqli_query($con, $query)) {
      // Get inserted user ID
      $user_id = mysqli_insert_id($con);

      // Store user info in session
      $_SESSION['user_id'] = $user_id;
      $_SESSION['user_name'] = $first_name . ' ' . $last_name;
      $_SESSION['user_email'] = $email;

      // Redirect to dashboard or home
      header("Location: account.php");
      exit;
    } else {
      echo "Error: " . mysqli_error($con);
    }
  }
  ?>
</head>

<body>
  <?php include('include/preloader.php') ?>

  <main>

    <div class="header-margin"></div>
    <?php include('include/header.php');  ?>

    <!-- <section class="layout-pt-lg layout-pb-lg bg-blue-2">
      <div class="container">
        <div class="row justify-center">
          <div class="col-xl-6 col-lg-7 col-md-9">
            <div class="px-50 py-50 sm:px-20 sm:py-20 bg-white shadow-4 rounded-4">
              <div class="row y-gap-20">
                <div class="col-12">
                  <h1 class="text-22 fw-500">Sign in or create an account</h1>
                  <p class="mt-10">Already have an account? <a href="#" class="text-blue-1">Log in</a></p>
                </div>

                <div class="col-12">

                  <div class="form-input ">
                    <input type="text" required>
                    <label class="lh-1 text-14 text-light-1">First Name</label>
                  </div>

                </div>

                <div class="col-12">

                  <div class="form-input ">
                    <input type="text" required>
                    <label class="lh-1 text-14 text-light-1">Last Name</label>
                  </div>

                </div>

                <div class="col-12">

                  <div class="form-input ">
                    <input type="text" required>
                    <label class="lh-1 text-14 text-light-1">Email</label>
                  </div>

                </div>

                <div class="col-12">

                  <div class="form-input ">
                    <input type="password" required>
                    <label class="lh-1 text-14 text-light-1">Password</label>
                  </div>

                </div>

                <div class="col-12">

                  <div class="form-input ">
                    <input type="password" required>
                    <label class="lh-1 text-14 text-light-1">Confirm Password</label>
                  </div>

                </div>

                <div class="col-12">

                  <div class="d-flex ">
                    <div class="form-checkbox mt-5">
                      <input type="checkbox" name="name">
                      <div class="form-checkbox__mark">
                        <div class="form-checkbox__icon icon-check"></div>
                      </div>
                    </div>

                    <div class="text-15 lh-15 text-light-1 ml-10">Email me exclusive Agoda promotions. I can opt out later as stated in the Privacy Policy.</div>

                  </div>

                </div>

                <div class="col-12">

                  <a href="#" class="button py-20 -dark-1 bg-blue-1 text-white">
                    Sign In <div class="icon-arrow-top-right ml-15"></div>
                  </a>

                </div>
              </div>

              <div class="row y-gap-20 pt-30">
                <div class="col-12">
                  <div class="text-center">or sign in with</div>

                  <button class="button col-12 -outline-blue-1 text-blue-1 py-15 rounded-8 mt-10">
                    <i class="icon-apple text-15 mr-10"></i>
                    Facebook
                  </button>

                  <button class="button col-12 -outline-red-1 text-red-1 py-15 rounded-8 mt-15">
                    <i class="icon-apple text-15 mr-10"></i>
                    Google
                  </button>

                  <button class="button col-12 -outline-dark-2 text-dark-2 py-15 rounded-8 mt-15">
                    <i class="icon-apple text-15 mr-10"></i>
                    Apple
                  </button>
                </div>

                <div class="col-12">
                  <div class="text-center px-30">By signing in, I agree to GoTrip Terms of Use and Privacy Policy.</div>
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
    <section class="layout-pt-lg layout-pb-lg bg-blue-2">
      <div class="container">
        <div class="row justify-center">
          <div class="col-xl-6 col-lg-7 col-md-9">
            <form method="POST" class="px-50 py-50 sm:px-20 sm:py-20 bg-white shadow-4 rounded-4">
              <div class="row y-gap-20">
                <div class="col-12">
                  <h1 class="text-22 fw-500">Sign in or create an account</h1>
                  <p class="mt-10">Already have an account? <a href="login.php" class="text-blue-1">Log in</a></p>
                </div>

                <div class="col-12">
                  <div class="form-input">
                    <input type="text" name="first_name" required>
                    <label class="lh-1 text-14 text-light-1">First Name</label>
                  </div>
                </div>

                <div class="col-12">
                  <div class="form-input">
                    <input type="text" name="last_name" required>
                    <label class="lh-1 text-14 text-light-1">Last Name</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-input">
                    <input type="text" name="phone" required pattern="[0-9]{10}" title="Enter 10 digit number">
                    <label class="lh-1 text-14 text-light-1">Phone Number</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-input">
                    <input type="email" name="email" required>
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
                  <div class="form-input">
                    <input type="password" name="confirm_password" required>
                    <label class="lh-1 text-14 text-light-1">Confirm Password</label>
                  </div>
                </div>

                <div class="col-12">
                  <!-- <div class="d-flex">
                    <div class="form-checkbox mt-5">
                      <input type="checkbox" name="subscribe" checked>
                      <div class="form-checkbox__mark">
                        <div class="form-checkbox__icon icon-check"></div>
                      </div>
                    </div>
                    <div class="text-15 lh-15 text-light-1 ml-10">
                      Email me exclusive promotions. I can opt out later as stated in the Privacy Policy.
                    </div>
                  </div>
                </div> -->

                <div class="col-12">
                  <button type="submit" class="button py-20 -dark-1 bg-blue-1 text-white w-100"  style="width: 100%;">
                    Sign Up <div class="icon-arrow-top-right ml-15"></div>
                  </button>
                </div>
              </div>

              <!-- <div class="row y-gap-20 pt-30">
                <div class="col-12 text-center">or sign in with</div>

                <div class="col-12">
                  <button type="button" class="button col-12 -outline-blue-1 text-blue-1 py-15 rounded-8 mt-10">
                    <i class="icon-facebook text-15 mr-10"></i> Facebook
                  </button>

                  <button type="button" class="button col-12 -outline-red-1 text-red-1 py-15 rounded-8 mt-15">
                    <i class="icon-google text-15 mr-10"></i> Google
                  </button>

                  <button type="button" class="button col-12 -outline-dark-2 text-dark-2 py-15 rounded-8 mt-15">
                    <i class="icon-apple text-15 mr-10"></i> Apple
                  </button>
                </div>

                <div class="col-12">
                  <div class="text-center px-30 text-13">
                    By signing up, I agree to GoTrip's <a href="#" class="text-blue-1">Terms of Use</a> and <a href="#" class="text-blue-1">Privacy Policy</a>.
                  </div>
                </div>
              </div> -->
            </form>
          </div>
        </div>
      </div>
    </section>


    <?php include('include/footer.php');  ?>
  </main>

  <?php include('include/foot.php');  ?>
</body>

</html>
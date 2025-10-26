<footer class="footer -type-1">
    <div class="container">
        <div class="pt-60 pb-60">
            <div class="row y-gap-40 justify-between ">
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <h5 class="text-16 fw-500 mb-30">Contact Us</h5>

                    <div class="mt-30">
                        <div class="text-14 mt-30">Toll Free Customer Care</div>
                        <a href="#" class="text-18 fw-500 text-blue-1 mt-5">+(1) 123 456 7890</a>
                    </div>

                    <div class="mt-35">
                        <div class="text-14 mt-30">Need live support?</div>
                        <a href="#" class="text-18 fw-500 text-blue-1 mt-5">hi@gotrip.com</a>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <h5 class="text-16 fw-500 mb-30">Company</h5>
                    <div class="d-flex y-gap-10 flex-column">
                        <a href="about.php">About Us</a>
                        <a href="flights.php">Flights</a>
                        <a href="packages.php">Packages</a>
                        <a href="blogs.php">Blogs</a>
                        <a href="contact.php">Contact</a>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <h5 class="text-16 fw-500 mb-30">Policies</h5>
                    <div class="d-flex y-gap-10 flex-column">
                        <a href="#">Privacy Policy</a>
                        <a href="#">Terms & Conditions</a>
                        <a href="#">Cancellation Policy</a>
                        <a href="#">Refund Policy</a>
                    </div>
                </div>

                <!-- <div class="col-xl-4 col-lg-4 col-sm-6">
                    <h5 class="text-16 fw-500 mb-30">Other Services</h5>
                    <div class="d-flex y-gap-10 flex-column">
                        <a href="#">Car hire</a>
                        <a href="#">Activity Finder</a>
                        <a href="#">Tour List</a>
                        <a href="#">Flight finder</a>
                        <a href="#">Cruise Ticket</a>
                        <a href="#">Holiday Rental</a>
                        <a href="#">Travel Agents</a>
                    </div>
                </div> -->

                <!-- <div class="col-xl-2 col-lg-4 col-sm-6">
                    <h5 class="text-16 fw-500 mb-30">Mobile</h5>

                    <div class="d-flex items-center px-20 py-10 rounded-4 border-light">
                        <div class="icon-apple text-24"></div>
                        <div class="ml-20">
                            <div class="text-14 text-light-1">Download on the</div>
                            <div class="text-15 lh-1 fw-500">Apple Store</div>
                        </div>
                    </div>

                    <div class="d-flex items-center px-20 py-10 rounded-4 border-light mt-20">
                        <div class="icon-play-market text-24"></div>
                        <div class="ml-20">
                            <div class="text-14 text-light-1">Get in on</div>
                            <div class="text-15 lh-1 fw-500">Google Play</div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>

        <div class="py-20 border-top-light">
            <div class="row justify-between items-center y-gap-10">
                <div class="col-auto">
                    <div class="row x-gap-30 y-gap-10">
                        <div class="col-auto">
                            <div class="d-flex items-center">
                                © 2025 Sky Team All rights reserved.
                            </div>
                        </div>
                        <!-- 
                        <div class="col-auto">
                            <div class="d-flex x-gap-15">
                                <a href="#">Privacy</a>
                                <a href="#">Terms</a>
                                <a href="#">Site Map</a>
                            </div>
                        </div> -->
                    </div>
                </div>

                <div class="col-auto">
                    <div class="row y-gap-10 items-center">
                        <!-- <div class="col-auto">
                            <div class="d-flex items-center">
                                <button class="d-flex items-center text-14 fw-500 text-dark-1 mr-10">
                                    <i class="icon-globe text-16 mr-10"></i>
                                    <span class="underline">English (US)</span>
                                </button>

                                <button class="d-flex items-center text-14 fw-500 text-dark-1">
                                    <i class="icon-usd text-16 mr-10"></i>
                                    <span class="underline">USD</span>
                                </button>
                            </div>
                        </div> -->

                        <div class="col-auto">
                            <div class="d-flex x-gap-20 items-center">
                                <a href="#"><i class="icon-facebook text-14"></i></a>
                                <a href="#"><i class="icon-twitter text-14"></i></a>
                                <a href="#"><i class="icon-instagram text-14"></i></a>
                                <a href="#"><i class="icon-linkedin text-14"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Login Popup -->
<!-- Login Popup Modal -->
<div id="loginModal" style="
  display:none;
  position:fixed;
  top:0; left:0;
  width:100%; height:100%;
  background:rgba(0,0,0,0.6);
  z-index:9999;
  align-items:center;
  justify-content:center;
">
  <div style="
    position:relative;
    width:90%;
    max-width:400px;
    background:#fff;
    border-radius:10px;
    padding:30px;
    box-shadow:0 0 15px rgba(0,0,0,0.3);
  ">
    <span id="closeLoginModal" style="
      position:absolute;
      top:10px; right:15px;
      font-size:22px;
      cursor:pointer;
      color:#333;
    ">&times;</span>

    <h2 class="text-22 fw-600 mb-3">Welcome Back</h2>
    <p class="mb-20">Don't have an account? 
      <a href="signup.php" class="text-blue-1">Sign up</a>
    </p>

    <form id="loginForm" method="POST">
      <div class="form-group" style="margin-bottom:15px;">
        <label>Email</label>
        <input type="email" name="email" required class="form-control" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:5px;">
      </div>

      <div class="form-group" style="margin-bottom:15px;">
        <label>Password</label>
        <input type="password" name="password" required class="form-control" style="width:100%; padding:10px; border:1px solid #ddd; border-radius:5px;">
      </div>

      <div class="form-group" style="margin-bottom:15px;">
        <a href="#" class="text-14 fw-500 text-blue-1 underline">Forgot your password?</a>
      </div>

      <button type="submit" class="button py-15 -dark-1 bg-blue-1 text-white w-100" style="width:100%; border:none; border-radius:5px; cursor:pointer;">
        Sign In
      </button>

      <div id="loginMessage" style="margin-top:15px; font-size:14px; color:red;"></div>
    </form>
  </div>
</div>
<script>
// Open popup
document.getElementById("openLoginModal").addEventListener("click", function(e) {
  e.preventDefault();
  document.getElementById("loginModal").style.display = "flex";
});

// Close popup
document.getElementById("closeLoginModal").addEventListener("click", function() {
  document.getElementById("loginModal").style.display = "none";
});

// Close on background click
document.getElementById("loginModal").addEventListener("click", function(e) {
  if (e.target === this) {
    this.style.display = "none";
  }
});

// Handle form submission (optional AJAX)
document.getElementById("loginForm").addEventListener("submit", function(e) {
  e.preventDefault();
  const form = this;
  const message = document.getElementById("loginMessage");

  fetch("login_process.php", {
    method: "POST",
    body: new FormData(form)
  })
  .then(res => res.json())
  .then(data => {
    if (data.status === "success") {
      message.style.color = "green";
      message.textContent = "Login successful!";
      setTimeout(() => location.reload(), 1000);
    } else {
      message.style.color = "red";
      message.textContent = data.message;
    }
  })
  .catch(() => {
    message.textContent = "Something went wrong. Please try again.";
  });
});
</script>

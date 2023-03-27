<!DOCTYPE html>
<?php include "include/config.php";  $page='contact'; ?>
<html lang="en">
  <head>
    <title>V | Contact</title>
    <?php include("include/head.php");  ?>
  </head>
  <body>
    <!-- ======= Header ======= -->
    <header id="header" class="header">
      <?php include("include/headER.php"); ?>
    </header>
    <main id="main">
      <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
          <div class="d-flex justify-content-between align-items-center">
            <h2>Contact</h2>
            <ol>
              <li><a href="index.php">Home</a></li>
              <li>Contact</li>
            </ol>
          </div>
        </div>
      </section>
      <!-- ======= Contact Section ======= -->
      <section id="contact" class="contact">
        <div class="container">
          <div>
            <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
          </div>
          <div class="row mt-5">
            <div class="col-lg-4">
              <div class="info">
                <div class="address">
                  <i class="bi bi-geo-alt"></i>
                  <h4>Location:</h4>
                  <p>A108 Adam Street, New York, NY 535022</p>
                </div>
                <div class="email">
                  <i class="bi bi-envelope"></i>
                  <h4>Email:</h4>
                  <p>info@example.com</p>
                </div>
                <div class="phone">
                  <i class="bi bi-phone"></i>
                  <h4>Call:</h4>
                  <p>+1 5589 55488 55s</p>
                </div>
              </div>
            </div>
            <div class="col-lg-8 mt-5 mt-lg-0">
              <form action="contact-data.php" method="post" role="form"  >
                <div class="row">
                  <div class="col-md-6 form-group">
                    <input type="text" name="nm" class="form-control" id="nm" placeholder="Your Name" required>
                  </div>
                  <div class="col-md-6 form-group mt-3 mt-md-0">
                    <input type="email" class="form-control" name="eml" id="eml" placeholder="Your Email" required>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 form-group mt-3">
                    <input type="tel" name="mob" class="form-control" id="mob" placeholder="Your Mobile " required>
                  </div>
                  <div class="col-md-6 form-group mt-3 ">
                    <input type="text" class="form-control" name="sub" id="sub" placeholder="Subject" required>
                  </div>
                </div>
                <div class="form-group mt-3">
                  <textarea class="form-control" name="msg" rows="5" placeholder="Message" required></textarea>
                </div>
                <div class="text-center">
                  <br/><input type="submit" name="submit" value="Send Message" style="background: #d9232d;border: 0;padding: 10px 24px;color: #fff;transition: 0.4s;border-radius: 4px;">
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
    </main>
    <!-- ======= Footer ======= -->
    <footer id="footer">
      <?php include("include/footer.php"); ?>
    </footer><!-- End Footer -->
    <?php include("include/up-down.php"); include("include/footer-script.php"); ?>
  </body>
</html>
<!DOCTYPE html>
<?php include "include/config.php";  $page='contact'; ?>
<html lang="en">
  <head>
    <title>Contact</title>
    <?php include("include/head.php");  ?>
  </head>
  <body>
    <!-- ======= Header ======= -->
    <header id="header" class="header">
      <?php include("include/header.php"); ?>
    </header>
    <main id="main">
      <section id="hero">
        <div class="carousel-item active" style="background-image: url(images/bg/contact.png)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__fadeInDown"> Contact <span style="background: linear-gradient(70.76deg, #E71D25 4.27%, #F37E60 74.51%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;background-clip: text;">Us</span></h2>
            </div>
          </div>
        </div>
      </section>
      <!-- ======= Contact Section ======= -->
      <section class="ftco-section contact" style="text-align:left !important">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
              <h2 class="heading-section" style="font-weight:600">Contact Us</h2>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12 cmain">
              <div class="wrapper">
                <div class="row no-gutters">
                  <div class="col-md-5 d-flex align-items-stretch cbg">
                    <div class="info-wrap  w-100 p-lg-5 p-4">
                      <h3 class="mb-4 mt-md-4" style="color:#fff">Information</h3>
                      <p style="color:#fff">Got a question on SECURA? Have some suggestion? Contact us.We respect your privacy and will not share this information with any other agency.</p>
                      <?php $result=$qm->getRecord("profile","*","id=1");
                      if (mysqli_num_rows($result)>0) {
                        $row=mysqli_fetch_array($result); ?>
                      <div class="info2" style="color:#fff">
                        <div class="address">
                          <p><b>Address : </b><?php echo $row['addr'] ?> </p>
                        </div>
                        <div class="email">
                          <p><b>Email : </b><?php echo $row['eml'] ?></p>
                        </div>
                        <div class="phone">
                         <p><b> Mobile : </b><?php echo $row['mob'] ?></p>
                        </div>
                      </div>
                      <?php } ?>
                    </div>
                  </div>
                  <div class="col-md-7 d-flex align-items-stretch">
                    <div class="contact-wrap w-100 p-md-5 p-4">
                      <form action="contact-data.php" method="post" role="form"  >
                        <div class="row">
                          <div class="col-md-12 form-group mt-3">
                            <label for="">Name<sup>*</sup></label>
                            <input type="text" name="nm" class="form-control fbg" id="nm"  required>
                          </div>
                          <div class="col-md-12 form-group mt-3">
                            <label for="">Email<sup>*</sup></label>
                            <input type="email" class="form-control fbg" name="eml" id="eml"required>
                          </div>
                          <div class="col-md-12 form-group mt-3">
                            <label for="">Phone</label>
                            <input type="tel" name="mob" class="form-control fbg" id="mob" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" >
                          </div>
                          <div class="col-md-12 form-group mt-3">
                            <label for="">Message</label>
                            <textarea class="form-control fbg" name="msg" rows="6"></textarea>
                          </div>
                          <div class="text-center">
                            <br/><input type="submit" name="submit" value="Submit" style="background: linear-gradient(70.76deg, #E71D25 4.27%, #F37E60 74.51%);border-radius: 10px;border: 0;padding: 10px 24px;color: #fff;transition: 0.4s;border-radius: 4px;">
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <center><img src="images/bg/ft.png" alt="" ></center>
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
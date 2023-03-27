<div class="footer-top">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-6">
        <div class="footer-info">
          <h3><?php echo WEB_TITLE; ?></h3>
          <p>
            <?php $result=$qm->getRecord("profile","*","id=1");
            if (mysqli_num_rows($result)>0) {
              $row=mysqli_fetch_array($result); ?>
              <strong>Address : </strong><?php echo $row['addr']; ?><br/>
              <strong>Phone : </strong><a href="tel:<?php echo $row['mob']; ?>" style="text-decoration: none;color: white;"><?php echo $row['mob']; ?></a><br/>
              <strong>Email : </strong><a href="mailto:<?php echo $row['eml']; ?>" style="text-decoration: none;color: white;"><?php echo $row['eml']; ?></a><br/>
            <?php } ?>
          </p>
          <div class="social-links mt-3">
            <?php $result=$qm->getRecord("social","*","id=1");
            if (mysqli_num_rows($result)>0) {
              $row=mysqli_fetch_array($result); ?>
              <a href="<?php echo $row['insta'];?>" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="<?php echo $row['fb'];?>" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="<?php echo $row['youtb'];?>" class="youtube"><i class="bx bxl-youtube"></i></a>
              <a href="<?php echo $row['twit'];?>" class="twitter"><i class="bx bxl-twitter"></i></a>
           <?php } ?>
          </div>
        </div>
      </div>
      <div class="col-lg-2 col-md-6 footer-links">
        <h4>Useful Links</h4>
        <ul>
          <li><i class="bx bx-chevron-right"></i> <a href="index.php">Home</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="about.php">About us</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="services.php">Services</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="javascript:void(0)">Terms of service</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="javascript:void(0)">Privacy policy</a></li>
        </ul>
      </div>
      <div class="col-lg-3 col-md-6 footer-links">
        <h4>Our Services</h4>
        <ul>
          <li><i class="bx bx-chevron-right"></i> <a href="javascript:void(0)">Web Design</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="javascript:void(0)">Web Development</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="javascript:void(0)">Product Management</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="javascript:void(0)">Marketing</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="javascript:void(0)">Graphic Design</a></li>
        </ul>
      </div>

      <div class="col-lg-4 col-md-6 footer-newsletter">
        <h4>Our Newsletter</h4>
        <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
        <form action="" method="post">
          <input type="email" name="email"><input type="submit" value="Subscribe">
        </form>

      </div>

    </div>
  </div>
</div>
<div class="container">
  <div class="copyright">
    &copy; Copyright <strong><span>Sailor</span></strong>. All Rights Reserved
  </div>
  <div class="credits">
    Designed by <a href="">Softpad</a>
  </div>
</div>
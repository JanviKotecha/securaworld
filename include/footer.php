<div class="footer-top">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-6 subLeft2">
        <div class="footer-info">
        <a href="index"><img src="images/logo/securaworld_white.png" style="max-width:88%"></a>
          <p>
            <br>Secura is the flagship brand of Lookman Electroplast Industries Limited,India's pioneer in security and Surveillance Solutions, since 1979.
            Secura AI Analytics and cameras are an essential part of mission critical command control centers across major cities in india.
          </p>
        </div>
      </div>
      <?php $result=$qm->getRecord("profile","*","id=1");
        if (mysqli_num_rows($result)>0) {
          $row=mysqli_fetch_array($result); ?>
      <div class="col-lg-3 col-md-6 footer-links subLeft2" style="padding-left:30px">
        <h4>Corporate Office:</h4>
        <p><?php echo $row['addr'] ?></p>
      </div>
      <div class="col-lg-3 col-md-6 footer-links subLeft2" style="padding-left:30px">
      <h4>Phone : <br><br> <a href="tel:<?php echo $row['mob']; ?>" style="text-decoration: none;color: #A6A6A6;"><?php echo $row['mob']; ?></a></h4>
      <h4>We Are Open</h4>Mon - Sat : 10 AM - 7PM
      <?php } ?>    
      </div>

      <div class="col-lg-3 col-md-6 footer-newsletter " style="padding-left:30px">
        <h4>Contct: </h4>
        <p>Contact Form <br>Find a reseller <br>Experience center</p>
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
  </div>
</div><hr>
<div class="container">
  <div class="copyright">
  © 2023, Lookman Electroplast Pvt.Ltd. All Rights Reserved Privacy Policy | T&C
  </div>
  <!-- <div class="credits">
    Designed by <a href=""></a>
  </div> -->
</div>
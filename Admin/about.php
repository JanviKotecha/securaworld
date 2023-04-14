<!DOCTYPE html>
<html lang="en">
<?php @include("include/secureConfig.php");
   $page_title = "about";
?>
  <head>
    <?php include("include/head.php"); ?>
  </head>
  <body>
    <div class="container-scroller">
      <?php include("include/navbar.php");?>
      <div class="container-fluid page-body-wrapper">
        <?php include("include/sidebar.php");?>
        <div class="main-panel">
      
          <div class="content-wrapper">
            <div class="row">
            <?php include ("include/alert_msg.php"); ?>
              <div class="col-12">
           
                <div class="card">
                  <div class="card-body">
                  <h2 class="card-title">
                      <a href="about_update.php" class="btn btn-primary" style="float: right;">Update About</a>
                    </h2>
                    <h2 style="text-align:center">About Us</h2><hr>
                  <?php 
                    $result=$qm->getRecord("about");
                    if (mysqli_num_rows($result)>0) { ?>
                        <?php  ($row=mysqli_fetch_array($result)) ?>
                      <div class="col-md-12">
                        <div class="col-sm-12">
                          <div style="MARGIN-RIGHT: 50PX;MARGIN-LEFT: 50PX;">
                            <p style="text-align:justify"><?php echo $row['a_desc']; ?></p><hr>
                          </div>
                        </div>
                      </div>
                      <div class="row" style="MARGIN-RIGHT: 50PX;MARGIN-LEFT: 50PX;">
                        <div class="col-md-6 ">
                          <div class="form-group row">
                            <div class="col-sm-12">
                              <h3 style="font-size: 20px;font-weight:600">Vision</h3><hr>
                            </div>
                            <div class="col-sm-4">
                              <img src= "<?php echo ABOUT_URL.$row['v_img']; ?>" style="height:100px;width:100px;" alt="image"><br/>
                            </div>    
                            <div class="col-sm-8">
                              <h6><?php echo $row['v_cont'];?></h6>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <div class="col-sm-12">
                                <h3 style="font-size: 20px;font-weight:600">Mission</h3><hr>
                              </div>
                              <div class="col-sm-4">
                              <img src= "<?php echo ABOUT_URL.$row['m_img']; ?>" style="height:100px;width:100px;" alt="image"><br/>
                              </div>    
                              <div class="col-sm-8">
                                <h6><?php echo $row['m_cont'];?></h6>
                            </div>
                        </div>
                      </div> 
                      <div class="col-md-12">
                        <div class="col-sm-12">
                          <div >
                          <hr><h3 style="font-size: 30px;font-weight:600">Our Milestone</h3><hr>
                            <img src= "<?php echo ABOUT_URL.$row['mi_img']; ?>"  style="width:50%"  alt="image"><br/>
                          </div>
                        </div>
                      </div> 
                <?php } ?>
              </div> 
            </div>
          </div>
        </div>
      </div>
    </div>
      <?php @include("include/footer-script.php");?>
  </body>
</html> 

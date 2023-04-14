<!DOCTYPE html>
<html lang="en">
<?php @include("include/secureConfig.php");
   $page_title = "ewaste";
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
                      <a href="ewaste_update.php" class="btn btn-primary" style="float: right;">Update E-Waste</a>
                    </h2>
                    <h2 style="text-align:center">E-Waste</h2><hr>
                  <?php 
                    $result=$qm->getRecord("ewaste");
                    if (mysqli_num_rows($result)>0) { ?>
                        <?php  ($row=mysqli_fetch_array($result)) ?>
                      <div class="col-md-12">
                        <div class="col-sm-12">
                          <div style="MARGIN-RIGHT: 50PX;MARGIN-LEFT: 50PX;">
                            <p style="text-align:justify"><?php echo $row['des']; ?></p><hr>
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

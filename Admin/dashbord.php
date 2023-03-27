<!DOCTYPE html>
<html lang="en">
 <?php @include("include/secureConfig.php"); $page_title = "profile"; ?>
  <head>
    <?php @include("include/head.php"); ?>
  </head>
    <body>
      <div class="container-scroller">
      <?php @include("include/navbar.php"); ?>
        <div class="container-fluid page-body-wrapper">
        <?php @include("include/sidebar.php"); ?>
          <div class="main-panel">
            <div class="content-wrapper">
              <div class="row page-title-header">
                <?php include ("include/alert_msg.php"); ?>
                <div class="col-12" style="margin-top: 10px;">
                  <div class="page-header">
                    <h4 class="page-title">Profile </h4>
                  </div>
                </div>
              </div>
              <div class="row">         
                <div class="col-md-12 grid-margin">
                  <div class="card">
                    <div class="card-body">
                      <?php $result=$qm->getRecord("profile");   
                        $row=mysqli_fetch_array($result);?>
                        <center><img class="rounded-circle" src="<?php echo $row["img"]=='' ? PROFILE_URL.'noimg.png' : (file_exists(UPLOAD_PROFILE_URL.$row["img"]) ? PROFILE_URL.$row["img"] :  PROFILE_URL.'noimg.png'); ?>" alt="profile image" style="width:12%"></center>
                        <h4>Name  :  <b><?php echo $row["nm"];?></b></h4>
                        <h4>Email Address : <b> <?php echo $row["eml"];?></h4>
                        <h4>Mobile : <b> <?php echo $row["mob"];?></h4>
                        <h4>Address : <b> <?php echo $row["addr"];?></h4>
                        <center><a href="dashbord_update.php" class="btn btn-primary">Update</a></center>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php @include("include/footer.php");?>
          </div>
        </div>      
      </div>
    <?php @include("include/footer-script.php");?>
   </body>
</html>
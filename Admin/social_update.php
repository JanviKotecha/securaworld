<!DOCTYPE html>
<html lang="en">
<?php @include("include/secureConfig.php");
$page_title="social";
if(isset($_POST['update'])){
  $in=$_POST['in'];
  $fac=$_POST['fb'];
  $youtb=$_POST['youtb'];
  $tw=$_POST['tw'];

  $tw = addslashes($tw); 
  $in = addslashes($in);  
  $fac = addslashes($fac); 
  $youtb = addslashes($youtb); 
  $sel=$qm->getRecord("social","*","id=1"); 
  if(mysqli_num_rows($sel) > 0){
    $result=mysqli_fetch_array($sel);
  }  
  $res=$qm->updateRecord("social","insta='".$in."',fb='".$fac."',youtb='".$youtb."',twit='".$tw."'","id=1");
  $_SESSION['alert_msg'] .= "<div class='msg_success'>Social link updated successfully.</div>";
  header("location:social.php");
  exit;
  }
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
            <div class="row page-title-header">
              <div class="col-12">
                <div class="page-header">
                  <h5><a href="social.php" style="text-decoration: none;color: black;">Social Link&nbsp;</a> <i class="fa fa-chevron-right"></i> Update Social Link</h5>
                  <a href="social.php" class="btn btn-primary" style="margin-left: auto !important;">Back</a>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <form class="form-sample" action="" method="Post" enctype="multipart/form-data">   
                      <p class="card-description"><b><center>Update Social Link </center></p>
                      <?php 
                        $result=$qm->getRecord("social","*","id=1");
                        if ($result->num_rows > 0) {
                          $row = $result->fetch_assoc(); ?>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Insta</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" name="in" value="<?php echo $row["insta"];?>" />
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Facebook</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" name="fb" value="<?php echo $row["fb"];?>" />
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Youtube</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" name="youtb" value="<?php echo $row["youtb"];?>" />
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Twitter</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" name="tw" value="<?php echo $row["twit"];?>" />
                                </div>
                              </div>
                              <br/><button type="submit" name="update"  class="btn btn-primary">Update</button>
                            </div>
                          </div>
                        <?php }  
                      ?>
                    </form>
                  </div>
                </div>
              </div>   
            </div>
          </div>
          <?php @include("include/footer.php");?>
        </div>
        <?php @include("include/footer-script.php");?> 
      </div>
    </div>
  </body>
</html>
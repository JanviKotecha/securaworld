<!DOCTYPE html>
<html lang="en">
  <?php @include("include/secureConfig.php");
  $page_title = "social_team";
  if(isset($_POST['add_social_team']))
  {
    if(!empty($_POST['ins']) && !empty($_POST['eml']) && !empty($_POST['fb']) && !empty($_POST['nm']) && !empty($_POST['desig']) &&  !empty($_POST['desc'])) {
      $image=$_FILES['image']['name'];
      $des=addslashes($_POST['desc']);
      $nm=addslashes($_POST['nm']);
      $desig=addslashes($_POST['desig']);
      $insta=addslashes($_POST['ins']);
      $fb=addslashes($_POST['fb']);
      $email=addslashes($_POST['eml']);
      $insert=$qm->insertRecordReturn("social_team","nm,desig,post,ins,fb,eml","'".$nm."','".$desig."','".$des."','".$insta."','".$fb."','".$email."'");

      if(isset($_FILES['image']['tmp_name']) && !empty($_FILES['image']['tmp_name'])){
        $supported_image = array('jpg','jpeg','png');  
        $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
        $Img = time().".".$ext;
        if (in_array($ext, $supported_image) ) {
          $qm->updateRecord("social_team","img='".$Img."'","id=".$insert);
          move_uploaded_file($_FILES["image"]["tmp_name"],UPLOAD_SOCIALTEAM_URL.$Img);
          $_SESSION['alert_msg'] .= "<div class='msg_success'>Social team added successfully.</div>";
          header("location:social_team.php");
          exit;  
        }
        else{
          echo "<script>alert('Image is not formeted');history.back();</script>";
        exit; } 
      }
      $_SESSION['alert_msg'] .= "<div class='msg_success'>Social team added successfully.</div>";
      header("location:social_team.php");
      exit;          
    } else {
      echo "<script>alert('Plese fill all the details');history.back();</script>";
    exit; }
  }

?>
  <head>
    <?php include("include/head.php");?>
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
                  <h5><a href="social_team.php" style="text-decoration: none;color: black;">Social Team&nbsp;</a> <i class="fa fa-chevron-right"></i> Add Social Team</h5>
                  <a href="social_team.php" class="btn btn-primary" style="margin-left: auto !important;">Back</a>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <form class="form-sample" action="" method="Post" enctype="multipart/form-data"> 
                      <p class="card-description"><b><CENTER>Add Social Team</CENTER></p>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                              <input type="file" class="form-control" name="image" id="image" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="nm" required />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Dasignation</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="desig" required />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Insta</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="ins" required />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Facebook</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="fb" required />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                              <input type="email" class="form-control" name="eml" required />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-12">
                              <textarea class="form-control" name="desc" style=" float: left;width: 100%;min-height: 75px;outline: none; resize: none;"></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                      <center>
                        <button type="submit" name="add_social_team"  class="btn btn-primary">Add</button>&nbsp;&nbsp;&nbsp;
                        <input type="reset"   class="btn btn-danger" value="Reset">
                      </center>
                    </form>
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

<!DOCTYPE html>
<html lang="en">
<?php @include("include/secureConfig.php");
  $page_title = "icon";
  if(isset($_POST['add_icon']))
  {
    $link = $_POST['lin'];
    $link = addslashes($link);

    if(!empty($_FILES['image']['name']) && !empty($_POST['lin'])) {
      $image=$_FILES['image']['name'];
      $supported_image = array('gif','jpg','jpeg','png');  
      $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
      $Img = time().".".$ext; 
      if (in_array($ext, $supported_image)) {
        $insert=$qm->insertRecord("icon","img,link","'".$Img."','".$link."'");
        move_uploaded_file($_FILES["image"]["tmp_name"],UPLOAD_ICON_URL.$Img);
        $_SESSION['alert_msg'] .= "<div class='msg_success'>Image added successfully.</div>";
        header("location:icon.php");
        exit;  
      }
      else {
        echo "<script>alert('Image is not formeted');history.back();</script>";
      exit; }          
    } else {
      echo "<script>alert('Please fill all the detail');history.back();</script>";
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
                  <h5><a href="icon.php" style="text-decoration: none;color: black;">Icon&nbsp;</a> <i class="fa fa-chevron-right"></i> Add Icon</h5>
                  <a href="icon.php" class="btn btn-primary" style="margin-left: auto !important;">Back</a>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <form class="form-sample" action="" method="Post" enctype="multipart/form-data"> 
                      <p class="card-description"><b><CENTER>Add Icon</CENTER></p>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                              <input type="file" class="form-control" name="image" id="image" required/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Link</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="lin" id="lin" required/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <center>
                        <button type="submit" name="add_icon"  class="btn btn-primary">Add</button>&nbsp;&nbsp;&nbsp;
                        <input type="reset" class="btn btn-danger" value="Reset">
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
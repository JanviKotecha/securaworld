<!DOCTYPE html>
<html lang="en">
<?php @include("include/secureConfig.php");
  $page_title = "gallery";
  if(isset($_POST['add_gall']))
  {
    if(!empty($_POST['catid']) && !empty($_FILES['image']['name'])) {
      $image=$_FILES['image']['name'];
      $catid=$_POST['catid']; 
      $supported_image = array('gif','jpg','jpeg','png');  
      $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
      $Img = time().".".$ext; 
      if (in_array($ext, $supported_image)) {
        $insert=$qm->insertRecord("gallery","image,category","'".$Img."','".$catid."'");
        move_uploaded_file($_FILES["image"]["tmp_name"],UPLOAD_GALLERY_URL.$Img);
        $_SESSION['alert_msg'] .= "<div class='msg_success'>Image added successfully.</div>";
        header("location:gallery.php");
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
                  <h5><a href="gallery.php" style="text-decoration: none;color: black;">Gallery&nbsp;</a> <i class="fa fa-chevron-right"></i> Add Gallery</h5>
                  <a href="gallery.php" class="btn btn-primary" style="margin-left: auto !important;">Back</a>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <form class="form-sample" action="" method="Post" enctype="multipart/form-data"> 
                      <p class="card-description"><b><CENTER>Add Gallery</CENTER></p>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Category</label>
                            <div class="col-sm-9">
                              <select class="form-control" id="catid" name="catid">
                                <option value="">Select Category</option>
                                <?php 
                                  $records=$qm->getRecord("gallery_category");
                                  if (mysqli_num_rows($records)>0) {
                                    while($data = mysqli_fetch_array($records)){
                                    echo "<option value='". $data['id'] ."'>" .$data['category']."</option>";
                                  } }
                                ?>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                              <input type="file" class="form-control" name="image" id="image" required/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <center>
                        <button type="submit" name="add_gall"  class="btn btn-primary">Add</button>&nbsp;&nbsp;&nbsp;
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
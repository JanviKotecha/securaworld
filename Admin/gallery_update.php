<DOCTYPE html>
<?php @include("include/secureConfig.php"); 
  $page_title = "gallery";
  if(isset($_POST['update'])) {
    if($_POST['catid'] != 0) {
      $id=$_POST['id'];   
      $catid=$_POST['catid'];
      if(isset($_FILES['image']['tmp_name']) && !empty($_FILES['image']['tmp_name'])){
        $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $allowd = array("jpg","png","jpeg","gif");
        $Img = time().".".$ext;
        if(in_array($ext,$allowd)) {
          $sel=$qm->getRecord("gallery","image","id=".$id);
          if(mysqli_num_rows($sel) > 0){
            $result=mysqli_fetch_array($sel);
            unlink(UPLOAD_GALLERY_URL.$result['image']);
          }
          move_uploaded_file($_FILES['image']['tmp_name'],UPLOAD_GALLERY_URL.$Img);
          $res=$qm->updateRecord("gallery","image='".$Img."',category='".$catid."'","id=".$id);
          $_SESSION['alert_msg'] .= "<div class='msg_success'>Gallery updated successfully.</div>";
          header("location:gallery.php");
          exit;  
        }
        else{
        echo "<script>alert('Image is not formeted');history.back();</script>";
        exit;           
        }
      }
      else{
        $res=$qm->updateRecord("gallery","category='".$catid."'","id=".$id);
        $_SESSION['alert_msg'] .= "<div class='msg_success'>Gallery updated successfully.</div>";
        header("location:gallery.php");
        exit;  
      }
    } else {
      echo "<script>alert('Please select the category');history.back();</script>";
      exit; } 
  }
  if(isset($_GET['id']))
  {
    $id=$_GET['id'];
    $res = $qm->getRecord("gallery","image,category","id=".$id);
    if(mysqli_num_rows($res) > 0) {
      $row = mysqli_fetch_array($res);
    } else {
      $_SESSION['alert_msg'] .= "<div class='msg_error'>Somthing wrong.</div>";
      header("location:gallery.php");
      exit;
    } 
  } else {
    $_SESSION['alert_msg'] .= "<div class='msg_error'>Somthing wrong.</div>";
    header("location:gallery.php");
    exit;
  }
?>
<html lang="en">
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
                  <h5><a href="gallery.php" style="text-decoration: none;color: black;">Gallery&nbsp;</a> <i class="fa fa-chevron-right"></i> Update Gallery</h5>
                  <a href="gallery.php" class="btn btn-primary" style="margin-left: auto !important;">Back</a>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <form class="form-sample" action="" method="Post" enctype="multipart/form-data">      
                      <p class="card-description"><center><b>Update Gallery</b></p>
                      <input type="hidden" name="id" class="txtField" value="<?php echo $id; ?>">
                      <div class="row">
                        <div class="col-md-5">
                          <div class="form-group row">
                            <div class="col-sm-12">
                              <center><img src="<?php echo $row["image"]=='' ? GALLERY_URL.'noimg.png' : (file_exists(UPLOAD_GALLERY_URL.$row["image"]) ? GALLERY_URL.$row["image"] :  GALLERY_URL.'noimg.png'); ?>" style="width:60%"></center>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-7">
                          <div class="col-md-12"> &nbsp;</div>
                          <div class="col-md-12">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Image</label>
                              <div class="col-sm-9">
                                <input type="file" class="form-control" name="image" id="image" />
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Category</label>
                              <div class="col-sm-9">
                                <select class="form-control" id="catid" name="catid" required>
                                <option disabled value="0">Select Category</option>
                                <?php 
                                  $records=$qm->getRecord("gallery_category");
                                  if (mysqli_num_rows($records)>0) {
                                    while($data = mysqli_fetch_array($records)){ ?>
                                     <option value="<?php echo $data['id']; ?>" <?php echo ($data['id'] == $row['category'] ? 'Selected' : ''); ?> >
                                      <?php echo $data['category']; ?></option>
                                  <?php } }
                                ?>
                              </select> 
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <button type="submit" name="update" class="btn btn-primary">Update </button> &nbsp; &nbsp;
                            <input type="reset" name="reset" class="btn btn-danger" value="Reset"> &nbsp; &nbsp;
                          </div>
                        </div>
                      </div>
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
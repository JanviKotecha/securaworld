<DOCTYPE html>
<?php @include("include/secureConfig.php"); 
  $page_title = "imge";
  if(isset($_POST['update'])) {
    if($_POST['catid'] != 0 && !empty($_POST['tit'])) {
      $id=$_POST['id'];   
      $catid=$_POST['catid'];
      $tit=$_POST['tit'];
      if(isset($_FILES['image']['tmp_name']) && !empty($_FILES['image']['tmp_name'])){
        $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $allowd = array("jpg","png","jpeg");
        $Img = time().".".$ext;
        if(in_array($ext,$allowd)) {
          $sel=$qm->getRecord("image","img","id=".$id);
          if(mysqli_num_rows($sel) > 0){
            $result=mysqli_fetch_array($sel);
            unlink(UPLOAD_IMG_URL.$result['image']);
          }
          move_uploaded_file($_FILES['image']['tmp_name'],UPLOAD_IMG_URL.$Img);
          $qm->updateRecord("image","img='".$Img."',tit='".$tit."',imgcat='".$catid."'","id=".$id);
          $_SESSION['alert_msg'] .= "<div class='msg_success'>image updated successfully.</div>";
          header("location:img.php");
          exit;  
        }
        else{
        echo "<script>alert('Image is not formeted');history.back();</script>";
        exit;           
        }
      }
      else{
        $qm->updateRecord("image","tit='".$tit."',imgcat='".$catid."'","id=".$id);
        $_SESSION['alert_msg'] .= "<div class='msg_success'>image updated successfully.</div>";
        header("location:img.php");
        exit;  
      }
    } else {
      echo "<script>alert('Please fill all the detail');history.back();</script>";
      exit; } 
  }
  if(isset($_GET['id']))
  {
    $id=$_GET['id'];
    $res = $qm->getRecord("image","*","id=".$id);
    if(mysqli_num_rows($res) > 0) {
      $row = mysqli_fetch_array($res);
    } else {
      $_SESSION['alert_msg'] .= "<div class='msg_error'>Somthing wrong.</div>";
      header("location:img.php");
      exit;
    } 
  } else {
    $_SESSION['alert_msg'] .= "<div class='msg_error'>Somthing wrong.</div>";
    header("location:img.php");
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
                  <h5><a href="img.php" style="text-decoration: none;color: black;">Image&nbsp;</a> <i class="fa fa-chevron-right"></i> Update Image</h5>
                  <a href="img.php" class="btn btn-primary" style="margin-left: auto !important;">Back</a>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <form class="form-sample" action="" method="Post" enctype="multipart/form-data">      
                      <p class="card-description"><center><b>Update Image</b></p>
                      <input type="hidden" name="id" class="txtField" value="<?php echo $id; ?>">
                      <div class="row">
                        <div class="col-md-5">
                          <div class="form-group row">
                            <div class="col-sm-12">
                              <center><img src="<?php echo $row["img"]=='' ? IMG_URL.'noimg.png' : (file_exists(UPLOAD_IMG_URL.$row["img"]) ? IMG_URL.$row["img"] :  IMG_URL.'noimg.png'); ?>" style="width:60%"></center>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-7">
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
                                <option value="1" <?php echo $row['imgcat'] == '1' ? 'Selected' : '' ?>>App</option>
                                <option value="2" <?php echo $row['imgcat'] == '2' ? 'Selected' : '' ?>>Card</option>
                                <option value="3" <?php echo $row['imgcat'] == '3' ? 'Selected' : '' ?>>Web</option>
                              </select> 
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Title</label>
                              <div class="col-sm-9">
                                <input type="text" name="tit" class="form-control" value="<?php echo $row['tit']; ?>" required>
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
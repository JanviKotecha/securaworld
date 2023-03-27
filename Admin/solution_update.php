<DOCTYPE html>
<?php @include("include/secureConfig.php"); 
  $page_title = "slider";
  if(isset($_POST['update'])) {
    if(!empty($_POST['lintyp']) && !empty($_POST['link']) && !empty($_POST['tit']) && !empty($_POST['desc'])) {
      $id=$_POST['id'];
      $image=$_FILES['image']['name'];
      $tit=addslashes($_POST['tit']);
      $des=addslashes($_POST['desc']);
      $link=addslashes($_POST['link']);
      $lintyp=addslashes($_POST['lintyp']);
      $qm->updateRecord("slider","tit='".$tit."',des='".$des."',link='".$link."',lintyp='".$lintyp."'","id=".$id); 
      
      if(isset($_FILES['image']['tmp_name']) && !empty($_FILES['image']['tmp_name'])){
        $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $allowd = array("jpg","png","jpeg","gif");
        $Img = time().".".$ext;
        if(in_array($ext,$allowd)) {
          $sel=$qm->getRecord("slider","img","id=".$id);
          if(mysqli_num_rows($sel) > 0){
            $result=mysqli_fetch_array($sel);
            unlink(UPLOAD_SLIDER_URL.$result['img']);
          }
          move_uploaded_file($_FILES['image']['tmp_name'],UPLOAD_SLIDER_URL.$Img);
          $qm->updateRecord("slider","img='".$Img."'","id=".$id);
          $_SESSION['alert_msg'] .= "<div class='msg_success'>Slider updated successfully.</div>";
          header("location:slider.php");
          exit;  
        }
        else{
        echo "<script>alert('Image is not formeted');history.back();</script>";
        exit;           
        }
      }
      $_SESSION['alert_msg'] .= "<div class='msg_success'>Slider updated successfully.</div>";
      header("location:slider.php");
      exit;  
  } else {
    echo "<script>alert('Please select the category');history.back();</script>";
    exit; } 
  }  
  if(isset($_GET['id']))
  {
    $id=$_GET['id'];
    $res = $qm->getRecord("slider","*","id=".$id);
    if(mysqli_num_rows($res) > 0) {
      $row = mysqli_fetch_array($res);
    } else {
      $_SESSION['alert_msg'] .= "<div class='msg_error'>Data can't be found.</div>";
      header("location:slider.php");
      exit;
    } 
  } else {
    $_SESSION['alert_msg'] .= "<div class='msg_error'>Data can't be found.</div>";
    header("location:slider.php");
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
                  <h5><a href="slider.php" style="text-decoration: none;color: black;">Slider&nbsp;</a> <i class="fa fa-chevron-right"></i> Update Slider Image</h5>
                  <a href="slider.php" class="btn btn-primary" style="margin-left: auto !important;">Back</a>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <form class="form-sample" action="" method="Post" enctype="multipart/form-data"> 
                      <p class="card-description"><b><CENTER>Update Slider Image</CENTER></p>
                      <input type="hidden" name="id" class="txtField" value="<?php echo $id; ?>">
                      <div class="row">
                        <div class="col-md-5">
                          <div class="form-group row">
                            <div class="col-sm-12">
                              <center><img src="<?php echo $row["img"]=='' ? SLIDER_URL.'noimg.png' : (file_exists(UPLOAD_SLIDER_URL.$row["img"]) ? SLIDER_URL.$row["img"] :  SLIDER_URL.'noimg.png'); ?>" style="width:100%"></center>
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
                              <label class="col-sm-3 col-form-label">Title</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" name="tit" value="<?php echo $row['tit']; ?>" required />
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Link</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" value="<?php echo $row['link']; ?>" name="link" required />
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Link Type</label>
                              <div class="col-sm-9">
                                <input type="radio" name="lintyp" <?php echo $row['lintyp'] == 'Inner' ? 'checked="checked"' : ''; ?> value="Inner"> Inner
                                <input type="radio" name="lintyp" <?php echo $row['lintyp'] == 'Outer' ? 'checked="checked"' : ''; ?> value="Outer"> Outer
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Description</label>
                              <div class="col-sm-12">
                                <textarea class="form-control"  name="desc" style=" float: left;width: 100%;min-height: 75px;outline: none; resize: none;"><?php echo $row['des']; ?></textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <center><br/><button type="submit" name="update"  class="btn btn-primary">Update</button>
                      <button type="submit" name="reset"  class="btn btn-danger">Reset</button>
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
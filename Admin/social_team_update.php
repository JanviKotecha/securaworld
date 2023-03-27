<DOCTYPE html>
<?php @include("include/secureConfig.php"); 
  $page_title = "social_team";
  if(isset($_POST['update'])) {
    if(!empty($_POST['ins']) && !empty($_POST['eml']) && !empty($_POST['fb']) &&!empty($_POST['nm']) && !empty($_POST['desig']) && !empty($_POST['desc'])) {
      $id=$_POST['id'];
      
      $image=$_FILES['image']['name'];
      $des=addslashes($_POST['desc']);
      $nm=addslashes($_POST['nm']);
      $desig=addslashes($_POST['desig']);
      $insta=addslashes($_POST['ins']);
      $fb=addslashes($_POST['fb']);
      $email=addslashes($_POST['eml']);

      $qm->updateRecord("social_team","nm='".$nm."',desig='".$desig."',post='".$des."',ins='".$insta."',fb='".$fb."',eml='".$email."'","id=".$id);
      
      if(isset($_FILES['image']['tmp_name']) && !empty($_FILES['image']['tmp_name'])){
        $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $allowd = array("jpg","png","jpeg","gif");
        $Img = time().".".$ext;
        if(in_array($ext,$allowd)) {
          $sel=$qm->getRecord("social_team","img","id=".$id);
          if(mysqli_num_rows($sel) > 0){
            $result=mysqli_fetch_array($sel);
            unlink(UPLOAD_SOCIALTEAM_URL.$result['img']);
          }
          move_uploaded_file($_FILES['image']['tmp_name'],UPLOAD_SOCIALTEAM_URL.$Img);
          $qm->updateRecord("social_team","img='".$Img."'","id=".$id);
          $_SESSION['alert_msg'] .= "<div class='msg_success'>Social Team updated successfully.</div>";
          header("location:social_team.php");
          exit;  
        }
        else{
        echo "<script>alert('Image is not formeted');history.back();</script>";
        exit;           
        }
      } 
      $_SESSION['alert_msg'] .= "<div class='msg_success'>Social Team updated successfully.</div>";
      header("location:social_team.php");
      exit;  
    } else {
    echo "<script>alert('Please Fill all the detail');history.back();</script>";
    exit; } 
  }  
  if(isset($_GET['id']))
  {
    $id=$_GET['id'];
    $res = $qm->getRecord("social_team","*","id=".$id);
    if(mysqli_num_rows($res) > 0) {
      $row = mysqli_fetch_array($res);
    } else {
      $_SESSION['alert_msg'] .= "<div class='msg_error'>Data can't be found.</div>";
      header("location:social_team.php");
      exit;
    } 
  } else {
    $_SESSION['alert_msg'] .= "<div class='msg_error'>Data can't be found.</div>";
    header("location:social_team.php");
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
                  <h5><a href="social_team.php" style="text-decoration: none;color: black;">Social Team&nbsp;</a> <i class="fa fa-chevron-right"></i> Update Social Team </h5>
                  <a href="social_team.php" class="btn btn-primary" style="margin-left: auto !important;">Back</a>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <form class="form-sample" action="" method="Post" enctype="multipart/form-data"> 
                      <p class="card-description"><b><CENTER>Update Social Team </CENTER></p>
                      <input type="hidden" name="id" class="txtField" value="<?php echo $id; ?>">
                      <div class="row">
                        <div class="col-md-5">
                          <div class="form-group row">
                            <div class="col-sm-12">
                              <center><img src="<?php echo $row["img"]=='' ? SOCIALTEAM_URL.'noimg.png' : (file_exists(UPLOAD_SOCIALTEAM_URL.$row["img"]) ? SOCIALTEAM_URL.$row["img"] :  SOCIALTEAM_URL.'noimg.png'); ?>" style="width:100%"></center>
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
                              <label class="col-sm-3 col-form-label">Name</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" name="nm" value="<?php echo $row['nm']; ?>" required />
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Dasignation</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" value="<?php echo $row['desig']; ?>" name="desig" required />
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Insta</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" value="<?php echo $row['ins']; ?>" name="ins" required />
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Facebook</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" value="<?php echo $row['fb']; ?>" name="fb" required />
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Email</label>
                              <div class="col-sm-9">
                                <input type="email" class="form-control" value="<?php echo $row['eml']; ?>" name="eml" required />
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Description</label>
                              <div class="col-sm-12">
                                <textarea class="form-control"  name="desc" style=" float: left;width: 100%;min-height: 75px;outline: none; resize: none;"><?php echo $row['post']; ?></textarea>
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
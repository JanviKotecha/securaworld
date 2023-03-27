<!DOCTYPE html>
<html lang="en">
<?php @include("include/secureConfig.php"); $page_title = "Home"; ?>
<?php
  if(isset($_POST['update'])) {
    $name=$_POST['fname'];
    $email=$_POST['em'];
    $mobile=$_POST['mob'];
    $address=$_POST['add'];
    
    $name = addslashes($name); 
    $email = addslashes($email); 
    $address = addslashes($address); 

    if(isset($_FILES['image']['tmp_name']) && !empty($_FILES['image']['tmp_name'])){
      $image=$_FILES['image']['name'];
      $ext=strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
      $allowd = array("jpg","png","jpeg","gif");
      $cusINm = time().".".$ext;

      if(in_array($ext,$allowd)){
        move_uploaded_file($_FILES['image']['tmp_name'],UPLOAD_PROFILE_URL.$cusINm);
        $sel=$qm->getRecord("profile","img","id=1"); 
        if(mysqli_num_rows($sel) > 0){
          $result=mysqli_fetch_array($sel);
          unlink(UPLOAD_PROFILE_URL.$result['img']);
        }  
        $res=$qm->updateRecord("profile","nm='".$name."',eml='".$email."',mob='".$mobile."',addr='".$address."',img='".$cusINm."'","id=1");
        $_SESSION['alert_msg'] .= "<div class='msg_success'>Profile updated successfully.</div>";
        header("location:dashbord.php");
        exit;
      } 
      else
      {
        echo "<script>alert('Image is not formeted');history.back();</script>";
        exit;
      }     
    }
    else{
      $res=$qm->updateRecord("profile","nm='".$name."',eml='".$email."',mob='".$mobile."',addr='".$address."'","id=1");
      $_SESSION['alert_msg'] .= "<div class='msg_success'>Profile updated successfully.</div>";
      header("location:dashbord.php");
      exit;
    }
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
                  <h5><a href="dashbord.php" style="text-decoration: none;color: black;">Profile&nbsp;</a> <i class="fa fa-chevron-right"></i> Update Profile </h5>
                  <a href="dashbord.php" class="btn btn-primary" style="margin-left: auto !important;">Back</a>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <form class="form-sample" action="" method="Post" enctype="multipart/form-data">   
                      <p class="card-description"><b><center>Personal info </center></p>
                      <?php 
                        $result=$qm->getRecord("profile","*","id=1");
                        if ($result->num_rows > 0) {
                          $row = $result->fetch_assoc(); ?>
                          <div class="row">
                            <div class="col-md-3">
                              <div class="form-group row">
                                <div class="col-sm-12">
                                 <CENTER><img class="rounded-circle" src="<?php echo $row["img"]=='' ? PROFILE_URL.'noimg.png' : (file_exists(UPLOAD_PROFILE_URL.$row["img"]) ? PROFILE_URL.$row["img"] :  PROFILE_URL.'noimg.png'); ?>" alt="profile image" style="width:80%"></CENTER>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="col-md-12">
                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">Name</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" name="fname" value="<?php echo $row["nm"];?>" />
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-12">
                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">Email Address</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" name="em" value="<?php echo $row["eml"];?>" />
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-12">
                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">Mobile</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" name="mob" value="<?php echo $row["mob"];?>" />
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-12">
                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">Address</label>
                                  <div class="col-sm-9">
                                    <input type="text-Area" class="form-control" name="add" value="<?php echo $row["addr"];?>" />
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-12">
                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">Image</label>
                                  <div class="col-sm-9">
                                    <input type="file" name="image" id="image" value="<?php echo $row["img"];?>" >
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <CENTER><button type="submit" name="update"  class="btn btn-primary">Update</button></CENTER>
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
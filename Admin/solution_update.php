<DOCTYPE html>
<?php @include("include/secureConfig.php"); 
  $page_title = "solution";
  if(isset($_POST['update'])) {
    if(!empty($_POST['tit']) && !empty($_POST['desc']) && !empty($_POST['ldesc'])) {
      $id=$_POST['id'];
      $image=$_FILES['image']['name'];
      $tit=addslashes($_POST['tit']);
      $des=addslashes($_POST['desc']);
      $ldesc=addslashes($_POST['ldesc']);
      $qm->updateRecord("solution","tit='".$tit."',des='".$des."',ldesc='".$ldesc."'","id=".$id); 
      
      if(isset($_FILES['image']['tmp_name']) && !empty($_FILES['image']['tmp_name'])){
        $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $allowd = array("jpg","png","jpeg","gif");
        $Img = time().".".$ext;
        if(in_array($ext,$allowd)) {
          $sel=$qm->getRecord("solution","img","id=".$id);
          if(mysqli_num_rows($sel) > 0){
            $result=mysqli_fetch_array($sel);
            unlink(UPLOAD_SOLUTION_URL.$result['img']);
          }
          move_uploaded_file($_FILES['image']['tmp_name'],UPLOAD_SOLUTION_URL.$Img);
          $qm->updateRecord("solution","img='".$Img."'","id=".$id);
          $_SESSION['alert_msg'] .= "<div class='msg_success'>solution updated successfully.</div>";
          header("location:solution.php");
          exit;  
        }
        else{
        echo "<script>alert('Image is not formeted');history.back();</script>";
        exit;           
        }
      }
      $_SESSION['alert_msg'] .= "<div class='msg_success'>solution updated successfully.</div>";
      header("location:solution.php");
      exit;  
  } else {
    echo "<script>alert('Value is empty');history.back();</script>";
    exit; } 
  }  

  if(isset($_GET['id']))
  {
    if($_GET['id']!='')
    {
      if(is_numeric($_GET['id']))
      {
        $id=$_GET['id'];
        $res = $qm->getRecord("solution","*","id=".$id);
        if(mysqli_num_rows($res) > 0) {
          $row = mysqli_fetch_array($res);
        } else {
          $_SESSION['alert_msg'] .= "<div class='msg_error'>Data can't be found.</div>";
          header("location:solution.php");
          exit;
        } 
      } else {
      $_SESSION['alert_msg'] .= "<div class='msg_error'>Only numeric value required.</div>";
      header("location:solution.php");
      exit;
    }
    } else {
      $_SESSION['alert_msg'] .= "<div class='msg_error'>Data can't be found.</div>";
      header("location:solution.php");
      exit;
    }
  }
  else {
  $_SESSION['alert_msg'] .= "<div class='msg_error'>Data can't be found.</div>";
  header("location:solution.php");
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
                  <h5><a href="solution.php" style="text-decoration: none;color: black;">solution&nbsp;</a> <i class="fa fa-chevron-right"></i> Update solution Image</h5>
                  <a href="solution.php" class="btn btn-primary" style="margin-left: auto !important;">Back</a>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <form class="form-sample" action="" method="Post" enctype="multipart/form-data"> 
                      <p class="card-description"><b><CENTER>Update solution Image</CENTER></p>
                      <input type="hidden" name="id" class="txtField" value="<?php echo $id; ?>">
                      <div class="row">
                        <div class="col-md-5">
                          <div class="form-group row">
                            <div class="col-sm-12">
                              <center><img src="<?php echo $row["img"]=='' ? SOLUTION_URL.'noimg.png' : (file_exists(UPLOAD_SOLUTION_URL.$row["img"]) ? SOLUTION_URL.$row["img"] :  SOLUTION_URL.'noimg.png'); ?>" style="width:100%"></center>
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
                              <label class="col-sm-3 col-form-label">Short Description</label>
                              <div class="col-sm-12">
                                <textarea class="form-control"  name="desc" style=" float: left;width: 100%;min-height: 75px;outline: none; resize: none;"><?php echo $row['des']; ?></textarea>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Long Description</label>
                            <div class="col-sm-12">
                              <script src="//cdn.ckeditor.com/4.5.5/standard/ckeditor.js"></script>
                              <textarea class="form-control" id="ck" name="ldesc" style=" float: left;width: 100%;min-height: 75px;outline: none; resize: none;"><?php echo $row['ldesc']; ?></textarea>
                              <script>
                                CKEDITOR.replace( 'ck' );
                              </script>
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
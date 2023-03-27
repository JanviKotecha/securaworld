<DOCTYPE html>
<?php @include("include/secureConfig.php"); 
  $page_title = "blog";
  if(isset($_POST['update'])){
    $id=$_POST['id'];
    $cate=addslashes($_POST['cate']);
    $sel=$qm->getRecord("blog_cate","*","id=".$id);
    if(mysqli_num_rows($sel) > 0){
      $result=mysqli_fetch_array($sel);
    }
    $res=$qm->updateRecord("blog_cate","cate='".$cate."'","id=".$id);
    $_SESSION['alert_msg'] .= "<div class='msg_success'>Category updated Successfully.</div>";
    header("location:blog_cate.php");
    exit;  
  } 
  if(isset($_GET['id']))
  {
    $id=$_GET['id'];
    $res = $qm->getRecord("blog_cate","*","id=".$id);
    if(mysqli_num_rows($res) > 0) {
      $row = mysqli_fetch_array($res);
    } else {
      $_SESSION['alert_msg'] .= "<div class='msg_error'>Data can't be found.</div>";
      header("location:blog_cate.php");
      exit;
    } 
  } else {
    $_SESSION['alert_msg'] .= "<div class='msg_error'>Data can't be found.</div>";
    header("location:blog_cate.php");
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
        <!-- partial:../../partials/_sidebar.html -->
        <?php include("include/sidebar.php");?>
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row page-title-header">
              <div class="col-12">
                <div class="page-header">
                  <h5><a href="blog_cate.php" style="text-decoration: none;color: black;">Blog Category&nbsp;</a> <i class="fa fa-chevron-right"></i> Update Blog Category </h5>
                  <a href="blog_cate.php" class="btn btn-primary" style="margin-left: auto !important;">Back</a>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <form class="form-sample" action="" method="Post" enctype="multipart/form-data"> 
                      <p class="card-description"><b><CENTER>Update Blog Category</CENTER></p>
                      <input type="hidden" name="id" class="txtField" value="<?php echo $id; ?>">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Category</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="cate" value="<?php echo $row['cate']; ?>" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <center><br/><button type="submit" name="update"  class="btn btn-primary">Update</button>
                          <input type="reset" name="" class="btn btn-danger" value="Reset">
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
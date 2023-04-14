<!DOCTYPE html>
<html lang="en">
<?php @include("include/secureConfig.php");
  $page_title = "product_cate";
  if(isset($_POST['add']))
  {
    if(!empty($_POST['cate']) && isset($_FILES['image']['tmp_name']) && !empty($_FILES['image']['tmp_name'])){
    $cate=addslashes($_POST['cate']);
    $image=$_FILES['image']['name'];
    $supported_image = array('gif','jpg','jpeg','png');  
      $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
      $Img = time().".".$ext;
      if (in_array($ext, $supported_image)) {
      move_uploaded_file($_FILES["image"]["tmp_name"],UPLOAD_PRODUCT_URL.$Img);
      $insert=$qm->insertRecordReturn("product_cate","categoryName,img,creationDate","'".$cate."','".$Img."','".$getDt."'");
      $_SESSION['alert_msg'] .= "<div class='msg_success'>Category added Successfully.</div>";
      header("location:product_cate.php");
      exit;
    }
    else{
      echo "<script>alert('Image is not formeted');history.back();</script>";
      exit;
    } 
  
  $_SESSION['alert_msg'] .= "<div class='msg_success'>Category added successfully.</div>";
  header("location:product_cate.php");
  exit;         
} else {
  echo "<script>alert('Plese fill all the detail');history.back();</script>";
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
                  <h5><a href="product_cate.php" style="text-decoration: none;color: black;">Product Category&nbsp;</a> <i class="fa fa-chevron-right"></i> Add Product Category</h5>
                  <a href="product_cate.php" class="btn btn-primary" style="margin-left: auto !important;">Back</a>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <form class="form-sample" action="" method="Post" enctype="multipart/form-data"> 
                      <p class="card-description"><b><CENTER>Add Product Category</CENTER></p>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Category</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="cate" required/>
                            </div>
                          </div>
                        </div>
                       
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Category Image</label>
                            <div class="col-sm-9">
                              <input type="file" class="form-control" name="image" id="image" required/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <center><br/><button type="submit" name="add"  class="btn btn-primary">Add</button>
                          <input type="reset" class="btn btn-danger" value="Reset"></center>
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
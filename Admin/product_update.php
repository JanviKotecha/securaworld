<DOCTYPE html>
<?php @include("include/secureConfig.php"); 
  $page_title = "product";
  if(isset($_POST['update'])){
    $id=$_POST['id'];   
    $title=$_POST['tit'];
    $title= addslashes($title); 

    if(isset($_FILES['image']['tmp_name']) && !empty($_FILES['image']['tmp_name'])){
      $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
      $allowd = array("jpg","png","jpeg","gif");
      $proImg = time().".".$ext;
      if(in_array($ext,$allowd)){
        $sel=$qm->getRecord("product","image","id=".$id);
        if(mysqli_num_rows($sel) > 0){
          $result=mysqli_fetch_array($sel);
          unlink(UPLOAD_PRODUCT_URL.$result['image']);
        }
        move_uploaded_file($_FILES['image']['tmp_name'],UPLOAD_PRODUCT_URL.$proImg);
        $res=$qm->updateRecord("product","image='".$proImg."',title='".$title."'","id=".$id);
        $_SESSION['alert_msg'] .= "<div class='msg_success'>Product updated successfully.</div>";
        header("location:product.php");
        exit;  
      }
      else{
      echo "<script>alert('Image is not formeted');history.back();</script>";
      exit;           
      }
    }
    else{
      $res=$qm->updateRecord("product","title='".$title."'","id=".$id);
      $_SESSION['alert_msg'] .= "<div class='msg_success'>Product updated successfully.</div>";
      header("location:product.php");
      exit;  
    }
  }
  if(isset($_GET['id']))
  {
    $id=$_GET['id'];
    $res = $qm->getRecord("product","*","id=".$id);
    if(mysqli_num_rows($res) > 0) {
      $row = mysqli_fetch_array($res);
    } else {
      $_SESSION['alert_msg'] .= "<div class='msg_error'>Somthing wrong.</div>";
      header("location:product.php");
      exit;
    } 
  } else {
    $_SESSION['alert_msg'] .= "<div class='msg_error'>Somthing wrong.</div>";
    header("location:product.php");
    exit;
  }
  if(isset($_POST['reset']))
  {
    $proImg="";
    $title="";
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
                  <h5><a href="product.php" style="text-decoration: none;color: black;">Product&nbsp;</a> <i class="fa fa-chevron-right"></i> Update Product</h5>
                  <a href="product.php" class="btn btn-primary" style="margin-left: auto !important;">Back</a>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <form class="form-sample" action="" method="Post" enctype="multipart/form-data">      
                      <p class="card-description"><center><b>Update Products</b></p>
                      <input type="hidden" name="id" class="txtField" value="<?php echo $id; ?>">
                      <div class="row">
                        <div class="col-md-5">
                          <div class="form-group row">
                            <div class="col-sm-12">
                              <center><img src="<?php echo PRODUCT_URL.$row['image']; ?>" style="width:60%"></center>
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
                              <label class="col-sm-3 col-form-label">Title</label>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" name="tit" value="<?php echo $row['title']; ?>" />
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <button type="submit" name="update" class="btn btn-primary">Update </button> &nbsp; &nbsp;
                            <button type="submit" name="reset" class="btn btn-danger">Reset</button> &nbsp; &nbsp;
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
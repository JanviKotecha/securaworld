<DOCTYPE html>
<?php @include("include/secureConfig.php"); 
  $page_title = "product_subcate";
  if(isset($_POST['update'])){
    $id=$_POST['id'];
    $image=$_FILES['image']['name'];
    $cate=addslashes($_POST['category']);
    $subcate=addslashes($_POST['subcategory']);
    $sel=$qm->getRecord("sub_cate","*","id=".$id);
    if(mysqli_num_rows($sel) > 0){
      $result=mysqli_fetch_array($sel);
    }
    $category=$_POST['category'];
	$subcat=$_POST['subcategory'];
	$id=intval($_GET['id']);
	
    $res=$qm->updateRecord("sub_cate","categoryid='".$category."',subcategory='".$subcate."',updationDate='".$getDt."'","id=".$id);
    if(isset($_FILES['image']['tmp_name']) && !empty($_FILES['image']['tmp_name'])){
      $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
      $allowd = array("jpg","png","jpeg","gif");
      $Img = time().".".$ext;
      if(in_array($ext,$allowd)) {
        $sel=$qm->getRecord("sub_cate","img","id=".$id);
        if(mysqli_num_rows($sel) > 0){
          $result=mysqli_fetch_array($sel);
          unlink(UPLOAD_PRODUCT_URL.$result['img']);
        }
        move_uploaded_file($_FILES['image']['tmp_name'],UPLOAD_PRODUCT_URL.$Img);
        $qm->updateRecord("sub_cate","img='".$Img."',updationDate='".$getDt."'","id=".$id);
        $_SESSION['alert_msg'] .= "<div class='msg_success'>SubCategory updated successfully.</div>";
        header("location:product_subcate.php");
        exit;  
      }
      else{
      echo "<script>alert('Image is not formeted');history.back();</script>";
      exit;           
      }
    }
    $_SESSION['alert_msg'] .= "<div class='msg_success'>SubCategory updated Successfully.</div>";
    header("location:product_subcate.php");
    exit;  
  } 
  if(isset($_GET['id']))
  {
    $id=$_GET['id'];
    $res = $qm->getRecord("sub_cate","*","id=".$id);
    if(mysqli_num_rows($res) > 0) {
      $row = mysqli_fetch_array($res);
    } else {
      $_SESSION['alert_msg'] .= "<div class='msg_error'>Data can't be found.</div>";
      header("location:product_subcate.php");
      exit;
    } 
  } else {
    $_SESSION['alert_msg'] .= "<div class='msg_error'>Data can't be found.</div>";
    header("location:product_subcate.php");
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
                  <h5><a href="product_subcate.php" style="text-decoration: none;color: black;">Product SubCategory&nbsp;</a> <i class="fa fa-chevron-right"></i> Update Product SubCategory </h5>
                  <a href="product_subcate.php" class="btn btn-primary" style="margin-left: auto !important;">Back</a>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <form class="form-sample" action="" method="Post" enctype="multipart/form-data"> 
                      <p class="card-description"><b><CENTER>Update Product Category</CENTER></p>
                      <input type="hidden" name="id" class="txtField" value="<?php echo $id; ?>">
                      <div class="row">
                      <div class="col-md-5">
                          <div class="form-group row">
                            <div class="col-sm-12">
                              <center><img src="<?php echo $row["img"]=='' ? PRODUCT_URL.'noimg.png' : (file_exists(UPLOAD_PRODUCT_URL.$row["img"]) ? PRODUCT_URL.$row["img"] :  PRODUCT_URL.'noimg.png'); ?>" style="width:65%"></center>
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
                          <?php
                            $id=intval($_GET['id']);
                            $query=mysqli_query($con,"select product_cate.id,product_cate.categoryName,sub_cate.subcategory from sub_cate join product_cate on product_cate.id=sub_cate.categoryid where sub_cate.id='$id'");
                            while($row=mysqli_fetch_array($query))
                            {
                            ?>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Category</label>
                                    <div class="col-sm-9">
                                    <select name="category"  class="form-control" required>
                                        <option value="<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($catname=$row['categoryName']);?></option>
                                        <?php $ret=mysqli_query($con,"select * from product_cate");
                                        while($result=mysqli_fetch_array($ret))
                                        {
                                        echo $cat=$result['categoryName'];
                                        if($catname==$cat)
                                        {
                                            continue;
                                        }
                                        else{
                                        ?>
                                        <option value="<?php echo $result['id'];?>"><?php echo $result['categoryName'];?></option>
                                        <?php } }?>
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Sub Category</label>
                              <div class="col-sm-9">
                                <input type="text" name="subcategory" value="<?php echo  htmlentities($row['subcategory']);?>" class="form-control" required>
                              </div>
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
                    <?php } ?>
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
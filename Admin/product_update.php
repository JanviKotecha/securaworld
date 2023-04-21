<DOCTYPE html>
<?php @include("include/secureConfig.php"); 
  $page_title = "product";
  $pid=intval($_GET['id']);
  if(isset($_POST['update'])) {
    if(!empty($_POST['tit']) && !empty($_POST['category'])  && !empty($_POST['ldesc'])) {
      $id=$_POST['id'];
      $image=$_FILES['image']['name'];
      $datasheet=$_FILES['datasheet']['name'];
      $cate=addslashes($_POST['category']);
      $subcate=addslashes($_POST['subcategory']);
      $title=addslashes($_POST['tit']);
      $sdes=addslashes($_POST['sdesc']);
      $ldes=addslashes($_POST['ldesc']);
      
      $qm->updateRecord("product","category='".$cate."',subCategory='".$subcate."',tit='".$title."',lngdes='".$ldes."',updt='".$getDt."'","id=".$id); 
      
      if(isset($_FILES['image']['tmp_name']) && !empty($_FILES['image']['tmp_name'])){
        $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $allowd = array("jpg","png","jpeg","gif");
        $Img = time().".".$ext;
        if(in_array($ext,$allowd)) {
          $sel=$qm->getRecord("product","img","id=".$id);
          if(mysqli_num_rows($sel) > 0){
            $result=mysqli_fetch_array($sel);
            unlink(UPLOAD_PRODUCT_URL.$result['img']);
          }
          move_uploaded_file($_FILES['image']['tmp_name'],UPLOAD_PRODUCT_URL.$Img);
          $qm->updateRecord("product","img='".$Img."'","id=".$id);
         
        }
        else{
        echo "<script>alert('Image is not formeted');history.back();</script>";
        exit;           
        }
      }
      if(isset($_FILES['datasheet']['tmp_name']) && !empty($_FILES['datasheet']['tmp_name'])){
        $ext = strtolower(pathinfo($_FILES['datasheet']['name'], PATHINFO_EXTENSION));
        $allowd = array("pdf");
       
        if(in_array($ext,$allowd)) {
          $sel=$qm->getRecord("product","datasheet","id=".$id);
          if(mysqli_num_rows($sel) > 0){
            $result=mysqli_fetch_array($sel);
            unlink(UPLOAD_PRODUCT_URL.$result['datasheet']);
          }
          move_uploaded_file($_FILES['datasheet']['tmp_name'],UPLOAD_PRODUCT_URL.$datasheet);
          $qm->updateRecord("product","datasheet='".$datasheet."'","id=".$id);
          
        }
        else{
        echo "<script>alert('Image is not formeted');history.back();</script>";
        exit;           
        }
      }
      $_SESSION['alert_msg'] .= "<div class='msg_success'>Product updated successfully.</div>";
      header("location:product.php");
      exit;  
  } else {
    echo "<script>alert('Please fill all the detail');history.back();</script>";
    exit; } 
  }  
  if(isset($_GET['id']))
  {
    if($_GET['id']!='')
    {
      if(is_numeric($_GET['id']))
      {
        $id=$_GET['id'];
        $res = $qm->getRecord("product","*","id=".$id);
        if(mysqli_num_rows($res) > 0) {
          $row = mysqli_fetch_array($res);
        } else {
          $_SESSION['alert_msg'] .= "<div class='msg_error'>Data can't be found.</div>";
          header("location:product.php");
          exit;
        } 
      } else {
      $_SESSION['alert_msg'] .= "<div class='msg_error'>Only numeric value required.</div>";
      header("location:product.php");
      exit;
    }
    } else {
      $_SESSION['alert_msg'] .= "<div class='msg_error'>Data can't be found.</div>";
      header("location:product.php");
      exit;
    }
  }
  else {
  $_SESSION['alert_msg'] .= "<div class='msg_error'>Data can't be found.</div>";
  header("location:product.php");
  exit;
  } 

?>
<html lang="en">
  <head>
    <?php include("include/head.php");?>
    <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
      
      <script>
         function getSubcat(val) {
         	$.ajax({
         	type: "POST",
         	url: "get_subcat.php",
         	data:'cat_id='+val,
         	success: function(data){
         		$("#subcategory").html(data);
         	}
         	});
         }
         
      </script>	
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
       
                <div class="card">
                  <div class="card-body">
                    <form class="form-sample" action="" method="Post" enctype="multipart/form-data"> 
                    <?php 
                      $query=mysqli_query($con,"select product.*,product_cate.categoryName as catname,product_cate.id as cid,sub_cate.subcategory as subcatname,sub_cate.id as subcatid from product join product_cate on product_cate.id=product.category join sub_cate on sub_cate.id=product.subCategory where product.id='$pid'");
                      $cnt=1;
                      while($row=mysqli_fetch_array($query))
                      { ?>
                      <p class="card-description"><b><CENTER>Update Product</CENTER></p>
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
                          <div class="col-md-12">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label" for="basicinput">Category</label>
                              <div class="col-sm-9">
                                <select name="category" class="form-control" onChange="getSubcat(this.value);"  required>
                                    <option value="<?php echo htmlentities($row['cid']);?>"><?php echo htmlentities($row['catname']);?></option>
                                    <?php $query=mysqli_query($con,"select * from product_cate");
                                      while($rw=mysqli_fetch_array($query))
                                      {
                                        if($row['catname']==$rw['categoryName'])
                                        {
                                          continue;
                                        }
                                        else{
                                        ?>
                                    <option value="<?php echo $rw['id'];?>"><?php echo $rw['categoryName'];?></option>
                                    <?php }} ?>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label" for="basicinput">SubCategory</label>
                              <div class="col-sm-9">
                                <select   name="subcategory"  id="subcategory" class="form-control" required>
                                  <option value="<?php echo htmlentities($row['subcatid']);?>"><?php echo htmlentities($row['subcatname']);?></option>
                                  <option value="1">No Sub Category</option>  
                                </select>
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
                              &nbsp;&nbsp;<b> Downlode DataSheet :  <a href="<?php echo PRODUCT_URL.$row["datasheet"]; ?>"><?php echo $row['datasheet']; ?></a></b>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group row">
                              <label class="col-sm-3 col-form-label">DataSheet</label>
                              <div class="col-sm-9">
                                <input type="file" class="form-control" name="datasheet" id="datasheet" />
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Long Description</label>
                            <div class="col-sm-12">
                              <script src="//cdn.ckeditor.com/4.5.5/standard/ckeditor.js"></script>
                              <textarea class="form-control" id="ck" name="ldesc" style=" float: left;width: 100%;min-height: 75px;outline: none; resize: none;"><?php echo $row['lngdes']; ?></textarea>
                              <script>
                                CKEDITOR.replace( 'ck' );
                              </script>
                            </div>
                          </div>
                        </div>
                      </div>
                      <center><br/><button type="submit" name="update"  class="btn btn-primary">Update</button>
                      <button type="submit" name="reset"  class="btn btn-danger">Reset</button>
                      <?php } ?>
                    </form>
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
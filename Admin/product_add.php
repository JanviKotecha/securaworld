<!DOCTYPE html>
<html lang="en">
  <?php @include("include/secureConfig.php");
  $page_title = "product";
  if(isset($_POST['add_product']))
  {
    if(!empty($_POST['tit']) && !empty($_POST['category']) && !empty($_POST['ldesc']) && !empty($_POST['modno'])) {
      $image=$_FILES['image']['name'];
      $datasheet=$_FILES['datasheet']['name'];
      $title=addslashes($_POST['tit']);
      $ldes=addslashes($_POST['ldesc']);
      $modno=addslashes($_POST['modno']);
      $category=$_POST['category'];
	    $subcat=$_POST['subcategory'];
      if(!empty($_FILES['image']['tmp_name']) && !empty($_FILES['datasheet']['tmp_name'])) {
        $insert=$qm->insertRecordReturn("product","category,subCategory,tit,lngdes,modno,dt","'".$category."','".$subcat."','".$title."','".$ldes."','".$modno."','".$getDt."'");
      }
      if(isset($_FILES['image']['tmp_name']) && !empty($_FILES['image']['tmp_name'])){
        $supported_image = array('gif','jpg','jpeg','png');  
        $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
        $Img = time().".".$ext;
        
        if (in_array($ext, $supported_image) ) {
          $update=$qm->updateRecordReturn("product","img='".$Img."'","id=".$insert);
          move_uploaded_file($_FILES["image"]["tmp_name"],UPLOAD_PRODUCT_URL.$Img);
          
        }
        else{
          echo "<script>alert('Image is not formeted');history.back();</script>";
          exit;
        } 
      }
      if(isset($_FILES['datasheet']['tmp_name']) && !empty($_FILES['datasheet']['tmp_name'])){
        $supported_image = array('pdf');  
         $ext = strtolower(pathinfo($datasheet, PATHINFO_EXTENSION));
         $file = 'secura'.time().".".$ext;
        // 
        if (in_array($ext, $supported_image)) {
          $qm->UpdateRecord("product","datasheet='".$datasheet."'","id=".$insert);
          move_uploaded_file($_FILES["datasheet"]["tmp_name"],UPLOAD_PRODUCT_URL.$datasheet);
           
        }
        else{
          echo "<script>alert('File is not formeted');history.back();</script>";
          exit;
        } 
      }
      $_SESSION['alert_msg'] .= "<div class='msg_success'>Product added successfully.</div>";
      header("location:product.php");
      exit;         
    } else {
      echo "<script>alert('Plese fill all the detail');history.back();</script>";
    exit; }
  }

?>
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
                  <h5><a href="product.php" style="text-decoration: none;color: black;">Product&nbsp;</a> <i class="fa fa-chevron-right"></i> Add Product</h5>
                  <a href="product.php" class="btn btn-primary" style="margin-left: auto !important;">Back</a>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <form class="form-sample" action="" method="Post" enctype="multipart/form-data"> 
                      <p class="card-description"><b><CENTER>Add Product</CENTER></p>
                      
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Image</label>
                            <div class="col-sm-8">
                              <input type="file" class="form-control" name="image" id="image" required/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Category</label>
                            <div class="col-sm-8">
                              <select name="category" class="form-control" onChange="getSubcat(this.value);"  required>
                                <option value="">Select Category</option>
                                <?php $query=mysqli_query($con,"select * from product_cate");
                                  while($row=mysqli_fetch_array($query))
                                    {?>
                                      <option value="<?php echo $row['id'];?>"><?php echo $row['categoryName'];?></option>
                                <?php } ?>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Sub Category</label>
                            <div class="col-sm-8">
                              <select name="subcategory" id="subcategory" class="form-control" ></select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Title</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="tit" required />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Model Number</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="modno" required />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Downloade Datasheet</label>
                            <div class="col-sm-8">
                              <input type="file" class="form-control" name="datasheet" id="datasheet" required/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label"> Description</label>
                            <div class="col-sm-12">
                              <script src="//cdn.ckeditor.com/4.5.5/standard/ckeditor.js"></script>
                              <textarea class="form-control" id="ck" name="ldesc" style=" float: left;width: 100%;min-height: 75px;outline: none; resize: none;"></textarea>
                              <script>
                                CKEDITOR.replace( 'ck' );
                              </script>
                            </div>
                          </div>
                        </div>
                      </div>
                      <center>
                        <button type="submit" name="add_product"  class="btn btn-primary">Add</button>&nbsp;&nbsp;&nbsp;
                        <input type="reset"   class="btn btn-danger" value="Reset">
                      </center>
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
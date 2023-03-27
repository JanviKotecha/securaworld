<DOCTYPE html>
<?php @include("include/secureConfig.php"); 
  $page_title = "blog_post";
  if(isset($_POST['update'])) {
    if(!empty($_POST['tit']) && !empty($_POST['cate']) && !empty($_POST['sdesc']) && !empty($_POST['ldesc'])) {
      $id=$_POST['id'];
      $image=$_FILES['image']['name'];
      $cate=addslashes($_POST['cate']);
      $title=addslashes($_POST['tit']);
      $sdes=addslashes($_POST['sdesc']);
      $ldes=addslashes($_POST['ldesc']);

      $qm->updateRecord("blog_post","cate='".$cate."',tit='".$title."',srtdes='".$sdes."',lngdes='".$ldes."',updt='".$getDt."'","id=".$id); 
      
      if(isset($_FILES['image']['tmp_name']) && !empty($_FILES['image']['tmp_name'])){
        $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $allowd = array("jpg","png","jpeg","gif");
        $Img = time().".".$ext;
        if(in_array($ext,$allowd)) {
          $sel=$qm->getRecord("blog_post","img","id=".$id);
          if(mysqli_num_rows($sel) > 0){
            $result=mysqli_fetch_array($sel);
            unlink(UPLOAD_BLOG_URL.$result['img']);
          }
          move_uploaded_file($_FILES['image']['tmp_name'],UPLOAD_BLOG_URL.$Img);
          $qm->updateRecord("blog_post","img='".$Img."'","id=".$id);
          $_SESSION['alert_msg'] .= "<div class='msg_success'>Blog post updated successfully.</div>";
          header("location:blog_post.php");
          exit;  
        }
        else{
        echo "<script>alert('Image is not formeted');history.back();</script>";
        exit;           
        }
      }
      $_SESSION['alert_msg'] .= "<div class='msg_success'>Blog post updated successfully.</div>";
      header("location:blog_post.php");
      exit;  
  } else {
    echo "<script>alert('Please fill all the detail');history.back();</script>";
    exit; } 
  }  
  if(isset($_GET['id']))
  {
    $id=$_GET['id'];
    $res = $qm->getRecord("blog_post","*","id=".$id);
    if(mysqli_num_rows($res) > 0) {
      $row = mysqli_fetch_array($res);
    } else {
      $_SESSION['alert_msg'] .= "<div class='msg_error'>Data can't be found.</div>";
      header("location:blog_post.php");
      exit;
    } 
  } else {
    $_SESSION['alert_msg'] .= "<div class='msg_error'>Data can't be found.</div>";
    header("location:blog_post.php");
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
                  <h5><a href="blog_post.php" style="text-decoration: none;color: black;">Blog Post&nbsp;</a> <i class="fa fa-chevron-right"></i> Update Blog Post</h5>
                  <a href="blog_post.php" class="btn btn-primary" style="margin-left: auto !important;">Back</a>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <form class="form-sample" action="" method="Post" enctype="multipart/form-data"> 
                      <p class="card-description"><b><CENTER>Update Blog Post</CENTER></p>
                      <input type="hidden" name="id" class="txtField" value="<?php echo $id; ?>">
                      <div class="row">
                        <div class="col-md-5">
                          <div class="form-group row">
                            <div class="col-sm-12">
                              <center><img src="<?php echo $row["img"]=='' ? BLOG_URL.'noimg.png' : (file_exists(UPLOAD_BLOG_URL.$row["img"]) ? BLOG_URL.$row["img"] :  BLOG_URL.'noimg.png'); ?>" style="width:65%"></center>
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
                              <label class="col-sm-3 col-form-label">Category</label>
                              <div class="col-sm-9">
                                <select class="form-control" id="cate" name="cate" required>
                                  <option disabled value="0">Select Category</option>
                                    <?php 
                                      $records=$qm->getRecord("blog_cate");
                                      if (mysqli_num_rows($records)>0) {
                                        while($data = mysqli_fetch_array($records)){ ?>
                                         <option value="<?php echo $data['id']; ?>" <?php echo ($data['id'] == $row['cate'] ? 'Selected' : ''); ?> >
                                          <?php echo $data['cate']; ?></option>
                                      <?php } }
                                    ?>  
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
                              <label class="col-sm-3 col-form-label">Short Description</label>
                              <div class="col-sm-12">
                                <textarea class="form-control"  name="sdesc" style=" float: left;width: 100%;min-height: 75px;outline: none; resize: none;"><?php echo $row['srtdes']; ?></textarea>
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
<!DOCTYPE html>
<html lang="en">
    <script src="//cdn.ckeditor.com/4.5.5/standard/ckeditor.js"></script>
<?php @include("include/secureConfig.php"); $page_title = "about"; ?>
<?php
  if(isset($_POST['update'])) {
    $about=$_POST['adesc'];
    $vc=$_POST['vcont'];
    $mc=$_POST['mcont'];

    $about=addslashes($about);
    $vc=addslashes($vc);
    $mc=addslashes($mc);

    if(isset($_FILES['vimg']['tmp_name']) && !empty($_FILES['vimg']['tmp_name'])){
      $vimg=$_FILES['vimg']['name'];
      $ext=strtolower(pathinfo($_FILES['vimg']['name'], PATHINFO_EXTENSION));
      $allowd = array("jpg","png","jpeg","gif");

      if(in_array($ext,$allowd)){
        $a=move_uploaded_file($_FILES['vimg']['tmp_name'],UPLOAD_ABOUT_URL.$vimg);
        $sel=$qm->getRecord("about","v_img","id=1"); 
        if(mysqli_num_rows($sel) > 0){
          $result=mysqli_fetch_array($sel);
          unlink(UPLOAD_ABOUT_URL.$result['v_img']);
          $res=$qm->updateRecord("about","a_desc='".$about."',v_cont='".$vc."',m_cont='".$mc."',v_img='".$vimg."'","id=1");
        }
      }    
      else
      { 
        echo "<script>alert('Image is not formeted');history.back();</script>";
        exit;
      }     
    }
    if(isset($_FILES['mimg']['tmp_name']) && !empty($_FILES['mimg']['tmp_name'])){
      $mimg=$_FILES['mimg']['name'];
      $ext=strtolower(pathinfo($_FILES['mimg']['name'], PATHINFO_EXTENSION));
      $allowd = array("jpg","png","jpeg","gif");

      if(in_array($ext,$allowd)){
        $a=move_uploaded_file($_FILES['mimg']['tmp_name'],UPLOAD_ABOUT_URL.$mimg);
        $sel=$qm->getRecord("about","m_img","id=1"); 
        if(mysqli_num_rows($sel) > 0){
          $result=mysqli_fetch_array($sel);
          unlink(UPLOAD_ABOUT_URL.$result['m_img']);
          $res=$qm->updateRecord("about","a_desc='".$about."',v_cont='".$vc."',m_cont='".$mc."',m_img='".$mimg."'","id=1");
        }
      }    
      else
      { 
        echo "<script>alert('Image is not formeted');history.back();</script>";
        exit;
      }     
    }
    if(isset($_FILES['miimg']['tmp_name']) && !empty($_FILES['miimg']['tmp_name'])){
      $miimg=$_FILES['miimg']['name'];
      $ext=strtolower(pathinfo($_FILES['miimg']['name'], PATHINFO_EXTENSION));
      $allowd = array("jpg","png","jpeg","gif");

      if(in_array($ext,$allowd)){
        $a=move_uploaded_file($_FILES['miimg']['tmp_name'],UPLOAD_ABOUT_URL.$miimg);
        $sel=$qm->getRecord("about","mi_img","id=1"); 
        if(mysqli_num_rows($sel) > 0){
          $result=mysqli_fetch_array($sel);
          unlink(UPLOAD_ABOUT_URL.$result['mi_img']);
          $res=$qm->updateRecord("about","a_desc='".$about."',v_cont='".$vc."',m_cont='".$mc."',mi_img='".$miimg."'","id=1");
        
        }
      }    
      else
      { 
        echo "<script>alert('Image is not formeted');history.back();</script>";
        exit;
      }     
    }
    else{
      $res=$qm->updateRecord("about","a_desc='".$about."',v_cont='".$vc."',m_cont='".$mc."'","id=1");
      $_SESSION['alert_msg'] .= "<div class='msg_success'>About Updated Successfully.</div>";
      header("location:about.php");
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
                  <h5><a href="about.php" style="text-decoration: none;color: black;">about&nbsp;</a> <i class="fa fa-chevron-right"></i> Update about </h5>
                  <a href="about.php" class="btn btn-primary" style="margin-left: auto !important;">Back</a>
                </div>
              </div>
            </div>
            <div class="row">
                
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <form class="form-sample" action="" method="Post" enctype="multipart/form-data">   
                    <h2 style="text-align:center"> About Us </h2><hr>
                      <?php 
                        $result=$qm->getRecord("about","*","id=1");
                        if ($result->num_rows > 0) {
                          $row = $result->fetch_assoc(); ?>
                          <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Description</label>
                                    <div class="col-sm-12">
                                      
                                        <textarea class="form-control" id="ck" name="adesc" style=" float: left;width: 100%;min-height: 75px;outline: none; resize: none;"><?php echo $row['a_desc']; ?></textarea>
                                        <script>
                                        CKEDITOR.replace( 'ck' );
                                        </script>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                               <hr><h2 style="text-align:center"> Vision </h2><hr>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <br><br><img class="rounded-circle" src="<?php echo $row["v_img"]=='' ? ABOUT_URL.'noimg.png' : (file_exists(UPLOAD_ABOUT_URL.$row["v_img"]) ? ABOUT_URL.$row["v_img"] :  ABOUT_URL.'noimg.png'); ?>" alt="about image" style="width:100%">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label for="file">Select vision image</label>
                                        <input type="file" class="form-control" name="vimg" />
                                    </div>
                                    <div class="col-sm-12">
                                      
                                        <br><textarea class="form-control" id="ck1" name="vcont" style=" float: left;width: 100%;min-height: 75px;outline: none; resize: none;"><?php echo $row['v_cont']; ?></textarea>
                                        <script>
                                        CKEDITOR.replace( 'ck1' );
                                        </script>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                               <hr><h2 style="text-align:center"> Mission </h2><hr>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <br><br><img class="rounded-circle" src="<?php echo $row["m_img"]=='' ? ABOUT_URL.'noimg.png' : (file_exists(UPLOAD_ABOUT_URL.$row["m_img"]) ? ABOUT_URL.$row["m_img"] :  ABOUT_URL.'noimg.png'); ?>" alt="about image" style="width:100%">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <div class="col-sm-12" >
                                        <label for="file">Select Mission image</label>
                                        <input type="file" class="form-control" name="mimg" />
                                    </div>
                                    <div class="col-sm-12">
                                      
                                        <br><textarea class="form-control" id="ck2" name="mcont" style=" float: left;width: 100%;min-height: 75px;outline: none; resize: none;"><?php echo $row['m_cont']; ?></textarea>
                                        <script>
                                        CKEDITOR.replace( 'ck2' );
                                        </script>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                               <hr><h2 style="text-align:center"> Our Milestone </h2><hr>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <br><br><img  src="<?php echo $row["mi_img"]=='' ? ABOUT_URL.'noimg.png' : (file_exists(UPLOAD_ABOUT_URL.$row["mi_img"]) ? ABOUT_URL.$row["mi_img"] :  ABOUT_URL.'noimg.png'); ?>" alt="about image" style="width:200px">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9" >
                                <div class="form-group row">
                                    <div class="col-sm-12"  style="margin-top:100px">
                                        <label for="file">Select Milestone</label>
                                        <input type="file" class="form-control" name="miimg" />
                                    </div>
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
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
<!DOCTYPE html>
<html lang="en">
    <script src="//cdn.ckeditor.com/4.5.5/standard/ckeditor.js"></script>
<?php @include("include/secureConfig.php"); $page_title = "software"; ?>
<?php
  if(isset($_POST['update'])) {
    if(isset($_FILES['fire']['tmp_name']) && !empty($_FILES['fire']['tmp_name']) && ($_FILES['vmsclint']['tmp_name']) && !empty($_FILES['vmsclint']['tmp_name']) && ($_FILES['vms']['tmp_name']) && !empty($_FILES['vms']['tmp_name'])){
      $fire=$_FILES['fire']['name'];
      $vmsclint=$_FILES['vmsclint']['name'];
      $vms=$_FILES['vms']['name'];
      $ext=strtolower(pathinfo($_FILES['fire']['name'], PATHINFO_EXTENSION));
      $ext1=strtolower(pathinfo($_FILES['vmsclint']['name'], PATHINFO_EXTENSION));
      $ext2=strtolower(pathinfo($_FILES['vms']['name'], PATHINFO_EXTENSION));
      $allowd = array("rar","pdf");

      if(in_array($ext,$allowd)){
        $a=move_uploaded_file($_FILES['fire']['tmp_name'],UPLOAD_SOFTWARE_URL.$fire);
        $b=move_uploaded_file($_FILES['vmsclint']['tmp_name'],UPLOAD_SOFTWARE_URL.$vmsclint);
        $c=move_uploaded_file($_FILES['vms']['tmp_name'],UPLOAD_SOFTWARE_URL.$vms);
        $sel=$qm->getRecord("software"); 
        if(mysqli_num_rows($sel) > 0){
          $result=mysqli_fetch_array($sel);
          unlink(UPLOAD_SOFTWARE_URL.$result['firmware']);
          unlink(UPLOAD_SOFTWARE_URL.$result['vmssoftware']);
          unlink(UPLOAD_SOFTWARE_URL.$result['vmspdf']);
        }  
        $res=$qm->updateRecord("software","firmware='".$fire."',vmssoftware='".$vmsclint."',vmspdf='".$vms."'","id=1");
        $_SESSION['alert_msg'] .= "<div class='msg_success'>Software Updated Successfully.</div>";
        header("location:software.php");
        exit;
    }    
      else
      { 
        echo "<script>alert('File is not formeted');history.back();</script>";
        exit;
      }     
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
                  <h5><a href="software.php" style="text-decoration: none;color: black;">Software&nbsp;</a> <i class="fa fa-chevron-right"></i> Update Software </h5>
                  <a href="software.php" class="btn btn-primary" style="margin-left: auto !important;">Back</a>
                </div>
              </div>
            </div>
            <div class="row">
                
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <form class="form-sample" action="" method="Post" enctype="multipart/form-data">   
                    <h2 style="text-align:center">Software Downloade</h2><hr>
                      <?php 
                        $result=$qm->getRecord("software","*","id=1");
                        if ($result->num_rows > 0) {
                          $row = $result->fetch_assoc(); ?>
                          <div class="row">
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label for="file">Select Firmware Software</label>
                                        <input type="file" class="form-control" name="fire" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group row">
                                    <div class="col-sm-12" >
                                        <label for="file">Select VMS Client Software</label>
                                        <input type="file" class="form-control" name="vmsclint" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9" >
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label for="file">Select VMS Datasheet</label>
                                        <input type="file" class="form-control" name="vms" />
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
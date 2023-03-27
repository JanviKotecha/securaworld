<!DOCTYPE html>
<html lang="en">
  <?php @include("include/secureConfig.php");
  $page_title = "services";
  if(isset($_POST['add_pro']))
  {
    if(!empty($_POST['lintyp']) && !empty($_POST['link']) && !empty($_POST['tit']) && !empty($_POST['desc'])) {
      $image=$_FILES['image']['name'];
      $title=addslashes($_POST['tit']);
      $des=addslashes($_POST['desc']);
      $link=addslashes($_POST['link']);
      $lintyp=addslashes($_POST['lintyp']);
      $ins=$qm->insertRecord("services","tit,des,link,lintyp","'".$title."','".$des."','".$link."','".$lintyp."'");
      
      if(isset($_FILES['image']['tmp_name']) && !empty($_FILES['image']['tmp_name'])){
        $supported_image = array('gif','jpg','jpeg','png');  
        $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
        $Img = time().".".$ext;
        if (in_array($ext, $supported_image) ) {
          $qm->UpdateRecord("services","img='".$Img."'","id=".$ins);
          move_uploaded_file($_FILES["image"]["tmp_name"],UPLOAD_SERVICES_URL.$Img);
          $_SESSION['alert_msg'] .= "<div class='msg_success'>services added successfully.</div>";
          header("location:services.php");
          exit;  
        }
        else{
          echo "<script>alert('Image is not formeted');history.back();</script>";
          exit;
        } 
      }
      $_SESSION['alert_msg'] .= "<div class='msg_success'>services added successfully.</div>";
      header("location:services.php");
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
                  <h5><a href="services.php" style="text-decoration: none;color: black;">services&nbsp;</a> <i class="fa fa-chevron-right"></i> Add services</h5>
                  <a href="services.php" class="btn btn-primary" style="margin-left: auto !important;">Back</a>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <form class="form-sample" action="" method="Post" enctype="multipart/form-data" accept-charset="utf-8"> 
                      <p class="card-description"><b><CENTER>Add services</CENTER></p>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                              <input type="file" class="form-control" name="image" id="image" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Title</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="tit" required />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Link</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="link" required />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Link Type</label>
                            <div class="col-sm-9">
                              <input type="radio" name="lintyp" value="Inner"> Inner
                              <input type="radio" name="lintyp" value="Outer"> Outer
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-12">
                              <textarea class="form-control" name="desc" style=" float: left;width: 100%;min-height: 75px;outline: none; resize: none;"></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                      <center>
                        <button type="submit" name="add_pro"  class="btn btn-primary">Add</button>&nbsp;&nbsp;&nbsp;
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

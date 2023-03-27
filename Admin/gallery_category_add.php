<!DOCTYPE html>
<html lang="en">
<?php @include("include/secureConfig.php");
  $page_title = "gal_cat";
  if(isset($_POST['add']))
  {
    $gal_cat=$_POST['cate'];
    $gal_cat= addslashes($gal_cat); 
    $insert=$qm->insertRecord("gallery_category","category","'".$gal_cat."'");
    $_SESSION['alert_msg'] .= "<div class='msg_success'>Category added Successfully.</div>";
    header("location:gallery_category.php");
    exit;  
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
                  <h5><a href="gallery_category.php" style="text-decoration: none;color: black;">Gallery Category&nbsp;</a> <i class="fa fa-chevron-right"></i> Add Gallery Category</h5>
                  <a href="gallery_category.php" class="btn btn-primary" style="margin-left: auto !important;">Back</a>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <form class="form-sample" action="" method="Post" enctype="multipart/form-data"> 
                      <p class="card-description"><b><CENTER>Add Gallery Category</CENTER></p>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Category</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="cate" />
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
<!DOCTYPE html>
<html lang="en">
<?php @include("include/secureConfig.php");
  $page_title = "blog";
  if(isset($_POST['add']))
  {
    $cate=addslashes($_POST['cate']);
   
    $insert=$qm->insertRecord("blog_cate","cate","'".$cate."'");
    $_SESSION['alert_msg'] .= "<div class='msg_success'>Category added Successfully.</div>";
    header("location:blog_cate.php");
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
                  <h5><a href="blog_cate.php" style="text-decoration: none;color: black;">Blog Category&nbsp;</a> <i class="fa fa-chevron-right"></i> Add Blog Category</h5>
                  <a href="blog_cate.php" class="btn btn-primary" style="margin-left: auto !important;">Back</a>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <form class="form-sample" action="" method="Post" enctype="multipart/form-data"> 
                      <p class="card-description"><b><CENTER>Add Blog Category</CENTER></p>
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
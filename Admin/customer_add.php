<!DOCTYPE html>
<html lang="en">
<?php @include("include/secureConfig.php");
  $page_title = "customer";
  if(isset($_POST['add']))
  {
    $name=$_POST['nm'];
    $designation=$_POST['desi'];
    $review=$_POST['rev'];

    $name= addslashes($name); 
    $designation = addslashes($designation); 
    $review = addslashes($review); 

    $insert=$qm->insertRecord("customer","nm,desi,rev","'".$name."','".$designation."','".$review."'");
    $_SESSION['alert_msg'] .= "<div class='msg_success'>Testimonial added Successfully.</div>";
    header("location:customer.php");
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
                  <h5><a href="customer.php" style="text-decoration: none;color: black;">Testimonial&nbsp;</a> <i class="fa fa-chevron-right"></i> Add Testimonial</h5>
                  <a href="customer.php" class="btn btn-primary" style="margin-left: auto !important;">Back</a>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <form class="form-sample" action="" method="Post" enctype="multipart/form-data"> 
                      <p class="card-description"><b><CENTER>Add Testimonial</CENTER></p>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="nm" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Dasignation</label>
                            <div class="col-sm-9">
                              <input type="text" name="desi"  class="form-control">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Review</label>
                            <div class="col-sm-12">
                              <textarea class="form-control" name="rev" style=" float: left;width: 100%;min-height: 75px;outline: none; resize: none;"></textarea>
                            </div>
                          </div>
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
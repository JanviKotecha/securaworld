<DOCTYPE html>
<?php @include("include/secureConfig.php"); 
  $page_title = "customer";
  if(isset($_POST['update'])){
    $id=$_POST['id'];

    $name=$_POST['nm'];
    $designation=$_POST['desi'];
    $review=$_POST['rev'];

    $name= addslashes($name); 
    $designation = addslashes($designation); 
    $review = addslashes($review); 

    $sel=$qm->getRecord("customer","*","id=".$id);
    if(mysqli_num_rows($sel) > 0){
      $result=mysqli_fetch_array($sel);
    }
    $res=$qm->updateRecord("customer","nm='".$name."',desi='".$designation."',rev='".$review."'","id=".$id);
    $_SESSION['alert_msg'] .= "<div class='msg_success'>Testimonial updated Successfully.</div>";
    header("location:customer.php");
    exit;  
  } 
  if(isset($_GET['id']))
  {
    $id=$_GET['id'];
    $res = $qm->getRecord("customer","*","id=".$id);
    if(mysqli_num_rows($res) > 0) {
      $row = mysqli_fetch_array($res);
    } else {
      $_SESSION['alert_msg'] .= "<div class='msg_error'>Data can't be found.</div>";
      header("location:customer.php");
      exit;
    } 
  } else {
    $_SESSION['alert_msg'] .= "<div class='msg_error'>Data can't be found.</div>";
    header("location:customer.php");
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
                  <h5><a href="customer.php" style="text-decoration: none;color: black;">Testimonial&nbsp;</a> <i class="fa fa-chevron-right"></i> Update Testimonial Product</h5>
                  <a href="customer.php" class="btn btn-primary" style="margin-left: auto !important;">Back</a>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <form class="form-sample" action="" method="Post" enctype="multipart/form-data"> 
                      <p class="card-description"><b><CENTER>Update Testimonial</CENTER></p>
                      <input type="hidden" name="id" class="txtField" value="<?php echo $id; ?>">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="nm" value="<?php echo $row['nm']; ?>" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Dasignation</label>
                            <div class="col-sm-9">
                              <input type="text" name="desi" value="<?php echo $row['desi']; ?>"  class="form-control">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Review</label>
                            <div class="col-sm-12">
                              <textarea class="form-control" name="rev" style=" float: left;width: 100%;min-height: 75px;outline: none; resize: none;"><?php echo $row['rev']; ?></textarea>
                            </div>
                          </div>
                          <center><br/><button type="submit" name="update"  class="btn btn-primary">Update</button>
                          <input type="submit" value ="Reset"  class="btn btn-danger">
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
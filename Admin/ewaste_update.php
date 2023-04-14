<!DOCTYPE html>
<html lang="en">
    <script src="//cdn.ckeditor.com/4.5.5/standard/ckeditor.js"></script>
<?php @include("include/secureConfig.php"); $page_title = "ewaste"; ?>
<?php
  if(isset($_POST['update'])) {
    $ewaste=$_POST['des'];
    $ewaste=addslashes($ewaste);
    $res=$qm->updateRecord("ewaste","des='".$ewaste."'","id=1");
    $_SESSION['alert_msg'] .= "<div class='msg_success'>E-Waste Updated Successfully.</div>";
    header("location:ewastea.php");
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
                  <h5><a href="ewastea.php" style="text-decoration: none;color: black;">E-waste&nbsp;</a> <i class="fa fa-chevron-right"></i> Update E-waste </h5>
                  <a href="ewastea.php" class="btn btn-primary" style="margin-left: auto !important;">Back</a>
                </div>
              </div>
            </div>
            <div class="row">
                
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <form class="form-sample" action="" method="Post" enctype="multipart/form-data">   
                    <h2 style="text-align:center"> E-Waste</h2><hr>
                      <?php 
                        $result=$qm->getRecord("ewaste","*","id=1");
                        if ($result->num_rows > 0) {
                          $row = $result->fetch_assoc(); ?>
                          <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Description</label>
                                    <div class="col-sm-12">
                                        <textarea class="form-control" id="ck" name="des" style=" float: left;width: 100%;min-height: 75px;outline: none; resize: none;"><?php echo $row['des']; ?></textarea>
                                        <script>
                                        CKEDITOR.replace( 'ck' );
                                        </script>
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
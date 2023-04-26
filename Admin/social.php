<!DOCTYPE html>
<html lang="en">
<?php @include("include/secureConfig.php");
   $page_title = "social";
 
?>
  <head>
    <style>
      p{
        overflow: hidden !important;
        display: -webkit-box !important;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 6 !important;
        text-align:left;
      }
      .dataTables_wrapper>div {
        display: none;
    }
    </style>
    <?php include("include/head.php"); ?>
  </head>
  <body>
    <div class="container-scroller">
      <?php @include("include/navbar.php"); ?>
      <div class="container-fluid page-body-wrapper">
        <?php @include("include/sidebar.php"); ?>
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
            <?php include("include/alert_msg.php"); ?>
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h2 class="card-title">Social Link</h2>
                    <div class="row">
                      <div class="resTable">
                        <table class="datatable-1 table table-bordered table-striped	 display" width="100%">
                          <thead>     
                            <tr>
                              <th>Insta</th>
                              <th>Facebook</th>
                              <th>YouTube</th>
                              <th>Twitter</th>
                              <th colspan="2">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php 
                          $result=mysqli_query($con,"select * from social");
                          if (mysqli_num_rows($result)>0) {
                          
                              $row=mysqli_fetch_array($result) ?>
                                <tr>
                                  <td><p><?php echo htmlentities($row['insta']);?></p></td>
                                  <td><p><?php echo htmlentities($row['fb']);?></p></td>
                                  <td><p><?php echo htmlentities($row['youtb']);?></p></td>
                                  <td><p><?php echo htmlentities($row['twit']);?></p></td>
                                  <td style="width: 50px;"><a class="btn btn-primary" href="social_update.php">Update</a></td>                             
                                </tr>
                                <?php } 
                                else { ?>
                                  <div class="col-lg-12 grid-margin">
                                    <center><h4>No record found</h4></center>
                                  </div>
                                  <?php } ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
          <?php @include("include/footer.php"); ?>  
        </div>
      </div>
    </div>  
    <?php @include("include/footer-script.php");?>
    <script src="scripts/datatables/jquery.dataTables.js"></script>
    <script>
		$(document).ready(function() {
      $('.datatable-1').dataTable();
		} );
	</script>
  </body>
</html>

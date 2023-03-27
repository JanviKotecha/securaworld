<!DOCTYPE html>
<html lang="en">
  <?php @include("include/secureConfig.php"); $page_title = "social"; ?>
  <head>
    <?php @include("include/head.php"); ?>
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
                    <h4 class="card-title">Contact</h4>
                    <div class="resTable">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Insta</th>
                            <th>Facebook</th>
                            <th>YouTube</th>
                            <th>Twitter</th>
                            <th style="width: 50px">Update</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            $result=$qm->getRecord("social","*","id=1");
                            if (mysqli_num_rows($result)>0) {
                             $row=mysqli_fetch_array($result); ?>
                              <tr>
                                <td><?php echo $row['insta'];?></td>
                                <td><?php echo $row['fb'];?></td>
                                <td><?php echo $row['youtb'];?></td>
                                <td><?php echo $row['twit'];?></td>                             
                                <td><a class="btn btn-primary" href="social_update.php">Update</a></td>
                              </tr>
                            <?php 
                            }
                            else { ?>
                             <tr>
                                <td class="py-1" colspan="6"><center><b>No Recode Found</b></center></td>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>
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
  </body>
</html>
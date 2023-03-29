<!DOCTYPE html>
<html lang="en">
  <?php @include("include/secureConfig.php");
   $page_title = "contact";
  if(isset($_GET['id'])){
    $conres=$qm->getRecord("contact","*","id=".$_GET['id']);
    if(mysqli_num_rows($conres)>0){
      $qm->deleteRecord("contact","id=".$_GET['id']);
       $conresult=mysqli_fetch_array($conres);
      $_SESSION['alert_msg'] .= "<div class='msg_success'>Contact information deleted sucessfully.</div>";
      header("location:cotact_detail.php");
      exit;
    }
  }
  ?>
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th style="width: 50pxs"> Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            $result=$qm->getRecord("contact");
                            if (mysqli_num_rows($result)>0) {
                             while ($row=mysqli_fetch_array($result)) { ?>
                              <tr>
                                <td class="py-1"><?php echo $row['nm'];?></td>
                                <td><?php echo $row['eml'];?></td>
                                <td><?php echo $row['mob'];?></td>
                                <td><?php echo $row['msg'];?></td>
                                <td><?php echo $row['dt'];?></td>                             
                                <td style="width: 50px;"><a class="btn btn-danger" href="cotact_detail.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure');">Delete</a><br/></td>
                              </tr>
                            <?php }
                            }
                            else { ?>
                             <tr>
                                <td class="py-1" colspan="7"><center><b>No Recode Found</b></center></td>
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
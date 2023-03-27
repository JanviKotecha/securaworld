<!DOCTYPE html>
<html lang="en">
<?php @include("include/secureConfig.php");
  $page_title = "customer";
  if(isset($_GET['id'])){
    $res=$qm->getRecord("customer","*","id=".$_GET['id']);

    if(mysqli_num_rows($res)>0){
      $qm->deleteRecord("customer","id=".$_GET['id']);
      $result=mysqli_fetch_array($res);
      $_SESSION['alert_msg'] .= "<div class='msg_success'>Testimonial deleted successfully.</div>";
      header("location:customer.php");
      exit;
  }
    else{
    $_SESSION['alert_msg'] .= "<div class='msg_error'>Somthing wrong.</div>";
    header("location:dashbord.php");
    exit;
    } 
  }
?>
  <head>
    <?php @include("include/head.php") ?>
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
                    <h2 class="card-title">Testimonial 
                      <a href="customer_add.php" class="btn btn-primary" style="float: right;">Add Testimonial </a>
                    </h2>
                    <div class="resTable">
                      <table class="table table-striped" >
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Dasignation</th>
                            <th>Review</th>
                            <th> Edit</th>
                            <th> Delete </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            $result=$qm->getRecord("customer");
                            if (mysqli_num_rows($result)>0) {
                             while ($row=mysqli_fetch_array($result)) { ?>
                              <tr>
                                <td><h5><?php echo $row['nm']; ?></h5></td>
                                <td><h5><?php echo $row['desi']; ?></h5></td>
                                <td class="td1"><h5><?php echo $row['rev']; ?></h5></td>
                                <td><a class="btn btn-primary" href="customer_update.php?id=<?php echo $row['id'];?>">Update</a></td>
                                <td><a class="btn btn-danger" href="customer.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure');">Delete</a></td>                             
                                </tr>
                            <?php } }
                            else { ?>
                                <tr>
                                  <td colspan="5"><center><b>No Record Found</b></center></td>
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

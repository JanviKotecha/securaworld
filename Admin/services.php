<!DOCTYPE html>
<html lang="en">
<?php @include("include/secureConfig.php");
   $page_title = "services";
  if(isset($_GET['id'])){
    $res=$qm->getRecord("services","img","id=".$_GET['id']);
    if(mysqli_num_rows($res)>0){
      $qm->deleteRecord("services","id=".$_GET['id']);
      $result=mysqli_fetch_array($res);
      unlink(UPLOAD_SERVICES_URL.$result['img']);
      $_SESSION['alert_msg'] .= "<div class='msg_success'>services deleted successfully.</div>";
      header("location:services.php");
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
                    <h2 class="card-title">services
                      <a href="services_add.php" class="btn btn-primary" style="float: right;">Add services</a>
                    </h2>
                    <div class="resTable">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Link</th>
                            <th>Link Type</th>
                            <th width="50"> Edit</th>
                            <th width="50"> Delete </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            $result=$qm->getRecord("services");
                            if (mysqli_num_rows($result)>0) {
                             while ($row=mysqli_fetch_array($result)) { ?>
                              <tr>
                                <td><img src="<?php echo $row["img"]=='' ? SERVICES_URL.'noimg.png' : (file_exists(UPLOAD_SERVICES_URL.$row["img"]) ? SERVICES_URL.$row["img"] :  SERVICES_URL.'noimg.png'); ?>"  alt="image" style="border-radius: 0px;width: 50%;height: 50px;"></td>
                                <td><h5><?php echo $row['tit']; ?></h5></td>
                                <td><h5><?php echo $row['des']; ?></h5></td>
                                <td><h5><?php echo $row['link']; ?></h5></td>
                                <td><h5><?php echo $row['lintyp']; ?></h5></td>
                                <td><a class="btn btn-primary" href="services_update.php?id=<?php echo $row['id'];?>">Update</a></td>
                                <td><a class="btn btn-danger" href="services.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure');">Delete</a></td>                             
                              </tr>
                            <?php } }
                            else { ?>
                              <tr>
                                <td colspan="7"><center><b>No Record Found</b></center></td>
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

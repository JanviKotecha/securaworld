<!DOCTYPE html>
<html lang="en">
<?php @include("include/secureConfig.php");
   $page_title = "icon";
  if(isset($_GET['id'])){
    $res=$qm->getRecord("icon","img","id=".$_GET['id']);
    if(mysqli_num_rows($res)>0){
      $qm->deleteRecord("icon","id=".$_GET['id']);
      $result=mysqli_fetch_array($res);
      unlink(UPLOAD_ICON_URL.$result['image']);
      $_SESSION['alert_msg'] .= "<div class='msg_success'>Image deleted successfully.</div>";
      header("location:icon.php");
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
                    <h2 class="card-title">Home Icon
                      <a href="icon_add.php" class="btn btn-primary" style="float: right;">Add Icon</a>
                    </h2>
                    <div class="resTable">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Image</th>
                            <th>Link</th>
                            <th> Edit</th>
                            <th> Delete </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            $result=$qm->getRecord("icon");
                            if (mysqli_num_rows($result)>0) {
                             while ($row=mysqli_fetch_array($result)) { ?>
                              <tr>
                                <td><img src="<?php echo $row["img"]=='' ? ICON_URL.'noimg.png' : (file_exists(UPLOAD_ICON_URL.$row["img"]) ? ICON_URL.$row["img"] :  ICON_URL.'noimg.png'); ?>"  alt="image" style="border-radius: 0px;width: 40% !important;height: auto !important;"></td>
                                <td><h4><?php echo $row['link']; ?></h4></td>
                                <td><a class="btn btn-primary" href="icon_update.php?id=<?php echo $row['id'];?>">Update</a></td>
                                <td><a class="btn btn-danger" href="icon.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure');">Delete</a></td>                             
                              </tr>
                            <?php } }
                            else { ?>
                              <tr>
                                <td colspan="4"><center><b>No Record Found</b></center></td>
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
          <?php include("include/footer.php"); ?>  
        </div>
      </div>
    </div>  
    <?php include("include/footer-script.php");?>
  </body>
</html>

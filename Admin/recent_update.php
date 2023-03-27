 <!DOCTYPE html>
<html lang="en">
<?php @include("include/secureConfig.php");
   $page_title = "current";
  if(isset($_GET['id'])){
    $res=$qm->getRecord("recent_update","img","id=".$_GET['id']);
    if(mysqli_num_rows($res)>0){
      $qm->deleteRecord("recent_update","id=".$_GET['id']);
      $result=mysqli_fetch_array($res);
      unlink(UPLOAD_RIMG_URL.$result['img']);
      $_SESSION['alert_msg'] .= "<div class='msg_success'> Information deleted successfully.</div>";
      header("location:recent_update.php");
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
                    <h2 class="card-title">Current Detail
                      <a href="recent_update_add.php" class="btn btn-primary" style="float: right;">Add Current Detail</a>
                    </h2>
                    <div class="resTable">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Image</th>
                            <th>Hadding</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th width="50"> Edit</th>
                            <th width="50"> Delete </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            $result=$qm->getRecord("recent_update");
                            if (mysqli_num_rows($result)>0) {
                             while ($row=mysqli_fetch_array($result)) { ?>
                              <tr>
                                <td><img src="<?php echo $row["img"]=='' ? RIMG_URL.'noimg.png' : (file_exists(UPLOAD_RIMG_URL.$row["img"]) ? RIMG_URL.$row["img"] :  RIMG_URL.'noimg.png'); ?>"  alt="image" style="border-radius: 0px;width:100px;height:100px;"></td>
                                <td><h5><?php echo $row['hdin']; ?></h5></td>
                                <td><h5><?php echo $row['tit']; ?></h5></td>
                                <td><h5><?php echo $row['des']; ?></h5></td>
                                <td><a class="btn btn-primary" href="recent_update_update.php?id=<?php echo $row['id'];?>">Update</a></td>
                                <td><a class="btn btn-danger" href="recent_update.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure');">Delete</a></td>                             
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

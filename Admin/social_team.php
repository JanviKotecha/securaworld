<!DOCTYPE html>
<html lang="en">
<?php @include("include/secureConfig.php");
   $page_title = "social_team";
  if(isset($_GET['id'])){
    $res=$qm->getRecord("social_team","img","id=".$_GET['id']);
    if(mysqli_num_rows($res)>0){
      $qm->deleteRecord("social_team","id=".$_GET['id']);
      $result=mysqli_fetch_array($res);
      unlink(UPLOAD_SOCIALTEAM_URL.$result['img']);
      $_SESSION['alert_msg'] .= "<div class='msg_success'>Social team  deleted successfully.</div>";
      header("location:social_team.php");
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
                    <h2 class="card-title">Social Team
                      <a href="social_team_add.php" class="btn btn-primary" style="float: right;">Add Social Team</a>
                    </h2>
                    <div class="resTable">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Decription</th>
                            <th>Insta</th>
                            <th>Facebook</th>
                            <th>Email</th>
                            <th width="50"> Edit</th>
                            <th width="50"> Delete </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            $result=$qm->getRecord("social_team");
                            if (mysqli_num_rows($result)>0) {
                             while ($row=mysqli_fetch_array($result)) { ?>
                              <tr>
                                <td><img src="<?php echo $row["img"]=='' ? SOCIALTEAM_URL.'noimg.png' : (file_exists(UPLOAD_SOCIALTEAM_URL.$row["img"]) ? SOCIALTEAM_URL.$row["img"] :  SOCIALTEAM_URL.'noimg.png'); ?>"  alt="image" style="border-radius: 0px;width:100px;height:100px;"></td>
                                <td><h5><?php echo $row['nm']; ?></h5></td>
                                <td><h5><?php echo $row['desig']; ?></h5></td>
                                <td><h5><?php echo $row['post']; ?></h5></td>
                                <td><h5><?php echo $row['ins']; ?></h5></td>
                                <td><h5><?php echo $row['fb']; ?></h5></td>
                                <td><h5><?php echo $row['eml']; ?></h5></td>
                                <td><a class="btn btn-primary" href="social_team_update.php?id=<?php echo $row['id'];?>">Update</a></td>
                                <td><a class="btn btn-danger" href="social_team.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure');">Delete</a></td>                             
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

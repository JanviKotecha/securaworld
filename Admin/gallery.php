<!DOCTYPE html>
<html lang="en">
<?php @include("include/secureConfig.php");
   $page_title = "gallery";
  if(isset($_GET['id'])){
    $res=$qm->getRecord("gallery","image","id=".$_GET['id']);

    if(mysqli_num_rows($res)>0){
      $qm->deleteRecord("gallery","id=".$_GET['id']);
      $result=mysqli_fetch_array($res);
      unlink(UPLOAD_GALLERY_URL.$result['image']);
      $_SESSION['alert_msg'] .= "<div class='msg_success'>Image deleted successfully.</div>";
      header("location:gallery.php");
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
                    <h2 class="card-title">Gallery
                      <a href="gallery_add.php" class="btn btn-primary" style="float: right;">Add Image</a>
                    </h2>
                    <div class="resTable">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Image</th>
                            <th>Category</th>
                            <th width="50"> Edit</th>
                            <th width="50"> Delete </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            $result=$qm->getRecord("gallery ga Left Join gallery_category gact ON ga.category=gact.id","ga.id,ga.image,gact.category as gac");
                						if (mysqli_num_rows($result)>0) {
                             while ($row=mysqli_fetch_array($result)) { ?>
                              <tr>
                                <td><img src="<?php echo $row["image"]=='' ? GALLERY_URL.'noimg.png' : (file_exists(UPLOAD_GALLERY_URL.$row["image"]) ? GALLERY_URL.$row["image"] :  GALLERY_URL.'noimg.png'); ?>"  alt="image" style="border-radius: 0px;width: 40% !important;height: auto !important;"></td>
                                <td><h3><?php echo $row['gac']; ?></h3></td>
                                <td><a class="btn btn-primary" href="gallery_update.php?id=<?php echo $row['id'];?>">Update</a></td>
                                <td><a class="btn btn-danger" href="gallery.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure');">Delete</a></td>                             
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
          <?php @include("include/footer.php"); ?>  
        </div>
      </div>
    </div>  
    <?php @include("include/footer-script.php");?>
  </body>
</html>

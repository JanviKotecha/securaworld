<!DOCTYPE html>
<html lang="en">
<?php @include("include/secureConfig.php");
  $page_title = "gal_cat";
  if(isset($_GET['id'])){
    $res=$qm->getRecord("gallery_category","*","id=".$_GET['id']);

    if(mysqli_num_rows($res)>0){
      $qm->deleteRecord("gallery_category","id=".$_GET['id']);
      $result=mysqli_fetch_array($res);
      $_SESSION['alert_msg'] .= "<div class='msg_success'>Category deleted successfully.</div>";
      header("location:gallery_category.php");
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
                    <h4 class="card-title">Gallery category<a href="gallery_category_add.php" class="btn btn-primary" style="float: right;">Add Gallery category</a></h4>
                    <div class="resTable">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Category</th>
                            <th> Edit </th>
                            <th> Deleate</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            $result=$qm->getRecord("gallery_category");
                            if (mysqli_num_rows($result)>0) {
                             while ($row=mysqli_fetch_array($result)) { ?>
                              <tr>
                                <td class="py-1"><?php echo $row['category'];?></td>
                                <td style="width: 50px;"><a class="btn btn-primary" href="gallery_category_update.php?id=<?php echo $row['id'];?>">Update</a></td>                             
                                <td style="width: 50px;"><a class="btn btn-danger" href="gallery_category.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure');">Delet</a><br/></td>
                              </tr>
                            <?php } }?>
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

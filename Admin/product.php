<!DOCTYPE html>
<html lang="en">
<?php @include("include/secureConfig.php");
   $page_title = "product";
  if(isset($_GET['id'])){
    $res=$qm->getRecord("product","image","id=".$_GET['id']);

    if(mysqli_num_rows($res)>0){
      $qm->deleteRecord("product","id=".$_GET['id']);
      $result=mysqli_fetch_array($res);
      unlink(UPLOAD_PRODUCT_URL.$result['image']);
      $_SESSION['alert_msg'] .= "<div class='msg_sucess'>Product deleted successfully.</div>";
      header("location:product.php");
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
                    <h2 class="card-title">Product
                      <a href="product_add.php" class="btn btn-primary" style="float: right;">Add product</a>
                    </h2>
                    <div class="resTable">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th width="50"> Edit</th>
                            <th width="50"> Delete </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            $result=$qm->getRecord("product");
                						if (mysqli_num_rows($result)>0) {
                             while ($row=mysqli_fetch_array($result)) { ?>
                              <tr>
                                <td><img src="<?php echo PRODUCT_URL.$row['image']?>"  alt="image" style="border-radius: 0px;width: 40% !important;height: auto !important;"></td>
                                <td><h3><?php echo $row['title']; ?></h3></td>
                                <td><a class="btn btn-primary" href="product_update.php?id=<?php echo $row['id'];?>">Update</a></td>
                                <td><a class="btn btn-danger" href="product.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure');">Delete</a></td>                             
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

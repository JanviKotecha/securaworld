<!DOCTYPE html>
<html lang="en">
<?php @include("include/secureConfig.php");
  $page_title = "blog";
  if(isset($_GET['id'])) {
    $res=$qm->getRecord("blog_cate","*","id=".$_GET['id']);

    if(mysqli_num_rows($res)>0) {
      $qm->deleteRecord("blog_cate","id=".$_GET['id']);
      $result=mysqli_fetch_array($res);
      $_SESSION['alert_msg'] .= "<div class='msg_success'>Blog  deleted successfully.</div>";
      header("location:blog_cate.php");
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
                    <h4 class="card-title">Blog category<a href="blog_cate_add.php" class="btn btn-primary" style="float: right;">Add Blog Category</a></h4>
                    <div class="resTable">
                      <table class="table table-striped">
                        <thead>     
                          <tr>
                            <th>Category</th>
                            <th>Edit</th>
                            <th>Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            $result=$qm->getRecord("blog_cate");
                            if (mysqli_num_rows($result)>0) {
                             while ($row=mysqli_fetch_array($result)) { ?>
                              <tr>
                                <td class="py-1"><?php echo $row['cate'];?></td>
                                <td style="width: 50px;"><a class="btn btn-primary" href="blog_cate_update.php?id=<?php echo $row['id'];?>">Update</a></td>                             
                                <td style="width: 50px;"><a class="btn btn-danger" href="blog_cate.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure');">Delet</a><br/></td>
                              </tr>
                            <?php } } 
                            else {?>
                              <tr>
                                <td colspan="4"> <center><h5>No recorde found</h5></center></td>
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

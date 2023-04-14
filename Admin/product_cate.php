<!DOCTYPE html>
<html lang="en">
<?php @include("include/secureConfig.php");
  $page_title = "product_cate";
  if(isset($_GET['id'])) {
    $res=$qm->getRecord("product_cate","*","id=".$_GET['id']);
    if(mysqli_num_rows($res)>0) {
      $qm->deleteRecord("product_cate","id=".$_GET['id']);
      $result=mysqli_fetch_array($res);
      $_SESSION['alert_msg'] .= "<div class='msg_success'>Product Category  deleted successfully.</div>";
      header("location:product_cate.php");
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
                    <h4 class="card-title">Product category<a href="product_cate_add.php" class="btn btn-primary" style="float: right;">Add Product Category</a></h4>
                    <div class="resTable">
                      <table class="datatable-1 table table-bordered table-striped	 display" width="100%">
                        <thead>     
                          <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Creation date</th>
                            <th>Last Updated</th>
                            <th>Edit</th>
                            <th>Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            $result=$qm->customQuery("select * from product_cate order by creationDate desc");
                            if (mysqli_num_rows($result)>0) {
                              $cnt=1;
                             while ($row=mysqli_fetch_array($result)) { ?>
                              <tr>
                                <td><?php echo htmlentities($cnt);?></td>
                                <td class="py-1"> <img src="<?php echo $row["img"]=='' ? PRODUCT_URL.'noimg.png' : (file_exists(UPLOAD_PRODUCT_URL.$row["img"]) ? PRODUCT_URL.$row["img"] : PRODUCT_URL.'noimg.png'); ?>" style="width:25%;border-radius:0% !important;" alt="image"><br/></td>
                                <td class="py-1"><?php echo $row['categoryName'];?></td>
                                <td> <?php echo htmlentities($row['creationDate']);?></td>
                                <td><?php echo htmlentities($row['updationDate']);?></td>
                                <td style="width: 50px;"><a class="btn btn-primary" href="product_cate_update.php?id=<?php echo $row['id'];?>">Update</a></td>                             
                                <td style="width: 50px;"><a class="btn btn-danger" href="product_cate.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure');">Delet</a><br/></td>
                              </tr>
                            <?php   $cnt=$cnt+1;} } 
                            else {?>
                              <tr>
                                <td colspan="4"> <center><h5>No recorde found</h5></center></td>
                              </tr>
                            <?php } ?>
                        </tbody>
                      </table><br>
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
    <script src="scripts/datatables/jquery.dataTables.js"></script>
    <script>
		$(document).ready(function() {
      $('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<p><</p>');
			$('.dataTables_paginate > a:last-child').append('<p>></p>');
		} );
	</script>
  </body>
</html>

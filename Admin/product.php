<!DOCTYPE html>
<html lang="en">
<?php @include("include/secureConfig.php");
   $page_title = "product";
  if(isset($_GET['id'])){
    $res=$qm->getRecord("product","img","id=".$_GET['id']);
    if(mysqli_num_rows($res)>0){
      $qm->deleteRecord("product","id=".$_GET['id']);
      $result=mysqli_fetch_array($res);
      unlink(UPLOAD_PRODUCT_URL.$result['img']);
      $_SESSION['alert_msg'] .= "<div class='msg_success'>Product deleted successfully.</div>";
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
    <style>
      p{
        overflow: hidden !important;
        display: -webkit-box !important;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 6 !important;
        text-align:left;
      }
    </style>
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
                    <h2 class="card-title">Product
                      <a href="product_add.php" class="btn btn-primary" style="float: right;">Add Product</a>
                    </h2>
                    <div class="row">
                      <div class="resTable">
                        <table class="datatable-1 table table-bordered table-striped	 display" width="100%">
                          <thead>     
                            <tr>
                              <th>#</th>
                              <th>Product Name</th>
                              <th>Image</th>
                              <th>Category</th>
                              <th>Subcategory</th>
                              <th>ModelNo</th>
                              <th>DataSheet</th>
                              <th>Description</th>
                              <th colspan="2">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php 
                          $result=mysqli_query($con,"select product.*,product_cate.categoryName,sub_cate.subcategory from product join product_cate on product_cate.id=product.category join sub_cate on sub_cate.id=product.subCategory");
                          if (mysqli_num_rows($result)>0) {
                            $cnt=1;
                              while ($row=mysqli_fetch_array($result)) { ?>
                                <tr>
                                  <td><?php echo $cnt ?></td>
                                  <td><?php echo $row['tit'];?></td>
                                  <td><img src="<?php echo $row["img"]=='' ? PRODUCT_URL.'noimg.png' : (file_exists(UPLOAD_PRODUCT_URL.$row["img"]) ? PRODUCT_URL.$row["img"] : PRODUCT_URL.'noimg.png'); ?>"   style="border-radius:0% !important" alt="image"></td>
                                  <td><p><?php echo htmlentities($row['categoryName']);?></p></td>
                                  <td><p><?php echo htmlentities($row['subcategory']);?></p></td>
                                  <td><?php echo htmlentities($row['modno']);?></td>
                                  <td><a href="<?php echo PRODUCT_URL.$row['datasheet'] ?>" ><?php echo $row['datasheet'] ?></a></td>
                                  <td><p><?php echo $row['lngdes'];?></p></td>
                                  <td><a class="btn btn-primary btn-sm " href="product_update.php?id=<?php echo $row['id'];?>">Update</a></td>
                                  <td><a class="btn btn-danger btn-sm" href="product.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure to want to delete this item ?');">Delete</a></td>
                                </tr>
                                <?php $cnt=$cnt+1; } }
                                else { ?>
                                  <div class="col-lg-12 grid-margin">
                                    <center><h4>No record found</h4></center>
                                  </div>
                                  <?php } ?>
                          </tbody>
                        </table>
                      </div>
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

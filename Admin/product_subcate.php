<!DOCTYPE html>
<html lang="en">
<?php @include("include/secureConfig.php");
  $page_title = "product_subcate";
  if(isset($_GET['id'])) {
    $res=$qm->getRecord("sub_cate","*","id=".$_GET['id']);

    if(mysqli_num_rows($res)>0) {
      $qm->deleteRecord("sub_cate","id=".$_GET['id']);
      $result=mysqli_fetch_array($res);
      $_SESSION['alert_msg'] .= "<div class='msg_success'>Product Sub Category  deleted successfully.</div>";
      header("location:product_subcate.php");
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
                    <h4 class="card-title">Sub Category<a href="product_subcate_add.php" class="btn btn-primary" style="float: right;">Add SubCategory</a></h4>
                    <div class="module">
                        <div class="module-body table">
                            <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
                                <thead>
                                    <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Category</th>
                                    <th>Sub Category</th>
                                    <th>Creation date</th>
                                    <th>Last Updated</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $query=mysqli_query($con,"select sub_cate.id,product_cate.categoryName,sub_cate.subcategory,sub_cate.img,sub_cate.creationDate,sub_cate.updationDate from sub_cate join product_cate on product_cate.id=sub_cate.categoryid");
                                    $cnt=1;
                                    while($row=mysqli_fetch_array($query))
                                    {
                                      if($row['id'] != 1){
                                    ?>									
                                    <tr>
                                    <td><?php echo htmlentities($cnt);?></td>
                                    <td class="py-1"> <img src="<?php echo $row["img"]=='' ? PRODUCT_URL.'noimg.png' : (file_exists(UPLOAD_PRODUCT_URL.$row["img"]) ? PRODUCT_URL.$row["img"] : PRODUCT_URL.'noimg.png'); ?>" style="width:25%;border-radius:0% !important;" alt="image"><br/></td>
                                    <td><?php echo htmlentities($row['categoryName']);?></td>
                                    <td><?php echo htmlentities($row['subcategory']);?></td>
                                    <td> <?php echo htmlentities($row['creationDate']);?></td>
                                    <td><?php echo htmlentities($row['updationDate']);?></td>
                                    <td style="width: 50px;"><a class="btn btn-primary" href="product_subcate_update.php?id=<?php echo $row['id'];?>">Update</a></td>                             
                                    <td style="width: 50px;"><a class="btn btn-danger" href="product_subcate.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure');">Delet</a><br/></td>
                                    </tr>
                                    <?php $cnt=$cnt+1; } } ?>
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

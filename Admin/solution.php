<!DOCTYPE html>
<html lang="en">
<?php @include("include/secureConfig.php");
  $page_title = "solution";

  if(isset($_GET['id'])){
    $res=$qm->getRecord("solution","img","id=".$_GET['id']);
    if(mysqli_num_rows($res)>0){
      $qm->deleteRecord("solution","id=".$_GET['id']);
      $result=mysqli_fetch_array($res);
      unlink(UPLOAD_SOLUTION_URL.$result['img']);
      $_SESSION['alert_msg'] .= "<div class='msg_success'>solution Image deleted successfully.</div>";
      header("location:solution.php");
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
                    <h2 class="card-title">solutions
                      <a href="solution_add.php" class="btn btn-primary" style="float: right;">Add Solutions</a>
                    </h2>
                    <div class="resTable">
                    <table class="datatable-1 table table-bordered table-striped	 display" width="100%">
                        <thead>
                          <tr>
                          <th>#</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Short Description</th>
                            <th>Long Description</th>
                            <th width="50"> Edit</th>
                            <th width="50"> Delete </th>
                          </tr> 
                        </thead>
                        <tbody>
                          <?php 
                            $result=$qm->customQuery("SELECT * FROM solution"); 
                            if (mysqli_num_rows($result)>0) {
                              $cnt=1;
                             while ($row=mysqli_fetch_array($result)) {
                              ?>
                              <tr>
                              <td><?php echo htmlentities($cnt);?></td>
                                <td><img src="<?php echo $row["img"]=='' ? SOLUTION_URL.'noimg.png' : (file_exists(UPLOAD_SOLUTION_URL.$row["img"]) ? SOLUTION_URL.$row["img"] :  SOLUTION_URL.'noimg.png'); ?>"  alt="image" style="border-radius: 0px;width:100px;height:100px;"></td>
                                <td><h5><?php echo $row['tit']; ?></h5></td>
                                <td><h5><?php echo $row['des']; ?></h5></td>
                                <td><h5><?php echo $row['ldesc']; ?></h5></td>
                                <td><a class="btn btn-primary" href="solution_update.php?id=<?php echo $row['id'];?>">Update</a></td>
                                <td><a class="btn btn-danger" href="solution.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure to want to delete this item ?');">Delete</a></td>                             
                              </tr>
                            <?php   $cnt=$cnt+1; } }
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

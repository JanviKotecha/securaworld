<!DOCTYPE html>
<html lang="en">
<?php @include("include/secureConfig.php");
   $page_title = "software";
?>
  <head>
    <?php include("include/head.php"); ?>
  </head>
    <div class="container-scroller">
      <?php include("include/navbar.php");?>
        <div class="container-fluid page-body-wrapper">
            <?php include("include/sidebar.php");?>
            <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                <?php include ("include/alert_msg.php"); ?>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                            <h4 class="mb-1">Software Download</h4> 
                                <div class="text-right">
                                    <a href="software_update.php" class="btn btn-primary" data-target="#gry" >Update Detail</a>
                                    <br/>
                                </div>
																<?php 
                                    $result = mysqli_query($con, "SELECT * FROM software");
                                    if (mysqli_num_rows($result)>0) {
                                    $row=mysqli_fetch_array($result) ?>
																		<div class="card" style="padding:55px">
																			<p> <b>	Firmware : </b><a href="<?php echo SOFTWARE_URL.$row['firmware']; ?>" downloade> : <?php echo $row['firmware']; ?>  </a></p>
																			<p> <b> VMS Client Software : </b><a href="<?php echo SOFTWARE_URL.$row['vmssoftware']; ?>" downloade>  <?php echo $row['vmssoftware']; ?>   </a> </p>
																			<p> <b> VMS Datasheet : </b><a href="<?php echo SOFTWARE_URL.$row['vmspdf'];  ?>" target="blank">  <?php echo $row['vmspdf']; ?> </a></p>
																		</div>
																		<?php } ?>
                        				</div>
															</div>
														</div>
													</div>
												</div> 
    <?php @include("include/footer-script.php");?>
  </body>
</html> 
<!DOCTYPE html>
<html lang="en">
<?php @include("include/secureConfig.php");
   $page_title = "blog_post";
  if(isset($_GET['id'])){
    $res=$qm->getRecord("blog_post","img","id=".$_GET['id']);
    if(mysqli_num_rows($res)>0){
      $qm->deleteRecord("blog_post","id=".$_GET['id']);
      $result=mysqli_fetch_array($res);
      unlink(UPLOAD_BLOG_URL.$result['img']);
      $_SESSION['alert_msg'] .= "<div class='msg_success'>Blog Post deleted successfully.</div>";
      header("location:blog_post.php");
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
                    <h2 class="card-title">Blog Post
                      <a href="blog_post_add.php" class="btn btn-primary" style="float: right;">Add Blog Post</a>
                    </h2>
                    <div class="row">
                      <?php 
                        $result=$qm->getRecord("blog_post blg Left Join blog_cate blgc ON blg.cate=blgc.id","blg.id,blg.img,blg.tit,blg.srtdes,blg.lngdes,blg.dt,blgc.cate as blc");
                        //$result=$qm->getRecord("blog_post");
                        if (mysqli_num_rows($result)>0) { ?>
                            <?php while ($row=mysqli_fetch_array($result)) {?>
                              <div class="col-lg-6 grid-margin">
                                <div class="card h-100">
                                  <div class="">         
                                    <center style="padding: 20px;">
                                      <h3 style="font-size: 20px;overflow: hidden;"><?php echo $row['tit'];?></h3><hr>
                                      <img src="<?php echo $row["img"]=='' ? BLOG_URL.'noimg.png' : (file_exists(UPLOAD_BLOG_URL.$row["img"]) ? BLOG_URL.$row["img"] : BLOG_URL.'noimg.png'); ?>" style="height:150px;width:200px;" alt="image"><br/>
                                      <hr><h4><?php echo $row['blc'];?></h4><hr>
                                    </center>
                                    <div style="MARGIN-RIGHT: 50PX;MARGIN-LEFT: 50PX;">
                                      <p style="text-align:justify"><?php echo $row['srtdes']; ?></p>
                                      <p><?php echo $row['lngdes']; ?></p>
                                      <h4><b>Date :  </b><?php echo $row['dt']?></h4>
                                    </div>
                                    <div class="align-self-end btn btn-lg btn-block">
                                      <a class="btn btn-primary btn-sm " href="blog_post_update.php?id=<?php echo $row['id'];?>">Update</a>
                                      <a class="btn btn-danger btn-sm" href="blog_post.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure');">Delete</a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <?php } 
                          }else { ?>
                            <div class="col-lg-12 grid-margin">
                              <center><h4>No record found</h4></center>
                            </div>
                        <?php } ?>
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

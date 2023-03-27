<!DOCTYPE html>
<html lang="en">
<?php include "include/config.php"; $page='blog'; 
  
  if(isset($_GET['id'])) {
    if($_GET['id'] != '') {
      if(is_numeric($_GET['id'])) {
        $result=$qm->getRecord("blog_post blg Left Join blog_cate blgc ON blg.cate=blgc.id","blg.id,blg.img,blg.tit,blg.srtdes,blg.lngdes,blg.dt,blgc.cate as blc","blg.id=".$_GET['id']);
      } else { ?>
        <script>
          window.location="blog.php";
        </script>
      <?php exit; }
    } else { ?>
        <script>
          window.location="blog.php";
        </script>
    <?php exit; }
  } else { ?>
    <script>
      window.location="blog.php";
    </script>
    <?php exit;
  } ?>
  <head>
    <title>V | Blog</title>
    <?php include("include/head.php"); ?>
  </head>
  <body>
    <!-- ======= Header ======= -->
    <header id="header" class="heaer">
      <?php include("include/header.php"); ?>
    </header>
    <main id="main">
      <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
          <div class="d-flex justify-content-between align-items-center">
            <h2>Blog</h2>
            <ol>
              <li><a href="index.php">Home</a></li>
              <li><a href="blog.php">Blog</a></li>
              <li>Detail</li>
            </ol>
          </div>
        </div>
      </section>
      
      <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
          <div class="row">
            <div class="col-lg-8 entries">
              <?php 
              if (mysqli_num_rows($result) > 0) {
              $row=mysqli_fetch_array($result); ?>
              <article class="entry entry-single">
                <div class="entry-img">
                  <img src="<?php echo $row["img"]=='' ? BLOG_URL.'noimg.png' : (file_exists(UPL_BLOG_URL.$row["img"]) ? BLOG_URL.$row["img"] :  BLOG_URL.'noimg.png'); ?>" alt="" class="img-fluid">
                </div>
                <h2 class="entry-title">
                  <?php echo $row['tit']; ?>
                </h2>
                <div class="entry-meta">
                  <ul>
                    <li class="d-flex align-items-center">
                      <i class="bi bi-clock"></i><?php echo $row['dt'];?>&nbsp;&nbsp;
                      <i class="bi bi-people-fill"></i><?php echo $row['blc'];?>
                    </li>
                  </ul>
                </div>
                <div class="entry-content">
                  <p>
                    <?php echo $row['srtdes'];?>
                  </p>
                  <p>
                    <?php echo $row['lngdes'];?>
                  </p>
                </div>
              </article>
              <?php } ?> 
            </div>
            <div class="col-lg-4">
              <div class="sidebar">
                <h3 class="sidebar-title">Search</h3>
                <div class="sidebar-item search-form">
                  <form action="blog.php" method="post">
                    <input type="text" name="keyword">
                    <button type="submit" name="search"><i class="bi bi-search"></i></button>
                  </form>
                </div>
                <h3 class="sidebar-title">Categories</h3>
                <div class="sidebar-item categories">
                  <ul>
                    <?php 
                      $result=$qm->getRecord("blog_post blg  Left Join blog_cate blgc ON blg.cate=blgc.id Group By blgc.cate","blg.id,blg.img,blg.tit,blg.srtdes,blg.lngdes,blg.dt,blg.cate,blgc.cate as blc,count(blgc.cate) as blcount");
                      //$result=$qm->getRecord("blog_post Group By cate","cate,count(cate) as duplicates");
                      if (mysqli_num_rows($result) > 0) {
                        while ($row=mysqli_fetch_array($result)) { ?>
                      <li><a href="blog.php?id=<?php echo $row['cate']; ?>"><?php echo $row['blc']; ?><span>(<?php echo $row['blcount']; ?>)</span></a></li>
                    <?php } } ?>
                  </ul>
                </div>
                <h3 class="sidebar-title">Recent Posts</h3>
                <div class="sidebar-item recent-posts">
                  <?php $result=$qm->getRecord("blog_post","id,tit,dt,img","id order by id desc Limit 0,5");
                    if (mysqli_num_rows($result) > 0) {
                      while ($row=mysqli_fetch_array($result)) { ?>
                        <div class="post-item clearfix">
                          <img src="<?php echo $row["img"]=='' ? BLOG_URL.'noimg.png' : (file_exists(UPL_BLOG_URL.$row["img"]) ? BLOG_URL.$row["img"] :  BLOG_URL.'noimg.png'); ?>" alt="">
                          <h4><a href="blog-detail.php?id=<?php echo $row['id']; ?>" style="overflow: hidden;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 2;"><?php echo $row['tit']; ?></a></h4>
                          <time datetime="<?php echo $row['dt']; ?>"><?php echo $row['dt']; ?></time>
                        </div>
                  <?php } } ?>
                </div>
                <h3 class="sidebar-title">Tags</h3>
                <div class="sidebar-item tags">
                  <ul>
                    <li><a href="#">App</a></li>
                    <li><a href="#">IT</a></li>
                    <li><a href="#">Business</a></li>
                    <li><a href="#">Mac</a></li>
                    <li><a href="#">Design</a></li>
                    <li><a href="#">Office</a></li>
                    <li><a href="#">Creative</a></li>
                    <li><a href="#">Studio</a></li>
                    <li><a href="#">Smart</a></li>
                    <li><a href="#">Tips</a></li>
                    <li><a href="#">Marketing</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
    <!-- ======= Footer ======= -->
    <footer id="footer">
      <?php include("include/footer.php"); ?>
    </footer>
    <?php include("include/up-down.php"); include("include/footer-script.php") ?>
  </body>
</html>
<!DOCTYPE html>
<?php include "include/config.php"; $page='blog'; ?>
<html lang="en">
  <head>
    <title>V | Blog</title>
    <?php include("include/head.php"); ?>
  </head>
  <body>
    <!-- ======= Header ======= -->
    <header id="header" class="header">
      <?php include("include/header.php"); ?>
    </header>
    <main id="main">
      <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
          <div class="d-flex justify-content-between align-items-center">
            <h2>Blog</h2>
            <ol>
              <li><a href="index.php">Home</a></li>
              <li>Blog</li>
            </ol>
          </div>
        </div>
      </section>
      <!-- ======= Blog Section ======= -->
      <?php
        $limit = 3;  
        if(isset($_GET["page"])) {
          $page = $_GET["page"]; 
        }else{ 
          $page=1;
        }  
        $start_from = ($page-1) * $limit;
        $previous_page = $page - 1;
        $next_page = $page + 1; 
      
        if(isset($_GET['id']) && $_GET['id'] != '' && is_numeric($_GET['id'])) {
          $result=$qm->getRecord("blog_post blg Left Join blog_cate blgc ON blg.cate=blgc.id","blg.id,blg.img,blg.tit,blg.srtdes,blg.lngdes,blg.dt,blgc.cate as blc","blg.cate=".$_GET['id']);
        }
        elseif(isset($_POST['search'])) {   
          $keyword = '';  
          $query = explode(" ",$_POST["keyword"]);  
          foreach($query as $text)  
          {  
            $keyword .= "blg.tit LIKE '%".mysqli_real_escape_string($con, $text)."%' OR blg.srtdes LIKE '%".mysqli_real_escape_string($con, $text)."%' OR  blg.lngdes LIKE '%".mysqli_real_escape_string($con, $text)."%' OR ";  
          }  
          $keyword = substr($keyword, 0, -4); 
          $result=$qm->getRecord("blog_post blg Left Join blog_cate blgc ON blg.cate=blgc.id","blg.id,blg.img,blg.tit,blg.srtdes,blg.lngdes,blg.dt,blgc.cate as blc",$keyword);
        }
        else {
          $result=$qm->customQuery("SELECT blg.id, blg.img, blg.tit, blg.srtdes, blg.lngdes, blg.dt, blgc.cate AS blc FROM blog_post blg LEFT JOIN blog_cate blgc ON blg.cate = blgc.id LIMIT $start_from,$limit");
          // $result=$qm->getRecord("blog_post blg Left Join blog_cate blgc ON blg.cate=blgc.id","blg.id,blg.img,blg.tit,blg.srtdes,blg.lngdes,blg.dt,blgc.cate as blc","Limit 0,1");
        } ?>
      <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
          <div class="row">
          <?php 
            if (mysqli_num_rows($result) > 0) {
            while ($row=mysqli_fetch_array($result)) { ?>
            <div class="col-lg-4 entries">
                <article class="entry">
                  <div class="entry-img">
                    <img src="<?php echo $row["img"]=='' ? BLOG_URL.'noimg.png' : (file_exists(UPL_BLOG_URL.$row["img"]) ? BLOG_URL.$row["img"] :  BLOG_URL.'noimg.png'); ?>" alt="" class="img-fluid">
                  </div>
                  <h2 class="entry-title">
                    <a href="blog-detail.php?id=<?php echo $row['id'];?>"><?php echo $row['tit']; ?></a>
                  </h2>
                  <div class="entry-meta">
                    <ul>
                      <li class="d-flex align-items-center"><i class="bi bi-clock"></i><?php echo $row['dt'];?></a></li>&nbsp;&nbsp;
                      <i class="bi bi-people-fill"></i><?php echo $row['blc'];?>
                    </ul>
                  </div>
                  <div class="entry-content">
                    <p>
                      <?php echo $row['srtdes']; ?>
                    </p>
                    <div class="read-more">
                      <a href="blog-detail.php?id=<?php echo $row['id']; ?>">Read More</a>
                    </div>
                  </div>
                </article>
            </div>
            <?php } } 
                $result=$qm->customQuery("SELECT COUNT(id) FROM blog_post"); 
                if (mysqli_num_rows($result)>0) {
                  $row=mysqli_fetch_array($result);   
                  $total_records = $row[0]; 
                } 
                $total_pages = ceil($total_records / $limit); //count page ?>
            <div class="blog-pagination">
                <ul class="justify-content-center">    
                  <li <?php if($page <= 1){ echo "class='disabled'"; }else { echo "class='active'"; } ?>>
                    <a <?php if($page > 1){ echo "href='?page=$previous_page'"; } ?>>Previous</a>
                  </li>   
                  <li <?php if($page >= $total_pages){ echo "class='disabled'"; } else { echo "class='active'"; }?>>
                    <a <?php if($page < $total_pages) { echo "href='?page=$next_page'"; } ?>>Next</a>
                  </li>
                </ul>
              </div>
            <!-- <div class="col-lg-4">
              <div class="sidebar">
                <h3 class="sidebar-title">Search</h3>
                <div class="sidebar-item search-form">
                  <form action="" method="post">
                    <input type="text" placeholder="Search heare.." name="keyword" required value="<?php echo isset($_POST['keyword']) ? $_POST['keyword'] : '' ?>">
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
                    <li><a href="javascript:void(0)">App</a></li>
                    <li><a href="javascript:void(0)">IT</a></li>
                    <li><a href="javascript:void(0)">Business</a></li>
                    <li><a href="javascript:void(0)">Mac</a></li>
                    <li><a href="javascript:void(0)">Design</a></li>
                    <li><a href="javascript:void(0)">Office</a></li>
                    <li><a href="javascript:void(0)">Creative</a></li>
                    <li><a href="javascript:void(0)">Studio</a></li>
                    <li><a href="javascript:void(0)">Smart</a></li>
                    <li><a href="javascript:void(0)">Tips</a></li>
                    <li><a href="javascript:void(0)">Marketing</a></li>
                  </ul>
                </div>
              </div>
            </div> -->
          </div>
        </div>
      </section>
    </main>
    <!-- ======= Footer ======= -->
    <footer id="footer">
      <?php include("include/footer.php"); ?>
    </footer>
    <?php include("include/up-down.php"); include("include/footer-script.php"); ?>
  </body>
</html>
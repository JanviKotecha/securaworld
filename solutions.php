<!DOCTYPE html>
<?php include "include/config.php"; $page='solutions'; ?>
<html lang="en">
  <head>
    <title>Solutions</title>
    <?php include("include/head.php"); ?>
  </head>
  <body>
    <!-- ======= Header ======= -->
    <header id="header" class="header">
      <?php include("include/header.php"); ?>
    </header>
    <main id="main">
    <section id="hero">
      <div class="carousel-item active" style="background-image: url(images/bg/solution.png)">
        <div class="carousel-container">
          <div class="container">
            <h2 class="animate__fadeInDown">- Solutions </h2>
          </div>
        </div>
      </div>
    </section>
    <section >
      <div class="carousel-container">
        <div class="container">
          <h2 class="h2" style="margin-top:10px !important;margin-bottom:10px !important">Solutions</h2>
          <p>The SECURA AI suite has in built comprehensive cluster of advanced Video Analytic Algorithms. 
              Each Video Analytic Module is coupled with Incident-Event- Action framework.
              The SECURA Video Analytics is equipped with False Alarm Suppression Technology (FAST) which minimizes false alarms and further strengthens the solution reliability.</p>
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
      
        // if(isset($_GET['id']) && $_GET['id'] != '' && is_numeric($_GET['id'])) {
        //   $result=$qm->getRecord("solution blg Left Join blog_cate blgc ON blg.cate=blgc.id","blg.id,blg.img,blg.tit,blg.srtdes,blg.lngdes,blg.dt,blgc.cate as blc","blg.cate=".$_GET['id']);
        // }
        // elseif(isset($_POST['search'])) {   
        //   $keyword = '';  
        //   $query = explode(" ",$_POST["keyword"]);  
        //   foreach($query as $text)  
        //   {  
        //     $keyword .= "blg.tit LIKE '%".mysqli_real_escape_string($con, $text)."%' OR blg.srtdes LIKE '%".mysqli_real_escape_string($con, $text)."%' OR  blg.lngdes LIKE '%".mysqli_real_escape_string($con, $text)."%' OR ";  
        //   }  
        //   $keyword = substr($keyword, 0, -4); 
        //   $result=$qm->getRecord("solution blg Left Join blog_cate blgc ON blg.cate=blgc.id","blg.id,blg.img,blg.tit,blg.srtdes,blg.lngdes,blg.dt,blgc.cate as blc",$keyword);
        // }
        // else {
         // $result=$qm->customQuery("SELECT blg.id, blg.img, blg.tit, blg.srtdes, blg.lngdes, blg.dt, blgc.cate AS blc FROM solution blg LEFT JOIN blog_cate blgc ON blg.cate = blgc.id LIMIT $start_from,$limit");
          //$result=$qm->getRecord("solution blg Left Join blog_cate blgc ON blg.cate=blgc.id","blg.id,blg.img,blg.tit,blg.srtdes,blg.lngdes,blg.dt,blgc.cate as blc","Limit 0,1");
          $result=$qm->customQuery("SELECT * FROM solution LIMIT $start_from,$limit");
       // } ?>
      <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
          <div class="row">
          <?php 
            if (mysqli_num_rows($result) > 0) {
            while ($row=mysqli_fetch_array($result)) { ?>
            <div class="col-lg-4 entries">
                <article class="entry h-100">
                  <div class="entry-img">
                    <img src="<?php echo $row["img"]=='' ? SOLUTION_URL.'noimg.png' : (file_exists(UPL_SOLUTION_URL.$row["img"]) ? SOLUTION_URL.$row["img"] :  SOLUTION_URL.'noimg.png'); ?>" alt="" class="img-fluid">
                  </div>
                  <h2 class="entry-title">
                    <a href="blog-detail.php?id=<?php echo $row['id'];?>"><?php echo $row['tit']; ?></a>
                  </h2>
                  <div class="entry-content">
                    <p>
                      <?php echo $row['des']; ?>
                    </p>
                    <div class="read-more">
                      <a href="blog-detail.php?id=<?php echo $row['id']; ?>">Read More</a>
                    </div>
                  </div>
                </article>
            </div>
            <?php } } 
                $result=$qm->customQuery("SELECT COUNT(id) FROM solution"); 
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
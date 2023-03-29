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
      <?php
        $limit = 6;  
        if(isset($_GET["page"])) {
          $page = $_GET["page"]; 
        }else{ 
          $page=1;
        }  
        $start_from = ($page-1) * $limit;
        $previous_page = $page - 1;
        $next_page = $page + 1;
        $result=$qm->customQuery("SELECT * FROM solution LIMIT $start_from,$limit"); ?>
      <section class="solution" >
        <div class="container" data-aos="fade-up">
          <div class="row">
          <?php 
            if (mysqli_num_rows($result) > 0) {
            while ($row=mysqli_fetch_array($result)) { ?>
              <div class="col-lg-4 entries" style="padding-bottom:25px" id="solution">
                <article class="entry h-100">
                  <div class="entry-img">
                    <img src="<?php echo $row["img"]=='' ? SOLUTION_URL.'noimg.png' : (file_exists(UPL_SOLUTION_URL.$row["img"]) ? SOLUTION_URL.$row["img"] :  SOLUTION_URL.'noimg.png'); ?>">
                  </div>
                  <h2 class="entry-title">
                    <a href="solution_detail.php?id=<?php echo $row['id'];?>" style="font-size:20px!important"><?php echo $row['tit']; ?></a>
                  </h2>
                  <div class="entry-body">
                    <p style="overflow: hidden;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 3;"> <?php echo $row['des']; ?><br></p>
                  </div>
                  <div class="card-footerr">
                    <b><a href="solution_detail.php?id=<?php echo $row['id']; ?>" style="">Read More</a></b>
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
              <div class="solution-pagination">
                <ul class="justify-content-center" >    
                  <li style="list-style: none !important;list-style-type: none !important;" <?php if($page <= 1){ echo "class='disable'"; }else { echo "class='active'"; } ?>>
                    <a <?php if($page > 1){ echo "href='?page=$previous_page'"; } ?>><b><i class="bx bx-chevron-left"></i></b></a>
                  </li>
                  <?php
                    for ($i=1; $i<=$total_pages; $i++) {  ?>
                      <li class='disable' style="list-style: none !important;list-style-type: none !important;">
                        <a <?php if($page < $total_pages) { echo "href='?page=$i#solution''"; } ?>><?php echo $i ?></a>
                      </li>
                  <?php }; ?>
                  <li style="list-style: none !important;list-style-type: none !important;" <?php if($page >= $total_pages){ echo "class='activee'"; } else { echo "class='disable'"; }?>>
                    <a <?php if($page < $total_pages) { echo "href='?page=$next_page#solution''"; } ?>><b><i class="bx bx-chevron-right"></i></b></a>
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
<!DOCTYPE html>
 <?php include "include/config.php";  $page='secura'; ?>
<html lang="en">
  <head>
    <title>Home</title>
    <style>
      a:hover{
        color:white !important;
      }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <?php include("include/head.php");?>
    <?php
        $limit = 3;  
        if(isset($_GET["page"])) {
          $page = $_GET["page"]; 
        }else{ 
          $page=1;
        }  
        $start_from = ($page-1) * $limit;
        $previous_page = $page - 1;
        $next_page = $page + 1; ?>
        <script type="text/javascript">
          $("document").ready(function() {
          setTimeout(function() {
            $("#f1").click();
          },1000);
          });
        </script>
  </head>
  <body>
  <header class="header" id="header">
      <?php include("include/header.php")?>
    </header>
    <main id="main">
      <section id="about" class="about">
        <div class="container">
          <div class="row content">
            <div class="col-lg-6">
              <h2>AI Powered Video Analytics for CCTV Surveillance</h2>
              <h5>Secura AI-based intelligent video analytics is the power behind the CCTV surveillance in many Smart Cities, Airports, Railways and Law Enforcemnt Agencies</h5>
              <a class="btn" href="products.php">Explore</a>
            </div>
            <div class="col-lg-6">
              <center><img src="images/bg/home.png" alt="" style="max-width:75%"></center>
            </div>
          </div>
        </div>
      </section>
       <!-- ======= 2 nd Section ======= -->
      <section id="team" class="team section-bg2 section">
        <div class="container">
          <div class="row">
            <div class="col-lg-3 mt-4">
              <div class="member d-flex h-100">
                <div class="member-info" >
                <img src="images/bg/home3.png" class="img-fluid" alt="" >
                  <h4>Integrity</h4>
                  <p>Secura commits itself to act with integrity to employees, customers and shareholders at all times.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-3 mt-4">
              <div class="member d-flex h-100">
                <div class="member-info" >
                <img src="images/bg/home5.png" class="img-fluid" alt="">
                  <h4>Quality</h4>
                  <p>Secura products have been tested for quality and performance offering end users complete reliability.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-3 mt-4 ">
              <div class="member d-flex h-100">
                <div class="member-info" >
                <img src="images/bg/home4.png" class="img-fluid" alt="">
                  <h4>Innovation</h4>
                  <p>Secura is an R&D led organization which prides in its innovative products and solutions.?</p>
                </div>
              </div>
            </div>
            <div class="col-lg-3 mt-4 ">
              <div class="member d-flex h-100">
                <div class="member-info" >
                <img src="images/bg/home6.png" class="img-fluid" alt="">
                  <h4>Support</h4>
                  <p>With our operation excellence, we aim for customer delight in all our transactions.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
       <!-- ======= 3 rd Section ======= -->
      <section id="about" class="about">
        <div class="container">
          <div class="row content">
          <div class="col-lg-6">
              <img src="images/bg/home7.png" alt="" class="pion">
            </div>
            <div class="col-lg-6 right" >
              <h2 >A pioneer in Video Surveillance and Analytics</h2>
              <h5>Secura is a pioneer in the Indian Electronic Surveillance Industry with widest CCTV deployment pan India. Our biggest goal is to bring you peace of mind, through state-of-the-art surveillance solutions that are consistently strengthened through innovation.The quality of our offerings reflects in our diverse clientele, ranging from high-profile government and public sector departments to numerous private sector clients and homeowners. Secura products are made in India, using indigenous R&D and manufacturing processes, ensuring 100% data security.</h5>
              <a class="btn" href="solutions.php">Read More</a>
            </div>
          </div>
        </div>
      </section>
       <!-- ======= 4 Section ======= -->
      <section id="about" class="about">
        <div class="container">
          <div class="row content">
            <div class="col-lg-6">
              <h2>A pioneer in Video Surveillance and Analytics</h2>
              <h5>Secura is a pioneer in the Indian Electronic Surveillance Industry with widest CCTV deployment pan India. Our biggest goal is to bring you peace of mind, through state-of-the-art surveillance solutions that are consistently strengthened through innovation. The quality of our offerings reflects in our diverse clientele, ranging from high-profile government and public sector departments to numerous private sector clients and homeowners. Secura products are made in India, using indigenous R&D and manufacturing processes, ensuring 100% data security.</h5>
              <a class="btn">Read More</a>
            </div>
            <div class="col-lg-6">
              <center><img src="images/bg/home8.png" alt="" style="max-width:75%"></center>
            </div>
          </div>
        </div>
      </section>

      <section id="about" class="about">
        <div class="container">
          <div class="row content">
              <div class="col-lg-12" style="text-align:center">
                <h2 >Industries we make impact</h2>
                <h5>Secura offers solutions for a wide spectrum of industries. Carefully designed, these solutions deliver  <br>comprehensive coverage for effective and efficient security.<br></h5>
              </div>
              <div class="col-lg-4 center" >
                <img src="images/bg/home10.png" alt="">
                <h5 >Goverment</h5>
              </div>
              <div class="col-lg-4 center" >
                <img src="images/bg/home9.png" alt="">
                <h5 >City Surveillance</h5>
              </div>
              <div class="col-lg-4 center" >
                <img src="images/bg/home12.png" alt="">
                <h5 >Healthcare</h5>
              </div>
              <div class="col-lg-4 center" >
                <img src="images/bg/home13.png" alt="">
                <h5 >Transportation</h5>
              </div>
              <div class="col-lg-4 center" >
                <img src="images/bg/home15.png" alt="">
                <h5 >Banking & Finance</h5>
              </div>
              <div class="col-lg-4 center" >
                <img src="images/bg/home14.png" alt="">
                <h5 >Institutions</h5>
              </div>
          </div>
        </div>
      </section>
      <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
          <div class="row content">
            <div class="col-lg-12" style="text-align:center">
              <h2 class="h2">Choose Services</h2>
            </div>
          <?php 
            $result=$qm->customQuery("SELECT * FROM solution Limit 0,3"); 
            if (mysqli_num_rows($result) > 0) {
            while ($row=mysqli_fetch_array($result)) { ?>
            <div class="col-lg-4 entries" style="margin-bottom:20px !important">
                <article class="entry h-100">
                  <div class="entry-img">
                    <img src="<?php echo $row["img"]=='' ? SOLUTION_URL.'noimg.png' : (file_exists(UPL_SOLUTION_URL.$row["img"]) ? SOLUTION_URL.$row["img"] :  SOLUTION_URL.'noimg.png'); ?>" style="padding:25px;width:100%;height:250px !important;">
                  </div>
                  <h2 class="entry-title">
                    <a href="solution_detail.php?id=<?php echo $row['id'];?>" style="font-size:20px!important"><?php echo $row['tit']; ?></a>
                  </h2>
                  <div class="entry-body">
                    <p style="overflow: hidden;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 3;"> <?php echo $row['des']; ?><br></p>
                  </div>
                  <div class="card-footerr" style="text-align:center">
                    <b><a href="solution_detail.php?id=<?php echo $row['id']; ?>">Read More</a></b>
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
        </div>
      </section>
      <section id="about" class="about mb-5">
        <div class="container">
          <div class="row content">
            <div class="col-lg-12">
              <h5 class="txt ms-4">PRODUCTS</h5>
              <h2 style="margin-top:0px !important" class="ms-4">Explore by category</h2>
            </div>
          </div>
        </div>
        <div class="container mt-5" style="margin-top: 0rem!important;">
          <div class="tab ms-1">
          <?php 
          $gal = array();
          $result=$qm->getRecord("product"); 
            if (mysqli_num_rows($result)>0) {
              while ($row=mysqli_fetch_array($result)) { 
              $gal[]=$row; ?>
            <button class="" onclick="openTab(event, '<?php echo $row['tit'];?>', 'arrow<?php echo $row['id']; ?>')"  <?php  if($row['id'] == '1') { ?>id='defaultOpen' <?php } ?> >
              <img src="<?php echo $row["img"]=='' ? PRODUCT_URL.'noimg.png' : (file_exists(UPL_PRODUCT_URL.$row["img"]) ? PRODUCT_URL.$row["img"] :  PRODUCT_URL.'noimg.png'); ?>" alt="" class="leftImg">
              <span id="arrow<?php echo $row['id']; ?>" ></span>
            </button>
            <?php } } ?>
          </div>
          <?php foreach ($gal as $g) { ?>
          <div id="<?php echo $g['tit']; ?>" class="tabcontent mt-1">
            <div style="display :flex; justify-content: center;">
              <img src="<?php echo $g["img"]=='' ? PRODUCT_URL.'noimg.png' : (file_exists(UPL_PRODUCT_URL.$g["img"]) ? PRODUCT_URL.$g["img"] :  PRODUCT_URL.'noimg.png'); ?>" alt="" class="pion2 mt-2" style="display:flex; justify-content: center;">
            </div>
            <div class="mb-2 nheading" style="display :flex; justify-content: space-between;">
              <h3><?php echo $g['tit']; ?></h3>
              <a href="products.php" style="text-decoration:none !important;padding:15px;" class="viewBtn">View All</a>
            </div>
            <p><b>Model No : <?php echo $g['modno'] ?></b></p>
            <p><?php echo nl2br($g['lngdes']); ?></p>
          </div>
          <?php } ?>
      
        </div>
      </section>


    </main>
    <!-- ======= Footer ======= -->
    <footer id="footer">
      <?php include("include/footer.php"); ?>
    </footer>
    <?php include("include/up-down.php"); include("include/footer-script.php");?>
    <script>
  function openTab(evt, Services, arrows) {
    var i, tabcontent, tablinks, tabArrow;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
     
    tabArrow = document.getElementsByClassName("arrow");
    for (i = 0; i < tabArrow.length; i++) {
      tabArrow[i].style.display = "none";
    }
   
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
     
    document.getElementById(arrows).style.display = "block";
    document.getElementById(Services).style.display = "block";
    evt.currentTarget.className += " active";
   
  }
   
  // Get the element with id="defaultOpen" and click on it
  document.getElementById("defaultOpen").click();
</script>
  </body>
</html>
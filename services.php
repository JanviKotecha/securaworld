<!DOCTYPE html>
<?php include "include/config.php";  $page='service'; ?>
<html lang="en">
  <head>
    <title>V | Service</title>
    <?php include("include/head.php");  ?>
  </head>
  <body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
      <?php include("include/header.php"); ?>
    </header>
    <main id="main">
      <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
          <div class="d-flex justify-content-between align-items-center">
            <h2>Services</h2>
            <ol>
              <li><a href="index.php">Home</a></li>
              <li>Services</li>
            </ol>
          </div>
        </div>
      </section>
      <!-- ======= Services Section ======= -->
      <section id="services" class="services">
        <div class="container">
          <div class="row">
          <?php $result=$qm->getRecord("services");
          if (mysqli_num_rows($result)>0) {
            while ($row=mysqli_fetch_array($result)) { ?>
            <div class="col-md-6 mt-4 mt-md-0">
              <div class="icon-box">
                <img src="<?php echo $row["img"]=='' ? SERVICES_URL.'noimg.png' : (file_exists(UPL_SERVICES_URL.$row["img"]) ? SERVICES_URL.$row["img"] :  SERVICES_URL.'noimg.png'); ?>" style="height:50px;width:50px;float: left;">
                <h4><a href="javascript:void(0)"><?php echo $row['tit']; ?></a></h4>
                <p style="text-align: justify;-webkit-line-clamp: 5; overflow: hidden;display: -webkit-box;-webkit-box-orient: vertical;"><?php echo $row['des']; ?></p>
                <div class="" style="padding-bottom: 25px !important;">
                  <?php 
                    if($row['lintyp'] == 'Inner') { ?>
                      <a href="" class="btn"style="float:right;text-decoration: none;"><i class="bi bi-arrow-right-short" style="color:white; font-size: 30px;"></i></a>
                   <?php  } 
                  if($row['lintyp'] == 'Outer') { ?>
                      <a href="" class= "btn" target="_blank" style="float: right;text-decoration: none;"><i class="bi bi-arrow-right-short" style="color:white; font-size: 30px;"></i></a>
                   <?php  } ?>
                </div>
              </div>
            </div>
          <?php } } ?>
          </div>
        </div>
      </section>
      <!-- ======= Features Section ======= -->
      <section id="features" class="features">
        <div class="container">
          <div class="section-title">
            <h2>Features</h2>
            <p>Recent Update</p>
          </div>
          <div class="row">
            <div class="col-lg-3">
              <ul class="nav nav-tabs flex-column">
                <?php 
                $ary = array();
                $b=0;
                $result=$qm->getRecord("recent_update");
                if (mysqli_num_rows($result)>0) {  
                  while ($row=mysqli_fetch_array($result)) {
                    $ary[] = $row; ?>
                    <li class="nav-item">
                      <a class="nav-link <?php echo $b == 0 ? 'show active' : '' ; $b++; ?>" data-bs-toggle="tab" href="#tab-<?php echo $row['id'];?>"><?php echo $row['hdin']; ?></a>
                    </li>
                <?php  } } ?>
              </ul>
            </div>
            <div class="col-lg-9 mt-4 mt-lg-0">
              <div class="tab-content">
                <?php $b=0;
                foreach($ary as $ar) { ?>
                  <div class="tab-pane <?php echo $b == 0 ? 'show active' : '' ; $b++; ?>" id="tab-<?php echo $ar['id'];?>">
                    <div class="row">
                      <div class="col-lg-8 details order-2 order-lg-1">
                        <h3><?php echo $ar['tit']; ?></h3>
                        <p><?php echo $ar['des']; ?></p>
                      </div>
                      <div class="col-lg-4 text-center order-1 order-lg-2">
                        <img src="<?php echo $ar["img"]=='' ? RIMG_URL.'noimg.png' : (file_exists(UPL_RIMG_URL.$ar["img"]) ? RIMG_URL.$ar["img"] :  RIMG_URL.'noimg.png'); ?>" alt="" class="img-fluid">
                      </div>
                    </div>
                  </div>
              <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
    <footer id="footer">
      <?php include("include/footer.php"); ?>
    </footer>
    <?php include("include/up-down.php"); include("include/footer-script.php") ?>
  </body>
</html>
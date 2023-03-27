<!DOCTYPE html>
<?php include "include/config.php";  $page='about'; ?>
<html lang="en">
  <head>
    <title>V | About</title>
    <?php include("include/head.php"); ?>
  </head>
  <body><!-- ======= Header ======= -->
    <header id="header" class="header">
      <?php include("include/header.php"); ?>
    </header>
    <main id="main">
    <section id="hero">
      <div class="carousel-item active" style="background-image: url(images/bg/about.png)">
        <div class="carousel-container">
          <div class="container">
            <h2 class="animate__fadeInDown">- About  <span style="background: linear-gradient(70.76deg, #E71D25 4.27%, #F37E60 74.51%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;background-clip: text;">Us</span></h2>
          </div>
        </div>
      </div>
    </section>
   
      <section >
        <div class="carousel-container">
          <div class="container">
            <h2 class="h2" style="margin-top:10px !important;margin-bottom:10px !important">About  <span style="background: linear-gradient(70.76deg, #E71D25 4.27%, #F37E60 74.51%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;background-clip: text;">Us</span></h2>
            <?php $result=$qm->getRecord("about");
            if (mysqli_num_rows($result)>0) {
              $row=mysqli_fetch_array($result); ?>
                <p style="text-align: justify;"><?php echo $row['a_desc']; ?></p>
                <div class="row row-cols-2 g-3" >
                  <div class="col" style="padding:10px">
                    <div class="card mb-3 h-100" style="max-width: 540px;border-radius: 127.5px;">
                      <div class="row g-0">
                        <div class="col-md-4" style="padding:30px">
                          <img src="<?php echo $row["v_img"]=='' ? ABOUT_URL.'noimg.png' : (file_exists(UPL_ABOUT_URL.$row["v_img"]) ? ABOUT_URL.$row["v_img"] :  ABOUT_URL.'noimg.png'); ?>" 
                            class="img-fluid rounded-start"
                          />
                        </div>
                        <div class="col-md-8">
                          <div class="card-body">
                            <p class="txt">VISION</h5>
                            <p class="card-text">
                              <?php echo $row['v_cont']; ?>
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col" style="padding:10px">
                    <div class="card mb-3 h-100" style="max-width: 540px;border-radius: 127.5px;">
                      <div class="row g-0">
                        <div class="col-md-4" style="padding:30px">
                          <img
                          src="<?php echo $row["m_img"]=='' ? ABOUT_URL.'noimg.png' : (file_exists(UPL_ABOUT_URL.$row["m_img"]) ? ABOUT_URL.$row["m_img"] :  ABOUT_URL.'noimg.png'); ?>" 
                            class="img-fluid rounded-start"
                          />
                        </div>
                        <div class="col-md-8">
                          <div class="card-body">
                            <h5 class="txt">MISSION</h5>
                            <p class="card-text">
                              <?php echo $row['m_cont']; ?>   
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div>
                <section id="about" class="about">
                  <div class="container">
                    <div class="row content">
                        <div class="col-lg-12" style="text-align:center">
                          <h2 >Our Milestone</h2>
                          <p>A timeline of some of the notable events in our history from 1997 to the present day.</p><br><br>
                          <img  style="max-width:100%"  src="<?php echo $row["mi_img"]=='' ? ABOUT_URL.'noimg.png' : (file_exists(UPL_ABOUT_URL.$row["mi_img"]) ? ABOUT_URL.$row["mi_img"] :  ABOUT_URL.'noimg.png'); ?>" />
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
            <?php } ?>
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
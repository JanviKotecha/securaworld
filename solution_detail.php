<!DOCTYPE html>
<html lang="en">
<?php include "include/config.php"; $page='solutions'; 
  
  if(isset($_GET['id'])) {
    if($_GET['id'] != '') {
      $a=base64_decode($_GET['id']);
      if(is_numeric($a)) {
        $result=$qm->getRecord("solution","*","id=".base64_decode($_GET['id']));
        if(mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_array($result);
        } else { ?>
          <script>
          window.location="solutions";
        </script>
        <?php } 
      } else { ?>
        <script>
          window.location="solutions";
        </script>
      <?php exit; }
    } else { ?>
        <script>
          window.location="solutions";
        </script>
    <?php exit; }
  } else { ?>
    <script>
      window.location="solutions";
    </script>
    <?php exit;
  } ?>
  <head>
    <title>Solutions</title>
    <?php include("include/head.php"); ?>
  </head>
  <style>
    h1,h2,h3,h4,h5,h6,p,li,span,a{
      text-align:left;
    }
  </style>
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
            <h2 class="animate__fadeInDown">Solutions Detail </h2>
          </div>
        </div>
      </div>
    </section>
      
      <section id="solutions" class="solutions">
        <div class="container" data-aos="fade-up">
          <div class="row">
            <div class="col-lg-12 entries">
              <?php 
               $result=$qm->getRecord("solution","*","id=".base64_decode($_GET['id']));
              if (mysqli_num_rows($result) > 0) {
              $row=mysqli_fetch_array($result); ?>
              <article class="entry entry-single">
                <div class="entry-img">
                  <img src="<?php echo $row["img"]=='' ? SOLUTION_URL.'noimg.png' : (file_exists(UPL_SOLUTION_URL.$row["img"]) ? SOLUTION_URL.$row["img"] :  SOLUTION_URL.'noimg.png'); ?>" alt="" class="img-fluid">
                </div>
                <h2 class="entry-title">
                  <br><?php echo $row['tit']; ?>
                </h2>
               
                <div class="entry-content">
                  <p>
                    <?php echo $row['des'];?>
                  </p>
                  <p>
                    <?php echo $row['ldesc'];?>
                  </p>
                </div>
              </article>
              <?php } ?> 
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
<!DOCTYPE html>
<?php include "include/config.php";  $page='about'; ?>
<html lang="en">
  <head>
    <title>V | About</title>
    <?php include("include/head.php"); ?>
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
            <h2>Testimonials</h2>
            <ol>
              <li><a href="index.php">Home</a></li>
              <li>Testimonials</li>
            </ol>
          </div>
        </div>
      </section>
      <!-- ======= Testimonials Section ======= -->
      <section id="testimonials" class="testimonials">
        <div class="container">
          <div class="row">
            <?php $result=$qm->getRecord("customer");
            if (mysqli_num_rows($result)>0) {
            while ($row=mysqli_fetch_array($result)) { ?>
            <div class="col-lg-6">
              <div class="testimonial-item mt-4">
                <h3><?php echo $row['nm']; ?></h3>
                <h4><?php echo $row['desi']; ?></h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  <?php echo $row['rev']; ?>
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div>
          <?php } } ?>
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
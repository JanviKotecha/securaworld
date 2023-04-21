<!DOCTYPE html>
<?php include "include/config.php";  $page='ewaste'; ?>
<html lang="en">
  <head>
    <title>E-Waste</title>
    <?php include("include/head.php"); ?>
  </head>
  <body><!-- ======= Header ======= -->
    <header id="header" class="header">
      <?php include("include/header.php"); ?>
    </header>
    <main id="main">
    <section id="hero">
      <div class="carousel-item active" style="background-image: url(images/bg/ewaste.png)">
        <div class="carousel-container">
          <div class="container">
            <h2 class="animate__fadeInDown">— E-Wast<span style="background: linear-gradient(70.76deg, #E71D25 4.27%, #F37E60 74.51%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;background-clip: text;">e</span></h2>
          </div>
        </div>
      </div>
    </section>
    <section>
        <div class="container" data-aos="fade-up">
          <div class="row">
            <div class="col-lg-3">
            <h4>Product Categories </h4><br>
                <div class="sidebar">
                    <div class="sidebar-item categories">
                        <?php 
                        $result = $qm->getRecord("product_cate");
                        if (mysqli_num_rows($result) > 0) {
                            while ($row=mysqli_fetch_array($result)) { ?>
                              <a href="product_category.php?cid=<?php echo $row['id']; ?>" class="category"><?php echo $row['categoryName']?></a><br><br><br>    
                        <?php } } ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 subLeft3">
                <?php $result=$qm->getRecord("ewaste");
                if (mysqli_num_rows($result)>0) {
                    $row=mysqli_fetch_array($result); ?>
                <p style="text-align: justify;"><?php echo $row['des']; ?></p>
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
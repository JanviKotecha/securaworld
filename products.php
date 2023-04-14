<!DOCTYPE html>
<?php include "include/config.php"; $page='products'; ?>
<html lang="en">
  <head>
    <title>Product</title>
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
            <h2 class="animate__fadeInDown">- Product<span style="background: linear-gradient(70.76deg, #E71D25 4.27%, #F37E60 74.51%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;background-clip: text;">s</span></h2>
          </div>
        </div>
      </div>
    </section>
      <section class="blog" >
        <div class="container" data-aos="fade-up">
        <h2 class="h2" style="margin-top:10px !important;margin-bottom:10px !important">Product categories <br></h2>
          <div class="row">
          <?php 
             $result=$qm->getRecord("product pro Left Join product_cate proc ON pro.category=proc.id Group By proc.categoryName","pro.id,pro.img,pro.tit,pro.lngdes,pro.dt,pro.category,proc.categoryName as procat,proc.img as blc,count(proc.categoryName) as blcount");
             //$result=$qm->getRecord("product Group By cate","cate,count(cate) as duplicates");
            if (mysqli_num_rows($result) > 0) {
              while ($row=mysqli_fetch_array($result)) { ?>
            <div class="card" style="width: 18rem;margin:10px;padding-top:10px;background:#F9F9F9;border-radius: 20px;border:0px">
              <img class="card-img-top" src="<?php echo $row["img"]=='' ? PRODUCT_URL.'noimg.png' : (file_exists(UPL_PRODUCT_URL.$row["blc"]) ? PRODUCT_URL.$row["blc"] :  PRODUCT_URL.'noimg.png'); ?>" alt="Card image cap" style="padding-right:20px;padding-left:20px;">
              <div class="card-body" style="text-align:center;font-weight:400;font-size:18px">
                <a href="blog.php?id=<?php echo $row['category']; ?>" style="color:#7D7D7D;"><?php echo $row['procat']; ?></a>
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
    <?php include("include/up-down.php"); include("include/footer-script.php"); ?>
  </body>
</html>
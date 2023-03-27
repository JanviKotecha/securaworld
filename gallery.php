<!DOCTYPE html>
<?php include "include/config.php"; $page='gallery'; ?>
<html lang="en">
  <head>
    <title>V | Gallery</title>
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
            <h2>Gallery</h2>
            <ol>
              <li><a href="index.php">Home</a></li>
              <li>Gallery</li>
            </ol>
          </div>
        </div>
      </section>
      <!-- ======= Portfolio Section ======= -->
      <?php 
      $gal = array();
      $result=$qm->getRecord("gallery_category gac Left Join gallery ga On gac.id=ga.category","ga.id,gac.id as cid,ga.category,ga.image,gac.category as cate","gac.id=ga.category");?>
      <section id="portfolio" class="portfolio">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 d-flex justify-content-center">
              <ul id="portfolio-flters"> 
                <li data-filter="*" class="filter-active">All</li>
                <?php if (mysqli_num_rows($result)>0) {
                $ct = ",";
                while ($row=mysqli_fetch_array($result)) {
                $gal[]=$row;
                $che=strpos($ct,$row['cid']);
                  if($che == "") {
                    $ct .= $row['cid'].","; ?>
                    <li data-filter=".filter-<?php echo str_replace(' ','',$row['cate']); ?>" ><?php echo $row['cate']; ?></li>
                <?php }
                } } ?>
              </ul>
            </div>
          </div>
          <div class="row portfolio-container">
            <?php foreach ($gal as $g) { ?>
            <div class="col-lg-4 col-md-6 portfolio-item filter-<?php echo str_replace(' ','',$g['cate']); ?>">
              <div class="portfolio-wrap">
                <img src="<?php echo GALLERY_URL.$g['image']?>" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <div class="portfolio-links">
                    <a href="<?php echo GALLERY_URL.$g['image']?>" data-gallery="portfolioGallery" class="portfolio-lightbox" ><i class="bi bi-eye-fill"></i></a>
                  </div>
                </div>
              </div>
            </div>
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
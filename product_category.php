<?php if(isset($_POST['submit']) || isset($_GET['catid']) || isset($_GET['subcatid']) || isset($_GET['cid']))  {  ?>
<!DOCTYPE html>
<?php include "include/config.php"; $page='products'; ?>
<html lang="en">
  <head>
    <title>Product</title>
    <?php include("include/head.php");
    ?>
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
      <section class="blog"  style="padding:0px !important">
        <div class="container" data-aos="fade-up">
        <h2 class="h2" style="margin-top:10px !important;margin-bottom:10px !important">Product categories <br></h2>
        </div>
      </section>
      <form action="product_category.php" method="post">
        <section id="product" class="product section" >
          <div class="container">
          <div class="row">
              <div class="col-lg-3" style="text-align:left !important">
                  <div class="sidebar">
                      <div class="sidebar-item categories">
                          <?php 
                          $result = $qm->getRecord("product_cate");
                          if (mysqli_num_rows($result) > 0) {
                              while ($row=mysqli_fetch_array($result)) { 
                                $catid=$row['id'];
                                ?>  
                                <?php if(isset($_POST['id'])){ ?>
                                <a href="product_category.php?cid=<?php echo $catid ?>" class="color <?php if($row['id'] == $_POST['id']){echo 'active-cat';} ?>"> <?php echo $row['categoryName']?></a><br><br>
                                <?php } ?>
                                <?php if(isset($_GET['cid'])){ ?>
                                <a href="product_category.php?cid=<?php echo $catid ?>" class="color <?php if($row['id'] == $_GET['cid']){echo 'active-cat';} ?>"> <?php echo $row['categoryName']?></a><br><br>
                                <?php } ?> 
                            
                                <?php $subcate = $qm->customQuery("select * from sub_cate WHERE categoryid=$catid"); 
                                if (mysqli_num_rows($result) > 0) {
                                while ($rowdata=mysqli_fetch_array($subcate)) {  
                                if($rowdata['subcategory'] != '--') { ?>
                                <ul>
                                    <li>
                                      <a href="product_category.php?catid=<?php echo $rowdata['categoryid']; ?>&subcateid=<?php echo $rowdata['id']; ?>"  name="subcate" style="font-weight: 500;" class="color"><?php echo $rowdata['subcategory'];  ?></a>
                                    </li>
                                </ul>
                              <?php } }} ?>
                          <?php } } ?>
                      </div>
                  </div>
              </div>
              <div class="col-lg-9 subLeft3">
                  <?php 
                  if(isset($_GET['catid']) && isset($_GET['subcateid'])){
                    $cid=$_GET['catid'];
                    $scid=$_GET['subcateid'];
                    $result=mysqli_query($con,"select product.*,product_cate.categoryName,sub_cate.subcategory from product join product_cate on product_cate.id=product.category join sub_cate on sub_cate.id=product.subCategory Where product.Subcategory=$scid AND product.category=$cid");
                  }else if(isset($_GET['cid'])){
                    $pcid=$_GET['cid'];
                    $result=mysqli_query($con,"select product.*,product_cate.categoryName,sub_cate.subcategory from product join product_cate on product_cate.id=product.category join sub_cate on sub_cate.id=product.subCategory Where product.category=$pcid");
                  }else if(isset($_POST['id'])){
                    $id=$_POST["id"];
                    $result=mysqli_query($con,"select product.*,product_cate.categoryName,sub_cate.subcategory from product join product_cate on product_cate.id=product.category join sub_cate on sub_cate.id=product.subCategory Where product.category=$id");
                  }
                  if (mysqli_num_rows($result) > 0) { ?>
                      <div class="row">
                          <?php while ($row=mysqli_fetch_array($result)) { ?>
                              <div class="col-lg-4 mt-8" style="margin-bottom:120px;margin-top:0px !importnat;text-align:center" >
                                <div class="member h-100">
                                    <div class="member-info" >
                                        <img  src="<?php echo $row["img"]=='' ? PRODUCT_URL.'noimg.png' : (file_exists(UPL_PRODUCT_URL.$row["img"]) ? PRODUCT_URL.$row["img"] :  PRODUCT_URL.'noimg.png'); ?>" class="img-fluid" alt="" >
                                    </div>
                                </div>
                                  <p class="producp"><?php echo $row['tit']; ?></p>
                                  
                                  <form action="product_view.php" method="Post">
                                    <input type="hidden" value="<?php  echo $row['id']; ?>" name="pid">
                                    <button type="submit" name="psubmit" style="color:#E71D25;background:#fff;border:none">See All</button>
                                  </form>
                              </div>
                          <?php } } ?>
                          </div>
                      </div>
              </div>
        </section>
      </form>
    </main>
    <!-- ======= Footer ======= -->
    <footer id="footer">
      <?php include("include/footer.php"); ?>
    </footer>
    <?php include("include/up-down.php"); include("include/footer-script.php"); ?>
  </body>
</html>
<?php }
else{
  header("location:products.php");
} ?>

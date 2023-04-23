<?php if(isset($_GET['pid']))  {  ?>
<!DOCTYPE html>
<?php include "include/config.php"; $page='products'; ?>
<html lang="en">
   <head>
      <title>Product</title>
      <?php include("include/head.php");
         ?>
      <style>
         a:hover {
         color: #000;
         }
      
      .sidebar-mob{
         display: none;
      }
      @media (max-width: 1000px){
         .sidebar-mob{
         display: block;
      }
      .sidebar{
         display: none;
      }
   }
      </style>
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
                                
                                <a href="product_category.php?cid=<?php echo $catid ?>" class="color"> <?php echo $row['categoryName']?></a><br><br>
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
                   <div class="sidebar-mob">
                      <div class="sidebar-item categories">
                      <select name="category" class="form-control"  required>
                      <option value="">Select Category</option>
                      <?php $result = $qm->getRecord("product_cate");
                          if (mysqli_num_rows($result) > 0) {
                              while ($row=mysqli_fetch_array($result)) { 
                                $catid=$row['id'];
                                ?>  
                            <option value="<?php echo $row['id'];?>"><?php echo $row['categoryName'];?></option>
                            <?php $subcate = $qm->customQuery("select * from sub_cate WHERE categoryid=$catid"); 
                                if (mysqli_num_rows($result) > 0) {
                                while ($rowdata=mysqli_fetch_array($subcate)) {  
                                if($rowdata['subcategory'] != '--') { ?>
                                <option value="">
                                     --<?php echo $rowdata['subcategory'];  ?></a>
                                </option>
                               
                              <?php } }} ?>
                          <?php } } ?>
                                </select>
                        </div>
                  </div>
              </div>
                  <div class="col-lg-9 subLeft3" style="text-align:left !important">
                     <?php 
                        $pid=$_GET["pid"];
                        $result=mysqli_query($con,"select product.*,product_cate.categoryName,sub_cate.subcategory from product join product_cate on product_cate.id=product.category join sub_cate on sub_cate.id=product.subCategory Where product.id=$pid");
                        
                        if (mysqli_num_rows($result) > 0) { ?>
                     <div class="row">
                        <?php $row=mysqli_fetch_array($result) ?>
                        <h4><?php echo $row['categoryName']; ?></h4>
                        <div class="col-lg-12 mt-8" style="margin-bottom:120px;margin-top:0px !importnat;text-align:center" >
                           <div class="" style="margin-bottom:20px">
                              <div class="member-info" >
                                 <img stye="align-item:left !important" src="<?php echo $row["img"]=='' ? PRODUCT_URL.'noimg.png' : (file_exists(UPL_PRODUCT_URL.$row["img"]) ? PRODUCT_URL.$row["img"] :  PRODUCT_URL.'noimg.png'); ?>" class="img-fluid" alt="" >
                              </div>
                           </div>
                           <h5 class="" style="text-align:left !important"><?php echo $row['tit']; ?></h5>
                           <br>
                           <h6 style="text-align:left"><b>Model No : <?php echo $row['modno']; ?></b></h6>
                           <br>
                           <p style="text-align:left !important"><?php echo $row['lngdes']; ?></p>
                           <br>
                           <a class="viewBtn" style="text-align:left;padding:20px" href="<?php echo PRODUCT_URL.$row['datasheet']; ?>" target="balnk">Downloade DataSheet</a>                                
                        </div> 
                      <?php  } ?>
                      <h3 style="margin-bottom:40px">Similar Products </h3>
                        <?php $result=mysqli_query($con,"select * from product ORDER BY RAND() LIMIT 6");
                           if (mysqli_num_rows($result) > 0) { ?>
                        <?php while($row=mysqli_fetch_array($result)) { ?>
                        <div class="col-lg-4 mt-8" style="margin-bottom:120px;text-align:center">
                           <div class="member h-100">
                              <div class="member-info" >
                                 <img  src="<?php echo $row["img"]=='' ? PRODUCT_URL.'noimg.png' : (file_exists(UPL_PRODUCT_URL.$row["img"]) ? PRODUCT_URL.$row["img"] :  PRODUCT_URL.'noimg.png'); ?>" class="img-fluid" alt="" >
                              </div>
                           </div>
                           <p class="producp"><?php echo $row['tit']; ?></p>
                           <a href="products.php" name="submit" style="color:#E71D25;background:#fff;border:none;">See All</a>
                        </div>
                        <?php  } } ?>
                     </div>
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
<?php 
} 
   else{
     header("location:products.php");
   } ?>
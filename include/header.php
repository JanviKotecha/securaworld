<style>
.column li {
    &:not(:first-child) a {
        border-top: 1px solid #262626;
    }

    &:not(:last-child) a {
        border-bottom: 1px solid #4E4E4E;
    }
}
.column1 {
  width: 33.33%;
}
.btnbtn{
    font-family: 'Poppins' !important;
    font-style: normal !important;
    font-weight: 400 !important;
    font-size: 16px !important;
    line-height: 136.5% !important;
    color: #000000 !important;
    padding: 15px !important;
    cursor: pointer !important;
}
.btnbtn:hover{
    background: rgba(243, 126, 96, 0.1);
    border-radius: 10px;
    color: #F37E60 !important;
}

.mobile-menu{
    display:none !important;
}

.info {
    display: none;
}
@media (max-width: 992px) {
.desktop{
    display:none !important;
}
.mobile-menu{
    display:block !important;
} 
}
.info-visible {
    display: flex;
}
.a:hover{
      color:#E71D25 !important
   }

</style>
   <div class="container">
      <div class="wrapper">
      <div class="header-item-left">
         <a href="index" class="brand"><img src="images/logo/securaworld.png" alt=""></a>
      </div>
         <!-- Section: Navbar Menu -->
         <div class="header-item-center">
            <div class="overlay"></div>
            <nav class="menu">
               <div class="menu-mobile-header">
                  <button type="button" class="menu-mobile-arrow"><i class="ion ion-ios-arrow-back"></i></button>
                  <div class="menu-mobile-title"></div>
                  <button type="button" class="menu-mobile-close"><i class="ion ion-ios-close"></i></button>
               </div>
            <ul class="menu-section" style="margin-top: 1rem !important;">
                <li class="menu-item-has-children">
                 <a href="index" class="<?php echo $page == 'secura' ? 'active2' : ''; ?>">Home</a>
                </li>
				<?php $result=$qm->customQuery("SELECT * FROM solution  LIMIT 5"); ?>
                <li class="menu-item-has-children desktop">
                    <!-- solutions -->
                    <a href="solutions" class="<?php echo $page =='solutions' ? 'active2' : '' ;?>">Solutions</a>
                    <div class="menu-subs menu-mega menu-column-2">
                        <div class="list-item subLeft"  style="flex:50% !important;">
                            <ul class="li is-hover">
                                <?php if (mysqli_num_rows($result) > 0) {
                                        while ($row=mysqli_fetch_array($result)) { ?>
                                <li><a href="solution_detail?id=<?php  echo base64_encode($row['id'])?>"><?php echo $row['tit']; ?></a></li>
                                <?php } } ?>
                            </ul>
                        </div>
                        <div class="list-item ps-4"  style="flex:50% !important;">
                            <div class="card" style="width: 19rem;">
                                <div class="card-body info info-visible">
                                    <div style="disply:block">
                                        <img height=100 class="card-img-top" src="<?php echo SOLUTION_URL ?>demo.jpg">
                                        <h5 class="card-title1">Speed Violation Detection</h5>
                                        <h6 class="h6-solution">Secura Analytics software detects speed of vehicles
                                            crossing the camera view and raises speed violation alarm based on speed
                                            limit set 
                                        </h6>
                                    </div>
                                </div>
                                <?php
                                $result2=$qm->customQuery("SELECT * FROM solution  LIMIT 5");
                                if (mysqli_num_rows($result2) > 0) {
                                while ($rowdata=mysqli_fetch_array($result2)) { ?>
                                <div class="card-body info">
                                    <div style="disply:block">
                                        <img src="<?php echo $rowdata["img"]=='' ? SOLUTION_URL.'noimg.png' : (file_exists(UPL_SOLUTION_URL.$rowdata["img"]) ? SOLUTION_URL.$rowdata["img"] :  SOLUTION_URL.'noimg.png'); ?>"
                                            height=100 class="card-img-top" alt="...">
                                        <h5 class="card-title1"><?php echo $rowdata['tit']; ?></h5>
                                        <h6 class="h6-solution"><?php echo $rowdata['des']; ?></h6>
                                    </div>
                                </div>
                                <?php  } } ?>
                            </div>
                        </div>  
                        <div class="list-item" style="flex:100% !important;padding:0px !important">
                            <button class="buttonn" onClick="solution()">See More > </button>
                        </div>
                    </div>
                </li>
                <li class="menu-item-has-children mobile-menu">
                    <a href="#">Solutions  <i class="ion ion-ios-arrow-down"></i></a>
                    <div class="menu-subs menu-column-1 text-center" style="border: none !important;">
                        <ul class="li">
                        <?php $result=$qm->customQuery("SELECT * FROM solution  LIMIT 5"); 
                        if (mysqli_num_rows($result) > 0) {
                            while ($row=mysqli_fetch_array($result)) { ?>
                                <li><a href="solution_detail?id=<?php  echo $row['id']; ?>"><?php echo $row['tit']; ?></a></li>
                        <?php } } ?>
						</ul>
                    </div>
                </li>
            	<?php $result=$qm->customQuery("SELECT * FROM product_cate  LIMIT 6"); ?>
				<li class="menu-item-has-children desktop">
					<a href="products" class="<?php echo $page =='products' ? 'active2' : '' ;?>">Products</a>
					<div class="menu-subs menu-mega menu-column-4" style="flex:25% !important">
						<div class="list-item subLeft">
							<h4 class="title">Product categories</h4>
							<ul class="li is-hover">
                            <?php if (mysqli_num_rows($result) > 0) {
                            while ($row=mysqli_fetch_array($result)) { ?>
								<li><a href="#"><?php echo $row['categoryName']; ?> </a></li>
                            <?php } } ?>
							</ul>
						</div>
						<div class="row info info-visible" style=" width:75% !important;padding-right:0px !important;padding-left:20px !important;">
                            <?php $result=mysqli_query($con,"SELECT * from product WHERE category=1 LIMIT 6"); 
                            if (mysqli_num_rows($result)>0) {
                                while ($row=mysqli_fetch_array($result)) { ?>    
                                <div class="column1">
                                    <ul>
                                        <li class="padding bac"><img src="images/product/1681185751.png" class="responsive"><br></li>
                                        <h6 class="h6"><?php  echo $row['tit']; ?></h6>
                                        <h6><a href="products" style="color:#F37E60;">see All</a></h6>
                                        <p style="padding-bottom:10px"></p>
                                    </ul>
                                </div>
                            <?php } } ?>
                        </div>
                        <div class="row info" style=" width:75% !important;padding-right:0px !important;padding-left:20px !important;">
                            <?php $result=mysqli_query($con,"SELECT * from product WHERE category=2 LIMIT 6"); 
                            if (mysqli_num_rows($result)>0) {
                                while ($row=mysqli_fetch_array($result)) { ?>    
                                <div class="column1">
                                    <ul>
                                        <li class="padding bac"><img src="images/product/1681185751.png" class="responsive"><br></li>
                                        <h6 class="h6"><?php  echo $row['tit']; ?></h6>
                                        <h6><a href="products" style="color:#F37E60;">see All</a></h6>
                                        <p style="padding-bottom:10px"></p>
                                    </ul>
                                </div>
                            <?php } } ?>
                        </div>
                        <div class="row info" style=" width:75% !important;padding-right:0px !important;padding-left:20px !important;">
                            <?php $result=mysqli_query($con,"SELECT * from product WHERE category=3 LIMIT 6"); 
                            if (mysqli_num_rows($result)>0) {
                                while ($row=mysqli_fetch_array($result)) { ?>    
                                <div class="column1">
                                    <ul>
                                        <li class="padding bac"><img src="images/product/1681185751.png" class="responsive"><br></li>
                                        <h6 class="h6"><?php  echo $row['tit']; ?></h6>
                                        <h6><a href="products" style="color:#F37E60;">see All</a></h6>
                                        <p style="padding-bottom:10px"></p>
                                    </ul>
                                </div>
                            <?php } } ?>
                        </div>
                        <div class="row info" style=" width:75% !important;padding-right:0px !important;padding-left:20px !important;">
                            <?php $result=mysqli_query($con,"SELECT * from product WHERE category=4 LIMIT 6"); 
                            if (mysqli_num_rows($result)>0) {
                                while ($row=mysqli_fetch_array($result)) { ?>    
                                <div class="column1">
                                    <ul>
                                        <li class="padding bac"><img src="images/product/1681185751.png" class="responsive"><br></li>
                                        <h6 class="h6"><?php  echo $row['tit']; ?></h6>
                                        <h6><a href="products" style="color:#F37E60;">see All</a></h6>
                                        <p style="padding-bottom:10px"></p>
                                    </ul>
                                </div>
                            <?php } } ?>
                        </div>
                        <div class="row info" style=" width:75% !important;padding-right:0px !important;padding-left:20px !important;">
                            <?php $result=mysqli_query($con,"SELECT * from product WHERE category=5 LIMIT 6"); 
                            if (mysqli_num_rows($result)>0) {
                                while ($row=mysqli_fetch_array($result)) { ?>    
                                <div class="column1">
                                    <ul>
                                        <li class="padding bac"><img src="images/product/1681185751.png" class="responsive"><br></li>
                                        <h6 class="h6"><?php  echo $row['tit']; ?></h6>
                                        <h6><a href="products" style="color:#F37E60;">see All</a></h6>
                                        <p style="padding-bottom:10px"></p>
                                    </ul>
                                </div>
                            <?php } } ?>
                        </div>
                        <div class="row info" style=" width:75% !important;padding-right:0px !important;padding-left:20px !important;">
                            <?php $result=mysqli_query($con,"SELECT * from product WHERE category=6 LIMIT 6"); 
                            if (mysqli_num_rows($result)>0) {
                                while ($row=mysqli_fetch_array($result)) { ?>    
                                <div class="column1">
                                    <ul>
                                        <li class="padding bac"><img src="images/product/1681185751.png" class="responsive"><br></li>
                                        <h6 class="h6"><?php  echo $row['tit']; ?></h6>
                                        <h6><a href="products" style="color:#F37E60;">see All</a></h6>
                                        <p style="padding-bottom:10px"></p>
                                    </ul>
                                </div>
                            <?php } } ?>
                        </div>
                        <div class="list-item" style="flex:100% !important;padding:0px !important">
                            <button class="buttonn" onClick="product()">See More > </button>
						</div>
					</div>
				</li>
                <li class="menu-item-has-children mobile-menu">
                    <a href="#"> Products<i class="ion ion-ios-arrow-down"></i></a>
                    <div class="menu-subs menu-column-1 text-center" style="border: none !important;">
                        <ul class="li">
                        <?php $result=$qm->customQuery("SELECT * FROM product_cate  LIMIT 6"); 
                        if (mysqli_num_rows($result) > 0) {
                            while ($row=mysqli_fetch_array($result)) { ?>
                            <form action="product_category" method="post">
                                <input type="hidden" value="<?php  echo $row['id']; ?>" name="id">
                                <button type="submit" name="submit" class="btnbtn"><?php echo $row['categoryName']; ?></button>
                            </form>
                        <?php } } ?>
						</ul>
                    </div>
                </li>
                <li class="menu-item-has-children">
                  <a href="about" class="<?php echo $page =='about' ? 'active2' : '' ;?>">About Us</a>
                </li>
                <li class="menu-item-has-children">
                  <a href="contact" class="<?php echo $page =='contact' ? 'active2' : '' ;?>">Contact Us</a>
                </li>
                <li class="menu-item-has-children desktop">
                    <a href="#">Software Download</a>
                    
                    <div class="menu-subs menu-column-1 text-center">
                    <p class="stitle">Body Temperature Camera Software’s</p>
                    <?php $result=$qm->getRecord("software");
                     if (mysqli_num_rows($result)>0) {
                        $row=mysqli_fetch_array($result); ?>
                        <a href="<?php echo SOFTWARE_URL.$row['vmspdf']; ?>"  class="menusub-btn mt-2" target="blank">
                            <span class="subbtn-text" >VMS Datasheet</span>
                        </a>
                        <a href="<?php echo SOFTWARE_URL.$row['firmware']; ?>"  class="menusub-btn mt-2"  downloade>
                            <span class="subbtn-text" >Firmware</span>
                        </a>
                        <a href="<?php echo SOFTWARE_URL.$row['vmssoftware']; ?>"  class="menusub-btn mt-2"  downloade >
                            <span class="subbtn-text" >VMS Client Software</span>
                        </a>
                    <?php } ?>
                  </div>
                </li>
                <li class="menu-item-has-children mobile-menu">
                    <a href="#">Software Download <i class="ion ion-ios-arrow-down"></i></a>
                    <div class="menu-subs menu-column-1 text-center" style="border: none !important;">
                    <p class="stitle">Body Temperature Camera Software’s</p>
                        <ul class="li">
                        <?php $result=$qm->getRecord("software");
                     if (mysqli_num_rows($result)>0) {
                        $row=mysqli_fetch_array($result); ?>
                        <li><a href="<?php echo SOFTWARE_URL.$row['vmspdf']; ?>"  class="menusub-btn mt-2" target="blank"> VMS Datasheet</a></li>
                        <li><a href="<?php echo SOFTWARE_URL.$row['firmware']; ?>"  class="menusub-btn mt-2"  downloade> Firmware</a></li>
                        <li><a href="<?php echo SOFTWARE_URL.$row['vmssoftware']; ?>"  class="menusub-btn mt-2"  downloade >VMS Client Software</a>
                    <?php } ?>
						</ul>
                    </div>
                </li>
                <li class="menu-item-has-children">
                  <a href="ewaste"  class="<?php echo $page =='ewaste' ? 'active2' : '' ;?>">E-Waste</a>
                </li>              
            </ul>
            </nav>
         </div>

         <div class="header-item-right">
            <button type="button" class="menu-mobile-trigger">
               <span></span>
               <span></span>
               <span></span>
               <span></span>
            </button>
         </div>

      </div>
   </div>
<script>
   $(document).foundation();
   $('.is-hover a').on('mouseover', function () {
   var idx = $(this).parent().index() + 2;
   $('.info:nth-child(' + idx + ')').addClass('info-visible');
   $('.info:nth-child(' + idx + ')').siblings().removeClass('info-visible');
   });
   
   $('.dropdown').on('mouseout', function () {
   $('.info:nth-child(1)').addClass('info-visible').siblings().removeClass('info-visible');
   });
    function solution() {
        window.location.href="solutions";  
    }
    function product() {
        window.location.href="products";  
    }
</script>
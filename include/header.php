<style>
   .column li {
   &:not(:first-child) a {
   border-top: 1px solid #262626;
   }
   &:not(:last-child) a {
   border-bottom: 1px solid #4E4E4E;
   }
   }
   .info {
   display: none;
   }
   .info-visible {
   display: block;
   }
</style>
<div class="container">
   <div class="wrapper">
      <div class="header-item-left">
         <a href="index.php" class="brand"><img src="images/logo/securaworld.png" alt=""></a>
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
			   	  
                  <a href="index.php" class="<?php echo $page == 'secura' ? 'active2' : ''; ?>">Home</a>
               </li>
               <?php $result=$qm->customQuery("SELECT * FROM solution  LIMIT 5"); ?>
               <li class="menu-item-has-children">
                  <a href="solutions.php"  class="<?php echo $page =='solutions' ? 'active2' : '' ;?>">Solution</a>
                  <div class="menu-subs menu-mega menu-column-3">
                     <div class="d-flex one">
                        <div class="list-item sub-col-3 pe-4 subLeft" style="text-align:left">
                           <ul class="is-hover">
                              <?php if (mysqli_num_rows($result) > 0) {
                                 while ($row=mysqli_fetch_array($result)) { ?>
                              <li>
                                 <a href="#" class="navSubLink d-flex">
                                    <img height=30  width=30 class="me-3" src="<?php echo $row["img"]=='' ? SOLUTION_URL.'noimg.png' : (file_exists(UPL_SOLUTION_URL.$row["img"]) ? SOLUTION_URL.$row["img"] :  SOLUTION_URL.'noimg.png'); ?>">
                                    <h4 class="sub-title"><?php echo $row['tit']; ?></h4>
                                 </a>
                              </li>
                              <?php 
                                 } } ?>
                           </ul>
                        </div>
                        <div class="list-item sub-col-3 ps-4">
                           <div class="card" style="width: 18rem;">
                              <div class="card-body info info-visible">
							  <img height=100 class="card-img-top" src="<?php echo SOLUTION_URL ?>demo.jpg">
                                <h5 class="card-title1">Speed Violation Detection</h5>
								<p class="card-subtext">Secura Analytics software detects speed of vehicles crossing the camera view and raises speed violation alarm based on speed limit set</h5>
                                 </p>
                              </div>
                              <?php
                                 $result2=$qm->customQuery("SELECT * FROM solution  LIMIT 5");
                                 if (mysqli_num_rows($result2) > 0) {
                                 while ($rowdata=mysqli_fetch_array($result2)) { ?>
                              <div class="card-body info">
                                 <img src="<?php echo $rowdata["img"]=='' ? SOLUTION_URL.'noimg.png' : (file_exists(UPL_SOLUTION_URL.$rowdata["img"]) ? SOLUTION_URL.$rowdata["img"] :  SOLUTION_URL.'noimg.png'); ?>" height=100 class="card-img-top" alt="...">
                                 <h5 class="card-title1"><?php echo $rowdata['tit']; ?></h5>
                                 <p class="card-subtext"><?php echo $rowdata['des']; ?></p>
                              </div>
                              <?php  } } ?>
                           </div>
                        </div>
                     </div>
                     <div class="submenu-footer text-center mt-2">
                        <a href="solutions.php" class="navSubLink">
                           <h6 class="footerlink">See More ></h6>
                        </a>
                     </div>
                  </div>
               </li>
               <li class="menu-item-has-children">
                  <a href="products.php"  class="<?php echo $page =='products' ? 'active2' : '' ;?>">Products</a>
                  <!-- <div class="menu-subs menu-mega menu-column-2 d-block">
                     <div class="d-flex one">
                     
                     	<div class="list-item sub-col-4 pe-4 subLeft flex-row-reverse ">
                     		<ul>
                     			<li>
                     				<a href="#" class="navSubLink">
                     					<h4 class="sub-title">Box Camera</h4>
                     				</a>																					
                     			</li>
                     			<li>
                     				<a href="#" class="navSubLink">
                     					<h4 class="sub-title">Bullet Camera</h4>
                     				</a>
                     			</li>
                     			<li>
                     				<a href="#" class="navSubLink">
                     					<h4 class="sub-title">IP Camera</h4>
                     				</a>
                     			</li>
                     			<li>
                     				<a href="#" class="navSubLink">
                     					<h4 class="sub-title">Dome Camera</h4>
                     				</a>
                     			</li>
                     			<li>
                     				<a href="#" class="navSubLink">
                     					<h4 class="sub-title">DVR</h4>
                     				</a>
                     			</li>
                     			<li>
                     				<a href="#" class="navSubLink">
                     					<h4 class="sub-title">Fish Eye Camera</h4>
                     				</a>
                     			</li>
                     		</ul>
                     	</div>							
                     	<div class="list-item text-center sub-col-6 ps-4">
                     		<ul>
                     			<li class="proList">
                     				<a href="#" class="navProLink">
                     					<img src="./images/solution/pngwing 3.png" />
                     				</a>	
                     				<p class="navProDesc" style="font-weight: 400;
                     						font-size: 6px;
                     						line-height: 136.5%;
                     						color: #7D7D7D;">4 Mp Network Box Camera (version 4.1)</p>	
                     				<a href="#" class="seeAllLink" style="background: linear-gradient(70.76deg, #E71D25 4.27%, #F37E60 74.51%);
                     						-webkit-background-clip: text;
                     						-webkit-text-fill-color: transparent;
                     						background-clip: text;
                     						text-fill-color: transparent;
                     						font-weight: 500;
                     						font-size: 6px;
                     						line-height: 136.5%;">See All</a>																			
                     			</li>
                     			<li class="proList">
                     				<a href="#" class="navProLink">
                     					<img src="./images/solution/pngwing 3.png" />
                     				</a>
                     				<p class="navProDesc" style="font-weight: 400;
                     						font-size: 6px;
                     						line-height: 136.5%;
                     						color: #7D7D7D;">4 Mp Network Box Camera (version 4.1)</p>	
                     				<a href="#" class="seeAllLink" style="background: linear-gradient(70.76deg, #E71D25 4.27%, #F37E60 74.51%);
                     						-webkit-background-clip: text;
                     						-webkit-text-fill-color: transparent;
                     						background-clip: text;
                     						text-fill-color: transparent;
                     						font-weight: 500;
                     						font-size: 6px;
                     						line-height: 136.5%;">See All</a>
                     			</li>
                     			<li class="proList">
                     				<a href="#" class="navProLink">
                     					<img src="./images/solution/pngwing 3.png" />
                     				</a>
                     				<p class="navProDesc" style="font-weight: 400;
                     						font-size: 6px;
                     						line-height: 136.5%;
                     						color: #7D7D7D;">4 Mp Network Box Camera (version 4.1)</p>	
                     				<a href="#" class="seeAllLink" style="background: linear-gradient(70.76deg, #E71D25 4.27%, #F37E60 74.51%);
                     						-webkit-background-clip: text;
                     						-webkit-text-fill-color: transparent;
                     						background-clip: text;
                     						text-fill-color: transparent;
                     						font-weight: 500;
                     						font-size: 6px;
                     						line-height: 136.5%;">See All</a>
                     			</li>
                     			<li class="proList">
                     				<a href="#" class="navProLink">
                     					<img src="./images/solution/pngwing 3.png" />
                     				</a>
                     				<p class="navProDesc" style="font-weight: 400;
                     						font-size: 6px;
                     						line-height: 136.5%;
                     						color: #7D7D7D;">4 Mp Network Box Camera (version 4.1)</p>	
                     				<a href="#" class="seeAllLink" style="background: linear-gradient(70.76deg, #E71D25 4.27%, #F37E60 74.51%);
                     						-webkit-background-clip: text;
                     						-webkit-text-fill-color: transparent;
                     						background-clip: text;
                     						text-fill-color: transparent;
                     						font-weight: 500;
                     						font-size: 6px;
                     						line-height: 136.5%;">See All</a>
                     			</li>
                     			<li class="proList">
                     				<a href="#" class="navProLink">
                     					<img src="./images/solution/pngwing 3.png" />
                     				</a>
                     				<p class="navProDesc" style="font-weight: 400;
                     						font-size: 6px;
                     						line-height: 136.5%;
                     						color: #7D7D7D;">4 Mp Network Box Camera (version 4.1)</p>	
                     				<a href="#" class="seeAllLink" style="background: linear-gradient(70.76deg, #E71D25 4.27%, #F37E60 74.51%);
                     						-webkit-background-clip: text;
                     						-webkit-text-fill-color: transparent;
                     						background-clip: text;
                     						text-fill-color: transparent;
                     						font-weight: 500;
                     						font-size: 6px;
                     						line-height: 136.5%;">See All</a>
                     			</li>
                     			<li class="proList">
                     				<a href="#" class="navProLink">
                     					<img src="./images/solution/pngwing 3.png" />
                     				</a>
                     				<p class="navProDesc" style="font-weight: 400;
                     						font-size: 6px;
                     						line-height: 136.5%;
                     						color: #7D7D7D;">4 Mp Network Box Camera (version 4.1)</p>	
                     				<a href="#" class="seeAllLink" style="background: linear-gradient(70.76deg, #E71D25 4.27%, #F37E60 74.51%);
                     						-webkit-background-clip: text;
                     						-webkit-text-fill-color: transparent;
                     						background-clip: text;
                     						text-fill-color: transparent;
                     						font-weight: 500;
                     						font-size: 6px;
                     						line-height: 136.5%;">See All</a>
                     			</li>
                     		</ul>
                     	</div>
                     </div>
                     <br>
                     <div class="submenu-footer text-center mt-2">
                     	<a href="#" class="navSubLink">
                     		<h6 class="footerlink">See More ></h6>
                     	</a>
                     </div>
                     </div> -->
               </li>
               <li class="menu-item-has-children">
                  <a href="about.php" class="<?php echo $page =='about' ? 'active2' : '' ;?>">About Us</a>
               </li>
               <li class="menu-item-has-children">
                  <a href="contact.php" class="<?php echo $page =='contact' ? 'active2' : '' ;?>">Contacts Us</a>
               </li>
               <li class="menu-item-has-children">
                  <a href="#">Software Download</a>
                  <div class="menu-subs menu-column-1 text-center">
                     <p class="menusub-title">Body Temperature Camera Software’s</p>
                     <?php $result=$qm->getRecord("software");
                        if (mysqli_num_rows($result)>0) {
                        	$row=mysqli_fetch_array($result); ?>
                     <a href="<?php echo SOFTWARE_URL.$row['firmware']; ?>" class="menusub-btn mt-2" downloade>
                     <span class="subbtn-text" style="background:linear-gradient(70.76deg, #E71D25 4.27%, #F37E60 74.51%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                     Firmware</span>
                     </a>
                     <a  href="<?php echo SOFTWARE_URL.$row['vmssoftware']; ?>" class="menusub-btn mt-2" downloade >
                     <span class="subbtn-text" style="background:linear-gradient(70.76deg, #E71D25 4.27%, #F37E60 74.51%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                     VMS Client Software</span>
                     </a>
                     <a href="<?php echo SOFTWARE_URL.$row['vmspdf']; ?>"class="menusub-btn mt-2" target="blank">
                     <span class="subbtn-text" style="background:linear-gradient(70.76deg, #E71D25 4.27%, #F37E60 74.51%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                     VMS Datasheet</span>
                     </a>
                     <?php } ?>
                  </div>
               </li>
               <li><a href="ewaste.php"  class="<?php echo $page =='ewaste' ? 'active2' : '' ;?>">E-Waste</a></li>
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
</script>
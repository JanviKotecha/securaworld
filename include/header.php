<!-- <div class="container d-flex align-items-center">
  <h1 class="logo me-auto"><a href="index.php">Village</a></h1>
  <nav id="navbar" class="navbar">
    <ul>
      <li><a href="index.php"  class="<?php echo $page =='home' ? 'active2' : '' ;?>">Home</a></li>
      <li class="dropdown"><a href="#" class="<?php echo $page =='about' ? 'active2' : '' ;?>"><span>About</span> <i class="bi bi-chevron-down"></i></a>
        <ul>
          <li><a href="about.php" >About</a></li>
          <li><a href="team.php">Team</a></li>
          <li><a href="testimonials.php">Testimonials</a></li>
        </ul>
      </li>
      <li><a href="services.php" class="<?php echo $page =='service' ? 'active2' : '' ;?>">Services</a></li>
      <li><a href="gallery.php" class="<?php echo $page =='gallery' ? 'active2' : '' ;?>">Gallery</a></li>
      <li><a href="blog.php" class="<?php echo $page =='blog' ? 'active2' : '' ;?>">Blog</a></li>
      <li><a href="contact.php" class="<?php echo $page =='contact' ? 'active2' : '' ;?>">Contact</a></li>
      <li><a href="index.php" class="getstarted">Get Started</a></li>
    </ul>
    <i class="bi bi-list mobile-nav-toggle"></i>
  </nav>
</div> -->
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
						<li class="menu-item-has-children ">
							<a href="index.php" class="<?php echo $page =='index' ? 'active2' : '' ;?>">Home</a>
						</li>
            			<li class="menu-item-has-children">
							<a href="#"  class="<?php echo $page =='solutions' ? 'active2' : '' ;?> " >Solution</a>
							
							<div class="menu-subs menu-mega menu-column-3">
								<div class="d-flex one">
									<div class="list-item text-center sub-col-3 pe-4 subLeft">
										<ul>
											<li onclick="show('one')" >
												<a href="#one" class="navSubLink d-flex">
													<img src="./images/solution/icon1.png" height=25  width=25 class="me-3"/> <h4 class="sub-title"> Speed Violation Detection</h4>
												</a>
											</li>
											<li onclick="show('two')">
												<a href="#two" class="navSubLink d-flex">
													<img src="./images/solution/icon2.png" height=25  width=25 class="me-3" /> <h4 class="sub-title">Automatic Number Plate Recognition</h4>
												</a>
											</li>
											<li onclick="show('three')">
												<a href="#" class="navSubLink d-flex">
													<img src="./images/solution/icon3.png" height=25  width=25 class="me-3" /> <h4 class="sub-title">Abandoned Object / Object Left Detection</h4>
												</a>
											</li>
											<li onclick="show('four')">
												<a href="#" class="navSubLink d-flex">
												<img src="./images/solution/icon4.png" height=25  width=25 class="me-3" /> <h4 class="sub-title">Helmet Detection</h4>
												</a>
											</li>
											<li onclick="show('five')">
												<a href="#" class="navSubLink d-flex">
												<img src="./images/solution/icon5.png" height=25  width=25 class="me-3" /> <h4 class="sub-title">People/Object Counting</h4>
												</a>
											</li>
										</ul>
									</div>							
									<div class="list-item text-center sub-col-3 ps-4" id="subRight">
										<div class="card" style="width: 18rem;" id="one" style="display: none;">
											<img src="./images/solution/nav1.png" class="card-img-top" alt="...">
											<div class="card-body">
												<h5 class="card-title1">Speed Violation Detection</h5>
												<p class="card-subtext">The Secura Analytics software detects speed of vehicles crossing the camera view and raises speed violation alarm based on speed limit set for the location.</p>
												<p class="card-subtext">It also captures License plate of the violating vehicle.</p>
											</div>
										</div>
										
									</div>
								</div>	
								<div class="submenu-footer text-center mt-2">
									<a href="#" class="navSubLink">
										<h6 class="footerlink">See More ></h6>
									</a>
								</div>
							</div>
						</li>
						<li class="menu-item-has-children">
							<a href="#">Products</a>
							<div class="menu-subs menu-mega menu-column-2 d-block">
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
										<h3 class="subTop-title">Product categories<h3>
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
							</div>
						</li>
						<li class="menu-item-has-children">
							<a href="about.php" class="<?php echo $page =='about' ? 'active2' : '' ;?>">About Us</a>
							<!-- <div class="menu-subs menu-mega menu-column-4">
								<div class="list-item">
									<h4 class="title">Men's Fashion</h4>
									<ul>
										<li><a href="#">Product List</a></li>
										<li><a href="#">Product List</a></li>
										<li><a href="#">Product List</a></li>
										<li><a href="#">Product List</a></li>
									</ul>
									<h4 class="title">Kid's Fashion</h4>
									<ul>
										<li><a href="#">Product List</a></li>
										<li><a href="#">Product List</a></li>
										<li><a href="#">Product List</a></li>
										<li><a href="#">Product List</a></li>
									</ul>
								</div>
								<div class="list-item">
									<h4 class="title">Women's Fashion</h4>
									<ul>
										<li><a href="#">Product List</a></li>
										<li><a href="#">Product List</a></li>
										<li><a href="#">Product List</a></li>
										<li><a href="#">Product List</a></li>
									</ul>
									<h4 class="title">Health & Beauty</h4>
									<ul>
										<li><a href="#">Product List</a></li>
										<li><a href="#">Product List</a></li>
										<li><a href="#">Product List</a></li>
										<li><a href="#">Product List</a></li>
									</ul>
								</div>
								<div class="list-item">
									<h4 class="title">Home & Lifestyle</h4>
									<ul>
										<li><a href="#">Product List</a></li>
										<li><a href="#">Product List</a></li>
										<li><a href="#">Product List</a></li>
										<li><a href="#">Product List</a></li>
										<li><a href="#">Product List</a></li>
										<li><a href="#">Product List</a></li>
										<li><a href="#">Product List</a></li>
										<li><a href="#">Product List</a></li>
										<li><a href="#">Product List</a></li>
									</ul>
								</div>
								<div class="list-item">
									<img src="https://source.unsplash.com/dWyXjbac4tc/361x467" class="responsive" alt="Shop Product">
								</div>
							</div> -->
						</li>
						<li class="menu-item-has-children">
							<a href="contact.php" class="<?php echo $page =='contact' ? 'active2' : '' ;?>">Contacts Us</a>
							<!-- <div class="menu-subs menu-column-1">
								<ul>
									<li><a href="#">Article One</a></li>
									<li><a href="#">Article Two</a></li>
									<li><a href="#">Article Three</a></li>
									<li><a href="#">Article Four</a></li>
								</ul>
							</div> -->
						</li>
						<li class="menu-item-has-children">
							<a href="#">Software Download</a>
							<div class="menu-subs menu-column-1 text-center">
								<p class="menusub-title">Body Temperature Camera Software’s</p>
								
								<button class="menusub-btn mt-2">
									<span class="subbtn-text" style="background:linear-gradient(70.76deg, #E71D25 4.27%, #F37E60 74.51%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
									Firmware</span>
								</button>
								<button class="menusub-btn mt-2">
									<span class="subbtn-text" style="background:linear-gradient(70.76deg, #E71D25 4.27%, #F37E60 74.51%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
									VMS Client Software</span>
								</button>
							</div>
						</li>
						<li><a href="#">E-Waste</a></li>
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
		function show(param_div_id) {

			var x = document.getElementById(param_div_id);
			if (x.style.display === "none") {
				x.style.display = "block";
			} else {
				x.style.display = "none";
			}
			console.log(param_div_id);
			document.getElementById('subRight').innerHTML = document.getElementById(param_div_id).innerHTML;
		}
	</script>

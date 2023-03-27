<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
	<div class="text-center navbar-brand-wrapper d-flex  justify-content-center">
		<a class="" href="dashbord.php" style="color:white;outline-style: none;"><?php echo WEB_TITLE;?></a>
		<a class="navbar-brand brand-logo-mini"  href="dashbord.php"><?php echo WEB_TITLE;?></a>
	</div>
	<div class="navbar-menu-wrapper d-flex align-items-center">
		<ul class="navbar-nav">
			<li class="nav-item font-weight-semibold d-none d-lg-block">Help : </li>
			
		</ul>
	
		<ul class="navbar-nav ml-auto">
		
			<li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
				<a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
					<img class="img-xs rounded-circle" src="<?php echo IMAGE_URL?>favicon.png" alt="Profile image"> </a>
				<div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
					<div class="dropdown-header text-center">
						<img class="img-md rounded-circle" src="<?php echo IMAGE_URL?>favicon.png" alt="Profile image">
						<p class="mb-1 mt-3 font-weight-semibold"></p>
					
					</div>
			
					<a class="dropdown-item" href="logout.php">Sign Out<i class="dropdown-item-icon ti-power-off"></i></a>
				</div>
			</li>
		</ul>
		<button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
			<span class="mdi mdi-menu"></span>
		</button>
	</div>
</nav>
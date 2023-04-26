<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">    
   
    <li class="nav-item <?php echo $page_title =='profile' ? 'activerow' : '' ;?>">
      <a class="nav-link" href="dashbord.php">
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item <?php echo $page_title =='about' ? 'activerow' : '' ;?>">
      <a class="nav-link"  href="about.php" >      
        <span class="menu-title">About </span>     
      </a>    
    </li>
    <li class="nav-item  <?php echo $page_title =='solution' ? 'activerow' : '' ;?>">
      <a class="nav-link" href="solution.php" >      
        <span class="menu-title">solutions</span>     
      </a>    
    </li> 
    <li class="nav-item  <?php echo $page_title =='product_cate' ? 'activerow' : '' ;?>">
      <a class="nav-link" href="product_cate.php" >      
        <span class="menu-title">Create Category</span>     
      </a>  
    </li> 
    <li class="nav-item  <?php echo $page_title =='product_subcate' ? 'activerow' : '' ;?>">
      <a class="nav-link" href="product_subcate.php" >      
        <span class="menu-title">SubCategory</span>     
      </a>  
    </li> 
    <li class="nav-item  <?php echo $page_title =='product' ? 'activerow' : '' ;?>">
      <a class="nav-link" href="product.php" >      
        <span class="menu-title">Product</span>     
      </a>  
    </li>
    <li class="nav-item  <?php echo $page_title =='ewaste' ? 'activerow' : '' ;?>">
      <a class="nav-link" href="ewastea.php" >      
        <span class="menu-title">E-Waste</span>     
      </a>  
    </li>
    <li class="nav-item  <?php echo $page_title =='software' ? 'activerow' : '' ;?>">
      <a class="nav-link" href="software.php" >      
        <span class="menu-title">Software Download</span>     
      </a>  
    </li>
    <li class="nav-item  <?php echo $page_title =='social' ? 'activerow' : '' ;?>">
      <a class="nav-link"  href="social.php" >      
        <span class="menu-title">Social Link</span>     
      </a>  
    </li>
   <li class="nav-item <?php echo $page_title =='contact' ? 'activerow' : '' ;?>">
    <a class="nav-link"  href="cotact_detail.php" >      
      <span class="menu-title">Contact</span>     
    </a>
  </li>
  <li class="nav-item <?php echo $page_title == 'changepwd' ? 'activerow' : ''; ?>">
    <a class="nav-link"  href="changepwd.php" >      
        <span class="menu-title">Change Password</span>     
    </a>
  </li>
    <li class="nav-item">
      <a class="nav-link"  href="logout.php" >      
        <span class="menu-title">Logout</span>     
      </a>
    </li>
  </ul>
</nav>
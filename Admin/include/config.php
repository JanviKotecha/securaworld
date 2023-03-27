<?php
  session_start();
  include ("../include/masterConfig.php");

  $con = mysqli_connect($host,$username,$password,$db);
  if ($con -> connect_errno) {
    echo "Failed to connect to MySQL: " . $con -> connect_error;
    exit();
  }

  include ("../include/class/queryMaster.php");
  $qm = new queryMaster();

//  mysqli_query($con,"set name utf8");
  mysqli_set_charset($con,'utf8');

  header ('Content-Type: text/html; charset=utf-8');

  include ("../include/rootMaster.php");
  include ("../include/cusFunction.php");

  define("UPLOAD_HOST_URL","../");
  define("UPLOAD_IMAGE_URL", UPLOAD_HOST_URL."images/");
  define("UPLOAD_GALLERY_URL", UPLOAD_IMAGE_URL."gallery/");
  define("UPLOAD_PROFILE_URL", UPLOAD_IMAGE_URL."profile/");
  define("UPLOAD_SERVICES_URL", UPLOAD_IMAGE_URL."services/");
  define("UPLOAD_SLIDER_URL", UPLOAD_IMAGE_URL."slider/");
  define("UPLOAD_ICON_URL", UPLOAD_IMAGE_URL."icon/");
  define("UPLOAD_RIMG_URL", UPLOAD_IMAGE_URL."rimg/");
  define("UPLOAD_SOCIALTEAM_URL", UPLOAD_IMAGE_URL."socialteam/");
  define("UPLOAD_IMG_URL", UPLOAD_IMAGE_URL."img/");
  define("UPLOAD_BLOG_URL", UPLOAD_IMAGE_URL."blog/");
  define("UPLOAD_SOLUTION_URL", UPLOAD_IMAGE_URL."solution/");
  define("UPLOAD_ABOUT_URL", UPLOAD_IMAGE_URL."about/");
  date_default_timezone_set("Asia/Kolkata");
  $getDt = date("Y-m-d H:i:s");

  $page_title = "Home";
?>
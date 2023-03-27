<?php
  include ("masterConfig.php");
  $con = mysqli_connect($host,$username,$password,$db);
  if ($con -> connect_errno) {
    echo "Failed to connect to MySQL: " . $con -> connect_error;
    exit();
  }
  include ("class/queryMaster.php");
  $qm = new queryMaster();

  include ("rootMaster.php");
  include ("cusFunction.php");

  date_default_timezone_set("Asia/Kolkata");
  $getDt = date("Y-m-d H:i:s");

  //mysqli_query($con,"set name utf8");
  mysqli_set_charset($con,'utf8');

  header ('Content-Type: text/html; charset=utf-8');

  // $result=$qm->getRecord("profile","*","id=1");   
  // $row_con_info = $result->fetch_assoc();

  $page = "home";
  
?>
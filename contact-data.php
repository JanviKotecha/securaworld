<?php
include "include/config.php";
if(isset($_POST['submit'])) {
	  $insert=$qm->insertRecord("contact","nm,mob,eml,msg,dt","'".$_POST['nm']."','".$_POST['mob']."','".$_POST['eml']."','".$_POST['msg']."','".$getDt."'"); 
	 
	  $to = "janvi.kotecha0@gmail.com";
    $subject = "Contact form submited by : '".$_POST['nm']."' ";
   
    $message = "<h1>Name : '".$_POST['nm']."'</h1>";
    $message .= "<h1>Email : '".$_POST['eml']."' </h1>";
   	$message .= "<h1>Mobile : '".$_POST['mob']."' </h1>";
   	$message .= "<h1>Description: '".$_POST['msg']."' </h1>";
    $header = "From: '".$_POST['eml']. "' \r\n";
    $header .= "Cc: \r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-type: text/html\r\n";

    mail($to,$subject,$message,$header);
?>
	  <script>
	    alert("Contact Information Send Successfully...");
	    window.location = "index.php";
	  </script>
<?php exit; } 
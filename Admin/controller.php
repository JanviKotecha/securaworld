<?php
include "include/config.php";

if(isset($_POST['x'])) {
	  $insert=$qm->insertRecord("category","name","'".$_POST['cate']."'"); 
?>
	  
<?php exit; } 
<?php
 include 'include/secureConfig.php'; 
  if(isset($_POST['pwd'])) {
	  $oldpassword = $_POST["opwd"];
	  $res = $qm->getRecord("login","password","id=1");
      if(mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_array($res);
        $oldpassworddb = $row['password'];
	    } 
		$oldpassword = $_POST["opwd"];
	  $newpassword = $_POST["npwd"];
		  if ($oldpassword == $oldpassworddb) {
				  $qm->updateRecord("login","password='".$newpassword."'","id=1"); 
					$_SESSION['alert_msg'] .= "<div class='msg_success'>Password change sucessfully.</div>";
		      header("location:changepwd.php");
			    exit;
		  } else {
		  	 	$_SESSION['alert_msg'] .= "<div class='msg_error'>Oldpassword Not Match.</div>";
		      header("location:changepwd.php");
			    exit;
		    	}
  }
?>

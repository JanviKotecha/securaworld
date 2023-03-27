<?php 
    include("include/config.php");
    if(isset($_POST['user']) && !empty($_POST['user'] ) )
    {
      if(isset($_POST['pass']) && !empty($_POST['pass']))
      {
        $username = $_POST['user'];  
        $password = $_POST['pass'];  
      
        //to prevent from mysqli injection  
      
        $username = addslashes($username); 
        $password = addslashes($password);  
         
      
       $result=$qm->getRecord("login","*","username = '$username' and password = '$password'");
       $_SESSION['admin_info'] = "true";
      
       if(mysqli_num_rows($result)>0){
        header("location:dashbord.php");
        exit;
      }else{
        $_SESSION['alert_msg'] = "<div class='msg_error'>Please check Username or Password .</div>";
        header("location:index.php");
        exit;
      }  
      }  
    }
    
?>  

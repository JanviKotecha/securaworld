<!DOCTYPE html>
<html lang="en">
 <?php @include("include/secureConfig.php");
 $page_title='changepwd'; 
  $respwd = $qm->getRecord("login","password");
    if(mysqli_num_rows($respwd) > 0) {
     $rowpwd = mysqli_fetch_array($respwd); 
   } ?>
  <head>
    <?php @include("include/head.php"); ?>
     <style type="text/css">
      input {
      border-style: unset;
      border-bottom: 1px solid #000000;
      width: 300px;
    }
    </style>
  </head>
    <body>
      <div class="container-scroller">
      <?php @include("include/navbar.php"); ?>
        <div class="container-fluid page-body-wrapper">
        <?php @include("include/sidebar.php"); ?>
          <div class="main-panel">
            <div class="content-wrapper">
              <div class="row page-title-header">
                <?php include'include/alert_msg.php'; ?>
                <div class="col-12" style="margin-top: 15px;">
                  <div class="page-header">
                    <h4 class="page-title">Change Password</h4>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12 col-xl-12">
                  <div class="card">
                    <div class="card-body">
                      <div class="login-form-bg h-100">
                        <div class="container h-100">
                          <div class="row justify-content-center h-100">
                            <div class="col-xl-6">
                              <div class="form-input-content">
                                <div class="card login-form mb-0">
                                  <div class="card-body pt-5">
                                    <h4 class="text-center">Admin</h4>
                                    <form class="mt-5 mb-5 login-input" name="chngpwd" onSubmit="return valid();" method="post" action="changepwdauth.php" >
                                      <table align="center"><center>
                                        <tr height="70"><td><input type="password" placeholder="Old Password" name="opwd" id="opwd" minlength="5"  ></td></tr>
                                        <tr height="70"><td><input type="password" placeholder="New Passowrd " name="npwd" id="npwd" minlength="5" ></td></tr>
                                        <tr height="70"><td><input type="password" placeholder="Confirm Password " name="cpwd" id="cpwd"></td></tr>
                                        <tr height="70"><td><button style="margin-left: 80px;" class="btn btn-primary" name="pwd">Change Password</button></td></tr>
                                      </table>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>  
                </div>
              </div>
            </div>
            <?php @include("include/footer.php");?>
          </div>
        </div>      
      </div>
    <?php @include("include/footer-script.php");?>
   </body>
   <script>
      function myFunction() {
        var x = document.getElementById("pwd");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
      }
       function valid()
    {
    if(document.chngpwd.opwd.value=="")
    {
    alert("Old Password Filed is Empty.");
    document.chngpwd.opwd.focus();
    return false;
    }
    else if(document.chngpwd.npwd.value=="")
    {
    alert("New Password Filed is Empty.");
    document.chngpwd.npwd.focus();
    return false;
    }
    else if(document.chngpwd.cpwd.value=="")
    {
    alert("Confirm Password Filed is Empty.");
    document.chngpwd.cpwd.focus();
    return false;
    }
    else if(document.chngpwd.npwd.value!= document.chngpwd.cpwd.value)
    {
    alert("Password and Confirm Password Field do not match.");
    document.chngpwd.cpwd.focus();
    return false;
    }
    
    return true;
    }
    </script>
</html>
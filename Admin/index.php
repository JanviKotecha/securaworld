<!DOCTYPE html>
<?php include("include/config.php");?>
<html lang="en">
  <head>
  <?php @include("include/head.php");?> 
  </head>
  <body>
    <?php include ("include/alert_msg.php"); ?>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth  theme-one" style="background-image: url('<?php echo ADMIN_BACKGROUND_URL; ?>login_1.jpg'); background-repeat: no-repeat; width: 100%;">
          <div class="row w-100">
            <div class="col-lg-4 mx-auto">
              <div class="auto-form-wrapper">
                <form  method="Post" action="loginAuth.php" >
                  <div class="form-group">
                    <label class="label">Username</label>
                    <div class="input-group">
                      <input type="text" class="form-control" name="user" placeholder="Username" required>
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="label">Password</label>
                    <div class="input-group">
                      <input type="password" name="pass" class="form-control" placeholder="*********" required>
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i> 
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="submit" name="loggedin" value="Login" class="btn btn-primary submit-btn btn-block">  
                  </div>
                </form>
              </div>
              <br><br><br>
              <p class="footer-text text-center">copyright © 2021 . All rights reserved.</p>      
            </div>
          </div>
        </div> 
      </div>
    </div> 
    <?php @include("include/footer-script.php");?>
  </body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Signin to your account</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo base_url();?>skydash/vendors/feather/feather.css">
  <link rel="stylesheet" href="<?php echo base_url();?>skydash/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="<?php echo base_url();?>skydash/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url();?>skydash/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo base_url();?>skydash/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
              <img src="https://cdn.dribbble.com/users/4051369/screenshots/12909247/19_4x.jpg">
              </div>
			  <h4>Signin to continue</h4>
			  <?php
      if(isset($no_user)){
        echo $no_user;
      }
      else if(isset($unverified)){
        echo $unverified;
      }
      else if(isset($incorrect_pwd)){
        echo $incorrect_pwd;
      }
      ?>
              <form class="pt-3" method="post">
                <div class="form-group">
				  <input type="text" class="form-control form-control-lg" name="email" placeholder="Enter your email">
				  <small class="text-danger font-weight-bold"><?php echo form_error('email', '<i class="fa fa-exclamation-circle"></i>');?></small>

                </div>
                <div class="form-group">
				  <input type="password" class="form-control form-control-lg"  name="pwd" placeholder="Enter your password">
				  <small class="text-danger font-weight-bold"><?php echo form_error('pwd', '<i class="fa fa-exclamation-circle"></i>');?></small>

                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">SIGN IN</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
              
                  <a href="forget_pass" class="auth-link text-black">Forgot password?</a>
                </div>
            
                <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="../Signup/cust_signup" class="text-primary">Create one here</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?php echo base_url();?>skydashvendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?php echo base_url();?>skydashjs/off-canvas.js"></script>
  <script src="<?php echo base_url();?>skydash/js/hoverable-collapse.js"></script>
  <script src="<?php echo base_url();?>skydash/js/template.js"></script>
  <script src="<?php echo base_url();?>skydash/js/settings.js"></script>
  <script src="<?php echo base_url();?>skydash/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>

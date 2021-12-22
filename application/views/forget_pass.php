<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Forgot Your Password?</title>
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
        <h4>Forgot your password?</h4>
        <h6 class="font-weight-light">No worries, enter your email to reset it</h6>

        <?php
              if(isset($invalid_email)){
                echo $invalid_email;
              }
              else if(isset($auth_token_fail)){
                echo $auth_token_fail;
              }
              else if(isset($email_sent)){
                echo $email_sent;
              }
              ?>
              <form class="pt-3" method="post">
                <div class="form-group">
				  <input type="text" class="form-control form-control-lg" name="email" placeholder="Enter your email">
				  <small class="text-danger font-weight-bold"><?php echo form_error('email', '<i class="fa fa-exclamation-circle"></i>');?></small>

                </div>
         
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">SEND RESET REQUEST</button>
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

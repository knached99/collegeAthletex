<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Create your account</title>
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
			 <!-- <img src="<?php echo base_url();?>skydash/images/logo.svg" alt="logo"> -->
              </div>
              <h4>New here?</h4>
			  <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
			  <?php if(isset($error)){
            echo $error;
          }
          else if(isset($err_msg)){
            echo $err_msg;
          }
          ?>
              <form class="pt-3" method="POST">
                <div class="form-group">
				  <input type="text" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="First Name" name="fName" value="<?php echo set_value('fName');?>">
				  <small class="text-success font-weight-bold"><?php if(isset($_POST['fName']) && form_error('fName') == FALSE){ echo 'Input Ok <i class="fa fa-check-circle"></i>';}?></small>
                  <small class="text-danger font-weight-bold"><?php echo form_error('fName', '<i class="fa fa-exclamation-circle"></i>');?></small>
                </div>
                <div class="form-group">
				  <input type="text" class="form-control form-control-lg"  placeholder="Last Name" name="lName" value="<?php echo set_value('lName');?>">
				  <small class="text-success font-weight-bold"><?php if(isset($_POST['lName']) && form_error('lName') == FALSE){ echo 'Input Ok <i class="fa fa-check-circle"></i>';}?></small>
                  <small class="text-danger font-weight-bold"><?php echo form_error('lName', '<i class="fa fa-exclamation-circle"></i>');?></small>
                </div>
                <div class="form-group">
				<input type="text" class="form-control form-control-lg" placeholder="Your email" name="email" value="<?php echo set_value('email');?>">
				<small class="text-success font-weight-bold"><?php if(isset($_POST['email']) && form_error('email') == FALSE){ echo 'Input Ok <i class="fa fa-check-circle"></i>';}?></small>
                <small class="text-danger font-weight-bold"><?php echo form_error('email', '<i class="fa fa-exclamation-circle"></i>');?></small>
				</div>
				<div class="form-group">
				<input type="text" class="form-control form-control-lg" placeholder="Your phone number" name="phone_num" value="<?php echo set_value('phone_num');?>">
				<small class="text-success font-weight-bold"><?php if(isset($_POST['phone_num']) && form_error('phone_num') == FALSE){ echo 'Input Ok <i class="fa fa-check-circle"></i>';}?></small>
                <small class="text-danger font-weight-bold"><?php echo form_error('phone_num', '<i class="fa fa-exclamation-circle"></i>');?></small>
                </div>
                <div class="form-group">
				  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="pwd">
				  <small class="text-danger font-weight-bold"><?php echo form_error('pwd', '<i class="fa fa-exclamation-circle"></i>');?></small>
				</div>
				<div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Confirm Password" name="confirm_pwd">
				  <small class="text-danger font-weight-bold"><?php echo form_error('confirm_pwd', '<i class="fa fa-exclamation-circle"></i>');?></small>

				</div>
 
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">SIGN UP</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Already have an account? <a href="../Login/signin" class="text-primary">Login</a>
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
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>

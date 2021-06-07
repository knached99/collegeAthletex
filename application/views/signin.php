<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Member Login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Font Awesome CSS-->
		<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="css/font.css">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?php echo base_url();?>signin/main.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="login-page">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">
            <!-- Logo & Information Panel-->
            <div class="col-lg-6 ">
              <div class="info d-flex align-items-center bg-dark rounded">
                <div class="content">
                  <div class="logo">
                    <h1>Athletex Login</h1>
                  </div>
                  <p>Signin to your dashboard</p>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6">
              <div class="form d-flex align-items-center rounded">
                <div class="content">
                  <form method="POST" class="mb-4" autocomplete="OFF">
                    <div class="form-group">
                      <input id="login-username" name="email" type="text" name="loginUsername" value="<?php echo set_value('email');?>" class="input-material">
                      <fieldset class="form-label" class="label-material">Email</fieldset>
											<span class="text-danger font-weight-bold text-center"><?php echo form_error('email', '<i class="fa fa-exclamation-circle"></i>')?></span>

                    </div>
                    <div class="form-group">
                      <input id="login-password" type="password" name="pwd" value="<?php echo set_value("pwd");?>"class="input-material">
                      <fieldset class="form-label" class="label-material">Password</fieldset>
											<span class="text-danger font-weight-bold text-center"><?php echo form_error('pwd', '<i class="fa fa-exclamation-circle"></i>')?></span>

                    </div>
                    <button type="submit" class="btn btn-primary font-weight-bold btn-md">Signin</button>

			</form>
			<?php if(isset($success)){
echo $success;
}
else if(isset($err_msg)){
echo $err_msg;
}
else if(isset($error)){
echo $error;
}
else if(isset($unverified)){
  echo $unverified;
}
else if(isset($not_exist)){
  echo $not_exist;
}
?>
			<a href="forgot_pass" class="forgot-pass">Forgot Password?</a><br>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <!--  <div class="copyrights text-center">
        <p>Design by <a href="https://bootstrapious.com/p/bootstrap-4-dark-admin" class="external">Bootstrapious</a></p>
        <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
    <!--  </div> -->
    </div>
    <!-- JavaScript files-->
    <script src="<?php echo base_url();?>memberLogin/vendor/jquery/jquery.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="<?php echo base_url();?>memberLogin/vendor/chart.js/Chart.min.js"></script>
    <script src="<?php echo base_url();?>memberLogin/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="<?php echo base_url();?>memberLogin/js/main.js"></script>
  </body>
</html>

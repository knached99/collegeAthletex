<!doctype html>
<html lang="en">
  <head>
  	<title>Become a Member</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="<?php echo base_url();?>/signup/css/style.css">

	</head>
	<body>
	<section class="ftco-section bg-white">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section" style="font-weight: 900; color: #f82249; text-align: center;">Create an Account <img src="https://cdn.dribbble.com/users/4051369/screenshots/12909247/19_4x.jpg" style="height: 100px;"></h2>
          <?php if(isset($error)){
            echo $error;
          }
          else if(isset($err_msg)){
            echo $err_msg;
          }
          ?>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12">
					<div class="wrap d-md-flex">
            <!-- https://uconn-today-universityofconn.netdna-ssl.com/wp-content/uploads/2017/01/Football160901b453-1.jpg-->
						<div class="text-wrap p-4 p-lg-5 d-flex img" style="background-image: url('https://images.wsj.net/im-239200?width=1280&size=1');">
							<div class="text w-100">
								<h2 class="mb-4">Welcome to Athletex</h2>
								<p style="color: #fff; font-weight: bolder; ">Signup to recieve exclusive benefits including member only discounts, rewards and perks, and meeting up with world renowned athletes!
                  <br> When you signup, you can also manage ticket purchases or reservations to game days
                </p>
							</div>
			      </div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="row justify-content-center py-md-5">
			      		<div class="col-lg-9">

									<form method="POST" class="signup-form">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
							      			<label class="label" for="name">First Name <i class="fa fa-user fa-lg text-secondary"></i></label>
							      			<input type="text" name="fName" class="form-control" value="<?php echo set_value('fName')?>">
                          <small class="text-success font-weight-bold"><?php if(isset($_POST['fName']) && form_error('fName') == FALSE){ echo 'Input Ok <i class="fa fa-check-circle"></i>';}?></small>
                          <small class="text-danger font-weight-bold"><?php echo form_error('fName', '<i class="fa fa-exclamation-circle"></i>');?></small>
							      		</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
							      			<label class="label" for="name">Last Name <i class="fa fa-user fa-lg text-secondary"></i></label>
                          <input type="text" name="lName" class="form-control" value="<?php echo set_value('lName')?>">
                          <small class="text-success font-weight-bold"><?php if(isset($_POST['lName']) && form_error('lName') == FALSE){ echo 'Input Ok <i class="fa fa-check-circle"></i>';}?></small>
                          <small class="text-danger font-weight-bold"><?php echo form_error('lName', '<i class="fa fa-exclamation-circle"></i>');?></small>
                        </div>
											</div>

											<div class="col-md-12">
												<div class="form-group">
							      			<label class="label" for="email">Email Address <i class="fa fa-envelope fa-lg text-secondary"></i></label>
							      			<input type="text" name="email" class="form-control" value="<?php echo set_value('email')?>">
                          <small class="text-success font-weight-bold"><?php if(isset($_POST['email']) && form_error('email') == FALSE){ echo 'Input Ok <i class="fa fa-check-circle"></i>';}?></small>
                          <small class="text-danger font-weight-bold"><?php echo form_error('email', '<i class="fa fa-exclamation-circle"></i>');?></small>

							      		</div>
											</div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="label" for="email">Phone Number <i class="fa fa-mobile fa-2x text-secondary"></i></label>
                          <input type="text" name="phone_num" placeholder="xxx-xxx-xxxx (format example)"class="form-control" value="<?php echo set_value('phone_num')?>">
                          <small class="text-success font-weight-bold"><?php if(isset($_POST['phone_num']) && form_error('phone_num') == FALSE){ echo 'Input Ok <i class="fa fa-check-circle"></i>';}?></small>
                          <small class="text-danger font-weight-bold"><?php echo form_error('phone_num', '<i class="fa fa-exclamation-circle"></i>');?></small>

                        </div>
                      </div>
											<div class="col-md-12">
												<div class="form-group">
						            	<label class="label" for="password">Password <i class="fa fa-lock fa-lg text-secondary"></i></label>
						              <input type="password" name="pwd" class="form-control" value="<?php echo set_value('pwd');?>">
                          <small class="text-success font-weight-bold"><?php if(isset($_POST['pwd']) && form_error('pwd') == FALSE){ echo 'Input Ok <i class="fa fa-check-circle"></i>';}?></small>
                          <small class="text-danger font-weight-bold"><?php echo form_error('pwd', '<i class="fa fa-exclamation-circle"></i>');?></small>

						            </div>
											</div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="label" for="password">Retype Password <i class="fa fa-lock fa-lg text-secondary"></i></label>
                          <input type="password" name="confirm_pwd" class="form-control" value="<?php echo set_value('confirm_pwd');?>">
                          <small class="text-success font-weight-bold"><?php if(isset($_POST['confirm_pwd']) && form_error('confirm_pwd') == FALSE){ echo 'Input Ok <i class="fa fa-check-circle"></i>';}?></small>
                          <small class="text-danger font-weight-bold"><?php echo form_error('confirm_pwd', '<i class="fa fa-exclamation-circle"></i>');?></small>

                        </div>
                      </div>
											<div class="col-md-12 my-4">
												<div class="form-group">
						            	<select name="ticket" class="form-control">
                            <option value="select ticket"<?php echo set_select('ticket','select ticket', FALSE);?>>Select Ticket</option>
                            <option value="Standard Seasonal Access - $150" <?php echo set_select('ticket', 'Standard Seasonal Access - $150');?>>Standard Seasonal Access - $150</option>
                              <option value="Pro Seasonal Access - $250" <?php echo set_select('ticket', 'Pro Seasonal Access - $250');?>>Pro Seasonal Access - $250</option>
                                <option value="Premium Seasonal Access - $350" <?php echo set_select('ticket', 'Premium Seasonal Access - $350');?>>Premium Seasonal Access - $350</option>
                          </select>
                          <small class="text-danger font-weight-bold"><?php echo form_error('ticket', '<i class="fa fa-exclamation-circle"></i>');?></small>

						            </div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
						            	<button name="join" type="submit" class="btn btn-primary submit p-3">Create my account</button>
						            </div>
											</div>
										</div>

				          </form>
				          <div class="w-100">
										<p class="ml-4 font-weight-bold">I'm already a member! <a href="../Login/signin" class="btn btn-success">Sign In</a></p>
				          </div>
			      		</div>
			      	</div>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

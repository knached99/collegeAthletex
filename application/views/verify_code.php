<!doctype html>
<html lang="en">
  <head>
  	<title>Verify your account</title>
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
					<h2 class="heading-section text-secondary" style="font-weight: 900;  text-align: center;">Verify Your Account <img src="https://cdn.dribbble.com/users/4051369/screenshots/12909247/19_4x.jpg" style="height: 100px;"></h2>
       
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
												<div class="form-group">
							      			<label class="label font-weight-bold" for="code">Verification Code</label>
							      			<input type="text" name="code" class="form-control">
											  <small class="text-danger"><?php echo form_error('code');?></small>
											</div>
										
											</div>
											<div class="col-md-12">
												<div class="form-group">
						            	<button type="submit" class="btn btn-primary btn-md">verify my account</button>
										<?php if(isset($invalid_code)){
            echo $invalid_code;
          }
        
          ?>
						            </div>
											</div>
										</div>

				          </form>
				  
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

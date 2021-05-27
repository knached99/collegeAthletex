<head>
  <style>
  body {
    background-position: center;
    background-image: url('https://miro.medium.com/max/3840/1*lmD7FIkUL4t5P-swMEPH7Q.jpeg');
    background-repeat: no-repeat;
    background-size: cover;
    color: #505050;
    font-family: "Rubik", Helvetica, Arial, sans-serif;
    font-size: 14px;
    font-weight: normal;
    line-height: 1.5;
    text-transform: none
}

.forgot {
    background-color: #fff;
    padding: 12px;
    border: 1px solid #dfdfdf
}

.padding-bottom-3x {
    padding-bottom: 72px !important
}

.card-footer {
    background-color: #fff
}

.btn {
    font-size: 13px
}

.form-control:focus {
    color: #495057;
    background-color: #fff;
    border-color: #76b7e9;
    outline: 0;
    box-shadow: 0 0 0 0px #28a745
}
  </style>
  <title>Forgot Password</title>
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<div class="container padding-bottom-3x mb-2 mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="forgot shadow-lg p-3 mb-5 bg-secondary rounded text-light">
                <h2>Forgot your password?</h2>
                <p>Change your password in three easy steps. This will help you to secure your password!</p>
                <ol class="list-unstyled">
                    <li><span class="text-danger text-medium">1. </span>Enter your email address below.</li>
                    <li><span class="text-danger text-medium">2. </span>Our system will generate a password reset link</li>
                    <li><span class="text-danger text-medium">3. </span>Click on the link to reset your password</li>
                </ol>
            </div>
            <form class="card mt-4" method="post">
                <div class="card-body">
                    <div class="form-group col-md-6"> <label class="form-label font-weight-bold">Enter your email address <i class="fa fa-envelope text-secondary fa-lg"></i></label> <input class="form-control" type="text" name="email">
                      <small class="text-danger font-weight-bold"><?php echo form_error('email', '<i class="fa fa-exclamation-circle"></i>');?></small>
                      <small class="form-text text-muted">Enter your email address so we can email a link to that address.</small>
                      <?php
                      if(isset($invalid_email)){
                        echo $invalid_email;
                      }
                      ?>
                    </div>
                </div>
                <div class="card-footer"> <button class="btn btn-success" type="submit">Get New Password</button> <a class="btn btn-danger" href="admin_signin" >Back to Login</a> </div>
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

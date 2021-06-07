<!DOCTYPE HTML>
<html lang="en" dir="ltr">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body class="bg-dark">
  <?php
  if( isset($reset_token) && isset($email) && $reset_status == TRUE){
    echo '
    <div class="container bg-white shadow-lg p-3 mb-5 mt-5 bg-white rounded" style="width: 40%;">
    <form method="POST">
  <div class="form-group col-md-6">
    <label class="form-label font-weight-bold">Create a new password</label>
    <input type="password" class="form-control" name="pwd" placeholder="Create new Password">
    <small class="text-danger font-weight-bold">'.form_error('pwd').'</small>
  </div>
  <div class="form-group col-md-6">
    <label class="form-label font-weight-bold">Retype Password</label>
    <input type="password" class="form-control" name="confirm_pass" placeholder="Retype that password">
    <small class="text-danger font-weight-bold">'.form_error('confirm_pass').'</small>

  </div>
  <div class="form-group">
  <button type="submit" class="btn btn-success">Reset Password</button>
  </div>
</form>
</div>
    ';
  }
  if( isset($reset_token) && isset($email) && $reset_status == FALSE){
    echo '<div class="container bg-white shadow-lg p-3 mb-5 mt-5 bg-white rounded">
    <p class="font-weight-bold text-center">Your password has already been reset.
  <br>If you have already forgotton your new password, <a href="../../forgot_pass" class="font-weight-bold text-primary">click here</a> to submit a new password reset request</p>
    </div>';
  }

  ?>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

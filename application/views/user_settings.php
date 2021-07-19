<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>User Dash</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/album/">

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="album.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="home_page" style="color: #ff3352; font-weight: 900; font-size: 30px;">ATHLETEX</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link text-white font-weight-bold" href="user_dash">Dash Home <span class="sr-only">(current)</span> <i class="fa fa-home"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white font-weight-bold" href="#">My Subscription <i class="far fa-bookmark"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white font-weight-bold" href="user_settings">Password Management <i class="fas fa-user-lock"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white font-weight-bold" href="contact_admin">Contact Administrator <i class="fas fa-pen-alt"></i></a>
          </li>
        </ul>
        <a href="signout" style="text-decoration: none;"class="navbar-text nav-item text-white font-weight-bold">
          Logout
          <i class="fas fa-sign-out-alt"></i>
        </a>
      </div>
    </nav>

    <main role="main">

      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="text-primary text-center font-weight-bold">My Settings</h1>
          <p class="lead text-muted font-weight-normal">Manage your account settings</p>

        </div>
      </section>

      <div class="album py-5 bg-light">
        <div class="container" style="width: 600px;">
          <?php
          if(isset($invalid_pwd)){
            echo $invalid_pwd;
          }
          else if(isset($update_success)){
            echo $update_success;
          }
          else if(isset($update_failed)){
            echo $update_failed;
          }
          ?>
          <div class="col">
          <div class="card mb-4 box-shadow">
            <h5 class="text-primary ml-3 mt-4 font-weight-bold">Update Password <i class="fa fa-lock"></i> <i class="fa fa-key"></i></h5>
            <div class="card-body">
          <form method="POST">
          <div class="row">
            <div class="col-md-6">
              <label class="font-weight-bold form-label">Current Password</label>
              <input class="form-control" name="curr_pwd" type="password">
              <small class="text-danger font-weight-bold"><?php echo form_error('curr_pwd', '<i class="fa fa-exclamation-circle"></i>');?></small>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label class="font-weight-bold form-label">New Password</label>
              <input class="form-control" name="new_pwd" type="password">
              <small class="text-danger font-weight-bold"><?php echo form_error('new_pwd', '<i class="fa fa-exclamation-circle"></i>');?></small>

            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label class="font-weight-bold form-label">Confirm Password</label>
              <input class="form-control" name="confirm_pwd" type="password">
              <small class="text-danger font-weight-bold"><?php echo form_error('confirm_pwd', '<i class="fa fa-exclamation-circle"></i>');?></small>

            </div>
          </div><br>
          <div class="row">
            <div class="col-md-4">
              <button class="btn btn-outline-primary font-weight-bold btn-md">Update Password</button>
            </div>
          </div>
          </form>
        </div>
        </div>
      </div>
    </div>
    <div class="col">

    </div>
    </div>
        </div>
      </div>

    </main>

    <footer class="text-muted">
      <div class="container">
        <p class="float-right">
          <a href="#" class="font-weight-normal text-primary" style="text-decoration: none;">Back to top <i class="fas fa-arrow-alt-circle-up"></i></a>
        </p>
        <p class="font-weight-bold" style="color: #ff3352;"> &copy; Copyright ATHLETEX <?php echo DATE('Y');?></p>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>

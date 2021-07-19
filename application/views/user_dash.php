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
          <h1 class="jumbotron-heading">Welcome back, <b class="text-primary"><?php echo $_SESSION['email'];?></b></h1>
          <?php if(isset($logout_fail)){
            echo $logout_fail;
          }?>

          <p class="lead text-muted font-weight-normal">View upcoming matches, reserve spots, and manage ticket subscription</p>

        </div>
      </section>

      <div class="album py-5 bg-light">
        <div class="container">
          <?php ?>
          <div class="row">
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <i class="card-img-top fa fa-user fa-4x text-center bg-dark text-white"></i>
                <div class="card-body">
                  <h5 class="card-title font-weight-bold">My Profile</h5>

                  <p class="card-text font-weight-bold">
                    First Name: <?php if(isset($this->session->fName)){ echo $this->session->fName;} else{ echo '<p class="font-weight-normal text-danger">Session data not available</p>';}?><br>
                    Last Name: <?php if(isset($this->session->lName)){ echo $this->session->lName;} else{ echo '<p class="font-weight-normal text-danger">Session data not available</p>';}?><br>
                    Email: <?php if(isset($this->session->email)){ echo $this->session->email;} else{ echo '<p class="font-weight-normal text-danger">Session data not available</p>';}?><br>
                    Ticket Subscribtion: <?php if(isset($this->session->ticket)){ echo $this->session->ticket;} else{ echo '<p class="font-weight-normal text-danger">Session data not available</p>';}?><br>
                  </p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#editProfile">Edit</button>
                    </div>

                  </div>
                </div>
              </div>
            </div>



            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <i class="card-img-top far fa-bookmark fa-4x text-center bg-dark text-white"></i>
                <div class="card-body">
                  <h5 class="card-title font-weight-bold">Subscription Status</h5>
                  <div class="d-flex justify-content-between align-items-center">
                    <p class="text-center font-weight-bold text-success ml-4" style="font-size: 30px;">Active <i class="fas fa-shield-check"></i></p>
                    <br><br>

                    <!--<p class="text-center font-weight-bold text-danger" style="font-size: 30px;">Inactive <i class="fa fa-shield"></i></p> -->
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

    </main>
    <!-- Modal Form -->
    <div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="editProfile" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary font-weight-bold" id="editProfile">Edit Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST">
          <div class="row">
            <div class="col-md-6">
              <label class="form-label font-weight-bold">
                First Name
              </label>
              <input type="text" name="fName" class="form-control" value="<?php if(!isset($this->session->fName)){ echo 'Error retrieving data';} else{ echo $this->session->fName;} ?>">
            </div>
            <div class="col-md-6">
              <label class="form-label font-weight-bold">
                Last Name
              </label>
              <input type="text" name="lName" class="form-control" value="<?php if(!isset($this->session->lName)){ echo 'Error retrieving data';} else{ echo $this->session->lName;}?>">
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label class="form-label font-weight-bold">
                Email
              </label>
              <input type="text" name="email" class="form-control" value="<?php if(!isset($this->session->email)){ echo 'Error retrieving data';} else{ echo $this->session->email;}?>">
            </div>
            <div class="col-md-6">
              <label class="form-label font-weight-bold">
                Ticket
              </label>
              <select name="ticket" class="form-control">
                 <option value="<?php if(!isset($this->session->ticket)){ echo 'Error retrieving data';} else{ echo $this->session->ticket;}?>"><?php if(!isset($this->session->ticket)){ echo 'Error retrieving data';} else{ echo $this->session->ticket;}?></option>
                 <option value="Standard Seasonal Access - $150">Standard Seasonal Access - $150</option>
                   <option value="Pro Seasonal Access - $250">Pro Seasonal Access - $250</option>
                     <option value="Premium Seasonal Access - $350">Premium Seasonal Access - $350</option>
               </select>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

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

<!DOCTYPE HTML>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>

<body class="alert text-center font-weight-bold bg-light">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand font-weight-bold text-danger" href="../admin_dash">ATHLETEX</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="../admin_dash">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Customers</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Settings</a>
        </li>
      </ul>
      <a class="nav-link navbar-text" href="../signout">
        Signout
      </a>
    </div>
  </nav>
  <div class="container shadow-lg p-3 mb-5 bg-white rounded">
    <div class="shadow-lg p-3 mb-5 bg-white rounded">
      <h5 class="text-secondary font-weight-bold">Respond to <?php echo "{$messages->fName}"?></h5>
    <div class="row">
      <div class="col">
        <form method="POST">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label class="form-label font-weight-bold">Request Id</label>
          <input type="email" class="form-control" name= "message_id" placeholder="Message ID" readonly value="<?php echo "{$messages->message_id}"?>">
        </div>
        <div class="form-group col-md-6">
          <label class="font-weight-bold form-label">First Name</label>
          <input type="text" class="form-control" name="first_name" readonly placeholder="First Name" value="<?php echo "{$messages->fName}"?>">
        </div>
      </div>
      <div class="form-row">
      <div class="form-group col-md-6">
        <label class="form-label font-weight-bold">Last Name</label>
        <input type="text" class="form-control" name="last_name" readonly placeholder="Last Name" value="<?php echo "{$messages->lName}"?>">
      </div>
      <div class="form-group col-md-6">
        <label class="form-label font-weight-bold">Email</label>
        <input type="text" readonly class="form-control"  name="email" placeholder="email@example.com" value="<?php echo "{$messages->email}"?>">
      </div>
    </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label class="form-label font-weight-bold">Subject</label>
          <input type="text" readonly class="form-control" name="subject" placeholder="Subject" value="<?php echo "{$messages->subject}"?>">
        </div>
      </div>
      <div class="form-group">

          <label class="form-label font-weight-bold">
            Customer's Message
          </label>
          <textarea readonly class="form-control" name="cust_msg" cols="5">
            <?php echo "{$messages->message}";?>
          </textarea>
        </div>
          <div class="form-group">

              <label class="form-label font-weight-bold">
                Your Response
              </label>
              <textarea class="form-control" cols="5"  name="response">
              </textarea>
              <small class="text-danger font-weight-bold"><?php echo form_error('response', '<i class="fa fa-exclamation-circle"></i>');?></small>

            </div>
      </div>
      <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane fa-2x"></i></button>

    </form>
    </div>
  </div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
<body>
  <div class="container shadow-lg p-3 mb-5 bg-light rounded">

  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

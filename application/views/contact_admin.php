<head>
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>Contact Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body class="bg-light">
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
          <a class="nav-link text-white font-weight-bold" href="#">My Settings <i class="fas fa-user-cog"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white font-weight-bold" href="contact_admin">Contact Administrator <i class="fas fa-pen-alt"></i></a>
        </li>
      </ul>
      <a href="../Login/signin"  style="text-decoration: none;"class="navbar-text nav-item text-white font-weight-bold">
        Logout
        <i class="fas fa-sign-out-alt"></i>
      </a>
    </div>
  </nav>
  <div class="container mt-5 col-lg-6">
    <div class="card shadow-lg p-3 mb-5 bg-white rounded">
      <h2 class="card-title font-weight-bold text-primary text-sm-left">
        Contact our Admin team
      </h2>
  <form method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label class="form-label font-weight-bold">First Name</label>
      <input type="text" class="form-control" name="fName" placeholder="First Name" value="<?php echo set_value('fName');?>">
      <small class="font-weight-bold text-danger"><?php echo form_error('fName', '<i class="fa fa-exclamation-circle"></i>');?></small>
      <small class="text-success font-weight-bold"><?php if(isset($_POST['fName']) && form_error('fName') == FALSE) {echo ' <i class="fa fa-check-circle"></i>';}?></small>
    </div>

  <div class="form-group col-md-6">
    <label class="form-label font-weight-bold">Last Name</label>
    <input type="text" name="lName" class="form-control"  placeholder="Last Name" value="<?php echo set_value('lName');?>">
    <small class="font-weight-bold text-danger"><?php echo form_error('lName', '<i class="fa fa-exclamation-circle"></i>');?></small>
    <small class="text-success font-weight-bold"><?php if(isset($_POST['lName']) && form_error('lName') == FALSE) {echo ' <i class="fa fa-check-circle"></i>';}?></small>

  </div>
    </div>
    <div class="form-row">
  <div class="form-group col-md-6">
    <label class="form-label font-weight-bold">Email</label>
    <input type="text" name="email" class="form-control" placeholder="email@email.com" value="<?php echo set_value('email');?>">
    <small class="font-weight-bold text-danger"><?php echo form_error('email', '<i class="fa fa-exclamation-circle"></i>');?></small>
    <small class="text-success font-weight-bold"><?php if(isset($_POST['email']) && form_error('email') == FALSE) {echo ' <i class="fa fa-check-circle"></i>';}?></small>


  </div>
    <div class="form-group col-md-6">
      <label class="form-label font-weight-bold">Subject</label>
      <select name="subject" class="form-control">
        <option selected>Select a subject</option>
        <option <?php echo set_select('subject', 'General Inquiries');?>>General Inquiries</option>
        <option <?php echo set_select('subject', 'Web app suggestions');?>>Web app suggestions</option>
        <option <?php echo set_select('subject', 'Bug fixes and improvements');?>>Bug fixes and improvements</option>
        <option <?php echo set_select('subject', 'Subscription Upgrade')?>>Subscription Upgrade</option>
        <option <?php echo set_select('subject', 'Subscription Cancellation')?>>Subscription Cancellation</option>
      </select>
      <small class="font-weight-bold text-danger"><?php echo form_error('subject', '<i class="fa fa-exclamation-circle"></i>');?></small>

    </div>
  </div>
  <div class="form-group col-md-6">
    <label class="form-label font-weight-bold">Message</label>
    <textarea  name="message" class="form-control" cols="5"><?php echo set_value('message');?>
    </textarea>
  <small class="font-weight-bold text-danger"><?php echo form_error('message', '<i class="fa fa-exclamation-circle"></i>');?></small>
  <small class="text-success font-weight-bold"><?php if(isset($_POST['message']) && form_error('message') == FALSE) {echo ' <i class="fa fa-check-circle"></i>';}?></small>
  </div>
  <button type="submit" class="btn btn-primary" style="width: 50%;">Send Message</button>
  <?php if(isset($message_success)){ echo $message_success;}
  else if(isset($message_error)){
    echo $message_error;
  }
  ?>
</form>
</div>
</div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

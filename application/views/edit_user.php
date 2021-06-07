<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body class="bg-dark">
  <div class="container mt-5 shadow-lg p-3 mb-5 bg-light rounded" style="width: 50%;">
    <h5 class="font-weight-bold text-primary text-center mb-4">Edit <?php echo "{$user_data->fName}"?>'s Profile</h5>
    <?php if(isset($error)){
      echo $error;
    }
    else if(isset($success)){
      echo $success;
    }
    ?>
<form method="POST">
<div class="form-row">
<div class="form-group col-md-6">
<label class="form-label font-weight-bold">First Name</label>
<input type="text" class="form-control" placeholder="First Name" name="fName" readonly value="<?php echo "{$user_data->fName}"?>">
</div>
<div class="form-group col-md-6">
<label class="form-label font-weight-bold">Last Name</label>
<input type="text" class="form-control"  readonly placeholder="Last Name" name="lName" value="<?php echo "{$user_data->lName}"?>" >
</div>
</div>
<div class="form-row">
<div class="form-group col-md-6">
<label class="form-label font-weight-bold">Email</label>
<input type="text" class="form-control"  placeholder="email@email.com" name="email" value="<?php echo set_value('email', $user_data->email);?>">
<small class="text-danger font-weight-bold"><?php echo form_error('email', '<i class="fa fa-exclamation-circle fa-lg"></i>');?></small>

</div>
<div class="form-group col-md-6">
<label class="form-label font-weight-bold">Phone Number</label>
<input type="text" class="form-control"  name="phone_num" placeholder="xxx-xxx-xxxx"  value="<?php echo set_value('phone_num', $user_data->phone_num);?>">
<small class="text-danger font-weight-bold"><?php echo form_error('phone_num', '<i class="fa fa-exclamation-circle fa-lg"></i>');?></small>
</div>
</div>
<div class="form-group col-lg-6">
<label class="form-label font-weight-bold">Ticket</label>
<select class="form-control" name="ticket">
<option><?php echo "{$user_data->ticket}"?> </option>
     <option value="Standard Seasonal Access - $150" <?php echo set_select('ticket', 'Standard Seasonal Access - $150');?>>Standard Seasonal Access - $150</option>
       <option value="Pro Seasonal Access - $250" <?php echo set_selecT('ticket', 'Pro Seasonal Access - $250');?>>Pro Seasonal Access - $250</option>
         <option value="Premium Seasonal Access - $350" <?php echo set_select('ticket', 'Premium Seasonal Access - $350');?>>Premium Seasonal Access - $350</option>
   </select>
</select>
</div>
<button class="btn btn-outline-primary font-weight-bold" type="submit">Update Profile</button>
<a class="btn btn-outline-dark font-weight-bold" href="../admin_dash">Go Back</a>

</form>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>


<!DOCTYPE html>
<html>
<head>
  <title>Signing you in...</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta http-equiv="refresh" content="4; ../Admin/admin_dash" />
</head>

<body class="alert text-center font-weight-bold bg-light">
  <div class="container shadow-lg p-3 mb-5 bg-white rounded">
    <div class="shadow-lg p-3 mb-5 bg-white rounded">
    <div class="row">
      <div class="col">
        <?php
        if(isset($sess_err)){
          echo '<h2 class="text-center text-success text-small font-weight-bold">'.$sess_err.'</h2>';
        }
        else{
          echo '<h2 class="text-center text-small font-weight-bold" style="color: #6c42f5">Redirecting to your dashboard, <br>hang tight!</h2>';
        }
        ?>
    <img src="http://aaravwebsolutions.com/images/loader.gif" class="text-center">
    </div>
  </div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>

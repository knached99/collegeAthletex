<head>
  <link href="<?php echo base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">

</head>
<body class="bg-dark">
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary font-weight-bold">
  <a class="navbar-brand text-danger" href="admin">Admin Home <i class="fa fa-home fa-lg"></i></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link text-white" href="signout/<?php echo $_SESSION['username']?>">Signout <i class="fa fa-sign-out fa-lg"></i>(       <?php echo $_SESSION['username'];?>)</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" method="POST">
      <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search by first name" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" name="submit"type="submit">Search</button>
      <small class="text-danger font-weight-bold"><?php echo form_error('search', '<i class="fa fa-exclamationc-circle"></i>');?></small>
    </form>
  </div>
</nav>
<div class="table-responsive-md bg-dark">
  <table class="table table-bordered" style="overflow-x: auto;" width="100%" cellspacing="0">
    <thead class="bg-dark text-white font-weight-bold">
      <tr>
        <th>Member ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Ticket Purchased</th>
        <th>Delete Member</th>
      </tr>
    </thead>
    <tbody class="text-white">
      <?php
      foreach($results['data'] as $row){
        echo '<tr>
        <td>'.$row->user_id.'</td>
        <td>'.$row->fName.'</td>
        <td>'.$row->lName.'</td>
        <td>'.$row->email.'</td>
        <td>'.$row->phone_num.'</td>
        <td>'.$row->ticket.'</td>
        <td><form action=http://localhost:8888/collegeAthletex/index.php/App/del_user/'.$row->user_id.'>
        <input type="hidden" value='.$row->user_id.'>
        <button class="btn btn-danger btn-xs font-weight-bold"> <i class="fa fa-trash"></i> Delete Member</button>
        </form>
        </td>
        </tr>';
      }
  ?>

    </tbody>
  </table>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

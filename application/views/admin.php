<?php
function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7); // floor rounds decimal down to the nearest integer
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
date_default_timezone_set("America/New_York");

$currTime = date('H');

//Calculate the current time based on the date/time region that was set
// REMINDER TO UPDATE CODE FOR DAYLIGHT SAVINGS TIME
switch($currTime){
  case $currTime >=5 && $currTime <=11:
  $displayMessage ='<i class="fa fa-sun fa-2x text-warning"></i> <br> <p class="font-weight-bold">Good Morning , '.$_SESSION['username'].'</p>';
  break;
  case $currTime >=12 && $currTime <=18:
  $displayMessage = '<i class="fas fa-cloud fa-2x text-white"></i> <br> <p class="font-weight-bold">Good Afternoon , '.$_SESSION['username'].'</p>';
  break;
  case $currTime >=19 || $currTime <=4:
  $displayMessage = '<i class="fa fa-moon fa-flip-horizontal text-white fa-2x"></i> <br> <p class="font-weight-bold">Good Evening , '.$_SESSION['username'].'</p>';
  break;
  default:
  $displayMessage = 'No timezone was set';
  break;


}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Admin Dash</title>
  <!-- Favicon -->
  <link rel="icon" href="<?php echo base_url();?>adminDash/assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="<?php echo base_url();?>adminDash/assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url();?>adminDash/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="<?php echo base_url();?>adminDash/assets/css/argon.css?v=1.2.0" type="text/css">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/autofill/2.3.7/css/autoFill.bootstrap4.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.bootstrap4.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/colreorder/1.5.4/css/colReorder.bootstrap4.min.css">
   <!-- Responsivness for datatables-->
   <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.8/css/responsive.dataTables.min.css">
   <!-- Scroller -->
   <link rel="stylesheet" href="https://cdn.datatables.net/scroller/2.0.4/css/scroller.dataTables.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/searchbuilder/1.0.1/css/searchBuilder.dataTables.min.css">
</head>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
        <!--  <img src="<?php echo base_url();?>adminDash/assets/img/brand/blue.png" class="navbar-brand-img" alt="...">-->
        <img src="https://premierequestrian.com/wp-content/uploads/2019/10/AthletexLogoWhite.gif">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="admin_dash">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="admin_profile">
                <i class="ni ni-single-02 text-yellow"></i>
                <span class="nav-link-text">Profile</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="examples/register.html">
                <i class="ni ni-circle-08 text-pink"></i>
                <span class="nav-link-text">Admins</span>
              </a>
            </li>

          </ul>
          <!-- Divider -->
          <hr class="my-3">
          <!-- Heading -->
          <!-- Navigation -->
          <ul class="navbar-nav mb-md-3">
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->

          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <li class="nav-item d-sm-none">
              <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                <i class="ni ni-zoom-split-in"></i>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-email-83"><sup class="badge badge-pill bg-danger"><?php echo $num_rows;?></sup></i>
              </a>
              <div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right py-0 overflow-hidden">
                <!-- Dropdown header -->
                <div class="px-3 py-3">
                  <h2 class="text-sm text-muted m-0">You have <strong class="text-primary"><?php echo $num_rows;?></strong> notifications.</h2>
                </div>
                <!-- List group -->
                <div class="list-group list-group-flush">

                  <?php
                  foreach($messages['data'] as $row){
                    echo '
                    <a href="respond_to/'.$row->message_id.'" class="list-group-item list-group-item-action">
                      <div class="row align-items-center">
                        <div class="col-auto">
                          <!-- Avatar -->
                          <span class="shortcut-media avatar rounded-circle bg-gradient-green">
                            <i class="ni ni-email-83"></i>
                          </span>
                          </div>
                        <div class="col ml--2">
                          <div class="d-flex justify-content-between align-items-center">
                            <div>
                              <h4 class="mb-0 text-sm">'.$row->fName.' '.$row->lName.'</h4>
                            </div>
                            <div class="text-right text-muted">
                              <small>'.time_elapsed_string($row->date_sent).'</small>
                            </div>
                          </div>
                          <p class="text-sm mb-0">'.$row->subject.'</p>
                        </div>
                      </div>
                    </a>
                    ';
                  }
                  ?>

                </div>
                <!-- View all -->
                <!--<a href="#!" class="dropdown-item text-center text-primary font-weight-bold py-3">View all</a>-->
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-bell-55"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-dark bg-default  dropdown-menu-right ">
                <div class="row shortcuts px-4">
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-red">
                      <i class="ni ni-calendar-grid-58"></i>
                    </span>
                    <small>Calendar</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-orange">
                      <i class="ni ni-email-83"></i>
                    </span>
                    <small>Email</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-info">
                      <i class="ni ni-credit-card"></i>
                    </span>
                    <small>Payments</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-green">
                      <i class="ni ni-books"></i>
                    </span>
                    <small>Reports</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-purple">
                      <i class="ni ni-pin-3"></i>
                    </span>
                    <small>Maps</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-yellow">
                      <i class="ni ni-basket"></i>
                    </span>
                    <small>Shop</small>
                  </a>
                </div>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle bg-dark">
                  <!--  <img alt="Image placeholder" src="<?php echo base_url();?>adminDash/assets/img/theme/team-4.jpg">-->
                  <i class="far fa-user fa-lg"></i>
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold"><?php echo strtolower($_SESSION['username']);?></span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome <?php echo strtolower($_SESSION['username']);?>!</h6>
                </div>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>My profile</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-settings-gear-65"></i>
                  <span>Settings</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-calendar-grid-58"></i>
                  <span>Activity</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-support-16"></i>
                  <span>Support</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="signout" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0"><?php echo $displayMessage;?></h6>
            </div>
            <!--<div class="col-lg-6 col-5 text-right">
              <a href="#" class="btn btn-sm btn-neutral">New</a>
              <a href="#" class="btn btn-sm btn-neutral">Filters</a>
            </div>-->
          </div>
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Today's Date</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo  date('F jS, Y');?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="ni ni-calendar-grid-58"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i></span>
                    <span class="text-nowrap"></span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Members</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo $total_users;?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                        <i class="ni ni-chart-pie-35"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i></span>
                    <span class="text-nowrap"></span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Sales</h5>
                      <span class="h2 font-weight-bold mb-0">0</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="ni ni-money-coins"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i></span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Performance</h5>
                      <span class="h2 font-weight-bold mb-0">0%</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                        <i class="ni ni-chart-bar-32"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i></span>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-8">
          <div class="card bg-default">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-light text-uppercase ls-1 mb-1">Overview</h6>
                  <h5 class="h3 text-white mb-0">Sales Revenue</h5>
                </div>
                <div class="col">
                  <ul class="nav nav-pills justify-content-end">
                    <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales-dark" data-update='{"data":{"datasets":[{"data":[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}' data-prefix="$" data-suffix="k">
                      <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                        <span class="d-none d-md-block">Month</span>
                        <span class="d-md-none">M</span>
                      </a>
                    </li>
                    <li class="nav-item" data-toggle="chart" data-target="#chart-sales-dark" data-update='{"data":{"datasets":[{"data":[0, 20, 5, 25, 10, 30, 15, 40, 40]}]}}' data-prefix="$" data-suffix="k">
                      <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                        <span class="d-none d-md-block">Week</span>
                        <span class="d-md-none">W</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <!--<div class="chart">
                <!-- Chart wrapper -->
            <!--    <canvas id="chart-sales-dark" class="chart-canvas"></canvas>
            </div>-->
            <h2 class="text-danger">No Data Available</h2>
            </div>
          </div>
        </div>
        <div class="col-xl-4">
          <div class="card">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6>
                  <h5 class="h3 mb-0">Total orders</h5>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <!--<div class="chart">
                <canvas id="chart-bars" class="chart-canvas"></canvas>
              </div> -->
              <h2 class="text-danger">No Data Available</h2>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-8">
          <div class="card"  style="width: 150%;">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                <form class="navbar-search navbar-search-dark form-inline mr-sm-3 mb-3" id="navbar-search-main">
                    <div class="form-group mb-0">
                      <div class="input-group input-group-alternative input-group-merge">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                        <input class="form-control font-weight-bold" placeholder="Search for a customer" id="myInput" type="text">
                      </div>
                    </div>
                    <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </form>
                  <h3 class="mb-0 text-primary" style="font-weight: 900;">Athletex Members</h3>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush table-hover" id="myTable">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Member ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Ticket Subscription</th>
                    <th scope="col">Date Joined</th>
                    <th scope="col">Account Status</th>
                    <th scope="col">Edit Member</th>
                    <th scope="col">Delete Member</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <?php
       if($results['data']){
         foreach($results['data'] as $row){
           $status ='';
           switch($row->verify_status){
             case 0:
             $status = '<p class="text-danger font-weight-bold">not yet verified <i class="fa fa-exclamation-circle fa-lg"></i></p>';
             break;
             case 1:
             $status='<p class="text-success font-weight-bold">account verified <i class="fa fa-check-circle fa-lg"></i></p>';
           }
           $date_joined = date('F, jS, Y',strtotime($row->curr_date));
           echo '<tr class="text-dark">
           <td>'.$row->user_id.'</td>
           <td>'.$row->fName.'</td>
           <td>'.$row->lName.'</td>
           <td>'.$row->email.'</td>
           <td>'.$row->phone_num.'</td>
           <td>'.$row->ticket.'</td>
           <td>'.$date_joined.'</td>
           <td>'.$status.'</td>

          <!-- <td><a class="btn btn-outline-success" href="edit_user/'.$row->user_id.'"><i class="fa fa-pen fa-lg"></i></a></td> -->
          <td><a class="btn btn-primary font-weight-bold" data-toggle="modal" href="edit_profile/'.$row->user_id.'" data-target="#editProfile">Edit Profile</a></td>
           <td><a class="btn btn-danger" href="del_user/'.$row->user_id.'"><i class="fa fa-trash-alt fa-lg"></i></a></td>
           </tr>';
         }
       }

       else{
         echo '<p class="text-warning font-weight-bold ml-3">No users have signed up yet <i class="fa fa-exclamation-circle"></i></p>';
       }
       ?>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">
            <div class="copyright text-center  text-lg-left  text-muted">
              &copy; <?php echo DATE('Y');?> <a class="font-weight-bold ml-1 text-primary" target="_blank">ATHLETEX</a>
            </div>
          </div>
          <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
                <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
              </li>
              <li class="nav-item">
                <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
              </li>
              <li class="nav-item">
                <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
              </li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!-- Modal popup -->
  <div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledny="editProfile" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editProfile">
            Edit <?php echo $row->fName ?>'s Profile
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="close">
            <span aria=hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <form method="POST">
            <?php if(isset($error)){
              echo $error;
            }
            else if(isset($success)){
              echo $success;
            }
            ?>
          <div class="row">
            <div class="col-md-6">
              <label class="form-label font-weight-bold">
                First Name
              </label>
              <input type="text" class="form-control" name="fName" readonly value="<?php echo $row->fName;?>">
            </div>
            <div class="col-md-6">
              <label class="form-label font-weight-bold">
                Last Name
              </label>
              <input type="text" class="form-control" name="lName" readonly value="<?php echo $row->lName;?>">

            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label class="form-label font-weight-bold">
                Email
              </label>
              <input type="text" class="form-control" name="email" value="<?php echo $row->email;?>">

            </div>
            <div class="col-md-6">
              <label class="form-label font-weight-bold">
                Phone Number
              </label>
              <input type="text" class="form-control" name="fName"  value="<?php echo $row->phone_num;?>">

            </div>
          </div>
          <div class="row">
            <div class="col-md-9">
              <label class="form-label font-weight-bold">
                Select Ticket
              </label>
              <select class="form-control">
                <option value="Standard Seasonal Access - $150">Standard Seasonal Access - $150</option>
                <option value="Pro Seasonal Access - $250">Pro Seasonal Access - $250</option>
                <option value="Premium Seasonal Access - $350">Premium Seasonal Access - $350</option>
              </select>
            </div>
          </div>
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark font-weight-bold" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success font-weight-bold">Save</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="<?php echo base_url();?>adminDash/assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="<?php echo base_url();?>adminDash/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url();?>adminDash/assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="<?php echo base_url();?>adminDash/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="<?php echo base_url();?>adminDash/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="<?php echo base_url();?>adminDash/assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="<?php echo base_url();?>adminDash/assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="<?php echo base_url();?>adminDash/assets/js/argon.js?v=1.2.0"></script>
  <script>
//Jquery quick search
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
  <sctipt src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.bootstrap4.min.js"></script>
     <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
     <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.colVis.min.js"></script>
     <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
     <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
     <script src="https://cdn.datatables.net/colreorder/1.5.4/js/dataTables.colReorder.min.js"></script>
     <script src="https://cdn.datatables.net/autofill/2.3.7/js/dataTables.autoFill.min.js"></script>
     <script src="https://cdn.datatables.net/autofill/2.3.7/js/autoFill.bootstrap4.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
     <script src="https://cdn.datatables.net/responsive/2.2.8/js/dataTables.responsive.min.js"></script>
     <!-- A virtual renderer for DataTables,
     allowing the table to look like it scrolls for the full data set,
      but actually only drawing the rows required for the current display,
      for fast operation-->
     <script src="https://cdn.datatables.net/scroller/2.0.4/js/dataTables.scroller.min.js"></script>
     <!-- SearchBuilder provides the end user with an easy to use UI for
     them to create their own complex custom search expression for a DataTable.
     When searching through large sets of data for specific
      data, this can be extremely useful.-->
     <script src="https://cdn.datatables.net/searchbuilder/1.0.1/js/dataTables.searchBuilder.min.js"></script>
     <script>
      $(function () {
       $('[data-toggle="tooltip"]').tooltip()
     });

     $(function(){
       $('#restrictionPopup').modal({
         keyboard: false,
         focus: true,
         show: true,
         backdrop: true
       });

     });
          </script>
          <!-- DataTables script-->
          <script>
$(function (){
  $('#dataTable').DataTable({
    scrollY: 400,
    processing: true,
    paging:true,
    searching: true,
    responsive: true,
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],


  });
});
</script>
</body>

</html>

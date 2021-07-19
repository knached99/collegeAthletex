<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {

  public function redirect_fail(){
    $this->load->view('redirect_failed');
  }

  public function signin(){
$this->load->model('Insert');
$this->load->helper('form');
$this->load->library('form_validation');
$this->form_validation->set_rules('email', 'email','required|valid_email');
$this->form_validation->set_rules('pwd', 'Password', 'required');
if($this->form_validation->run()==FALSE){
  $this->load->view('signin');
}
else{
  // Define login variables
  $email = $this->input->post('email');
  $pass = $this->input->post('pwd');
  $exists = $this->Insert->if_exists($email);
  $status = $this->Insert->check_status($email);
  $results = $this->Insert->validate($email, $pass);
  if($exists == FALSE){
    $data['no_user']='<div class="alert alert-warning">Looks like you are not in our system. You\'ll need to create an account <a href="../Signup/cust_signup">here</a> <i class="fa fa-exclamation-circle"></i></div>';
    $this->load->view('signin', $data);
  }
  else if($status == FALSE){
    $data['unverified']='<div class="alert alert-warning font-weight-bold">Your account has not yet been verified, please check your email <i class="fa fa-exclamation-circle"></i></div>';
    $this->load->view('signin', $data);
  }
  else if($results == FALSE){
    $data['incorrect_pwd']='<div class="alert alert-danger">The password you entered is incorrect <i class="fa fa-times-circle"></i></div>';
    $this->load->view('signin', $data);
  }
  else if($results == TRUE){
    $this->load->library('session');
    $user_data = $this->Insert->get_user($email);
    $sess_data = array(
      'email'=>$email,
      'fName'=>$fName,
      'lName'=>$lName,
      'ticket'=>$ticket

    );
    $this->session->set_userdata($sess_data);
    redirect('http://localhost:8888/collegeAthletex/index.php/UserDash/user_dash');
  }

}


}
public function user_dash(){
  $this->load->view('user_dash');
}
public function forget_pass(){
  $this->load->model('Insert');
  $this->load->helper('form');
  $this->load->library('form_validation');
  $this->form_validation->set_rules('email', 'email','required|valid_email');
  if($this->form_validation->run()==FALSE){
    $this->load->view('forget_pass');
  }
  else{
    $email = $this->input->post('email');
    $validate_email = $this->Insert->if_exists($email);
    if($validate_email == FALSE){
      $data['invalid_email']='<div class="alert alert-danger">Email entered does not exist. You must enter the email you used to setup your account <i class="fa fa-exclamation-circle"></i></div>';
      $this->load->view('forget_pass', $data);
    }
    else{
      $this->load->library('encryption');
      $auth_token = bin2hex($this->encryption->create_key(16));
      if($this-> __email_user($email, $auth_token)==TRUE){
        if($insert_auth = $this->Insert->gen_token($auth_token, $email) == FALSE){
          $data['auth_token_fail']='<div class="alert alert-warning">Something went wrong and we could not send a password reset request. <i class="fa fa-times-circle"></i></div>';
          $this->load->view('forget_pass', $data);
        }
        else{
          $data['email_sent']='<div class="alert alert-success font-weight-normal">An email with instructions on how to reset your password has been sent to <b class="text-dark">'.$email.'</b> <i class="fa fa-check-circle"></i></div>';
          $this->load->view('forget_pass', $data);
        }
      }
      else if($this-> __email_user($email, $auth_token)==FALSE){
        echo 'Cannot send email';
      }
      else{
        $data['email_sent']='<div class="alert alert-success font-weight-normal">An email with instructions on how to reset your password has been sent to <b>'.$email.'</b> <i class="fa fa-thumbs-up"></i></div>';
        $this->load->view('forget_pass', $data);
      }
    }
  }
}
public function reset_pwd($email, $auth_token){
  $this->load->model('Insert');
  $data['reset_status']=$this->Insert->get_reset_status($email, $auth_token);
  $data['email']=$email;
  $data['auth']=$auth_token;
  $this->load->library('form_validation');
  $this->load->helper('form');
  $this->form_validation->set_rules('pwd', 'Password', 'required|trim|regex_match[/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/]');
  $this->form_validation->set_rules('confirm_pass', 'Retype Password', 'required|trim|matches[pwd]');
  if($this->form_validation->run() == FALSE){
    $this->load->view('reset_pwd', $data);
  }
  else{
    $new_pwd = password_hash($this->input->post('pwd'), PASSWORD_DEFAULT);
    $update_pass = $this->Insert->update_user_pwd($new_pwd, $email);
    if($update_pass == TRUE){
      echo '
      <html>
        <head>
          <meta http-equiv="refresh" content="3; ../../signin" />
          <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
          <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
        </head>
          <style>
            body {
              text-align: center;
              padding: 40px 0;
              background: #EBF0F5;
            }
              h1 {
                color: #88B04B;
                font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
                font-weight: 900;
                font-size: 40px;
                margin-bottom: 10px;
              }
              p {
                color: #404F5E;
                font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
                font-size:20px;
                margin: 0;
              }
            i {
              color: #9ABC66;
              font-size: 100px;
              line-height: 200px;
              margin-left:-15px;
            }
            .card {
              background: white;
              padding: 60px;
              border-radius: 4px;
              box-shadow: 0 2px 3px #C8D0D8;
              display: inline-block;
              margin: 0 auto;
            }
          </style>
          <title>Redirecting...</title>
        </head>
          <body>
            <div class="card">
            <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
              <img src="https://i.pinimg.com/originals/76/77/ed/7677edd5a44b10130b8824ca020ba60b.gif" style="height: 200px; position: relative; left: -50px; border-radius: 50%;">
            </div>
              <h1>Successfully updated your password </h1><i class="fa fa-check-circle fa-4x"></i>

            </div>
          </body>
      </html>

      ';
    }
    else {
      echo '
      <!DOCTYPE html>
      <html>
      <head>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
          <meta http-equiv="refresh" content="5; ../../forgot_pass" />
          <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      </head>

      <body class="alert text-center font-weight-bold bg-white">
        <div class="container bg-white">
          <div class="card  shadow-lg p-3 mb-5 bg-white rounded">
          <div class="row">
            <div class="col">
              <h5 class="float-left text-danger font-weight-bold">Unable to update your password</h5><br>
              <h2 class="text-center text-success text-small font-weight-bold">Redirecting back to password reset form</h2>
          <img src="https://cdn.dribbble.com/users/216925/screenshots/2044807/bolt.gif" class="text-center">
          </div>
        </div>
      </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      </body>

      </html>
';
    }
  }
}

private function __email_user($email, $auth_token){
  $body ='

  <!doctype html>
  <html lang="en-US">

  <head>
      <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
      <title>Reset Password Email Template</title>
      <meta name="description" content="Reset Password Email Template.">
      <style type="text/css">
          a:hover {text-decoration: underline !important;}
      </style>
  </head>

  <body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
      <!--100% body table-->
      <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8"
          style="@import url("https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: "Open Sans", sans-serif;">
          <tr>
              <td>
                  <table style="background-color: #f2f3f8; max-width:670px;  margin:0 auto;" width="100%" border="0"
                      align="center" cellpadding="0" cellspacing="0">
                      <tr>
                          <td style="height:80px;">&nbsp;</td>
                      </tr>
                      <tr>
                          <td style="text-align:center;">
                            <a href="https://rakeshmandal.com" title="logo" target="_blank">
                              <img width="60" src="https://i.ibb.co/hL4XZp2/android-chrome-192x192.png" title="logo" alt="logo">
                            </a>
                          </td>
                      </tr>
                      <tr>
                          <td style="height:20px;">&nbsp;</td>
                      </tr>
                      <tr>
                          <td>
                              <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
                                  style="max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                                  <tr>
                                      <td style="height:40px;">&nbsp;</td>
                                  </tr>
                                  <tr>
                                      <td style="padding:0 35px;">
                                          <h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:"Rubik",sans-serif;">You have
                                              requested to reset your password</h1>
                                          <span
                                              style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
                                          <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                                              We cannot simply send you your old password. A unique link to reset your
                                              password has been generated for you. To reset your password, click the
                                              following link and follow the instructions.
                                          </p>
                                          <a href="http://localhost:8888/collegeAthletex/index.php/Login/reset_pwd/'.$email.'/'.$auth_token.'"
                                              style="background:#20e277;text-decoration:none !important; font-weight:500; margin-top:35px; color:#fff;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px;">Reset
                                              Password</a>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td style="height:40px;">&nbsp;</td>
                                  </tr>
                              </table>
                          </td>
                      <tr>
                          <td style="height:20px;">&nbsp;</td>
                      </tr>
                      <tr>
                          <td style="text-align:center;">
                              <p style="font-size:14px; color:rgba(69, 80, 86, 0.7411764705882353); line-height:18px; margin:0 0 0;">&copy; <strong>www.rakeshmandal.com</strong></p>
                          </td>
                      </tr>
                      <tr>
                          <td style="height:80px;">&nbsp;</td>
                      </tr>
                  </table>
              </td>
          </tr>
      </table>
      <!--/100% body table-->
  </body>

  </html>
  ';
  // Password reset email
  $this->load->library('email');
  $config['useragent']='CodeIgniter';
  $config['protocol']='smtp';
  $config['smtp_host']='smtp.gmail.com';
  $config['smtp_user']='nhicvoting@gmail.com';
  $config['smtp_pass']='ClubPenguin99!';
  $config['smtp_port']='465';
  $config['newline']="\r\n";
  $config['smtp_timeout']='5';
  $config['smtp_crypto']='ssl';
  $config['wordwrap']=TRUE;
  $config['mailtype']='html';
  $config['charset']='iso-8859-1';
  $this->email->initialize($config);
  $this->email->from('nhicvoting@gmail.com', 'Password Reset');
  $this->email->to($email, 'Do not reply');
  $this->email->subject('Password reset request');
  $this->email->message($body);

  if(!$this->email->send()){
  return FALSE;
  return $this->email->print_debugger();

  }
  else{

    return TRUE;
  }
}


}
?>

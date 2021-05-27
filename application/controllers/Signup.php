<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Signup extends CI_Controller {
public function cust_signup(){
  $this->load->helper('form');
  $this->load->library('form_validation');
  //Form validation Rules
  $this->form_validation->set_rules('fName', 'First Name', 'required');
  $this->form_validation->set_rules('lName', 'Last Name', 'required');
  $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
  $this->form_validation->set_rules('phone_num', 'Phone Number', 'required|regex_match[/^(\({1}\d{3}\){1}|\d{3})(\s|-|.)\d{3}(\s|-|.)\d{4}$/]');
  $this->form_validation->set_rules('pwd', 'Password', 'required|trim|regex_match[/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/]');
  $this->form_validation->set_rules('confirm_pwd', 'Retype Password', 'required|trim|matches[pwd]');
  $this->form_validation->set_rules('ticket', 'Ticket', 'required');

  if($this->form_validation->run() == FALSE){
    $this->load->view('signup');
  }
  else{
    password_hash($this->input->post('pwd'), PASSWORD_DEFAULT);
    $insert = array(
      'fName'=>$this->input->post('fName'),
      'lName'=>$this->input->post('lName'),
      'email'=>$this->input->post('email'),
      'phone_num'=>$this->input->post('phone_num'),
      'pwd'=>password_hash($this->input->post('pwd'), PASSWORD_DEFAULT),
      'ticket'=>$this->input->post('ticket')
    );

    $this->load->model('Insert');
    $check_user = $this->Insert->check_user($this->input->post('email'), $this->input->post('phone_num'));
    if($check_user == FALSE){
      $data['error']='<p class="alert alert-danger font-weight-bold">Looks like you already have an account with us <i class="fa fa-exclamation-circle fa-lg"></i><br><br><a href="../Login/signin" class="btn btn-dark">Signin</a></p>';
      $this->load->view('signup', $data);
    }
  else{
    $result = $this->Insert->insert_user($insert);
    if($result == FALSE){
      $data['err_msg'] = 'SQL error'.mysqli_error().mysqli_errno();
      $this->load->view('signup', $data);
    }
    else{
      $fName = $this->input->post('fName');
      $email = $this->input->post('email');
      $this->load->library('encryption');
      $rand_code = bin2hex($this->encryption->create_key(16));
     if($this->__send_confirmation($fName, $email, $rand_code)){
       echo 'We\'ve sent a verification link to '.$email;
     }

    }

  }


  }

}
public function verify_code($email, $rand_code){
  $this->load->model('Insert');
  $data['email']=$email;
  $data['rand_code']=$rand_code;
  if(isset($email) && isset($rand_code)){
    $get_user_status = $this->Insert->get_user_status($email, $rand_code);
    if($get_user_status == TRUE){

    $update_user_status = $this->Insert->update_user_status($email, $rand_code);
    if($update_user_status == FALSE){
      echo 'Unable to update your status';
    }
    else{
      $this->load->view('verify_code', $data);
    }
  }
  else{
  echo
  '

  <!DOCTYPE html>
  <html>
  <head>
    <title>Verifying your account...</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  </head>
  <body class="text-center font-weight-bold bg-light">
    <div class="container shadow-lg p-3 mb-5 bg-white rounded">
      <div class="shadow-lg p-3 mb-5 bg-white rounded">
      <div class="row">
        <div class="col">
          <div class="jumbotron bg-white">
  <h2 class="display-4 text-success">Your account has already been verified <i class="fa fa-check-circle"></i></h2>
  <hr class="my-4">
  <p>You can now go ahead and login</p>
  <p class="lead">
    <a class="btn btn-primary btn-lg font-weight-bold" href="../../../Login/signin" role="button">Login</a>
  </p>
</div>
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

// Email function to email admin upon user signup
/*private function __email_admin($fName, $email){
  $body = '
  Hi Khaled, <br><br>
  '.$fName. ' has signed up! <br>
  Go here to view their details: <br>
  <a href="http://localhost:8888/collegeAthletex/index.php/Admin/admin_dash">Athletex Admin</a>
  ';
  $this->load->library('email');
  $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
  $this->email->set_header('Content-type', 'text/html');
  $this->email->from('nhicvoting@gmail.com');
  $this->email->to('khalednached@gmail.com', 'Athletex Admin');
  $this->email->subject('A new user has signed up!');
  $this->email->message($body);
  if(!$this->email->send()){
    show_error($this->email->print_debugger());
  //return FALSE;

  }
  else{
     return TRUE;
  }
}*/
//Email user with confirmation code
private function __send_confirmation($fName, $email, $rand_code){
  $url='http://localhost:8888/collegeAthletex/index.php/Signup/verify_code/'.$email.'/'.$rand_code.'';
  $body='
  <!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <style type="text/css">
        @media screen {
            @font-face {
                font-family: "Lato";
                font-style: normal;
                font-weight: 400;
                src: local("Lato Regular"), local("Lato-Regular"), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format("woff");
            }

            @font-face {
                font-family: "Lato";
                font-style: normal;
                font-weight: 700;
                src: local("Lato Bold"), local("Lato-Bold"), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format("woff");
            }

            @font-face {
                font-family: "Lato";
                font-style: italic;
                font-weight: 400;
                src: local("Lato Italic"), local("Lato-Italic"), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format("woff");
            }

            @font-face {
                font-family: "Lato";
                font-style: italic;
                font-weight: 700;
                src: local("Lato Bold Italic"), local("Lato-BoldItalic"), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format("woff");
            }
        }

        /* CLIENT-SPECIFIC STYLES */
        body,
        table,
        td,
        a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table,
        td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        img {
            -ms-interpolation-mode: bicubic;
        }

        /* RESET STYLES */
        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }

        table {
            border-collapse: collapse !important;
        }

        body {
            height: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
        }

        /* iOS BLUE LINKS */
        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        /* MOBILE STYLES */
        @media screen and (max-width:600px) {
            h1 {
                font-size: 32px !important;
                line-height: 32px !important;
            }
        }

        /* ANDROID CENTER FIX */
        div[style*="margin: 16px 0;"] {
            margin: 0 !important;
        }
    </style>
</head>

<body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">
    <!-- HIDDEN PREHEADER TEXT -->
    <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: "Lato", Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;"> We"re thrilled to have you here! Get ready to dive into your new account. </div>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <!-- LOGO -->
        <tr>
            <td bgcolor="#FFA73B" align="center">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td align="center" valign="top" style="padding: 40px 10px 40px 10px;"> </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#FFA73B" align="center" style="padding: 0px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
                            <h1 style="font-size: 48px; font-weight: 400; margin: 2;">Email confirmation</h1> <img src=" https://www.kindpng.com/picc/m/285-2852276_email-id-verification-reminder-plugin-verify-email-illustration.png" width="125" height="120" style="display: block; border: 0px;" />
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 40px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <p style="margin: 0;">We\'re excited to have you get started. First, you need to confirm your account. Just click on "verify account" and you\'ll be all set!</p>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" align="left">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td bgcolor="#ffffff" align="center" style="padding: 20px 30px 60px 30px;">
                                        <table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td align="center" style="border-radius: 3px;" bgcolor="#FFA73B"><a href="'.$url.'" target="_blank" style="font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; padding: 15px 25px; border-radius: 2px; border: 1px solid #FFA73B; display: inline-block;">Verify Account</a></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr> <!-- COPY -->
                    <tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 0px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <p style="margin: 0;">If that doesn"t work, copy and paste the following link in your browser:</p>
                        </td>
                    </tr> <!-- COPY -->
                    <tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 20px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <p style="margin: 0;"><a href="'.$url.'" target="_blank" style="color: #FFA73B;"></a></p>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 20px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <p style="margin: 0;">If you have any questions, just send us an email to: support@athletex.com</p>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <p style="margin: 0;">Cheers,<br>College Athletex Team</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#f4f4f4" align="center" style="padding: 30px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td bgcolor="#FFECD1" align="center" style="padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <h2 style="font-size: 20px; font-weight: 400; color: #111111; margin: 0;">Need more help?</h2>
                            <p style="margin: 0;"><a href="#" target="_blank" style="color: #FFA73B;">We&rsquo;re here to help you out</a></p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td bgcolor="#f4f4f4" align="left" style="padding: 0px 30px 30px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;"> <br>
                            <p style="margin: 0;">If these emails get annoying, please feel free to <a href="#" target="_blank" style="color: #111111; font-weight: 700;">unsubscribe</a>.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
  ';
  $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
  $this->email->set_header('Content-type', 'text/html');
  $this->email->from('nhicvoting@gmail.com', 'Athletex account verification');
  $this->email->to($email, 'Athletex account verification');
  $this->email->subject('Verify your account');
  $this->email->message($body);
  if(!$this->email->send()){
    show_error($this->email->print_debugger());
    return FALSE;
  }
  else{
    $this->load->model('Insert');
    $insert_code = $this->Insert->send_code($rand_code, $email);
    if($insert_code == FALSE){
      echo 'Unable to insert code';
    }
    else{
      return TRUE;
    }
  }
}
}
?>

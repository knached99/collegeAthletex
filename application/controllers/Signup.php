<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Signup extends CI_Controller {
    public function cust_signup(){
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Insert');
        //Form validation Rules
        $this->form_validation->set_rules('fName', 'First Name', 'required');
        $this->form_validation->set_rules('lName', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('phone_num', 'Phone Number', 'required|regex_match[/^(\({1}\d{3}\){1}|\d{3})(\s|-|.)\d{3}(\s|-|.)\d{4}$/]');
        $this->form_validation->set_rules('pwd', 'Password', 'required|trim|regex_match[/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/]');
        $this->form_validation->set_rules('confirm_pwd', 'Retype Password', 'required|trim|matches[pwd]');
        if($this->form_validation->run() == FALSE){
            $this->load->view('signup');
          }
          else{
              // Create 6 digit verification code 
              $verify_code = mt_rand(111111,999999);
              // hash password using PASSWORD_DEFAULT algorithm 
              $hashed_pwd = password_hash($this->input->post('pwd'), PASSWORD_DEFAULT);

             // Create array to hold data to insert into DB 
             $user_data = array(
                'fName    '=>$this->input->post('fName'),
                'lName'=>$this->input->post('lName'),
                'email'=>$this->input->post('email'),
                'phone_num'=>$this->input->post('phone_num'),
                'pwd'=>$hashed_pwd,
                'confirm_code'=>$verify_code
             );
             // Check if user exists 
             $check_user = $this->Insert->check_user($this->input->post('email'), $this->input->post('phone_num'));
             if($check_user == FALSE){
                $data['error']='<p class="alert alert-warning">Looks like you already have an account with us <i class="fa fa-exclamation-circle fa-lg"></i><a href="../Login/signin" class="link-primary">Signin here</a></p>';
                $this->load->view('signup', $data);
             }
             else{
                 // insert data into DB 
                 $result = $this->Insert->insert_user($user_data);
                 if($result){
                     // email confirmation code
                     $this-> __send_confirmation($this->input->post('fName'), $this->input->post('email'), $verify_code); 
                     redirect('http://localhost:8888/collegeAthletex/index.php/Signup/verify/'.$this->input->post('email').'');
                 }
             }
          }
    }

    public function verify($email){
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Insert');
        $this->form_validation->set_rules('code', 'Verification Code', 'required|min_length[6]|max_length[6]|numeric');
        if($this->form_validation->run()==FALSE){
            $this->load->view('verify_code');
        }
        else{
            $data['email']=$email;
            $code = $this->input->post('code');
            $check_code = $this->Insert->verify_code($email, $code);
            if($check_code == FALSE){
                $data['invalid_code']='<div class="alert alert-danger font-weight-bold">Verification code entered is incorrect <i class="fa fa-excalamation-circle"></i></div>';
                $this->load->view('verify_code', $data);
            }
            else{
                redirect('http://localhost:8888/collegeAthletex/index.php/Login/signin');
            }
        }
        
    }
   //Email user with confirmation code
private function __send_confirmation($fName, $email, $verify_code){
  $body='
  <!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <style>
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

<body style="background-color: #0275d8; margin: 0 !important; padding: 0 !important;">
    <!-- HIDDEN PREHEADER TEXT -->
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <!-- LOGO -->
        <tr>
            <td bgcolor="#0275d8" align="center">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td align="center" valign="top" style="padding: 40px 10px 40px 10px;"> </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#0275d8" align="center" style="padding: 0px 10px 0px 10px;">
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
                        <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 40px 30px; margin-left: 10px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <p style="margin-left: 5px; font-weight: bolder;">We\'re excited to have you get started. First, you need to confirm your account. Please enter this 6 digit verification code to continue</p>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" align="left">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td bgcolor="#ffffff" align="center" style="padding: 20px 30px 60px 30px;">
                                        <table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td align="center" style="border-radius: 3px;">'.$verify_code.'</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr> <!-- COPY -->
                    <tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 20px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <p style="margin-left: 5px;">If you have any questions, just send us an email to: support@athletex.com</p>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <p style="margin-left 5px;">Cheers,<br>College Athletex Team</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

    </table>
</body>

</html>
  ';
  $this->load->library('email');
  $config['useragent']='CodeIgniter';
  $config['protocol']='smtp';
  $config['smtp_host']='smtp.gmail.com';
  $config['smtp_user']='nhicvoting@gmail.com';
  $config['smtp_pass']='PenguinClub2021!';
  $config['smtp_port']='465';
  $config['newline']="\r\n";
  $config['smtp_timeout']='5';
  $config['smtp_crypto']='ssl';
  $config['wordwrap']=TRUE;
  $config['mailtype']='html';
  $config['charset']='iso-8859-1';
  $this->email->initialize($config);
  $this->email->from('nhicvoting@gmail.com', 'Athletex account verification');
  $this->email->to($this->input->post('email'), 'Athletex account verification');
  $this->email->subject('Verify your account');
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
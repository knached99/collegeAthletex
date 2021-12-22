<?php
defined('BASEPATH') OR exit('no direct script access allowed');
class UserDash extends CI_Controller{
 public function __construct(){
    parent::__construct();
    if(!isset($_SESSION['email'])){
      redirect('../index.php/Login/signin');
    }
  }

  	 public function user_dash(){
  		 $this->load->library('session');
  		 $this->load->model('Insert');
       $this->load->view('user_dash');
  	 }
     public function signout(){
        if(session_destroy()){
          redirect('../index.php/Login/signin');
          //$this->load->view('logout_redirect');
        }
       else{
        $data['logout_fail']='<div class="alert alert-danger">Something went wrong and we could not sign you out <i class="fa fa-exclamation-circle"></i></div>';
        $this->load->view('user_dash', $data);
       }
     }

     public function contact_admin(){
       $this->load->model('Insert');
       $this->load->helper('form');
       $this->load->library('form_validation');
       $this->form_validation->set_rules('fName', 'First Name', 'required|min_length[3]');
       $this->form_validation->set_rules('lName', 'Last Name', 'required|min_length[3]');
       $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
       $this->form_validation->set_rules('subject', 'Subject', 'required');
       $this->form_validation->set_rules('message', 'Message', 'required|min_length[10]');
       if($this->form_validation->run()==FALSE){
         $this->load->view('contact_admin');
       }
       else{
        $this->load->model('Insert');
        $message_array = array(
        'fName'=> $this->input->post('fName'),
        'lName' => $this->input->post('lName'),
        'email'=> $this->input->post('email'),
        'subject'=> $this->input->post('subject'),
        'message'=> $this->input->post('message'),
      );
        $contact = $this->Insert->message_admin($message_array);
        if($contact == TRUE){
        $data['message_success']='<p class="alert alert-success font-weight-bold">Your message has been sent. Give us some time to review it and get back to you <i class="fa fa-check-circle fa-lg"></i></p>';
        $this->load->view('contact_admin', $data);

        }
        else if($contact == FALSE){
          $data['message_error']='<p class="alert alert-warning font-weight-bold">Unable to send your message <i class="fa fa-exclamation-circle"></i></p>';
          $this->load->view('contact_admin', $data);
        }
        }
     }

     public function user_settings(){
       $this->load->model('Insert');
       $this->load->helper('form');
       $this->load->library('form_validation');
       $this->form_validation->set_rules('curr_pwd', 'Current Password', 'required');
       $this->form_validation->set_rules('new_pwd', 'New Password', 'required|trim|regex_match[/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/]');
       $this->form_validation->set_rules('confirm_pwd', 'Retype Password', 'required|trim|matches[new_pwd]');
       if($this->form_validation->run()==FALSE){
         $this->load->view('user_settings');
       }
       else{
         $check_pwd = $this->Insert->check_pwd($this->input->post('curr_pwd'), $_SESSION['email']);
         if($check_pwd == FALSE){
           $data['invalid_pwd']='<div class="alert alert-danger">The password you entered is not the one you are currently using. You must enter the one you are currently using <i class="fa fa-exclamation-circle"></i></div>';
           $this->load->view('user_settings', $data);
         }
         else{
           if($update_pwd = $this->Insert->update_pass(password_hash($this->input->post('new_pwd'), PASSWORD_DEFAULT), $_SESSION['email'])== TRUE){
             $data['update_success']='<div class="alert alert-success">Your password has successfully been updated <i class="fa fa-check-circle"></i></div>';
             $this->load->view('user_settings', $data);
           }
           else{
             $data['update_failed']='<div class="alert alert-warning">An error has occurred and we could not update your password <i class="fa fa-exclamation-triangle"></i></div>';
             $this->load->view('user_settings', $data);
           }
         }
       }
     }


}
?>

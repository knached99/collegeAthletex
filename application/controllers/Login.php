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
    if($this->form_validation->run() == FALSE){
      $this->load->view('signin');
    }
    else{
      $email = $this->input->post('email');
      $pass = $this->input->post('pwd');
      $results = $this->Insert->validate($email, $pass);
      if($results == 0){
        $data['unverified']='<p class="alert alert-warning font-weight-bold">Your account has not been verified yet. Please check your email to verify your account</p>';
        $this->load->view('signin', $data);
      }
      else if($results == 1){
        $data['not_exist']='<p class="alert alert-warning font-weight-bold">That account does not exist. You must create a new account</p>';
        $this->load->view('signin', $data);

      }
      else if($results == FALSE){
        $data['error']='<p class="alert alert-danger font-weight-bold">username or password is incorrect <i class="fa fa-exclamation-circle fa-lg"></i></p>';
        $this->load->view('signin', $data);
      }
      else{
        $this->load->library('session');
        $user_data = $this->Insert->get_user($email);
      //  if(!$this->session->set_userdata($user_data)){
        //  $this->load->view('redirect_failed');
      //  }
        //else{


        redirect('http://localhost:8888/collegeAthletex/index.php/UserDash/user_dash');
    //  }
        }

    }
  }



}
?>

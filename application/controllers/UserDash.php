<?php
defined('BASEPATH') OR exit('no direct script access allowed');
class UserDash extends CI_Controller{
/*  public function __construct(){
    parent::__construct();
    if(!isset($_SESSION['username'])){
      redirect('http://localhost:8888/collegeAthletex/index.php/Login/signin');

    }
  }*/

  	 public function user_dash(){
  		 $this->load->library('session');
  		 $this->load->model('Insert');
       $sess_email = $this->session->set_userdata('email');
       $results = $this->Insert->get_user($sess_email);
       $this->data['user_data'] = $results[0];
       $this->load->view('user_dash', $this->data);


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




}
?>

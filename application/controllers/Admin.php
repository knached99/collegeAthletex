<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller{
  public function __construct(){
    parent::__construct();
    if(!isset($_SESSION['username'])){
      redirect('http://localhost:8888/collegeAthletex/index.php/Admin_Login/admin_signin');

    }
  }
  public function admin_dash(){
		$this->load->model('Insert');
		$data['results'] = $this->Insert->get_users();
    $data['total_users'] = $this->Insert->total_users();
    $data['messages']=$this->Insert->get_messages();
    $data['num_rows']=$this->Insert->count_messages();
    $data['new_users']=$this->Insert->num_new_users();
    $data['users']=$this->Insert->get_new_users();
    $this->load->view('admin', $data);
		if(!isset($_SESSION['username'])){
			redirect('http://localhost:8888/collegeAthletex/index.php/App/admin_login');
		}
	}
  public function edit_user($user_id){
    $this->load->model('Insert');
    $results = $this->Insert->get_customer($user_id);
    $this->data['user_data'] = $results[0];
    $this->load->library('form_validation');
    $this->load->helper('form');
    $this->form_validation->set_rules('email', 'email', 'required|valid_email');
    $this->form_validation->set_rules('phone_num', 'Phone Number', 'required|regex_match[/^(\({1}\d{3}\){1}|\d{3})(\s|-|.)\d{3}(\s|-|.)\d{4}$/]');
    $this->form_validation->set_rules('ticket', 'required');
    if($this->form_validation->run() == FALSE){
      $this->load->view('edit_user', $this->data);
    }
    else{
        $fName = $this->input->post('fName');
        $lName = $this->input->post('lName');
        $email = $this->input->post('email');
        $phone_num = $this->input->post('phone_num');
        $ticket = $this->input->post('ticket');

      $update_user = $this->Insert->update_cust($fName, $lName, $email, $phone_num, $ticket);
      if($update_user == FALSE){
        $data['error']='<p class="alert alert-danger font-weight-bold">Unable to update user\'s data <i class="fa fa-exclamation-circle fa-g"></i></p>';
        $this->load->view('edit_user', $this->data);
      }
      else{
        $data['success']='<p class="alert alert-success font-weight-bold">Successfully updated user\'s profile <i class="fa fa-check-circle fa-lg"></i></p>';
        $this->load->view('edit_user', $this->data);
      }
    }

  }
  public function acknowledge($user_id){
    $this->load->model('Insert');
    $acknowledged = $this->Insert->acknowledge_user($user_id);
    if($acknowledged == TRUE){
      redirect('http://localhost:8888/collegeAthletex/index.php/Admin/admin_dash');
    }
    else{
      echo 'Could not acknowledge user';
    }
  }
  public function admin_profile(){
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->load->model('Insert');
    $this->form_validation->set_rules('pwd', 'current password', 'required|trim');
    $this->form_validation->set_rules('new_pwd','New Password','required|trim|regex_match[/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/]');
    $this->form_validation->set_rules('confirm_pwd', 'Confirm Password', 'required|trim|matches[new_pwd]');
    if($this->form_validation->run()==FALSE){
      $this->load->view('admin_profile');
    }
    else{
      $user = $this->input->post('username');
      $pwd = $this->input->post('pwd');
      $new_pwd = password_hash($this->input->post('new_pwd'), PASSWORD_DEFAULT);
      $confirm_pwd = $this->input->post('confirm_pwd');
      $results = $this->Insert->get_admin($user, $pwd);
      if($results == FALSE){
        $data['invalid_pwd'] = '<div class="alert alert-danger">You must enter the current password you are using. The one you entered is not it</div>';
        $this->load->view('admin_profile', $data);
      }
      else{
        $update_pwd = $this->Insert->update_pwd($new_pwd, $user);
        if($update_pwd == TRUE){
          $data['update_success']='<div class="alert alert-success">Password was successfully updated <i class="fa fa-check-circle"></i></div>';
          $this->load->view('admin_profile', $data);
        }
        else{
          $data['update_failed']='<div class="alert alert-warning">Something went wrong and we could not update your password <i class="fa fa-exclamation-circle"></i></div>';
          $this->load->view('admin_profile', $data);

        }
      }
    }
  }
  public function respond_to($message_id){
    $this->load->model('Insert');
    $results = $this->Insert->get_message($message_id);
    $this->data['messages']=$results[0];
    $this->load->library('form_validation');
    $this->load->helper('form');
    $this->form_validation->set_rules('response', 'response','required|min_length[10]');
    if($this->form_validation->run()==FALSE){
      $this->load->view('respond_to', $this->data);
    }
    else{
      $response = $this->input->post('response');
      $msg_array = array(
        'message_id'=>$this->input->post('message_id'),
        'first_name'=>$this->input->post('first_name'),
        'last_name'=>$this->input->post('last_name'),
        'email'=>$this->input->post('email'),
        'subject'=>$this->input->post('subject'),
        'cust_msg'=>$this->input->post('cust_msg'),
        'response'=>$this->input->post('response')
      );
      $send_response = $this->Insert->send_msg($msg_array);
      if($send_response == FALSE){
        echo 'Unable to send your message';
      }
      else{
        echo 'Successfully sent your message! <br>
        Click <a href="../admin_dash">here</a> to go back to the dash homepage
        ';
      }
    }
  }

  public function del_user($user_id){
		$this->load->model('Insert');
	$del_user=	$this->Insert->delete_user($user_id);
	if($del_user == TRUE){
		redirect('http://localhost:8888/collegeAthletex/index.php/Admin/admin_dash');
	}
	else{
		echo 'Unable to delete user\'s account';
	}

	}
  public function del_success(){
    $this->load->view('del_success');
  }
  public function logout_redirect(){
    $this->load->view('logout_redirect');
  }

  	public function signout(){
      if(session_destroy()){
        $this->load->view('logout_redirect');
      }
    	else{
  			echo 'Unable to sign you out';
  		}
  	}
}
?>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function home_page()
	{
    $this->load->helper('url');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Full Name', 'required|max_length[30]');
		$this->form_validation->set_rules('email', 'email', 'required|valid_email');
		$this->form_validation->set_rules('subject', 'subject', 'required');
		$this->form_validation->set_rules('message', 'message', 'required|min_length[10]');
		if($this->form_validation->run()==FALSE){
			$this->load->view('home');
		}
		else{
		 if($this-> __email_admin($this->input->post('name'), $this->input->post('email'), $this->input->post('subject'), $this->input->post('message')) == FALSE){
			 //	 $data['err']='<p class="alert alert-danger font-weight-bold">We could not send your message <i class="fa fa-exclamation-circle"></i></p>';
			// $this->load->view('home', $data);
			show_error($this->email->print_debugger());

		 }
		 else if($this->__email_admin($this->input->post('name'), $this->input->post('email'), $this->input->post('subject'), $this->input->post('message')) == TRUE){
			 $data['success']='<p class="alert alert-success font-weight-bold">Your message was successfully sent <i class="fa fa-check-circle"></i></p>';
			 $this->load->view('home', $data);
		 }
		}
	}
	public function chloe(){
		$this->load->view('speaker-details_chloe');
	}
	public function ethan(){
		$this->load->view('speaker-details_ethan');

	}
	public function josh(){
		$this->load->view('speaker-details_josh');
	}
	public function saylor(){
		$this->load->view('speaker-details_saylor');
	}
	public function tahlia(){
		$this->load->view('speaker-details_tahlia');
	}
	public function thomas(){
		$this->load->view('speaker-details_thomas');
	}
	public function customers(){
		if(!isset($_SESSION['username'])){
			redirect('http://localhost:8888/collegeAthletex/index.php/App/admin_login');
		}
		$this->load->model('Insert');
		$this->load->library('form_validation');
		$data['results'] = $this->Insert->get_users();
		//$this->load->view('customers', $data);
		$this->load->library('form_validation');
		$fName = $this->input->post('fName');
		$this->form_validation->set_rules('fName', 'required');
		if($this->form_validation->run() == FALSE){
			$this->load->view('customers', $data);
		}
		else{
		$results = 	$this->Insert->search($fName);
		if($results->num_rows() > 0){
			echo 'Here are the results: ';
		}
		else {
			echo 'No results found';
		}
		}
	}
	private function __email_admin($name, $email, $subject, $message){
		$body ='
		Hi Khaled, <br><b>'.$name. '</b>  has sent you an email regarding:<br>
		<b>'.$subject. '</b><br> and here is <b>'.$name.'\'s </b> message: '.$message.'<br>
		Here is '.$name.'\'s contact email: '.$email.'
		';
		$this->load->library('email');
		$this->email->set_header('MIME-Version', '1.0; charset=utf-8');
		$this->email->set_header('Content-type', 'text/html');
		$this->email->from($email, $name);
		$this->email->to('khalednached@gmail.com', 'Athletex Admin');
		$this->email->subject($subject);
		$this->email->message($body);
		if(!$this->email->send()){
			return FALSE;

		}
		else{
			 return TRUE;
		}

	}





}

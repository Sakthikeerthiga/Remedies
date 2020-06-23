<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->model('Login_model');

	}
	public function index()
	{
		$this->load->view('welcome_message');
	}

// user registration page
	public function sign_up()
	{
		$this->load->view('sign_up');
	}
//save new user data
	public function save_sign_up(){
		$data = array(
			'email'=>$this->input->post('email'),
			'password'=>sha1($this->input->post('password')),
			'dateReg'=> date("Y-m-d h:i"),
		);
		$insertUser = $this->Login_model->insert_user($data);
		$sess_array = array(
			'user_id' => $insertUser,
			'user_email' => $this->input->post('email'),
			'user_password' => $this->input->post('password'),
			'logged_in' => 1
		);

		$this->session->set_userdata('logged_user', $sess_array);
		redirect('profile'); 

	}

	public function update_profile()
	{
		if(!empty($this->session->userdata('logged_user'))){
			$user_id = $this->session->userdata('logged_user')['user_id'];
			$result['userdata'] = $this->Login_model->getuserdetails($user_id);
			$this->load->view('edit_profile',$result);
		}else{
			$this->load->view('sign_up');
		}
	}
//check email
	public function check_email()
	{
		$email = $this->input->post('useremail');
		$query = $this->Login_model->checkemail($email);
		return $query;
	}
//check username
	public function check_username()
	{
		$username = $this->input->post('username');
		$query = $this->Login_model->checkusername($username);
		return $query;
	}

//update user
	public function update_user()
	{
		$user_id = $this->input->post('user_id');

		$data = array(
			'firstName'=>$this->input->post('firstName'),
			'lastName'=>$this->input->post('lastName'),
			'screenName'=> $this->input->post('screenName'),
			'Address'=> $this->input->post('Address'),
			'City'=> $this->input->post('City'),
			'Country'=> $this->input->post('Country'),
			'mobileNo'=> $this->input->post('mobileNo'),
			'status'=> $this->input->post('status'),
			'dob'=> date('Y-m-d',strtotime($this->input->post('dob'))),
			'gender'=> $this->input->post('gender'),

		);
		
		$updateUser = $this->Login_model->update_user($data,$user_id);
		redirect('welcome'); 
	}

}

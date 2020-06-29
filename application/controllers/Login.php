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
		$this->table = 'user';
		$this->load->library('userlib');
		$this->load->library('email');


	}
	public function index()
	{
		if(!empty($this->session->userdata('logged_user'))){
			redirect($_SERVER['HTTP_REFERER']);
		}else{
			$this->session->set_userdata('page_url',$_SERVER['HTTP_REFERER']);  
			$this->load->view('login');
		}
	}

// user registration page
	public function sign_up()
	{
		$this->load->view('sign_up');
	}
//save new user data
	public function save_sign_up(){

		$config=$this->userlib->emailconfig(); 

		 $this->load->library('email', $config);

			 $this->email->set_newline("\r\n");

			 $this->email->from('sakthichandren@gmail.com','sakthi');

			 $elist = array('sakthichandren@gmail.com');

		  $this->email->to($elist);// change it to yours



		$admin_email=stripslashes('amrudharanibtechit@gmail.com');

		$this->email->bcc($admin_email);

		   // $this->email->to($own_email);// change it to yours

		  $this->email->subject('Password Change');

		  $this->email->message('testing mail functionality');

		  if($this->email->send())

		  {

			$s=true;

			

		  }

		  else

		  {

			$s=false;

			

		  }

		  exit;
		$data = array(
			'screenName'=>$this->input->post('screenName'),
			'password'=>sha1($this->input->post('password')),
			'dateReg'=> date("Y-m-d h:i"),
		);
		$insertUser = $this->Login_model->insert_user($data);
		$sess_array = array(
			'user_id' => $insertUser,
			'screenName' => $this->input->post('screenName'),
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
			'email'=> $this->input->post('email'),
			'Address'=> $this->input->post('Address'),
			'City'=> $this->input->post('City'),
			'Country'=> $this->input->post('Country'),
			'mobileNo'=> $this->input->post('mobileNo'),
			'status'=> $this->input->post('status'),
			'dob'=> date('Y-m-d',strtotime($this->input->post('dob'))),
			'gender'=> $this->input->post('gender'),

		);

// $this->session->set_userdata('logged_user', $data);
		$updateUser = $this->Login_model->update_user($data,$user_id);
		$testimonyupdate = array(
			'state'=> $this->input->post('City'),
			'country'=> $this->input->post('Country')
		);
		$updateTestimonyFields = $this->Login_model->update_testimony_fields($testimonyupdate,$user_id);
		$this->session->set_flashdata('profile_update', 'Your profile has been updated successfully');
		redirect('/', 'refresh'); 
	}

	public function check_login(){  

// $data['username']=htmlspecialchars($_POST['name']);  
		$data['username']=htmlspecialchars($_POST['name']);  
		$data['password']=htmlspecialchars($_POST['pwd']);  
		$res=$this->Login_model->islogin($data);
		if($res){  
			$this->db->select('iduser');
			$this->db->from('user');
			$this->db->where('screenName',$data['username']);
			$query= $this->db->get()->result();   

			$session_data = array(
				'user_id' =>$query[0]->iduser,
				'screenName'=> $data['username'],
			); 
			$this->session->set_userdata('logged_user',$session_data);  
// echo base_url();
			if(!empty($this->session->userdata('page_url'))){
				echo $this->session->userdata('page_url');
			}else{
				echo base_url();
			}
		}  
		else{  
			echo 0;  
		}   
	}  

	public function logout(){
		$this->session->unset_userdata('logged_user');
		redirect('login', 'refresh');
	}

}

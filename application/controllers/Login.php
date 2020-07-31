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

	}
	public function index()
	{
		if(isset($_SERVER['HTTP_REFERER'])){
			if(!empty($this->session->userdata('logged_user'))){
				redirect($_SERVER['HTTP_REFERER']);
			}else{
				// if($_SERVER['HTTP_REFERER'] != 'https://best-remedies.com/beta/login'){
				// $this->session->set_userdata('page_url',$_SERVER['HTTP_REFERER']);
				// }  
				if($_SERVER['HTTP_REFERER'] != 'http://localhost/Remedies/login'){
				 $this->session->set_userdata('page_url',$_SERVER['HTTP_REFERER']);
				}  
				$this->load->view('login');
			}
		}else{
			redirect('/', 'refresh'); 
		}
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
			'status'=> 1
		);
		$insertUser = $this->Login_model->insert_user($data);
		$from    =  "info@best-remedies.com";
		$to      =  $this->input->post('email');
		$subject = 'Thank you for joining with us'; 
		$data = array('name' => $this->input->post('screenName'),'subject' => 'Please find your login details below','message' => '
			<html> 
			<head> 
			<title>Welcome to Best-Remedies</title> 
			</head> 
			<body> 
			<h1>Thanks you for joining with us!</h1> 
			<table style="text-align:left;width: 50%;"> 
			<tr> 
			<th style="width:100px;">Email:</th><td style="text-align:left;">'.$this->input->post('email').'</td> 
			</tr> 
			<tr > 
			<th style="width:100px;">Password:</th><td style="text-align:left;">'.$this->input->post('password').'</td> 
			</tr> 

			</table> 
			<p>Thank you a million times for taking the time to share you testimony! An email has been sent to the email address you provided for verification. Once you click
			on the link in there, your user account will automatically be created and your testimony be posted to the site. We would be immensely grateful if you could
			complete that last small step. Should you not confirm the email within the next 72 hours, the submitted data will unfortunately be deleted. This is so to ensure
			that the source of the data is indeed credible. We are sure that you are….just one small click and we should be good!</p>
			</body> 
			</html>');
		$this->htmlmail($from,$to,$subject,$data);


		$sess_array = array(
			'user_id' => $insertUser,
			'email' => $this->input->post('email'),
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
			$result['countries'] = $this->Login_model->getCountryList();
			if(!empty($result['userdata'][0]->Country)){
				$selected_country_name = $this->db->get_where('countries', array('id' => $result['userdata'][0]->Country))->row()->countryName;
				$result['states'] = $this->Login_model->getStateList($selected_country_name);
			}else{
				$result['states'] = $this->Login_model->getStateList();
			}
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

		$session_data = array(
			'user_id' =>$user_id,
			'screenName'=> $data['screenName'],
		); 
		$this->session->set_userdata('logged_user',$session_data);  

		$updateTestimonyFields = $this->Login_model->update_testimony_fields($testimonyupdate,$user_id);
		$this->session->set_flashdata('profile_update', 'Your profile has been updated successfully');
		redirect('/', 'refresh'); 
	}

	public function check_login(){  
// $data['username']=htmlspecialchars($_POST['name']);  
		$data['email']=htmlspecialchars($_POST['email']);  
		$data['password']=htmlspecialchars($_POST['pwd']);  
		$res=$this->Login_model->islogin($data);
		if($res){  
			$this->db->select('*');
			$this->db->from('user');
			$this->db->where('email',$data['email']);
			$this->db->where('status',1);
			$query= $this->db->get()->result();   
			if(!empty($query)){
				$session_data = array(
					'user_id' =>$query[0]->iduser,
					'screenName'=> $query[0]->screenName,
				); 
				$this->session->set_userdata('logged_user',$session_data);  
// echo base_url();
				if(!empty($this->session->userdata('page_url'))){
					echo $this->session->userdata('page_url');
				}else{
					echo base_url();
				}
			}  
		}
		else{  
			echo 0;  
		}   
	}  

	public function delete_user(){
		if(!empty($this->session->userdata('logged_user')['user_id'])){
			$data['status'] = 3;
			$this->db->where('iduser', $this->session->userdata('logged_user')['user_id']);
			$this->db->update('user',$data);
			$this->session->unset_userdata('logged_user');
			$this->session->set_flashdata('profile_update', 'You account have been deleted successfully.');
			echo base_url();
		}
	}

	public function logout(){
		$this->session->unset_userdata('logged_user');
		$this->session->set_flashdata('profile_update', 'You have been logged out successfully.');
		redirect('/', 'refresh');
	}


	public function search_state(){
		$country = $_POST['country'];

		$this->db->select('*');
		$this->db->where("country_name", $country);
		$fetched_records = $this->db->get('states');
		$results = $fetched_records->result_array();
		echo json_encode($results);
	}

	public function htmlmail($from,$to,$subject,$data){
		$msg = $this->load->view('emails/new_user.php',$data,TRUE);
		$this->load->model('Email_model');
		$mail = $this->Email_model->send_mail($from,$to,$subject,$msg);
	}
}

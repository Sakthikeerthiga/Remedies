<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
		if(!empty($this->session->userdata('admin_login')['is_admin'])){
			$this->load->view('admin/home');
		}else{
			$this->load->view('admin/adminlogin');
		}
	}

	

	public function adminlogin(){  

		$data['username']=htmlspecialchars($_POST['name']);  
		$data['password']=htmlspecialchars($_POST['pwd']);  
		$query=$this->db->get_where('admin',array('username'=>$data['username'],'password'=>sha1($data['password'])));  
    	$res= $query->num_rows();  
		if($res){  
			$this->db->select('idadmin');
			$this->db->from('admin');
			$this->db->where('username',$data['username']);
			$query= $this->db->get()->result();   

			$session_data = array(
				'admin_userid' =>$query[0]->idadmin,
				'admin_username'=> $data['username'],
				'is_admin'=> 1,
			); 
			$this->session->set_userdata('admin_login',$session_data);  
			redirect(base_url().'Admin/home');
		}  
		else{  
			$this->session->set_flashdata('admin_login_error', 'Invalid Credentials');
			redirect(base_url().'Admin'); 
		}   
	}  

	public function logout(){
		$this->session->unset_userdata('admin_login');
		redirect('login', 'refresh');
	}

	public function home(){
		$this->load->view('admin/home');
	}

}

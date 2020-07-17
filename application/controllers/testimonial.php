<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonial extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->model('Testimonial_model');
		$this->load->model('Article_model');
		$this->load->model('Login_model');
		$this->load->library('userlib');
		$this->load->library('email');


	}
	public function index()
	{
		$this->load->view('testimonial_index');
	}

// sickness testimonial list
	public function testimony_for_sickness($sicknessname='')
	{
		$sickness_name =$this->db->get_where('metatags', array('pageName' => $sicknessname))->row()->title;

		$sickness_id = $this->db->get_where('sickness', array('commonName' => $sickness_name))->row()->idsickness; 

		if($sickness_id!=''){
			$data['testimonial_details']= $this->Testimonial_model->sickness_testimony_list($sickness_id);
			$data['get_related_article'] = $this->Article_model->sickness_article_list($sickness_id);
			$data['related_comment'] = $this->Testimonial_model->get_sickrealted_main_comment($sickness_id);
			$data['additional_reply_comment'] = $this->Testimonial_model->get_sickrealted_additional_comment($sickness_id);
			$data['testimonial_heading'] = $sickness_name;
			$data['breadcrumb'] = 'Conditions';
			$data['breadcrumb_url'] = 'condition-list';
		}
		$this->load->view('testimonial_result_list', $data);
	}

// remedy testimonial list
	public function testimony_for_remedy($remedy_name='')
	{    
		$remedy_id = $this->db->get_where('remedy', array('link' => $remedy_name))->row()->idremedy;
		$remedyName = $this->db->get_where('remedy', array('link' => $remedy_name))->row()->name;

		if($remedy_id!=''){
			$data['testimonial_details']= $this->Testimonial_model->remedy_testimony_list($remedy_id);
			$data['get_related_article'] = $this->Article_model->remedy_article_list($remedy_id);
			$data['related_comment'] = $this->Testimonial_model->get_remedyrealted_main_comment($remedy_id);
			$data['additional_reply_comment'] = $this->Testimonial_model->get_remedyrealted_additional_comment($remedy_id);
			$data['testimonial_heading'] = $remedyName;
			$data['breadcrumb'] = 'Remedies';
			$data['breadcrumb_url'] = 'remedies-list';
		}
		$this->load->view('testimonial_result_list', $data);
	}

	public function add_testimony(){
		$data['sickness'] = $this->Testimonial_model->sickness_data_list();
		$data['remedies'] = $this->Testimonial_model->remedy_data_list();
		$data['relief_type'] = $this->Testimonial_model->relief_data_list();
		$this->load->view('add_testimony',$data);
	}

	public function save_testimony(){
// register login users
		if(!empty($this->session->userdata('logged_user'))){
			$user_id = $this->session->userdata('logged_user')['user_id'];
			$country = $this->Testimonial_model->get_county($user_id);
			$state = $this->Testimonial_model->get_state($user_id);
			$data = array(
				'date'=>date("Y-m-d h:i"),
				'user_iduser'=>$user_id,
				'sickness_idsickness'=>$this->input->post('sickness_idsickness'),
				'remedy_idremedy'=> $this->input->post('remedy_idremedy'),
				'relief_idrelief'=>$this->input->post('relief_idrelief'),
				'story'=>$this->input->post('story'),
				'dosage'=>$this->input->post('dosage'),
				'administeredTo'=>$this->input->post('administeredTo'),
				'administeredBy'=>$this->input->post('administeredBy'),
				'country'=>$country[0]->Country,
				'state'=> $state[0]->City,
				'testimonyUrl'=>'testimonial/testimony_for_sickness/'.$this->input->post('sickness_idsickness'),
				'warnings'=>$this->input->post('warnings'),
			);

		}
// new user adding story
		else{

			$userdata = array(
				'firstName'=>$this->input->post('firstName'),
				'lastName'=>$this->input->post('lastName'),
				'screenName'=> $this->input->post('screenName'),
				'email'=> $this->input->post('email'),
				'password'=>sha1($this->input->post('password')),
			);
			$insertUser = $this->Login_model->insert_user($userdata);
			// mail functionality

			$config=$this->userlib->emailconfig(); 

			$this->load->library('email', $config);

			$this->email->set_newline("\r\n");
			$this->email->set_mailtype("html");
			$this->email->from('sathishdeveloper25@gmail.com','sathish');

			$elist = array($this->input->post('email'));

			$this->email->to($elist);// change it to yours

			// $this->email->to($own_email);// change it to yours

			$this->email->subject('Thank you for joining with us');

			$this->email->message('
				<html> 
				<head> 
				<title>Welcome to Best-Remedies</title> 
				</head> 
				<body> 
				<h1>Thanks you for joining with us!</h1> 
				<table style="text-align:left;width: 50%;"> 
				<tr> 
				<th style="width:100px;">Name:</th><td style="text-align:left;">'.$this->input->post('screenName').'</td> 
				</tr> 
				<tr > 
				<th style="width:100px;">password:</th><td style="text-align:left;">'.$this->input->post('password').'</td> 
				</tr> 
				
				</table> 
				<p>Thank you a million times for taking the time to share you testimony! An email has been sent to the email address you provided for verification. Once you click
				on the link in there, your user account will automatically be created and your testimony be posted to the site. We would be immensely grateful if you could
				complete that last small step. Should you not confirm the email within the next 72 hours, the submitted data will unfortunately be deleted. This is so to ensure
				that the source of the data is indeed credible. We are sure that you are….just one small click and we should be good!</p>
				</body> 
				</html>'

);

	
			if($insertUser){
				$data = array(
					'date'=>date("Y-m-d h:i"),
					'user_iduser'=>$insertUser,
					'sickness_idsickness'=>$this->input->post('sickness_idsickness'),
					'remedy_idremedy'=> $this->input->post('remedy_idremedy'),
					'relief_idrelief'=>$this->input->post('relief_idrelief'),
					'story'=>$this->input->post('story'),
					'dosage'=>$this->input->post('dosage'),
					'administeredTo'=>$this->input->post('administeredTo'),
					'administeredBy'=>$this->input->post('administeredBy'),
					'testimonyUrl'=>'testimonial/testimony_for_sickness/'.$this->input->post('sickness_idsickness'),
					'warnings'=>$this->input->post('warnings'),
				);
			}



		}
		$insertNewPost = $this->Testimonial_model->insert_testimonial_new_post($data);
        $sicknessid = $this->input->post('sickness_idsickness');
        $update = $this->db->query("UPDATE trendingsearches SET positiveTestimonies = positiveTestimonies + 1 WHERE sickness_idsickness = $sicknessid");
				if($this->email->send())
			{
			$sickness_name = $this->db->get_where('sickness', array('idsickness' => $this->input->post('sickness_idsickness')))->row()->commonName; 
			$slugname = str_replace("-", "_", $sickness_name);
			$sickness_slug = url_title($slugname, 'dash', true);

			$this->session->set_flashdata('testimonial_add_msg', 'Your story has been added successfully.Please check your email for login credential');
			redirect('testimonial/testimony_for_sickness/'.$sickness_slug);
			}

			else

			{
			
			$sickness_name = $this->db->get_where('sickness', array('idsickness' => $this->input->post('sickness_idsickness')))->row()->commonName; 
			$slugname = str_replace("-", "_", $sickness_name);
			$sickness_slug = url_title($slugname, 'dash', true);

			$this->session->set_flashdata('testimonial_add_msg', 'Your story has been added successfully.There was the problem in Mail sending.');
			redirect('testimonial/testimony_for_sickness/'.$sickness_slug);
			}
			
	}

	public function add_new_comment(){
		$data['user_iduser']=htmlspecialchars($_POST['user_iduser']);  
		$data['testimony_idtestimony']=htmlspecialchars($_POST['testimony_idtestimony']); 
		$data['comment'] = htmlspecialchars($_POST['comment']); 
		$data['datePosted'] = date("Y-m-d h:i");
		$res=$this->Testimonial_model->add_new_comment($data);
		if($res){  
		   $get_comment = $this->Testimonial_model->get_main_command($_POST['testimony_idtestimony']);

		   echo json_encode($get_comment);
		}  
		else{
		   echo 'please contact admin';  
		}   
	 }  

	 	public function add_reply_comment(){
		$data['user_iduser']=htmlspecialchars($_POST['user_iduser']);  
		$data['testimony_idtestimony']=htmlspecialchars($_POST['testimony_idtestimony']); 
		$data['comment'] = htmlspecialchars($_POST['comment']); 
		$data['comment_idcomment'] = htmlspecialchars($_POST['idcomment']); 
		$data['datePosted'] = date("Y-m-d h:i");
		$res=$this->Testimonial_model->add_reply_comment($data);
		if($res){  
		   $get_comment = $this->Testimonial_model->get_additional_command($_POST['idcomment']);

		   echo json_encode($get_comment);
		}  
		else{
		   echo 'please contact admin';  
		}   
	 }  


}

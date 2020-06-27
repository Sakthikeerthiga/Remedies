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

	}
	public function index()
	{
		$this->load->view('testimonial_index');
	}

// sickness testimonial list
	public function testimony_for_sickness($sickness_id='')
	{
		if($sickness_id!=''){
			$data['testimonial_details']= $this->Testimonial_model->sickness_testimony_list($sickness_id);
			$data['get_related_article'] = $this->Article_model->sickness_article_list($sickness_id);
			$data['breadcrumb'] = 'Conditions';
			$data['breadcrumb_url'] = 'condition-list';
		}
		$this->load->view('testimonial_result_list', $data);
	}

// remedy testimonial list
	public function testimony_for_remedy($remedy_id='')
	{       
		if($remedy_id!=''){
			$data['testimonial_details']= $this->Testimonial_model->remedy_testimony_list($remedy_id);
			$data['get_related_article'] = $this->Article_model->remedy_article_list($remedy_id);
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
           
   //         	$data = array(
			// 	'date'=>date("Y-m-d h:i"),
			// 	'user_iduser'=>$user_id,
			// 	'sickness_idsickness'=>$this->input->post('sickness_idsickness'),
			// 	'remedy_idremedy'=> $this->input->post('remedy_idremedy'),
			// 	'relief_idrelief'=>$this->input->post('relief_idrelief'),
			// 	'story'=>$this->input->post('story'),
			// 	'dosage'=>$this->input->post('dosage'),
			// 	'administeredTo'=>$this->input->post('administeredTo'),
			// 	'administeredBy'=>$this->input->post('administeredBy'),
			// 	'testimonyUrl'=>'testimonial/testimony_for_sickness/'.$this->input->post('sickness_idsickness'),
			// 	'warnings'=>$this->input->post('warnings'),
			// );

		}
		$insertNewPost = $this->Testimonial_model->insert_testimonial_new_post($data);
		if($insertNewPost){
			$this->session->set_flashdata('testimonial_add_msg', 'Your story has been added successfully');
			redirect('testimonial/testimony_for_sickness/'.$this->input->post('sickness_idsickness'));
		}
	}


}

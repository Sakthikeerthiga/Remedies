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


}

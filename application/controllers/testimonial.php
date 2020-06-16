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
		$this->load->model('testimonial_model');
		$this->load->model('article_model');

	}
	public function index()
	{
		$this->load->view('testimonial_index');
	}

// sickness testimonial list
	public function testimony_for_sickness($sickness_id='')
	{
		if($sickness_id!=''){
			$data['testimonial_details']= $this->testimonial_model->sickness_testimony_list($sickness_id);
			$data['get_related_article'] = $this->article_model->sickness_article_list($sickness_id);
		}
		$this->load->view('testimonial_result_list', $data);
	}

// remedy testimonial list
	public function testimony_for_remedy($remedy_id='')
	{       
		if($remedy_id!=''){
			$data['testimonial_details']= $this->testimonial_model->remedy_testimony_list($remedy_id);
			$data['get_related_article'] = $this->article_model->remedy_article_list($remedy_id);
			
		}
        $this->load->view('testimonial_result_list', $data);
	}

	
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Remedies extends CI_Controller {

public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('session');
		$this->load->library('pagination');
		$this->load->model('Remedy_model');
		$this->load->model('Trending_search');
		

	}
	public function index()
	{
		$this->load->view('welcome_message');
	}

// home page search functionality
	public function search()
	{
		$searchTerm = $this->input->get('search_keyword');

		$response = $this->Remedy_model->ajax_remedy_search($searchTerm);

		echo json_encode($response);
	}


// condition menu lsiting page
	public function remedylist()
	{
		$data['remedylist']  = $this->Remedy_model->get_remedy_list();
		$data['ad_after_remedylist']  = $this->Remedy_model->afterad_remedy_list();
		$this->load->view('remedy_list', $data);

	}
}

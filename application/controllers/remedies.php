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
		$this->load->model('remedy_model');
		$this->load->model('trending_search');
		

	}
	public function index()
	{
		$this->load->view('welcome_message');
	}

// home page search functionality
	public function search()
	{
		$searchTerm = $this->input->get('search_keyword');

		$response = $this->remedy_model->ajax_remedy_search($searchTerm);

		echo json_encode($response);
	}


// condition menu lsiting page
	public function remedylist()
	{
		$data['remedylist']  = $this->remedy_model->get_remedy_list();
		$data['ad_after_remedylist']  = $this->remedy_model->afterad_remedy_list();
		$this->load->view('remedy_list', $data);

	}
}

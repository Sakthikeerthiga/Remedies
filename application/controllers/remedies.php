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

// Remedy Listing page search functionality
	public function search()
	{
		$searchTerm = $this->input->get('search_keyword');

		$response = $this->Remedy_model->ajax_remedy_search($searchTerm);

		echo json_encode($response);
	}


// condition menu lsiting page
	public function remedylist()
	{
		$config = array();
		$config["base_url"] = base_url() . "remedies-list";
		$config["total_rows"] = $this->Remedy_model->get_count();
		$config["per_page"] = 20;
		$config["uri_segment"] = 2;
		$config['display_pages'] = FALSE;
		$config['first_link'] = false;
		$config['last_link'] = false;
		$start = $config["per_page"] * (0-1);
		$config['full_tag_open'] = "<ul class='pagination pagination-primary align-items-center justify-content-between'>";
		$config['full_tag_close'] = '</ul>';


		$config['prev_link'] = '<li class="page-item mx-1"><span class="page-link btn btn-sm rounded-pill">PREVIOUS PAGE	</span></li>';


		$config['next_link'] = '<li class="page-item mx-1"><span class="page-link btn btn-sm rounded-pill active">NEXT PAGE</span></li>';



		$this->pagination->initialize($config);

		$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

		$data["links"] = $this->pagination->create_links();

		$data['remedylist']  = $this->Remedy_model->get_remedy_list($config["per_page"], $page);
		$data['pagination'] = $this->pagination->create_links();
		$data['current'] = $this->pagination->current_place();

		$this->load->view('remedy_list', $data);

	}
}

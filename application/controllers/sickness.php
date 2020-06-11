<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sickness extends CI_Controller {

public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('session');
		$this->load->library('pagination');
		$this->load->model('sickness_model');
		

	}
	public function index()
	{
		$this->load->view('welcome_message');
	}


	public function search()
	{
		$searchTerm = $this->input->get('search_keyword');

		$response = $this->sickness_model->ajax_sickness_search($searchTerm);

		echo json_encode($response);
	}
}

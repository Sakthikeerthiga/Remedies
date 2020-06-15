<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller {

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


	public function detail_page($artile_id='')
	{
		if($artile_id!=''){
            $data['article_details']=$this->db->query("select * from article where idarticle='$artile_id'")->result_array();

	        $this->load->view('article_details', $data);


		}
	}
}

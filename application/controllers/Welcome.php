<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

/**
* Index Page for this controller.
*
* Maps to the following URL
* 		http://example.com/index.php/welcome
*	- or -
* 		http://example.com/index.php/welcome/index
*	- or -
* Since this controller is set as the default controller in
* config/routes.php, it's displayed at http://example.com/
*
* So any other public methods not prefixed with an underscore will
* map to /index.php/welcome/<method_name>
* @see https://codeigniter.com/user_guide/general/urls.html
*/

public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('session');
		$this->load->library('pagination');
		$this->load->model('trending_search');
		$this->load->model('article_model');
		$this->load->model('mission_model');

	}

public function index()
	{
		$data['trending_result']= $this->trending_search->trending_search();
		$data['article_result']= $this->article_model->article_list();
		$data['article_main_result']= $this->article_model->article_main_list();
		$data['mission_text']= $this->mission_model->mission_text();
		$this->load->view('welcome_message', $data);
	}
public function about_us()
	{
		$this->load->view('about_us');
	}

}

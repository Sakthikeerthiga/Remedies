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
		$this->load->model('Sickness_model');
		$this->load->model('Article_model');
	}
	public function index()
	{
		$this->load->view('welcome_message');
	}

// particular article detail page
	public function detail_page($article_name='')
	{
		$article_id = $this->db->get_where('article', array('articleUrl' => $article_name))->row()->idarticle;

		if($article_id!=''){
			$articleVisitCount = $this->Article_model->articleVisitCount($article_id);
			$data['article_details']= $this->Article_model->article_details_list($article_id);
			$get_related_sickeness = $this->db->query("select sickness_idsickness from featuredsicknesses where article_idarticle='$article_id'")->result_array();
			if(count($get_related_sickeness) > 0){
				$data['get_related_article'] = $this->Article_model->get_article_related_list($get_related_sickeness[0]['sickness_idsickness'],$article_id);
			}
			if(!empty($this->session->userdata('logged_user'))){
				$data['get_article_vote'] = $this->Article_model->get_article_success($article_id,$this->session->userdata('logged_user')['user_id']);
			}else{
				$data['get_article_vote'] = '';
			}

		}
		$this->load->view('article_details', $data);
	}

// sickness id based articles list
	public function sickness_article_list($sicknessname='')
	{       
		if($sicknessname!=''){
            
			$sickness_name =$this->db->get_where('metatags', array('pageName' => $sicknessname))->row()->title;
		    $sickness_id = $this->db->get_where('sickness', array('commonName' => $sickness_name))->row()->idsickness; 
			$data['article_details']= $this->Article_model->sickness_article_list($sickness_id);
			$data['remedy_chart'] = $this->Article_model->remedy_chart_list($sickness_id);
			$data['relief_chart'] = $this->Article_model->relief_chart_list($sickness_id);
            $data['sickness_name'] = $sickness_name;
            $data['sickness_slug'] = $sicknessname;
			if(!empty($data['article_details'])){
				$data['get_related_article'] = $this->Article_model->get_sickness_related_article($sickness_id,$data['article_details'][0]['idarticle']);
				$articleVisitCount = $this->Article_model->articleVisitCount($data['article_details'][0]['idarticle']);
			}

		}
		if(!empty($this->session->userdata('logged_user')) && !empty($data['article_details'])){
			$data['get_article_vote'] = $this->Article_model->get_article_success($data['article_details'][0]['idarticle'],$this->session->userdata('logged_user')['user_id']);
		}else{
			$data['get_article_vote'] = '';
		}

		$this->load->view('sickeness_article_list', $data);
	}

// Remedy id based articles list
	public function remedy_article_list($remedy_name='')
	{       
		if($remedy_name!=''){

		$remedy_id = $this->db->get_where('remedy', array('link' => $remedy_name))->row()->idremedy;
			$data['article_details']= $this->Article_model->remedy_article_list($remedy_id);
			if(!empty($data['article_details'])){
				$data['get_related_article'] = $this->Article_model->get_remedy_related_article($remedy_id,$data['article_details'][0]['idarticle']);
				$articleVisitCount = $this->Article_model->articleVisitCount($data['article_details'][0]['idarticle']);
			}
		}
		if(!empty($this->session->userdata('logged_user')) && !empty($data['article_details'])){
			$data['get_article_vote'] = $this->Article_model->get_article_success($data['article_details'][0]['idarticle'],$this->session->userdata('logged_user')['user_id']);
		}else{
			$data['get_article_vote'] = '';
		}
		$this->load->view('remedy_article_list', $data);
	}

	public function articlelist()
	{   
		$config = array();
		$config["base_url"] = base_url() . "article-list";
		$config["total_rows"] = $this->Article_model->get_count();
		$config["per_page"] = 20;
		$config["uri_segment"] = 2;
		$config['display_pages'] = FALSE;
		$config['use_page_numbers'] = TRUE;
		$start = $config["per_page"] * (0-1);
		$config['full_tag_open'] = "<ul class='pagination pagination-primary align-items-center justify-content-between'>";
		$config['full_tag_close'] = '</ul>';


		$config['prev_link'] = '<li class="page-item mx-1"><span class="page-link btn btn-sm rounded-pill">PREVIOUS PAGE	</span></li>';


		$config['next_link'] = '<li class="page-item mx-1"><span class="page-link btn btn-sm rounded-pill active">NEXT PAGE</span></li>';



		$this->pagination->initialize($config);

		$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

		$data["links"] = $this->pagination->create_links();

		$data['pagination'] = $this->pagination->create_links();
		$data['current'] = $this->pagination->current_place();

		$data['article_list']= $this->Article_model->article_list_detail($config["per_page"], $page);
		$this->load->view('article_list', $data);
	}

	public function rateArticle()
	{
		$user_iduser = $_POST['user_id'];
		$article_idarticle = $_POST['article_id'];
		$sucessRating = $_POST['success_val'];

		$data = array(
			'user_iduser'=>$_POST['user_id'],
			'article_idarticle'=>$_POST['article_id'],
			'sucessRating'=>$_POST['success_val'],
		);
		$insertArticle = $this->Article_model->article_rating($data);
		echo $insertArticle;
	}
}

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
	public function detail_page($article_id='')
	{
		if($article_id!=''){
			$this->db->select('*');
			$this->db->from('article');
			$this->db->join('featuredsicknesses', 'featuredsicknesses.article_idarticle = article.idarticle','LEFT');
			$this->db->where('article.idarticle',$article_id);
			$data['article_details']= $this->db->get()->result_array();
  			$get_related_sickeness = $this->db->query("select sickness_idsickness from featuredsicknesses where article_idarticle='$article_id'")->result_array();
			if(count($get_related_sickeness) > 0){
				$this->db->select('*');
				$this->db->from('article');
				$this->db->join('featuredsicknesses', 'featuredsicknesses.article_idarticle = article.idarticle');
				$this->db->where('featuredsicknesses.sickness_idsickness',$get_related_sickeness[0]['sickness_idsickness']);
				$this->db->where('article.idarticle!=',$article_id);
				$this->db->limit(3,0);
				$this->db->order_by("created_at", "desc");
				$data['get_related_article'] = $this->db->get()->result_array();
			}
			$this->load->view('article_details', $data);
		}
	}

// sickness id based articles list
	public function sickness_article_list($sickeness_id='')
	{       
		if($sickeness_id!=''){
			$data['article_details']= $this->Article_model->sickness_article_list($sickeness_id);
			$this->db->select('*');
			$this->db->from('article');
			$this->db->join('featuredsicknesses', 'featuredsicknesses.article_idarticle = article.idarticle');
			$this->db->where('featuredsicknesses.sickness_idsickness',$sickeness_id);
			$this->db->limit(3,0);
			$this->db->order_by("created_at", "desc");
			$data['get_related_article'] = $this->db->get()->result_array();
			}
            $this->load->view('sickeness_article_list', $data);
	}

	// Remedy id based articles list
	public function remedy_article_list($remedy_id='')
	{       
		if($remedy_id!=''){
			$data['article_details']= $this->Article_model->remedy_article_list($remedy_id);
			$this->db->select('*');
			$this->db->from('article');
			$this->db->join('featuredremedies', 'featuredremedies.article_idarticle = article.idarticle');
			$this->db->where('featuredremedies.remedy_idremedy',$remedy_id);
			$this->db->limit(3,0);
			$this->db->order_by("created_at", "desc");
			$data['get_related_article'] = $this->db->get()->result_array();
			}
            $this->load->view('remedy_article_list', $data);
	}

	public function articlelist()
	{       
			$data['article_list']= $this->Article_model->article_list_detail();
			$data['ad_after_articlelist']  = $this->Article_model->ad_after_articlelist();
            $this->load->view('article_list', $data);
	}
}

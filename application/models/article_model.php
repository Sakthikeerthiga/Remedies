<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Article_model extends CI_Model
{
    public function __construct()
    {
    	$this->table = 'article';
        parent::__construct();
        $this->load->database();
    }

    public function article_main_list()
    {
         $this->db->select('*');
         $this->db->order_by("created_at", "desc");
         $fetched_records = $this->db->get($this->table,1);
         $results = $fetched_records->result_array();
         return $results;     
    }

    public function article_list()
    {
         $this->db->select('*');
         $this->db->order_by("created_at", "desc");
         $fetched_records = $this->db->get($this->table,3,1);
         $results = $fetched_records->result_array();
         return $results;     
    }

    public function sickness_article_list($sickeness_id)
    {
        $this->db->select('*');
        $this->db->from('article');
        $this->db->join('featuredsicknesses', 'featuredsicknesses.article_idarticle = article.idarticle','LEFT');
        $this->db->where('featuredsicknesses.sickness_idsickness',$sickeness_id);
        $sickness_article_list= $this->db->get()->result_array();
        return $sickness_article_list;
    }

    public function remedy_article_list($remedy_id)
    {
        $this->db->select('*');
        $this->db->from('article');
        $this->db->join('featuredremedies', 'featuredremedies.article_idarticle = article.idarticle');
        $this->db->where('featuredremedies.remedy_idremedy',$remedy_id);
        $remedy_article_list= $this->db->get()->result_array();
        return $remedy_article_list;
    }

    public function article_list_detail()
    {
         $this->db->select('*');
         $this->db->order_by("created_at", "desc");
         $fetched_records = $this->db->get($this->table,10,0);
         $results = $fetched_records->result_array();
         return $results;     
    }
   public function ad_after_articlelist()
     {
         $this->db->select('*');
         $this->db->order_by("created_at", "desc");
         $fetched_records = $this->db->get($this->table,10,10);
         $results = $fetched_records->result_array();
         return $results;     
    }


}
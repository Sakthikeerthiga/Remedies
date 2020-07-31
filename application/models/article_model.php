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
    
    public function article_details_list($article_id){
        $this->db->select('*');
        $this->db->from('article');
        $this->db->join('featuredsicknesses', 'featuredsicknesses.article_idarticle = article.idarticle','LEFT');
        $this->db->join('featuredremedies', 'featuredremedies.article_idarticle = article.idarticle','LEFT');
        $this->db->join('sickness', 'featuredsicknesses.sickness_idsickness = sickness.idsickness','LEFT');
        $this->db->join('remedy', 'featuredremedies.remedy_idremedy = remedy.idremedy','LEFT');
        $this->db->where('article.idarticle',$article_id);
        $article_list= $this->db->get()->result_array();
        return $article_list;
    }

    public function sickness_article_list($sickeness_id)
    {
        $this->db->select('*');
        $this->db->from('article');
        $this->db->join('featuredsicknesses', 'featuredsicknesses.article_idarticle = article.idarticle','LEFT');
        $this->db->join('sickness', 'featuredsicknesses.sickness_idsickness = sickness.idsickness','LEFT');
        $this->db->where('featuredsicknesses.sickness_idsickness',$sickeness_id);
        $sickness_article_list= $this->db->get()->result_array();
        return $sickness_article_list;
    }

    public function sickness_related_article_list($sickeness_id,$article_id)
    {
        $this->db->select('*');
        $this->db->from('article');
        $this->db->join('featuredsicknesses', 'featuredsicknesses.article_idarticle = article.idarticle','LEFT');
        $this->db->join('sickness', 'featuredsicknesses.sickness_idsickness = sickness.idsickness','LEFT');
        $this->db->where('featuredsicknesses.sickness_idsickness',$sickeness_id);
        $this->db->where('featuredsicknesses.article_idarticle',$article_id);
        $sickness_article_list= $this->db->get()->result_array();
        return $sickness_article_list;
    }


    public function remedy_related_article_list($remedy_id,$article_id)
    {
        $this->db->select('*');
        $this->db->from('article');
        $this->db->join('featuredremedies', 'featuredremedies.article_idarticle = article.idarticle');
        $this->db->join('remedy', 'featuredremedies.remedy_idremedy = remedy.idremedy','LEFT');
        $this->db->where('featuredremedies.remedy_idremedy',$remedy_id);
        $this->db->where('featuredremedies.article_idarticle',$article_id);
        $remedy_article_list= $this->db->get()->result_array();
        return $remedy_article_list;
    }


    public function remedy_article_list($remedy_id)
    {
        $this->db->select('*');
        $this->db->from('article');
        $this->db->join('featuredremedies', 'featuredremedies.article_idarticle = article.idarticle');
        $this->db->join('remedy', 'featuredremedies.remedy_idremedy = remedy.idremedy','LEFT');
        $this->db->where('featuredremedies.remedy_idremedy',$remedy_id);
        $remedy_article_list= $this->db->get()->result_array();
        return $remedy_article_list;
    }

    public function article_list_detail($limit, $start)
    {
         $this->db->select('*');
         $this->db->order_by("created_at", "desc");
         $fetched_records = $this->db->get($this->table,$limit, $start);
         $results = $fetched_records->result_array();
         return $results;     
    }

    public function get_count()
    {
         return $this->db->count_all($this->table);  
    }
   
    public function article_rating($data){
        $articlesuccess = $this->db->insert('articlesuccess',$data);
        $idarticleSuccess = $this->db->insert_id();

        return $idarticleSuccess;
    }
    public function get_article_success($article_id,$user_id)
    {
         $query = $this->db->get_where('articlesuccess', array('article_idarticle' => $article_id,'user_iduser' => $user_id))->num_rows(); 
         return $query;
    }

    public function get_sickness_related_article($sickeness_id,$article_id)
    {
            $this->db->select('*');
            $this->db->from('article');
            $this->db->join('featuredsicknesses', 'featuredsicknesses.article_idarticle = article.idarticle');
            $this->db->where('featuredsicknesses.sickness_idsickness',$sickeness_id);
            $this->db->where('article.idarticle!=',$article_id);
            $this->db->limit(3,0);
            $results = $this->db->get()->result_array();
            return $results; 
    }

    public function get_remedy_related_article($remedy_id,$article_id)
    {
            $this->db->select('*');
            $this->db->from('article');
            $this->db->join('featuredremedies', 'featuredremedies.article_idarticle = article.idarticle');
            $this->db->where('featuredremedies.remedy_idremedy',$remedy_id);
            $this->db->where('article.idarticle!=',$article_id);
            $this->db->limit(3,0);
            $results = $this->db->get()->result_array();
            return $results; 
    }

     public function get_article_related_list($sickness_id,$article_id)
    {
            $this->db->select('*');
            $this->db->from('article');
            $this->db->join('featuredsicknesses', 'featuredsicknesses.article_idarticle = article.idarticle');
            $this->db->where('featuredsicknesses.sickness_idsickness',$sickness_id);
            $this->db->where('article.idarticle!=',$article_id);
            $this->db->limit(3,0);
            $this->db->order_by("created_at", "desc");
            $results = $this->db->get()->result_array();
            return $results; 
    }

    public function articleVisitCount($article_id)
    {
        $this->db->set('clicks', 'clicks+1', FALSE);
        $this->db->where('idarticle',$article_id);
        $this->db->update('article');
    }

    public function sickness_remedy_chart_list($sickness_id)
    {

            $this->db->select('name as remedy_name,COUNT(idtestimony) as testimony_count');
            $this->db->from('testimony');
            $this->db->join('remedy', 'remedy.idremedy = testimony.remedy_idremedy');
            $this->db->where('testimony.sickness_idsickness',$sickness_id);
            $this->db->group_by('testimony.remedy_idremedy');
            $this->db->order_by("testimony_count", "asc");
            $results = $this->db->get()->result_array();
            return $results;
    }

    public function sickness_relief_chart_list($sickness_id)
    {

            $this->db->select('type as relief_name,COUNT(user_iduser) as relief_count');
            $this->db->from('testimony');
            $this->db->join('relieftype', 'relieftype.idrelief = testimony.relief_idrelief');
            $this->db->where('testimony.sickness_idsickness',$sickness_id);
            $this->db->group_by('testimony.relief_idrelief');
            $this->db->order_by("relief_count", "asc");
            $results = $this->db->get()->result_array();
            return $results;
    }

    public function relief_remedy_chart_list($remedy_id)
    {

            $this->db->select('commonName as remedy_name,COUNT(idtestimony) as testimony_count');
            $this->db->from('testimony');
            $this->db->join('sickness', 'sickness.idsickness = testimony.sickness_idsickness');
            $this->db->where('testimony.remedy_idremedy',$remedy_id);
            $this->db->group_by('testimony.sickness_idsickness');
            $this->db->order_by("testimony_count", "asc");
            $results = $this->db->get()->result_array();
            return $results;
    }

    public function relief_relief_chart_list($remedy_id)
    {

            $this->db->select('type as relief_name,COUNT(user_iduser) as relief_count');
            $this->db->from('testimony');
            $this->db->join('relieftype', 'relieftype.idrelief = testimony.relief_idrelief');
            $this->db->where('testimony.remedy_idremedy',$remedy_id);
            $this->db->group_by('testimony.relief_idrelief');
            $this->db->order_by("relief_count", "asc");
            $results = $this->db->get()->result_array();
            return $results;
    }

      public function get_reviwer_name($article_id)
    {

            $this->db->select('username');
            $this->db->from('article');
            $this->db->join('editor', 'editor.idEditor = article.reviewerId');
            $this->db->where('article.idarticle',$article_id);
            $results = $this->db->get()->result();
            return $results;
    }

     public function get_author_name($article_id)
    {

            $this->db->select('username');
            $this->db->from('article');
            $this->db->join('editor', 'editor.idEditor = article.authorId');
            $this->db->where('article.idarticle',$article_id);
            $results = $this->db->get()->result();
            return $results;
    }
    
        // header menu search
    public function ajax_article_search($searchTerm="")
    {
        $this->db->select('*');
        $this->db->where("seo_title like '%".$searchTerm."%' ");
        $fetched_records = $this->db->get($this->table);
        $results = $fetched_records->result_array();

        $data = array();
        foreach($results as $result){
            $data[] = array("id"=>$result['idarticle'], "text"=>$result['seo_title'],"link"=>$result['articleUrl']);
        }
        return $data;
    }
}
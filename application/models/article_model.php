<?php
defined('BASEPATH') or exit('No direct script access allowed');

class article_model extends CI_Model
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

}
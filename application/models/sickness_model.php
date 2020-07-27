<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sickness_model extends CI_Model
{
    public function __construct()
    {
        $this->table = 'sickness';
        parent::__construct();
        $this->load->database();
    }
// header menu search
    public function ajax_sickness_search($searchTerm="")
    {
        $this->db->select('*');
        $this->db->where("commonName like '%".$searchTerm."%' ");
        $fetched_records = $this->db->get($this->table);
        $results = $fetched_records->result_array();

        $data = array();
        foreach($results as $result){
            $data[] = array("id"=>$result['idsickness'], "text"=>$result['commonName']);
        }
        return $data;
    }
// condition page list
    public function get_count() {
        return $this->db->count_all($this->table);
    }
    
    public function get_sickness_list($limit, $start)
    {

        $this->db->select('*');
        $this->db->order_by("commonName", "asc");
        $this->db->limit($limit, $start);
        $fetched_records = $this->db->get($this->table);
        $results = $fetched_records->result_array();
        return $results;
    }

     public function update_sickness_metatags($data)
    {
         $this->db->select('*');
        $this->db->where("title like '".addslashes($data)."'  ");
        $fetched_records = $this->db->get('metatags');
        $results = $fetched_records->result_array();
        return $results;

    }

}
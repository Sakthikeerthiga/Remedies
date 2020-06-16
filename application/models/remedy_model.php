<?php
defined('BASEPATH') or exit('No direct script access allowed');

class remedy_model extends CI_Model
{
    public function __construct()
    {
        $this->table = 'remedy';
        parent::__construct();
        $this->load->database();
    }
// header menu search
    public function ajax_remedy_search($searchTerm="")
    {
        $this->db->select('*');
        $this->db->where("name like '%".$searchTerm."%' ");
        $fetched_records = $this->db->get($this->table);
        $results = $fetched_records->result_array();

        $data = array();
        foreach($results as $result){
            $data[] = array("id"=>$result['idremedy'], "text"=>$result['name']);
        }
        return $data;
    }
// condition page list

    public function get_remedy_list()
    {
        $this->db->select('*');
        $this->db->order_by("name", "asc");
        $this->db->limit(10,0);
        $fetched_records = $this->db->get($this->table);
        $results = $fetched_records->result_array();
        return $results;
    }

    public function afterad_remedy_list()
    {
        $this->db->select('*');
        $this->db->order_by("name", "asc");
        $fetched_records = $this->db->get($this->table,10,10);
        $results = $fetched_records->result_array();
        return $results;
    }
}
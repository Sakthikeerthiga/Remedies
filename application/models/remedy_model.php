<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Remedy_model extends CI_Model
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
            $data[] = array("id"=>$result['idremedy'], "text"=>$result['name'],"link"=>$result['link']);
        }
        return $data;
    }
// Remedy page list

    public function get_remedy_list($limit, $start)
    {
        $this->db->select('*');
        $this->db->order_by("name", "asc");
        $this->db->limit($limit, $start);
        $fetched_records = $this->db->get($this->table);
        $results = $fetched_records->result_array();
        return $results;
    }

    public function get_count() {
        return $this->db->count_all($this->table);
    }
}
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class sickness_model extends CI_Model
{
    public function __construct()
    {
    	$this->table = 'sickness';
        parent::__construct();
        $this->load->database();
    }

    public function ajax_sickness_search($searchTerm=""){
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

}
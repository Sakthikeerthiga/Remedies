<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Editor_model extends CI_Model
{
    public function __construct()
    {
        $this->table = 'article';
        parent::__construct();
        $this->load->database();
    }


    public function get_writers(){

        $this->db->select('*');
        $this->db->where('role',1);
        $fetched_records = $this->db->get('editor');
        $results = $fetched_records->result_array();
        return $results;     
    }

     public function disclaimer(){
        $this->db->select('*');
        $fetched_records = $this->db->get('disclaimer');
        $results = $fetched_records->result_array();
        return $results;     
     }
}
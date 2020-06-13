<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mission_model extends CI_Model
{
    public function __construct()
    {
    	$this->table = 'homepage';
        parent::__construct();
        $this->load->database();
    }

    public function mission_text(){
     $this->db->select('*');
     $fetched_records = $this->db->get($this->table);
     $results = $fetched_records->result_array();
     return $results;
    }

}
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class testimonial_model extends CI_Model
{
    public function __construct()
    {
    	$this->table = 'testimony';
        parent::__construct();
        $this->load->database();
    }

    public function sickness_testimony_list($sickeness_id)
    {
         $this->db->select('*');
         $this->db->where('sickness_idsickness',$sickeness_id);
         $this->db->order_by("idtestimony", "desc");
         $fetched_records = $this->db->get($this->table);
         $results = $fetched_records->result_array();
         return $results;     
    }

   public function remedy_testimony_list($remedy_id)
    {
         $this->db->select('*');
         $this->db->where('remedy_idremedy',$remedy_id);
         $this->db->order_by("idtestimony", "desc");
         $fetched_records = $this->db->get($this->table);
         $results = $fetched_records->result_array();
         return $results;     
    }



}
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class trending_search extends CI_Model
{
    public function __construct()
    {
        $this->table = 'trendingsearches';
        parent::__construct();
        $this->load->database();
    }

    public function trending_search()
    {
        $this->db->select('*');
        $this->db->order_by("positiveTestimonies", "desc");
        $fetched_records = $this->db->get($this->table,8);
        $results = $fetched_records->result_array();
        $data = array();
        foreach($results as $result){
            $data[] = array("item_heading"=>$result['trendTitle'], "item_pic"=>$result['trendPic'], "item_count"=>$result['positiveTestimonies'],"item_url"=>$result['url']);
        }
        return $data;
    }



}
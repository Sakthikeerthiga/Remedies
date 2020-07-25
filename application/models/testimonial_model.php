<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Testimonial_model extends CI_Model
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

        $this->db->join('user', 'user.iduser = testimony.user_iduser','LEFT');
        $this->db->join('sickness', 'sickness.idsickness = testimony.sickness_idsickness','LEFT');
        $this->db->join('remedy', 'remedy.idremedy = testimony.remedy_idremedy','LEFT');
        $this->db->join('relieftype', 'relieftype.idrelief = testimony.relief_idrelief','LEFT');
        $this->db->where('sickness_idsickness',$sickeness_id);
        $this->db->order_by("idtestimony", "desc");
        $fetched_records = $this->db->get($this->table);
        $results = $fetched_records->result_array();
        return $results;     
    }

    public function remedy_testimony_list($remedy_id)
    {
        $this->db->select('*');
        $this->db->join('user', 'user.iduser = testimony.user_iduser','LEFT');
        $this->db->join('sickness', 'sickness.idsickness = testimony.sickness_idsickness','LEFT');
        $this->db->join('remedy', 'remedy.idremedy = testimony.remedy_idremedy','LEFT');
        $this->db->join('relieftype', 'relieftype.idrelief = testimony.relief_idrelief','LEFT');
        $this->db->where('remedy_idremedy',$remedy_id);
        $this->db->order_by("idtestimony", "desc");
        $fetched_records = $this->db->get($this->table);
        $results = $fetched_records->result_array();
        return $results;     
    }

    public function get_testimonial_detail($testimony_id){
        $this->db->select('*');
        $this->db->where('idtestimony',$testimony_id);
         $fetched_records = $this->db->get($this->table);
        $results = $fetched_records->result_array();
        return $results;     
    }

    public function get_sickrealted_main_comment($sick_id){

        $this->db->select('*');
        $this->db->join('comment', 'comment.testimony_idtestimony = testimony.idtestimony','LEFT');
        $this->db->join('user', 'user.iduser = testimony.user_iduser','LEFT');
        $this->db->where('sickness_idsickness',$sick_id);
        $this->db->where('comment_idcomment IS NULL', null, false);
        $this->db->order_by("idcomment", "desc");
        $fetched_records = $this->db->get($this->table);
        $results = $fetched_records->result_array();
        return $results;     
    }

    public function get_remedyrealted_main_comment($remedy_id){

        $this->db->select('*');
        $this->db->join('comment', 'comment.testimony_idtestimony = testimony.idtestimony','LEFT');
        $this->db->join('user', 'user.iduser = testimony.user_iduser','LEFT');
        $this->db->where('remedy_idremedy',$remedy_id);
        $this->db->where('comment_idcomment IS NULL', null, false);
        $this->db->order_by("idcomment", "desc");
        $fetched_records = $this->db->get($this->table);
        $results = $fetched_records->result_array();
        return $results;     
    }


    public function get_sickrealted_additional_comment($sick_id){

        $this->db->select('*');
        $this->db->join('comment', 'comment.testimony_idtestimony = testimony.idtestimony','LEFT');
        $this->db->join('user', 'user.iduser = testimony.user_iduser','LEFT');
        $this->db->where('sickness_idsickness',$sick_id);
        $this->db->where('comment_idcomment IS NOT NULL', null, false);
        $this->db->order_by("idcomment", "desc");
        $fetched_records = $this->db->get($this->table);
        $results = $fetched_records->result_array();
        return $results;     
    }

    public function get_remedyrealted_additional_comment($remedy_id){

        $this->db->select('*');
        $this->db->join('comment', 'comment.testimony_idtestimony = testimony.idtestimony','LEFT');
        $this->db->join('user', 'user.iduser = testimony.user_iduser','LEFT');
        $this->db->where('remedy_idremedy',$remedy_id);
        $this->db->where('comment_idcomment IS NOT NULL', null, false);
        $this->db->order_by("idcomment", "desc");
        $fetched_records = $this->db->get($this->table);
        $results = $fetched_records->result_array();
        return $results;     
    }


    public function sickness_data_list()
    {
        $this->db->select('*');
        $this->db->order_by("commonName", "asc");
        $fetched_records = $this->db->get('sickness');
        $results = $fetched_records->result_array();
        return $results;     
    }

    public function remedy_data_list()
    {
        $this->db->select('*');
        $this->db->order_by("name", "asc");
        $fetched_records = $this->db->get('remedy');
        $results = $fetched_records->result_array();
        return $results;     
    }

    public function relief_data_list()
    {
        $this->db->select('*');
        $this->db->order_by("type", "asc");
        $fetched_records = $this->db->get('relieftype');
        $results = $fetched_records->result_array();
        return $results;  
    }

    public function get_county($user_id){
        $this->db->select('Country');
        $this->db->where("iduser", $user_id);
        $fetched_records = $this->db->get('user');
        $results = $fetched_records->result();
        return $results;  
    }

    public function get_state($user_id){
        $this->db->select('City');
        $this->db->where("iduser", $user_id);
        $fetched_records = $this->db->get('user');
        $results = $fetched_records->result();
        return $results;  
    }

    public function insert_testimonial_new_post($data)
    {
        $insert_data = $this->db->insert('testimony',$data);
        $testimony_id = $this->db->insert_id();
        return $testimony_id;
    }

    public function add_new_comment($data)
    {
        $insert_data = $this->db->insert('comment',$data);
        $comment_id = $this->db->insert_id();
        return $comment_id;
    }

    public function insert_sickness($data){
        $insert_data = $this->db->insert('sickness',$data);
        $sickness_id = $this->db->insert_id();
        return $sickness_id;
    }

    public function add_reply_comment($data)
    {
        $insert_data = $this->db->insert('comment',$data);
        $comment_id = $this->db->insert_id();
        return $comment_id;
    }

    public function get_main_command($testimony_id){
        $this->db->select('comment,datePosted,idcomment,screenName,testimony_idtestimony');
        $this->db->join('user', 'user.iduser = comment.user_iduser','LEFT');
        $this->db->where("testimony_idtestimony", $testimony_id);
        $this->db->where('comment_idcomment IS NULL', null, false);
        $this->db->order_by("idcomment", "desc");
        $fetched_records = $this->db->get('comment');
        $results = $fetched_records->result();
        return $results;  
    }

    public function get_additional_command($comment_id){
        $this->db->select('comment,datePosted,idcomment,screenName,testimony_idtestimony,comment_idcomment');
        $this->db->join('user', 'user.iduser = comment.user_iduser','LEFT');
        $this->db->where("comment_idcomment", $comment_id);
        $this->db->where('comment_idcomment IS NOT NULL', null, false);
        $this->db->order_by("idcomment", "desc");
        $fetched_records = $this->db->get('comment');
        $results = $fetched_records->result();
        return $results;  
   }
}
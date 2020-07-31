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

    public function dosage_unit(){
        $this->db->select('*');
        $this->db->order_by("unitShortName", "asc");
        $fetched_records = $this->db->get('dosageunit');
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

   public function get_blog_comments($testimony_id) {
        $query = $this->db->query('SELECT bc.idcomment, bc.testimony_idtestimony, bc.comment_idcomment, bc.comment, 
                    bc.datePosted, us.screenName,bc.user_iduser FROM comment bc, testimony b ,user us
                    WHERE bc.testimony_idtestimony=b.idtestimony AND bc.user_iduser=us.iduser AND 
                        b.idtestimony=' . $testimony_id .
                ' ORDER BY bc.datePosted DESC');
        if ($query->num_rows() > 0) {
            $items = array();

            foreach ($query->result() as $row) {
                $items[] = $row;
            }
            //return $items;
            $comments = $this->format_comments($testimony_id,$items);
            return $comments;
        }
        return '<ul class="comment"></ul>';
    }

    //format comments for display on blog and article
    private function format_comments($testimony_id,$comments) {
        $html = array();
        $root_id = 0;

        foreach ($comments as $comment)
            $children[$comment->comment_idcomment][] = $comment;

        // loop will be false if the root has no children (i.e., an empty comment!)
        $loop = !empty($children[$root_id]);

        // initializing $parent as the root
        $parent = $root_id;
        $parent_stack = array();

        // HTML wrapper for the menu (open)
        $html[] = '<ul class="comment">';

        while ($loop && ( ( $option = each($children[$parent]) ) || ( $parent > $root_id ) )) {

            if(!empty($option['value'])){
             if($this->session->userdata('logged_user')['user_id'] == $option['value']->user_iduser){
                $edit_button = '<a href="javaScript:void(0)" onclick="editComment(%2$s,%5$s)"><img src="'.base_url().'assets/img/edit.svg" height="25" class="mr-1 mb-0" alt=""></a>';
            }else{
                $edit_button = '';
            }
        }


            if ($option === false) {
                $parent = array_pop($parent_stack);

                // HTML for comment item containing childrens (close)
                $html[] = str_repeat("\t", ( count($parent_stack) + 1 ) * 2) . '</ul>';
                $html[] = str_repeat("\t", ( count($parent_stack) + 1 ) * 2 - 1) . '</li>';

            } elseif (!empty($children[$option['value']->idcomment])) {
                $tab = str_repeat("\t", ( count($parent_stack) + 1 ) * 2 - 1);
                  

                // HTML for comment item containing childrens (open)
                $html[] = sprintf(
                        '%1$s<li id="li_comment_%2$s">' .
                        '%1$s%1$s<div class="testimonial-discussion comment_div_%2$s"><div class="row"><div class="col-sm-6"><span class="comment_date">Username : <strong> %6$s </strong></span></div>' .  '%1$s%1$s<div class="col-sm-4" >%4$s</div><div class="col-sm-2">'.$edit_button.'</div></div>' .
                        '%1$s%1$s<div class="comment_section_%2$s" style="margin-top:4px;">%3$s</div>' .
                        '%1$s%1$s<a class="btn btn-success btn-circle text-uppercase" href="javascript:void(0);" onclick="reply_to_comment(%5$s,%2$s)"><span class="glyphicon glyphicon-send"></span> Reply</a></div><br>', $tab, // %1$s = tabulation
                        $option['value']->idcomment, //%2$s id
                        $option['value']->comment, // %4$s = comment
                        $option['value']->datePosted, // %3$s = comment created_date
                        $option['value']->testimony_idtestimony, // %5$s = testimony_id
                         $option['value']->screenName // %5$s = testimony_id
                );
                //$check_status = "";
                $html[] = $tab . "\t" . '<ul class="comment">';

                array_push($parent_stack, $option['value']->comment_idcomment);
                $parent = $option['value']->idcomment;
            } else {
                // HTML for comment item with no children (aka "leaf") 
                $html[] = sprintf(
                        '%1$s<li id="li_comment_%2$s">' .
                        '%1$s%1$s<div class="testimonial-discussion comment_div_%2$s"><div class="row"><div class="col-sm-6"><span class="comment_date">Username : <strong> %6$s </strong></span></div>' .  '%1$s%1$s<div class="col-sm-4" >%4$s</div><div class="col-sm-2">'.$edit_button.'</div></div>' .
                        '%1$s%1$s<div class="comment_section_%2$s" style="margin-top:4px;">%3$s</div>' .
                        '%1$s%1$s<a class="btn btn-success btn-circle text-uppercase" href="javascript:void(0);" onclick="reply_to_comment(%5$s,%2$s)"><span class="glyphicon glyphicon-send"></span> Reply</a></div><br>' .
                        '%1$s</li>', str_repeat("\t", ( count($parent_stack) + 1 ) * 2 - 1), // %1$s = tabulation
                        $option['value']->idcomment, //%2$s id
                        $option['value']->comment, // %4$s = comment
                        $option['value']->datePosted, // %3$s = comment created_date
                        $option['value']->testimony_idtestimony, // %5$s = testimony_id
                        $option['value']->screenName // %5$s = testimony_id
                         // %5$s = testimony_id

                );
            }
        }

        // HTML wrapper for the comment (close)
        $html[] = '</ul>';
        return implode("\r\n", $html);
    }

    public function get_editors(){
        $this->db->select('*');
        $this->db->where("role", 1);
        $this->db->order_by("idEditor", "desc");
        $fetched_records = $this->db->get('editor');
        $results = $fetched_records->result();
        return $results;  
    }

    public function get_user_name($user_id){
         $this->db->select('*');
        $this->db->where("iduser", $user_id);
        $fetched_records = $this->db->get('user');
        $results = $fetched_records->result();
        return $results;  
    }

    public function get_comment_user_name($comment_id){
        $this->db->select('*');
        $this->db->where("idcomment", $comment_id);
        $this->db->join('user', 'user.iduser = comment.user_iduser','LEFT');
        $fetched_records = $this->db->get('comment');
        $results = $fetched_records->result();
        return $results; 
    }

    public function get_testimony_user($testimony_id){
        $this->db->select('*');
        $this->db->join('user', 'user.iduser = testimony.user_iduser','LEFT');
        $this->db->where('idtestimony',$testimony_id);
        $fetched_records = $this->db->get($this->table);
        $results = $fetched_records->result();
        return $results;     
    }
}
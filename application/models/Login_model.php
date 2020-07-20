<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{
    public function __construct()
    {
        $this->table = 'user';
        parent::__construct();
        $this->load->database();
    }
   // check email already exist or not
    public function checkemail($email){

        $query = $this->db->get_where('user', array('email' => $email)); 
        if($query->num_rows() == 0) echo '1';
        else echo '0'; 

    }
// check username already exist or not
    public function checkusername($username){

        $query = $this->db->get_where('user', array('screenName' => $username)); 
        if($query->num_rows() == 0) echo $username;
        else echo '0'; 

    }
    
   // save user detail in user table
    public function insert_user($data){

        $insert_data = $this->db->insert('user',$data);
        $user_id = $this->db->insert_id();

        return $user_id;
    }
// update user detail in user table
    public function update_user($data,$uid){
         $this->db->where('iduser', $uid);
         $this->db->update('user', $data);
    }

    //Update testimony Fields
    public function update_testimony_fields($data,$uid){
        $query = $this->db->get_where('testimony', array('user_iduser' => $uid)); 
        if($query->num_rows() != 0){
            $this->db->where('user_iduser', $uid);
            $this->db->update('testimony', $data);
        }
    }

    //Get user details by id
    public function getuserdetails($uid){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('iduser',$uid);
        return $this->db->get()->result();
    }

    public function islogin($data){  
    $query=$this->db->get_where('user',array('email'=>$data['email'],'password'=>sha1($data['password'])));  
    return $query->num_rows();  
}  

   public function getCountryList(){
        $this->db->select('*');
        $this->db->order_by("countryName", "asc");
        $fetched_records = $this->db->get('countries');
        $results = $fetched_records->result_array();
        return $results;
   }
}
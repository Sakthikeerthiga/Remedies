<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->model('Login_model');
		$this->load->library('grocery_CRUD');
		$this->table = 'user';


	}
	public function index()
	{
		if(!empty($this->session->userdata('editor_login')['is_editor'])){
			$this->load->view('editor/dashboard');
		}else{
			$this->load->view('editor/editorlogin');
		}
	}
	public function home(){
		$this->load->view('editor/dashboard');
	}


	public function editorlogin(){  

		$data['username']=htmlspecialchars($_POST['name']);  
		$data['password']=htmlspecialchars($_POST['pwd']);  
		$query=$this->db->get_where('editor',array('username'=>$data['username'],'password'=>sha1($data['password'])));  
		$res= $query->num_rows();  
		if($res){  
			$this->db->select('idEditor');
			$this->db->from('editor');
			$this->db->where('username',$data['username']);
			$query= $this->db->get()->result();   

			$session_data = array(
				'editor_userid' =>$query[0]->idEditor,
				'editor_username'=> $data['username'],
				'is_editor'=> 1,
			); 
			$this->session->set_userdata('editor_login',$session_data);  
			redirect(base_url().'Editor');
		}  
		else{  
			$this->session->set_flashdata('editor_login_error', 'Invalid Credentials');
			redirect(base_url().'Editor'); 
		}   
	}  

	public function logout(){
		$this->session->unset_userdata('editor_login');
		redirect('Editor', 'refresh');
	}

public function sickness() {
	if(!empty($this->session->userdata('editor_login')['is_editor'])){
		$crud = new grocery_CRUD();
		$crud->set_table('sickness');
		$crud->set_subject('Sickness');
		$crud->set_field_upload('ThumnailImage','assets/uploads/sickness');
		 $crud->unset_delete();
		  $crud->unset_edit();
		$output = $crud->render();
		$this->_example_output($output);
	}else{
			redirect('/Editor');
	}

	}


public function dosageUnit() { $crud = new grocery_CRUD();
	if(!empty($this->session->userdata('editor_login')['is_editor'])){

	$crud->set_table('dosageunit');
	$crud->set_subject('Dosage Unit');
		 $crud->unset_delete();
		  $crud->unset_edit();
	$output = $crud->render();
	
	$this->_example_output($output);
	}else{
			redirect('/Editor');
	}
}

public function duration() { $crud = new grocery_CRUD();
if(!empty($this->session->userdata('editor_login')['is_editor'])){
	$crud->set_table('duration');
	$crud->set_subject('Duration');
		 $crud->unset_delete();
		  $crud->unset_edit();
	$output = $crud->render();
	$this->_example_output($output);

	}else{
			redirect('/Editor');
	}
}

public function remedy() {
if(!empty($this->session->userdata('editor_login')['is_editor'])){

	$crud = new grocery_CRUD();
	$crud->set_table('remedy');
	$crud->set_subject('Remedies');
	$crud->required_fields('type', 'name');
		 $crud->unset_delete();
		  $crud->unset_edit();
	$crud->set_field_upload('picture','assets/uploads/remedy');
// $crud->columns('type','name','shortName','link', 'picture');
// $crud->fields('type','name','shortName','link', 'picture','expertAdvice');
	$crud->field_type('type','dropdown',array('1' => 'Supplement', '2' => 'Activity','3' => 'Other','4' => 'Unclassified' ));


	$output = $crud->render();

	$this->_example_output($output);
	}else{
			redirect('/Editor');
	}
}

public function _remedy_output($output = null) {
if(!empty($this->session->userdata('editor_login')['is_editor'])){
	 $crud->unset_delete();
		  $crud->unset_edit();
	$this->_example_output($output);
	}else{
			redirect('/Editor');
	}
}

public function availability() { 
if(!empty($this->session->userdata('editor_login')['is_editor'])){

	$crud = new grocery_CRUD();
	$crud->set_table('availability');
	$crud->set_subject('Availability');
	$crud->set_relation('remedy_idremedy','remedy','name');
	$crud->set_relation('country','countries','countryName');
	$crud->display_as('remedy_idremedy','Remedy');
		 $crud->unset_delete();
		  $crud->unset_edit();
	$output = $crud->render();
	$this->_example_output($output);
	}else{
			redirect('/Editor');
	}

}

public function reliefType() { 
if(!empty($this->session->userdata('editor_login')['is_editor'])){

	$crud = new grocery_CRUD();
	$crud->set_table('relieftype');
	$crud->set_subject('ReliefType');
	 $crud->unset_delete();
		  $crud->unset_edit();
	$output = $crud->render();
	$this->_example_output($output);
	}else{
			redirect('/Editor');
	}
}


public function article() {
if(!empty($this->session->userdata('editor_login')['is_editor'])){

	$crud = new grocery_CRUD();
	$crud->set_table('article');
	$crud->set_subject('Articles');
	$crud->set_relation('editor_idEditor','editor','surname');
	$crud->set_relation('reviewerId','editor','surname');
	$crud->set_relation('authorId','editor','surname');
	$crud->set_field_upload('thumbnailImage','assets/uploads/article');
	$crud->display_as('reviewerId','Reviewer');
	$crud->display_as('authorId','Author');
	$crud->display_as('editor_idEditor','Editor');
	$crud->field_type('created_at', 'hidden',date('Y-m-d H:i:s'));
	$crud->field_type('updated_at', 'hidden');
	$crud->field_type('clicks', 'hidden');

// $crud->set_relation('seo_author','editor','surname');
	$crud->field_type('category','dropdown',array('1' => 'Supplement', '2' => 'Sickness'));
	$crud->set_relation_n_n('Featured_Remedies', 'featuredremedies', 'remedy', 'article_idarticle', 'remedy_idremedy', 'name');
	$crud->set_relation_n_n('Featured_Sicknesses', 'featuredsicknesses', 'sickness', 'article_idarticle', 'sickness_idsickness', 'commonName');
	 $crud->unset_delete();
		  $crud->unset_edit();
	$output = $crud->render();
	$this->_example_output($output);
	}else{
			redirect('/Editor');
	}
}


	public function _example_output($output = null) {
	$this->load->view('editor/index',(array)$output);
}



}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->model('Login_model');
		$this->load->library('grocery_CRUD');
		$this->load->model('Sickness_model');
		$this->table = 'user';


	}
	public function index()
	{
		if(!empty($this->session->userdata('admin_login')['is_admin'])){
			$this->load->view('admin/dashboard');
		}else{
			$this->load->view('admin/adminlogin');
		}
	}



	public function adminlogin(){  

		$data['username']=htmlspecialchars($_POST['name']);  
		$data['password']=htmlspecialchars($_POST['pwd']);  
		$query=$this->db->get_where('admin',array('username'=>$data['username'],'password'=>sha1($data['password'])));  
		$res= $query->num_rows();  
		if($res){  
			$this->db->select('idadmin');
			$this->db->from('admin');
			$this->db->where('username',$data['username']);
			$query= $this->db->get()->result();   

			$session_data = array(
				'admin_userid' =>$query[0]->idadmin,
				'admin_username'=> $data['username'],
				'is_admin'=> 1,
			); 
			$this->session->set_userdata('admin_login',$session_data);  
			redirect(base_url().'Admin');
		}  
		else{  
			$this->session->set_flashdata('admin_login_error', 'Invalid Credentials');
			redirect(base_url().'Admin'); 
		}   
	}  

	public function logout(){
		$this->session->unset_userdata('admin_login');
		redirect('Admin', 'refresh');
	}

	public function home(){
		$this->load->view('admin/dashboard');
	}




	public function sickness() {
	if(!empty($this->session->userdata('admin_login')['is_admin'])){
		$crud = new grocery_CRUD();
		$crud->set_table('sickness');
		$crud->set_subject('Sickness');
	    $crud->required_fields('commonName','scientificName');
		$crud->set_field_upload('ThumnailImage','assets/uploads/sickness');
		$crud->callback_before_insert(array($this,'insert_sickness_metatages')); 
		$crud->callback_before_update(array($this,'update_sickness_metatages')); 
		$output = $crud->render();
		$this->_example_output($output);
	}else{
			redirect('/Admin');
	}

	}

	function update_sickness_metatages($post_array){
		$title = $post_array['commonName']; 
		$pageName = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-',$title)));
		$response = $this->Sickness_model->update_sickness_metatags($title);
		if(count($response) > 0){
			$data = array(
				'pageName' => $pageName,
			);
			$this->db->where("title like '".addslashes($title)."' ");
			$this->db->update('metatags', $data);
		}else{
			$data = array( 
				'pageName' => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-',$title))),
				'title' => $title); 
			$this->db->insert('metatags', $data); 
		}
        return true;
	}

	function insert_sickness_metatages($post_array){

		$title = $post_array['commonName']; 
		$data = array( 
			'pageName' => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-',$title))),
			'title' => $title); 
		$this->db->insert('metatags', $data); 
		return true;

	}


// public function questionCategory() { $output = $this->grocery_crud->render();

// $this->_category_output($output);
// }

public function questionCategory() { $crud = new grocery_CRUD();

	if(!empty($this->session->userdata('admin_login')['is_admin'])){
	$crud->set_table('questioncategory');
	$crud->set_subject('Question Category');
	$output = $crud->render();
	$this->_example_output($output);
	}else{
			redirect('/Admin');
	}
}

public function disclaimer() { 
	if(!empty($this->session->userdata('admin_login')['is_admin'])){
	$this->grocery_crud->required_fields('title', 'body', 'shortName', 'legalVettingName');
	$output = $this->grocery_crud->render();
	$this->_example_output($output);
	}else{
			redirect('/Admin');
	}
}

/*public function homePage() { $output = $this->grocery_crud->render();

$this->_category_output($output);
}*/


public function homePage() { 
	if(!empty($this->session->userdata('admin_login')['is_admin'])){

	$crud = new grocery_CRUD();
	$crud->set_table('homepage');
	$crud->set_subject('Home Page');
	$crud->required_fields('mission', 'bannerText', 'videoUrl', 'qualityPromise');
	$output = $crud->render();
	$this->_example_output($output);
	}else{
			redirect('/Admin');
	}
}

public function adminTable() {
	if(!empty($this->session->userdata('admin_login')['is_admin'])){

		$crud = new grocery_CRUD();
		$crud->field_type('idadmin', 'hidden');
		$crud->set_table('admin');
		$crud->required_fields('name','surname','username','email','password');
		$crud->change_field_type('password', 'password');
		$crud->callback_before_insert(array($this,'encrypt_pw'));
		$crud->callback_before_update(array($this,'encrypt_pw'));
		$output = $crud->render();
		$this->_example_output($output);
	}else{
		redirect('/Admin');
	}
}


/*public function dosageUnit() { $output = $this->grocery_crud->render();

$this->_category_output($output);
}*/

public function dosageUnit() { $crud = new grocery_CRUD();
	if(!empty($this->session->userdata('admin_login')['is_admin'])){

	$crud->set_table('dosageunit');
	$crud->set_subject('Dosage Unit');
	$crud->required_fields('unitName', 'unitShortName');
	$output = $crud->render();
	$this->_example_output($output);
	}else{
			redirect('/Admin');
	}
}

public function duration() { 
if(!empty($this->session->userdata('admin_login')['is_admin'])){
	 $this->grocery_crud->required_fields('unit');
	$output = $this->grocery_crud->render();

	$this->_example_output($output);
	}else{
			redirect('/Admin');
	}
}

public function aboutUs() { 
		if(!empty($this->session->userdata('admin_login')['is_admin'])){
			$crud = new grocery_CRUD();

			$crud->set_table('aboutus');
			$crud->set_subject('About Us');
		    $crud->field_type('idaboutUs', 'hidden');
			$crud->required_fields('bodyText');
			$output = $crud->render();
			$this->_example_output($output);
		}else{
			redirect('/Admin');
		}
}

public function remedy() {
if(!empty($this->session->userdata('admin_login')['is_admin'])){

	$crud = new grocery_CRUD();
	$crud->set_table('remedy');
	$crud->set_subject('Remedies');
	$crud->required_fields('type', 'name','shortName');
	$crud->field_type('link', 'hidden');
	$crud->set_field_upload('picture','assets/uploads/remedy');
	$crud->callback_after_insert(array($this,'insert_remedy_link')); 
	$crud->callback_after_update(array($this,'insert_remedy_link')); 
// $crud->columns('type','name','shortName','link', 'picture');
// $crud->fields('type','name','shortName','link', 'picture','expertAdvice');
	$crud->field_type('type','dropdown',array('1' => 'Supplement', '2' => 'Activity','3' => 'Other','4' => 'Unclassified' ));


	$output = $crud->render();

	$this->_example_output($output);
	}else{
			redirect('/Admin');
	}
}

	function insert_remedy_link($post_array){
		$name = $post_array['name']; 
		$link = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-',$name)));
			$data = array(
				'link' => $link,
			);
			$this->db->where("name like '".addslashes($name)."' ");
			$this->db->update('remedy', $data);
		
        return true;
	}



public function _remedy_output($output = null) {
if(!empty($this->session->userdata('admin_login')['is_admin'])){

	$this->load->view('backEnd.php',(array)$output);
	}else{
			redirect('/Admin');
	}
}

public function availability() { 
if(!empty($this->session->userdata('admin_login')['is_admin'])){

	$crud = new grocery_CRUD();
	$crud->set_table('availability');
	$crud->set_subject('Availability');
	$crud->set_relation('remedy_idremedy','remedy','name');
	$crud->set_relation('country','countries','countryName');
	$crud->required_fields('country','state','localCommonName','localScientificName');
	$crud->display_as('remedy_idremedy','Remedy');
	$output = $crud->render();
	$this->_example_output($output);
	}else{
			redirect('/Admin');
	}

}

public function reliefType() { 
if(!empty($this->session->userdata('admin_login')['is_admin'])){

	$crud = new grocery_CRUD();
	$crud->set_table('relieftype');
	$crud->set_subject('ReliefType');
	$crud->required_fields('type');
	$output = $crud->render();
	$this->_example_output($output);
	}else{
			redirect('/Admin');
	}
}

public function article() {
if(!empty($this->session->userdata('admin_login')['is_admin'])){

	$crud = new grocery_CRUD();
	$crud->set_table('article');
	$crud->set_subject('Articles');
	$crud->set_relation('editor_idEditor','editor','{firstName} {surname}');
	$crud->set_relation('reviewerId','editor','{firstName} {surname}');
	$crud->set_relation('authorId','editor','{firstName} {surname}');
	$crud->set_field_upload('thumbnailImage','assets/uploads/article');
	$crud->display_as('reviewerId','Reviewer');
	$crud->display_as('authorId','Author');
	$crud->display_as('editor_idEditor','Editor');
	$crud->field_type('created_at', 'hidden',date('Y-m-d H:i:s'));
	$crud->field_type('articleUrl', 'hidden');
	$crud->required_fields('seo_title','seo_description','seo_keywords','articlepart');

// $crud->set_relation('seo_author','editor','surname');
	$crud->field_type('category','dropdown',array('1' => 'Supplement', '2' => 'Sickness'));
	$crud->set_relation_n_n('Featured_Remedies', 'featuredremedies', 'remedy', 'article_idarticle', 'remedy_idremedy', 'name');
	$crud->set_relation_n_n('Featured_Sicknesses', 'featuredsicknesses', 'sickness', 'article_idarticle', 'sickness_idsickness', 'commonName');
	$crud->callback_after_insert(array($this,'insert_article_url')); 
	$crud->callback_after_update(array($this,'insert_article_url')); 
	$output = $crud->render();
	$this->_example_output($output);
	}else{
			redirect('/Admin');
	}
}

	function insert_article_url($post_array){
		$seo_title = $post_array['seo_title']; 
		$link = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-',$seo_title)));
			$data = array(
				'articleUrl' => $link,
			);
			$this->db->where("seo_title like '".addslashes($seo_title)."' ");
			$this->db->update('article', $data);
		
        return true;
	}


public function metaTags() {
if(!empty($this->session->userdata('admin_login')['is_admin'])){

	$crud = new grocery_CRUD();
	$crud->field_type('title', 'hidden');
	$crud->set_table('metatags');
	$crud->required_fields('pageName','title','description','keywords');
	$output = $crud->render();
	$this->_example_output($output);
	}else{
			redirect('/Admin');
	}
}



public function articleSuccess() {
if(!empty($this->session->userdata('admin_login')['is_admin'])){

	$crud = new grocery_CRUD();

	$crud->set_table('articlesuccess');

	$crud->set_subject('Article Sucess');
	$crud->set_relation('article_idarticle','article','seo_title');
	$crud->set_relation('user_iduser','user','{firstName} {lastName}',array('status' => '1'));
	$crud->display_as('user_iduser','User Name');
	$crud->display_as('article_idarticle','Article Name');
	$crud->required_fields('sucessRating','article_idarticle');
	$crud->field_type('sucessRating','dropdown',array('1' => 'Yes', '2' => 'No'));
	$output = $crud->render();
	$this->_example_output($output);
	}else{
			redirect('/Admin');
	}
}

public function editor() { 
if(!empty($this->session->userdata('admin_login')['is_admin'])){

	$crud = new grocery_CRUD();
	$crud->set_table('editor');
	$crud->field_type('role','dropdown', array('1' =>	'Writer', '2' => 'Reviewer'));
	$crud->set_field_upload('profilePic','assets/uploads/editors/writers');
    $crud->change_field_type('password', 'password');
    $crud->callback_before_insert(array($this,'encrypt_pw'));
    $crud->callback_before_update(array($this,'encrypt_pw'));
	$crud->required_fields('firstName','surname','title','bio','education','role','profilePic','username','password','email');
     $crud->unique_fields(array('username','email'));
	$output = $crud->render();
	$this->_example_output($output);
	}else{
			redirect('/Admin');
	}
}

function encrypt_pw($post_array) {
	    if(!empty($post_array['password'])) {
			    $post_array['password'] = SHA1($_POST['password']);
	    }
	    return $post_array;
}

public function _category_output($output = null) {
if(!empty($this->session->userdata('admin_login')['is_admin'])){

	$this->load->view('backEnd.php',(array)$output);
	}else{
			redirect('/Admin');
	}
}

public function comment() { 
if(!empty($this->session->userdata('admin_login')['is_admin'])){

	$crud = new grocery_CRUD();
	$crud->set_table('comment');
	$crud->set_subject('Comments');
	$crud->set_relation('user_iduser','user','{firstName} {lastName}',array('status' => '1'));
	$crud->set_relation('testimony_idtestimony','testimony','idtestimony');
	$crud->display_as('user_iduser','user');
	$crud->display_as('testimony_idtestimony','Testimony id');
	$crud->field_type('datePosted', 'hidden', date('Y-m-d H:i:s'));
	$crud->callback_edit_field('editDate',array($this,'example_callback'));
	$crud->columns('comment','user_iduser','testimony_idtestimony');
	$crud->required_fields('comment');
	$output = $crud->render();
	$crud->render();

	$this->_example_output($output);
	}else{
			redirect('/Admin');
			
	}
}

public function questions() { 
if(!empty($this->session->userdata('admin_login')['is_admin'])){

	$crud = new grocery_CRUD();
	$crud->set_table('questions');
	$crud->columns('questionCategory_idquestionCategory','user_iduser','details','resolve');
	$crud->set_relation('user_iduser','user','{firstName} {lastName}',array('status' => '1'));
	$crud->set_subject('Questions');
	$crud->set_relation('questionCategory_idquestionCategory','questioncategory','name');
	$crud->display_as('questionCategory_idquestionCategory','Question Category');
	$crud->display_as('user_iduser','User');
	$output = $crud->render();
	$this->_example_output($output);
	}else{
			redirect('/Admin');
	}
}


public function brands() {
if(!empty($this->session->userdata('admin_login')['is_admin'])){
	$crud = new grocery_CRUD();
	$crud->set_table('brands');
	$crud->required_fields('name');
	$output = $crud->render();
	$this->_example_output($output);
}else{
			redirect('/Admin');
	}
}

public function testimony() {
if(!empty($this->session->userdata('admin_login')['is_admin'])){

	$crud = new grocery_CRUD();
	$crud->set_table('testimony');
	$crud->set_subject('Testimonies');
	$crud->set_relation('user_iduser','user','{screenName}',array('status' => '1'));
	$crud->set_relation('remedy_idremedy','remedy','name');
	$crud->set_relation('relief_idrelief','relieftype','type');
	$crud->set_relation('sickness_idsickness','sickness','commonName');
	$crud->set_relation('country','countries',' {countryName} {countryCode}');
	$crud->set_relation('dosage','dosageunit',' {unitName} {unitShortName}');
	$crud->field_type('administeredTo','dropdown',array('1' => 'Self', '2' => 'Patient','3' => 'Other' ));
	$crud->field_type('administeredBy','dropdown',array('1' => 'Self', '2' => 'Medical Doctor','3' => 'Other' ));
	$crud->field_type('overallExperience','dropdown',array('1' => 'Positive', '2' => 'Negative' , '3' => 'No Effect'));
	$crud->set_relation_n_n('Specific_Brands', 'citedbrands', 'brands', 'testimony_idtestimony', 'brands_idbrands', 'name');
	$crud->set_relation_n_n('Additional_Remedies', 'additionalremedy', 'remedy', 'testimony_idtestimony', 'remedy_idremedy', 'name');
	$crud->field_type('date', 'hidden',date('Y-m-d H:i:s'));
	$crud->display_as('user_iduser','User Name');
	$crud->display_as('remedy_idremedy','Remedy name');
	$crud->display_as('relief_idrelief','Relief Type');
	$crud->display_as('sickness_idsickness','Sickness Name');
	$crud->required_fields('sickness_idsickness','remedy_idremedy','relief_idrelief','story','dosage','expertComment');
	$crud->field_type('theme','dropdown',array('1' => 'Supplement', '2' => 'Sickness','3' => 'Other' ));
	$output = $crud->render();

	$this->_example_output($output);
	}else{
			redirect('/Admin');
	}
}

// public function featuredRemedies() { $crud = new grocery_CRUD();
//
// 	$crud->set_table('Featured Remedies');
//
// 	$crud->set_subject('Articles');
// 	$crud->set_relation('editor_idmgmt','editor','surname');
// 	$crud->field_type('theme','dropdown',array('1' => 'Supplement', '2' => 'Sickness'));
// 	$output =	$this->grocery_crud->render();
//
// 	$this->_category_output($output);
// }

public function user() {
if(!empty($this->session->userdata('admin_login')['is_admin'])){

	$crud = new grocery_CRUD();
	$crud->set_table('user');
	$crud->set_subject('Users');
	$crud->fields('firstName','lastName','screenName','Address','Country','City','email','password','mobileNo','status','dateReg','dob','gender');
	$crud->required_fields('firstName', 'lastName', 'screenName', 'Country', 'email');
	$crud->set_relation('Country','countries',' {countryName} {countryCode}');
	$crud->set_relation('City','states',' {state_name}');
	$crud->field_type('status','dropdown',array('1' => 'Approved', '2' => 'Pending','3' => 'Closed' ));
	$crud->field_type('gender','dropdown',array('1' => 'Male', '2' => 'Female','3' => 'Undisclosed' ));
	$crud->change_field_type('password', 'password');
    $crud->callback_before_insert(array($this,'encrypt_pw'));
    $crud->callback_before_update(array($this,'encrypt_pw'));
     $crud->unique_fields(array('screenName','email'));
	$output = $crud->render();

	$this->_example_output($output);

}else{
			redirect('/Admin');
	}
}


public function _example_output($output = null) {
	$this->load->view('admin/index',(array)$output);
}

}

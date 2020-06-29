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
		$this->table = 'user';


	}
	public function index()
	{
		if(!empty($this->session->userdata('admin_login')['is_admin'])){
			$this->load->view('admin/index');
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
		$this->load->view('admin/index');
	}




public function sickness() {
        $crud = new grocery_CRUD();
	    $crud->set_table('sickness');
		$crud->set_subject('Sickness');
		$crud->set_field_upload('ThumnailImage','assets/uploads/sickness');
		$output = $crud->render();
		$this->_example_output($output);


	}

	/*public function questionCategory() { $output = $this->grocery_crud->render();

		$this->_category_output($output);
	}*/

	public function questionCategory() { $crud = new grocery_CRUD();
		$crud->set_table('questioncategory');
		$crud->set_subject('Question Category');
		$output = $crud->render();
		$this->_example_output($output);
	}

	public function disclaimer() { $output = $this->grocery_crud->render();

		$this->_example_output($output);
	}

	/*public function homePage() { $output = $this->grocery_crud->render();

		$this->_category_output($output);
	}*/


	public function homePage() { $crud = new grocery_CRUD();
		$crud->set_table('homepage');
		$crud->set_subject('Home Page');
		$output = $crud->render();
		$this->_example_output($output);
	}

	/*public function dosageUnit() { $output = $this->grocery_crud->render();

		$this->_category_output($output);
	}*/

	public function dosageUnit() { $crud = new grocery_CRUD();
		$crud->set_table('dosageunit');
		$crud->set_subject('Dosage Unit');
		$output = $crud->render();
		$this->_example_output($output);
	}

	public function duration() { $output = $this->grocery_crud->render();

		$this->_example_output($output);
	}

	public function remedy() {
		$crud = new grocery_CRUD();
		$crud->set_table('remedy');
		$crud->set_subject('Remedies');
		$crud->required_fields('type', 'name');
		$crud->set_field_upload('picture','assets/uploads/remedy');
		// $crud->columns('type','name','shortName','link', 'picture');
		// $crud->fields('type','name','shortName','link', 'picture','expertAdvice');
		$crud->field_type('type','dropdown',array('1' => 'Supplement', '2' => 'Activity','3' => 'Other','4' => 'Unclassified' ));


		$output = $crud->render();

			$this->_example_output($output);
	}

	public function _remedy_output($output = null) {
		$this->load->view('backEnd.php',(array)$output);
	}

	public function availability() { 

		$crud = new grocery_CRUD();
		$crud->set_table('availability');
		$crud->set_subject('Availability');
		$crud->set_relation('remedy_idremedy','remedy','name');
		$crud->set_relation('country','countries','countryName');
		$crud->display_as('remedy_idremedy','Remedy');
		 $output = $crud->render();
 		$this->_example_output($output);

	}

	public function reliefType() { 
		$crud = new grocery_CRUD();
		$crud->set_table('relieftype');
		$crud->set_subject('ReliefType');
		 $output = $crud->render();
 		$this->_example_output($output);
	}

	public function article() {
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

			// $crud->set_relation('seo_author','editor','surname');
		$crud->field_type('category','dropdown',array('1' => 'Supplement', '2' => 'Sickness'));
		 $crud->set_relation_n_n('Featured_Remedies', 'featuredRemedies', 'remedy', 'article_idarticle', 'remedy_idremedy', 'name');
		 $crud->set_relation_n_n('Featured_Sicknesses', 'featuredSicknesses', 'sickness', 'article_idarticle', 'sickness_idsickness', 'commonName');
		 $output = $crud->render();
 		$this->_example_output($output);
	}

	public function metaTags() {
		$crud = new grocery_CRUD();
		$crud->set_table('metatags');
		$output = $crud->render();
 	$this->_example_output($output);
	}



	public function articleSuccess() {
		$crud = new grocery_CRUD();

		$crud->set_table('articlesuccess');

		$crud->set_subject('Article Sucess');
		$crud->set_relation('article_idarticle','article','seo_title');
		$crud->set_relation('user_iduser','user','{firstName} {lastName}');
		$crud->display_as('user_iduser','User Name');
		$crud->display_as('article_idarticle','Article Name');

			$crud->field_type('sucessRating','dropdown',array('1' => 'Yes', '2' => 'No'));
			$output = $crud->render();
	 	$this->_example_output($output);
	}

	public function editor() { $crud = new grocery_CRUD();
		$crud->set_table('editor');
		$crud->field_type('role','dropdown', array('1' =>	'Writer', '2' => 'Reviewer'));
		$crud->set_field_upload('profilePic','assets/uploads/editors/writers');

		$output = $crud->render();
 	$this->_example_output($output);
	}

	public function _category_output($output = null) {
		$this->load->view('backEnd.php',(array)$output);
	}

	public function comment() { $crud = new grocery_CRUD();
		$crud->set_table('comment');
		$crud->set_subject('Comments');
	    $crud->set_relation('user_iduser','user','{firstName} {lastName}');
	    $crud->set_relation('testimony_idtestimony','testimony','idtestimony');
		$crud->display_as('user_iduser','user');
		$crud->display_as('testimony_idtestimony','Testimony id');
	    $crud->field_type('datePosted', 'hidden', date('Y-m-d H:i:s'));
	    $crud->callback_edit_field('editDate',array($this,'example_callback'));
		$output = $crud->render();
		$crud->render();

		$this->_example_output($output);
	}

	public function questions() { $crud = new grocery_CRUD();
		$crud->set_table('questions');
		$crud->columns('QuestionCategory	idquestionCategory','DateTime','Resolve');
		$crud->set_subject('Questions');
		$crud->set_relation('questionCategory_idquestionCategory','questionCategory','name');
		$output = $crud->render();
		$this->_example_output($output);
	}

    public function brands() {

		$crud = new grocery_CRUD();
		$crud->set_table('brands');
		$output = $crud->render();
 	$this->_example_output($output);

    }

	public function testimony() {
		$crud = new grocery_CRUD();
		$crud->set_table('testimony');
		$crud->set_subject('Testimonies');
		$crud->set_relation('user_iduser','user','{firstName} {lastName}');
		$crud->set_relation('remedy_idremedy','remedy','name');
		$crud->set_relation('relief_idrelief','relieftype','type');
		$crud->set_relation('sickness_idsickness','sickness','commonName');
		$crud->set_relation('country','countries',' {countryName} {countryCode}');
		$crud->field_type('administeredTo','dropdown',array('1' => 'Self', '2' => 'Patient','3' => 'Other' ));
		$crud->field_type('administeredBy','dropdown',array('1' => 'Self', '2' => 'Medical Doctor','3' => 'Other' ));
		$crud->field_type('overallExperience','dropdown',array('1' => 'Positive', '2' => 'Negative'));
		$crud->set_relation_n_n('Specific_Brands', 'citedBrands', 'brands', 'testimony_idtestimony', 'brands_idbrands', 'name');
		$crud->set_relation_n_n('Additional_Remedies', 'additionalRemedy', 'remedy', 'testimony_idtestimony', 'remedy_idremedy', 'name');
	    $crud->field_type('date', 'hidden',date('Y-m-d H:i:s'));
		$crud->display_as('user_iduser','User Name');
		$crud->display_as('remedy_idremedy','Remedy name');
		$crud->display_as('relief_idrelief','Relief Type');
		$crud->display_as('sickness_idsickness','Sickness Name');
		$crud->field_type('theme','dropdown',array('1' => 'Supplement', '2' => 'Sickness','3' => 'Other' ));
		$output = $crud->render();

		$this->_example_output($output);
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
		$crud = new grocery_CRUD();
		$crud->set_table('user');
		$crud->set_subject('Users');
		$crud->required_fields('firstName', 'lastName', 'screenName', 'Country', 'email');
		$crud->set_relation('Country','countries',' {countryName} {countryCode}');
		$crud->field_type('status','dropdown',array('1' => 'Approved', '2' => 'Pending','3' => 'Closed' ));
	$crud->field_type('gender','dropdown',array('1' => 'Male', '2' => 'Female','3' => 'Undisclosed' ));
	$output = $crud->render();

		$this->_example_output($output);

	}


	public function _example_output($output = null) {
		$this->load->view('admin/index',(array)$output);
	}

}

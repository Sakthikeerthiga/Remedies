<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BackEnd extends CI_Controller {

	function __construct() {
		parent::__construct();


		/* Standard Codeigniter Libraries */
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('grocery_CRUD');

	}





	public function sickness() { $output = $this->grocery_crud->render();

		$this->_example_output($output);
	}

	public function questionCategory() { $output = $this->grocery_crud->render();

		$this->_category_output($output);
	}

	public function disclaimer() { $output = $this->grocery_crud->render();

		$this->_category_output($output);
	}

	public function homePage() { $output = $this->grocery_crud->render();

		$this->_category_output($output);
	}

	public function dosageUnit() { $output = $this->grocery_crud->render();

		$this->_category_output($output);
	}

	public function duration() { $output = $this->grocery_crud->render();

		$this->_category_output($output);
	}

	public function remedy() {
		$crud = new grocery_CRUD();
		$crud->set_table('remedy');
		$crud->set_subject('Remedies');
		$crud->required_fields('type', 'name');
		// $crud->columns('type','name','shortName','link', 'picture');
		// $crud->fields('type','name','shortName','link', 'picture','expertAdvice');
		$crud->field_type('type','dropdown',array('1' => 'Supplement', '2' => 'Activity','3' => 'Other','4' => 'Unclassified' ));


		$output = $crud->render();

			$this->_example_output($output);
	}

	public function _remedy_output($output = null) {
		$this->load->view('backEnd.php',(array)$output);
	}

	public function availability() { $output = $this->grocery_crud->render();

		$this->_category_output($output);
	}

	public function reliefType() { $output = $this->grocery_crud->render();

		$this->_category_output($output);
	}

	public function article() {
		$crud = new grocery_CRUD();
		$crud->set_table('article');
		$crud->set_subject('Articles');
		$crud->set_relation('editor_idEditor','editor','surname');
		$crud->set_relation('reviewerId','editor','surname');
			$crud->set_relation('authorId','editor','surname');
			// $crud->set_relation('seo_author','editor','surname');
		$crud->field_type('category','dropdown',array('1' => 'Supplement', '2' => 'Sickness'));
		 $crud->set_relation_n_n('Featured_Remedies', 'featuredRemedies', 'remedy', 'article_idarticle', 'remedy_idremedy', 'name');
		 $crud->set_relation_n_n('Featured_Sicknesses', 'featuredSicknesses', 'sickness', 'article_idarticle', 'sickness_idsickness', 'commonName');
		 $output = $crud->render();
 		$this->_example_output($output);
	}

	public function metaTags() {
		$crud = new grocery_CRUD();
		$crud->set_table('metaTags');
		$output = $crud->render();
 	$this->_example_output($output);
	}



	public function articleSuccess() {
		$crud = new grocery_CRUD();

		$crud->set_table('articleSuccess');

		$crud->set_subject('Article Sucess');
		$crud->set_relation('article_idarticle','article','HeadTitle');
		$crud->set_relation('user_iduser','user','{firstName} {lastName}');
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
		// $crud->set_relation('user_iduser','user','lastName');
		$output =
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

	public function testimony() {
		$crud = new grocery_CRUD();
		$crud->set_table('testimony');
		$crud->set_subject('Testimonies');

		$crud->set_relation('remedy_idremedy','remedy','name');
		$crud->set_relation('relief_idrelief','reliefType','type');
		$crud->set_relation('sickness_idsickness','sickness','commonName');
		$crud->set_relation('country','countries',' {countryName} {countryCode}');
		$crud->field_type('administeredTo','dropdown',array('1' => 'Self', '2' => 'Patient','3' => 'Other' ));
		$crud->field_type('administeredBy','dropdown',array('1' => 'Self', '2' => 'Medical Doctor','3' => 'Other' ));
		$crud->field_type('overallExperience','dropdown',array('1' => 'Positive', '2' => 'Negative'));
		$crud->set_relation_n_n('Specific_Brands', 'citedBrands', 'brands', 'testimony_idtestimony', 'brands_idbrands', 'name');
		$crud->set_relation_n_n('Additional_Remedies', 'additionalRemedy', 'remedy', 'testimony_idtestimony', 'remedy_idremedy', 'name');

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
		$this->load->view('admin/backEnd',(array)$output);
	}

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonial extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->model('Testimonial_model');
		$this->load->model('Article_model');
		$this->load->model('Login_model');
		$this->load->library('userlib');
		$this->load->library('email');


	}
	public function index()
	{
		$this->load->view('testimonial_index');
	}

// sickness testimonial list
	public function testimony_for_sickness($sicknessname='')
	{
		$sickness_name =$this->db->get_where('metatags', array('pageName' => $sicknessname))->row()->title;

		$sickness_id = $this->db->get_where('sickness', array('commonName' => $sickness_name))->row()->idsickness; 

		if($sickness_id!=''){
			$data['remedy_chart'] = $this->Article_model->sickness_remedy_chart_list($sickness_id);
			$data['relief_chart'] = $this->Article_model->sickness_relief_chart_list($sickness_id);
			$data['testimonial_details']= $this->Testimonial_model->sickness_testimony_list($sickness_id);
			$data['get_related_article'] = $this->Article_model->sickness_article_list($sickness_id);
			$data['related_comment'] = $this->Testimonial_model->get_sickrealted_main_comment($sickness_id);
			$data['additional_reply_comment'] = $this->Testimonial_model->get_sickrealted_additional_comment($sickness_id);
			$data['testimonial_heading'] = $sickness_name;
			$data['breadcrumb'] = 'Conditions';
			$data['breadcrumb_url'] = 'condition-list';
		}
		$this->load->view('testimonial_result_list', $data);
	}

// remedy testimonial list
	public function testimony_for_remedy($remedy_name='')
	{    
		$remedy_id = $this->db->get_where('remedy', array('link' => $remedy_name))->row()->idremedy;
		$remedyName = $this->db->get_where('remedy', array('link' => $remedy_name))->row()->name;

		if($remedy_id!=''){
			$data['remedy_chart'] = $this->Article_model->relief_remedy_chart_list($remedy_id);
			$data['relief_chart'] = $this->Article_model->relief_relief_chart_list($remedy_id);
			$data['testimonial_details']= $this->Testimonial_model->remedy_testimony_list($remedy_id);
			$data['get_related_article'] = $this->Article_model->remedy_article_list($remedy_id);
			$data['related_comment'] = $this->Testimonial_model->get_remedyrealted_main_comment($remedy_id);
			$data['additional_reply_comment'] = $this->Testimonial_model->get_remedyrealted_additional_comment($remedy_id);
			$data['testimonial_heading'] = $remedyName;
			$data['breadcrumb'] = 'Remedies';
			$data['breadcrumb_url'] = 'remedies-list';
		}
		$this->load->view('testimonial_result_list', $data);
	}


	public function edit_testimony($id=''){
		if(!empty($this->session->userdata('logged_user')['user_id'])){
			$data['sickness'] = $this->Testimonial_model->sickness_data_list();
			$data['remedies'] = $this->Testimonial_model->remedy_data_list();
			$data['relief_type'] = $this->Testimonial_model->relief_data_list();
			$data['dosage_unit'] = $this->Testimonial_model->dosage_unit();
			$data['testimonial_details'] = $this->Testimonial_model->get_testimonial_detail($id);
			$this->load->view('edit_testimony',$data);
		}
	}


	public function update_testimony(){

		if (is_numeric($_POST['sickness_idsickness'])) { 

			$sickness_idsickness = $this->input->post('sickness_idsickness');

		}else{

			$sickness_name = $this->input->post('sickness_idsickness');
			$data = array(
				'commonName'=>$this->input->post('sickness_idsickness'),
				'scientificName'=>$this->input->post('sickness_idsickness')
			);
			$sickness_idsickness = $this->Testimonial_model->insert_sickness($data);

			$data_meta = array( 
				'pageName' => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-',$sickness_name))),
				'title' => $sickness_name); 
			$this->db->insert('metatags', $data_meta); 


		}

		if (is_numeric($_POST['remedy_idremedy'])) { 

			$remedy_idremedy = $this->input->post('remedy_idremedy');

		}else{

			$remedy_name = $this->input->post('remedy_idremedy');
			$data = array(
				'type'=> 4,
				'name'=>$remedy_name,
				'link'=>strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-',$remedy_name))),
			);
			$this->db->insert('remedy', $data); 
			$remedy_idremedy = $this->db->insert_id();

		}

		$user_id = $this->session->userdata('logged_user')['user_id'];
		$country = $this->Testimonial_model->get_county($user_id);
		$state = $this->Testimonial_model->get_state($user_id);
		$data = array(
			'date'=>date("Y-m-d h:i"),
			'user_iduser'=>$user_id,
			'sickness_idsickness'=>$sickness_idsickness,
			'remedy_idremedy'=> $remedy_idremedy,
			'relief_idrelief'=>$this->input->post('relief_idrelief'),
			'story'=>$this->input->post('story'),
			'dosage'=>$this->input->post('dosage'),
			'administeredTo'=>$this->input->post('administeredTo'),
			'administeredBy'=>$this->input->post('administeredBy'),
			'overallExperience' => $this->input->post('overallExperience'),
			'country'=>$country[0]->Country,
			'state'=> $state[0]->City,
			'warnings'=>$this->input->post('warnings'),
		);

		$this->db->where('idtestimony', $this->input->post('testimonial_id'));
		$this->db->update('testimony',$data);
		$sicknessid = $sickness_idsickness;
		$sickness_name = $this->db->get_where('sickness', array('idsickness' => $sickness_idsickness))->row()->commonName; 
		$sickness_slug = $this->db->get_where('metatags', array('title' => $sickness_name))->row()->pageName;
		if( $this->input->post('overallExperience') == 1){
			$update = $this->db->query("UPDATE trendingsearches SET positiveTestimonies = positiveTestimonies + 1 WHERE sickness_idsickness = $sicknessid");
		}

		$this->session->set_flashdata('testimonial_add_msg', 'Your story has been updated successfully.');
		redirect('condition/'.$sickness_slug);
	}

	public function add_testimony(){
		$data['sickness'] = $this->Testimonial_model->sickness_data_list();
		$data['remedies'] = $this->Testimonial_model->remedy_data_list();
		$data['relief_type'] = $this->Testimonial_model->relief_data_list();
		$data['dosage_unit'] = $this->Testimonial_model->dosage_unit();
		$this->load->view('add_testimony',$data);
	}

	public function save_testimony(){

		$editor_list = $this->Testimonial_model->get_editors();
		if (is_numeric($_POST['sickness_idsickness'])) { 

			$sickness_idsickness = $this->input->post('sickness_idsickness');

		}else{

			$sickness_name = $this->input->post('sickness_idsickness');
			$data = array(
				'commonName'=>$this->input->post('sickness_idsickness'),
				'scientificName'=>$this->input->post('sickness_idsickness')
			);
			$sickness_idsickness = $this->Testimonial_model->insert_sickness($data);

			$data_meta = array( 
				'pageName' => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-',$sickness_name))),
				'title' => $sickness_name); 
			$this->db->insert('metatags', $data_meta); 

// mail functionality
			foreach ($editor_list as $key => $editor) {

				$from    =  "info@best-remedies.com";
				$to      =  $editor->email;
				$subject = 'Notification For New sickness'; 
				$data = array('name' => $editor->firstName.' '.$editor->surname,'subject' => 'Notification For New sickness','message' => '
					<html> 
					<head> 
					<title>One new sickness was added by user</title> 
					</head> 
					<body> 
					<h1>Sickness Name : '.base_url().'condition/'.$this->input->post('sickness_idsickness').' </h1> 
					<br>
					</body> 
					</html>');
				$this->htmlmail($from,$to,$subject,$data);
			}

		}

		if (is_numeric($_POST['remedy_idremedy'])) { 

			$remedy_idremedy = $this->input->post('remedy_idremedy');

		}else{

			$remedy_name = $this->input->post('remedy_idremedy');
			$data = array(
				'type'=> 4,
				'name'=>$remedy_name,
				'link'=>strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-',$remedy_name))),
			);
			$this->db->insert('remedy', $data); 
			$remedy_idremedy = $this->db->insert_id();

// mail functionality
			foreach ($editor_list as $key => $editor) {

				$from    =  "info@best-remedies.com";
				$to      =  $editor->email;
				$subject = 'Notification For New Remedy'; 
				$data = array('name' => $editor->firstName.' '.$editor->surname,'subject' => 'Notification For New Remedy','message' => '
					<html> 
					<head> 
					<title>One new remedy was added by user</title> 
					</head> 
					<body> 
					<h1>Sickness Name : '.base_url().'condition/'.$remedy_name.' </h1> 
					<br>
					</body> 
					</html>');
				$this->htmlmail($from,$to,$subject,$data);
			}

		}


// register login users
		if(!empty($this->session->userdata('logged_user'))){
			$user_id = $this->session->userdata('logged_user')['user_id'];
			$country = $this->Testimonial_model->get_county($user_id);
			$state = $this->Testimonial_model->get_state($user_id);
			$data = array(
				'date'=>date("Y-m-d h:i"),
				'user_iduser'=>$user_id,
				'sickness_idsickness'=>$sickness_idsickness,
				'remedy_idremedy'=> $remedy_idremedy,
				'relief_idrelief'=>$this->input->post('relief_idrelief'),
				'story'=>$this->input->post('story'),
				'dosage'=>$this->input->post('dosage'),
				'administeredTo'=>$this->input->post('administeredTo'),
				'administeredBy'=>$this->input->post('administeredBy'),
				'overallExperience' => $this->input->post('overallExperience'),
				'country'=>$country[0]->Country,
				'state'=> $state[0]->City,
				'warnings'=>$this->input->post('warnings'),
			);

		}
// new user adding story
		else{

			$userdata = array(
				'firstName'=>$this->input->post('firstName'),
				'lastName'=>$this->input->post('lastName'),
				'screenName'=> $this->input->post('screenName'),
				'email'=> $this->input->post('email'),
				'password'=>sha1($this->input->post('password')),
				'status' => 2
			);
			$insertUser = $this->Login_model->insert_user($userdata);
// mail functionality

			$from    =  "info@best-remedies.com";
			$to      =  $this->input->post('email');
			$subject = 'Thank you for joining with us'; 
			$data = array('name' => $this->input->post('screenName'),'subject' => 'Please find your login details below','message' => '
				<html> 
				<head> 
				<title>Welcome to Best-Remedies</title> 
				</head> 
				<body> 
				<h1>Thanks you for joining with us!</h1> 
				<table style="text-align:left;width: 50%;"> 
				<tr> 
				<th style="width:100px;">Email:</th><td style="text-align:left;">'.$this->input->post('email').'</td> 
				</tr> 
				<tr > 
				<th style="width:100px;">Password:</th><td style="text-align:left;">'.$this->input->post('password').'</td> 
				</tr> 

				</table> 
				<p>Thank you a million times for taking the time to share you testimony! An email has been sent to the email address you provided for verification. Once you click
				on the link in there, your user account will automatically be created and your testimony be posted to the site. We would be immensely grateful if you could
				complete that last small step. Should you not confirm the email within the next 72 hours, the submitted data will unfortunately be deleted. This is so to ensure
				that the source of the data is indeed credible. We are sure that you are….just one small click and we should be good!</p>
				</body> 
				</html>');
			$this->htmlmail($from,$to,$subject,$data);


			if($insertUser){
				$data = array(
					'date'=>date("Y-m-d h:i"),
					'user_iduser'=>$insertUser,
					'sickness_idsickness'=>$sickness_idsickness,
					'remedy_idremedy'=> $remedy_idremedy,
					'relief_idrelief'=>$this->input->post('relief_idrelief'),
					'story'=>$this->input->post('story'),
					'dosage'=>$this->input->post('dosage'),
					'administeredTo'=>$this->input->post('administeredTo'),
					'administeredBy'=>$this->input->post('administeredBy'),
					'overallExperience' => $this->input->post('overallExperience'),
					'warnings'=>$this->input->post('warnings'),
				);
			}



		}
		$insertNewPost = $this->Testimonial_model->insert_testimonial_new_post($data);
		$sicknessid = $sickness_idsickness;
		$sickness_name = $this->db->get_where('sickness', array('idsickness' => $sickness_idsickness))->row()->commonName; 
		$sickness_slug = $this->db->get_where('metatags', array('title' => $sickness_name))->row()->pageName;
		if( $this->input->post('overallExperience') == 1){
			$update = $this->db->query("UPDATE trendingsearches SET positiveTestimonies = positiveTestimonies + 1 WHERE sickness_idsickness = $sicknessid");
		}
		if($this->email->send())
		{
			$this->session->set_flashdata('testimonial_add_msg', 'Your story has been added successfully.Please check your email for login credential');
			redirect('condition/'.$sickness_slug);
		}else{

			$this->session->set_flashdata('testimonial_add_msg', 'Your story has been added successfully.There was the problem in Mail sending.');
			redirect('condition/'.$sickness_slug);
		}

	}

	public function add_new_comment(){
		$data['user_iduser']=$_POST['user_iduser'];  
		$data['testimony_idtestimony']=$_POST['testimony_idtestimony']; 
		$data['comment'] = htmlspecialchars($_POST['comment']); 
		$data['datePosted'] = date("Y-m-d h:i");
		$res=$this->Testimonial_model->add_new_comment($data);
		$get_testimony_user_id = $this->Testimonial_model->get_testimony_user($_POST['testimony_idtestimony']);
		if($get_testimony_user_id[0]->user_iduser !=$_POST['user_iduser'] ){
			$logged_user = $this->Testimonial_model->get_user_name($_POST['user_iduser']);
            $logged_user_name = $logged_user[0]->screenName;
			//mail function
			$from    =  "info@best-remedies.com";
			$to      =  $get_testimony_user_id[0]->email;
			$subject = 'Notification For New Remedy'; 
			$data = array('name' => $get_testimony_user_id[0]->firstName.' '.$get_testimony_user_id[0]->lastName,'subject' => strtoupper($logged_user_name).'replied to your Post','message' => '
			<html> 
			<head> 
			<title>You have reply to your Post</title> 
			</head> 
			<body> 
			<h1>'.strtoupper($logged_user_name).'replied to your Post</h1> 
			<p><button type="button" class="btn btn-info">< a href="'.$_POST['location_url'].'" target="_blank">JOIN CONVERSATION</a></button>
			<br>
			</body> 
			</html>');
			$this->htmlmail($from,$to,$subject,$data);

		}
		if($res){  
			$get_comment = $this->Testimonial_model->get_main_command($_POST['testimony_idtestimony']);

			echo json_encode($get_comment);
		}  
		else{
			echo 'please contact admin';  
		}   
	}  

	public function add_reply_comment(){
		$data['user_iduser']=$_POST['user_iduser'];  
		$reply_user = $this->Testimonial_model->get_comment_user_name($_POST['idcomment']);
		if($reply_user[0]->user_iduser != $this->session->userdata('logged_user')['user_id']){
		$logged_user = $this->Testimonial_model->get_user_name($_POST['user_iduser']);
		$logged_user_name = $logged_user[0]->screenName;

		//mail function
		$from    =  "info@best-remedies.com";
		$to      =  $reply_user[0]->email;
		$subject = 'Notification For New Remedy'; 
		$data = array('name' => $reply_user[0]->firstName.' '.$reply_user[0]->lastName,'subject' => strtoupper($logged_user_name).'replied to your comment','message' => '
		<html> 
		<head> 
		<title>You have reply to your comment</title> 
		</head> 
		<body> 
		<h1>'.strtoupper($logged_user_name).'replied to your comment</h1> 
		<p><button type="button" class="btn btn-info">< a href="'.$_POST['location_url'].'" target="_blank">JOIN CONVERSATION</a></button>
		<br>
		</body> 
		</html>');
		$this->htmlmail($from,$to,$subject,$data);

		}
		$data['testimony_idtestimony']=htmlspecialchars($_POST['testimony_idtestimony']); 
		$data['comment'] = htmlspecialchars($_POST['comment']); 
		$data['comment_idcomment'] = htmlspecialchars($_POST['idcomment']); 
		$data['datePosted'] = date("Y-m-d h:i");
		$res=$this->Testimonial_model->add_reply_comment($data);
		if($res){  
			$get_comment = $this->Testimonial_model->get_additional_command($_POST['idcomment']);

			echo json_encode($get_comment);
		}  
		else{
			echo 'please contact admin';  
		}   
	}  

	public function htmlmail($from,$to,$subject,$data){
		$msg = $this->load->view('emails/new_user.php',$data,TRUE);
		$this->load->model('Email_model');
		$mail = $this->Email_model->send_mail($from,$to,$subject,$msg);
	}


}

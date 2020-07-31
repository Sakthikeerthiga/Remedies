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
			$page_name =  strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-',$sickness_name)));

			$data_meta = array( 
				'pageName' => $page_name,
				'title' => $sickness_name); 
			$this->db->insert('metatags', $data_meta); 

// mail functionality
			foreach ($editor_list as $key => $editor) {

				$from    =  "info@best-remedies.com";
				$to      =  $editor->email;
				$subject = 'Notification For New sickness'; 
				$mail_data = array('name' => $editor->firstName.' '.$editor->surname,'subject' => 'Notification For New sickness','message' => '
					<html> 
					<head> 
					<title>One new sickness was added by user</title> 
					</head> 
					<body> 
					<h1>Sickness Name :'.$sickness_name.' </h1>
					<p> Sickness URL : '.base_url().'condition/'.$page_name.' </p> 
					<br>
					</body> 
					</html>');
				$this->htmlmail($from,$to,$subject,$mail_data);
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
				$mail_data = array('name' => $editor->firstName.' '.$editor->surname,'subject' => 'Notification For New Remedy','message' => '
					<html> 
					<head> 
					<title>One new remedy was added by user</title> 
					</head> 
					<body> 
					<h1>Remedy Name : '.$remedy_name.' </hl>
					<p> Remedy URL : '.base_url().'remedy-testimony/'.strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-',$remedy_name))).' </p> 
					<br>
					</body> 
					</html>');
				$this->htmlmail($from,$to,$subject,$mail_data);
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
				'status' => 1
			);
			$insertUser = $this->Login_model->insert_user($userdata);
// mail functionality

			$from    =  "info@best-remedies.com";
			$to      =  $this->input->post('email');
			$subject = 'Thank you for joining with us'; 
			$mail_data = array('name' => $this->input->post('screenName'),'subject' => 'Please find your login details below','message' => '
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
			$this->htmlmail($from,$to,$subject,$mail_data);


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
		
		if($insertNewPost){
           $get_user_email = $this->db->get_where('user', array('iduser' => $insertUser))->row()->email;
           $userName = $this->db->get_where('user', array('iduser' => $insertUser))->row()->screenName;

		    $query = $this->db->get('admin');
			$ret = $query->row();
			$get_admin_email = $ret->email;
            // administeredBy
            if($this->input->post('administeredBy') == 1){
                $administeredBy = 'Self';
            }elseif($this->input->post('administeredBy') == 2){
                $administeredBy = 'Medical Doctor';
            }else{
                $administeredBy = 'Other';
            }

            // administeredTo
            if($this->input->post('administeredTo') == 1){
                $administeredTo = 'Self';
            }elseif($this->input->post('administeredTo') == 2){
                $administeredTo = 'Patient';
            }else{
                $administeredTo = 'Other';
            }
                  // experience
            if($this->input->post('overallExperience') == 1){
                $overallExperience = 'Positive';
            }elseif($this->input->post('overallExperience') == 2){
                $overallExperience = 'Negative';
            }else{
                $overallExperience = 'No Effect';
            }
            
           //dosage 
            $dosage_unit =  $this->db->get_where('dosageunit', array('iddosageUnit' => $this->input->post('dosage')))->row()->unitName;
            $relief_name =  $this->db->get_where('relieftype', array('idrelief' => $this->input->post('relief_idrelief')))->row()->type;
            $remedy_name =  $this->db->get_where('remedy', array('idremedy' => $remedy_idremedy))->row()->name;
            $sickeness_name =  $this->db->get_where('sickness', array('idsickness' => $sickness_idsickness ))->row()->commonName;


			$from    =  "info@best-remedies.com";
			$to      =  $get_user_email;
			$cc      =  $get_admin_email;
			$subject = 'Thank you for submitting your stories!! '; 
			$data = array('name' => $userName,'subject' => 'Thank you for submitting your story with us ','message' => '
				<html> 
				<head> 
				<title>Welcome to Best-Remedies</title> 
				</head> 
				<body> 
				<h1>Thank you for submitting your stories!!</h1> 
				<table style="text-align:left;width: 100%;"> 
				<tr> 
				<td style="width:100px;">Sickness:</th><td style="text-align:left;">'.$sickeness_name.'</td> 
				</tr> 
				<tr > 
				<td style="width:100px;">Remedy:</th><td style="text-align:left;">'.$remedy_name.'</td> 
				</tr> 
				<tr > 
				<td style="width:100px;">Relief:</th><td style="text-align:left;">'.$relief_name.'</td> 
				</tr> 
				<tr > 
				<td style="width:100px;">dosage:</th><td style="text-align:left;">'.$dosage_unit.'</td> 
				</tr> 
				<tr > 
				<td style="width:100px;">administeredTo:</th><td style="text-align:left;">'.$administeredTo.'</td> 
				</tr> 
				<tr > 
				<td style="width:100px;">administeredBy:</th><td style="text-align:left;">'.$administeredBy.'</td> 
				</tr> 
				<tr > 
				<td style="width:100px;">overallExperience:</th><td style="text-align:left;">'.$overallExperience.'</td>
				</tr> 
				<td style="width:100px;">warnings:</th><td style="text-align:left;">'.$this->input->post('warnings').'</td> 
				</tr> 
				<td style="width:100px;">story:</th><td style="text-align:left;">'.$this->input->post('story').'</td> 
				</tr> 
				</table> 
				<p>Thank you a million times for taking the time to share you testimony! </p>
				</body> 
				</html>');
			$this->htmlmail($from,$to,$subject,$data,$cc);
		}
		
		$sicknessid = $sickness_idsickness;
		$sickness_name = $this->db->get_where('sickness', array('idsickness' => $sickness_idsickness))->row()->commonName; 
		$sickness_slug = $this->db->get_where('metatags', array('title' => $sickness_name))->row()->pageName;

		if( $this->input->post('overallExperience') == 1){
			$update = $this->db->query("UPDATE trendingsearches SET positiveTestimonies = positiveTestimonies + 1 WHERE sickness_idsickness = $sicknessid");
		}
		
		
	    if($insertUser)
		{
			$this->session->set_flashdata('testimonial_add_msg', 'Your story has been added successfully.Please check your email for login credential');
			redirect('condition/'.$sickness_slug);
		}else{

			$this->session->set_flashdata('testimonial_add_msg', 'Your story has been added successfully.');
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
			$subject = 'you have received a comment to your post '; 
			$mail_data = array('name' => $get_testimony_user_id[0]->firstName.' '.$get_testimony_user_id[0]->lastName.'&nbsp;','subject' => ' You have reply to your comment','message' => '
			<html> 
			<head> 
			<title>You have reply to your Post</title> 
			</head> 
			<body> 
			<h1>'.strtoupper($logged_user_name).' replied to your Post</h1> 
			<p><a href="'.$_POST['location_url'].'" target="_blank"><button type="button" class="btn btn-primary" style="background-color:#5348f1;padding:10px;border:0px;color:#fff;">JOIN CONVERSATION</button></a></p>
			<br>
			</body> 
			</html>');
			$this->htmlmail($from,$to,$subject,$mail_data);

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
		$subject = 'you have received a comment to your post'; 
		$mail_data = array('name' => $reply_user[0]->firstName.' '.$reply_user[0]->lastName.'&nbsp;','subject' => 'You have reply to your comment','message' => '
		<html> 
		<head> 
		<title>You have reply to your comment</title> 
		</head> 
		<body> 
		<h1>'.strtoupper($logged_user_name).' replied to your comment</h1> 
	   	<p><a href="'.$_POST['location_url'].'" target="_blank"><button type="button" class="btn btn-primary" style="background-color:#5348f1;padding:10px;border:0px;color:#fff;">JOIN CONVERSATION</button></a></p>
		<br>
		</body> 
		</html>');
		$this->htmlmail($from,$to,$subject,$mail_data);

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
	
	 public function update_comment()
	 {
	 	$data = array('comment'=>$this->input->post('comment'));
	 	$this->db->where('idcomment', $this->input->post('comment_id'));
		$this->db->update('comment',$data);
		echo $this->input->post('testimony_id');

	 } 


}

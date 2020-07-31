<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sickness extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->model('Sickness_model');
		$this->load->model('Trending_search');


	}
	public function index()
	{
		$this->load->view('welcome_message');
	}

// home page search functionality
	public function search()
	{
		$searchTerm = $this->input->get('search_keyword');

		$response = $this->Sickness_model->ajax_sickness_search($searchTerm);

		echo json_encode($response);
	}

// list trending search section
	public function updatetrendingsearch()
	{
		$sickness_id = $this->input->post('sicknessid');
		$update = $this->db->query("UPDATE sickness SET searchCount = searchCount + 1 WHERE idsickness = $sickness_id");
		$checkexists = $this->db->get_where('trendingsearches', array('sickness_idsickness' => $sickness_id))->num_rows();
		$trendTitle = $this->db->get_where('sickness', array('idsickness' => $sickness_id))->row()->commonName;
		$trendPic = $this->db->get_where('sickness', array('idsickness' => $sickness_id))->row()->ThumnailImage;
		$Testimoniescnt = $this->db->get_where('testimony', array('sickness_idsickness' => $sickness_id))->num_rows();
		$homePage_id = $this->db->get('homepage')->row()->idhomePage;
		$slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-',$trendTitle)));
		$update_image = $this->db->query("UPDATE trendingsearches SET trendPic = '".$trendPic."' WHERE sickness_idsickness = $sickness_id");
if($checkexists == 0){ //Insert new sickness to trendingsearches table

	$data = array(
		'homePage_idhomePage' => $homePage_id,
		'trendTitle' => $trendTitle,
		'positiveTestimonies' => $Testimoniescnt,
		'url' => 'condition/'.$slug,
		'sickness_idsickness' => $sickness_id,
		'trendPic' => $trendPic,
	);
	$insertdata = $this->db->insert("trendingsearches",$data);
	$insert_id = $this->db->insert_id();

}

echo json_encode(array('status' => base_url().'condition/'.$slug));
exit();
}

// condition menu lsiting page
public function sicknesslist()
{
	$config = array();
	$config["base_url"] = base_url() . "condition-list";
	$config["total_rows"] = $this->Sickness_model->get_count();
	$config["per_page"] = 20;
	$config["uri_segment"] = 2;
	$config['display_pages'] = FALSE;
	$config['first_link'] = false;
	$config['last_link'] = false;
	$start = $config["per_page"] * (0-1);
	$config['full_tag_open'] = "<ul class='pagination pagination-primary align-items-center justify-content-between'>";
	$config['full_tag_close'] = '</ul>';


	$config['prev_link'] = '<li class="page-item mx-1"><span class="page-link btn btn-sm rounded-pill">PREVIOUS PAGE	</span></li>';


	$config['next_link'] = '<li class="page-item mx-1"><span class="page-link btn btn-sm rounded-pill active">NEXT PAGE</span></li>';



	$this->pagination->initialize($config);

	$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

	$data["links"] = $this->pagination->create_links();

	$data['sicknesslist']  = $this->Sickness_model->get_sickness_list($config["per_page"], $page);
	$data['pagination'] = $this->pagination->create_links();
	$data['current'] = $this->pagination->current_place();

	$this->load->view('sickness_list', $data);	


}

public function checksickness_list(){
	$sickness_list  = $this->Sickness_model->ajax_sickness_search($_POST["searchTerm"]);
	echo "<pre>";print_r($sickness_list);exit();
}
}

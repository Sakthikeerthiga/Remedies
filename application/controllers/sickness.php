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
		$Testimoniescnt = $this->db->get_where('testimony', array('sickness_idsickness' => $sickness_id))->num_rows();
		$homePage_id = $this->db->get('homepage')->row()->idhomePage;
		
		if($checkexists == 0){ //Insert new sickness to trendingsearches table
			$data = array(
				'homePage_idhomePage' => $homePage_id,
				'trendTitle' => $trendTitle,
				'positiveTestimonies' => $Testimoniescnt,
				'url' => 'testimony/'.$sickness_id,
				'sickness_idsickness' => $sickness_id,
				'trendPic' => 'ht-1.jpg',
			);
			$insertdata = $this->db->insert("trendingsearches",$data);
			$insert_id = $this->db->insert_id();
			
		}

		echo json_encode(array('status' => base_url().'testimony/'.$sickness_id));
        exit();
	}

// condition menu lsiting page
	public function sicknesslist()
	{
		$data['sicknesslist']  = $this->Sickness_model->get_sickness_list();
		$data['ad_after_sicknesslist']  = $this->Sickness_model->afterad_sickness_list();
		$this->load->view('sickness_list', $data);

	}
}

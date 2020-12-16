<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
		$this->session->set_userdata('site_lang', "english");
        $this->load->model("GlobalModel");
	}
	  
	public function index()
	{
		$data['services'] = $this->GlobalModel->getAll('services');
		$data['contact'] = $this->GlobalModel->getById('contact', 'IWICO01');
		$this->load->view('view_public_home', $data);
	}

	function switchLang($language = "") {
        $language = ($language != "") ? $language : "english";
        $this->session->set_userdata('site_lang', $language);
        redirect($_SERVER['HTTP_REFERER']);
	}
}

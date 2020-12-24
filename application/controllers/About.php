<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
        $this->load->model("GlobalModel");
	}

	public function index()
	{
		$language = $this->session->userdata('site_lang');
		if($language == "english" || $language == ""){
			$data['teams'] = $this->GlobalModel->getAll('teams');
			$data['about'] = $this->GlobalModel->getById('about', 'IWIABO2');
			$data['home'] = $this->GlobalModel->getById('homecontent', 'IWIHO002');
			$data['contact'] = $this->GlobalModel->getById('contact', 'IWICO01');
			$this->load->view('view_public_about', $data);
		}else{
			$data['teams'] = $this->GlobalModel->getAll('teams');
			$data['about'] = $this->GlobalModel->getById('about', 'IWIABO1');
			$data['home'] = $this->GlobalModel->getById('homecontent', 'IWIHO001');
			$data['contact'] = $this->GlobalModel->getById('contact', 'IWICO01');
			$this->load->view('view_public_about', $data);
		}
	}
}

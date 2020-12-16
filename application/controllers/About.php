<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
		$this->session->set_userdata('site_lang', "english");
        $this->load->model("GlobalModel");
	}

	public function index()
	{
		$data['teams'] = $this->GlobalModel->getAll('teams');
		$data['about'] = $this->GlobalModel->getById('about', 'IWIABO1');
		$data['contact'] = $this->GlobalModel->getById('contact', 'IWICO01');
		$this->load->view('view_public_about', $data);
	}
}

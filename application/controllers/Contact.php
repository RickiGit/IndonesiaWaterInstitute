<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
		$this->load->helper('captcha');
		$this->load->model("GlobalModel");
	}

	public function index()
	{
		$data['home'] = $this->GlobalModel->getById('homecontent', 'IWIHO001');
		$data['contact'] = $this->GlobalModel->getById('contact', 'IWICO01');
		$this->load->view('view_public_contact', $data);
	}
}

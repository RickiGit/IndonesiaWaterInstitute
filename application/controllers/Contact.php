<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
		$this->load->model("GlobalModel");
	}

	public function index()
	{
		$data['contact'] = $this->GlobalModel->getById('contact', 'IWICO01');
		$this->load->view('view_public_contact', $data);
	}
}

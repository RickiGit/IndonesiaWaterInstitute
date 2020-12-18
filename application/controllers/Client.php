<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
		$this->load->model("GlobalModel");
		$this->load->model("ClientModel");
	}

	public function index()
	{
		$data['country'] = $this->GlobalModel->getAll('country');
		$data['client'] = $this->ClientModel->getAllClient();
		$data['home'] = $this->GlobalModel->getById('homecontent', 'IWIHO001');
		$data['contact'] = $this->GlobalModel->getById('contact', 'IWICO01');
		$this->load->view('view_public_clients', $data);
	}
}

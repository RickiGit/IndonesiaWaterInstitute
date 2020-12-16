<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
		$this->load->model("GlobalModel");
	}

	public function index()
	{
		$data['contact'] = $this->GlobalModel->getById('contact', 'IWICO01');
		$this->load->view('view_public_media', $data);
	}

	public function book(){
		$data['contact'] = $this->GlobalModel->getById('contact', 'IWICO01');
		$data['books'] = $this->GlobalModel->getAllByColumn('book', 'type', '1');
		$this->load->view('view_public_media_book', $data);
	}

	public function journal(){
		$data['contact'] = $this->GlobalModel->getById('contact', 'IWICO01');
		$data['books'] = $this->GlobalModel->getAllByColumn('book', 'type', '2');
		$this->load->view('view_public_media_journal', $data);
	}
}

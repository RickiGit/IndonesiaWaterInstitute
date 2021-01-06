<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publication extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
		$this->load->library('form_validation');
		$this->load->helper('captcha');
		$this->load->library('session');

		$this->load->model("GlobalModel");
		$this->load->model("MediaModel");
    }

    public function book(){
		$language = $this->session->userdata('site_lang');
		if($language == "english" || $language == ""){
			$data['home'] = $this->GlobalModel->getById('homecontent', 'IWIHO002');
			$data['contact'] = $this->GlobalModel->getById('contact', 'IWICO01');
			$data['books'] = $this->GlobalModel->getAllByColumn('book', 'type', '1');
			$this->load->view('view_public_publication_book', $data);
		}else{
			$data['home'] = $this->GlobalModel->getById('homecontent', 'IWIHO001');
			$data['contact'] = $this->GlobalModel->getById('contact', 'IWICO01');
			$data['books'] = $this->GlobalModel->getAllByColumn('book', 'type', '1');
			$this->load->view('view_public_publication_book', $data);
		}
	}

	public function journal(){
		$language = $this->session->userdata('site_lang');
		if($language == "english" || $language == ""){
			$data['home'] = $this->GlobalModel->getById('homecontent', 'IWIHO002');
			$data['contact'] = $this->GlobalModel->getById('contact', 'IWICO01');
			$data['books'] = $this->GlobalModel->getAllByColumn('book', 'type', '2');
			$this->load->view('view_public_publication_journal', $data);
		}else{
			$data['home'] = $this->GlobalModel->getById('homecontent', 'IWIHO001');
			$data['contact'] = $this->GlobalModel->getById('contact', 'IWICO01');
			$data['books'] = $this->GlobalModel->getAllByColumn('book', 'type', '2');
			$this->load->view('view_public_publication_journal', $data);
		}
	}

	public function request($id){
		$vals = array(
			'word'          => rand(1,999999),
			'img_path'      => './assets/captcha/',
			'img_url'       => base_url('assets').'/captcha/',
			'img_width'     => '150',
			'img_height'    => 30,
			'word_length'   => 8,
			'colors'        => array(
				'background'     => array(255, 255, 255),
				'border'         => array(255, 255, 255),
				'text'           => array(0, 0, 0),
				'grid'           => array(255, 75, 100)
			)
		);

		$language = $this->session->userdata('site_lang');
		if($language == "english" || $language == ""){
			$data['captcha'] = create_captcha($vals);
			$data['home'] = $this->GlobalModel->getById('homecontent', 'IWIHO002');
			$data['contact'] = $this->GlobalModel->getById('contact', 'IWICO01');
			$data['book'] = $this->GlobalModel->getById('book', $id);
			$this->load->view('view_public_form_request', $data);
		}else{
			$data['captcha'] = create_captcha($vals);
			$data['home'] = $this->GlobalModel->getById('homecontent', 'IWIHO001');
			$data['contact'] = $this->GlobalModel->getById('contact', 'IWICO01');
			$data['book'] = $this->GlobalModel->getById('book', $id);
			$this->load->view('view_public_form_request', $data);
		}
	}

	public function sendrequest(){
		$bookid = $this->input->post('bookid');
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$company = $this->input->post('company');
		$position = $this->input->post('position');

        $data = array(
			'idbook' => $bookid,
			'name' => $name,
			'email' => $email,
			'phone' => $phone,
			'company' => $company,
			'position' => $position,
			'created' => date('Y-m-d H:i:s'),
			'createdby' => $name
		);

		$this->GlobalModel->insert('request', $data);

		$data['book'] = $this->GlobalModel->getById('book', $bookid);
		echo $data['book']['url'];
	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
		$this->load->library('form_validation');
		$this->load->helper('captcha');
		$this->load->library('session');
        $this->load->model("GlobalModel");
	}
	  
	public function index()
	{
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

		$data['captcha'] = create_captcha($vals);
		
		$language = $this->session->userdata('site_lang');
		if($language == "english" || $language == ""){
			$data['home'] = $this->GlobalModel->getById('homecontent', 'IWIHO002');
			$data['slide'] = $this->GlobalModel->getAllByColumn('slideheader', 'language', 1);
			$data['services'] = $this->GlobalModel->getAll('services');
			$data['contact'] = $this->GlobalModel->getById('contact', 'IWICO01');
			$data['client'] = $this->GlobalModel->getAll('client');
			$this->load->view('view_public_home', $data);
		}else{
			$data['home'] = $this->GlobalModel->getById('homecontent', 'IWIHO001');
			$data['slide'] = $this->GlobalModel->getAllByColumn('slideheader', 'language', 0);
			$data['services'] = $this->GlobalModel->getAll('services');
			$data['contact'] = $this->GlobalModel->getById('contact', 'IWICO01');
			$data['client'] = $this->GlobalModel->getAll('client');
			$this->load->view('view_public_home', $data);
		}
	}

	function switchLang($language = "") {
        $language = ($language != "") ? $language : "english";
        $this->session->set_userdata('site_lang', $language);
		redirect($_SERVER['HTTP_REFERER']);
	}
}

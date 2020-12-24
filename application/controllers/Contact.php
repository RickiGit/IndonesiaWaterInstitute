<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

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

		$language = $this->session->userdata('site_lang');
		if($language == "english" || $language == ""){
			$data['captcha'] = create_captcha($vals);
			$data['home'] = $this->GlobalModel->getById('homecontent', 'IWIHO002');
			$data['contact'] = $this->GlobalModel->getById('contact', 'IWICO01');
			$this->load->view('view_public_contact', $data);
		}else{
			$data['captcha'] = create_captcha($vals);
			$data['home'] = $this->GlobalModel->getById('homecontent', 'IWIHO001');
			$data['contact'] = $this->GlobalModel->getById('contact', 'IWICO01');
			$this->load->view('view_public_contact', $data);
		}

		
	}

	public function sendmessage(){
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$subject = $this->input->post('subject');
		$message = $this->input->post('message');
		$captcha = $this->input->post('captcha');
		$code = $this->input->post('code');

        $data = array(
			'name' => $name,
			'email' => $email,
			'subject' => $subject,
			'message' => $message,
			'isread' => 0,
			'created' => date('Y-m-d H:i:s'),
			'createdby' => $name
		);

		$this->GlobalModel->insert('inbox', $data);
		echo "Message Sent Successfully";
	}
}

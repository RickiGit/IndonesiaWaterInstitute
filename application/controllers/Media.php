<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
		$this->load->model("GlobalModel");
		$this->load->model("MediaModel");
	}

	public function news($page=0)
	{
		$jumlah_data = $this->MediaModel->totalData();

		$this->load->library('pagination');
		$config['base_url'] = base_url().'project/news';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 18;
		$config['use_page_numbers'] = TRUE;

		$config['full_tag_open']   = '<ul class="justify-content-center">';
		$config['full_tag_close']  = '</ul>';
		
		$config['first_link']      = 'First'; 
		$config['first_tag_open']  = '<li>';
		$config['first_tag_close'] = '</li>';
		
		$config['last_link']       = 'Last'; 
		$config['last_tag_open']   = '<li>';
		$config['last_tag_close']  = '</li>';
		
		$config['next_link']       = ' <i class="icofont-rounded-right"></i> '; 
		$config['next_tag_open']   = '<li>';
		$config['next_tag_close']  = '</li>';
		
		$config['prev_link']       = ' <i class="icofont-rounded-left"></i> '; 
		$config['prev_tag_open']   = '<li>';
		$config['prev_tag_close']  = '</li>';
		
		$config['cur_tag_open']    = '<li class="active"><a href="#">';
		$config['cur_tag_close']   = '</a></li>';
			
		$config['num_tag_open']    = '<li>';
		$config['num_tag_close']   = '</li>';

		$$page = $this->uri->segment(3);
		$this->pagination->initialize($config);	
		
		$language = $this->session->userdata('site_lang');
		if($language == "english" || $language == ""){
			$data['home'] = $this->GlobalModel->getById('homecontent', 'IWIHO002');
			$data['contact'] = $this->GlobalModel->getById('contact', 'IWICO01');
			$data['news'] = $this->MediaModel->getMedia('news', $config['per_page'], $page, 1);
			$this->load->view('view_public_media', $data);
		}else{
			$data['home'] = $this->GlobalModel->getById('homecontent', 'IWIHO001');
			$data['contact'] = $this->GlobalModel->getById('contact', 'IWICO01');
			$data['news'] = $this->MediaModel->getMedia('news', $config['per_page'], $page, 0);
			$this->load->view('view_public_media', $data);
		}
	}

	public function detail($title){
		$language = $this->session->userdata('site_lang');
		if($language == "english" || $language == ""){
			$data['news'] = $this->GlobalModel->getByName('news', 'title', rawurldecode($title));
			$data['home'] = $this->GlobalModel->getById('homecontent', 'IWIHO002');
			$data['contact'] = $this->GlobalModel->getById('contact', 'IWICO01');
			$this->load->view('view_public_media_news_detail', $data);
		}else{
			$data['news'] = $this->GlobalModel->getByName('news', 'title', rawurldecode($title));
			$data['home'] = $this->GlobalModel->getById('homecontent', 'IWIHO001');
			$data['contact'] = $this->GlobalModel->getById('contact', 'IWICO01');
			$this->load->view('view_public_media_news_detail', $data);
		}
	}

	public function event($page=0){
		$jumlah_data = $this->MediaModel->totalData();

		$this->load->library('pagination');
		$config['base_url'] = base_url().'project/event';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 15;
		$config['use_page_numbers'] = TRUE;

		$config['full_tag_open']   = '<ul class="justify-content-center">';
		$config['full_tag_close']  = '</ul>';
		
		$config['first_link']      = 'First'; 
		$config['first_tag_open']  = '<li>';
		$config['first_tag_close'] = '</li>';
		
		$config['last_link']       = 'Last'; 
		$config['last_tag_open']   = '<li>';
		$config['last_tag_close']  = '</li>';
		
		$config['next_link']       = ' <i class="icofont-rounded-right"></i> '; 
		$config['next_tag_open']   = '<li>';
		$config['next_tag_close']  = '</li>';
		
		$config['prev_link']       = ' <i class="icofont-rounded-left"></i> '; 
		$config['prev_tag_open']   = '<li>';
		$config['prev_tag_close']  = '</li>';
		
		$config['cur_tag_open']    = '<li class="active"><a href="#">';
		$config['cur_tag_close']   = '</a></li>';
			
		$config['num_tag_open']    = '<li>';
		$config['num_tag_close']   = '</li>';

		$$page = $this->uri->segment(3);
		$this->pagination->initialize($config);	
		
		$language = $this->session->userdata('site_lang');
		if($language == "english" || $language == ""){
			$data['home'] = $this->GlobalModel->getById('homecontent', 'IWIHO002');
			$data['contact'] = $this->GlobalModel->getById('contact', 'IWICO01');
			$data['event'] = $this->MediaModel->getMedia('events', $config['per_page'], $page, 1);
			$this->load->view('view_public_event', $data);
		}else{
			$data['home'] = $this->GlobalModel->getById('homecontent', 'IWIHO001');
			$data['contact'] = $this->GlobalModel->getById('contact', 'IWICO01');
			$data['event'] = $this->MediaModel->getMedia('events', $config['per_page'], $page, 0);
			$this->load->view('view_public_event', $data);
		}
	}

	public function detailevent($title){
		$language = $this->session->userdata('site_lang');
		if($language == "english" || $language == ""){
			$data['event'] = $this->GlobalModel->getByName('events', 'title', rawurldecode($title));
			$data['home'] = $this->GlobalModel->getById('homecontent', 'IWIHO002');
			$data['contact'] = $this->GlobalModel->getById('contact', 'IWICO01');
			$this->load->view('view_public_event_detail', $data);
		}else{
			$data['event'] = $this->GlobalModel->getByName('events', 'title', rawurldecode($title));
			$data['home'] = $this->GlobalModel->getById('homecontent', 'IWIHO001');
			$data['contact'] = $this->GlobalModel->getById('contact', 'IWICO01');
			$this->load->view('view_public_event_detail', $data);
		}
	}
}

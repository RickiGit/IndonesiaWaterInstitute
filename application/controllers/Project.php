<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('GlobalModel');
		$this->load->model('ProjectModel');
		$this->load->library("pagination");
	}

	public function index($page=0)
	{
		$jumlah_data = $this->ProjectModel->totalData();
		$this->load->library('pagination');
		$config['base_url'] = base_url().'project/page';
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

		$data['home'] = $this->GlobalModel->getById('homecontent', 'IWIHO001');
		$data['contact'] = $this->GlobalModel->getById('contact', 'IWICO01');
		$data['project'] = $this->ProjectModel->getProject($config['per_page'], $page);
		$this->load->view('view_public_project', $data);
	}

	public function page($page=0)
	{
		$jumlah_data = $this->ProjectModel->totalData();
		$this->load->library('pagination');
		$config['base_url'] = base_url().'project/page';
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
		$data['home'] = $this->GlobalModel->getById('homecontent', 'IWIHO001');
		$data['contact'] = $this->GlobalModel->getById('contact', 'IWICO01');
		$data['project'] = $this->ProjectModel->getProject($config['per_page'], $page);
		$this->load->view('view_public_project', $data);
	}

	public function detail($title){
		$data['recent'] = $this->ProjectModel->get10RecentProject();
		$data['project'] = $this->GlobalModel->getByName('projects', 'title', rawurldecode($title));
		$data['home'] = $this->GlobalModel->getById('homecontent', 'IWIHO001');
		$data['contact'] = $this->GlobalModel->getById('contact', 'IWICO01');
		$this->load->view('view_public_project_detail', $data);
	}
}

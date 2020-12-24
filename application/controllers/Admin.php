<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
        parent::__construct();

        $this->load->library('upload');
		$this->load->model("GlobalModel");
		$this->load->model("ClientModel");
		$this->load->model("AuthModel"); 
	}

	public function index()
	{
		$this->load->view('view_admin_login');
	}

	public function login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$data['user'] = $this->GlobalModel->getByName('user','email', $email);
		if($data['user'] != null || $data['user']['email'] != ""){
			if(password_verify($password, $data['user']['password'])){
				$data = array( 
					'id'		=> $data['user']['id'],
					'name'  	=> $data['user']['name'], 
					'email'     => $data['user']['email'],
					'level'		=> $data['user']['level'],
					'image'		=> $data['user']['image'],
					'logged_in' => TRUE
				);

				$this->session->set_userdata($data);  
				 
				echo "1";
			}else{
				echo "0";
			}
		}else{
			echo "2";
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('admin');
	}

	// Teams
	public function teams(){
		$user = $this->session->userdata('name');;
		if (!isset($user)) { redirect('admin'); }
		
		$data['total'] = $this->GlobalModel->getCount('inbox','isread', 0);
		$data['teams'] = $this->GlobalModel->getAll('teams');
		$this->load->view('view_admin_teams', $data);
	}

	public function createteams(){
		$data['total'] = $this->GlobalModel->getCount('inbox','isread', 0);
		$user = $this->session->userdata('name');
		if (!isset($user)) { redirect('admin'); }
		$this->load->view('view_admin_teams_create', $data);
	}

	public function insertteams(){
        $config['upload_path']          = './assets/images/teams/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['overwrite']			= true;

        $this->upload->initialize($config);
        $this->load->library('upload', $config);

		$name = $this->input->post('name');
		$position = $this->input->post('position');
		$graduate = $this->input->post('graduate');
		$facebook = $this->input->post('facebook');
		$twitter = $this->input->post('twitter');
		$instagram = $this->input->post('instagram');
		$linkedin = $this->input->post('linkedin');

        if (!$this->upload->do_upload('image'))
        {
            $error = $this->upload->display_errors();
            echo $error;
        }
        else
        {
            $data = array(
                'name' => $name,
				'position' => $position,
				'graduate' => $graduate,
				'facebook' => $facebook,
				'twitter' => $twitter,
				'instagram' => $instagram,
				'linkedin' => $linkedin,
                'images' => $this->upload->data("file_name"),
                'created' => date('Y-m-d H:i:s'),
                'createdby' => $this->session->userdata('name')
            );

            $this->GlobalModel->insert('teams', $data);
            echo "Data saved successfully";
        }
	}
	
	public function deleteteams($id){
        $data['item'] = $this->GlobalModel->getById('teams',$id);
        unlink(FCPATH.'assets/images/teams/'.$item['images']);

        $this->GlobalModel->delete('teams', $id);
        redirect('admin/teams');
	}
	
	public function editteams($id){
		$user = $this->session->userdata('name');
		if (!isset($user)) { redirect('admin'); }

		$data['total'] = $this->GlobalModel->getCount('inbox','isread', 0);
		$data['teams'] = $this->GlobalModel->getById('teams', $id);
		$this->load->view('view_admin_teams_edit', $data);
	}

	public function updateteams($id){
        $config['upload_path']          = './assets/images/teams/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['overwrite']			= true;

        $this->upload->initialize($config);
        $this->load->library('upload', $config);

        $name = $this->input->post('name');
		$position = $this->input->post('position');
		$graduate = $this->input->post('graduate');
		$facebook = $this->input->post('facebook');
		$twitter = $this->input->post('twitter');
		$instagram = $this->input->post('instagram');
		$linkedin = $this->input->post('linkedin');
        $currentImage = $this->input->post('currentimage');

        if (!empty($_FILES['image']['name'])) {
            if (!$this->upload->do_upload('image'))
            {
                $error = $this->upload->display_errors();
                echo $error;
            }
            else
            {
                $data = array(
                    'name' => $name,
					'position' => $position,
					'graduate' => $graduate,
					'facebook' => $facebook,
					'twitter' => $twitter,
					'instagram' => $instagram,
					'linkedin' => $linkedin,
					'images' => $this->upload->data("file_name"),
					'modified' => date('Y-m-d H:i:s'),
					'modifiedby' => $this->session->userdata('name')
                );

                if($currentImage != ""){
					unlink(FCPATH.'assets/images/teams/'.$currentImage);
				}
                $this->GlobalModel->update('teams', $data, $id);
                echo "Data changed successfully";
            }
        }else{
            $data = array(
				'name' => $name,
				'position' => $position,
				'graduate' => $graduate,
				'facebook' => $facebook,
				'twitter' => $twitter,
				'instagram' => $instagram,
				'linkedin' => $linkedin,
				'modified' => date('Y-m-d H:i:s'),
				'modifiedby' => $this->session->userdata('name')
			);

            $this->GlobalModel->update('teams', $data, $id);
            echo "Data changed successfully";
        }
	}
	
	// About
	public function about_id(){
		$user = $this->session->userdata('name');
		if (!isset($user)) { redirect('admin'); }

		$data['total'] = $this->GlobalModel->getCount('inbox','isread', 0);
		$data['about'] = $this->GlobalModel->getById('about', 'IWIABO1');
		$this->load->view('view_admin_about_edit', $data);
	}

	public function about_en(){
		$user = $this->session->userdata('name');
		if (!isset($user)) { redirect('admin'); }

		$data['total'] = $this->GlobalModel->getCount('inbox','isread', 0);
		$data['about'] = $this->GlobalModel->getById('about', 'IWIABO2');
		$this->load->view('view_admin_about_edit', $data);
	}

	public function updateabout($id){

		$vision = $this->input->post('vision');
		$mission = $this->input->post('mission');
		$strategy = $this->input->post('strategy');
		$history = $this->input->post('history');

        $data = array(
			'vision' => $vision,
			'mission' => $mission,
			'strategy' => $strategy,
			'history' => $history,
			'modified' => date('Y-m-d H:i:s'),
			'modifiedby' => $this->session->userdata('name')
		);

		$this->GlobalModel->update('about', $data, $id);
		echo "Data changed successfully";
	}

	// Contact
	public function contact(){
		$user = $this->session->userdata('name');
		if (!isset($user)) { redirect('admin'); }

		$data['total'] = $this->GlobalModel->getCount('inbox','isread', 0);
		$data['contact'] = $this->GlobalModel->getById('contact', 'IWICO01');
		$this->load->view('view_admin_contact_edit', $data);
	}

	public function updatecontact($id){

		$address = $this->input->post('address');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$fax = $this->input->post('fax');
		$facebook = $this->input->post('facebook');
		$twitter = $this->input->post('twitter');
		$instagram = $this->input->post('instagram');
		$linkedin = $this->input->post('linkedin');

        $data = array(
			'address' => $address,
			'email' => $email,
			'phone' => $phone,
			'fax' => $fax,
			'facebook' => $facebook,
			'twitter' => $twitter,
			'instagram' => $instagram,
			'linkedin' => $linkedin,
			'modified' => date('Y-m-d H:i:s'),
			'modifiedby' => $this->session->userdata('name')
		);

		$this->GlobalModel->update('contact', $data, $id);
		echo "Data changed successfully";
	}

	// Services
	public function services(){
		$user = $this->session->userdata('name');
		if (!isset($user)) { redirect('admin'); }

		$data['total'] = $this->GlobalModel->getCount('inbox','isread', 0);
		$data['services'] = $this->GlobalModel->getAll('services');
		$this->load->view('view_admin_services', $data);
	}

	public function createservices(){
		$user = $this->session->userdata('name');
		if (!isset($user)) { redirect('admin'); }

		$data['total'] = $this->GlobalModel->getCount('inbox','isread', 0);
		$this->load->view('view_admin_services_create', $data);
	}

	public function editservices($id){
		$user = $this->session->userdata('name');
		if (!isset($user)) { redirect('admin'); }

		$data['total'] = $this->GlobalModel->getCount('inbox','isread', 0);
		$data['service'] = $this->GlobalModel->getById('services', $id);
		$this->load->view('view_admin_services_edit', $data);
	}

	public function insertservices(){
		$name = $this->input->post('name');
		$description = $this->input->post('description');

        $data = array(
			'name' => $name,
			'description' => $description,
			'created' => date('Y-m-d H:i:s'),
			'createdby' => $this->session->userdata('name')
		);

		$this->GlobalModel->insert('services', $data);
		echo "Data saved successfully";
	}

	public function updateservices($id){

		$name = $this->input->post('name');
		$description = $this->input->post('description');

        $data = array(
			'name' => $name,
			'description' => $description,
			'modified' => date('Y-m-d H:i:s'),
			'modifiedby' => $this->session->userdata('name')
		);

		$this->GlobalModel->update('services', $data, $id);
		echo "Data changed successfully";
	}

	public function deleteservices($id){
        $data['item'] = $this->GlobalModel->getById('services',$id);
        $this->GlobalModel->delete('services', $id);
        redirect('admin/services');
	}

	// Project
	public function projects(){
		$user = $this->session->userdata('name');
		if (!isset($user)) { redirect('admin'); }

		$data['total'] = $this->GlobalModel->getCount('inbox','isread', 0);
		$data['projects'] = $this->GlobalModel->getAll('projects');
		$this->load->view('view_admin_project', $data);
	}

	public function createproject(){
		$user = $this->session->userdata('name');
		if (!isset($user)) { redirect('admin'); }

		$data['total'] = $this->GlobalModel->getCount('inbox','isread', 0);
		$this->load->view('view_admin_project_create', $data);
	}

	public function insertproject(){
		$config['upload_path']          = './assets/images/projectcover/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['overwrite']			= true;

        $this->upload->initialize($config);
        $this->load->library('upload', $config);

		$title = $this->input->post('title');
		$content = $this->input->post('contentdesc');
		$language = $this->input->post('language');
		$isactive = $this->input->post('status');

        if (!$this->upload->do_upload('image'))
        {
            $error = $this->upload->display_errors();
            echo $error;
        }
        else
        {
            $data = array(
                'title' => $title,
				'content' => $content,
				'totalview' => 0,
				'language' => $language,
				'isactive' => $isactive,
                'cover' => $this->upload->data("file_name"),
                'created' => date('Y-m-d H:i:s'),
                'createdby' => $this->session->userdata('name')
            );

            $this->GlobalModel->insert('projects', $data);
            echo "Data saved successfully";
        }
	}

	public function updatestatusproject($id, $status){

        $data = array(
			'isactive' => $status,
			'modified' => date('Y-m-d H:i:s'),
			'modifiedby' => $this->session->userdata('name')
		);

		$this->GlobalModel->update('projects', $data, $id);
		redirect('admin/projects');
	}

	public function deleteProject($id){
        $data['item'] = $this->GlobalModel->getById('projects',$id);
        $this->GlobalModel->delete('projects', $id);
        redirect('admin/projects');
	}

	public function editproject($id){
		$user = $this->session->userdata('name');
		if (!isset($user)) { redirect('admin'); }

		$data['total'] = $this->GlobalModel->getCount('inbox','isread', 0);
		$data['project'] = $this->GlobalModel->getById('projects', $id);
		$this->load->view('view_admin_project_edit', $data);
	}

	public function updateproject($id){
		$config['upload_path']          = './assets/images/projectcover/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['overwrite']			= true;

        $this->upload->initialize($config);
        $this->load->library('upload', $config);

        $title = $this->input->post('title');
		$content = $this->input->post('editcontentdesc');
		$language = $this->input->post('language');
		$isactive = $this->input->post('status');

        if (!empty($_FILES['image']['name'])) {
            if (!$this->upload->do_upload('image'))
            {
                $error = $this->upload->display_errors();
                echo $error;
            }
            else
            {
                $data = array(
                    'title' => $title,
					'content' => $content,
					'isactive' => $isactive,
					'language' => $language,
                	'cover' => $this->upload->data("file_name"),
					'modified' => date('Y-m-d H:i:s'),
					'modifiedby' => $this->session->userdata('name')
                );

                unlink(FCPATH.'assets/images/projectcover/'.$currentImage);
                $this->GlobalModel->update('projects', $data, $id);
                echo "Data changed successfully";
            }
        }else{
            $data = array(
				'title' => $title,
				'content' => $content,
				'language' => $language,
				'isactive' => $isactive,
				'modified' => date('Y-m-d H:i:s'),
				'modifiedby' => $this->session->userdata('name')
			);

            $this->GlobalModel->update('projects', $data, $id);
            echo "Data changed successfully";
        }
	}

	// Inbox
	public function inbox(){
		$user = $this->session->userdata('name');
		if (!isset($user)) { redirect('admin'); }

		$data['total'] = $this->GlobalModel->getCount('inbox','isread', 0);
		$data['inbox'] = $this->GlobalModel->getAll('inbox');
		$this->load->view('view_admin_inbox', $data);
	}

	public function updateinbox($id){

        $data = array(
			'isread' => 1,
			'modified' => date('Y-m-d H:i:s'),
			'modifiedby' => $this->session->userdata('name')
		);

		$this->GlobalModel->update('inbox', $data, $id);
		redirect('admin/inbox');
	}


	// Client Country
	public function country(){
		$user = $this->session->userdata('name');
		if (!isset($user)) { redirect('admin'); }

		$data['total'] = $this->GlobalModel->getCount('inbox','isread', 0);
		$data['country'] = $this->GlobalModel->getAll('country');
		$this->load->view('view_admin_country', $data);
	}

	public function createcountry(){
		$user = $this->session->userdata('name');
		if (!isset($user)) { redirect('admin'); }

		$data['total'] = $this->GlobalModel->getCount('inbox','isread', 0);
		$this->load->view('view_admin_country_create', $data);
	}

	public function insertcountry(){
		$name = $this->input->post('name');

        $data = array(
			'name' => $name,
			'created' => date('Y-m-d H:i:s'),
			'createdby' => $this->session->userdata('name')
		);

		$this->GlobalModel->insert('country', $data);
		echo "Data saved successfully";
	}

	public function editcountry($id){
		$user = $this->session->userdata('name');
		if (!isset($user)) { redirect('admin'); }

		$data['total'] = $this->GlobalModel->getCount('inbox','isread', 0);
		$data['country'] = $this->GlobalModel->getById('country', $id);
		$this->load->view('view_admin_country_edit', $data);
	}

	public function deletecountry($id){
        $data['item'] = $this->GlobalModel->getById('country',$id);
		$this->GlobalModel->delete('country', $id);
		$this->GlobalModel->deleteByColumn('client', $id, 'idcountry');
        redirect('admin/country');
	}

	public function updatecountry($id){

		$name = $this->input->post('name');

        $data = array(
			'name' => $name,
			'modified' => date('Y-m-d H:i:s'),
			'modifiedby' => $this->session->userdata('name')
		);

		$this->GlobalModel->update('country', $data, $id);
		echo "Data changed successfully";
	}

	// Client
	public function client(){
		$user = $this->session->userdata('name');
		if (!isset($user)) { redirect('admin'); }

		$data['total'] = $this->GlobalModel->getCount('inbox','isread', 0);
		$data['client'] = $this->ClientModel->getAllClient();
		$this->load->view('view_admin_client', $data);
	}

	public function createclient(){
		$user = $this->session->userdata('name');
		if (!isset($user)) { redirect('admin'); }

		$data['total'] = $this->GlobalModel->getCount('inbox','isread', 0);
		$data['country'] = $this->GlobalModel->getAll('country');
		$this->load->view('view_admin_client_create', $data);
	}

	public function deleteclient($id){
        $data['item'] = $this->GlobalModel->getById('client',$id);
		$this->GlobalModel->delete('client', $id);
        redirect('admin/client');
	}

	public function editclient($id){
		$user = $this->session->userdata('name');
		if (!isset($user)) { redirect('admin'); }

		$data['total'] = $this->GlobalModel->getCount('inbox','isread', 0);
		$data['client'] = $this->GlobalModel->getById('client', $id);
		$data['country'] = $this->GlobalModel->getAll('country');
		$this->load->view('view_admin_client_edit', $data);
	}

	public function insertclient(){
		$config['upload_path']          = './assets/images/clients/';
        $config['allowed_types']        = 'gif|jpg|png';
		$config['overwrite']			= true;

		$this->upload->initialize($config);
		$this->load->library('upload', $config);
		
		$name = $this->input->post('name');
		$idcountry = $this->input->post('country');

		if (!empty($_FILES['image']['name'])){
			if (!$this->upload->do_upload('image'))
			{
				$error = $this->upload->display_errors();
				echo $error;
			}else{
				$data = array(
					'name' => $name,
					'idcountry' => $idcountry,
					'image' => $this->upload->data("file_name"),
					'created' => date('Y-m-d H:i:s'),
					'createdby' => $this->session->userdata('name')
				);

				$this->GlobalModel->insert('client', $data);
				echo "Data saved successfully";
			}
		}else{
			$data = array(
				'name' => $name,
				'idcountry' => $idcountry,
				'image' => $this->upload->data("file_name"),
				'created' => date('Y-m-d H:i:s'),
				'createdby' => $this->session->userdata('name')
			);

			$this->GlobalModel->insert('client', $data);
			echo "Data saved successfully";
		}
		
	}

	public function updateclient($id){

		$config['upload_path']          = './assets/images/clients/';
        $config['allowed_types']        = 'gif|jpg|png';
		$config['overwrite']			= true;

		$this->upload->initialize($config);
		$this->load->library('upload', $config);

		$name = $this->input->post('name');
		$idcountry = $this->input->post('country');
		$currentImage = $this->input->post('currentimage');

		if (!empty($_FILES['image']['name'])) {
            if (!$this->upload->do_upload('image'))
            {
                $error = $this->upload->display_errors();
                echo $error;
            }
            else
            {
                $data = array(
                    'name' => $name,
					'idcountry' => $idcountry,
					'image' => $this->upload->data("file_name"),
					'modified' => date('Y-m-d H:i:s'),
					'modifiedby' => $this->session->userdata('name')
                );

                if($currentImage != ""){
					unlink(FCPATH.'assets/images/clients/'.$currentImage);
				}
                $this->GlobalModel->update('client', $data, $id);
                echo "Data changed successfully";
            }
        }else{
            $data = array(
				'name' => $name,
				'idcountry' => $idcountry,
				'modified' => date('Y-m-d H:i:s'),
				'modifiedby' => $this->session->userdata('name')
			);

            $this->GlobalModel->update('client', $data, $id);
            echo "Data changed successfully";
		}
	}

	// Book
	public function book(){
		$user = $this->session->userdata('name');
		if (!isset($user)) { redirect('admin'); }

		$data['total'] = $this->GlobalModel->getCount('inbox','isread', 0);
		$data['book'] = $this->GlobalModel->getAll('book');
		$this->load->view('view_admin_book', $data);
	}

	public function createbook(){
		$user = $this->session->userdata('name');
		if (!isset($user)) { redirect('admin'); }

		$data['total'] = $this->GlobalModel->getCount('inbox','isread', 0);
		$this->load->view('view_admin_book_create', $data);
	}

	public function editbook($id){
		$user = $this->session->userdata('name');
		if (!isset($user)) { redirect('admin'); }

		$data['total'] = $this->GlobalModel->getCount('inbox','isread', 0);
		$data['book'] = $this->GlobalModel->getById('book', $id);
		$this->load->view('view_admin_book_edit', $data);
	}

	public function deletebook($id){
        $data['item'] = $this->GlobalModel->getById('book',$id);
		$this->GlobalModel->delete('book', $id);
        redirect('admin/book');
	}

	public function insertbook(){
		$title = $this->input->post('title');
		$author = $this->input->post('author');
		$publisher = $this->input->post('publisher');
		$type = $this->input->post('type');

        $data = array(
			'title' => $title,
			'author' => $author,
			'publisher' => $publisher,
			'type' => $type,
			'created' => date('Y-m-d H:i:s'),
			'createdby' => $this->session->userdata('name')
		);

		$this->GlobalModel->insert('book', $data);
		echo "Data saved successfully";
	}

	public function updatebook($id){

		$title = $this->input->post('title');
		$author = $this->input->post('author');
		$publisher = $this->input->post('publisher');
		$type = $this->input->post('type');

        $data = array(
			'title' => $title,
			'author' => $author,
			'publisher' => $publisher,
			'type' => $type,
			'modified' => date('Y-m-d H:i:s'),
			'modifiedby' => $this->session->userdata('name')
		);

		$this->GlobalModel->update('book', $data, $id);
		echo "Data changed successfully";
	}

	// News
	public function news(){
		$user = $this->session->userdata('name');
		if (!isset($user)) { redirect('admin'); }

		$data['total'] = $this->GlobalModel->getCount('inbox','isread', 0);
		$data['news'] = $this->GlobalModel->getAll('news');
		$this->load->view('view_admin_news', $data);
	}

	public function createnews(){
		$user = $this->session->userdata('name');
		if (!isset($user)) { redirect('admin'); }

		$data['total'] = $this->GlobalModel->getCount('inbox','isread', 0);
		$this->load->view('view_admin_news_create', $data);
	}

	public function insertnews(){
		$config['upload_path']          = './assets/images/news/';
        $config['allowed_types']        = 'gif|jpg|png';
		$config['overwrite']			= true;

		$this->upload->initialize($config);
		$this->load->library('upload', $config);

		$title = $this->input->post('title');
		$content = $this->input->post('contentdesc');
		$language = $this->input->post('language');

        if (!$this->upload->do_upload('image'))
        {
            $error = $this->upload->display_errors();
            echo $error;
        }
        else
        {
            $data = array(
                'title' => $title,
				'content' => $content,
				'language' => $language,
                'cover' => $this->upload->data("file_name"),
                'created' => date('Y-m-d H:i:s'),
                'createdby' => $this->session->userdata('name')
            );

            $this->GlobalModel->insert('news', $data);
            echo "Data saved successfully";
        }
	}

	public function updatenews($id){
		$config['upload_path']          = './assets/images/news/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['overwrite']			= true;

        $this->upload->initialize($config);
        $this->load->library('upload', $config);

        $title = $this->input->post('title');
		$content = $this->input->post('editcontentdesc');
		$currentImage = $this->input->post('currentimage');
		$language = $this->input->post('language');

        if (!empty($_FILES['image']['name'])) {
            if (!$this->upload->do_upload('image'))
            {
                $error = $this->upload->display_errors();
                echo $error;
            }
            else
            {
                $data = array(
                    'title' => $title,
					'content' => $content,
					'language' => $language,
                	'cover' => $this->upload->data("file_name"),
					'modified' => date('Y-m-d H:i:s'),
					'modifiedby' => $this->session->userdata('name')
                );

                unlink(FCPATH.'assets/images/news/'.$currentImage);
                $this->GlobalModel->update('news', $data, $id);
                echo "Data changed successfully";
            }
        }else{
            $data = array(
				'title' => $title,
				'content' => $content,
				'language' => $language,
				'modified' => date('Y-m-d H:i:s'),
				'modifiedby' => $this->session->userdata('name')
			);

            $this->GlobalModel->update('news', $data, $id);
            echo "Data changed successfully";
        }
	}

	public function editnews($id){
		$user = $this->session->userdata('name');
		if (!isset($user)) { redirect('admin'); }

		$data['total'] = $this->GlobalModel->getCount('inbox','isread', 0);
		$data['news'] = $this->GlobalModel->getById('news', $id);
		$this->load->view('view_admin_news_edit', $data);
	}

	public function deletenews($id){
        $data['item'] = $this->GlobalModel->getById('news',$id);
		$this->GlobalModel->delete('news', $id);
        redirect('admin/news');
	}

	// User
	public function user(){
		$user = $this->session->userdata('name');
		if (!isset($user)) { redirect('admin'); }

		$data['total'] = $this->GlobalModel->getCount('inbox','isread', 0);
		$data['user'] = $this->GlobalModel->getAll('user');
		$this->load->view('view_admin_user', $data);
	}

	public function createuser(){
		$user = $this->session->userdata('name');
		if (!isset($user)) { redirect('admin'); }

		$data['total'] = $this->GlobalModel->getCount('inbox','isread', 0);
		$this->load->view('view_admin_user_create', $data);
	}

	public function edituser($id){
		$user = $this->session->userdata('name');
		if (!isset($user)) { redirect('admin'); }

		$data['total'] = $this->GlobalModel->getCount('inbox','isread', 0);
		$data['user'] = $this->GlobalModel->getById('user', $id);
		$this->load->view('view_admin_user_edit', $data);
	}

	public function deleteuser($id){
        $data['item'] = $this->GlobalModel->getById('user',$id);
		$this->GlobalModel->delete('user', $id);
        redirect('admin/user');
	}
	
	public function insertuser(){
		$config['upload_path']          = './assets/images/user/';
        $config['allowed_types']        = 'gif|jpg|png';
		$config['overwrite']			= true;

		$this->upload->initialize($config);
		$this->load->library('upload', $config);

		$name = $this->input->post('name');
		$gender = $this->input->post('gender');
		$phone = $this->input->post('phone');
		$email = $this->input->post('email');
		$level = $this->input->post('level');
		$password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);

		$data['user'] = $this->GlobalModel->getByName('user','email', $email);

		if($data['user'] == null || $data['user']['email'] == ""){
			if (!$this->upload->do_upload('image'))
			{
				$error = $this->upload->display_errors();
				echo $error;
			}
			else
			{
				$data = array(
					'name' => $name,
					'gender' => $gender,
					'phone' => $phone,
					'email' => $email,
					'level' => $level,
					'password' => $password,
					'image' => $this->upload->data("file_name"),
					'created' => date('Y-m-d H:i:s'),
					'createdby' => $this->session->userdata('name')
				);

				$this->GlobalModel->insert('user', $data);
				echo "Data saved successfully";
			}
		}else{
			echo "Email already exist";
		}
	}

	public function updateuser($id){
		$config['upload_path']          = './assets/images/user/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['overwrite']			= true;

        $this->upload->initialize($config);
        $this->load->library('upload', $config);

        $name = $this->input->post('name');
		$gender = $this->input->post('gender');
		$phone = $this->input->post('phone');
		$email = $this->input->post('email');
		$level = $this->input->post('level');
		$currentImage = $this->input->post('currentImage');

        if (!empty($_FILES['image']['name'])) {
            if (!$this->upload->do_upload('image'))
            {
                $error = $this->upload->display_errors();
                echo $error;
            }
            else
            {
                $data = array(
                    'name' => $name,
					'gender' => $gender,
					'phone' => $phone,
					'email' => $email,
					'level' => $level,
                	'image' => $this->upload->data("file_name"),
					'modified' => date('Y-m-d H:i:s'),
					'modifiedby' => $this->session->userdata('name')
                );

                unlink(FCPATH.'assets/images/user/'. $currentImage);
                $this->GlobalModel->update('user', $data, $id);
                echo "Data changed successfully";
            }
        }else{
            $data = array(
				'name' => $name,
				'gender' => $gender,
				'phone' => $phone,
				'email' => $email,
				'level' => $level,
				'password' => $password,
				'modified' => date('Y-m-d H:i:s'),
				'modifiedby' => $this->session->userdata('name')
			);

            $this->GlobalModel->update('user', $data, $id);
            echo "Data changed successfully";
        }
	}

	public function updatepassword($id){
		$currentpassword = $this->input->post('currentpassword');
		$newpassword = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
		$confirmpassword = password_hash($this->input->post('confirmpassword'), PASSWORD_BCRYPT);

		$data['user'] = $this->AuthModel->getUserById($id);
		if(password_verify($currentpassword, $data['user']['password'])){
			$data = array(
				'password' => $newpassword,
				'modified' => date('Y-m-d H:i:s'),
				'modifiedby' => $this->session->userdata('name')
			);
			$this->GlobalModel->update('user', $data, $id);
			echo "1";
		}else{
			echo "0";
		}
	}

	// Slide Header
	public function slideheader(){
		$user = $this->session->userdata('name');
		if (!isset($user)) { redirect('admin'); }

		$data['total'] = $this->GlobalModel->getCount('inbox','isread', 0);
		$data['slide'] = $this->GlobalModel->getAll('slideheader');
		$this->load->view('view_admin_slideheader', $data);
	}

	public function createslideheader(){
		$user = $this->session->userdata('name');
		if (!isset($user)) { redirect('admin'); }
		
		$data['total'] = $this->GlobalModel->getCount('inbox','isread', 0);
		$this->load->view('view_admin_slideheader_create', $data);
	}

	public function deleteslideheader($id){
        $data['item'] = $this->GlobalModel->getById('slideheader',$id);
		$this->GlobalModel->delete('slideheader', $id);
        redirect('admin/slideheader');
	}

	public function editslideheader($id){
		$data['total'] = $this->GlobalModel->getCount('inbox','isread', 0);
		$data['slide'] = $this->GlobalModel->getById('slideheader', $id);
		$this->load->view('view_admin_slideheader_edit', $data);
	}

	public function insertslideheader(){
		$title = $this->input->post('title');
		$description = $this->input->post('description');
		$language = $this->input->post('language');

        $data = array(
			'title' => $title,
			'description' => $description,
			'language' => $language,
			'created' => date('Y-m-d H:i:s'),
			'createdby' => $this->session->userdata('name')
		);

		$this->GlobalModel->insert('slideheader', $data);
		echo "Data saved successfully";
	}

	public function updateslideheader($id){

		$title = $this->input->post('title');
		$description = $this->input->post('description');
		$language = $this->input->post('language');

        $data = array(
			'title' => $title,
			'description' => $description,
			'language' => $language,
			'modified' => date('Y-m-d H:i:s'),
			'modifiedby' => $this->session->userdata('name')
		);

		$this->GlobalModel->update('slideheader', $data, $id);
		echo "Data changed successfully";
	}

	// Home Content
	public function homecontent_id(){
		$data['total'] = $this->GlobalModel->getCount('inbox','isread', 0);
		$data['home'] = $this->GlobalModel->getById('homecontent', 'IWIHO001');
		$this->load->view('view_admin_home_content_edit', $data);
	}

	public function homecontent_en(){
		$data['total'] = $this->GlobalModel->getCount('inbox','isread', 0);
		$data['home'] = $this->GlobalModel->getById('homecontent', 'IWIHO002');
		$this->load->view('view_admin_home_content_edit', $data);
	}

	public function updatehomecontent($id){

		$config['upload_path']          = './assets/images/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['overwrite']			= true;

        $this->upload->initialize($config);
        $this->load->library('upload', $config);

        $about = $this->input->post('descabout');
		$services = $this->input->post('descservices');
		$project = $this->input->post('descproject');
		$teams = $this->input->post('descteams');
		$name = $this->input->post('name');
		$position = $this->input->post('position');
		$aboutlead = $this->input->post('desclead');
        $currentimage = $this->input->post('currentimage');

        if (!empty($_FILES['image']['name'])) {
            if (!$this->upload->do_upload('image'))
            {
                $error = $this->upload->display_errors();
                echo $error;
            }
            else
            {
                $data = array(
                    'about' => $about,
					'services' => $services,
					'project' => $project,
					'teams' => $teams,
					'name' => $name,
					'position' => $position,
					'aboutlead' => $aboutlead,
					'image' => $this->upload->data("file_name"),
					'modified' => date('Y-m-d H:i:s'),
					'modifiedby' => $this->session->userdata('name')
                );

                if($currentimage != null || $currentimage != ""){
					unlink(FCPATH.'assets/images/'.$currentimage);
				}

                $this->GlobalModel->update('homecontent', $data, $id);
                echo "Data changed successfully";
            }
        }else{
            $data = array(
				'about' => $about,
				'services' => $services,
				'project' => $project,
				'teams' => $teams,
				'name' => $name,
				'position' => $position,
				'aboutlead' => $aboutlead,
				'modified' => date('Y-m-d H:i:s'),
				'modifiedby' => $this->session->userdata('name')
			);

            $this->GlobalModel->update('homecontent', $data, $id);
            echo "Data changed successfully";
        }
	}

	// Upload Delete Image Content
    function uploadimage(){
        if(isset($_FILES["image"]["name"])){
            $config['upload_path'] = './assets/images/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->upload->initialize($config);
            if(!$this->upload->do_upload('image')){
                $this->upload->display_errors();
                return FALSE;
            }else{
                $data = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./assets/images/'.$data['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= TRUE;
                $config['quality']= '60%';
                $config['width']= 800;
                $config['height']= 800;
                $config['new_image']= './assets/images/'.$data['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                echo base_url().'assets/images/'.$data['file_name'];
            }
        }
    }

	function deleteimage(){
		$src = $this->input->post('src');
		$file_name = str_replace(base_url(), '', $src);
		if(unlink($file_name)){
			echo 'File Delete Successfully';
		}
	}
}

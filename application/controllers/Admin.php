<?php
defined('BASEPATH') OR exit('No direct script access allowed');
define("ENCRYPTION_KEY", "IndonesiaWaterInstitute2020!");
define("ENCRYPTION_METHOD", "AES-128-CTR");
define("ENCRYPTION_IV", "1234");

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
		$this->load->view('view_admin_home');
	}

	// Teams
	public function teams(){
		$data['teams'] = $this->GlobalModel->getAll('teams');
		$this->load->view('view_admin_teams', $data);
	}

	public function createteams(){
		$this->load->view('view_admin_teams_create');
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
                'createdby' => 'Ricki'
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
					'modifiedby' => 'Ricki'
                );

                unlink(FCPATH.'assets/images/teams/'.$currentImage);
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
				'modifiedby' => 'Ricki'
			);

            $this->GlobalModel->update('teams', $data, $id);
            echo "Data changed successfully";
        }
	}
	
	// About
	public function about(){
		$data['about'] = $this->GlobalModel->getById('about', 'IWIABO1');
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
			'modifiedby' => 'Ricki'
		);

		$this->GlobalModel->update('about', $data, $id);
		echo "Data changed successfully";
	}

	// Contact
	public function contact(){
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
			'modifiedby' => 'Ricki'
		);

		$this->GlobalModel->update('contact', $data, $id);
		echo "Data changed successfully";
	}

	// Services
	public function services(){
		$data['services'] = $this->GlobalModel->getAll('services');
		$this->load->view('view_admin_services', $data);
	}

	public function createservices(){
		$this->load->view('view_admin_services_create');
	}

	public function editservices($id){
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
			'createdby' => 'Ricki'
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
			'modifiedby' => 'Ricki'
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
		$data['projects'] = $this->GlobalModel->getAll('projects');
		$this->load->view('view_admin_project', $data);
	}

	public function createproject(){
		$this->load->view('view_admin_project_create');
	}

	public function insertproject(){
		$config['upload_path']          = './assets/images/projectcover/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['overwrite']			= true;

        $this->upload->initialize($config);
        $this->load->library('upload', $config);

		$title = $this->input->post('title');
		$content = $this->input->post('contentdesc');
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
				'isactive' => $isactive,
                'cover' => $this->upload->data("file_name"),
                'created' => date('Y-m-d H:i:s'),
                'createdby' => 'Ricki'
            );

            $this->GlobalModel->insert('projects', $data);
            echo "Data saved successfully";
        }
	}

	public function updatestatusproject($id, $status){

        $data = array(
			'isactive' => $status,
			'modified' => date('Y-m-d H:i:s'),
			'modifiedby' => 'Ricki'
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
                	'cover' => $this->upload->data("file_name"),
					'modified' => date('Y-m-d H:i:s'),
					'modifiedby' => 'Ricki'
                );

                unlink(FCPATH.'assets/images/projectcover/'.$currentImage);
                $this->GlobalModel->update('projects', $data, $id);
                echo "Data changed successfully";
            }
        }else{
            $data = array(
				'title' => $title,
				'content' => $content,
				'isactive' => $isactive,
				'modified' => date('Y-m-d H:i:s'),
				'modifiedby' => 'Ricki'
			);

            $this->GlobalModel->update('projects', $data, $id);
            echo "Data changed successfully";
        }
	}

	// Inbox
	public function inbox(){
		$data['inbox'] = $this->GlobalModel->getAll('inbox');
		$this->load->view('view_admin_inbox', $data);
	}

	// Client Country
	public function country(){
		$data['country'] = $this->GlobalModel->getAll('country');
		$this->load->view('view_admin_country', $data);
	}

	public function createcountry(){
		$this->load->view('view_admin_country_create');
	}

	public function insertcountry(){
		$name = $this->input->post('name');

        $data = array(
			'name' => $name,
			'created' => date('Y-m-d H:i:s'),
			'createdby' => 'Ricki'
		);

		$this->GlobalModel->insert('country', $data);
		echo "Data saved successfully";
	}

	public function editcountry($id){
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
			'modifiedby' => 'Ricki'
		);

		$this->GlobalModel->update('country', $data, $id);
		echo "Data changed successfully";
	}

	// Client
	public function client(){
		$data['client'] = $this->ClientModel->getAllClient();
		$this->load->view('view_admin_client', $data);
	}

	public function createclient(){
		$data['country'] = $this->GlobalModel->getAll('country');
		$this->load->view('view_admin_client_create', $data);
	}

	public function deleteclient($id){
        $data['item'] = $this->GlobalModel->getById('client',$id);
		$this->GlobalModel->delete('client', $id);
        redirect('admin/client');
	}

	public function editclient($id){
		$data['client'] = $this->GlobalModel->getById('client', $id);
		$data['country'] = $this->GlobalModel->getAll('country');
		$this->load->view('view_admin_client_edit', $data);
	}

	public function insertclient(){
		$name = $this->input->post('name');
		$idcountry = $this->input->post('country');

        $data = array(
			'name' => $name,
			'idcountry' => $idcountry,
			'created' => date('Y-m-d H:i:s'),
			'createdby' => 'Ricki'
		);

		$this->GlobalModel->insert('client', $data);
		echo "Data saved successfully";
	}

	public function updateclient($id){

		$name = $this->input->post('name');
		$idcountry = $this->input->post('country');

        $data = array(
			'name' => $name,
			'idcountry' => $idcountry,
			'modified' => date('Y-m-d H:i:s'),
			'modifiedby' => 'Ricki'
		);

		$this->GlobalModel->update('client', $data, $id);
		echo "Data changed successfully";
	}

	// Book
	public function book(){
		$data['book'] = $this->GlobalModel->getAll('book');
		$this->load->view('view_admin_book', $data);
	}

	public function createbook(){
		$this->load->view('view_admin_book_create');
	}

	public function editbook($id){
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
			'createdby' => 'Ricki'
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
			'modifiedby' => 'Ricki'
		);

		$this->GlobalModel->update('book', $data, $id);
		echo "Data changed successfully";
	}

	// News
	public function news(){
		$data['news'] = $this->GlobalModel->getAll('news');
		$this->load->view('view_admin_news', $data);
	}

	public function createnews(){
		$this->load->view('view_admin_news_create');
	}

	public function insertnews(){
		$config['upload_path']          = './assets/images/news/';
        $config['allowed_types']        = 'gif|jpg|png';
		$config['overwrite']			= true;

		$this->upload->initialize($config);
		$this->load->library('upload', $config);

		$title = $this->input->post('title');
		$content = $this->input->post('contentdesc');

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
                'cover' => $this->upload->data("file_name"),
                'created' => date('Y-m-d H:i:s'),
                'createdby' => 'Ricki'
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
                	'cover' => $this->upload->data("file_name"),
					'modified' => date('Y-m-d H:i:s'),
					'modifiedby' => 'Ricki'
                );

                unlink(FCPATH.'assets/images/news/'.$currentImage);
                $this->GlobalModel->update('news', $data, $id);
                echo "Data changed successfully";
            }
        }else{
            $data = array(
				'title' => $title,
				'content' => $content,
				'modified' => date('Y-m-d H:i:s'),
				'modifiedby' => 'Ricki'
			);

            $this->GlobalModel->update('news', $data, $id);
            echo "Data changed successfully";
        }
	}

	public function editnews($id){
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
		$data['user'] = $this->GlobalModel->getAll('user');
		$this->load->view('view_admin_user', $data);
	}

	public function createuser(){
		$this->load->view('view_admin_user_create');
	}

	public function edituser($id){
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

		if($data['user']['email'] != $email){
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
					'createdby' => 'Ricki'
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
					'modifiedby' => 'Ricki'
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
				'modifiedby' => 'Ricki'
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
				'modifiedby' => 'Ricki'
			);
			$this->GlobalModel->update('user', $data, $id);
			echo "1";
		}else{
			echo "0";
		}
	}

	// Slide Header
	public function slideheader(){
		$data['slide'] = $this->GlobalModel->getAll('slideheader');
		$this->load->view('view_admin_slideheader', $data);
	}

	public function createslideheader(){
		$this->load->view('view_admin_slideheader_create');
	}

	public function deleteslideheader($id){
        $data['item'] = $this->GlobalModel->getById('slideheader',$id);
		$this->GlobalModel->delete('slideheader', $id);
        redirect('admin/slideheader');
	}

	public function editslideheader($id){
		$data['slide'] = $this->GlobalModel->getById('slideheader', $id);
		$this->load->view('view_admin_slideheader_edit', $data);
	}

	public function insertslideheader(){
		$title = $this->input->post('title');
		$description = $this->input->post('description');

        $data = array(
			'title' => $title,
			'description' => $description,
			'created' => date('Y-m-d H:i:s'),
			'createdby' => 'Ricki'
		);

		$this->GlobalModel->insert('slideheader', $data);
		echo "Data saved successfully";
	}

	public function updateslideheader($id){

		$title = $this->input->post('title');
		$description = $this->input->post('description');

        $data = array(
			'title' => $title,
			'description' => $description,
			'modified' => date('Y-m-d H:i:s'),
			'modifiedby' => 'Ricki'
		);

		$this->GlobalModel->update('slideheader', $data, $id);
		echo "Data changed successfully";
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

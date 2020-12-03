<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
        parent::__construct();

        $this->load->library('upload');
        $this->load->model("GlobalModel");
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
		$content = $this->input->post('contentdesc');
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

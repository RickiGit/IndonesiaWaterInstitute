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
}

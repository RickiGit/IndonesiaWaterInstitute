<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->view('view_public_home');
	}

	function languages()	{
		extract($_POST);
		$this->session->set_userdata('language', $dlang);
		$redirect_url = base_url().$current;
		redirect($redirect_url);	
 
	 }
}

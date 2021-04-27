<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('user_Model');
	}

	public function index()
	{
		$data = [
			"usernameUser" => $_SESSION['username']
		];
		$result['user'] = $this->user_Model->getUserData($data);
		$this->load->view('profile', $result);
	}

}
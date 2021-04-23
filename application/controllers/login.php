<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('user_Model');
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function login()
	{
		$data = [
			"usernameUser" => $this->input->post('username', true),
			"passwordUser" => $this->input->post('password', true),
		];
		$masuk = $this->user_Model->login($data);
		if ($masuk == True) {
			$this->session->set_userdata('username', $data['usernameUser']);
			redirect(base_url());
		} else {
			$this->load->view('login');
		}
	}

	public function guest()
	{
		$data['username'] = "Guest";
		$this->session->set_userdata('username', $data['usernameUser']);
		redirect(base_url());
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */
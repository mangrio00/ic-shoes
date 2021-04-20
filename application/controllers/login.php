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
			"email" => $this->input->post('email', true),
			"password" => $this->input->post('password', true),
		];
		$masuk = $this->UserModel->login($data);
		if ($masuk == TRUE) {
			$this->session->set_userdata('email', $data['emailUser']);
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
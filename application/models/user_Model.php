<?php
defined('BASEPATH') OR exit ('No direct script access allowed')

class user_Model extends CI_Model{

	public function login($data)
	{
		this->db->where('email', $data['emailUser']);
		this->db->where('password', $data['passwordUser']);
		$cek = $this->db->get('user')->row();
		if ($cek) {
			return true;
		} else {
			return false;
		}
	}
}
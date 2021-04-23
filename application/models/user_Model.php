<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class user_Model extends CI_Model{

	public function login($data)
	{
		$this->db->where('usernameUser', $data['usernameUser']);
		$this->db->where('passwordUser', $data['passwordUser']);
		$cek = $this->db->get('user')->row();
		if ($cek) {
			return True;
		} else {
			return False;
		}
	}
}
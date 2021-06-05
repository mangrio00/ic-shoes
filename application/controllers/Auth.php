<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AuthModel');
    }
    public function index()
    {
        $sessionUser = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($sessionUser) {
            if ($sessionUser['role_id'] == 1) {
                redirect('admin');
            } elseif ($sessionUser['role_id'] == 2) {
                redirect('main');
            }
        }
        if ($this->form_validation->run() == false) {
            // $data['title'] = "Login Page";
            // $this->load->view('templates/header', $data);
            $this->load->view('auth/login');
            // $this->load->view('templates/footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user && $user['is_active'] == 1) {
            // if ($user['is_active'] == 1) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'email' => $user['email'],
                    'role_id' => $user['role_id']
                ];
                $this->session->set_userdata($data);
                if ($user['role_id'] == 1) {
                    redirect('admin');
                } else if ($user['role_id'] == 2) {
                    redirect('main');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Wrong Username/Password</div>');
                redirect('auth');
            }
            // } else {
            //     $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Email has not been activated</div>');
            //     redirect('auth');
            // }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Email is not registered </div>');
            redirect('auth');
        }
    }

    public function registration()
    {
        $this->form_validation->set_rules('fullname', 'Fullname', 'required|trim');
        $this->form_validation->set_rules('username', 'Nama', 'required|trim|is_unique[user.username]', [
            'is_unique' => 'Username Sudah Terpakai'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email Sudah Pernah Didaftarkan'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[4]|matches[password2]', [
            'matches' => 'Password not same',
            'min_length' => 'Password is too short'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('no_hp', 'Nomor Handphone', 'required|trim');
        // $this->form_validation->set_rules('is_active', 'Aktif Status', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/registration');
        } else {
            $this->AuthModel->addNewUser();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Selamat, Akun Anda Telah Terdaftar, Silahkan Login</div>');
            redirect('auth');
        }
    }


    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">You have been logged out</div>');
        redirect('auth');
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AdminModel');
    }

    public function index()
    {
        $data['title'] = 'Page Admin';
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $this->load->view('templates/header', $data);
        if ($data['admin'] && $data['admin']['role_id'] == 1) {
            $this->load->view('templates/headerAdmin', $data);
            $this->load->view('admin/index', $data);
            $this->load->view('templates/footerAdmin');
        } else {
            redirect('auth/logout');
        }
    }

    public function listBarang()
    {
        $data['title'] = 'List Barang';
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['barangs'] = $this->AdminModel->getAllData();

        if ($data['admin'] && $data['admin']['role_id'] == 1) {
            $this->load->view('templates/headerAdmin', $data);
            $this->load->view('admin/listBarang', $data);
            $this->load->view('templates/footerAdmin');
        } else {
            redirect('auth/logout');
        }
    }

    public function listTransaksi()
    {
        $data['title'] = 'List Transaksi';
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['transaksis'] = $this->AdminModel->getAllTransaksi();
        $data['checkouts'] = $this->AdminModel->getDataCheckout();
        // $data['developer'] = $this->db->get_where('developer', ['id_user' => $data['user']['id_user']])->row_array();

        if ($data['admin'] && $data['admin']['role_id'] == 1) {
            $this->load->view('templates/headerAdmin', $data);
            $this->load->view('admin/listTransaksi', $data);
            $this->load->view('templates/footerAdmin');
        } else {
            redirect('auth/logout');
        }
    }

    public function formAddBarang()
    {
        $data['title'] = 'Add New Product';
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $data['developer'] = $this->db->get_where('developer', ['id_user' => $data['user']['id_user']])->row_array();

        if ($data['admin'] && $data['admin']['role_id'] == 1) {
            $this->load->view('templates/headerAdmin', $data);
            $this->load->view('admin/formAddBarang', $data);
            $this->load->view('templates/footerAdmin');
        } else {
            redirect('auth/logout');
        }
    }

    public function addBarang()
    {
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required|trim');
        $this->form_validation->set_rules('brand', 'Brand', 'required|trim');
        $this->form_validation->set_rules('warna_barang', 'Warna', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim');
        $this->form_validation->set_rules('stok', 'Stock', 'required|trim');

        if ($data['admin'] && $data['admin']['role_id'] == 1) {
            if ($this->form_validation->run() == false) {
                $this->load->view('templates/headerAdmin', $data);
                $this->load->view('admin/formAddBarang', $data);
                $this->load->view('templates/footerAdmin');
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Gagal Membeli Game<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button> </div>');
            } else {
                $this->AdminModel->addBarang();
                redirect('admin/uploadImageBarang');
            }
        } else {
            redirect('auth');
        }
    }

    public function formAddUser()
    {
        $data['title'] = 'Add New User';
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['users'] = $this->AdminModel->getAllUsers();
        // $data['developer'] = $this->db->get_where('developer', ['id_user' => $data['user']['id_user']])->row_array();

        if ($data['admin'] && $data['admin']['role_id'] == 1) {
            $this->load->view('templates/headerAdmin', $data);
            $this->load->view('admin/formAddUser', $data);
            $this->load->view('templates/footerAdmin');
        } else {
            redirect('auth/logout');
        }
    }

    public function formEditUser($id)
    {
        $data['title'] = 'Edit User';
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $this->db->get_where('user', ['id_user' => $id])->row_array();
        // $data['developer'] = $this->db->get_where('developer', ['id_user' => $data['user']['id_user']])->row_array();

        if ($data['admin'] && $data['admin']['role_id'] == 1) {
            $this->load->view('templates/headerAdmin', $data);
            $this->load->view('admin/formEditUser', $data);
            $this->load->view('templates/footerAdmin');
        } else {
            redirect('auth/logout');
        }
    }

    public function updateUser($id)
    {
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $this->db->get_where('user', ['id_user' => $id])->row_array();

        $this->form_validation->set_rules('fullname', 'Fullname', 'required|trim');
        $this->form_validation->set_rules('username', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('no_hp', 'Nomor Handphone', 'required|trim');
        $this->form_validation->set_rules('status', 'Aktif Status', 'required|trim');

        if ($data['admin'] && $data['admin']['role_id'] == 1) {
            if ($this->form_validation->run() == false) {
                // failed
                redirect('admin/formEditUser/' . $id);
            } else {
                //success\
                $this->AdminModel->updateUser($id);
                redirect('admin/formAddUser');
            }
        } else {
            redirect('auth/logout');
        }
    }

    public function formEditBarang($id)
    {
        $data['title'] = 'Edit Product';
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['barang'] = $this->db->get_where('barang', ['id_barang' => $id])->row_array();
        // $data['developer'] = $this->db->get_where('developer', ['id_user' => $data['user']['id_user']])->row_array();

        if ($data['admin'] && $data['admin']['role_id'] == 1) {
            $this->load->view('templates/headerAdmin', $data);
            $this->load->view('admin/formEditBarang', $data);
            $this->load->view('templates/footerAdmin');
        } else {
            redirect('auth/logout');
        }
    }


    public function UpdateBarang($id_barang)
    {
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required|trim');
        $this->form_validation->set_rules('brand', 'Brand', 'required|trim');
        $this->form_validation->set_rules('warna_barang', 'Warna', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim');
        $this->form_validation->set_rules('stok', 'Stock', 'required|trim');

        if ($data['admin'] && $data['admin']['role_id'] == 1) {
            if ($this->form_validation->run() == false) {
                $this->load->view('templates/headerAdmin', $data);
                $this->load->view('admin/formEditBarang/' . $id_barang, $data);
                $this->load->view('templates/footerAdmin');
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Gagal Membeli Game<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button> </div>');
            } else {
                $this->AdminModel->updateBarang($id_barang);
                redirect('admin/listBarang');
            }
        } else {
            redirect('auth');
        }
    }


    public function uploadImageBarang()
    {
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $latestRow = $this->db->select("*")->limit(1)->order_by('id_barang', "DESC")->get("barang")->row_array();

        $config['upload_path']          =  './assets/img/barang'; //isi dengan nama folder temoat menyimpan gambar
        $config['allowed_types']        =  'jpg|jpeg|png'; //isi dengan format/tipe gambar yang diterima
        $config['max_size']             = '2048';  //isi dengan ukuran maksimum yang bisa di upload
        $config['max_width']            =  '1024'; //isi dengan lebar maksimum gambar yang bisa di upload
        $config['max_height']           = '1024'; //isi dengan panjang maksimum gambar yang bisa di upload
        $config['file_name']            = "FotoProduk_" . $latestRow['id_barang'];

        $this->load->library('upload', $config);

        // $data['developer'] = $this->db->get_where('developer', ['id_user' => $data['user']['id_user']])->row_array();
        // $data['game'] = $this->db->get_where('game', ['developer_id' => $data['developer']['developer_id']])->row_array();

        if ($data['admin'] && $data['admin']['role_id'] == 1) {
            if (!$this->upload->do_upload('image')) {
                // $data['error'] = $this->upload->display_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert"><a>', '</a><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                $data['title'] = 'Upload Foto Barang';
                $this->load->view('templates/headerAdmin', $data);
                $this->load->view('admin/uploadImageBarang', $data);
                $this->load->view('templates/footerAdmin');
            } else {

                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
                $this->db->where('id_barang', $latestRow['id_barang']); //$latestRow['game_id']);
                $this->db->update('barang');
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Foto Profile Berhasil Di Update<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button> </div>');
                redirect('admin/listBarang');
            }
        }
    }


    public function editImageBarang($id_barang)
    {
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['barang'] = $this->db->get_where('barang', ['id_barang' => $id_barang])->row_array();
        // $id_barang = $this->uri->segment(3);
        // $id_barang = $data['barang']['id_barang'];

        $config['upload_path']          =  './assets/img/barang'; //isi dengan nama folder temoat menyimpan gambar
        $config['allowed_types']        =  'jpg|jpeg|png'; //isi dengan format/tipe gambar yang diterima
        $config['max_size']             = '2048';  //isi dengan ukuran maksimum yang bisa di upload
        $config['max_width']            =  '1024'; //isi dengan lebar maksimum gambar yang bisa di upload
        $config['max_height']           = '1024'; //isi dengan panjang maksimum gambar yang bisa di upload
        $config['file_name']            = "FotoProduk_" . $id_barang;
        $config['overwrite'] = TRUE;

        $this->load->library('upload', $config);

        // $data['developer'] = $this->db->get_where('developer', ['id_user' => $data['user']['id_user']])->row_array();
        // $data['game'] = $this->db->get_where('game', ['developer_id' => $data['developer']['developer_id']])->row_array();

        if ($data['admin'] && $data['admin']['role_id'] == 1) {
            if (!$this->upload->do_upload('image')) {
                // $data['error'] = $this->upload->display_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert"><a>', '</a><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                $data['title'] = 'Edit Foto Barang';
                $this->load->view('templates/headerAdmin', $data);
                $this->load->view('admin/editImageBarang', $data);
                $this->load->view('templates/footerAdmin');
            } else {

                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
                $this->db->where('id_barang', $id_barang); //$latestRow['game_id']);
                $this->db->update('barang');
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Foto Profile Berhasil Di Update<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button> </div>');
                redirect('admin/formEditBarang/' . $id_barang);
            }
        }
    }

    public function deleteBarang($id)
    {
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        if ($data['admin'] && $data['admin']['role_id'] == 1) {
            $this->AdminModel->deleteBarang($id);
            redirect('admin/listBarang');
        } else {
            redirect('auth/logout');
        }
    }

    public function deleteUser($id)
    {
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($data['admin'] && $data['admin']['role_id'] == 1) {
            $this->AdminModel->deleteUser($id);
            redirect('admin/formAddUser');
        } else {
            redirect('auth/logout');
        }
    }

    public function editImageUser($id_user)
    {
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $this->db->get_where('user', ['id_user' => $id_user])->row_array();
        // $id_barang = $this->uri->segment(3);
        // $id_barang = $data['barang']['id_barang'];

        $config['upload_path']          =  './assets/img/profile'; //isi dengan nama folder temoat menyimpan gambar
        $config['allowed_types']        =  'jpg|jpeg|png'; //isi dengan format/tipe gambar yang diterima
        $config['max_size']             = '2048';  //isi dengan ukuran maksimum yang bisa di upload
        $config['max_width']            =  '1024'; //isi dengan lebar maksimum gambar yang bisa di upload
        $config['max_height']           = '1024'; //isi dengan panjang maksimum gambar yang bisa di upload
        $config['file_name']            = "FotoProfile_" . $id_user;
        $config['overwrite'] = TRUE;

        $this->load->library('upload', $config);

        // $data['developer'] = $this->db->get_where('developer', ['id_user' => $data['user']['id_user']])->row_array();
        // $data['game'] = $this->db->get_where('game', ['developer_id' => $data['developer']['developer_id']])->row_array();

        if ($data['admin'] && $data['admin']['role_id'] == 1) {
            if (!$this->upload->do_upload('image')) {
                // $data['error'] = $this->upload->display_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert"><a>', '</a><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                $data['title'] = 'Edit Foto User';
                $this->load->view('templates/headerAdmin', $data);
                $this->load->view('admin/editImageUser', $data);
                $this->load->view('templates/footerAdmin');
            } else {

                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
                $this->db->where('id_user', $id_user); //$latestRow['game_id']);
                $this->db->update('user');
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Foto Profile Berhasil Di Update<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button> </div>');
                redirect('admin/formAddUser');
            }
        }
    }


    public function myProfile()
    {
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($data['admin'] && $data['admin']['role_id'] == 1) {
            $this->load->view('templates/headerAdmin', $data);
            $this->load->view('admin/myProfile', $data);
            $this->load->view('templates/footerAdmin');
        } else {
            redirect('auth');
        }
    }

    public function formEditProfile()
    {
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $data['admin'] = $this->MainModel->getUserById($data['session']['id_user']);

        if ($data['admin'] && $data['admin']['role_id'] == 1) {
            $this->load->view('templates/headerAdmin', $data);
            $this->load->view('admin/editMyProfile', $data);
            $this->load->view('templates/footerAdmin');
        } else {
            redirect('auth/logout');
        }
    }

    public function updateProfile($id)
    {
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $data['user'] = $this->db->get_where('user', ['id_user' => $id])->row_array();

        $this->form_validation->set_rules('fullname', 'Fullname', 'required|trim');
        $this->form_validation->set_rules('username', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('no_hp', 'Nomor Handphone', 'required|trim');

        if ($data['admin'] && $data['admin']['role_id'] == 1) {
            if ($this->form_validation->run() == false) {
                // failed
                redirect('admin/formEditProfile/' . $id);
                // $this->load->view('templates/headerAdmin', $data);
                // $this->load->view('admin/formEditUser', $data);
                // $this->load->view('templates/footerAdmin');
            } else {
                //success\
                $this->AdminModel->updateUser($id);
                redirect('admin/myProfile');
            }
        } else {
            redirect('auth/logout');
        }
    }

    public function editImageProfile($id_user)
    {
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $data['user'] = $this->db->get_where('user', ['id_user' => $id_user])->row_array();
        // $id_barang = $this->uri->segment(3);
        // $id_barang = $data['barang']['id_barang'];

        $config['upload_path']          =  './assets/img/profile'; //isi dengan nama folder temoat menyimpan gambar
        $config['allowed_types']        =  'jpg|jpeg|png'; //isi dengan format/tipe gambar yang diterima
        $config['max_size']             = '2048';  //isi dengan ukuran maksimum yang bisa di upload
        $config['max_width']            =  '1024'; //isi dengan lebar maksimum gambar yang bisa di upload
        $config['max_height']           = '1024'; //isi dengan panjang maksimum gambar yang bisa di upload
        $config['file_name']            = "FotoProfile_" . $id_user;
        $config['overwrite'] = TRUE;

        $this->load->library('upload', $config);

        // $data['developer'] = $this->db->get_where('developer', ['id_user' => $data['user']['id_user']])->row_array();
        // $data['game'] = $this->db->get_where('game', ['developer_id' => $data['developer']['developer_id']])->row_array();

        if ($data['admin'] && $data['admin']['role_id'] == 1) {
            if (!$this->upload->do_upload('image')) {
                // $data['error'] = $this->upload->display_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert"><a>', '</a><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                $data['title'] = 'Edit Foto User';
                $this->load->view('templates/headerAdmin', $data);
                $this->load->view('admin/editImageUser', $data);
                $this->load->view('templates/footerAdmin');
            } else {

                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
                $this->db->where('id_user', $id_user); //$latestRow['game_id']);
                $this->db->update('user');
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Foto Profile Berhasil Di Update<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button> </div>');
                redirect('admin/myProfile');
            }
        }
    }

    public function deleteTransaksi($id)
    {
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($data['admin'] && $data['admin']['role_id'] == 1) {
            $this->AdminModel->deleteTransaksi($id);
            redirect('admin/listTransaksi');
        } else {
            redirect('auth/logout');
        }
    }

    public function editStatusTransaksi($id)
    {
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        if ($data['admin'] && $data['admin']['role_id'] == 1) {
            $new_status = $this->input->post('status');
            $this->db->set('status', $new_status);
            $this->db->where('id_transaksi', $id); //$latestRow['game_id']);
            $this->db->update('transaksi');
        } else {
            redirect('auth/logout');
        }
        redirect('admin/listTransaksi');
    }
}

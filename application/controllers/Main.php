<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
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
        $this->load->model('MainModel');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['barangs'] = $this->AdminModel->getAllData();

        // if ($data['user'] && $data['user']['role_id'] == 2) {
        $this->load->view('templates/header', $data);
        $this->load->view('pages/index');
        $this->load->view('templates/footer');
        // } else {
        // redirect('auth/logout');
        // }
    }


    public function searchbarang()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['barangs'] = $this->AdminModel->getAllData();
        $keyword = $this->input->post('keyword');
        $data['brg_get'] = $this->AdminModel->get_brg($keyword);
        $this->load->view('templates/header', $data);
        $this->load->view('pages/search', $data);
        $this->load->view('templates/footer');
    }

    public function shop()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['barangs'] = $this->AdminModel->getAllData();
        // if ($data['user'] && $data['user']['role_id'] == 2) {
        $this->load->view('templates/header', $data);
        $this->load->view('pages/shop', $data);
        $this->load->view('templates/footer');
        // } else {
        // redirect('auth');
        // }
    }
    public function cart()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($data['user'] && $data['user']['role_id'] == 2) {
            $this->load->view('templates/header', $data);
            $this->load->view('pages/cart');
            $this->load->view('templates/footer');
        } else {
            // redirect('auth/logout');
        }
    }

    public function wishlist()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($data['user'] && $data['user']['role_id'] == 2) {
            $this->load->view('templates/header', $data);
            $this->load->view('pages/wishlist');
            $this->load->view('templates/footer');
        } else {
            // redirect('auth/logout');
        }
    }

    public function myProfile()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($data['user'] && $data['user']['role_id'] == 2) {
            $this->load->view('templates/header', $data);
            $this->load->view('pages/myProfile', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('auth');
        }
    }

    public function formEditProfile()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $data['user'] = $this->MainModel->getUserById($data['session']['id_user']);

        if ($data['user'] && $data['user']['role_id'] == 2) {
            $this->load->view('templates/header', $data);
            $this->load->view('pages/editMyProfile', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('auth/logout');
        }
    }

    public function updateProfile($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $data['user'] = $this->db->get_where('user', ['id_user' => $id])->row_array();

        $this->form_validation->set_rules('fullname', 'Fullname', 'required|trim');
        $this->form_validation->set_rules('username', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('no_hp', 'Nomor Handphone', 'required|trim');

        if ($data['user'] && $data['user']['role_id'] == 2) {
            if ($this->form_validation->run() == false) {
                // failed
                redirect('main/formEditProfile/' . $id);
                // $this->load->view('templates/headerAdmin', $data);
                // $this->load->view('admin/formEditUser', $data);
                // $this->load->view('templates/footerAdmin');
            } else {
                //success\
                $this->MainModel->updateUser($id);
                redirect('main/myProfile');
            }
        } else {
            redirect('auth/logout');
        }
    }

    public function editImageProfile($id_user)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
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
        // $data['barang'] = $this->db->get_where('game', ['developer_id' => $data['developer']['developer_id']])->row_array();

        if ($data['user'] && $data['user']['role_id'] == 2) {
            if (!$this->upload->do_upload('image')) {
                // $data['error'] = $this->upload->display_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert"><a>', '</a><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                $data['title'] = 'Edit Foto User';
                $this->load->view('templates/header', $data);
                $this->load->view('pages/editImageUser', $data);
                $this->load->view('templates/footer');
            } else {

                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
                $this->db->where('id_user', $id_user); //$latestRow['game_id']);
                $this->db->update('user');
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Foto Profile Berhasil Di Update<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button> </div>');
                redirect('main/myProfile');
            }
        }
    }


    public function addToCart($id)
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $barang = $this->MainModel->findProduct($id);

        $data = array(
            'id'      => $barang->id_barang . "-" . $this->input->post('ukuran'),
            'qty'     => 1,
            'price'   => $barang->harga,
            'name'    => $barang->nama_barang,
            'ukuran' => $this->input->post('ukuran'),
            "warna" => $barang->warna_barang,
            'image' => $barang->image,
            'id_user' => $user['id_user'],
            'id_barang' => $barang->id_barang
        );
        if ($user && $user['role_id'] == 2) {
            $this->cart->insert($data);
            return redirect('main/shop');
        } else {
            redirect('auth/logout');
        }
    }

    public function removeItemFromCart($rowid)
    {
        $this->cart->remove($rowid);
        redirect('main/cart');
    }


    public function checkout()
    {

        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        date_default_timezone_set('Asia/Jakarta');
        $time = date("d F Y - H:i:s", strtotime("now"));
        $latestRow = $this->db->select("*")->limit(1)->order_by('id_transaksi', "DESC")->get("transaksi")->row_array();
        $totalPrice = 0;
        $totalItemsCart = 0;

        if ($user && $user['role_id'] == 2) {

            foreach ($this->cart->contents() as $barang) {
                $dataCheckout = array(
                    'id_transaksi' => $latestRow['id_transaksi'] + 1,
                    'id_barang'   => $barang['id_barang'],
                    'nama_barang'    => $barang['name'],
                    'total_items' => $barang['qty'],
                    'id_pembeli' => $user['id_user'],
                    'ukuran' => $barang['ukuran'],
                    'date' => $time
                );
                $totalPrice = (int)$totalPrice + (int)$barang['price'];
                $totalItemsCart = (int)$totalItemsCart + (int)$barang['qty'];
                $this->db->insert('checkout', $dataCheckout);

                $stokGudang = $this->db->get_where('barang', ['id_barang' => $barang['id_barang']])->row_array();
                $updateStokSepatu = $stokGudang['stok'] - $barang['qty'];
                $this->db->set('stok', $updateStokSepatu);
                $this->db->where('id_barang', $barang['id_barang']); //$latestRow['game_id']);
                $this->db->update('barang');
            }
            $dataTransaksi = array(
                'id_user' => $user['id_user'],
                'total_items' => $totalItemsCart,
                'total_price' => $totalPrice,
                'metode_bayar' => htmlspecialchars($this->input->post('metode_bayar', true)),
                'pengiriman' => htmlspecialchars($this->input->post('pengiriman', true)),
                'status' => 1, //0 = cancel, 1 = success, 2 = waiting
                'date' => $time,
            );
            $this->db->insert('transaksi', $dataTransaksi);
            $this->MainModel->destroyAllCart();
            return redirect('main');
        } else {
            redirect('auth/logout');
        }
    }
}

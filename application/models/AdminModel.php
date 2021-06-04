<?php

class AdminModel extends CI_Model
{

    public function getAllData()
    {
        return $this->db->get('barang')->result_array();
    }

    public function getAllUsers()
    {
        return $this->db->get('user')->result_array();
    }

    public function getAllTransaksi()
    {
        return $this->db->get('transaksi')->result_array();
    }

    public function getUserById($id)
    {
        return $this->db->get_where('user', ['id_user' => $id])->row_array();
    }

    public function getDataCheckout()
    {
        return $this->db->get('checkout')->result_array();
    }

    public function updateUser($id)
    {
        $data = array(
            'fullname' => htmlspecialchars($this->input->post('fullname', true)),
            'username' => htmlspecialchars($this->input->post('username', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'no_hp' => htmlspecialchars($this->input->post('no_hp', true)),
            'is_active' => $this->input->post('status')
        );
        $this->db->where('id_user', $id);
        return $this->db->update('user', $data);
    }

    public function addBarang()
    {
        $data = array(
            'nama_barang' => $this->input->post('nama_barang'),
            'brand' => $this->input->post('brand'),
            'warna_barang' => $this->input->post('warna_barang'),
            'harga' => $this->input->post('harga'),
            'stok' => $this->input->post('stok'),
            'image' => NULL,
        );
        $this->db->insert('barang', $data);
    }

    public function updateBarang($id)
    {
        $data = array(
            'nama_barang' => $this->input->post('nama_barang'),
            'brand' => $this->input->post('brand'),
            'warna_barang' => $this->input->post('warna_barang'),
            'harga' => $this->input->post('harga'),
            'stok' => $this->input->post('stok'),
        );
        $this->db->where('id_barang', $id);
        return $this->db->update('barang', $data);
    }

    public function deleteBarang($id)
    {
        $this->db->where('id_barang', $id);
        $query = $this->db->get('barang');
        $row = $query->row();
        if ($row->foto_produk == "default.png") {
            return $this->db->delete('barang', array('id_barang' => $id));
        } else {
            unlink("./assets/img/barang/$row->image");
            return $this->db->delete('barang', array('id_barang' => $id));
        }
    }

    public function deleteUser($id)
    {
        $this->db->where('id_user', $id);
        $query = $this->db->get('user');
        $row = $query->row();
        return $this->db->delete('user', array('id_user' => $id));
    }

    public function deleteTransaksi($id)
    {
        $this->db->where('id_transaksi', $id);
        $query = $this->db->get('transaksi');
        $row = $query->row();
        return $this->db->delete('transaksi', array('id_transaksi' => $id));
    }
}

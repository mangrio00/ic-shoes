<?php

class MainModel extends CI_Model
{
    public function getUserById($id)
    {
        return $this->db->get_where('user', ['id_user' => $id])->row_array();
    }

    public function updateUser($id)
    {
        $data = array(
            'fullname' => htmlspecialchars($this->input->post('fullname', true)),
            'username' => htmlspecialchars($this->input->post('username', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'no_hp' => htmlspecialchars($this->input->post('no_hp', true)),
        );
        $this->db->where('id_user', $id);
        return $this->db->update('user', $data);
    }

    public function findProduct($id)
    {
        $result = $this->db->where('id_barang', $id)
            ->limit(1)
            ->get('barang');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }

    public function destroyAllCart()
    {
        return  $this->cart->destroy();
    }
}

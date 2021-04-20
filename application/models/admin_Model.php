<?php

class admin_Model extends CI_Model
{

	public function get_Barang($idBarang)
	{
		return $this->db->get_where('barang',array('idBarang'=>$idBarang, 'isDelete'=>0))->row_array();
	}

	public function createBarang($params)
	{
		$params["Slug"]=slugify($params["namaBarang"]);
		$this->db->insert('barang',$params);
        return $this->db->insert_id();
	}

	public function updateBarang($id_barang, $params)
	{
		$params["Slug"]=slugify($params["namaBarang"]);
        $this->db->where('barang',$idbarang);
	
        return $this->db->update('barang',$params);
	}

	public function deleteBarang($idbarang)
    {
		$this->db->where("idBarang",$idbarang);
        return $this->db->update('Barang',array('isdelete'=>1));
    }

    public function get_User($idUser)
    {
        return $this->db->get_where('user',array('idUser'=>$idUser))->row_array();
    }

    public function addUser ($params)
    {
        $this->db->insert('user',$params);
        return $this->db->insert_id();
    }

    public function updateUser ($idUser,$params)
    {
        $this->db->where('idUser',$idUser);
        return $this->db->update('user',$params);
    }

    public function delete_customer($idUser)
    {
        return $this->db->delete('user',array('idUser'=>$idUser));
    }
}
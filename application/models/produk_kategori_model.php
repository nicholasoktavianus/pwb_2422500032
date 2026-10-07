<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_kategori_model extends CI_Model
{
    private $_table = 'kategori';

    public function get_all()
    {
        $this->db->order_by('id_kategori', 'ASC');
        return $this->db->get($this->_table)->result_array();
    }

    public function tambah($data)
    {
        $this->db->insert($this->_table, $data);
        // cek apakah berhasil atau tidak input data
        return ($this->db->affected_rows() == 1);
    }
}
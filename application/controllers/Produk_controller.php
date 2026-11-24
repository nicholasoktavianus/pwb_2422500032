<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('produk_model');
        $this->load->model('produk_kategori_model');
        $this->load->model('produk_gambar_model');
    }

    public function detail($id = 0)
    {
        if ($id == 0) {
            redirect('/');
            die;
        }

        $produk = $this->produk_model->get_by_id($id);
        if (!$produk) {
            redirect('/');
            die;
        }

        $data['produk'] = $produk;
        $data['gambar'] = $this->produk_gambar_model->get_by_produk_id($id);
        $data['kategori'] = $this->produk_kategori_model->get_by_id($produk['kategori_id']);
        $this->load->view('com/template/header');
        $this->load->view('com/produk_detail', $data);
        $this->load->view('com/template/footer');
    }
}
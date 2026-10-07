<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_admin_logged_in();               // helper login (admin_login_helper.php)
        $this->load->helper('form');        // form_error(), set_value()
        $this->load->model('Produk_kategori_model');
    }

    // ---------- helper internal (diawali _ sehingga tidak bisa diakses lewat URL) ----------

    private function _render($view, $data = array())
    {
        $data['full_name'] = $this->session->userdata('full_name'); // dipakai sidebar.php

        $this->load->view('administrator/templates/header', $data);
        $this->load->view('administrator/templates/sidebar', $data);
        $this->load->view($view, $data);
        $this->load->view('administrator/templates/footer');
    }

    private function _alert($type, $message)
    {
        $icon = ($type === 'success') ? 'fa-check-circle' : 'fa-exclamation-triangle';

        $this->session->set_flashdata('message',
            '<div class="alert alert-' . $type . ' alert-dismissible fade show" role="alert">
                <i class="fas ' . $icon . ' mr-2"></i> ' . $message . '
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
    }

    // ---------- READ ----------

    public function index()
    {
        $data['title']         = 'Kategori';
        $data['list_kategori'] = $this->Produk_kategori_model->get_all();

        $this->_render('administrator/kategori/index', $data);
    }

    // ---------- CREATE ----------

    public function tambah_kategori()
    {
        $data['title'] = 'Tambah Kategori';

        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');

        if ($this->form_validation->run() !== FALSE) {
            $this->_simpan_kategori();
        } else {
            $this->_render('administrator/kategori/tambah_kategori', $data);
        }
    }

    private function _simpan_kategori()
    {
        $data = array(
            'nama'      => ucwords($this->input->post('nama_kategori', TRUE)),
            'deskripsi' => ucfirst($this->input->post('deskripsi_kategori', TRUE))
        );

        if ($this->Produk_kategori_model->tambah($data)) {
            $this->_alert('success', 'Berhasil menambahkan kategori!!');
        } else {
            $this->_alert('danger', 'Gagal menambahkan kategori!!');
        }
        redirect('admin/kategori');
    }
        // ---------- DELETE ----------

    public function hapus_kategori($id)
    {
        // cek apakah ada kategori
        $kategori = $this->Produk_kategori_model->get_by_id($id);

        if ($kategori) {
            if ($this->Produk_kategori_model->hapus($id)) {
                $this->_alert('success', 'Berhasil menghapus kategori!!');
            } else {
                $this->_alert('danger', 'Gagal menghapus kategori!!');
            }
        } else {
            $this->_alert('danger', 'Kategori tidak ditemukan!!');
        }
        redirect('admin/kategori');
    }
}


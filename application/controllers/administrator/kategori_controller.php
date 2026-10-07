<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_admin_logged_in();   // helper login (admin_login_helper.php)
        $this->load->model('Produk_kategori_model');
    }

    public function index()
    {
        $data['title']         = 'Kategori';
        $data['full_name']     = $this->session->userdata('full_name'); // dipakai sidebar.php
        $data['list_kategori'] = $this->Produk_kategori_model->get_all();

        $this->load->view('administrator/templates/header', $data);
        $this->load->view('administrator/templates/sidebar', $data);
        $this->load->view('administrator/kategori/index', $data);
        $this->load->view('administrator/templates/footer');
    }
}

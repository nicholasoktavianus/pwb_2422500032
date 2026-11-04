
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ekspedisi2422500032_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_admin_logged_in();

        $this->load->model('ekspedisi2422500032_model');
        $this->load->library('form_validation');
    }

    private function render($view, $data = array())
    {
        $data['title'] = isset($data['title'])
            ? $data['title']
            : 'Ekspedisi';

        $data['full_name'] = $this->session->userdata('full_name');

        $this->load->view('administrator/templates/header', $data);
        $this->load->view('administrator/templates/sidebar', $data);
        $this->load->view('ekspedisi2422500032/' . $view, $data);
        $this->load->view('administrator/templates/footer');
    }

    // MENAMPILKAN DATA EKSPEDISI
    public function index()
    {
        $data['title'] = 'Data Ekspedisi | PWB';

        $data['ekspedisi2422500032'] =
            $this->ekspedisi2422500032_model->get_all();

        $this->render('index', $data);
    }

    // FORM TAMBAH EKSPEDISI
    public function tambah()
    {
        $this->render('tambah_ekspedisi2422500032', array(
            'title' => 'Tambah Ekspedisi | PWB'
        ));
    }

    // PROSES SIMPAN EKSPEDISI
    public function simpan()
    {
        $this->form_validation->set_rules(
            'nama_ekspedisi032',
            'Nama Ekspedisi',
            'required|trim|max_length[100]'
        );

        $this->form_validation->set_rules(
            'jenis_layanan032',
            'Jenis Layanan',
            'trim|max_length[100]'
        );

        $this->form_validation->set_rules(
            'tarif_per_kg032',
            'Tarif Per Kilogram',
            'required|numeric|greater_than_equal_to[0]'
        );

        $this->form_validation->set_rules(
            'status032',
            'Status',
            'required|in_list[Aktif,Nonaktif]'
        );

        if ($this->form_validation->run() == FALSE) {

            $this->render('tambah_ekspedisi2422500032', array(
                'title' => 'Tambah Ekspedisi | PWB'
            ));

            return;
        }

        $data = array(
            'nama_ekspedisi032' => trim(
                $this->input->post('nama_ekspedisi032', TRUE)
            ),

            'jenis_layanan032' => trim(
                $this->input->post('jenis_layanan032', TRUE)
            ),

            'tarif_per_kg032' => $this->input->post(
                'tarif_per_kg032',
                TRUE
            ),

            'status032' => $this->input->post(
                'status032',
                TRUE
            )
        );

        if ($this->ekspedisi2422500032_model->insert($data)) {

            $this->session->set_flashdata(
                'success',
                'Data ekspedisi berhasil ditambahkan.'
            );

        } else {

            $this->session->set_flashdata(
                'error',
                'Data ekspedisi gagal ditambahkan.'
            );
        }

        redirect('admin/ekspedisi2422500032');
    }

    // HAPUS DATA EKSPEDISI
    public function hapus($id)
    {
        $ekspedisi = $this->ekspedisi2422500032_model->get_by_id($id);

        if (!$ekspedisi) {
            show_404();
            return;
        }

        if ($this->ekspedisi2422500032_model->delete($id)) {

            $this->session->set_flashdata(
                'success',
                'Data ekspedisi berhasil dihapus.'
            );

        } else {

            $this->session->set_flashdata(
                'error',
                'Data ekspedisi gagal dihapus.'
            );
        }

        redirect('admin/ekspedisi2422500032');
    }

    // FORM UBAH EKSPEDISI
    public function ubah($id)
    {
        $ekspedisi2422500032 =
            $this->ekspedisi2422500032_model->get_by_id($id);

        if (!$ekspedisi2422500032) {
            show_404();
            return;
        }

        $this->render('ubah_ekspedisi2422500032', array(
            'title' => 'Ubah Ekspedisi | PWB',
            'ekspedisi2422500032' => $ekspedisi2422500032
        ));
    }

    // PROSES UPDATE EKSPEDISI
    public function update($id)
    {
        $ekspedisi2422500032 =
            $this->ekspedisi2422500032_model->get_by_id($id);

        if (!$ekspedisi2422500032) {
            show_404();
            return;
        }

        $this->form_validation->set_rules(
            'nama_ekspedisi032',
            'Nama Ekspedisi',
            'required|trim|max_length[100]'
        );

        $this->form_validation->set_rules(
            'jenis_layanan032',
            'Jenis Layanan',
            'trim|max_length[100]'
        );

        $this->form_validation->set_rules(
            'tarif_per_kg032',
            'Tarif Per Kilogram',
            'required|numeric|greater_than_equal_to[0]'
        );

        $this->form_validation->set_rules(
            'status032',
            'Status',
            'required|in_list[Aktif,Nonaktif]'
        );

        if ($this->form_validation->run() == FALSE) {

            $this->render('ubah_ekspedisi2422500032', array(
                'title' => 'Ubah Ekspedisi | PWB',
                'ekspedisi2422500032' => $ekspedisi2422500032
            ));

            return;
        }

        $data = array(
            'nama_ekspedisi032' => trim(
                $this->input->post('nama_ekspedisi032', TRUE)
            ),

            'jenis_layanan032' => trim(
                $this->input->post('jenis_layanan032', TRUE)
            ),

            'tarif_per_kg032' => $this->input->post(
                'tarif_per_kg032',
                TRUE
            ),

            'status032' => $this->input->post(
                'status032',
                TRUE
            )
        );

        if ($this->ekspedisi2422500032_model->update($id, $data)) {

            $this->session->set_flashdata(
                'success',
                'Data ekspedisi berhasil diperbarui.'
            );

        } else {

            $this->session->set_flashdata(
                'error',
                'Data ekspedisi gagal diperbarui.'
            );
        }

        redirect('admin/ekspedisi2422500032');
    }
}

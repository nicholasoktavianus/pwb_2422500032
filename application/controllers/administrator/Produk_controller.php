<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        is_admin_logged_in();

        $this->load->model('produk_model');
        $this->load->model('produk_kategori_model');
        $this->load->model('produk_gambar_model');
    }

    public function index()
    {
        $data['title'] = 'Daftar Produk';
        $data['list_produk'] = $this->produk_model->get_all();

        $this->load->view(
            'administrator/templates/header',
            $data
        );
        $this->load->view(
            'administrator/templates/sidebar',
            $data
        );
        $this->load->view(
            'administrator/produk/index',
            $data
        );
        $this->load->view(
            'administrator/templates/footer',
            $data
        );
    }

    public function tambah_produk()
    {
        $data['title'] = 'Tambah Produk';

        $this->form_validation->set_rules(
            'nama_produk',
            'Nama produk',
            'required'
        );

        $this->form_validation->set_rules(
            'kategori_produk',
            'Kategori',
            'required'
        );

        if ($this->form_validation->run() == FALSE) {
            $data['list_kategori'] =
                $this->produk_kategori_model->get_all();

            $this->load->view(
                'administrator/templates/header',
                $data
            );
            $this->load->view(
                'administrator/templates/sidebar',
                $data
            );
            $this->load->view(
                'administrator/produk/tambah_produk',
                $data
            );
            $this->load->view(
                'administrator/templates/footer',
                $data
            );
        } else {
            $this->__simpan_produk();
        }
    }

    private function __simpan_produk()
    {
        $data = [
            'nama' => ucwords(
                $this->input->post('nama_produk')
            ),
            'kategori_id' => $this->input->post(
                'kategori_produk'
            ),
            'harga' => $this->input->post('harga_produk'),
            'stok' => $this->input->post('stok_produk'),
            'deskripsi' => ucfirst(
                $this->input->post('deskripsi_produk')
            )
        ];

        // Simpan dan return id_produk yang disimpan
        $id_produk = $this->produk_model->tambah($data);

        // Jika simpan data, lakukan upload gambar
        if ($id_produk) {
            $count = count($_FILES['gambar_produk']['name']);

            if ($count > 0) {
                $this->__produk_gambar_upload(
                    $count,
                    $id_produk
                );
            }

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                        <use xlink:href="#check-circle-fill" />
                    </svg>
                    <div>Berhasil menambahkan produk!!</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
        }

        redirect('admin/produk');
    }

    private function __produk_gambar_upload($count, $id_produk)
    {
        for ($i = 0; $i < $count; $i++) {
            if (!empty($_FILES['gambar_produk']['name'][$i])) {
                $_FILES['file']['name'] =
                    $_FILES['gambar_produk']['name'][$i];

                $_FILES['file']['type'] =
                    $_FILES['gambar_produk']['type'][$i];

                $_FILES['file']['tmp_name'] =
                    $_FILES['gambar_produk']['tmp_name'][$i];

                $_FILES['file']['error'] =
                    $_FILES['gambar_produk']['error'][$i];

                $_FILES['file']['size'] =
                    $_FILES['gambar_produk']['size'][$i];

                $config['upload_path'] = 'uploads/produk/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = '5000';

                $config['file_name'] =
                    'produk-' . $id_produk . '-' . $i;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('file')) {
                    $uploadData = $this->upload->data();

                    $filename = $uploadData['file_name'];

                    $data = [
                        'nama_gambar' => $filename,
                        'produk_id' => $id_produk
                    ];

                    $this->produk_gambar_model->tambah($data);
                }
            }
        }
    }

    public function ubah_produk($id)
    {
        // Check dulu apakah id dengan produk ada?
        $produk = $this->produk_model->get_by_id($id);

        if ($produk) {
            $this->form_validation->set_rules(
                'nama_produk',
                'Nama produk',
                'required'
            );

            $this->form_validation->set_rules(
                'kategori_produk',
                'Kategori',
                'required'
            );

            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Ubah produk';
                $data['produk'] = $produk;

                $data['list_kategori'] =
                    $this->produk_kategori_model->get_all();

                // Kirim daftar gambar produk ke view
                $data['list_gambar'] =
                    $this->produk_gambar_model->get_by_produk_id($id);

                // Tetap kirim model agar kompatibel dengan view lama
                $data['gambar_model'] =
                    $this->produk_gambar_model;

                $this->load->view(
                    'administrator/templates/header',
                    $data
                );
                $this->load->view(
                    'administrator/templates/sidebar',
                    $data
                );
                $this->load->view(
                    'administrator/produk/ubah_produk',
                    $data
                );
                $this->load->view(
                    'administrator/templates/footer',
                    $data
                );
            } else {
                $this->__ubah_produk($id);
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                        <use xlink:href="#exclamation-triangle-fill" />
                    </svg>
                    <div>produk tidak ditemukan!!</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );

            redirect('admin/produk');
        }
    }

    
    private function __ubah_produk($id)
    {
        // Ambil data produk dari formulir
        $data = [
            'nama'        => ucwords($this->input->post('nama_produk')),
            'kategori_id' => $this->input->post('kategori_produk'),
            'harga'       => $this->input->post('harga_produk'),
            'stok'        => $this->input->post('stok_produk'),
            'deskripsi'   => ucfirst($this->input->post('deskripsi_produk'))
        ];

        // Perbarui data utama produk
        $ubah = $this->produk_model->ubah($data, $id);
        $gambar_berhasil = true;
        $ada_gambar_baru = false;

        // Proses upload hanya jika ada file yang dipilih
        if (
            isset($_FILES['gambar_produk']['name']) &&
            is_array($_FILES['gambar_produk']['name'])
        ) {
            $jumlah_file = count($_FILES['gambar_produk']['name']);

            $config = [
                'upload_path'   => FCPATH . 'uploads/produk/',
                'allowed_types' => 'jpg|jpeg|png|gif',
                'max_size'      => 5000,
                'encrypt_name'  => true
            ];

            if (!is_dir($config['upload_path'])) {
                $gambar_berhasil = false;
                log_message('error', 'Folder uploads/produk/ tidak ditemukan.');
            } else {
                $this->load->library('upload');

                for ($i = 0; $i < $jumlah_file; $i++) {
                    if (empty($_FILES['gambar_produk']['name'][$i])) {
                        continue;
                    }

                    $ada_gambar_baru = true;

                    // Ubah input beberapa file menjadi satu file untuk CI Upload
                    $_FILES['file_upload'] = [
                        'name'     => $_FILES['gambar_produk']['name'][$i],
                        'type'     => $_FILES['gambar_produk']['type'][$i],
                        'tmp_name' => $_FILES['gambar_produk']['tmp_name'][$i],
                        'error'    => $_FILES['gambar_produk']['error'][$i],
                        'size'     => $_FILES['gambar_produk']['size'][$i]
                    ];

                    $this->upload->initialize($config, true);

                    if ($this->upload->do_upload('file_upload')) {
                        $file = $this->upload->data();

                        $data_gambar = [
                            'nama_gambar' => $file['file_name'],
                            'produk_id'   => $id
                        ];

                        $simpan_gambar =
                            $this->produk_gambar_model->tambah($data_gambar);

                        if ($simpan_gambar === false) {
                            $gambar_berhasil = false;
                            @unlink($file['full_path']);
                            log_message(
                                'error',
                                'Gagal menyimpan data gambar ke database.'
                            );
                        }
                    } else {
                        $gambar_berhasil = false;
                        log_message(
                            'error',
                            'Upload gambar produk gagal: ' .
                            $this->upload->display_errors('', '')
                        );
                    }
                }
            }
        }

        if ($ubah !== false && $gambar_berhasil) {
            $pesan = $ada_gambar_baru
                ? 'Produk berhasil diubah dan gambar baru berhasil ditambahkan.'
                : 'Produk berhasil diubah.';

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success">' . $pesan . '</div>'
            );
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger">Produk gagal diubah atau gambar gagal diunggah. Periksa log error.</div>'
            );
        }

        redirect('admin/produk');
    }

    public function hapus_produk($id)
    {
        // ... isi hapus_produk kamu, tidak diubah ...
    }   // <- penutup hapus_produk

    // TAMBAHKAN DI SINI
    public function hapus_gambar($id)
    {
        $gambar = $this->produk_gambar_model->get_by_id($id);

        if ($gambar) {
            // Hapus data di database
            $this->produk_gambar_model->hapus($id);

            // Hapus file gambar di folder
            $path = FCPATH . 'uploads/produk/' . $gambar['nama_gambar'];
            if (file_exists($path)) {
                unlink($path);
            }

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success">Berhasil menghapus gambar!!</div>'
            );

            // Kembali ke halaman ubah produk yang sama
            redirect('admin/produk/ubah/' . $gambar['produk_id']);
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger">Gambar tidak ditemukan!!</div>'
            );
            redirect('admin/produk');
        }
    }
}   // <- penutup class, tetap paling bawah
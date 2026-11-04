
<div class="content-wrapper">

    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Ekspedisi</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="<?= site_url('admin/dashboard'); ?>">Home</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Ekspedisi
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">

            <div class="card">

                <div class="card-header">
                    <h3 class="card-title">Data Ekspedisi</h3>
                </div>

                <div class="card-body">

                    <!-- Notifikasi Berhasil -->
                    <?php if ($this->session->flashdata('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert">
                                &times;
                            </button>
                            <i class="fas fa-check-circle"></i>
                            <?= html_escape($this->session->flashdata('success')); ?>
                        </div>
                    <?php endif; ?>

                    <!-- Notifikasi Gagal -->
                    <?php if ($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert">
                                &times;
                            </button>
                            <i class="fas fa-exclamation-circle"></i>
                            <?= html_escape($this->session->flashdata('error')); ?>
                        </div>
                    <?php endif; ?>

                    <!-- Tombol Tambah -->
                    <div class="mb-3">
                        <a href="<?= site_url('admin/ekspedisi2422500032/tambah'); ?>"
                           class="btn btn-primary">
                            <i class="fas fa-plus"></i> Ekspedisi
                        </a>
                    </div>

                    <!-- Tabel Ekspedisi -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">

                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Nama Ekspedisi</th>
                                    <th>Jenis Layanan</th>
                                    <th>Tarif Per Kilogram</th>
                                    <th>Status</th>
                                    <th width="15%">Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php if (!empty($ekspedisi2422500032)): ?>

                                    <?php $no = 1; ?>

                                    <?php foreach ($ekspedisi2422500032 as $row): ?>

                                        <tr>
                                            <td><?= $no++; ?></td>

                                            <td>
                                                <?= html_escape($row['nama_ekspedisi032']); ?>
                                            </td>

                                            <td>
                                                <?= html_escape($row['jenis_layanan032']); ?>
                                            </td>

                                            <td>
                                                Rp <?= number_format(
                                                    (float) $row['tarif_per_kg032'],
                                                    0,
                                                    ',',
                                                    '.'
                                                ); ?>
                                            </td>

                                            <td>
                                                <?php if ($row['status032'] == 'Aktif'): ?>
                                                    <span class="badge badge-success">
                                                        Aktif
                                                    </span>
                                                <?php else: ?>
                                                    <span class="badge badge-danger">
                                                        Nonaktif
                                                    </span>
                                                <?php endif; ?>
                                            </td>

                                            <!-- Tombol Action -->
                                            <td>
                                                <a href="<?= site_url('admin/ekspedisi2422500032/ubah/' . $row['id_ekspedisi032']); ?>"
                                                   class="btn btn-success btn-sm">
                                                    Ubah
                                                </a>

                                                <a href="<?= site_url('admin/ekspedisi2422500032/hapus/' . $row['id_ekspedisi032']); ?>"
                                                   class="btn btn-danger btn-sm"
                                                   onclick="return confirm('Apakah Anda yakin ingin menghapus data ekspedisi ini?');">
                                                    Hapus
                                                </a>
                                            </td>
                                        </tr>

                                    <?php endforeach; ?>

                                <?php else: ?>

                                    <tr>
                                        <td colspan="6" class="text-center">
                                            <i class="fas fa-info-circle"></i>
                                            Belum ada data ekspedisi.
                                        </td>
                                    </tr>

                                <?php endif; ?>

                            </tbody>

                        </table>
                    </div>

                </div>

            </div>

        </div>
    </section>

</div>

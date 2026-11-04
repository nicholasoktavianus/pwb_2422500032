
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Ekspedisi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="<?= site_url('admin/dashboard'); ?>">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="<?= site_url('admin/ekspedisi2422500032'); ?>">Ekspedisi</a>
                        </li>
                        <li class="breadcrumb-item active">Tambah</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">

                <div class="card-header">
                    <h3 class="card-title">Form Tambah Ekspedisi</h3>
                </div>

                <?= form_open('admin/ekspedisi2422500032/simpan'); ?>

                <div class="card-body">

                    <?php if (validation_errors()): ?>
                        <div class="alert alert-danger">
                            <?= validation_errors(); ?>
                        </div>
                    <?php endif; ?>

                    <div class="form-group">
                        <label for="nama_ekspedisi032">Nama Ekspedisi</label>
                        <input
                            type="text"
                            name="nama_ekspedisi032"
                            id="nama_ekspedisi032"
                            class="form-control"
                            maxlength="100"
                            value="<?= set_value('nama_ekspedisi032'); ?>"
                            placeholder="JNE, JNT, dll"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="jenis_layanan032">Jenis Layanan</label>
                        <textarea
                            name="jenis_layanan032"
                            id="jenis_layanan032"
                            class="form-control"
                            rows="3"
                            maxlength="100"
                            placeholder="Reguler, Express"><?= set_value('jenis_layanan032'); ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="tarif_per_kg032">Tarif Per Kilogram</label>
                        <input
                            type="number"
                            name="tarif_per_kg032"
                            id="tarif_per_kg032"
                            class="form-control"
                            min="0"
                            step="1"
                            value="<?= set_value('tarif_per_kg032'); ?>"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="status032">Status</label>
                        <select
                            name="status032"
                            id="status032"
                            class="form-control"
                            required>
                            <option value=""> Aktif, Tidak Aktif </option>
                            <option value="Aktif" <?= set_select('status032', 'Aktif'); ?>>
                                Aktif
                            </option>
                            <option value="Nonaktif" <?= set_select('status032', 'Nonaktif'); ?>>
                                Nonaktif
                            </option>
                        </select>
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan
                    </button>

                    <a href="<?= site_url('admin/ekspedisi2422500032'); ?>"
                       class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Batal
                    </a>
                </div>

                <?= form_close(); ?>

            </div>
        </div>
    </section>
</div>

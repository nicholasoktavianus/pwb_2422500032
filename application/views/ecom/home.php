<style>
    .diskon {
        position: absolute;
        top: 8px;
        right: 16px;
    }
</style>
<div class="container mb-3">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">

        <?php foreach ($list_produk as $key => $value) : ?>
            <div class="col">
                <div class="card shadow-sm">
                    <?php
                    $gambar = $gambar_model->get_by_produk_id($value['id_produk']);
                    ?>
                    <a href="<?= base_url('produk/') . $value['id_produk'] ?>">
                        <img src="<?= base_url('uploads') ?>/produk/<?= $gambar[0]['nama_gambar']; ?>"
                            class="d-block w-100" alt="...">
                    </a>
                    <div class="card-body">
                        <a href="<?= base_url('produk/') . $value['id_produk'] ?>">
                            <h5 class="card-title"><?= $value['pd_nama'] ?></h5>
                        </a>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="harga d-flex" style="color:dark">
                                <small>Rp.</small>
                                <h4><?= number_format($value['harga']) ?></h4>
                            </div>
                            <small>
                                <p>2 terjual</p>
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>

    </div>
</div>

<div class="container mt-4 text-center">
    <button type="button" class="btn btn-outline-primary">Lihat Semua Produk</button>
</div>
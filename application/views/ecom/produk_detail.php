<style>
    .image-produk {
        width: 100%
    }

    .image-nav {
        width: 100%;
        padding: 8%
    }
</style>
<?php if ($this->session->flashdata('message')): ?>
<div class="alert alert-info alert-dismissible fade show" role="alert">
    <?= $this->session->flashdata('message'); ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>

<div class="container mb-3 mt-4">
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-1 text-center">
            <h4><?= $produk['nama'] ?></h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-small">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $kategori['nama'] ?></li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-5">
            <div class="product-slick mb-2">
                <?php foreach ($list_gambar as $gambar) : ?>
                <div><img src="<?= base_url('uploads/produk') ?>/<?= $gambar['nama_gambar'] ?>" alt="" class="image-produk img-fluid"></div>
                <?php endforeach ?>
            </div>
            <div class="col-12 p-2">
                <div class="slider-nav">
                    <?php foreach ($list_gambar as $gambar) : ?>
                    <div><img src="<?= base_url('uploads/produk') ?>/<?= $gambar['nama_gambar'] ?>" alt="" class="image-nav img-fluid"></div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="produk-detail">
                <div class="pro-group">
                    <h2><?= $produk['nama'] ?></h2>
                    <h5>Rp <?= number_format($produk['harga']) ?> </h5>
                    <p>ID Produk: <?= $produk['id_produk'] ?></p>
                    <p>STOK: <?= $produk['stok'] ?></p>
                    <div class="produk-order mb-0">
                        <h6 class="produk-title">jumlah beli</h6>
                        <form action="<?= base_url('keranjang/tambah') ?>" method="post">
                            <input type="hidden" name="id_produk" value="<?= $produk['id_produk'] ?>">
                            <div class="input-group">
                                <input class="form-control" name="jumlah" type="number" value="1">
                            </div>
                            <div class="product-buttons mt-4 mb-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>
                                    tambah ke keranjang</button>
                            </div>
                        </form>
                    </div>

                    <div class="deskripsi">
                        <h4>Deskripsi:/M4</h4>
                        <p><?= $produk['deskripsi'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        console.log('lucing garong')
        $('.product-slick').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '.slider-nav'
        });
        $('.slider-nav').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.product-slick',
            dots: true,
            centerMode: true,
            focusOnSelect: true
        });
        // $('.your-class').slick({
        //  setting - name: setting - value
        //  });
    });
</script>
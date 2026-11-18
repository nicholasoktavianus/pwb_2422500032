<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
<title>Dashboard - Title</title>
<!-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" /> -->
<link href="<?= base_url() ?>assets/css/styles.css" rel="stylesheet" />
<script src="<?= base_url() ?>assets/plugins/fontawesome/js/all.js" crossorigin="anonymous"></script>
<script src="<?= base_url() ?>assets/plugins/jquery/jquery-1.11.0.min.js" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/plugins/slick/slick.css" />
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/plugins/slick/slick-theme.css" />

</head>

<body class="sb-nav-fixed">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-2" aria-label="Eighth navbar example">
        <div class="container">
            <a class="navbar-brand" href="#">Title</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample07">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Kategori</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
                <form role="search" class="me-3">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                </form>

        <?php if ($this->session->has_userdata('pelanggan_login')) : ?>
        <div class="text-end">
            <a href="<?= base_url('keranjang') ?>" class="btn btn-outline-light me-2 ">Keranjang</a>
            <a href="<?= base_url('logout') ?>" class="btn btn-danger">Logout</a>
        </div>
        <?php else : ?>
        <div class="text-end">
            <a href="<?= base_url('login') ?>" class="btn btn-outline-light me-2 ">Login</a>
            <a href="<?= base_url('register') ?>" class="btn btn-warning">Register</a>
        </div>
        <?php endif ?>

        </div>
    </div>
</nav>
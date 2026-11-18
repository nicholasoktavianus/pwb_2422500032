<div class="container mb-3 mt-4">
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-1 text-center">
            <h4>Register</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-small">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">register</li>
                </ol>
            </nav>
        </div>
    </div>

    <?php if ($this->session->flashdata('message')) : ?>
        <div class="row">
            <div class="col-lg-10">
                <?= $this->session->flashdata('message') ?>
            </div>
        </div>
    <?php endif ?>

    <form action="" method="POST" id="formReg">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="mb-3">
                    <div class="form-floating">
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Lengkap" required>
                        <label for="nama">Nama Lengkap</label>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-floating">
                        <input type="number" name="nopon" class="form-control" id="nopon" placeholder="No Telpon" required>
                        <label for="nopon">No Telpon</label>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-floating">
                        <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Jalan" required>
                        <label for="alamat">Alamat Jalan</label>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-floating">
                        <input type="text" name="kota" class="form-control" id="kota" placeholder="kota" required>
                        <label for="kota">Kota</label>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="mb-3">
                    <div class="form-floating">
                        <input type="number" name="kodepos" class="form-control" id="kodepos" placeholder="kode pos" required>
                        <label for="kodepos">Kode Pos</label>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-floating">
                        <input type="text" name="provinsi" class="form-control" id="provinsi" placeholder="provinsi" required>
                        <label for="provinsi">Provinsi</label>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-floating">
                        <input type="email" name="email" class="form-control" id="email" placeholder="mrx@gmail.com" required>
                        <label for="email">Email</label>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control" id="password" required>
                        <label for="password">Password</label>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="row justify-content-center mt-3 mb-5">
        <div class="col-lg-10">
            <button class="w-100 btn btn-lg btn-primary mb-3" type="submit" form="formReg">Register</button>
            <hr>
            <a href="<?= base_url('login') ?>" class="w-100 btn btn-lg btn-success mt-3" type="submit" form="formReg">Login</a>
        </div>
    </div>
</div>
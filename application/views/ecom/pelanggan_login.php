<div class="container mb-3 mt-4">
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-1 text-center">
            <h4>Login</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-small">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">login</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row justify-content-center mb-5">
        <div class="col-lg-5">

            <?php if ($this->session->flashdata('message')) : ?>
                <?= $this->session->flashdata('message') ?>
            <?php endif ?>

            <main class="form-signin w-100 m-auto">
                <form id="form_login" method="POST" data-bitwarden-watching="1">
                    <div class="form-floating">
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                        <label for="email">Alamat Email</label>
                    </div>
                    <div class="form-floating mt-3">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                        <label for="password">Password</label>
                    </div>

                    <div class="checkbox mt-3 mb-3">
                        <label>
                            <input type="checkbox" value="remember-me"> Remember me
                        </label>
                    </div>

                    <button form="form_login" class="w-100 btn btn-lg btn-success" type="submit">Login</button>
                    <hr>
                    <a href="<?= base_url('register') ?>" class="w-100 btn btn-lg btn-primary" type="submit">Register</a>
                </form>
            </main>
        </div>
    </div>
</div>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="<?= site_url('admin/dashboard'); ?>" class="brand-link">
            <img src="<?= base_url('assets/dist/img/AdminLTELogo.png'); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity:.8">
            <span class="brand-text font-weight-light">TOKO Snack</span>
        </a>
        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image"><img src="<?= base_url('assets/dist/img/user2-160x160.jpg'); ?>" class="img-circle elevation-2" alt="User Image"></div>
                <div class="info"><a href="#" class="d-block">Nico Snack</a></div>
            </div>
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append"><button class="btn btn-sidebar"><i class="fas fa-search fa-fw"></i></button></div>
                </div>
            </div>
            <?php $current_uri = uri_string(); $is_master = (strpos($current_uri, 'admin/kategori') !== false || strpos($current_uri, 'admin/produk') !== false); ?>
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item <?= $is_master ? 'menu-open' : ''; ?>">
                        <a href="#" class="nav-link <?= $is_master ? 'active' : ''; ?>"><i class="nav-icon fas fa-tachometer-alt"></i><p>Master<i class="right fas fa-angle-left"></i></p></a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item"><a href="<?= site_url('admin/kategori'); ?>" class="nav-link <?= (strpos($current_uri, 'admin/kategori') !== false) ? 'active' : ''; ?>"><i class="far fa-circle nav-icon"></i><p>Kategori</p></a></li>
                            <li class="nav-item"><a href="<?= site_url('admin/produk'); ?>" class="nav-link <?= (strpos($current_uri, 'admin/produk') !== false) ? 'active' : ''; ?>"><i class="far fa-circle nav-icon"></i><p>Produk</p></a></li>
                            <li class="nav-item"><a href="<?= site_url('admin/ekspedisi2422500032'); ?>" class="nav-link <?= (strpos($current_uri, 'admin/ekspedisi2422500068') !== false) ? 'active' : ''; ?>"><i class="far fa-circle nav-icon"></i><p>Ekspedisi</p></a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a href="<?= site_url('admin/logout'); ?>" class="nav-link"><i class="nav-icon fas fa-th"></i><p>Logout</p></a></li>
                </ul>
            </nav>
        </div>
    </aside>

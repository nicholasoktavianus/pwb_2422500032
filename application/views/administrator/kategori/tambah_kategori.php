<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Starter Page</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('admin/kategori'); ?>">Kategori</a></li>
            <li class="breadcrumb-item active">Tambah</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tambah Kategori</h5>

              <form method="post" class="mt-4">
                <div class="form-group">
                  <label for="nama_kategori">Nama Kategori</label>
                  <input type="text" class="form-control" name="nama_kategori" id="nama_kategori"
                         value="<?= set_value('nama_kategori'); ?>">
                  <?= form_error('nama_kategori', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                  <label for="deskripsi_kategori">Deskripsi</label>
                  <textarea name="deskripsi_kategori" id="deskripsi_kategori" cols="30" rows="10"
                            class="form-control"><?= set_value('deskripsi_kategori'); ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
                <a href="<?= base_url('admin/kategori'); ?>" class="btn btn-danger">Kembali</a>
              </form>
            </div>
          </div>
        </div>
        <!-- /.col-lg-12 -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

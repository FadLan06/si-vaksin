<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"> <?= $title ?></h1>
        </div>
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-lg-12">
          <div class="card card-warning card-outline">
            <div class="card-body">
              <button onclick="location.href='<?= base_url('Pegawai') ?>'" class="btn btn-warning btn-sm"><i class="fas fa-backward"></i> Kembali</button>
              <hr class="bg-warning">
              <form action="<?= base_url('Dasar/Tambah') ?>" method="post">
                    <div class="form-group">
                        <input type="Text" name="kegiatan" class="form-control" placeholder="Nama Kegiatan">
                        <small class="form-text text-danger"><?= form_error('kegiatan') ?></small>
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fas fa-arrow-alt-circle-right"></i> Lanjut</button>
                </form>
            </div>
          </div><!-- /.card -->
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
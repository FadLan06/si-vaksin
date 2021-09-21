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
          <div class="card card-primary card-outline">
            <div class="card-body">
              <form action="<?= base_url('Tendik/Tambah') ?>" method="POST">
                <div class="row">
                  <div class="col-md-12 mx-auto">
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="id">ID</label>
                        <input id="id" type="text" class="form-control" name="id" required autocomplete="off">
                        <small class="text-danger pl-3" id="cek_id" hidden>ID ini sudah pernah ditambahkan...</small>
                        <?= form_error('id', '<small class="text-danger pl-3">', '</small>') ?>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="nama">Nama Lengkap</label>
                        <input id="nama" type="text" class="form-control" name="nama" required autocomplete="off">
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="jabatan">Jabatan</label>
                      <input id="jabatan" type="text" class="form-control" name="jabatan" required autocomplete="off">
                      <?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-4">
                        <label for="username">Username</label>
                        <input id="username" type="text" class="form-control" name="username" required autocomplete="off">
                        <?= form_error('username', '<small class="text-danger pl-3">', '</small>') ?>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="password" class="d-block">Password</label>
                        <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password" required autocomplete="off">
                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="password2" class="d-block">Konfirmasi Password</label>
                        <input id="password2" type="password" class="form-control" name="password-confirm" required autocomplete="off">
                        <?= form_error('password-confirm', '<small class="text-danger pl-3">', '</small>') ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <button onclick="location.href='<?= base_url('Tendik') ?>'" class="btn btn-warning btn-sm"><i class="fas fa-backward"></i> Kembali</button>
                      <button type="submit" name="simpan" class="btn btn-primary btn-sm"><i class="fas fa-plus-circle"></i> Tambah</button>
                    </div>
                  </div>
                </div>
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
<script src="<?= base_url('assets') ?>/plugins/jquery/jquery.min.js"></script>
<script>
  $(document).on('change', '#id', function() {
    var id = $('#id').val();
    $.ajax({
      type: 'POST',
      url: '<?= site_url() . 'Tendik/cek_id' ?>',
      data: {
        id: id
      },
      success: function(data) {
        if (data) {
          $('#cek_id').prop('hidden', false);
        } else {
          $('#cek_id').prop('hidden', true);
        }
      }
    });
  });
</script>
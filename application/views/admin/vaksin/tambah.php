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
        <div class="col-lg-4">
          <div class="card card-primary card-outline">
            <div class="card-body">
              <form action="<?= base_url('Dosen/Tambah') ?>" method="POST">
                <div class="row">
                  <div class="col-md-12 mx-auto">
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="nip">NIP</label>
                        <input id="nip" type="text" class="form-control" name="nip" required autocomplete="off">
                        <small class="text-danger pl-3" id="cek_nip" hidden>NIP ini sudah pernah ditambahkan...</small>
                        <?= form_error('nip', '<small class="text-danger pl-3">', '</small>') ?>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="nama">Nama Lengkap</label>
                        <input id="nama" type="text" class="form-control" name="nama" required autocomplete="off">
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <button type="submit" name="simpan" class="btn btn-primary btn-sm"><i class="fas fa-plus-circle"></i> Tambah</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div><!-- /.card -->
        </div>
        <div class="col-lg-4">
          <div class="card card-primary card-outline">
            <div class="card-body">
              <form action="<?= base_url('Dosen/Tambah') ?>" method="POST">
                <div class="row">
                  <div class="col-md-12 mx-auto">
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="nip">NIP</label>
                        <input id="nip" type="text" class="form-control" name="nip" required autocomplete="off">
                        <small class="text-danger pl-3" id="cek_nip" hidden>NIP ini sudah pernah ditambahkan...</small>
                        <?= form_error('nip', '<small class="text-danger pl-3">', '</small>') ?>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="nama">Nama Lengkap</label>
                        <input id="nama" type="text" class="form-control" name="nama" required autocomplete="off">
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <button type="submit" name="simpan" class="btn btn-primary btn-sm"><i class="fas fa-plus-circle"></i> Tambah</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div><!-- /.card -->
        </div>
        <div class="col-lg-4">
          <div class="card card-primary card-outline">
            <div class="card-body">
              <form action="<?= base_url('Dosen/Tambah') ?>" method="POST">
                <div class="row">
                  <div class="col-md-12 mx-auto">
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="nip">NIP</label>
                        <input id="nip" type="text" class="form-control" name="nip" required autocomplete="off">
                        <small class="text-danger pl-3" id="cek_nip" hidden>NIP ini sudah pernah ditambahkan...</small>
                        <?= form_error('nip', '<small class="text-danger pl-3">', '</small>') ?>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="nama">Nama Lengkap</label>
                        <input id="nama" type="text" class="form-control" name="nama" required autocomplete="off">
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                      </div>
                    </div>
                    <div class="form-group">
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
  $(document).on('change', '#nip', function() {
    var nip = $('#nip').val();
    $.ajax({
      type: 'POST',
      url: '<?= site_url() . 'dosen/cek_nip' ?>',
      data: {
        nip: nip
      },
      success: function(data) {
        if (data) {
          $('#cek_nip').prop('hidden', false);
        } else {
          $('#cek_nip').prop('hidden', true);
        }
      }
    });
  });
</script>
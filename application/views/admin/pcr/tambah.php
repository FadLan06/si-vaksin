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
              <form action="<?= base_url('Pcr/Simpan') ?>" enctype="multipart/form-data" method="POST">
                <div class="row">
                  <div class="col-md-12 mx-auto">
                    <div class="row">
                      <input id="kategori" type="hidden" class="form-control" name="kategori" value="<?=$this->uri->segment(3)?>" required autocomplete="off">
                      <?php if ($this->uri->segment(3) == 2) : ?>
                        <div class="form-group col-md-3">
                          <label for="nip">NIP</label>
                          <input id="nip" type="text" class="form-control" name="kode" required autocomplete="off">
                          <?= form_error('kode', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group col-md-9">
                          <label for="nama">Nama Lengkap</label>
                          <input id="nama_nip" type="text" class="form-control" name="nama" required autocomplete="off">
                          <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                      <?php elseif ($this->uri->segment(3) == 3) : ?>
                        <div class="form-group col-md-3">
                          <label for="id">ID</label>
                          <input id="id" type="text" class="form-control" name="kode" required autocomplete="off">
                          <?= form_error('kode', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group col-md-9">
                          <label for="nama">Nama Lengkap</label>
                          <input id="nama_id" type="text" class="form-control" name="nama" required autocomplete="off">
                          <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                      <?php elseif ($this->uri->segment(3) == 4) : ?>
                        <div class="form-group col-md-3">
                          <label for="nim">NIM</label>
                          <input id="nim" type="text" class="form-control" name="kode" required autocomplete="off">
                          <?= form_error('kode', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="nama">Nama Lengkap</label>
                          <input id="nama_m" type="text" class="form-control" name="nama" required autocomplete="off">
                          <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="form-group col-md-3">
                          <label for="angkatan">Angkatan</label>
                          <input id="angkatan" type="text" class="form-control" name="angkatan" required autocomplete="off">
                          <?= form_error('angkatan', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                      <?php endif; ?>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-4">
                        <label for="tanggal">Tanggal</label>
                        <input id="tanggal" type="date" class="form-control" name="tanggal" required autocomplete="off">
                        <?= form_error('tanggal', '<small class="text-danger pl-3">', '</small>') ?>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="hasil" class="d-block">Hasil</label>
                        <select name="hasil" id="hasil" class="form-control" required>
                          <option value="">Pilih...</option>
                          <option value="Positif">Positif</option>
                          <option value="Negatif">Negatif</option>
                        </select>
                        <?= form_error('hasil', '<small class="text-danger pl-3">', '</small>') ?>
                      </div>
                      <div class="form-group col-md-5">
                        <label for="berkas" class="d-block">Upload Berkas</label>
                        <input id="berkas" type="file" class="form-control" name="berkas" required autocomplete="off">
                        <?= form_error('berkas', '<small class="text-danger pl-3">', '</small>') ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <button onclick="location.href='<?= base_url('Pcr') ?>'" class="btn btn-warning btn-sm"><i class="fas fa-backward"></i> Kembali</button>
                      <button type="submit" name="simpan" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
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
  $(document).ready(function() {

    $('#nip').autocomplete({
      source: "<?php echo site_url('Pcr/get_kode_nip'); ?>",

      select: function(event, ui) {
        $('[name="kode"]').val(ui.item.label);
        $('[name="nama"]').val(ui.item.nama);
      }
    });

    $('#id').autocomplete({
      source: "<?php echo site_url('Pcr/get_kode_id'); ?>",

      select: function(event, ui) {
        $('[name="kode"]').val(ui.item.label);
        $('[name="nama"]').val(ui.item.nama);
      }
    });

    $('#nim').autocomplete({
      source: "<?php echo site_url('Pcr/get_kode_nim'); ?>",

      select: function(event, ui) {
        $('[name="kode"]').val(ui.item.label);
        $('[name="nama"]').val(ui.item.nama);
        $('[name="angkatan"]').val(ui.item.angkatan);
      }
    });

  });
</script>
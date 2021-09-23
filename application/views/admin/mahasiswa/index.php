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
          <?= $this->session->flashdata('message'); ?>
          <div class="card card-primary card-outline">
            <div class="card-body">
              <button onclick="location.href='<?= base_url('Mahasiswa/Tambah') ?>'" class="btn btn-primary btn-sm"><i class="fas fa-plus-circle"></i> Tambah</button>
              <button type="button" data-toggle="modal" data-target="#uploadExcel" class="btn btn-success btn-sm"><i class="fas fa-upload"></i> Upload Excel</button>
              <hr class="bg-primary">
              <div class="table-responsive">
                <table id="tableMahasiswa" class="table table-sm table-bordered">
                  <thead>
                    <tr align="center">
                      <th width="5%">#</th>
                      <th width="20%">NIM</th>
                      <th>Nama Lengkap</th>
                      <th width="20%">Jurusan</th>
                      <th width="10%">Angkatan</th>
                      <th width="10%">Password</th>
                      <th width="10%">Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="get_mahasiswa">
                  </tbody>
                </table>
              </div>
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
<div class="modal fade" id="uploadExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="exampleModalCenterTitle"><b>Upload Data Mahasiswa</b></h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open_multipart('mahasiswa/import_data'); ?>
        <div class="form-group mb-3">
          <label for="file">Upload Data Mahasiswa</label>
          <input type="file" class="form-control" accept=".xlsx, .xls, .csv" id="file" name="file" autocomplete="off" required>
        </div>
        <button type="submit" name="submit" class="btn btn-info float-right"><i class="fas fa-upload"></i> Upload</button>
        <a href="<?= base_url('assets/uploaddataexcelmahasiswa.xls') ?>" class="btn btn-success"><i class="fas fa-file-excel"></i> Download Format Excel</a>
        <?= form_close(); ?>
      </div>
    </div>
  </div>
</div>


<script src="<?= base_url('assets') ?>/plugins/jquery/jquery.min.js"></script>
<script>
  window.addEventListener('load', get_mahasiswa);

  function get_mahasiswa() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (xhttp.readyState == 1 || xhttp.readyState == 2 || xhttp.readyState == 3) {
        document.getElementById("get_mahasiswa").innerHTML = "<tr><td colspan='6'>Memuat data...</td></tr>";
      }

      if (xhttp.readyState == 4) {
        document.getElementById("get_mahasiswa").innerHTML = this.responseText;
        $('#tableMahasiswa').DataTable();
      }
    };
    xhttp.open("GET", "<?= base_url('mahasiswa/get_mahasiswa') ?>", true);
    xhttp.send();
  }
</script>
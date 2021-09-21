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
              <button onclick="location.href='<?= base_url('Dosen/Tambah') ?>'" class="btn btn-primary btn-sm"><i class="fas fa-plus-circle"></i> Tambah</button>
              <button type="button" data-toggle="modal" data-target="#uploadExcel" class="btn btn-success btn-sm"><i class="fas fa-upload"></i> Upload Excel</button>
              <hr class="bg-primary">
              <div class="table-responsive">
                <table id="tableDosen" class="table table-sm table-bordered">
                  <thead>
                    <tr align="center">
                      <th width="5%">#</th>
                      <th width="20%">NIP</th>
                      <th>Nama Lengkap</th>
                      <th width="20%">Jabatan</th>
                      <th width="10%">Password</th>
                      <th width="10%">Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="get_dosen">
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
        <h5 class="modal-title" id="exampleModalCenterTitle"><b>Upload Data Barang</b></h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open_multipart('dosen/import_data'); ?>
        <div class="form-group mb-3">
          <label for="file">Upload Data Dosen</label>
          <input type="file" class="form-control" accept=".xlsx, .xls, .csv" id="file" name="file" autocomplete="off" required>
        </div>
        <button type="submit" name="submit" class="btn btn-info float-right"><i class="fas fa-upload"></i> Upload</button>
        <a href="<?= base_url('assets/uploaddataexceldosen.xls') ?>" class="btn btn-success"><i class="fas fa-file-excel"></i> Download Format Excel</a>
        <?= form_close(); ?>
      </div>
    </div>
  </div>
</div>


<script src="<?= base_url('assets') ?>/plugins/jquery/jquery.min.js"></script>
<script>
  window.addEventListener('load', get_dosen);

  function get_dosen() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (xhttp.readyState == 1 || xhttp.readyState == 2 || xhttp.readyState == 3) {
        document.getElementById("get_dosen").innerHTML = "<tr><td colspan='6'>Memuat data...</td></tr>";
      }

      if (xhttp.readyState == 4) {
        document.getElementById("get_dosen").innerHTML = this.responseText;
        $('#tableDosen').DataTable();
      }
    };
    xhttp.open("GET", "<?= base_url('dosen/get_dosen') ?>", true);
    xhttp.send();
  }
</script>
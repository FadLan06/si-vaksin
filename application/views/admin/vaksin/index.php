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
        <div class="col-lg-6">
          <?= $this->session->flashdata('message'); ?>
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h2 class="card-title">Data Vaksin Dosen</h2>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <!-- <button onclick="location.href='<?= base_url('Vaksin/Tambah') ?>'" class="btn btn-primary btn-sm"><i class="fas fa-plus-circle"></i> Tambah</button> -->
              <!-- <hr class="bg-primary"> -->
              <div class="table-responsive">
                <table id="tableVaksinDosen" class="table table-sm table-bordered">
                  <thead>
                    <tr align="center">
                      <th width="5%">#</th>
                      <th width="25%">NIP</th>
                      <th>Nama Lengkap</th>
                      <th width="10%">V1</th>
                      <th width="10%">V2</th>
                      <th width="10%">V3</th>
                    </tr>
                  </thead>
                  <tbody id="get_vaksin_dosen">
                  </tbody>
                </table>
              </div>
            </div>
          </div><!-- /.card -->
        </div>

        <div class="col-lg-6">
          <?= $this->session->flashdata('message'); ?>
          <div class="card card-success card-outline">
            <div class="card-header">
              <h2 class="card-title">Data Vaksin Tendik</h2>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <!-- <button onclick="location.href='<?= base_url('Vaksin/Tambah') ?>'" class="btn btn-primary btn-sm"><i class="fas fa-plus-circle"></i> Tambah</button> -->
              <!-- <hr class="bg-primary"> -->
              <div class="table-responsive">
                <table id="tableVaksinTendik" class="table table-sm table-bordered">
                  <thead>
                    <tr align="center">
                      <th width="5%">#</th>
                      <th width="25%">ID</th>
                      <th>Nama Lengkap</th>
                      <th width="10%">V1</th>
                      <th width="10%">V2</th>
                      <th width="10%">V3</th>
                    </tr>
                  </thead>
                  <tbody id="get_vaksin_tendik">
                  </tbody>
                </table>
              </div>
            </div>
          </div><!-- /.card -->
        </div>

        <div class="col-lg-12">
          <?= $this->session->flashdata('message'); ?>
          <div class="card card-danger card-outline">
            <div class="card-header">
              <h2 class="card-title">Data Vaksin Mahasiswa</h2>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <!-- <button onclick="location.href='<?= base_url('Vaksin/Tambah') ?>'" class="btn btn-primary btn-sm"><i class="fas fa-plus-circle"></i> Tambah</button> -->
              <!-- <hr class="bg-primary"> -->
              <div class="table-responsive">
                <table id="tableVaksinMahasiswa" class="table table-sm table-bordered">
                  <thead>
                    <tr align="center">
                      <th width="5%">#</th>
                      <th width="25%">NIM</th>
                      <th>Nama Lengkap</th>
                      <th width="20%">Angkatan</th>
                      <th width="10%">V1</th>
                      <th width="10%">V2</th>
                      <th width="10%">V3</th>
                    </tr>
                  </thead>
                  <tbody id="get_vaksin_mahasiswa">
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


<script src="<?= base_url('assets') ?>/plugins/jquery/jquery.min.js"></script>
<script>
  window.addEventListener('load', get_vaksin_dosen);

  function get_vaksin_dosen() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (xhttp.readyState == 1 || xhttp.readyState == 2 || xhttp.readyState == 3) {
        document.getElementById("get_vaksin_dosen").innerHTML = "<tr><td colspan='6'>Memuat data...</td></tr>";
      }

      if (xhttp.readyState == 4) {
        document.getElementById("get_vaksin_dosen").innerHTML = this.responseText;
        $('#tableVaksinDosen').DataTable();
      }
    };
    xhttp.open("GET", "<?= base_url('vaksin/get_vaksin_dosen') ?>", true);
    xhttp.send();
  }

  
  window.addEventListener('load', get_vaksin_mahasiswa);

  function get_vaksin_mahasiswa() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (xhttp.readyState == 1 || xhttp.readyState == 2 || xhttp.readyState == 3) {
        document.getElementById("get_vaksin_mahasiswa").innerHTML = "<tr><td colspan='6'>Memuat data...</td></tr>";
      }

      if (xhttp.readyState == 4) {
        document.getElementById("get_vaksin_mahasiswa").innerHTML = this.responseText;
        $('#tableVaksinMahasiswa').DataTable();
      }
    };
    xhttp.open("GET", "<?= base_url('vaksin/get_vaksin_mahasiswa') ?>", true);
    xhttp.send();
  }

  
  window.addEventListener('load', get_vaksin_tendik);

  function get_vaksin_tendik() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (xhttp.readyState == 1 || xhttp.readyState == 2 || xhttp.readyState == 3) {
        document.getElementById("get_vaksin_tendik").innerHTML = "<tr><td colspan='6'>Memuat data...</td></tr>";
      }

      if (xhttp.readyState == 4) {
        document.getElementById("get_vaksin_tendik").innerHTML = this.responseText;
        $('#tableVaksinTendik').DataTable();
      }
    };
    xhttp.open("GET", "<?= base_url('vaksin/get_vaksin_tendik') ?>", true);
    xhttp.send();
  }
</script>
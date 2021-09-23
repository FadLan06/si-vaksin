<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1 class="m-0">
            <?= $title ?>
          </h1>
        </div>
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      
      <?= $this->session->flashdata('message'); ?>
      <div class="row">
        <div class="col-lg-6">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h2 class="card-title">
                Data PCR Dosen
              </h2>
              
              <div class="card-tools">
                <button onclick="location.href='<?= base_url('Pcr/Input/2') ?>'" class="btn btn-primary btn-sm"><i class="fas fa-plus-circle"></i> Input PCR</button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="tablePcrDosen" class="table table-sm table-bordered">
                  <thead>
                    <tr align="center">
                      <th width="5%">#</th>
                      <th width="20%">NIP</th>
                      <th>Nama Lengkap</th>
                      <th width="20%">Tanggal</th>
                      <th width="15%">Hasil</th>
                    </tr>
                  </thead>
                  <tbody id="get_pcr_dosen">
                  </tbody>
                </table>
              </div>
            </div>
          </div><!-- /.card -->
        </div>
        <div class="col-lg-6">
          <div class="card card-success card-outline">
            <div class="card-header">
              <h2 class="card-title">Data PCR Tendik</h2>

              <div class="card-tools">
                <button onclick="location.href='<?= base_url('Pcr/Input/3') ?>'" class="btn btn-success btn-sm"><i class="fas fa-plus-circle"></i> Input PCR</button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="tablePcrTendik" class="table table-sm table-bordered">
                  <thead>
                    <tr align="center">
                      <th width="5%">#</th>
                      <th width="20%">ID</th>
                      <th>Nama Lengkap</th>
                      <th width="20%">Tanggal</th>
                      <th width="15%">Hasil</th>
                    </tr>
                  </thead>
                  <tbody id="get_pcr_tendik">
                  </tbody>
                </table>
              </div>
            </div>
          </div><!-- /.card -->
        </div>
        <div class="col-lg-12">
          <div class="card card-danger card-outline">
            <div class="card-header">
              <h2 class="card-title">Data PCR Mahasiswa</h2>

              <div class="card-tools">
                <button onclick="location.href='<?= base_url('Pcr/Input/4') ?>'" class="btn btn-danger btn-sm"><i class="fas fa-plus-circle"></i> Input PCR</button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="tablePcrMahasiswa" class="table table-sm table-bordered">
                  <thead>
                    <tr align="center">
                      <th width="5%">#</th>
                      <th width="20%">NIM</th>
                      <th>Nama Lengkap</th>
                      <th width="10%">Angkatan</th>
                      <th width="20%">Tanggal</th>
                      <th width="15%">Hasil</th>
                    </tr>
                  </thead>
                  <tbody id="get_pcr_mahasiswa">
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

<script src="<?= base_url('assets') ?>/plugins/jquery/jquery.min.js"></script>
<script>
  window.addEventListener('load', get_pcr_dosen);

  function get_pcr_dosen() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (xhttp.readyState == 1 || xhttp.readyState == 2 || xhttp.readyState == 3) {
        document.getElementById("get_pcr_dosen").innerHTML = "<tr><td colspan='6'>Memuat data...</td></tr>";
      }

      if (xhttp.readyState == 4) {
        document.getElementById("get_pcr_dosen").innerHTML = this.responseText;
        $('#tablePcrDosen').DataTable();
      }
    };
    xhttp.open("GET", "<?= base_url('pcr/get_pcr_dosen') ?>", true);
    xhttp.send();
  }

  window.addEventListener('load', get_pcr_mahasiswa);

  function get_pcr_mahasiswa() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (xhttp.readyState == 1 || xhttp.readyState == 2 || xhttp.readyState == 3) {
        document.getElementById("get_pcr_mahasiswa").innerHTML = "<tr><td colspan='6'>Memuat data...</td></tr>";
      }

      if (xhttp.readyState == 4) {
        document.getElementById("get_pcr_mahasiswa").innerHTML = this.responseText;
        $('#tablePcrMahasiswa').DataTable();
      }
    };
    xhttp.open("GET", "<?= base_url('pcr/get_pcr_mahasiswa') ?>", true);
    xhttp.send();
  }

  window.addEventListener('load', get_pcr_tendik);

  function get_pcr_tendik() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (xhttp.readyState == 1 || xhttp.readyState == 2 || xhttp.readyState == 3) {
        document.getElementById("get_pcr_tendik").innerHTML = "<tr><td colspan='6'>Memuat data...</td></tr>";
      }

      if (xhttp.readyState == 4) {
        document.getElementById("get_pcr_tendik").innerHTML = this.responseText;
        $('#tablePcrTendik').DataTable();
      }
    };
    xhttp.open("GET", "<?= base_url('pcr/get_pcr_tendik') ?>", true);
    xhttp.send();
  }
</script>
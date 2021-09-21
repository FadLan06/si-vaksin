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
              <!-- <button onclick="location.href='<?= base_url('Vaksin/Tambah') ?>'" class="btn btn-primary btn-sm"><i class="fas fa-plus-circle"></i> Tambah</button> -->
              <!-- <hr class="bg-primary"> -->
              <div class="table-responsive">
                <table id="tableVaksin" class="table table-sm table-bordered">
                  <thead>
                    <tr align="center">
                      <th width="5%">#</th>
                      <th width="25%">NIP/NIM/ID</th>
                      <th>Nama Lengkap</th>
                      <th width="10%">V1</th>
                      <th width="10%">V2</th>
                      <th width="10%">V3</th>
                    </tr>
                  </thead>
                  <tbody id="get_vaksin">
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
  window.addEventListener('load', get_vaksin);

  function get_vaksin() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (xhttp.readyState == 1 || xhttp.readyState == 2 || xhttp.readyState == 3) {
        document.getElementById("get_vaksin").innerHTML = "<tr><td colspan='6'>Memuat data...</td></tr>";
      }

      if (xhttp.readyState == 4) {
        document.getElementById("get_vaksin").innerHTML = this.responseText;
        $('#tableVaksin').DataTable();
      }
    };
    xhttp.open("GET", "<?= base_url('vaksin/get_vaksin') ?>", true);
    xhttp.send();
  }
</script>
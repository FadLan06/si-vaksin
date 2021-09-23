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
        <div class="col-md-4 mx-auto">
          <div class="info-box">
            <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Data Dosen</span>
              <span class="info-box-number">
                <?= number_format($dosen) ?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-4 mx-auto">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Data Tendik</span>
              <span class="info-box-number"><?= number_format($tendik) ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-md-4 mx-auto">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Data Mahasiswa</span>
              <span class="info-box-number"><?= number_format($mahasiswa) ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h2 class="card-title">Data Vaksin Dosen</h2>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body table-responsive">
              <table class="table table-bordered table-sm" width="100%">
                <tr align="center" class="bg-primary">
                  <th colspan="2">Vaksin Pertama</th>
                  <th colspan="2">Vaksin Kedua</th>
                  <th colspan="2">Vaksin Ketiga</th>
                </tr>
                <tr align="center">
                  <th>Sudah</th>
                  <th>Belum</th>
                  <th>Sudah</th>
                  <th>Belum</th>
                  <th>Sudah</th>
                  <th>Belum</th>
                </tr>
                <tr align="center">
                  <td>
                    <h5><?= number_format($dv1) ?></h5>
                  </td>
                  <td>
                    <h5><?= number_format($dv11) ?></h5>
                  </td>
                  <td>
                    <h5><?= number_format($dv2) ?></h5>
                  </td>
                  <td>
                    <h5><?= number_format($dv22) ?></h5>
                  </td>
                  <td>
                    <h5><?= number_format($dv3) ?></h5>
                  </td>
                  <td>
                    <h5><?= number_format($dv33) ?></h5>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card card-success card-outline">
            <div class="card-header">
              <h2 class="card-title">Data Vaksin Tendik</h2>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body table-responsive">
              <table class="table table-bordered table-sm" width="100%">
                <tr align="center" class="bg-success">
                  <th colspan="2">Vaksin Pertama</th>
                  <th colspan="2">Vaksin Kedua</th>
                  <th colspan="2">Vaksin Ketiga</th>
                </tr>
                <tr align="center">
                  <th>Sudah</th>
                  <th>Belum</th>
                  <th>Sudah</th>
                  <th>Belum</th>
                  <th>Sudah</th>
                  <th>Belum</th>
                </tr>
                <tr align="center">
                  <td>
                    <h5><?= number_format($tv1) ?></h5>
                  </td>
                  <td>
                    <h5><?= number_format($tv11) ?></h5>
                  </td>
                  <td>
                    <h5><?= number_format($tv2) ?></h5>
                  </td>
                  <td>
                    <h5><?= number_format($tv22) ?></h5>
                  </td>
                  <td>
                    <h5><?= number_format($tv3) ?></h5>
                  </td>
                  <td>
                    <h5><?= number_format($tv33) ?></h5>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card card-danger card-outline">
            <div class="card-header">
              <h2 class="card-title">Data Vaksin Mahasiswa</h2>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body table-responsive">
              <table class="table table-bordered table-sm" width="100%">
                <tr align="center" class="bg-danger">
                  <th colspan="2">Vaksin Pertama</th>
                  <th colspan="2">Vaksin Kedua</th>
                  <th colspan="2">Vaksin Ketiga</th>
                </tr>
                <tr align="center">
                  <th>Sudah</th>
                  <th>Belum</th>
                  <th>Sudah</th>
                  <th>Belum</th>
                  <th>Sudah</th>
                  <th>Belum</th>
                </tr>
                <tr align="center">
                  <td>
                    <h5><?= number_format($mv1) ?></h5>
                  </td>
                  <td>
                    <h5><?= number_format($mv11) ?></h5>
                  </td>
                  <td>
                    <h5><?= number_format($mv2) ?></h5>
                  </td>
                  <td>
                    <h5><?= number_format($mv22) ?></h5>
                  </td>
                  <td>
                    <h5><?= number_format($mv3) ?></h5>
                  </td>
                  <td>
                    <h5><?= number_format($mv33) ?></h5>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>

      </div>

    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
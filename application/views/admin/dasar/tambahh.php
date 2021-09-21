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
          <div class="col-md-4">

              <?= $this->session->flashdata('message'); ?>

              <div class="card shadow">
                  <div class="card-header">
                      <b>Data Kegiatan</b>
                  </div>
                  <div class="card-body">
                      <div class="form-group">
                          <input type="Text" name="no_surat" class="form-control" id="Nomor Surat" value="<?= $keg->kegiatan ?>" readonly>
                      </div>
                      <a href="<?= base_url('Administrator/Dasar') ?>" class="btn btn-info float-right"><i class="fas fa-"></i> Kembali</a>
                  </div>
              </div>

          </div>

          <div class="col-md-8">

              <?= $this->session->flashdata('message'); ?>

              <div class="card shadow">
                  <div class="card-header">
                      <b>Data Dasar</b>
                  </div>
                  <div class="card-body">
                      <div class="table-responsive">
                          <button type="submit" class="btn btn-primary float-left" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-plus"></i> Tambah</button>

                          <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                              <thead style="text-align:center;">
                                  <tr>
                                      <th scope="col" width="5%">#</th>
                                      <th scope="col">Dasar</th>
                                      <th scope="col" width="15%">Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php $no = 1;
                                  foreach ($dasar as $row) : ?>
                                      <tr>
                                          <td><?= $no++ ?></td>
                                          <td><?= $row->dasar ?></td>
                                          <td align="center">
                                              <a href="<?= base_url('Administrator/hps_dasar/' . $row->kd_dasar . '/' . $this->uri->segment(3)) ?>" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
                                          </td>
                                      </tr>
                                  <?php endforeach; ?>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>

          </div>


      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
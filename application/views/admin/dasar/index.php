<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"> <?=$title?></h1>
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
          <div class="card card-warning card-outline">
            <div class="card-body">
              <button onclick="location.href='<?= base_url('Dasar/Tambah')?>'" class="btn btn-primary btn-sm"><i class="fas fa-plus-circle"></i> Tambah</button>
              <hr class="bg-warning">
              <div class="table-responsive">
                <table id="example" class="table table-sm table-bordered">
                  <thead style="text-align:center;">
                      <tr>
                          <th scope="col" width="5%">#</th>
                          <th scope="col" width="35%">Jenis Kegiatan</th>
                          <th scope="col">Dasar</th>
                          <th scope="col" width="16%">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php $no0 = 1;
                      foreach ($kegiatan as $row) : ?>
                          <tr>
                              <td align="center"><?= $no0++; ?></td>
                              <td><?= $row->kegiatan ?></td>
                              <td>
                                  <?php $no = 1;
                                      foreach ($dasar as $ds) {
                                          if ($ds->kd_keg == $row->kd_keg) {
                                              echo $no++ . '. ' . $ds->dasar . '<br/>';
                                          }
                                      }  ?>
                              </td>
                              <td align="center">
                                  <a title="Edit Data" href="<?= base_url('Dasar/edit/' . $row->kd_keg) ?>" class="badge badge-info"><i class="fas fa-edit"></i> Ubah</a>
                                  <a title="Hapus Data" href="<?= base_url('Dasar/hapus/' . $row->kd_keg) ?>" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
                              </td>
                          </tr>
                      <?php endforeach; ?>
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
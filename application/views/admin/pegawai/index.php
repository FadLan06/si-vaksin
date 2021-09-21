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
              <button onclick="location.href='<?= base_url('Pegawai/Tambah')?>'" class="btn btn-primary btn-sm"><i class="fas fa-plus-circle"></i> Tambah</button>
              <hr class="bg-warning">
              <div class="table-responsive">
                <table id="example" class="table table-sm table-bordered">
                  <thead>
                    <tr align="center">
                      <th width="5%">#</th>
                      <th width="15%">NIP</th>
                      <th>Nama Lengkap</th>
                      <th width="20%">Email</th>
                      <th width="13%">Jabatan</th>
                      <th width="10%">Password</th>
                      <th width="10%">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; foreach ($pegawai as $data) : ?>
                      <tr>
                        <td align="center"><?=$no++?></td>
                        <td><?=$data->nip?></td>
                        <td><?=$data->nama?></td>
                        <td><?=$data->email?></td>
                        <td align="center"><?=$data->jabatan?></td>
                        <td align="center"><a href="<?= base_url('Pegawai/Reset/').$data->id ?>" class="badge badge-warning"><i class="fas fa-sync-alt"></i> Reset</a></td>
                        <td align="center">
                          <a onclick="location.href='<?= base_url('Pegawai/Ubah/').$data->id ?>'" class="badge badge-info"><i class="fas fa-edit"></i> Ubah</a>
                          <a onclick="return confirm('Yakin ingin menghapusnya ??')" href="<?= base_url('Pegawai/hapus/').$data->id ?>" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
                        </td>
                      </tr>
                    <?php endforeach;  ?>
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
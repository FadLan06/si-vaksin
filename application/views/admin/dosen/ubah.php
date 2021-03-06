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
                            <div class="row">
                                <div class="col-md-9 mx-auto">
                                    <form action="<?= base_url('Dosen/Proses_edit') ?>" method="POST">

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="nip">NIP</label>
                                                <input id="id_dosen" type="hidden" class="form-control" name="id_dosen" autocomplete="off" required value="<?= $dosen->id_dosen ?>">
                                                <input id="nip" type="text" class="form-control" name="nip" autocomplete="off" required value="<?= $dosen->nip ?>">
                                                <?= form_error('nip', '<small class="text-danger pl-3">', '</small>') ?>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="nama">Nama Lengkap</label>
                                                <input id="nama" type="text" class="form-control" name="nama" autocomplete="off" required value="<?= $dosen->nama ?>">
                                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label for="jabatan">Jabatan</label>
                                                <input id="jabatan" type="text" class="form-control" name="jabatan" autocomplete="off" required value="<?= $dosen->jabatan ?>">
                                                <?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>') ?>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="username">Username</label>
                                                <input id="id_user" type="hidden" class="form-control" name="id_user" required autocomplete="off" value="<?= $user->id_user ?>">
                                                <input id="username" type="text" class="form-control" name="username" required autocomplete="off" value="<?= $user->username ?>">
                                                <?= form_error('username', '<small class="text-danger pl-3">', '</small>') ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <input id="id_vaksin" type="hidden" class="form-control" name="id_vaksin" required autocomplete="off" value="<?= $vaksin->id_vaksin ?>">
                                            <button type="button" onclick="location.href='<?= base_url('Dosen') ?>'" class="btn btn-warning btn-sm"><i class="fas fa-backward"></i> Kembali</button>
                                            <button type="submit" name="ubah" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                                        </div>
                                    </form>
                                </div>
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
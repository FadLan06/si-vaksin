<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h6 class="m-0">
                        <?= $title ?>
                        <b>
                            <?php if ($user->role == 2) : ?>
                                <?= $user->nama == $dosen->nip ? $dosen->nama : '' ?>
                            <?php elseif ($user->role == 3) : ?>
                                <?= $user->nama == $tendik->id ? $tendik->nama : '' ?>
                            <?php elseif ($user->role == 4) : ?>
                                <?= $user->nama == $mahasiswa->nim ? $mahasiswa->nama : '' ?>
                            <?php endif; ?>
                        </b>
                    </h6>
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
                    <a <?= $vaksin->status1 == 0 ? 'href="" style="color:black;" data-toggle="modal" data-target="#v1"' : 'href="" style="color:black;" data-toggle="modal" data-target="#v1_v"' ?>>
                        <div class="info-box">
                            <span class="info-box-icon bg-<?= $vaksin->status1 == 0 ? 'secondary' : 'danger' ?> elevation-1"><i class="fas fa-syringe"></i></span>

                            <div class="info-box-content">
                                <h5 class="info-box-text">Sudah Vaksin Pertama ?</h5>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </a>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-4 mx-auto">
                    <?php if ($vaksin->status1 == 0) {
                        $bl = 'onclick="return false;"';
                        $md = '';
                        $bg = 'secondary';
                    } else {
                        $bl = '';
                        if ($vaksin->status2 == 0) {
                            $bg = 'secondary';
                            $md = 'data-toggle="modal" data-target="#v2"';
                        } else {
                            $bg = 'warning';
                            $md = 'data-toggle="modal" data-target="#v2_v"';
                        }
                    } ?>
                    <a href="" style="color:black;" <?= $bl ?> <?= $md ?>>
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-<?= $bg ?> elevation-1"><i class="fas fa-syringe"></i></span>

                            <div class="info-box-content">
                                <h5 class="info-box-text">Sudah Vaksin Kedua ?</h5>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </a>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <div class="col-md-4 mx-auto">

                    <?php if ($vaksin->status2 == 0) {
                        $bll = 'onclick="return false;"';
                        $mdd = '';
                        $bgg = 'secondary';
                    } else {
                        $bll = '';
                        if ($vaksin->status3 == 0) {
                            $bgg = 'secondary';
                            $mdd = 'data-toggle="modal" data-target="#v3"';
                        } else {
                            $bgg = 'success';
                            $mdd = 'data-toggle="modal" data-target="#v3_v"';
                        }
                    } ?>
                    <a href="" style="color:black" <?= $bll ?> <?= $mdd ?>>
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-<?= $bgg ?> elevation-1"><i class="fas fa-syringe"></i></span>

                            <div class="info-box-content">
                                <h5 class="info-box-text">Sudah Vaksin Ketiga ?</h5>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </a>
                    <!-- /.info-box -->
                </div>
            </div>
            <!-- /.row -->

            <div class="col-md-12">
                <table width="100%">
                    <tr>
                        <th width="20%">Warna</th>
                        <th>Keterangan</th>
                    </tr>
                    <tr>
                        <td><span class="text-danger">Merah</span></td>
                        <td>Sudah Vaksin Pertama</td>
                    </tr>
                    <tr>
                        <td><span class="text-warning">Kuning</span></td>
                        <td>Sudah Vaksin Kedua</td>
                    </tr>
                    <tr>
                        <td><span class="text-success">Hijau</span></td>
                        <td>Sudah Vaksin Ketiga</td>
                    </tr>
                    <tr>
                        <td><span class="text-secondary">Abu-abu</span></td>
                        <td>Belum Vaksin</td>
                    </tr>
                </table>
            </div>

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="v1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalCenterTitle"><b>Input Berkas Vaksin</b></h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('beranda/aksi') ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <label for="file">Sudah Vaksin</label>
                        <select name="status1" id="status1" class="form-control" required>
                            <option value="1" selected>Sudah Vaksin</option>
                            <!-- <option value="0">Belum Vaksin</option> -->
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="file">Upload Bukti Vaksin</label>
                        <input type="file" class="form-control" accept="image/*" id="berkas1" name="berkas1" autocomplete="off" required>
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" name="submit1" class="btn btn-primary float-right"><i class="fas fa-save"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="v1_v" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalCenterTitle"><b>Berkas Vaksin</b></h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group mb-3">
                    <label for="file">Berkas Vaksin Pertama</label>
                    <img src="<?= base_url('assets/upload/berkas/') . $vaksin->berkas1 ?>" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="v2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalCenterTitle"><b>Input Berkas Vaksin</b></h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('beranda/aksi') ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <label for="file">Sudah Vaksin</label>
                        <select name="status2" id="status2" class="form-control" required>
                            <option value="1" selected>Sudah Vaksin</option>
                            <!-- <option value="0">Belum Vaksin</option> -->
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="file">Upload Bukti Vaksin</label>
                        <input type="file" class="form-control" accept="image/*" id="berkas2" name="berkas2" autocomplete="off" required>
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" name="submit2" class="btn btn-primary float-right"><i class="fas fa-save"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="v2_v" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalCenterTitle"><b>Berkas Vaksin</b></h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group mb-3">
                    <label for="file">Berkas Vaksin Kedua</label>
                    <img src="<?= base_url('assets/upload/berkas/') . $vaksin->berkas2 ?>" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="v3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalCenterTitle"><b>Input Berkas Vaksin</b></h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('beranda/aksi') ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <label for="file">Sudah Vaksin</label>
                        <select name="status3" id="status3" class="form-control" required>
                            <option value="1" selected>Sudah Vaksin</option>
                            <!-- <option value="0">Belum Vaksin</option> -->
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="file">Upload Bukti Vaksin</label>
                        <input type="file" class="form-control" accept="image/*" id="berkas3" name="berkas3" autocomplete="off" required>
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" name="submit3" class="btn btn-primary float-right"><i class="fas fa-save"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="v3_v" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalCenterTitle"><b>Berkas Vaksin</b></h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group mb-3">
                    <label for="file">Berkas Vaksin Ketiga</label>
                    <img src="<?= base_url('assets/upload/berkas/') . $vaksin->berkas3 ?>" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>
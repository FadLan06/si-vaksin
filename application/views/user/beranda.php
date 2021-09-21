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
                    <?php if (empty($vaksin->kode)) : ?>
                        <a href="" style="color:black;" data-toggle="modal" data-target="#v1">
                            <div class="info-box">
                                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-syringe"></i></span>

                                <div class="info-box-content">
                                    <h5 class="info-box-text">Sudah Vaksin Pertama ?</h5>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </a>
                    <?php else : ?>
                        <a href="" style="color:black;">
                            <div class="info-box">
                                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-syringe"></i></span>

                                <div class="info-box-content">
                                    <h5 class="info-box-text">Sudah Vaksin Pertama ?</h5>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </a>
                    <?php endif; ?>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-4 mx-auto">
                    <a href="" style="color:black" <?= empty($vaksin->kode) ? 'onclick="return false;"' : '' ?>>
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-syringe"></i></span>

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
                    <a href="" style="color:black" <?= empty($vaksin->kode) || $vaksin->status2 == 0 ? 'onclick="return false;"' : '' ?>>
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-syringe"></i></span>

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

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="v1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalCenterTitle"><b>Upload Data Barang</b></h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>
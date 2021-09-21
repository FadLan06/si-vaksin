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
          <div class="card card-warning card-outline">
            <div class="card-body">
              <button onclick="location.href='<?= base_url('Pegawai') ?>'" class="btn btn-warning btn-sm"><i class="fas fa-backward"></i> Kembali</button>
              <hr class="bg-warning">
                <div class="row">
                  <div class="col-md-9 mx-auto">
                    <form action="<?= base_url('Pegawai/Proses_edit') ?>" method="POST">

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="nip">NIP</label>
                                <input id="nip" type="text" class="form-control" name="nip" value="<?= $pegawai->nip ?>">
                                <?= form_error('nip', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nama">Nama Lengkap</label>
                                <input id="nama" type="text" class="form-control" name="nama" value="<?= $pegawai->nama ?>">
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="tempat">Tempat Lahir</label>
                                <input id="tempat" type="text" class="form-control" name="tempat" value="<?= $pegawai->tempat ?>">
                                <?= form_error('tempat', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="tgl_lhr">Tanggal Lahir</label>
                                <input id="tgl_lhr" type="date" class="form-control" name="tgl_lhr" value="<?= $pegawai->tgl_lhr ?>">
                                <?= form_error('tgl_lhr', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="jk">Jenis Kelamin</label>
                                <select name="jk" id="jk" class="form-control">
                                    <option value="L" <?= $pegawai->jk == 'L' ? 'selected="selected"' : '' ?>>Laki-Laki</option>
                                    <option value="P" <?= $pegawai->jk == 'P' ? 'selected="selected"' : '' ?>>Perempuan</option>
                                </select>
                                <?= form_error('jk', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="pendidikan">Pendidikan Terakhir</label>
                                <select name="pendidikan" id="pendidikan" class="form-control">
                                    <option value="SD" <?= $pegawai->pendidikan == 'SD' ? 'selected="selected"' : '' ?>>SD</option>
                                    <option value="SMP" <?= $pegawai->pendidikan == 'SMP' ? 'selected="selected"' : '' ?>>SMP</option>
                                    <option value="SMA" <?= $pegawai->pendidikan == 'SMA' ? 'selected="selected"' : '' ?>>SMA</option>
                                    <option value="SMK" <?= $pegawai->pendidikan == 'SMK' ? 'selected="selected"' : '' ?>>SMK</option>
                                    <option value="D3" <?= $pegawai->pendidikan == 'D3' ? 'selected="selected"' : '' ?>>D3</option>
                                    <option value="S1" <?= $pegawai->pendidikan == 'S1' ? 'selected="selected"' : '' ?>>S1</option>
                                    <option value="S2" <?= $pegawai->pendidikan == 'S2' ? 'selected="selected"' : '' ?>>S2</option>
                                    <option value="S3" <?= $pegawai->pendidikan == 'S3' ? 'selected="selected"' : '' ?>>S3</option>
                                </select>
                                <?= form_error('pendidikan', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="jurusan">Jurusan</label>
                                <input id="jurusan" type="text" class="form-control" name="jurusan" value="<?= $pegawai->jurusan ?>">
                                <?= form_error('jurusan', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="status">Status Perkawinan</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="KAWIN" <?= $pegawai->status == 'KAWIN' ? 'selected="selected"' : '' ?>>KAWIN</option>
                                    <option value="BELUM KAWIN" <?= $pegawai->status == 'BELUM KAWIN' ? 'selected="selected"' : '' ?>>BELUM KAWIN</option>
                                </select>
                                <?= form_error('status', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="bekerja">Bekerja Sejak Tanggal</label>
                                <input id="bekerja" type="date" class="form-control" name="bekerja" value="<?= $pegawai->bekerja ?>">
                                <?= form_error('bekerja', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="pangkat">Pangkat</label>
                                <input id="pangkat" type="text" class="form-control" name="pangkat" value="<?= $pegawai->pangkat ?>">
                                <?= form_error('pangkat', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="golongan">Golongan</label>
                                <input id="golongan" type="text" class="form-control" name="golongan" value="<?= $pegawai->golongan ?>">
                                <?= form_error('golongan', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="role">Hak Akses</label>
                                <select name="role" id="role" class="form-control">
                                    <?php foreach ($role as $row) : ?>
                                        <option value="<?= $row->id ?>" <?= $pegawai->role_id == $row->id ? 'selected="selected"' : '' ?>><?= $row->role ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('role', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="jabatan">Jabatan</label>
                                <select name="jabatan" id="jabatan" class="form-control">
                                    <option value="KETUA" <?= $pegawai->jabatan == 'KETUA' ? 'selected="selected"' : '' ?>>KETUA</option>
                                    <option value="ANGGOTA" <?= $pegawai->jabatan == 'ANGGOTA' ? 'selected="selected"' : '' ?>>ANGGOTA</option>
                                    <option value="KOORDINATOR SEKRETARIAT" <?= $pegawai->jabatan == 'KOORDINATOR SEKRETARIAT' ? 'selected="selected"' : '' ?>>KOORDINATOR SEKRETARIAT</option>
                                    <option value="STAF" <?= $pegawai->jabatan == 'STAF' ? 'selected="selected"' : '' ?>>STAF</option>
                                    <option value="BPP" <?= $pegawai->jabatan == 'BPP' ? 'selected="selected"' : '' ?>>BPP</option>
                                    <option value="Staf Devisi HP3S" <?= $pegawai->jabatan == 'Staf Devisi HP3S' ? 'selected="selected"' : '' ?>>Staf Devisi HP3S</option>
                                    <option value="Staf Devisi SDM" <?= $pegawai->jabatan == 'Staf Devisi SDM' ? 'selected="selected"' : '' ?>>Staf Devisi SDM</option>
                                    <option value="Staf Devisi PHL" <?= $pegawai->jabatan == 'Staf Devisi PHL' ? 'selected="selected"' : '' ?>>Staf Devisi PHL</option>
                                </select>
                                <?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="hp">No Telpon (HP)</label>
                                <input id="hp" type="text" class="form-control" name="hp" value="<?= $pegawai->hp ?>">
                                <?= form_error('hp', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                            <div class="form-group col-md-8">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" value="<?= $pegawai->email ?>" readonly>
                                <input id="email" type="hidden" name="id" class="form-control" value="<?= $pegawai->id ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" name="ubah" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
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
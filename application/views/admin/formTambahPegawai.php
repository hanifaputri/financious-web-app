<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
        <!--<img src="<?php echo base_url('assets/photo/').'ava1.png'?>"/>-->
    </div>

    <div class="card mb-4 col-lg-8 px-0">
        <form method="POST" enctype="multipart/form-data" action="<?php echo base_url('admin/dataPegawai/tambahDataAksi')?>">
        <div class="card-body p-4">
                <h6 class="font-weight-bold"><i class="fas fa-user mr-3"></i>Data Pribadi</h6>
                <hr>

                <div class="form-group row">
                    <label class="col-sm-4">Nama Pegawai</label>
                    <div class="col-sm-8">
                        <input type="text" name="nama_pegawai" class="form-control" />
                        <?php echo form_error('nama_pegawai', '<div class="text-small text-danger"></div>') ?>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-sm-4">Jenis Kelamin</label>
                    <div class="col-sm-8">
                        <select name="jenis_kelamin" class="form-control">
                            <option value="">--Pilih Jenis Kelamin--</option>
                            <option value="Laki-laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        <?php echo form_error('jenis_kelamin', '<div class="text-small text-danger"></div>') ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4">Upload Foto</label>
                    <div class="col-sm-8">
                        <input type="file" name="photo" class="form-control" />
                    </div>
                </div>

                <h6 class="font-weight-bold"><i class="fas fa-briefcase mr-3 mt-4"></i>Informasi Karyawan</h6>
                <hr>

                <div class="form-group row">
                    <label class="col-sm-4">NIK</label>
                    <div class="col-sm-8">
                        <input type="text" name="nik" class="form-control" />
                        <?php echo form_error('nik', '<div class="text-small text-danger"></div>') ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4">Jabatan</label>
                    <div class="col-sm-8">
                        <select name="jabatan" class="form-control">
                            <option value="">--Pilih Jabatan--</option>
                            <?php foreach($array_jabatan as $j) : ?>
                                <option value="<?php echo $j->nama_jabatan ?>">
                                <?php echo $j->nama_jabatan ?></option>
                            <?php endforeach; ?>
                            <?php echo form_error('jabatan', '<div class="text-small text-danger"></div>') ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4">Status Pegawai</label>
                    <div class="col-sm-8">
                        <select name="status" class="form-control">
                            <option value="">--Pilih Status Pegawai--</option>
                            <option value="Karyawan Tetap">Karyawan Tetap</option></option>
                            <option value="Karyawan Tidak Tetap">Karyawan Tidak Tetap</option>
                        </select>
                        <?php echo form_error('status', '<div class="text-small text-danger"></div>') ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4">Tanggal Masuk</label>
                    <div class="col-sm-8">
                        <input type="date" name="tanggal_masuk" class="form-control" />
                        <?php echo form_error('tanggal_masuk', '<div class="text-small text-danger"></div>') ?>
                    </div>
                </div>

                <h6 class="font-weight-bold"><i class="fas fa-key mr-3 mt-4"></i>Pengaturan Akun</h6>
                <hr>

                <div class="form-group row">
                    <label class="col-sm-4">Username</label>
                    <div class="col-sm-8">
                        <input type="text" name="username" class="form-control" />
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4">Password</label>
                    <div class="col-sm-8">
                        <input type="password" name="password" class="form-control" />
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4">Hak Akses</label>
                    <div class="col-sm-8">
                        <select name="hak_akses" class="form-control">
                            <option value="">--Pilih Hak Akses--</option>
                            <option value="1">Admin</option>
                            <option value="2">Pegawai</option>
                        </select>
                    </div>
                </div>
        </div>
        <div class="card-footer text-muted">
            <button type="submit" class="btn btn-block btn-primary"><i class="fas fa-save mr-4"></i>Simpan Data</button>
        </div>
        </form>
    </div>
</div>
</div>
<!-- End of Main Content -->
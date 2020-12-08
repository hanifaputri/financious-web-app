<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
        <!--<img src="<?php echo base_url('assets/photo/').'ava1.png'?>"/>-->
    </div>

    <div class="card">
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data" action="<?php echo base_url('admin/dataPegawai/tambahDataAksi')?>">
                <div class="form-group">
                    <label>NIK</label>
                    <input type="text" name="nik" class="form-control" />
                    <?php echo form_error('nik', '<div class="text-small text-danger"></div>') ?>
               </div>

                <div class="form-group">
                    <label>Nama Pegawai</label>
                    <input type="text" name="nama_pegawai" class="form-control" />
                    <?php echo form_error('nama_pegawai', '<div class="text-small text-danger"></div>') ?>
                </div>

                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" />
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" />
                </div>

                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control">
                        <option value="">--Pilih Jenis Kelamin--</option>
                        <option value="Laki-laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    <?php echo form_error('jenis_kelamin', '<div class="text-small text-danger"></div>') ?>
                </div>

                <div class="form-group">
                    <label>Jabatan</label>
                    <select name="jabatan" class="form-control">
                        <option value="">--Pilih Jabatan--</option>
                        <?php foreach($array_jabatan as $j) : ?>
                            <option value="<?php echo $j->nama_jabatan ?>">
                            <?php echo $j->nama_jabatan ?></option>
                        <?php endforeach; ?>
                        <?php echo form_error('jabatan', '<div class="text-small text-danger"></div>') ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Status Pegawai</label>
                    <select name="status" class="form-control">
                        <option value="">--Pilih Status Pegawai--</option>
                        <option value="Karyawan Tetap">Karyawan Tetap</option></option>
                        <option value="Karyawan Tidak Tetap">Karyawan Tidak Tetap</option>
                    </select>
                    <?php echo form_error('status', '<div class="text-small text-danger"></div>') ?>
                </div>

                <div class="form-group">
                    <label>Tanggal Masuk</label>
                    <input type="date" name="tanggal_masuk" class="form-control" />
                    <?php echo form_error('tanggal_masuk', '<div class="text-small text-danger"></div>') ?>
                </div>

                <div class="form-group">
                    <label>Upload Foto</label>
                    <input type="file" name="photo" class="form-control" />
                </div>

                <div class="form-group">
                    <label>Hak Akses</label>
                    <select name="hak_akses" class="form-control">
                        <option value="">--Pilih Hak Akses--</option>
                        <option value="1">Admin</option>
                        <option value="2">Pegawai</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -->
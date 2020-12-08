<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>
    <div class="ml-auto p-2"></div>

    <div class="card">
        <div class="card-body">
            <?php foreach ($pegawai as $p): ?>
            <form method="POST" enctype="multipart/form-data" action="<?php echo base_url('admin/dataPegawai/updateDataAksi')?>">
                <div class="form-group">
                    <label>NIK</label>
                    <input type="hidden" name="id_pegawai" class="form-control" value="<?php echo $p->id_pegawai ?>"/>
                    <input type="text" name="nik" class="form-control" value="<?php echo $p->nik ?>"/>
                    <?php echo form_error('nik', '<div class="text-small text-danger"></div>') ?>
               </div>

                <div class="form-group">
                    <label>Nama Pegawai</label>
                    <input type="text" name="nama_pegawai" class="form-control"  value="<?php echo $p->nama_pegawai ?>"/>
                    <?php echo form_error('nama_pegawai', '<div class="text-small text-danger"></div>') ?>
                </div>

                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control"  value="<?php echo $p->username ?>"/>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control"  value=""/>
                </div>

                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control">
                        <option value="Laki-laki" <?php if ($p->jenis_kelamin == 'Laki-laki') echo'selected'; ?>>Laki-laki</option>
                        <option value="Perempuan" <?php if ($p->jenis_kelamin == 'Perempuan') echo'selected'; ?>>Perempuan</option>
                    </select>
                    <?php echo form_error('jenis_kelamin', '<div class="text-small text-danger"></div>') ?>
                </div>

                <div class="form-group">
                    <label>Jabatan</label>
                    <select name="jabatan" class="form-control">
                        <?php foreach($array_jabatan as $j) : ?>
                            <option value="<?php echo $j->nama_jabatan ?>" 
                            <?php if($j->nama_jabatan == $p->jabatan) echo 'selected'?>>
                            <?php echo $j->nama_jabatan ?>
                            </option>
                        <?php endforeach; ?>
                        <?php echo form_error('jabatan', '<div class="text-small text-danger"></div>') ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Status Pegawai</label>
                    <select name="status" class="form-control">
                        <option value="Karyawan Tetap" <?php if ($p->status == 'Karyawan Tetap') echo'selected'; ?>>Karyawan Tetap</option></option>
                        <option value="Karyawan Tidak Tetap" <?php if ($p->status == 'Karyawan Tidak Tetap') echo'selected'; ?>>Karyawan Tidak Tetap</option>
                    </select>
                    <?php echo form_error('status', '<div class="text-small text-danger"></div>') ?>
                </div>

                <div class="form-group">
                    <label>Tanggal Masuk</label>
                    <input value="<?php echo $p->tanggal_masuk ?>" type="date" name="tanggal_masuk" class="form-control" />
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
                        <option value="1" <?php if($p->hak_akses == '1') echo 'selected'?>>Admin</option>
                        <option value="2" <?php if($p->hak_akses == '2') echo 'selected'?>>Pegawai</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
            <?php endforeach;?>
        </div>
    </div>

</div>
</div>
<!-- End of Main Content -->
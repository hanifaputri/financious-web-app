<!-- Begin Page Content -->
<div class="container-fluid mb-5">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card col-lg-6">
        <form method="post" action="<?php echo base_url('admin/dataJabatan/tambahDataAksi')?>">
            <div class="card-body">
                <div class="form-group">
                    <label>Nama Jabatan</label>
                    <input type="text" name="nama_jabatan" class="form-control" />
                    <?php echo form_error('nama_jabatan', '<div class="text-danger">','</div>') ?>
                </div>

                <div class="form-group">
                    <label>Gaji Pokok</label>
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Rp.</div>
                        </div>
                        <input type="text" name="gaji_pokok" class="form-control" />
                    </div>
                    <?php echo form_error('gaji_pokok', '<div class="text-danger">','</div>') ?>
                </div>

                <div class="form-group">
                    <label>Tunjangan Transport</label>
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Rp.</div>
                        </div>
                        <input type="text" name="tj_transport" class="form-control" />
                    </div>
                    <?php echo form_error('tj_transport', '<div class="text-danger">','</div>') ?>
                </div>

                <div class="form-group">
                    <label>Uang Makan</label>
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Rp.</div>
                        </div>
                        <input type="text" name="uang_makan" class="form-control" />
                    </div>
                    <?php echo form_error('uang_makan', '<div class="text-danger">','</div>') ?>
                </div>
            </div>
            <div class="card-footer p-3">
                <button type="submit" class="btn btn-block btn-success">Tambah</button>
            </div>
        </form>
    </div>

</div>
</div>
<!-- End of Main Content -->
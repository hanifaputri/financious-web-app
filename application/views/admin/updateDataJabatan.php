<!-- Begin Page Content -->
<div class="container-fluid mb-5">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card col-lg-6">
        <div class="card-body">
            <?php foreach ($jabatan as $j) : ?>
            <form method="post" action="<?php echo base_url('admin/dataJabatan/updateDataAksi')?>">
                <div class="form-group">
                    <label>Nama Jabatan</label>
                    <input type="hidden" name="id_jabatan" class="form-control" value="<?php echo $j->id_jabatan ?>" />
                    <input autofocus type="text" name="nama_jabatan" class="form-control" value="<?php echo $j->nama_jabatan ?>"/>
                    <?php echo form_error('nama_jabatan', '<div class="text-small text-danger"></div>') ?>
                </div>

                <div class="form-group">
                    <label>Gaji Pokok</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Rp.</span>
                        </div>
                        <input type="text" name="gaji_pokok" class="form-control" value="<?php echo $j->gaji_pokok ?>"/>
                    </div>
                    <?php echo form_error('gaji_pokok', '<div class="text-small text-danger"></div>') ?>
                </div>

                <div class="form-group">
                    <label>Tunjangan Transport</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Rp.</span>
                        </div>
                        <input type="text" name="tj_transport" class="form-control" value="<?php echo $j->tj_transport ?>"/>
                    </div>
                    <?php echo form_error('tj_transport', '<div class="text-small text-danger"></div>') ?>
                </div>

                <div class="form-group">
                    <label>Uang Makan</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Rp.</span>
                        </div>
                        <input type="text" name="uang_makan" class="form-control" value="<?php echo $j->uang_makan ?>"/>
                    </div>
                    <?php echo form_error('uang_makan', '<div class="text-small text-danger"></div>') ?>
                </div>

                <button type="submit" class="btn btn-success">Submit</button>
            </form>
            <?php endforeach; ?>
        </div>
    </div>

</div>
</div>
<!-- End of Main Content -->

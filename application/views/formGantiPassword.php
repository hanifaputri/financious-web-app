<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card" style="max-width:500px;">
        <form method="POST" action="<?php echo base_url('gantiPassword/gantiPasswordAksi')?>">
        <div class="card-body">

                <!-- Error Message -->
                <?php echo $this->session->flashdata('pesan') ?>

                <!-- Password Lama -->
                <div class="form-group">
                    <label>Masukkan Password Lama</label>
                    <div class="input-group" id="password">
                        <input type="password" name="passLama" class="form-control"  value=""/>
                    </div>
                    <?php echo form_error('passLama', '<div class="text-small text-danger"></div>') ?>
                </div>

                <!-- Password Baru -->
                <div class="form-group">
                    <label>Password Baru</label>
                    <div class="input-group" id="password">
                        <input type="password" name="passBaru" class="form-control"  value=""/>
                    </div>
                    <?php echo form_error('passBaru', '<div class="text-small text-danger"></div>') ?>
                </div>

                <!-- Ulangi Password -->
                <div class="form-group">
                    <label>Ulangi Password Baru</label>
                    <div class="input-group" id="password">
                        <input type="password" name="ulangPass" class="form-control"  value=""/>
                    </div>
                    <?php echo form_error('ulangPass', '<div class="text-small text-danger"></div>') ?>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
    </div>
</div>
</div>
<!-- End of Main Content -->


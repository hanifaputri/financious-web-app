<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="<?php echo base_url('admin/potonganGaji/tambahDataAksi')?>">
                <div class="form-group">
                    <label>Jenis Potongan</label>
                    <input required type="text" name="potongan" class="form-control">
                </div>
                
                <div class="form-group">
                    <label>Jenis Potongan</label>
                    <input required type="text" name="jml_potongan" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</div>
</div>
<!-- End of Main Content -->
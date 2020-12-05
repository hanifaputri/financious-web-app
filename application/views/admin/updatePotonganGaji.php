<!-- Begin Page Content -->
<div class="container-fluid mb-5">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card">
        <div class="card-body">
            <?php foreach ($potongan as $p) : ?>
            <form method="post" action="<?php echo base_url('admin/potonganGaji/updateDataAksi')?>">
                <div class="form-group">
                    <label>Jenis Potongan</label>
                    <input type="hidden" name="id" class="form-control" value="<?php echo $p->id?>">
                    <input required type="text" name="potongan" class="form-control" value="<?php echo $p->potongan?>">
                </div>
                
                <div class="form-group">
                    <label>Jumlah Potongan</label>
                    <input required type="text" name="jml_potongan" class="form-control" value="<?php echo $p->jml_potongan?>">
                </div>

                <button type="submit" class="btn btn-success">Submit</button>
            </form>
            <?php endforeach; ?>
        </div>
    </div>

</div>
</div>
<!-- End of Main Content -->

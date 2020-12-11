<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <?php echo $this->session->flashdata('pesan') ?>
    <!-- Tambah Data -->
    <a class="btn btn-success btn-icon-split mb-4"  href="<?php echo base_url('admin/potonganGaji/tambahData')?>">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah Data</span>
    </a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr class="text-center">
                <th>No.</th>
                <th>Jenis Potongan</th>
                <th>Jumlah Potongan</th>
                <th>Action</th>
            </tr>
        </thead>
        <?php $no=1; foreach($pot_gaji as $p) : ?>
            <tr>
                <td><?php echo $no++?>.</td>
                <td><?php echo $p->potongan?></td></td>
                <td>Rp <?php echo number_format($p->jml_potongan,0,',','.')?></td>
                <td class="text-center">
                    <a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/potonganGaji/updateData/'.$p->id)?>"><i class="fas fa-edit"></i></a>
                    <a onclick="return confirm('Yakin hapus?')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/potonganGaji/deleteData/'.$p->id)?>"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
</div>
<!-- End of Main Content -->
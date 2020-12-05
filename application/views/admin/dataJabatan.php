<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-flex">
        <div class="p-2">
            <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
        </div>
        <div class="ml-auto p-2">
            <!-- Tambah Data -->
            <a class="btn btn-success btn-icon-split mb-4"  href="<?php echo base_url('admin/dataJabatan/tambahData')?>">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Data</span>
            </a>
        </div>
    </div>


    <!-- Content -->
    <?php echo $this->session->flashdata('pesan') ?>

    <table class="table table-bordered table-striped mt-2">
        <thead class="thead-dark">
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Nama Jabatan</th>
                <th class="text-center">Gaji Pokok</th>
                <th class="text-center">Tj. Transport</th>
                <th class="text-center">Uang Makan</th>
                <th class="text-center">Total</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php $no=1; foreach($jabatan as $j) : ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $j->nama_jabatan ?></td>
                <td>Rp <?php echo number_format($j->gaji_pokok, 0, ',','.') ?></td>
                <td>Rp <?php echo number_format($j->tj_transport, 0, ',','.') ?></td>
                <td>Rp <?php echo number_format($j->uang_makan, 0, ',','.') ?></td>
                <td>Rp <?php echo number_format($j->gaji_pokok + $j->tj_transport + $j->uang_makan, 0, ',','.') ?></td>
                <td class="text-center">
                    <a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/dataJabatan/updateData/'.$j->id_jabatan)?>"><i class="fas fa-edit"></i></a>
                    <a onclick="return confirm('Yakin hapus?')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/dataJabatan/deleteData/'.$j->id_jabatan)?>"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>
<!-- End of Main Content -->
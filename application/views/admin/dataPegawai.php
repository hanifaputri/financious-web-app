<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <!-- Notifikasi -->
    <?php echo $this->session->flashdata('pesan')?>

    <!-- Tambah Data -->
    <a class="btn btn-success btn-icon-split mb-4"  href="<?php echo base_url('admin/dataPegawai/tambahData')?>">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah Data</span>
    </a>

    <!-- Tabel -->
    <table class="table table-bordered table-striped mt-2">
        <thead class="thead-dark text-center">
            <tr>
                <th class="align-middle">No</th>
                <th class="align-middle">NIK</th>
                <th class="align-middle">Nama Pegawai</th>
                <th class="align-middle">Jenis Kelamin</th>
                <th class="align-middle">Jabatan</th>
                <th class="align-middle">Status</th>
                <th class="align-middle">Photo</th>
                <th class="align-middle">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php $no=1; foreach($pegawai as $p) : ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $p->nik ?></td>
                <td><?php echo $p->nama_pegawai ?></td>
                <td><?php echo $p->jenis_kelamin ?></td>
                <td><?php echo $p->jabatan ?></td>
                <td><?php echo $p->status ?></td>
                <td><img style="width:75px" src="<?php echo base_url('assets/photo/').$p->photo ?>"></img></td>
                <td class="text-center">
                    <a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/dataPegawai/updateData/'.$p->id_pegawai)?>"><i class="fas fa-edit"></i></a>
                    <a onclick="return confirm('Yakin hapus?')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/dataPegawai/deleteData/'.$p->id_pegawai)?>"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>


</div>
</div>
<!-- End of Main Content -->
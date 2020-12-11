<script type="text/javascript">
window.base_url = <?php echo json_encode(base_url()); ?>;
</script>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Data Pegawai -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Data Pegawai</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlah_pegawai ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Data Admin -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Data Admin</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $admin ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-cog fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Data Jabatan -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $jabatan ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-briefcase fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Data Kehadiran -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Data Kehadiran</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $kehadiran ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold">Data Pegawai</h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Pengaturan</div>
                    <a class="dropdown-item" href="<?php echo base_url('admin/dataPegawai')?>">Edit Data</a>
                    <a class="dropdown-item" href="<?php echo base_url('admin/dataPegawai/tambahData')?>">Tambah Data</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <!-- Tabel -->
            <div class="table-responsive p-2 mb-4">
                <table id="dataTable" class="table table-bordered table-striped mt-2">
                    <thead class="text-center">
                        <tr>
                            <th class="align-middle">No</th>
                            <th class="align-middle">NIK</th>
                            <th class="align-middle">Nama Pegawai</th>
                            <th class="align-middle">Jenis Kelamin</th>
                            <th class="align-middle">Jabatan</th>
                            <th class="align-middle">Status</th>
                            <th class="align-middle">Photo</th>
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
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


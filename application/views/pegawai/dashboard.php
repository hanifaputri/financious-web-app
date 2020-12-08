
    <!-- Begin Page Content -->
    <div class="container-fluid" style="max-width:600px;">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
        </div>

        <!-- Content -->
        <div class="alert alert-success">
            Selamat datang, Anda login sebagai <span class="font-weight-bold">pegawai.</span>
        </div>

        <div class="card mb-4">
            <div class="card-header font-weight-bold bg-primary text-white">
                Data Pegawai
            </div>
            <?php foreach($pegawai as $p):?>
            <div class="row card-body">
                <div class="col-md-4 mb-4">
                    <img class="rounded img-thumbnail" style="width:100%" src="<?php echo base_url('assets/photo/'.$p->photo)?>"/>
                </div>
                <div class="col-md-8">
                    <table class="table table-striped">
                        <tr>
                            <td>Nama Pegawai</td>
                            <td>:</td>
                            <td><?php echo $p->nama_pegawai ?></td>
                        </tr>
                        <tr>
                            <td>Jabatan</td>
                            <td>:</td>
                            <td><?php echo $p->jabatan ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Masuk</td>
                            <td>:</td>
                            <td><?php echo $p->tanggal_masuk ?></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>:</td>
                            <td><?php echo $p->status ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <?php endforeach;?>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            Input Absensi Pegawai
        </div>
        <div class="card-body">
            <form class="form-inline">
                <div class="form-group mb-2 mr-4">
                    <label for="staticEmail2" class="mr-4">Bulan</label>
                    <select class="form-control" name="bulan">
                        <option>--Pilih Bulan--</option>
                        <option value="01">Januari</option>
                        <option value="02">Februari</option>
                        <option value="03">Maret</option>
                        <option value="04">April</option>
                        <option value="05">Mei</option>
                        <option value="06">Juni</option>
                        <option value="07">Juli</option>
                        <option value="08">Agustus</option>
                        <option value="09">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                </div>

                <div class="form-group mb-2 mr-4">
                    <label for="staticEmail2" class="mr-4">Tahun</label>
                    <select class="form-control" name="tahun">
                        <option>--Pilih Tahun--</option>
                        <?php $tahun = date('Y');
                        for($i=2020; $i<$tahun+5;$i++) { ?>
                            <option value="<?php echo $i?>"
                            <?php /*
                                if (($_GET['bulan'])=)*/
                            ?>
                            ><?php echo $i?></option>
                            
                        <?php } ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mb-2 ml-auto mr-2"><i class="fas fa-eye mr-3"></i>Tampilkan Data</button>
                
                <!-- Tambah Data -->
                <a class="btn btn-success btn-icon-split mb-2 ml-2"  href="<?php echo base_url('admin/dataAbsensi/inputAbsensi')?>">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Input Kehadiran</span>
                </a>
            </form>
        </div>
    </div>

    <?php 
        if ((isset($_GET['bulan']) && $_GET['bulan']!='') && 
            (isset($_GET['tahun']) && $_GET['tahun']!='')){
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulantahun = $bulan.$tahun;
        } else {
            $bulan = date('NIK');
            $tahun = date('Y');
            $bulantahun = $bulan.$tahun;
        }
    ?>

    <?php 
        $isDataExist = count($absensi);
        if (!$isDataExist){ ?>
            <div class="alert alert-danger">
                Oops, mohon maaf data pada bulan dan tahun yang Anda pilih belum ada. Silahkan tambah data terlebih dahulu.</div>
        <?php
        } else { ?>
        <div class="alert alert-info">
            Menampilkan data kehadiran pegawai 
            bulan <span class="font-weight-bold"><?php echo $bulan ?></span> 
            bahun <span class="font-weight-bold"><?php echo $tahun ?></span> 
        </div>

        <table class="table table-bordered table-striped">
            <tr class="text-center">
                <td>Nomor</td>
                <td>NIK</td>
                <td>Nama Pegawai</td>
                <td>Jenis Kelamin</td>
                <td>Jabatan</td>
                <td>Hadir</td>
                <td>Sakit</td>
                <td>Alpha</td>
            </tr>
            <?php $no=1; foreach ($input_absensi as $a) : ?>
                <tr>
                    <td><?php echo $no++?></td>
                    <td><?php echo $a->nik?></td>
                    <td><?php echo $a->nama_pegawai?></td>
                    <td><?php echo $a->jenis_kelamin?></td>
                    <td><?php echo $a->nama_jabatan ?></td>
                    <td><?php echo $a->hadir?></td>
                    <td><?php echo $a->sakit?></td>
                    <td><?php echo $a->alpha?></td>
                </tr>
            <?php endforeach; ?>
        </table>

    <?php
        }
    ?>

</div>
</div>
<!-- End of Main Content -->
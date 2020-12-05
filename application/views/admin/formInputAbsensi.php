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
                <button type="submit" class="btn btn-primary mb-2 ml-auto mr-2"><i class="fas fa-eye mr-3"></i>Generate Data</button>
                
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
            $bulan = date('m');
            $tahun = date('Y');
            $bulantahun = $bulan.$tahun;
        }
    ?>

    <div class="alert alert-info">
        Menampilkan data kehadiran pegawai 
        bulan <span class="font-weight-bold"><?php echo $bulan ?></span> 
        tahun <span class="font-weight-bold"><?php echo $tahun ?></span> 
    </div>
    <form method="POST">
        <button name="submit" value="submit" class="btn btn-success mb-3" type="submit">Simpan</button>
        
        <table class="table table-bordered table-striped">
            <tr class="text-center">
                <td>No.</td>
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
                    <!-- Hidden field -->
                    <input type="hidden" name="bulan[]" value="<?php echo $bulantahun ?>" class="form-control">
                    <input type="hidden" name="nik[]" value="<?php echo $a->nik ?>" class="form-control">
                    <input type="hidden" name="nama_pegawai[]" value="<?php echo $a->nama_pegawai ?>" class="form-control">
                    <input type="hidden" name="jenis_kelamin[]" value="<?php echo $a->jenis_kelamin ?>" class="form-control">
                    <input type="hidden" name="nama_jabatan[]" value="<?php echo $a->nama_jabatan ?>" class="form-control">
                    
                    <td><?php echo $no++?>.</td>
                    <td><?php echo $a->nik?></td>
                    <td><?php echo $a->nama_pegawai?></td>
                    <td><?php echo $a->jenis_kelamin?></td>
                    <td><?php echo $a->nama_jabatan ?></td>
                    <td width="8%"><input type="number" name="hadir[]" value="0" class="form-control"></td>
                    <td width="8%"><input type="number" name="sakit[]" value="0" class="form-control"></td>
                    <td width="8%"><input type="number" name="alpha[]" value="0" class="form-control"></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </form>

</div>
</div>
<!-- End of Main Content -->
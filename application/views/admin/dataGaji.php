<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <!-- Filter Start-->
    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            Filter Data Absensi Pegawai
        </div>
        <div class="card-body">
            <form class="form-inline">
                <div class="form-group mb-2 mr-4">
                    <label for="staticEmail2" class="mr-4">Bulan</label>
                    <select class="form-control" name="bulan" required>
                        <option value="">--Pilih Bulan--</option>
                        <?php
                        $opsiBulan = array(
                            "01" => "Januari",
                            "02" => "Februari",
                            "03" => "Maret",
                            "04" => "April",
                            "05" => "Mei",
                            "06" => "Juni",
                            "07" => "Juli",
                            "08" => "Agustus",
                            "09" => "September",
                            "10" => "Oktober",
                            "11" => "November",
                            "12" => "Desember"
                        );

                        $bulan = $_GET['bulan'];
                        foreach ($opsiBulan as $index => $namaBulan) {
                            echo "<option value='$index' ";
                            if ($bulan == $index) 
                                echo "selected";
                            echo ">$namaBulan</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group mb-2 mr-4">
                    <label for="staticEmail2" class="mr-4">Tahun</label>
                    <select class="form-control" name="tahun" required>
                        <option value="">--Pilih Tahun--</option>
                        <?php 
                        $tahun = $this->input->get('tahun');
                        $tahunSekarang = date('Y');
                        for ($th = $tahunSekarang; $th < $tahunSekarang + 5; $th++) {
                            echo "<option value='$th' ";
                            if ($tahun == $th) 
                                echo "selected";
                            echo ">$th</option>";
                        }
                        ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mb-2 ml-auto mr-2"><i class="fas fa-eye mr-3"></i>Tampilkan Data</button>
                
                <!-- Tambah Data -->
                <a class="btn btn-success btn-icon-split mb-2 ml-2">
                    <span class="icon text-white">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Input Kehadiran</span>
                </a>
            </form>
        </div>
    </div>

    <!-- Content Start -->
    <div class="alert alert-info">
        Menampilkan data gaji pegawai 
        bulan <span class="font-weight-bold"><?php echo $bulan ?></span> 
        tahun <span class="font-weight-bold"><?php echo $tahun ?></span> 
    </div>
    
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <tr class="text-center">
                <th>NO</th>
                <th>Nama Pegawai</th>
                <th>Jenis Kelamin</th>
                <th>Jabatan</th>
                <th>Gaji Pokok</th>
                <th>Tj. Transportasi</th>
                <th>Uang Makan</th>
                <th>Potongan</th>
                <th>Total Gaji</th>
            </tr>

            <?php 
            foreach($potongan as $p) { 
                $alpha = $p->jml_potongan;
            }?>
            <?php $no=1; foreach($gaji as $g) : ?>
            <?php 
                $potongan = $g->alpha * $alpha;
                echo $alpha;
            die();
            ?>
            <tr>
                <td><?php echo $no++;?></td>
                <td><?php echo $g->nama_pegawai?></td>
                <td><?php echo $g->jenis_kelamin?></td>
                <td><?php echo $g->nama_jabatan?></td>
                <td>Rp <?php echo number_format($g->gaji_pokok,0,',','.')?></td>
                <td>Rp <?php echo number_format($g->tj_transport,0,',','.')?></td>
                <td>Rp <?php echo number_format($g->uang_makan,0,',','.')?></td>
                <td>Rp <?php echo number_format($potongan,0,',','.')?></td>
            <?php endforeach; ?>
            </tr>
        </table>
    </div>

</div>
</div>
<!-- End of Main Content -->
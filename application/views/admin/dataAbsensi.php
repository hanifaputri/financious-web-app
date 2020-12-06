<div class="container-fluid">
    <div class="d-flex mb-4">
        <div class="p-2">
            <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
        </div>
        <div class="ml-auto p-2">
        </div>
    </div>

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
                <a class="btn btn-success btn-icon-split mb-2 ml-2
                <?php
                if (count($absensi) == count($jumlah_pegawai)){
                    echo 'disabled';
                }
                ?>
                " href="
                <?php 
                $base_url = base_url('admin/dataAbsensi/inputAbsensi');
                if (isset($_GET['bulan']) && isset($_GET['tahun'])){
                    echo $base_url.'?bulan='.$_GET['bulan'].'&&tahun='.$_GET['tahun'];
                } else {
                    echo $base_url;
                }
                ?>">
                    <span class="icon text-white">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Input Kehadiran</span>
                </a>
            </form>
        </div>
    </div>

    <?php 
    if (!(isset($_GET['bulan']) && $_GET['bulan']!='') && 
        !(isset($_GET['tahun']) && $_GET['tahun']!='')){
        $bulan = date('m');
        $tahun = date('Y');
        $bulantahun = $bulan.$tahun;
    ?>
        <div class="alert alert-danger">
            Mohon masukkan bulan dan tahun terlebih dahulu.
        </div>
    <?php
    } else {
        $bulan = $_GET['bulan'];
        $tahun = $_GET['tahun'];
        $bulantahun = $bulan.$tahun;
    ?>
        <!-- Flash Alert 00 
        <div class="alert alert-success alert-dismissible fade show">
            Menampilkan data kehadiran pegawai 
            bulan <span class="font-weight-bold"><?php echo $bulan ?></span> 
            tahun <span class="font-weight-bold"><?php echo $tahun ?></span> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>-->
    <!-- Waktu sudah di set -->
        <?php 
            $isDataExist = count($absensi);
            if (!$isDataExist){ ?>
                <div class="alert alert-danger">
                    Oops, mohon maaf data pada bulan dan tahun yang Anda pilih belum ada. Silahkan input data kehadiran terlebih dahulu.</div>
            <?php
            } else { ?>
            <div class="alert alert-info">
                Menampilkan data kehadiran pegawai 
                bulan <span class="font-weight-bold"><?php echo $bulan ?></span> 
                tahun <span class="font-weight-bold"><?php echo $tahun ?></span> 
            </div>
            <div class="table-responsive">
                <table class="table  table-bordered table-striped">
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
                    <?php $no=1; foreach ($absensi as $a) : ?>
                        <tr>
                            <td><?php echo $no++?>.</td>
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
            </div>
        <?php
            }
        ?>
    <?php
    }
    ?>

</div>
</div>
<!-- End of Main Content -->
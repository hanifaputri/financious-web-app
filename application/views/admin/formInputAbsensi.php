<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            Input Absensi Pegawai
        </div>
        <div class="card-body">
            <div class="d-flex">
                <div class="p-2">
                    <form class="form-inline" id="filter">
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

                                $bulan = $this->input->get('bulan');
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
                    </form>
                </div>
                <div class="ml-auto p-2">
                    <button onclick="document.getElementById('filter').submit()" class="btn btn-primary mb-2 ml-auto mr-2"><i class="fas fa-eye mr-3"></i>Generate Data</button>
                    <button name="submit" value="submit" form="data" onclick="document.getElementById('data').submit()" class="btn btn-success btn-icon-split mb-2 ml-2"
                    <?php if (count($input_absensi)==0) echo'disabled'?>>       
                        <span class="icon text-white">
                        <i class="fas fa-save"></i>
                        </span>
                        <span class="text">Simpan</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <?php 
    if (!$this->input->get('bulan') && !$this->input->get('bulan')){
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
    <!-- Data Sudah Diset -->
        <?php 
        if (!count($input_absensi)){ ?>   
        <div class="alert alert-danger">
            Mohon maaf data pada bulan ini sudah terinput.
            <a href="<?php echo base_url('/admin/dataAbsensi?')."bulan=$bulan&tahun=$tahun"?>">Klik disini untuk menampilkan data</a>, atau
            silahkan input data kehadiran pada bulan lain.
        </div>
        <?php
        } else { ?>
            <!-- Data Belum diinput -->
            <div class="alert alert-info">
                Menampilkan 
                <span class="font-weight-bold"><?php echo count($input_absensi)?> </span> 
                data kehadiran pegawai pada
                bulan <span class="font-weight-bold"><?php echo $bulan ?></span> 
                tahun <span class="font-weight-bold"><?php echo date($tahun) ?></span> 
            </div>

            <form method="POST" id="data" name="submit">
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
                            <td width="8%"><input type="number" min="0" name="hadir[]" class="form-control"></td>
                            <td width="8%"><input type="number" min="0" name="sakit[]" class="form-control"></td>
                            <td width="8%"><input type="number" min="0" name="alpha[]" class="form-control"></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </form>
        <?php 
        }?>
    <?php
    }?>

</div>
</div>
<!-- End of Main Content -->
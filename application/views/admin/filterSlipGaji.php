<div class="container-fluid">

    <div class="card mx-auto my-auto" style="max-width:500px;">
        <div class="card-header bg-primary text-white text-center">
            Filter Slip Gaji
        </div>
        <div class="card-body">
        
        <form method="POST" action="<?php echo base_url('admin/slipGaji/cetakSlipGaji')?>">
            <div class="form-group row mb-4">
                <label class="col-sm-4 col-form-label">Bulan</label>
                <div class="col-sm-8">
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

                        $bulan = $this->session->flashdata('bulan');
                        foreach ($opsiBulan as $index => $namaBulan) {
                            echo "<option value='$index' ";
                            if ($bulan == $index) 
                            echo "selected";
                            echo ">$namaBulan</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group row mb-4">
                <label class="col-sm-4 col-form-label">Tahun</label>
                <div class="col-sm-8">
                    <select class="form-control" name="tahun" required>
                        <option value="">--Pilih Tahun--</option>
                        <?php 
                        $tahun = $this->session->flashdata('tahun');
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
            </div>

            <p class="font-weight-bold text-primary">Data Pegawai</p>
            <hr>
            
            <!-- Notifikasi -->
            <?php echo $this->session->flashdata('pesan')?>

            <div class="form-group row mb-4">
                <label for="nik" class="col-sm-4 col-form-label">NIK Pegawai</label>
                <div class="col-sm-8">
                    <input type="text" id="nik" name="nik" class="form-control" required/>
                    <small id="passwordHelpBlock" class="form-text text-muted">
                    Contoh NIK: 1234567890
                    </small>
                </div>
            </div>
            <button type="submit" class="btn btn-block btn-success">
                <i class="fas fa-print mr-3"></i>
                Cetak Laporan Absensi
            </button>
            
            </form>
        </div>
    </div>

</div>
</div>
<!-- End of Main Content -->
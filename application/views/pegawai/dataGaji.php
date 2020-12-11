<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="table-responsive">
    <table id="dataTable" class="table table-striped table-bordered">
        <thead class="text-center">
        <tr>
            <th>Bulan/Tahun</th>
            <th>Hadir</th>
            <th>Sakit</th>
            <th>Alpha</th>
            <th>Gaji Pokok</th>
            <th>Tj. Transportasi</th>
            <th>Uang Makan</th>
            <th>Potongan</th>
            <th>Total Gaji</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
            <?php 
            $alpha = $potongan_alpha->jml_potongan;
            foreach($gaji as $g) {
                $bulan_tahun = substr($g->bulan, 0, 2).'/'.substr($g->bulan, 2);
                $potongan = $g->alpha * $alpha;
                $total_gaji = ($g->gaji_pokok) + ($g->tj_transport) + ($g->uang_makan) - ($potongan);
            ?>
            <tr>
                <td><?php echo $bulan_tahun?></td>
                <td><?php echo $g->hadir?></td>
                <td><?php echo $g->sakit?></td>
                <td><?php echo $g->alpha?></td>
                <td>Rp. <?php echo number_format($g->gaji_pokok,0,',','.')?></td>
                <td>Rp. <?php echo number_format($g->tj_transport,0,',','.')?></td>
                <td>Rp. <?php echo number_format($g->uang_makan,0,',','.')?></td>
                <td>Rp. <?php echo number_format($potongan,0,',','.')?></td>
                <td>Rp. <?php echo number_format($total_gaji,0,',','.')?></td>
                <td>
                    <a class="btn btn-sm btn-primary" href="<?php echo base_url('pegawai/dataGaji/cetakSlip/'.$g->id_kehadiran)?>"><i class="fas fa-print mr-2"></i>Cetak</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    </div>
</div>
</div>
<!-- End of Main Content -->
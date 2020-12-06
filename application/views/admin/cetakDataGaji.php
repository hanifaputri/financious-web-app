<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title ?></title>
    <style type="text/css">
        body {
            color: #000;
            margin: 30px;
        }
        .title {
            text-align: center;
        }
        table {
            color: #000!important;
        }
    </style>
</head>
<body>
    <div class="title">
        <h1 class="font-weight-bold">PT. Tiga Babi Maju Jaya</h1>
        <h2>Daftar Gaji Pegawai</h2>
    </div>

    <table>
        <tr>
            <td>Bulan</td>
            <td>:</td>
            <td><?php echo $bulan;?></td>
        </tr>
    <table>
        <tr>
            <td>Tahun</td>
            <td>:</td>
            <td><?php echo $tahun;?></td>
        </tr>
    </table>
    <br/>
    <br/>

    <!-- Tabel Gaji -->
    <table class="table table-bordered table-striped" width="100%">
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
        <!-- Table Content -->
        <?php 
        $alpha = $potongan_alpha->jml_potongan;
        $no=1;
        foreach($cetakGaji as $g){
            $potongan = $g->alpha * $alpha;
            $total_gaji = ($g->gaji_pokok) + ($g->tj_transport) + ($g->uang_makan) - ($potongan);
        ?>
        <tr>
            <td><?php echo $no++;?></td>
            <td><?php echo $g->nama_pegawai?></td>
            <td><?php echo $g->jenis_kelamin?></td>
            <td><?php echo $g->nama_jabatan?></td>
            <td>Rp. <?php echo number_format($g->gaji_pokok,0,',','.')?></td>
            <td>Rp. <?php echo number_format($g->tj_transport,0,',','.')?></td>
            <td>Rp. <?php echo number_format($g->uang_makan,0,',','.')?></td>
            <td>Rp. <?php echo number_format($potongan,0,',','.')?></td>
            <td>Rp. <?php echo number_format($total_gaji,0,',','.')?></td>
        </tr>
        <?php } ?>
    </table>
    <br/>
    <br/>
    <table width="100%">
        <tr>
            <td></td>
            <td width="200px">
                <p>Jakarta, <?php echo date("d M Y")?> <br/> Finance,</p>
                <br/>
                <br/>
                ________________________
            </td>
        </tr>
    </table>

    <script type="text/javascript">
        window.print();
    </script>

</body>
</html>
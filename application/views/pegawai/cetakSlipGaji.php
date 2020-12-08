<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title ?></title>
    <style type="text/css">
        body {
            color: #000;
            margin: 40px 30px;
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
    <div class="title mb-5">
        <h1 class="font-weight-bold">PT. Tiga Babi Maju Jaya</h1>
        <h2>Slip Gaji Pegawai</h2>
    </div>

    <?php 
    $alpha = $potongan_alpha->jml_potongan;
    $no=1;
    foreach($print_slip as $ps){
        $potongan = $ps->alpha * $alpha;
        $total_gaji = ($ps->gaji_pokok) + ($ps->tj_transport) + ($ps->uang_makan) - ($potongan);
    ?>
        <table width="50%">
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td><?php echo $ps->nik;?></td>
            </tr>
            <tr>
                <td>Nama Pegawai</td>
                <td>:</td>
                <td><?php echo $ps->nama_pegawai;?></td>
            </tr>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>:</td>
                <td><?php echo $ps->nama_jabatan;?></td>
            </tr>
            <tr>
                <td>Bulan/tahun</td>
                <td>:</td>
                <td><?php echo substr($ps->bulan, 0, 2).'/'.substr($ps->bulan, 2);?></td>
            </tr>
        </table>
        <br/>
        <br/>

        <!-- Tabel Gaji -->
        <table class="table table-bordered" style="width:100%;">
            <tr class="text-center">
                <th>No.</th>
                <th>Keterangan</th>
                <th>Jumlah</th>
            </tr>
            <tr>
                <td><?php echo $no++;?>.</td>
                <td>Gaji Pokok</td>
                <td>Rp <?php echo number_format($ps->gaji_pokok,0,',','.')?></td>
            </tr>
            <tr>
                <td><?php echo $no++;?>.</td>
                <td>Tunjangan Transportasi</td>
                <td>Rp <?php echo number_format($ps->tj_transport,0,',','.')?></td>
            </tr>
            <tr>
                <td><?php echo $no++;?>.</td>
                <td>Tunjangan Uang Makan</td>
                <td>Rp <?php echo number_format($ps->uang_makan,0,',','.')?></td>
            </tr>
            <tr>
                <td><?php echo $no++;?>.</td>
                <td>Potongan</td>
                <td>Rp <?php echo number_format($potongan,0,',','.')?></td>
            </tr>
            <tr class="font-weight-bold">
                <td colspan="2" class="text-right">Total</td>
                <td>Rp <?php echo number_format($total_gaji,0,',','.')?></td>
            </tr>
        </table>
    <?php } ?>

    <br/>
    <br/>
    <table width="100%">
        <tr>
            <td>
                <br/>
                <p>Pegawai,</p>
                <br/>
                <br/>
                <br/>
                <br/>
                ________________________________
                <br/>
                <p><?php echo $ps->nama_pegawai?></p>
            </td>
            <td width="200px">
                <p>Jakarta, <?php echo date("d M Y")?> <br/> Finance,</p>
                <br/>
                <br/>
                <br/>
                <br/>
                ________________________________
            </td>
        </tr>
    </table>

    <script type="text/javascript">
        window.print();
    </script>

</body>
</html>
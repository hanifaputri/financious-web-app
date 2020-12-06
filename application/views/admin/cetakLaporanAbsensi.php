<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title ?></title>
    <style type="text/css">
        body {
            color: #000;
            margin: 30px;
        }
        table {
            color: #000!important;
        }
    </style>
</head>
<body>
    <div class="title text-center">
        <h1 class="font-weight-bold">PT. Tiga Babi Maju Jaya</h1>
        <h2>Laporan Kehadiran Pegawai</h2>
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
    <table class="table table-bordered" width="100%">
        <tr class="text-center">
            <th>No.</th>
            <th>Nama Pegawai</th>
            <th>NIK</th>
            <th>Jabatan</th>
            <th>Hadir</th>
            <th>Sakit</th>
            <th>Alpha</th>
        </tr>
        <!-- Table Content -->
        <?php $no=1; foreach($lap_kehadiran as $l):?>
        <tr>
            <td><?php echo $no++;?></td>
            <td><?php echo $l->nama_pegawai?></td>
            <td><?php echo $l->nik?></td>
            <td><?php echo $l->nama_jabatan?></td>
            <td><?php echo $l->hadir?></td>
            <td><?php echo $l->sakit?></td>
            <td><?php echo $l->alpha?></td>
        </tr>
        <?php endforeach; ?>
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
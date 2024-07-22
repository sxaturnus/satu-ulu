<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Statistik arga - Kelurahan Satu Ulu</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        table, th, td {
            border: 1px solid black;
            font-size: 11pt;
            text-align: center;
        }
    </style>
</head>
<body>
    <center>
        <h3>Data Statistik Warga Kelurahan Satu Ulu</h3>
    </center>
    <table>
        <thead>
            <tr>
                <th width="1%">No</th>
                <th>RW</th>
                <th>RT</th>
                <th colspan="2">Jumlah Warga</th>
                <th colspan="2">Laki-laki</th>
                <th colspan="2">Perempuan</th>
                <th colspan="2">Warga Tetap</th>
                <th colspan="2">Warga Tidak Tetap</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $koneksi = mysqli_connect("localhost", "root", "", "satu_ulu");
                $data = mysqli_query($koneksi, "SELECT * FROM warga ORDER BY rw ASC, rt ASC");
                $no = 1;

                if (mysqli_num_rows($data) > 0) {
                    while ($d = mysqli_fetch_array($data)) {
                        $rw = $d['rw'];
                        $rt = $d['rt'];
                        $jumlah_warga = $d['jumlah_warga'];
                        $pria = $d['pria'];
                        $wanita = $d['wanita'];
                        $warga_tetap = $d['warga_tetap'];
                        $warga_tdkTetap = $d['warga_tdkTetap'];

                        // Calculate percentages
                        $persentase_pria = ($pria / $jumlah_warga) * 100;
                        $persentase_wanita = ($wanita / $jumlah_warga) * 100;
                        $persentase_tetap = ($warga_tetap / $jumlah_warga) * 100;
                        $persentase_tdkTetap = ($warga_tdkTetap / $jumlah_warga) * 100;
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $rw; ?></td>
                <td><?php echo $rt; ?></td>
                <td><?php echo $jumlah_warga; ?></td>
                <td><?php echo number_format($persentase_pria + $persentase_wanita, 2) . "%"; ?></td>
                <td><?php echo $pria; ?></td>
                <td><?php echo number_format($persentase_pria, 2) . "%"; ?></td>
                <td><?php echo $wanita; ?></td>
                <td><?php echo number_format($persentase_wanita, 2) . "%"; ?></td>
                <td><?php echo $warga_tetap; ?></td>
                <td><?php echo number_format($persentase_tetap, 2) . "%"; ?></td>
                <td><?php echo $warga_tdkTetap; ?></td>
                <td><?php echo number_format($persentase_tdkTetap, 2) . "%"; ?></td>
            </tr>
            <?php
                    }
                }
            ?>
        </tbody>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Statistik Kepala Keluarga - Kelurahan Satu Ulu</title>
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
        <h3>Data Statistik Kepala Keluarga Kelurahan Satu Ulu</h3>
    </center>
    <table>
        <thead>
            <tr>
                <th width="1%">No</th>
                <th>RW</th>
                <th>RT</th>
                <th colspan="2">Jumlah KK</th>
                <th colspan="2">KK Laki-laki</th>
                <th colspan="2">KK Perempuan</th>
                <th colspan="2">KK Ekonomi Mampu</th>
                <th colspan="2">KK Ekonomi Tidak Mampu</th>
                <th colspan="2">KK Alamat Luar</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $koneksi = mysqli_connect("localhost", "root", "", "satu_ulu");
                $data = mysqli_query($koneksi, "SELECT * FROM kk ORDER BY rw ASC, rt ASC");
                $no = 1;

                if (mysqli_num_rows($data) > 0) {
                    while ($d = mysqli_fetch_array($data)) {
                        $rw = $d['rw'];
                        $rt = $d['rt'];
                        $jumlah_kk = $d['jumlah_kk'];
                        $kk_lk = $d['kk_lk'];
                        $kk_pr = $d['kk_pr'];
                        $kk_mampu = $d['kk_mampu'];
                        $kk_tdkMampu = $d['kk_tdkMampu'];
                        $kk_luar = $d['kk_luar'];

                        // Calculate percentages
                        $persentase_lk = ($kk_lk / $jumlah_kk) * 100;
                        $persentase_pr = ($kk_pr / $jumlah_kk) * 100;
                        $persentase_mampu = ($kk_mampu / $jumlah_kk) * 100;
                        $persentase_tdkMampu = ($kk_tdkMampu / $jumlah_kk) * 100;
                        $persentase_kkLuar = ($kk_luar / $jumlah_kk) * 100;
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $rw; ?></td>
                <td><?php echo $rt; ?></td>
                <td><?php echo $jumlah_kk; ?></td>
                <td><?php echo number_format($persentase_lk + $persentase_pr, 2) . "%"; ?></td>
                <td><?php echo $kk_lk; ?></td>
                <td><?php echo number_format($persentase_lk, 2) . "%"; ?></td>
                <td><?php echo $kk_pr; ?></td>
                <td><?php echo number_format($persentase_pr, 2) . "%"; ?></td>
                <td><?php echo $kk_mampu; ?></td>
                <td><?php echo number_format($persentase_mampu, 2) . "%"; ?></td>
                <td><?php echo $kk_tdkMampu; ?></td>
                <td><?php echo number_format($persentase_tdkMampu, 2) . "%"; ?></td>
                <td><?php echo $kk_luar; ?></td>
                <td><?php echo number_format($persentase_kkLuar, 2) . "%"; ?></td>
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Statistik Rumah/Bangunan</title>
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
        <h3>Data Statistik Rumah/Bangunan Kelurahan Satu Ulu</h3>
    </center>
    <table>
        <thead>
            <tr>
                <th width="1%">No</th>
                <th>RW</th>
                <th>RT</th>
                <th colspan="2">Jumlah Rumah</th>
                <th colspan="2">Rumah Sebagai Tempat Tinggal</th>
                <th colspan="2">Rumah Sebagai Tempat Usaha</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $koneksi = mysqli_connect("localhost", "root", "", "satu_ulu");
                $data = mysqli_query($koneksi, "SELECT * FROM rumah ORDER BY rw ASC, rt ASC");
                $no = 1;

                if (mysqli_num_rows($data) > 0) {
                    while ($d = mysqli_fetch_array($data)) {
                        $rw = $d['rw'];
                        $rt = $d['rt'];
                        $jumlah_rumah = $d['jumlah_rumah'];
                        $rumah_tinggal = $d['rumah_tinggal'];
                        $rumah_usaha = $d['rumah_usaha'];

                        // Calculate percentages
                        $persentase_tinggal = ($rumah_tinggal / $jumlah_rumah) * 100;
                        $persentase_usaha = ($rumah_usaha / $jumlah_rumah) * 100;
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $rw; ?></td>
                <td><?php echo $rt; ?></td>
                <td><?php echo $jumlah_rumah; ?></td>
                <td><?php echo number_format($persentase_tinggal + $persentase_usaha, 2) . "%"; ?></td>
                <td><?php echo $rumah_tinggal; ?></td>
                <td><?php echo number_format($persentase_tinggal, 2) . "%"; ?></td>
                <td><?php echo $rumah_usaha; ?></td>
                <td><?php echo number_format($persentase_usaha, 2) . "%"; ?></td>
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

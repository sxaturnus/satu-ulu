<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Statistik Agama & Pemeluk Kepercayaan</title>
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
        <h3>Data Statistik Agama & Pemeluk Kepercayaan Kelurahan Satu Ulu</h3>
    </center>
    <table>
        <thead>
            <tr>
                <th width="1%">No</th>
                <th>RW</th>
                <th>RT</th>
                <th colspan="2">Jumlah Warga</th>
                <th colspan="2">Islam</th>
                <th colspan="2">Kristen Katolik</th>
                <th colspan="2">Kristen Protestan</th>
                <th colspan="2">Hindu</th>
                <th colspan="2">Budha</th>
                <th colspan="2">Khonghucu</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $koneksi = mysqli_connect("localhost", "root", "", "satu_ulu");
                $data = mysqli_query($koneksi, "SELECT * FROM agama ORDER BY rw ASC, rt ASC");
                $no = 1;

                if (mysqli_num_rows($data) > 0) {
                    while ($d = mysqli_fetch_array($data)) {
                        $rw = $d['rw'];
                        $rt = $d['rt'];
                        $jumlah_warga = $d['jumlah_warga'];
                        $islam = $d['islam'];
                        $katolik = $d['katolik'];
                        $protestan = $d['protestan'];
                        $hindu = $d['hindu'];
                        $budha = $d['budha'];
                        $khonghucu = $d['khonghucu'];

                        // Calculate percentages
                        $persentase_islam = ($islam / $jumlah_warga) * 100;
                        $persentase_katolik = ($katolik / $jumlah_warga) * 100;
                        $persentase_protestan = ($protestan / $jumlah_warga) * 100;
                        $persentase_hindu = ($hindu / $jumlah_warga) * 100;
                        $persentase_budha = ($budha / $jumlah_warga) * 100;
                        $persentase_khonghucu = ($khonghucu / $jumlah_warga) * 100;
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $rw; ?></td>
                <td><?php echo $rt; ?></td>
                <td><?php echo $jumlah_warga; ?></td>
                <td><?php echo number_format($persentase_islam + $persentase_katolik + $persentase_protestan + $persentase_hindu + $persentase_budha + $persentase_khonghucu, 2) . "%"; ?></td>
                <td><?php echo $islam; ?></td>
                <td><?php echo number_format($persentase_islam, 2) . "%"; ?></td>
                <td><?php echo $katolik; ?></td>
                <td><?php echo number_format($persentase_katolik, 2) . "%"; ?></td>
                <td><?php echo $protestan; ?></td>
                <td><?php echo number_format($persentase_protestan, 2) . "%"; ?></td>
                <td><?php echo $hindu; ?></td>
                <td><?php echo number_format($persentase_hindu, 2) . "%"; ?></td>
                <td><?php echo $budha; ?></td>
                <td><?php echo number_format($persentase_budha, 2) . "%"; ?></td>
                <td><?php echo $khonghucu; ?></td>
                <td><?php echo number_format($persentase_khonghucu, 2) . "%"; ?></td>
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

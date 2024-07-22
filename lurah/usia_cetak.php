<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Statistik Kelompok Usia</title>
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
        <h3>Data Statistik Kelompok Usia Kelurahan Satu Ulu</h3>
    </center>
    <table>
        <thead>
            <tr>
                <th rowspan="2" width="1%">No</th>
                <th rowspan="2">RW</th>
                <th rowspan="2">RT</th>
                <th rowspan="2" colspan="2">Jumlah Warga</th>
                <th colspan="3">Balita</th>
                <th colspan="3">Usia Dini</th>
                <th colspan="3">Remaja</th>
                <th colspan="3">Dewasa</th>
                <th colspan="3">Lansia</th>
            </tr>
            <tr>
                <th>L</th>
                <th>P</th>
                <th>%</th>
                <th>L</th>
                <th>P</th>
                <th>%</th>
                <th>L</th>
                <th>P</th>
                <th>%</th>
                <th>L</th>
                <th>P</th>
                <th>%</th>
                <th>L</th>
                <th>P</th>
                <th>%</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $koneksi = mysqli_connect("localhost", "root", "", "satu_ulu");
                $data = mysqli_query($koneksi, "SELECT * FROM usia ORDER BY rw ASC, rt ASC");
                $no = 1;

                if (mysqli_num_rows($data) > 0) {
                    while ($d = mysqli_fetch_array($data)) {
                        $rw = $d['rw'];
                        $rt = $d['rt'];
                        $total_warga = $d['total_warga'];
                        $balita_lk = $d['balita_lk'];
                        $balita_pr = $d['balita_pr'];
                        $usia_dini_lk = $d['ud_lk'];
                        $usia_dini_pr = $d['ud_pr'];
                        $remaja_lk = $d['remaja_lk'];
                        $remaja_pr = $d['remaja_pr'];
                        $dewasa_lk = $d['dewasa_lk'];
                        $dewasa_pr = $d['dewasa_pr'];
                        $lansia_lk = $d['lansia_lk'];
                        $lansia_pr = $d['lansia_pr'];

                        // Calculate percentages
                        $persentase_balita = ($total_warga > 0) ? (($balita_lk + $balita_pr) / $total_warga) * 100 : 0;
                        $persentase_usia_dini = ($total_warga > 0) ? (($usia_dini_lk + $usia_dini_pr) / $total_warga) * 100 : 0;
                        $persentase_remaja = ($total_warga > 0) ? (($remaja_lk + $remaja_pr) / $total_warga) * 100 : 0;
                        $persentase_dewasa = ($total_warga > 0) ? (($dewasa_lk + $dewasa_pr) / $total_warga) * 100 : 0;
                        $persentase_lansia = ($total_warga > 0) ? (($lansia_lk + $lansia_pr) / $total_warga) * 100 : 0;
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $rw; ?></td>
                <td><?php echo $rt; ?></td>
                <td><?php echo $total_warga; ?></td>
                <td><?php echo number_format($persentase_balita + $persentase_usia_dini + $persentase_remaja + $persentase_dewasa + $persentase_lansia, 2) . "%"; ?></td>
                <td><?php echo $balita_lk; ?></td>
                <td><?php echo $balita_pr; ?></td>
                <td><?php echo number_format($persentase_balita, 2) . "%"; ?></td>
                <td><?php echo $usia_dini_lk; ?></td>
                <td><?php echo $usia_dini_pr; ?></td>
                <td><?php echo number_format($persentase_usia_dini, 2) . "%"; ?></td>
                <td><?php echo $remaja_lk; ?></td>
                <td><?php echo $remaja_pr; ?></td>
                <td><?php echo number_format($persentase_remaja, 2) . "%"; ?></td>
                <td><?php echo $dewasa_lk; ?></td>
                <td><?php echo $dewasa_pr; ?></td>
                <td><?php echo number_format($persentase_dewasa, 2) . "%"; ?></td>
                <td><?php echo $lansia_lk; ?></td>
                <td><?php echo $lansia_pr; ?></td>
                <td><?php echo number_format($persentase_lansia, 2) . "%"; ?></td>
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

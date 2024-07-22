<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Statistik Pendidikan</title>
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
        <h3>Data Statistik Pendidikan Kelurahan Satu Ulu</h3>
    </center>
    <table>
    <thead>
                                    <tr>
                                        <th rowspan="2" width="1%">No</th>
                                        <th rowspan="2" style="text-align: center;">RW</th>
                                        <th rowspan="2" style="text-align: center;">RT</th>
                                        <th rowspan="2" colspan="2"  style="text-align: center;">Jumlah Warga</th>
                                        <th colspan="3" style="text-align: center;">Belum/Tidak Sekolah</th>
                                        <th colspan="3" style="text-align: center;">SD</th>
                                        <th colspan="3" style="text-align: center;">SMP</th>
                                        <th colspan="3" style="text-align: center;">SMA</th>
                                        <th colspan="3" style="text-align: center;">SMK</th>
                                        <th colspan="3" style="text-align: center;">Perguruan Tinggi</th>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center;">L</th>
                                        <th style="text-align: center;">P</th>
                                        <th style="text-align: center;">%</th>
                                        <th style="text-align: center;">L</th>
                                        <th style="text-align: center;">P</th>
                                        <th style="text-align: center;">%</th>
                                        <th style="text-align: center;">L</th>
                                        <th style="text-align: center;">P</th>
                                        <th style="text-align: center;">%</th>
                                        <th style="text-align: center;">L</th>
                                        <th style="text-align: center;">P</th>
                                        <th style="text-align: center;">%</th>
                                        <th style="text-align: center;">L</th>
                                        <th style="text-align: center;">P</th>
                                        <th style="text-align: center;">%</th>
                                        <th style="text-align: center;">L</th>
                                        <th style="text-align: center;">P</th>
                                        <th style="text-align: center;">%</th>
                                    </tr>
                                </thead>
        <tbody>
            <?php
                $koneksi = mysqli_connect("localhost", "root", "", "satu_ulu");
                $data = mysqli_query($koneksi, "SELECT * FROM pendidikan ORDER BY rw ASC, rt ASC");
                $no = 1;

                if (mysqli_num_rows($data) > 0) {
                    while ($d = mysqli_fetch_array($data)) {
                      $rw = $d['rw'];
                      $rt = $d['rt'];
                      $jumlah_warga = $d['jumlah_warga'];
                      $tdk_sekolah_lk = $d['tdk_sekolah_lk']; // Data laki-laki
                      $tdk_sekolah_pr = $d['tdk_sekolah_pr']; // Data perempuan
                      $sd_lk = $d['sd_lk'];
                      $sd_pr = $d['sd_pr'];
                      $smp_lk = $d['smp_lk'];
                      $smp_pr = $d['smp_pr'];
                      $sma_lk = $d['sma_lk'];
                      $sma_pr = $d['sma_pr'];
                      $smk_lk = $d['smk_lk'];
                      $smk_pr = $d['smk_pr'];
                      $perguruan_tinggi_lk = $d['perguruan_tinggi_lk'];
                      $perguruan_tinggi_pr = $d['perguruan_tinggi_pr'];

                      // Calculate percentages
                      $persentase_tdk_sekolah = ($jumlah_warga > 0) ? (($tdk_sekolah_lk + $tdk_sekolah_pr) / $jumlah_warga) * 100 : 0;
                      $persentase_sd = ($jumlah_warga > 0) ? (($sd_lk + $sd_pr) / $jumlah_warga) * 100 : 0;
                      $persentase_smp = ($jumlah_warga > 0) ? (($smp_lk + $smp_pr) / $jumlah_warga) * 100 : 0;
                      $persentase_sma = ($jumlah_warga > 0) ? (($sma_lk + $sma_pr) / $jumlah_warga) * 100 : 0;
                      $persentase_smk = ($jumlah_warga > 0) ? (($smk_lk + $smk_pr) / $jumlah_warga) * 100 : 0;
                      $persentase_perguruan_tinggi = ($jumlah_warga > 0) ? (($perguruan_tinggi_lk + $perguruan_tinggi_pr) / $jumlah_warga) * 100 : 0;
            ?>
            <tr>
            <td><?php echo $no++; ?></td>
                                            <td><?php echo $rw; ?></td>
                                            <td><?php echo $rt; ?></td>
                                            <td><?php echo $jumlah_warga; ?></td>
                                            <td><?php echo number_format($persentase_tdk_sekolah + $persentase_sd + $persentase_smp + $persentase_sma + $persentase_smk, 2) . "%"; ?></td>
                                            <td><?php echo $tdk_sekolah_lk; ?></td>
                                            <td><?php echo $tdk_sekolah_pr; ?></td>
                                            <td><?php echo number_format($persentase_tdk_sekolah, 2) . "%"; ?></td>
                                            <td><?php echo $sd_lk; ?></td>
                                            <td><?php echo $sd_pr; ?></td>
                                            <td><?php echo number_format($persentase_sd, 2) . "%"; ?></td>
                                            <td><?php echo $smp_lk; ?></td>
                                            <td><?php echo $smp_pr; ?></td>
                                            <td><?php echo number_format($persentase_smp, 2) . "%"; ?></td>
                                            <td><?php echo $sma_lk; ?></td>
                                            <td><?php echo $sma_pr; ?></td>
                                            <td><?php echo number_format($persentase_sma, 2) . "%"; ?></td>
                                            <td><?php echo $smk_lk; ?></td>
                                            <td><?php echo $smk_pr; ?></td>
                                            <td><?php echo number_format($persentase_smk, 2) . "%"; ?></td>
                                            <td><?php echo $perguruan_tinggi_lk; ?></td>
                                            <td><?php echo $perguruan_tinggi_pr; ?></td>
                                            <td><?php echo number_format($persentase_perguruan_tinggi, 2) . "%"; ?></td>
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

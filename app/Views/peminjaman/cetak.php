<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Manajemen</title>
</head>

<body onload="window.print()">
    <h2 style="text-align: center;">Data Peminjaman</h2>
    <!-- <?php
            $pdf = false;
            if (strpos(current_url(), "generate")) {
                $pdf = true;
            }
            if ($pdf == false) {
            ?>
        <a href=" <?php echo site_url('manajemen/generate') ?>">
            Download PDF
        </a>
    <?php } ?> -->
    <center>
        <table border=1 width=80% cellpadding=2 cellspacing=0 style="margin-top: 5px;">
            <thead>
                <tr bgcolor=silver align=center>
                    <td width="5%">No</td>
                    <th class="text-center">Tanggal</th>
                    <th class="text-center">Nama Peminjam</th>
                    <th class="text-center">Jenis Permohonan</th>
                    <th class="text-center">No SHM/SHGB</th>
                    <th class="text-center">Desa</th>
                    <th class="text-center">Kecamatan</th>
                    <th class="text-center">Notaris</th>
                  
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($manajemen as $key => $value) { ?>
                <tr>
                    <td style="text-align: center;"><?= $no++; ?></td>
                    <td><?= $value['tanggal_peminjaman']; ?></td>
                    <td><?= $value['nama_user']; ?></td>
                    <td><?= $value['jenis_permohonan']; ?></td>
                    <td><?= $value['kode_buku']; ?></td>
                    <td><?= $value['nama_desa']; ?></td>
                    <td><?= $value['nama_kecamatan']; ?></td>
                    <td><?= $value['notaris']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </center>
</body>

</html>
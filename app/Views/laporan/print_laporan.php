<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
</head>

<body onload="window.print()">
    <h2 style="text-align: center;">
        <?= $title; ?></h2>
    <center>
        <table border=1 width=80% cellpadding=2 cellspacing=0 style="margin-top: 5px;">
            <thead>
                <tr bgcolor=silver align=center>
                    <td width="5%">No</td>
                    <th class="text-center">Tanggal</th>
                    <th class="text-center">Nama Peminjam</th>
                    <th class="text-center">Jenis Permohonan</th>
                    <th class="text-center">No SHM/SHGB</th>
                    <th class="text-center">Wilayah</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Notaris</th>
                    <th class="text-center">Kembali</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($laporan as $key => $value) { ?>
                <tr>
                    <td style="text-align: center;"><?= $no++; ?></td>
                    <td><?= date('d-m-Y', strtotime($value['tanggal_peminjaman'])); ?></td>
                    <td><?= $value['nama_user']; ?></td>
                    <td><?= $value['jenis_permohonan']; ?></td>
                    <td><?= $value['no_shm_shgb']; ?></td>
                    <td>
                        Kel. <?= $value['nama_desa']; ?>
                        <br>
                        Kec. <?= $value['nama_kecamatan']; ?>
                    </td>
                    <td><?= $value['status']; ?></td>
                    <td><?= $value['notaris']; ?></td>
                    <td><?= date('d-m-Y', strtotime($value['tanggal_pengembalian'])); ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </center>

    <script>
    window.onafterprint = function() {
        window.location = "<?= base_url('Laporan/'); ?>";
    }
    </script>
</body>

</html>
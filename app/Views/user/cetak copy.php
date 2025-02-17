<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
</head>

<body onload="window.print()">
    <h2>Data guru </h2>
    <!-- <?php
            $pdf = false;
            if (strpos(current_url(), "generate")) {
                $pdf = true;
            }
            if ($pdf == false) {
            ?>
        <a href="<?php echo site_url('guru/generate') ?>">
            Download PDF
        </a>
    <?php } ?> -->
    <center>
        <table border=1 width=100% cellpadding=2 cellspacing=0 style="margin-top: 5px;">
            <thead>
                <tr bgcolor=silver align=center>
                    <th width="5%">No</th>
                    <th class="text-center">Foto</th>
                    <th class="text-center">NIP</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Tempat Lahir</th>
                    <th class="text-center">Tanggal Lahir</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">Jenis Kelamin</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($guru as $key => $value) { ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><img src="/img/guru/<?= $value['foto']; ?>" width="50px"></td>
                        <td><?= $value['nip']; ?></td>
                        <td><?= $value['nama']; ?></td>
                        <td><?= $value['tempatlahir']; ?></td>
                        <td><?= $value['tanggallahir']; ?></td>
                        <td><?= $value['alamat']; ?></td>
                        <td><?= $value['jk']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </center>
</body>

</html>
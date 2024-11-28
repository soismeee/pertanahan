<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti Peminjaman Buku Tanah</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            width: 80%;
            margin: auto;
            border: 1px solid #000;
            padding: 20px;
            border-radius: 10px;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #000;
            text-align: left;
        }
        .signature {
            margin-top: 50px;
            text-align: center;
        }
        .signature div {
            display: inline-block;
            width: 30%;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Bukti Peminjaman Buku Tanah</h1>

    <table>
        <tr>
            <th width="40%">Nama Peminjam</th>
            <td width="60%"><?= $manajemen[0]['nama_user']; ?></td>
        </tr>
        <tr>
            <th>Jenis Permohonan</th>
            <td><?= $manajemen[0]['jenis_permohonan']; ?></td>
        </tr>
        <tr>
            <th>Tanggal Peminjaman</th>
            <td><?= date('d-m-Y', strtotime($manajemen[0]['tanggal_peminjaman'])); ?></td>
        </tr>
        <tr>
            <th>Tanggal Pengembalian</th>
            <td><?= $manajemen[0]['tanggal_pengembalian'] == null ? "" : date('d-m-Y', strtotime($manajemen[0]['tanggal_pengembalian'])); ?></td>
        </tr>
        <tr>
            <th>Nomor</th>
            <td><?= $manajemen[0]['kode_buku']; ?></td>
        </tr>
        <tr>
            <th>Notaris</th>
            <td><?= $manajemen[0]['notaris']; ?></td>
        </tr>
    </table>

    <div class="signature">
        <div>
            <p>Peminjam</p>
            <br><br>
            <p><?= $manajemen[0]['nama_user']; ?></p>
        </div>
        <div>
            <p>Petugas</p>
            <br><br>
            <p>&nbsp;</p>
        </div>
    </div>

</div>

</body>
</html>

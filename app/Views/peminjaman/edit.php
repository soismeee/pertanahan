<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>


<!-- general form elements -->
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Ubah Data</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" action="<?= base_url('peminjaman/update/' . $peminjaman[0]['id_peminjaman']) ?>" method="post">
        <div class="box-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Tanggal Peminjaman</label>
                        <input type="date" name="tanggal_peminjaman" class="form-control" value="<?= $peminjaman[0]['tanggal_peminjaman']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Jenis Permohonan</label>
                        <select class="form-control" name="jenis_permohonan">
                            <option disabled selected>-Pilih-</option>
                            <option <?= $peminjaman[0]['jenis_permohonan'] == "BN" ? 'selected' : ''; ?> value="BN">BN</option>
                            <option <?= $peminjaman[0]['jenis_permohonan'] == "MERGER" ? 'selected' : ''; ?> value="MERGER">MERGER</option>
                            <option <?= $peminjaman[0]['jenis_permohonan'] == "JB" ? 'selected' : ''; ?> value="JB">JB</option>
                            <option <?= $peminjaman[0]['jenis_permohonan'] == "WARIS" ? 'selected' : ''; ?> value="WARIS">WARIS</option>
                            <option <?= $peminjaman[0]['jenis_permohonan'] == "PENINGKATAN HAK" ? 'selected' : ''; ?> value="PENINGKATAN HAK">PENINGKATAN HAK</option>
                            <option <?= $peminjaman[0]['jenis_permohonan'] == "ROYA" ? 'selected' : ''; ?> value="ROYA">ROYA</option>
                            <option <?= $peminjaman[0]['jenis_permohonan'] == "ROYA EL" ? 'selected' : ''; ?> value="ROYA EL">ROYA EL</option>
                            <option <?= $peminjaman[0]['jenis_permohonan'] == "BUKTI PENGADILAN/SEKSI PPS" ? 'selected' : ''; ?> value="BUKTI PENGADILAN/SEKSI PPS">BUKTI PENGADILAN/SEKSI PPS</option>
                            <option <?= $peminjaman[0]['jenis_permohonan'] == "HT" ? 'selected' : ''; ?> value="HT">HT</option>
                            <option <?= $peminjaman[0]['jenis_permohonan'] == "PENGECEKAN SERTIFIKAT" ? 'selected' : ''; ?> value="PENGECEKAN SERTIFIKAT">PENGECEKAN SERTIFIKAT</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>No SHM/SHGB</label>
                        <input type="text" name="no_shm_shgb" class="form-control" placeholder="no_shm_shgb" value="<?= $peminjaman[0]['no_shm_shgb']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="buku_tanah_id">Desa</label>
                        <select id="buku_tanah_id" name="buku_tanah_id" class="form-control">
                            <option value="">Select Buku tanah</option>
                            <?php foreach($buku_tanah as $d): ?>
                            <option <?= $peminjaman[0]['buku_tanah_id'] == $d['id_buku_tanah'] ? 'selected' : ''; ?> value="<?= $d['id_buku_tanah'] ?>"><?= $d['kode_buku'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Notaris</label>
                        <input type="text" name="notaris" class="form-control" placeholder="notaris" value="<?= $peminjaman[0]['notaris']; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Ubah</button>

                </div>
            </div>
    </form>
</div>
<!-- /.box -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<?= $this->endSection(); ?>

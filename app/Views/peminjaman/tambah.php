<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>


<!-- general form elements -->
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Tambah Data</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" action="<?= base_url('peminjaman/save') ?>" enctype="multipart/form-data" method="post">
        <div class="box-body">
            <div class="row">
                <div class="col-md-4">

                    <div class="form-group">
                        <label>Jenis Permohonan</label>
                        <select class="form-control" name="jenis_permohonan">
                            <option disabled selected>-Pilih-</option>
                            <option value="BN">BN</option>
                            <option value="MERGER">MERGER</option>
                            <option value="JB">JB</option>
                            <option value="WARIS">WARIS</option>
                            <option value="PENINGKATAN HAK">PENINGKATAN HAK</option>
                            <option value="ROYA">ROYA</option>
                            <option value="ROYA EL">ROYA EL</option>
                            <option value="BUKTI PENGADILAN/SEKSI PPS">BUKTI PENGADILAN/SEKSI PPS</option>
                            <option value="HT">HT</option>
                            <option value="PENGECEKAN SERTIFIKAT">PENGECEKAN SERTIFIKAT</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>No SHM/SHGB</label>
                        <input type="text" name="no_shm_shgb" class="form-control" placeholder="no_shm_shgb" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="buku_tanah_id">Desa</label>
                        <select id="buku_tanah_id" name="buku_tanah_id" class="form-control">
                            <option value="">Select Buku tanah</option>
                            <?php foreach($buku_tanah as $d): ?>
                            <option value="<?= $d['id_buku_tanah'] ?>"><?= $d['kode_buku'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Notaris</label>
                        <input type="text" name="notaris" class="form-control" placeholder="notaris" required autofocus>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>

                </div>
            </div>
    </form>
</div>
<!-- /.box -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<?= $this->endSection(); ?>

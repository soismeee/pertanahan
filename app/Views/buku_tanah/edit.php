<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<!-- general form elements -->
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Eidt Data buku tanah</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    
    <form role="form" action="<?= base_url('bukutanah/update') ?>" enctype="multipart/form-data" method="post">
        <div class="box-body">
            <div class="row">
                <div class="col-md-4">
                    <input type="hidden" name="id_buku_tanah" value="<?= $buku_tanah['id_buku_tanah']; ?>">
                    <div class="form-group">
                        <label>Kode buku</label>
                        <input type="text" name="kode_buku" class="form-control" placeholder="Kode buku" value="<?= $buku_tanah['kode_buku']; ?>" required autofocus>
                    </div>
                    <div class="form-group">
                        <label>Jenis</label>
                        <select class="form-control" name="jenis">
                            <option value="hak milik" <?= $buku_tanah['jenis'] == "hak milik" ? "selected" : "" ?>> Hak Milik </option>
                            <option value="hak guna bangunan" <?= $buku_tanah['jenis'] == "hak guna bangunan" ? "selected" : "" ?>> Hak Guna Bangunan </option>
                            <option value="hak pakai" <?= $buku_tanah['jenis'] == "hak pakai" ? "selected" : "" ?>> Hak Pakai </option>
                            <option value="hak tanggungan" <?= $buku_tanah['jenis'] == "hak tanggungan" ? "selected" : "" ?>> Hak Tanggunan </option>
                            <option value="waris" <?= $buku_tanah['jenis'] == "waris" ? "selected" : "" ?>> Waris </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Luas</label>
                        <input type="text" name="luas" class="form-control" placeholder="luas" value="<?= $buku_tanah['luas']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Pemegang hak</label>
                        <input type="text" name="pemegang_hak" class="form-control" placeholder="Pemegang Hak" value="<?= $buku_tanah['pemegang_hak']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Letak</label>
                        <input type="text" name="letak" class="form-control" placeholder="letak" value="<?= $buku_tanah['letak']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Desa</label>
                        <select class="form-control" name="desa_id">
                            <option disabled selected>-Pilih-</option>
                            <?php foreach ($desa as $data) : ?>
                                <option value="<?= $data['id_desa']; ?>" <?= $data['id_desa'] == $buku_tanah['desa_id'] ? 'selected' : ''; ?>><?= $data['nama_desa']; ?></option>
                                <?php endforeach; ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary btn-sm">Ubah</button>
                    <a href="<?= base_url('user') ?>" class="btn btn-success btn-sm">Kembali</a>
                </div>
            </div>
    </form>
</div>
<!-- /.box -->

<?= $this->endSection(); ?>

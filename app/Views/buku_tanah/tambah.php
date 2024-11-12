<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<!-- general form elements -->
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Tambah Buku tanah</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" action="<?= base_url('bukutanah/save') ?>" enctype="multipart/form-data" method="post">
        <div class="box-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Kode buku</label>
                        <input type="text" name="kode_buku" class="form-control" placeholder="Kode buku" required autofocus>
                    </div>
                    <div class="form-group">
                        <label>Jenis</label>
                        <input type="text" name="jenis" class="form-control" placeholder="jenis" required>
                    </div>
                    <div class="form-group">
                        <label>Luas</label>
                        <input type="text" name="luas" class="form-control" placeholder="luas" required>
                    </div>
                    <div class="form-group">
                        <label>Pemegang hak</label>
                        <input type="text" name="pemegang_hak" class="form-control" placeholder="Pemegang Hak" required>
                    </div>
                    <div class="form-group">
                        <label>Desa</label>
                        <select class="form-control" name="desa_id">
                            <option disabled selected>-Pilih-</option>
                            <?php foreach ($desa as $data) : ?>
                                <option value="<?= $data['id_desa']; ?>"><?= $data['nama_desa']; ?></option>
                                <?php endforeach; ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    <a href="<?= base_url('bukutanah') ?>" class="btn btn-success btn-sm">Kembali</a>
                </div>
            </div>
    </form>
</div>
<!-- /.box -->
<?= $this->endSection(); ?>

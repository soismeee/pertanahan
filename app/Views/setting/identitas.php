<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<h4>Identitas Sekolah</h4>
<div class="col-md">
    <div class="box box-primary">
        <div class="box-header">
            <div class="row">
                <div class="col text-center">
                    <h4>Rincian Identitas Kantor</h4>
                </div>
            </div>

        </div>
        <div class="box-body">
            <?= form_open('setting/saveiden') ?>
            <div class="form-group">
                <label>Nama Kantor</label>
                <input name="nama" value="<?= $setting['nama'] ?>" class="form-control">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input name="email" value="<?= $setting['email'] ?>" class="form-control">
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input name="alamat" value="<?= $setting['alamat'] ?>" class="form-control">
            </div>
            <div class="form-group">
                <label>Telepon</label>
                <input name="telepon" value="<?= $setting['telepon'] ?>" class="form-control">
            </div>
        </div>
        <div class="box-body">
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
            </div>
        </div>
        <?= form_close() ?>
    </div>
</div>

<?= $this->endSection(); ?>
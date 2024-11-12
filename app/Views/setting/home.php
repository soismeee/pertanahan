<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<h4>Pengatura Halaman Home</h4>
<div class="box box-primary">
    <div class="box-header">
        <div class="row">
            <div class="col text-center">
                <h3 class="box-title">Isi Halaman Home</h3>
            </div>
        </div>

    </div>
    <!-- /.box-header -->
    <div class="box-body pad">
        <?= form_open('setting/savehome') ?>
        <div class="form-group">
            <textarea id="editor1" name="home" rows="10" cols="80">
            <?= $setting['home'] ?>
                </textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
        </div>
        <?= form_close() ?>
    </div>
</div>

<?= $this->endSection(); ?>
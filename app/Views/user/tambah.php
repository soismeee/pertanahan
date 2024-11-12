<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<!-- general form elements -->
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Tambah User</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" action="<?= base_url('user/save') ?>" enctype="multipart/form-data" method="post">
        <div class="box-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>nama user</label>
                        <input type="text" name="nama_user" class="form-control" placeholder="nama user" required autofocus>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label>No Hp</label>
                        <input type="text" name="no_hp" class="form-control" placeholder="No Hp" required>
                    </div>
                    <div class="form-group">
                        <label>NIP</label>
                        <input type="text" name="nip" class="form-control" placeholder="NIP">
                    </div>
                    <div class="form-group">
                        <label>Bagian</label>
                        <input type="text" name="bagian" class="form-control" placeholder="bagian">
                    </div>
                    <div class="form-group">
                        <label>Level</label>
                        <select class="form-control" name="level">
                            <option disabled selected>-Pilih-</option>
                            <option value="admin">Admin</option>
                            <option value="karyawan">Karyawan</option>
                            <option value="loket">Loket</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    <a href="<?= base_url('user') ?>" class="btn btn-success btn-sm">Kembali</a>
                </div>
            </div>
    </form>
</div>
<!-- /.box -->
<?= $this->endSection(); ?>

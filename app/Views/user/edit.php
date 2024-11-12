<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<!-- general form elements -->
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Eidt Data User</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" action="<?= base_url('user/update') ?>" enctype="multipart/form-data" method="post">
        <div class="box-body">
            <div class="row">
                <div class="col-md-4">
                    <input type="hidden" name="id_user" value="<?= $user['id_user']; ?>">
                    <div class="form-group">
                        <label>nama user</label>
                        <input type="text" name="nama_user" class="form-control" placeholder="nama user" required value="<?= $user['nama_user']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email" required value="<?= $user['email']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required value="<?= $user['password']; ?>">
                    </div>
                    <div class="form-group">
                        <label>No Hp</label>
                        <input type="text" name="no_hp" class="form-control" placeholder="No Hp" value="<?= $user['no_hp']; ?>">
                    </div>
                    <div class="form-group">
                        <label>NIP</label>
                        <input type="text" name="nip" class="form-control" placeholder="NIP" value="<?= $user['nip']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Bagian</label>
                        <input type="text" name="bagian" class="form-control" placeholder="bagian" value="<?= $user['bagian']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Level</label>
                        <select class="form-control" name="level">
                            <option disabled selected>-Pilih-</option>
                            <option value="admin" <?php if ($user['level'] == "admin") {
                                echo "selected";
                            } ?>>Admin</option>
                            <option value="karyawan" <?php if ($user['level'] == "karyawan") {
                                echo "selected";
                            } ?>>Karyawan</option>
                            <option value="loket" <?php if ($user['level'] == "loket") {
                                echo "selected";
                            } ?>>Loket</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>foto</label>
                        <input type="file" accept="image/*" name="foto_user" class="form-control" placeholder="foto user">
                    </div>

                    <button type="submit" class="btn btn-primary btn-sm">Ubah</button>
                    <a href="<?= base_url('user') ?>" class="btn btn-success btn-sm">Kembali</a>
                </div>
            </div>
    </form>
</div>
<!-- /.box -->

<?= $this->endSection(); ?>

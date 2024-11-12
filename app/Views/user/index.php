<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data User</h3><br>
        <span>
            <a href="<?= base_url('user/tambah') ?>" class="btn btn-success btn-sm" style="margin-top: 10px;"><i
                    class="glyphicon glyphicon-plus"></i>&nbsp;Tambah User</a>
            <a href="<?= base_url('user/cetak') ?>" class="btn btn-success btn-sm" style="margin-top: 10px;"><i
                    class="glyphicon glyphicon-print"></i>&nbsp;Cetak User</a>
        </span>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <?php if (!empty(session()->getFlashdata('success'))) { ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success'); ?>
        </div>
        <?php } ?>
        <div class="table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center" width="5%">No</th>
                    <th class="text-center">Nama user</th>
                    <th class="text-center">NIP</th>
                    <th class="text-center">Bagian</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">No Hp</th>
                    <th class="text-center">Level</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($user as $key => $value) { ?>
                <tr>
                    <td class="text-center"><?= $no++; ?></td>
                    <td><?= $value['nama_user']; ?></td>
                    <td><?= $value['nip']; ?></td>
                    <td><?= $value['bagian']; ?></td>
                    <td><?= $value['email']; ?></td>
                    <td><?= $value['no_hp']; ?></td>
                    <td>
                        <?php if ($value['level'] == "admin") {
                            echo "Admin";
                        } elseif($value['level'] == "loket") {
                            echo "Loket";
                        } else {
                            echo "Karyawan";
                        } ?>
                    </td>
                    <td>
                        <a href="<?= base_url('user/edit/' . $value['id_user']); ?>" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-edit"></i></a>
                        <a href="<?= base_url('user/delete/' . $value['id_user']); ?>" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        </div>

    </div>
    <script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000);
    </script>
    
<?= $this->endSection(); ?>
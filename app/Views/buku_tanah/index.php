<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data Buku tanah</h3><br>
        <span>
            <a href="<?= base_url('bukutanah/tambah') ?>" class="btn btn-success btn-sm" style="margin-top: 10px;"><i class="glyphicon glyphicon-plus"></i>&nbsp;Tambah Buku Tanah</a>
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
                    <th class="text-center">Kode Buku</th>
                    <th class="text-center">Jenis</th>
                    <th class="text-center">Luas</th>
                    <th class="text-center">Pemegang Hak</th>
                    <th class="text-center">Desa</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($bukutanah as $key => $value) { ?>
                <tr>
                    <td class="text-center"><?= $no++; ?></td>
                    <td><?= $value['kode_buku']; ?></td>
                    <td><?= $value['jenis']; ?></td>
                    <td><?= $value['luas']; ?></td>
                    <td><?= $value['pemegang_hak']; ?></td>
                    <td> <?= $value['nama_kecamatan']; ?> - <?= $value['nama_desa']; ?></td>
                    <td>
                        <a href="<?= base_url('bukutanah/edit/' . $value['id_buku_tanah']); ?>" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-edit"></i></a>
                        <a href="<?= base_url('bukutanah/delete/' . $value['id_buku_tanah']); ?>" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></a>
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
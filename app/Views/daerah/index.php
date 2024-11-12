<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<!-- kec -->
<div class="box">
    <div class="box-header">
        <h3 class="box-title mb-2">Data Kecamatan</h3><br>
        <span>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahKec">
                <i class="glyphicon glyphicon-plus"></i> Tambah Kecamatan
            </button>
        </span>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <?php if (!empty(session()->getFlashdata('success'))) { ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success'); ?>
        </div>
        <?php } ?>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center" width="5%">No</th>
                    <th class="text-center">Nama Kecamatan</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($dataKec as $row) : ?>
                <tr>
                    <td class="text-center"><?= $no++; ?></td>
                    <td><?= $row['nama_kecamatan']; ?></td>
                    <td class="text-center">
                        <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#edit<?= $row['id_kecamatan']; ?>">
                            <i class="glyphicon glyphicon-edit"></i> Edit
                        </button>
                        <a href="<?= base_url('Daerah/deleteKec/' . $row['id_kecamatan']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                            <i class="glyphicon glyphicon-trash"></i> Hapus
                        </a>
                    </td>
                </tr>

                <!-- Modal -->
                <div class="modal fade" id="edit<?= $row['id_kecamatan']; ?>" tabindex="-1" aria-labelledby="tambahKecLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="tambahKecLabel">Tambah kel</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?= base_url('Daerah/updateKEc'); ?>" method="post">
                                <div class="modal-body">
                                    <input type="hidden" name="id" value="<?= $row['id_kecamatan']; ?>">
                                    <div class="form-group row">
                                        <label for="nama" class="col-sm-4 col-form-label">Nama Kecamatan</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $row['nama_kecamatan']; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="tambahKec" tabindex="-1" aria-labelledby="tambahKecLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahKecLabel">Tambah Kec</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Daerah/saveKec'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="nama" class="col-sm-4 col-form-label">Nama Kecamatan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end section kec -->

<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000);
</script>

<?= $this->endSection(); ?>
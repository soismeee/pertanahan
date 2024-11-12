<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<!-- kel -->
<div class="box">
    <div class="box-header">
        <h3 class="box-title mb-2">Data Kecamatan</h3><br>
        <span>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahKec">
                <i class="glyphicon glyphicon-plus"></i> Tambah Desa
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
                    <th class="text-center">Nama Kelurahan</th>
                    <th class="text-center">Nama Kec</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($dataDesa as $data) : ?>
                <tr>
                    <td class="text-center"><?= $no++; ?></td>
                    <td><?= $data['nama_desa']; ?></td>
                    <td><?= $data['nama_kecamatan']; ?></td>
                    <td class="text-center">
                        <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#edit<?= $data['id_desa']; ?>">
                            <i class="glyphicon glyphicon-edit"></i> Edit
                        </button>
                        <a href="<?= base_url('Daerah/deleteDesa/' . $data['id_desa']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                            <i class="glyphicon glyphicon-trash"></i> Hapus
                        </a>
                    </td>
                </tr>

                <!-- Modal -->
                <div class="modal fade" id="edit<?= $data['id_desa']; ?>" tabindex="-1" aria-labelledby="tambahKecLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="tambahKecLabel">Edit kel</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?= base_url('Daerah/updateDesa'); ?>" method="post">
                                <div class="modal-body">
                                    <input type="hidden" name="id_desa" value="<?= $data['id_desa']; ?>">
                                    <div class="form-group row">
                                        <label for="nama" class="col-sm-4 col-form-label">Nama Kecamatan</label>
                                        <div class="col-sm-8">
                                            <select name="kecamatan_id" id="kecamatan_id" class="form-control">
                                                <option value="">-- Pilih Kecamatan --</option>
                                                <?php foreach ($dataKec as $editKec) : ?> 
                                                        <option value="<?= $editKec['id_kecamatan']; ?>" <?= $editKec['id_kecamatan'] == $data['kecamatan_id'] ? 'selected' : ''; ?>><?= $editKec['nama_kecamatan']; ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama" class="col-sm-4 col-form-label">Nama Desa</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="nama_desa" name="nama_desa"
                                                value="<?= $data['nama_desa']; ?>" required>
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


<div class="modal fade" id="tambahKec" tabindex="-1" aria-labelledby="tambahKecLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahKecLabel">Tambah Desa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Daerah/saveDesa'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="nama" class="col-sm-4 col-form-label">Nama Kecamatan</label>
                        <div class="col-sm-8">
                            <select name="kecamatan_id" id="kecamatan_id" class="form-control">
                                <option value="">-- Pilih Kecamatan --</option>
                                <?php foreach ($dataKec as $data) : ?>
                                <option value="<?= $data['id_kecamatan']; ?>"><?= $data['nama_kecamatan']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama" class="col-sm-4 col-form-label">Nama Desa</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nama_desa" name="nama_desa" required>
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


<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000);
</script>

<?= $this->endSection(); ?>
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
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Kode buku</label>
                        <input type="text" name="kode_buku" class="form-control" placeholder="Kode buku" required autofocus>
                    </div>
                    <div class="form-group">
                        <label>Jenis (tulis jenis jika tidak ada, pilih lainnya)</label>
                        <select class="form-control" name="jenis" id="jenis">
                            <option disabled selected>-Pilih-</option>
                            <option value="hak milik"> Hak Milik </option>
                            <option value="hak guna bangunan"> Hak Guna Bangunan </option>
                            <option value="hak pakai"> Hak Pakai </option>
                            <option value="hak tanggungan"> Hak Tanggunan </option>
                            <option value="waris"> Waris </option>
                            <option value="lainnya"> Lainnya </option>
                        </select>
                        <input type="text" name="jenis_lain" id="jenis_lain" class="form-control" disabled placeholder="Masukan jenis buku lain">
                    </div>
                    <div class="form-group">
                        <label>Luas</label>
                        <input type="text" name="luas" class="form-control" placeholder="luas">
                    </div>
                    <div class="form-group">
                        <label>Pemegang hak</label>
                        <input type="text" name="pemegang_hak" class="form-control" placeholder="Pemegang Hak">
                    </div>
                    <div class="form-group">
                        <label>Letak</label>
                        <select class="form-control" name="letak">
                            <option disabled selected>-Pilih-</option>
                            <option value="1-A">1-A</option>
                            <option value="1-B">1-B</option>
                            <option value="2-A">2-A</option>
                            <option value="2-B">2-B</option>
                            <option value="3-A">3-A</option>
                            <option value="3-B">3-B</option>
                            <option value="4-A">4-A</option>
                            <option value="4-B">4-B</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Desa</label>
                        <select class="form-control" name="desa_id">
                            <option disabled selected>-Pilih-</option>
                            <?php foreach ($desa as $data) : ?>
                                <option value="<?= $data['id_desa']; ?>"> <?= $data['nama_kecamatan']; ?> - <?= $data['nama_desa']; ?></option>
                                <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" name="file" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    <a href="<?= base_url('bukutanah') ?>" class="btn btn-success btn-sm">Kembali</a>
                </div>
            </div>
    </form>
</div>
<!-- /.box -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script>
        $(document).on('change', '#jenis', function(e){
        e.preventDefault();
        let value_jenis = $(this).val();
        if (value_jenis == "lainnya") {
            $('#jenis_lain').attr('disabled', false);
        } else {
            $('#jenis_lain').attr('disabled', true);
        }
    });
 </script>
<?= $this->endSection(); ?>

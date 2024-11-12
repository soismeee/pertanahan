<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>


<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data Permohonan peminjaman buku tanah</h3><br>
        <div class="row">
            <div class="col-lg-6">
                <select name="status" id="status" class="form-control">
                    <option value="All">Semua</option>
                    <option value="pinjam">Pengajuan</option>
                    <option value="proses">Proses</option>
                    <option value="selesai">Selesai</option>
                </select>
            </div>
        </div>
        <?php if (session()->get('level') == "karyawan") : ?>
            <span>
                <a href="<?= base_url('peminjaman/tambah') ?>" class="btn btn-success btn-sm" style="margin-top: 10px;"><i class="glyphicon glyphicon-plus"></i>&nbsp;Tambah Data</a>
            </span>
        <?php endif; ?>
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
                    <th class="text-center">Tanggal</th>
                    <th class="text-center">Nama Peminjam</th>
                    <th class="text-center">Jenis Permohonan</th>
                    <th class="text-center">No SHM/SHGB</th>
                    <th class="text-center">Wilayah</th>
                    <th class="text-center">Notaris</th>
                    <th class="text-center">Tgl Kembali</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($peminjaman as $key => $value) { ?>
                <tr>
                    <td class="text-center"><?= $no++; ?></td>
                    <td><?= date('d-m-Y', strtotime($value['tanggal_peminjaman'])); ?></td>
                    <td><?= $value['nama_user']; ?></td>
                    <td><?= $value['jenis_permohonan']; ?></td>
                    <td><?= $value['no_shm_shgb']; ?></td>
                    <td>
                        Ds. <?= $value['nama_desa']; ?> <br />
                        Kec. <?= $value['nama_kecamatan']; ?>
                    </td>
                    <td><?= $value['notaris']; ?></td>
                    <td>
                        <?php if($value['status'] == "selesai") : ?>
                            <?= date('d-m-Y', strtotime($value['tanggal_pengembalian'])); ?>
                        <?php elseif($value['status'] == "tolak") : ?>
                            Tidak di pinjam
                        <?php else : ?>
                            Belum kembali
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if($value['status'] == "pinjam") : ?>
                            <span class="text-danger">Pinjam</span>
                        <?php elseif($value['status'] == "proses") : ?>
                            <span class="text-primary">Proses</span>
                        <?php elseif($value['status'] == "tolak") : ?>
                            <span class="text-dark">Tolak</span>
                        <?php else : ?>
                            <span class="text-success">Kembali</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if (session()->get('level') == "admin") : ?>
                            <a href="<?= base_url('peminjaman/edit/' . $value['id_peminjaman']) ?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                            <a href="<?= base_url('peminjaman/delete/' . $value['id_peminjaman']) ?>" class="btn btn-danger btn-xs" id="hapus"><i class="fa fa-trash"></i></a>
                        <?php elseif (session()->get('level') == "karyawan") : ?>
                            <?php if($value['status'] == "selesai") : ?>
                                <a href="<?= base_url('peminjaman/cetakBukti/' . $value['id_peminjaman']) ?>" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-print">Cetak</i></a>
                            <?php else : ?>
                                <a href="#" class="btn btn-primary btn-xs disabled">proses</i></a>
                            <?php endif;?>
                        <?php else : ?>
                            <a href="<?= base_url('peminjaman/proses/' . $value['id_peminjaman']) ?>" class="btn btn-primary btn-xs">proses</i></a>
                        <?php endif; ?>
                    </td>

                </tr>
                <?php } ?>
            </tbody>
        </table>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            loading();

        });

        function loading(){
            $('#data-peminjaman table tbody').append(
                `<tr>
                    <td style="display: none;" colspan="9" class="text-center loading">Loading...</td>
                </tr>
                <tr>
                    <td colspan="9" class="text-center pesan">Tidak ada data</td>
                </tr>`
            )
        }

        $('#tampilkan').on('click', function(e){
            e.preventDefault();
            loaddata();
        });

        function loaddata(){
            $('.loading').show();
            $('.pesan').hide();
            $.ajax({
                url: '<?= base_url('laporan/getLaporan');?>',
                type: 'post',
                data: {tgl_awal: $('#tgl_awal').val(), tgl_akhir: $('#tgl_akhir').val()},
                success: function(data){
                    $('.loading').hide();
                    $('#data-peminjaman table tbody').empty();
                    let peminjaman = data.peminjaman
                    peminjaman.forEach((params, index) => {
                    let body = 
                    `
                    <tr class="text-center">
                        <td>${index+1}</td>
                        <td>${params.tanggal_peminjaman}</td>
                        <td>${params.nama_user}</td>
                        <td>${params.jenis_permohonan}</td>
                        <td>${params.no_shm_shgb}</td>
                        <td>${params.nama_kecamatan} - ${params.nama_desa}</td>
                        <td>${params.status}</td>
                        <td>${params.notaris}</td>
                        <td>${params.tanggal_pengembalian}</td>
                    </tr>
                    `
                    $('#data-peminjaman table tbody').append(body);
                })
                }
            })
        }


        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 3000);
    </script>

<?= $this->endSection(); ?>

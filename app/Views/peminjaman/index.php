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
        <div class="table-responsive" id="data-peminjaman">
        <table class="table table-bordered table-striped">
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
            <tbody></tbody>
        </table>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            loading();
            loaddata();
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

        $('#status').on('click', function(e){
            e.preventDefault();
            loaddata();
        });

        function loaddata(){
            $('.loading').show();
            $('.pesan').hide();
            $.ajax({
                url: '<?= base_url('Peminjaman/getData');?>',
                type: 'post',
                data: {status: $('#status').val()},
                success: function(response){
                    $('.loading').hide();
                    $('#data-peminjaman table tbody').empty();
                    let data = response.data
                    
                    data.forEach((params, index) => {
                        let status = params.status;
                        let levelUser = `<?= session()->get('level'); ?>`;
                        let isiStatus = "Pinjam";
                        let isiTglKembali = "Belum kembali";
                        let isiAction = `<a href="<?= base_url('peminjaman/proses/') ?>${params.id_peminjaman}" class="btn btn-primary btn-xs">proses</i></a>`

                        if (status == "proses") {
                            isiStatus = "Proses"
                        }
                        if (status == "tolak") {
                            isiStatus = "Tolak"
                            isiTglKembali = "Tidak dipinjam"
                        }
                        if (status == "selesai") {
                            isiStatus = "Kembali"
                        }

                        // digunakan untuk menampilkan tanggal kembali
                        if (params.tgl_kembali != null) {
                            isiTglKembali = params.tgl_kembali
                        }
                        
                        
                        if (levelUser == "admin") {
                            isiAction = `
                            <a href="<?= base_url('peminjaman/edit/') ?>${params.id_peminjaman}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                            <a href="<?= base_url('peminjaman/delete/') ?>${params.id_peminjaman}" class="btn btn-danger btn-xs" id="hapus"><i class="fa fa-trash"></i></a>
                            `
                        }   
                        if (levelUser == "karyawan") {
                            if (status == "selesai") {    
                                isiAction = `<a href="<?= base_url('peminjaman/cetakBukti/') ?>${params.id_peminjaman}" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-print">Cetak</i></a>`
                            }else{
                                isiAction = `<a href="#" class="btn btn-primary btn-xs disabled">proses</i></a>`
                            }
                        } 
                    let body = 
                    `
                    <tr class="text-center">
                        <td>${index+1}</td>
                        <td>${params.tanggal_peminjaman}</td>
                        <td>${params.nama_user}</td>
                        <td>${params.jenis_permohonan}</td>
                        <td>${params.no_shm_shgb}</td>
                        <td>${params.nama_desa}</td>
                        <td>${params.notaris}</td>
                        <td>${isiTglKembali}</td>
                        <td>${isiStatus}</td>
                        <td>${isiAction}</td>
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

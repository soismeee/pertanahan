<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<div class="row">
        <div class="col-md-6">
          <!-- DONUT CHART -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Status Peminjaman</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <canvas id="Peminjaman" style="height: 227px; width: 454px;" height="283" width="567"></canvas>
            </div>
            <ul class="doughnut-legend">
                <li><span style="background-color:#00a65a">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> ACC</li>
                <li><span style="background-color:#f56954">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Tolak</li>
            </ul>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <div class="col-md-6">
          <!-- DONUT CHART -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Status Buku tanah</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <canvas id="BukuTanah" style="height: 227px; width: 454px;" height="283" width="567"></canvas>
            </div>
            <ul class="doughnut-legend">
                <li><span style="background-color:#f39c12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Pinjam</li>
                <li><span style="background-color:#3c8dbc">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Kembali</li>
            </ul>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    </div>
    
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Laporan Priode</h3><br>
            <br>
            <form action="<?= base_url('laporan/v_print_laporan') ?>" method="post">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="tgl_awal">Tanggal Awal</label>
                            <input type="date" name="tgl_awal" id="tgl_awal" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="tgl_akhir">Tanggal Akhir</label>
                            <input type="date" name="tgl_akhir" id="tgl_akhir" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">&nbsp;</label>
                            <a href="#" id="tampilkan" class="btn btn-primary form-control">Tampilkan Data</a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">&nbsp;</label>
                            <button type="submit" class="btn btn-success form-control">Print</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box-header -->
        <div class="box-body" id="data-peminjaman">
            <?php if (!empty(session()->getFlashdata('success'))) { ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success'); ?>
            </div>
            <?php } ?>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center" width="5%">No</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Nama Peminjam</th>
                        <th class="text-center">Jenis Permohonan</th>
                        <th class="text-center">No SHM/SHGB</th>
                        <th class="text-center">Wilayah</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Notaris</th>
                        <th class="text-center">Kembali</th>
                    
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

    
      <!-- ChartJS -->
    <script src="<?= base_url(); ?>/template/bower_components//chart.js/Chart.js"></script>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>

        // Fungsi untuk memformat tanggal ke format Indonesia
        function formatTanggal(tanggal) {
            if (!tanggal) return "Belum tersedia"; // Jika tanggal null atau undefined
            let date = new Date(tanggal); // Konversi string tanggal ke objek Date
            let day = String(date.getDate()).padStart(2, '0'); // Hari dengan 2 digit
            let month = String(date.getMonth() + 1).padStart(2, '0'); // Bulan dengan 2 digit
            let year = date.getFullYear(); // Tahun
            return `${day}-${month}-${year}`; // Format dd-mm-yyyy
        }

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
                    let peminjaman = data;
                    peminjaman.forEach((params, index) => {
                        let body = 
                        `
                        <tr class="text-center">
                            <td>${index+1}</td>
                            <td>${formatTanggal(params.tanggal_peminjaman)}</td>
                            <td>${params.nama_user}</td>
                            <td>${params.jenis_permohonan}</td>
                            <td>${params.kode_buku}</td>
                            <td>${params.nama_kecamatan} - ${params.nama_desa}</td>
                            <td>${params.status}</td>
                            <td>${params.notaris}</td>
                            <td>${formatTanggal(params.tanggal_pengembalian)}</td>
                        </tr>
                        `
                        $('#data-peminjaman table tbody').append(body);
                    })
                },
                error: function(error){
                    $('.loading').hide();
                    $('#data-peminjaman table tbody').empty();
                    $('#data-peminjaman table tbody').append(`
                        <tr>
                            <td colspan="9" class="text-center">Data tidak ditemukan</td>
                        </tr>
                    `);

                }
            })
        }

        $(function () {

            var Peminjaman = $('#Peminjaman').get(0).getContext('2d')
            var piePeminjaman       = new Chart(Peminjaman)
            var pieP        = [
            {
                value    : "<?= $statusPinjamAcc; ?>",
                color    : '#f56954',
                highlight: '#f56954',
                label    : 'TOLAK'
            },
            {
                value    : "<?= $statusPinjamTolak; ?>",
                color    : '#00a65a',
                highlight: '#00a65a',
                label    : 'ACC'
            }
            ]
            var piePoption     = {
            segmentShowStroke    : true,
            segmentStrokeColor   : '#fff',
            segmentStrokeWidth   : 2,
            percentageInnerCutout: 50, // This is 0 for Pie charts
            animationSteps       : 100,
            animationEasing      : 'easeOutBounce',
            animateRotate        : true,
            animateScale         : false,
            responsive           : true,
            maintainAspectRatio  : true,
            legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
            }
            piePeminjaman.Doughnut(pieP, piePoption)



            // ########################################################################
            var BukuTanah = $('#BukuTanah').get(0).getContext('2d')
            var pieBukuTanah       = new Chart(BukuTanah)
            var pieBT        = [
                {
                    value    : "<?= $statusBTPinjam; ?>",
                    color    : '#f39c12',
                    highlight: '#f39c12',
                    label    : 'Pinjam'
                },
                {
                    value    : "<?= $statusBTKembali; ?>",
                    color    : '#3c8dbc',
                    highlight: '#3c8dbc',
                    label    : 'Kembali'
                },
            ]
            var pieBToption     = {
            segmentShowStroke    : true,
            segmentStrokeColor   : '#fff',
            segmentStrokeWidth   : 2,
            percentageInnerCutout: 50, // This is 0 for Pie charts
            animationSteps       : 100,
            animationEasing      : 'easeOutBounce',
            animateRotate        : true,
            animateScale         : false,
            responsive           : true,
            maintainAspectRatio  : true,
            legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
            }
            pieBukuTanah.Doughnut(pieBT, pieBToption)
        })
    </script>

<?= $this->endSection(); ?>

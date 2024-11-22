<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>


  <!-- general form elements -->
  <div class="box box-primary">
      <div class="box-header with-border">
          <h3 class="box-title">Proses Data</h3>
      </div>
      <!-- /.box-header -->

      <!-- form start -->
      <form role="form" action="<?= base_url('peminjaman/storeUpdate/' . $data[0]['id_peminjaman']); ?>" method="post">
          <div class="box-body">
            <div class="row">
                <table class="table table-bordered">
                    <tr>
                        <td width="15%">Nama Pemohon</td>
                        <td width="5%">:</td>
                        <td width="80%"><?= $data[0]['nama_user']; ?></td>
                    </tr>
                    <tr>
                        <td width="15%">Jenis Permohonan</td>
                        <td width="5%">:</td>
                        <td width="80%"><?= $data[0]['jenis_permohonan']; ?></td>
                    </tr>
                    <tr>
                        <td width="15%">Nomor</td>
                        <td width="5%">:</td>
                        <td width="80%"><?= $data[0]['kode_buku']; ?></td>
                    </tr>
                    <tr>
                        <td width="15%">Notaris</td>
                        <td width="5%">:</td>
                        <td width="80%"><?= $data[0]['notaris']; ?></td>
                    </tr>
                    <tr>
                        <td width="15%">Tanggal masuk</td>
                        <td width="5%">:</td>
                        <td width="80%"><?= date('d-m-Y', strtotime($data[0]['tanggal_peminjaman'])); ?></td>
                    </tr>
                    <tr>
                        <td width="15%"><strong>Proses</strong></td>
                        <td width="5%">:</td>
                        <td>
                            <?php if (session()->get('level') == 'loket') : ?>
                                <select name="status" id="status" class="form-control">
                                    <option selected disabled>Pilih status</option>
                                    <option value="proses">Proses</option>
                                </select>
                            <?php elseif(session()->get('level') == 'admin') : ?>
                                <select name="status" id="status" class="form-control">
                                    <option selected disabled>Pilih status</option>
                                    <option value="selesai">Selesai</option>
                                    <option value="tolak">Tolak</option>
                                </select>
                            <?php endif; ?>
                            <br />
                            <button class="btn btn-primary">Proses peminjaman</button>
                        </td>
                    </tr>
                    
                </table>
            </div>
          </div>
      </form>
  </div>

<?= $this->endSection(); ?>

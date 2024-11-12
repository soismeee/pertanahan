<footer class="main-footer">
        <div class="pull-centerear hidden-xs">
        </div>
        <strong>Copyright <?= date("Y") ?></a></strong>
    </footer>

    </div>
    <!-- ./wrapper -->

  <!-- jQuery 3 -->
  <script src="<?= base_url() ?>/template/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?= base_url() ?>/template/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- DataTables -->
  <script src="<?= base_url() ?>/template/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>/template/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="<?= base_url() ?>/template/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- CK Editor -->
  <script src="<?= base_url() ?>/template/bower_components/ckeditor/ckeditor.js"></script>
  <!-- FastClick -->
  <script src="<?= base_url() ?>/template/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url() ?>/template/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= base_url() ?>/template/dist/js/demo.js"></script>
  <!-- swithalert2 -->
  <script src="<?= base_url(); ?>/template/plugins/sweetalert2/sweetalert2.all.min.js"></script>
  <!-- date picker -->
  <script src="<?= base_url(); ?>/template/bower_components/select2/dist/js/select2.full.min.js"></script>
  <script src="<?= base_url(); ?>/template/plugins/input-mask/jquery.inputmask.js"></script>
  <script src="<?= base_url(); ?>/template/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
  <script src="<?= base_url(); ?>/template/plugins/input-mask/jquery.inputmask.extensions.js"></script>
  <script src="<?= base_url(); ?>/template/bower_components/moment/min/moment.min.js"></script>
  <script src="<?= base_url(); ?>/template/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="<?= base_url(); ?>/template/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <script src="<?= base_url(); ?>/template/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
  <script src="<?= base_url(); ?>/template/plugins/timepicker/bootstrap-timepicker.min.js"></script>

  <!-- page script -->
  <script>
    $(function() {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1')
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': false
        });
        //date picker
        $('#datepicker').datepicker({
            autoclose: true,
            // date_format: "yy-mm-dd"
        });
        //multi datepicker in 1 file
        $('.datepicker').datepicker({
            autoclose: true,
            // date_format: "yy-mm-dd"
        });
    })
      // swetalert2
      $(document).on('click', '#hapus', function(e) {
          e.preventDefault();
          var link = $(this).attr('href');

          Swal.fire({
              title: 'Apakah anda yakin?',
              text: "Akan menghapus data ini",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Hapus Data!'
          }).then((result) => {
              if (result.isConfirmed) {
                  document.location = link;
              }
          });
      });

      // swetalert success
      <?php if (session()->getFlashdata('pesan')) : ?>
          Swal.fire({
              position: 'center',
              icon: 'success',
              title: 'SUCCESS',
              text: "<?= session()->getFlashdata('pesan'); ?>",
              showConfirmButton: false,
              timer: 1500
          })
      <?php endif; ?>

      // sweetalert warning
      <?php if (session()->getFlashdata('warning')) : ?>
          swal.fire({
              position: 'center',
              icon: 'warning',
              title: 'Warning',
              text: '<?= session()->getFlashdata('warning'); ?>',
              showConfirmButton: true
          })
      <?php endif; ?>
      
  </script>
  </body>

  </html>
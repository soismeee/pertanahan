<?php echo view('layout/header'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <?= $this->renderSection('content'); ?>
                      
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

<?php echo view('layout/footer'); ?>
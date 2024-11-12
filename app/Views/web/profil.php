<?= $this->extend('web/layout/template') ?>
<?= $this->section('content') ?>
<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>

        </h1>
    </section>
    <br>
    

    <section class="content">
        <div class="container">
            <div class="box box-primary">
                <div class="box-body text-center">
                    <strong>Struktur organisasi</strong>
                    <br />
                    <br />
                    <img src="<?= base_url('template/struktur.png'); ?>" alt="">
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.container -->

<?= $this->endsection(); ?>
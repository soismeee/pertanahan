<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
    <h2 class="text-center">Selamat Datang di halaman
        <br>
        <?php if (session()->get('level') == "admin") { ?>
            <h2 class="text-center">Admin</h2>
        <?php } elseif ((session()->get('level') == "karyawan")) { ?>
            <h2 class="text-center">Karyawan</h2>
        <?php } else { ?>
            <h2 class="text-center">Loket</h2>
        <?php } ?>
    </h2>
<?= $this->endSection(); ?>
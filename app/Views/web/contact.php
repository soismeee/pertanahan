<?= $this->extend('web/layout/template') ?>
<?= $this->section('content') ?>

<!-- Tambahkan link Font Awesome di bagian head jika belum ada -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<div class="container">
      <section class="content">
        <div class="container">
            <div class="box box-primary">
                <div class="box-body text-center">
                    <strong>Contact</strong>
                    <br><br>
                    <!-- Social Media Links -->
                    <div class="social-media">
                        <a href="https://www.instagram.com/kantahkabbatang/" target="_blank" class="social-icon instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://www.facebook.com/KantahKabBatang/?locale=id_ID" target="_blank" class="social-icon facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://x.com/kantahkabbatang" target="_blank" class="social-icon x-icon">
                            <!-- Custom SVG Logo X -->
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="white" xmlns="http://www.w3.org/2000/svg">
                                <path d="M23.6 0H17.8L12 9.2L6.3 0H0.4L9.8 14.4L0 24H5.9L12 15.2L18.1 24H24L14.3 14.4L23.6 0Z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.container -->

<style>
    .social-media {
        margin-top: 20px;
        display: flex;
        justify-content: center;
        gap: 15px;
    }

    .social-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        color: white;
        font-size: 24px;
        text-decoration: none;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .instagram {
        background: linear-gradient(45deg, #ff007f, #ffaf00);
    }
    
    .facebook {
        background-color: #3b5998;
    }
    
    .x-icon {
        background-color: black; /* Warna latar belakang baru sesuai branding X */
    }

    .social-icon:hover {
        transform: scale(1.1);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }
</style>

<?= $this->endsection(); ?>

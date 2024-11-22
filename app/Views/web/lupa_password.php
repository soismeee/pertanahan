<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/iCheck/square/blue.css">

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            Masukan email anda
        </div>

        <div class="register-box-body">
            <form action="<?= base_url('Web/changePassword'); ?>" method="post">
                <div id="message"></div>
                <input type="hidden" name="id" id="id">
                <div class="form-group has-feedback">
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email" autofocus>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="Nomor HP">
                    <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                </div>
                <div style="display: none;" id="ppp" class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <a href="#" id="cari" class="btn btn-primary btn-block btn-xl">Cari akun</a>
                <button style="display: none;" type="submit" id="submit" class="btn btn-success btn-block btn-xl">Ganti password</button>
            </form>   
        </div>
        <!-- /.form-box -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery 3 -->
    <script src="<?= base_url() ?>/template/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?= base_url() ?>/template/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?= base_url() ?>/template/plugins/iCheck/icheck.min.js"></script>
    <script>

    function password(){
        $('#ppp').show();
        $('#submit').show();
        $('#cari').hide();
        $('#email').prop('readonly', true);
    }

    $(document).on('click', '#cari', function(e){
        e.preventDefault();
        $.ajax({
            url: "<?= site_url('Web/cariakun')?>",
            type: 'POST',
            data: {email: $('input[name=email]').val(), no_hp: $('input[name=no_hp]').val()},
            success: function(response){
                if(response.status == 200){
                    $('#id').val(response.id);
                    password();
                }else{
                    $('#ppp').hide();
                    $('#submit').hide();
                    $('#message').html(`
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-ban"></i> Akun yang anda masukkan belum terdaftar!</h4>
                        </div>
                    `);
                }
            }
        })
    })
    
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000);
    </script>
</body>

</html>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url() ?>template/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>template/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url() ?>template/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url() ?>template/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>template/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= base_url() ?>template/dist/css/skins/_all-skins.min.css">

  <!-- sweet alert2 -->
  <link rel="stylesheet" href="<?= base_url() ?>template/plugins/sweetalert2/sweetalert2.min.css">

  <!-- date picker -->
  <link rel="stylesheet" href="<?= base_url() ?>template/bower_components/bootstrap-daterangepicker/daterangepicker.css">

  <link rel="stylesheet" href="<?= base_url() ?>template/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

  <link rel="stylesheet" href="<?= base_url() ?>template/plugins/iCheck/all.css">

  <link rel="stylesheet" href="<?= base_url() ?>template/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">

  <link rel="stylesheet" href="<?= base_url() ?>template/plugins/timepicker/bootstrap-timepicker.min.css">

  <link rel="stylesheet" href="<?= base_url() ?>template/bower_components/select2/dist/css/select2.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="#" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">BPN</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>BPN</b> Batang</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown notifications-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              </a>
              <ul class="dropdown-menu">
                <li class="header">Pesan peminjaman</li>
                <li>
                <ul class="menu">
                <li>
                  <a href="#">
                  <i class="fa fa-users text-aqua"></i> peminjaman dari seseorang
                  </a>
                </li>
                </ul>
                </li>
                <li class="footer"><a href="/manajemen">Lihat semua</a></li>
              </ul>
            </li>

            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?= base_url('foto/') . session()->get('foto_user') ?>" class="user-image" alt="User Image">
                <span class="hidden-xs"><?= session()->get('nama_user') ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="<?= base_url('foto/') . session()->get('foto_user') ?>" class="img-circle" alt="User Image">

                  <p>
                    <?= session()->get('nama_user') ?> - <?= session()->get('email') ?>
                    <small>
                      <?php if (session()->get('level') == "admin") {
                        echo 'Admin';
                      } elseif ((session()->get('level') == "karyawan")) {
                        echo "Karyawan";
                      } else {
                        echo 'Loket';
                      }
                      ?>
                    </small>
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?= base_url('auth/logout'); ?>" class="btn btn-default btn-flat">Logout</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?= base_url('foto/') . session()->get('foto_user') ?>" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?= session()->get('nama_user') ?></p>
                    <a href="#"><i class="fa fa-circle text-success">
                    </i>
                        <?php if (session()->get('level') == "admin") {
                            echo 'Admin';
                        } elseif ((session()->get('level') == "karyawan")) {
                            echo "Karyawan";
                        } else {
                            echo 'Loket';
                            }
                        ?>
                    </a>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">

                <li>
                    <a href="<?= base_url('home') ?>">
                    <i class="fa fa-th"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li class="header">Menu</li>

                <?php if (session()->get('level') == "admin") { ?>
                    <li>
                        <a href="<?= base_url('bukutanah') ?>">
                            <i class="fa fa-child"></i> <span>Daftar buku tanah</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('peminjaman') ?>">
                            <i class="fa fa-child"></i> <span>MANAJEMEN BUKU TANAH</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('user') ?>">
                            <i class="fa fa-user"></i> <span>Pengaturan Pengguna</span>
                        </a>
                    </li>

                    <li class="treeview" style="height: auto;">
                        <a href="#">
                            <i class="fa fa-map"></i> <span>Master daerah</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu" style="display: none;">
                            <li><a href="<?= base_url('Daerah') ?>"><i class="fa fa-circle-o"></i>Kecamatan</a></li>
                            <li><a href="<?= base_url('Daerah/desa') ?>"><i class="fa fa-circle-o"></i>Desa</a></li>
                        </ul>
                    </li>
                    <li class="treeview" style="height: auto;">
                        <a href="#">
                            <i class="fa fa-group"></i> <span>Laporan</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu" style="display: none;">
                            <li><a href="<?= base_url('Laporan'); ?>"><i class="fa fa-book"></i> Laporan Periode</a></li>

                        </ul>
                    </li>
                    <!-- <li class="treeview" style="height: auto;">
                        <a href="#">
                            <i class="fa fa-gear"></i> <span>Setting</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu" style="display: none;">
                            <li><a href="<?= base_url('setting/identitas') ?>"><i class="fa fa-circle-o"></i>Identitas
                                    Kantor</a></li>
                            <li><a href="<?= base_url('setting/home') ?>"><i class="fa fa-circle-o"></i>Halaman Home</a></li>
                        </ul>
                    </li> -->
                <?php } ?>

                <?php if (session()->get('level') == "karyawan") { ?>
                    <li>
                        <a href="<?= base_url('peminjaman') ?>">
                            <i class="fa fa-street-view"></i> <span>Daftar Peminjaman</span>
                        </a>
                    </li>
                <?php } ?>

                <?php if (session()->get('level') == "loket") { ?>
                    <li>
                        <a href="<?= base_url('peminjaman') ?>">
                            <i class="fa fa-street-view"></i> <span>Daftar Peminjaman</span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
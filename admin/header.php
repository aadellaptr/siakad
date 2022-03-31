<?php
  session_start();
  require "../../log/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $page; ?></title>

  <!-- Favicon -->
  <link rel="icon" href="../../dist/img/icon.png">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../../plugins/sweetalert2/sweetalert2.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">

  <style>
    .form-group .control-label:after{
      content: "*";
      color: red;
    }
  </style>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../dashboard/index.php" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <div class="user-panel mt-1 pb-1 d-flex">
          <?php 
            if(isset($_SESSION['user']['foto']) && $_SESSION['user']['foto']!=''){
              $foto ='../akun/uploads/'.$_SESSION['user']['foto'];
            }else{
              $foto ='../dist/img/avatar5.png';
            }
          ?>
          <div class="image">
          <img src="<?= $foto ?>" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="../akun/data.php?id=<?php echo $_SESSION['user']['id_user']?>" class="d-block">Hai, <?php echo $_SESSION["user"]["nama"]?></a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a href="../../log/logout.php" class="nav-link text-danger">
          <i class="nav-icon fas fa-sign-out-alt"></i>
          Sign Out
        </a>
      </li>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../dashboard/index.php" class="brand-link">
      <img src="../../dist/img/icon.png" alt="pkbm" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-normal">PKBM Sanggar Puri</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a <?php if ($page=="PKBM Sanggar Puri | Dashboard") echo "class='nav-link active'";?> href="../dashboard/index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <?php
            if ($_SESSION['user']['level']=="admin"){
          ?>
          <li class="nav-header">Staff</li>
          <li class="nav-item" <?php if ($page=="PKBM Sanggar Puri | Tendik") echo "class='nav-item menu-open'";?>>
            <a <?php if ($page=="PKBM Sanggar Puri | Tendik") echo "class='nav-link active'";?> href="../tendik/data.php" class="nav-link" >
              <i class="nav-icon fas fa-chalkboard-teacher"></i>
              <p>
                Tenaga Pendidikan
              </p>
            </a>
          </li>
          <?php } ?>
          <li class="nav-header">Pendaftar Siswa Baru</li>
          <li class="nav-item" <?php if ($page=="PKBM Sanggar Puri | Pendaftar Siswa Baru") echo "class='nav-item menu-open'";?>>
            <a <?php if ($page=="PKBM Sanggar Puri | Pendaftar Siswa Baru") echo "class='nav-link active'";?> href="../pendaftaran/data.php" class="nav-link" >
              <i class="nav-icon fas fa-school"></i>
              <p>
                Data Siswa Baru
              </p>
            </a>
          </li>
          <li class="nav-header">Siswa</li>
          <li class="nav-item" <?php if ($page=="PKBM Sanggar Puri | Paket A") echo "class='nav-item menu-open'";?>>
            <a <?php if ($page=="PKBM Sanggar Puri | Paket A") echo "class='nav-link active'";?> href="../paket-a/data.php" class="nav-link">
              <i class="nav-icon fas fa-user-graduate"></i>
              <p>
                Paket A
              </p>
            </a>
          </li>
          <li class="nav-item" <?php if ($page=="PKBM Sanggar Puri | Paket B") echo "class='nav-item menu-open'";?>>
            <a <?php if ($page=="PKBM Sanggar Puri | Paket B") echo "class='nav-link active'";?> href="../paket-b/data.php" class="nav-link" >
              <i class="nav-icon fas fa-user-graduate"></i>
              <p>
                Paket B
              </p>
            </a>
          </li>
          <li class="nav-item" <?php if ($page=="PKBM Sanggar Puri | Paket C (IPA)") echo "class='nav-item menu-open'";?>>
            <a <?php if ($page=="PKBM Sanggar Puri | Paket C (IPA)") echo "class='nav-link active'";?> href="../paket-c-ipa/data.php" class="nav-link" >
              <i class="nav-icon fas fa-user-graduate"></i>
              <p>
                Paket C (IPA)
              </p>
            </a>
          </li>
          <li class="nav-item" <?php if ($page=="PKBM Sanggar Puri | Paket C (IPS)") echo "class='nav-item menu-open'";?>>
            <a <?php if ($page=="PKBM Sanggar Puri | Paket C (IPS)") echo "class='nav-link active'";?> href="../paket-c-ips/data.php" class="nav-link">
              <i class="nav-icon fas fa-user-graduate"></i>
              <p>
                Paket C (IPS)
              </p>
            </a>
          </li>
          <li class="nav-header">E-Learning</li>
          <li class="nav-item" <?php if ($page=="PKBM Sanggar Puri | Modul") echo "class='nav-item menu-open'";?>>
            <a <?php if ($page=="PKBM Sanggar Puri | Modul") echo "class='nav-link active'";?> href="../modul/data.php" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Modul
              </p>
            </a>
          </li>
          <li class="nav-header">Blog</li>
          <li class="nav-item" <?php if ($page=="PKBM Sanggar Puri | Informasi") echo "class='nav-item menu-open'";?>>
            <a <?php if ($page=="PKBM Sanggar Puri | Informasi") echo "class='nav-link active'";?> href="../informasi/data.php" class="nav-link">
              <i class="nav-icon fas fa-info"></i>
              <p>
                Informasi
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
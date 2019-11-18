<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?= $title ?></title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom Library Sendiri -->
  <link href="<?= base_url('assets/custom/sweetalert/sweetalert2.min.css') ?>" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/custom/lightbox2-11/css/lightbox.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/scss_css/custom.css') ?>" rel="stylesheet">
  <script>
    const BASE_URL = '<?= base_url() ?>';
  </script>
</head>

<body id="page-top">
  <div class="alert_success" id="success" data-success="<?= $this->session->flashdata('success'); ?>" data-failed="<?= $this->session->flashdata('failed'); ?>"></div>

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('admin/dashboard') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Data Master
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <!-- Data Master -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Master</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Data Master:</h6>
            <a class="collapse-item" href="<?= base_url('admin/menu') ?>">Menu</a>
              <a class="collapse-item" href="<?= base_url('admin/supplier') ?>">Supplier</a>
            <a class="collapse-item" href="<?= base_url('admin/produk') ?>">Produk</a>
            <a class="collapse-item" href="<?= base_url('admin/customer') ?>">Customer</a>
          </div>
        </div>
      </li>
      <!-- Transaksi -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTransaksi" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Transaksi</span>
        </a>
        <div id="collapseTransaksi" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Data Transaksi:</h6>
            <a class="collapse-item" href="<?= base_url('admin/transaksi') ?>">List Transaksi</a>
          </div>
        </div>
      </li>
      <!-- profil -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTransaksi" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Profil</span>
        </a>
        <div id="collapseTransaksi" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">profil:</h6>
            <a class="collapse-item" href="<?= base_url('admin/profil') ?>">Profil Perusahaan</a>
            <a class="collapse-item" href="<?= base_url('admin/profil_supplier') ?>">Profil Admin</a>
            <a class="collapse-item" href="<?= base_url('admin/profil_admin') ?>">Profil Supplier</a>
          </div>
        </div>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Load Navbar View -->
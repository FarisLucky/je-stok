<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>J-Stok || App</title>

  <!-- Font Awesome -->

  <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url('front/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Overlock&display=swap" rel="stylesheet">
  <link href="<?php echo base_url('front/css/main.css') ?>" rel="stylesheet">


  <script type="text/javascript">
  const BASE_URL = '<?= base_url() ?>';
  </script>
</head>

<body id="page-top">
  <div id="flash_data" data-success="<?= $this->session->flashdata('success') ?>"
    data-failed="<?= $this->session->flashdata('failed') ?>"></div>
  <nav class="navbar-2">
    <div class="container-lg">
      <div class="navbar-2-custom">
        <a href="<?= base_url('keranjang') ?>" class="back">
          <img src="<?= base_url('front/img/back.svg') ?>" class="icon">
        </a>
        <ul class="nav-custom">
          <li class="active">
            <a href="" class="link">
              <img src="<?= base_url('front/img/sale.svg') ?>" class="icon">
            </a>
          </li>
          <li>
            <a href="link">
              <img src="<?= base_url('front/img/wallet.svg') ?>" class="icon">
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="toast toast-custom d-none" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false">
    <div class="toast-header">
      <span class="rounded mr-2 bg-primary"></span>
      <strong class="mr-auto">Info Penting !!</strong>
      <small>hide 3 detik</small>
      <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="toast-body">
      Hello, world! This is a toast message.
    </div>
  </div>
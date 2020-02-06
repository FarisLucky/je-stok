<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Login</title>
  <!-- Mobile Specific Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <!-- Font-->
  <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/assetslogin1/css/opensans-font.css">
  <link rel="stylesheet" type="text/css"
    href="<?= base_url(); ?>/assetslogin1/fonts/line-awesome/css/line-awesome.min.css">
  <!-- Jquery -->
  <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
  <!-- Main Style Css -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assetslogin1/css/style.css" />
  <link href="<?= base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">
</head>

<body class="form-v4">
  <div id="flash_data" data-success="<?= $this->session->flashdata('success') ?>"
    data-failed="<?= $this->session->flashdata('failed') ?>"></div>
  <div class="toast toast-custom d-none" style="position: absolute;right: 3rem;top: 1rem;" role="alert"
    aria-live="assertive" aria-atomic="true" data-autohide="true" data-delay="3000">
    <div class="toast-header text-white" style="background: #3786bd">
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
  <div class="page-content">
    <div class="form-v4-content">
      <div class="form-left">
        <h1>Jember Stok</h1>
        <p class="text-1">Silahkan Daftar/Login Terlebih Dahulu Untuk Mendapatkan Harga Terbaik</p>
        <div class="form-left-last">
          <center>
            <a href="<?= base_url("auth/register"); ?>"><input type="submit" name="account" class="account"
                value="REGISTER"></a>
          </center>
        </div>
      </div>
      <form class="form-detail" id="myform" action="<?= base_url('auth'); ?>" method="post">
        <center>
          <h2>FORM LOGIN</h2>
          <?php
                    echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
          <?= $this->session->flashdata('message'); ?>
        </center>

        <div class="form-row">
          <label for="username">Username</label>
          <input required name="username" type="text" id="username" class="input-text">
        </div>
        <div class="form-row">
          <label for="password">Password</label>
          <input required type="password" name="password" id="password" class="input-text">
        </div>
        <div class="form-row">
          <a href="<?= base_url('auth/lupapassword'); ?>"><small id="passwordHelpInline" class="text-muted">
              Lupa Password ?
            </small></a>
        </div>
        <div class="form-row">
          <button type="submit" class="btn btn-warning btn-md btn-block">Login</button>
        </div>
      </form>
    </div>
  </div>
  <!-- <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script> -->
  <script src="<?php echo base_url('front/vendor/jquery/jquery.min.js') ?>"></script>
  <script src="<?php echo base_url('front/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js" defer></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js" defer></script>
  <script>
  var flash_component = document.getElementById('flash_data');
  var toast_text = document.querySelector('.toast-body');
  var toast = document.querySelector('.toast');
  var flash_success = flash_component.dataset.success;
  var flash_failed = flash_component.dataset.failed;
  flash_success && showToast(flash_success);
  flash_failed && showToast(flash_failed);
  console.log(flash_failed);

  function showToast(body_toast) {
    toast_text.innerHTML = body_toast;
    toast.classList.remove("d-none");
    $('.toast').toast('show');
  }
  </script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
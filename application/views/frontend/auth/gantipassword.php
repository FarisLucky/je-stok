<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Ganti Password</title>
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Font-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/assetslogin1/css/opensans-font.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/assetslogin1/fonts/line-awesome/css/line-awesome.min.css">
    <!-- Jquery -->
    <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
    <!-- Main Style Css -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assetslogin1/css/style.css" />
    <link href="<?= base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">
</head>

<body class="form-v4">
    <div class="page-content">
        <div class="form-v4-content">
            <div class="form-left">
                <h1>Jember Stok</h1>
                <p class="text-1">Silahkan Daftar/Login Terlebih Dahulu Untuk Mendapatkan Harga Terbaik</p>
                <div class="form-left-last">
                    <center>
                        <a href="<?= base_url("auth"); ?>"><input type="submit" name="account" class="account" value="LOGIN"></a>
                    </center>
                </div>
            </div>
            <form class="form-detail" id="myform" action="<?= base_url('auth/gantipassword'); ?>" method="post">
                <center>
                    <h2 class="mb-2">Ganti Password ?</h2>
                    <h6 class="mb-3"><?= $this->session->userdata('reset_email'); ?></h6>
                    <?php
                    echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                    <?= $this->session->flashdata('message'); ?>
                </center>
                <div class="form-group">
                    <div class="form-row form-row-1 ">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="input-text" required>

                    </div>
                    <div class="form-row form-row-1">
                        <label for="password2">Konfirmasi Password</label>
                        <input type="password" name="password2" id="password2" class="input-text" required>

                    </div>
                </div>
                <div class="form-row">
                    <button type="submit" class="btn btn-warning btn-md btn-block">Ganti Password</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
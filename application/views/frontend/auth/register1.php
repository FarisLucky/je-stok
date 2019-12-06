<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Form-v4 by Colorlib</title>
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
            <form class="form-detail" action="<?= base_url('auth/register'); ?>" method="post" id="myform">
                <center>
                    <h2>FORM REGISTER</h2>
                    <?= $this->session->flashdata('message'); ?>
                </center>
                <div class="form-group">
                    <div class="form-row form-row-1">
                        <label for="name">Nama</label>
                        <input type="text" name="name" id="name" class="input-text" required>
                        <?= form_error('name', '<small class = "text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-row form-row-1">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="input-text" required>
                        <?= form_error('username', '<small class = "text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-row">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="input-text" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
                    <?= form_error('email', '<small class = "text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-row">
                    <label for="contact">No HP</label>
                    <input type="text" name="contact" id="contact" class="input-text" required>
                    <?= form_error('contact', '<small class = "text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <div class="form-row form-row-1 ">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="input-text" required>
                        <?= form_error('password', '<small class = "text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-row form-row-1">
                        <label for="password2">Konfirmasi Password</label>
                        <input type="password" name="password2" id="password2" class="input-text" required>
                        <?= form_error('password2', '<small class = "text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-row-last">
                    <input type="submit" name="register" class="register" value="Register">
                </div>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <!-- <script>
        // just for the demos, avoids form submit
        jQuery.validator.setDefaults({
            debug: true,
            success: function(label) {
                label.attr('id', 'valid');
            },
        });
        $("#myform").validate({
            rules: {
                password: "required",
                password2: {
                    equalTo: "#password"
                }
            },
            messages: {
                name: {
                    required: "Please enter a firstname"
                },
                username: {
                    required: "Please enter a lastname"
                },
                email: {
                    required: "Please provide an email"
                },
                password: {
                    required: "Please enter a password"
                },
                comfirm_password: {
                    required: "Please enter a password",
                    equalTo: "Wrong Password"
                }
            }
        });
    </script> -->
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
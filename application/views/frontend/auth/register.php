<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/assetslogin/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/assetslogin/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/assetslogin/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/assetslogin/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/assetslogin/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/assetslogin/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/assetslogin/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/assetslogin/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/assetslogin/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/assetslogin/css/main.css">
    <!--===============================================================================================-->
</head>

<body style="background-color: #666666;">

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" action="<?= base_url('auth/register'); ?>" method="post">
                    <span class="login100-form-title p-b-43">
                        Registrasi
                    </span>
                    <?= $this->session->flashdata('message'); ?>
                    <div class="form-group">
                        <label for="inputPassword6">Password</label>
                        <input class="form-control" type="text" placeholder="Default input">
                    </div>
                    <div class="form-group">
                        <label for="inputPassword6">Password</label>
                        <input class="form-control" type="text" placeholder="Default input">
                    </div>
                    <div class="form-group">
                        <label for="inputPassword6">Password</label>
                        <input class="form-control" type="text" placeholder="Default input">
                    </div>
                    <div class="form-group">
                        <label for="inputPassword6">Password</label>
                        <input class="form-control" type="text" placeholder="Default input">
                    </div>
                    <div class="form-group">
                        <label for="inputPassword6">Password</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
                        <small id="passwordHelpInline" class="text-muted">
                            Must be 8-20 characters long.
                        </small>
                    </div>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Register
                        </button>
                    </div>
                </form>
                <div class="login100-more" style="background-image: url('<?= base_url(); ?>/assetslogin/images/bg-01.jpg');">
                </div>
            </div>
        </div>
    </div>





    <!--===============================================================================================-->
    <script src="<?= base_url(); ?>/assetslogin/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url(); ?>/assetslogin/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url(); ?>/assetslogin/vendor/bootstrap/js/popper.js"></script>
    <script src="<?= base_url(); ?>/assetslogin/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url(); ?>/assetslogin/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url(); ?>/assetslogin/vendor/daterangepicker/moment.min.js"></script>
    <script src="<?= base_url(); ?>/assetslogin/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url(); ?>/assetslogin/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url(); ?>/assetslogin/js/main.js"></script>

</body>

</html>
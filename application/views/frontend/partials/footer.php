<!-- Footer -->
<footer class="" id="footer">
    <div class="space"></div>
    <div class="container">
        <div class="row p-3">
            <div class="col-sm-3">
                <h4 class="ttl_foot">Informasi Sistem</h4>
                <ul class="footer-list">
                    <li>
                        <span>Tentang Kami</span>
                    </li>
                    <li>
                        <span>Syarat & Ketentuan</span>
                    </li>
                    <li>
                        <span>Pembayaran</span>
                    </li>
                    <li>
                        <span>Pengiriman</span>
                    </li>
                    <li>
                        <span>Kebijakan Privasi</span>
                    </li>
                    <li>
                        <span>Karir</span>
                    </li>
                </ul>
            </div>
            <div class="col-sm-3">
                <h4 class="ttl_foot">Layanan Kami</h4>
                <ul class="footer-list">
                    <li>
                        <span>Hubungi Kami</span>
                    </li>
                    <li>
                        <span>Return Policy</span>
                    </li>
                    <li>
                        <span>Syarat Layanan</span>
                    </li>
                    <li>
                        <span>Produk Ori</span>
                    </li>
                </ul>
            </div>
            <div class="col-sm-3">
                <h4 class="ttl_foot">Kontak Kami</h4>
                <ul class="footer-list">
                    <li>
                        <span>Live Chat</span>
                    </li>
                    <li>
                        <span>Jalan Subandi No.5 , Mangli, Jember, Jawa Timur</span>
                    </li>
                    <li>
                        <span>Pembayaran</span>
                    </li>
                    <li>
                        <span>Pengiriman</span>
                    </li>
                    <li>
                        <span>Kebijakan Privasi</span>
                    </li>
                    <li>
                        <span>Karir</span>
                    </li>
                </ul>
            </div>
            <div class="col-sm-3">
                <h4 class="ttl_foot">Ikuti Kami</h4>
                <ul class="footer-list hz">
                    <li>
                        <img src="<?php echo base_url('front/img/facebook.svg') ?>" width="25px">
                    </li>
                    <li>
                        <img src="<?php echo base_url('front/img/facebook.svg') ?>" width="25px">
                    </li>
                    <li>
                        <img src="<?php echo base_url('front/img/facebook.svg') ?>" width="25px">
                    </li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="row p-3">
            <div class="col-sm-4">
                <h4 class="ttl_foot">Credit Card</h4>
                <div class="flex flex-row align-items-center">
                    <div class="box-card">
                        <img src="<?php echo base_url('front/img/facebook.svg') ?>" width="30px">
                    </div>
                    <div class="box-card">
                        <img src="<?php echo base_url('front/img/facebook.svg') ?>" width="30px">
                    </div>
                    <div class="box-card">
                        <img src="<?php echo base_url('front/img/facebook.svg') ?>" width="30px">
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <h4 class="ttl_foot">Transfer Bank</h4>
                <div class="flex flex-row align-items-center">
                    <div class="box-card">
                        <img src="<?php echo base_url('front/img/bni.svg') ?>" width="30px">
                    </div>
                    <div class="box-card">
                        <img src="<?php echo base_url('front/img/bni.svg') ?>" width="30px">
                    </div>
                    <div class="box-card">
                        <img src="<?php echo base_url('front/img/bni.svg') ?>" width="30px">
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <h4 class="ttl_foot">Pengiriman</h4>
                <div class="flex flex-row align-items-center">
                    <div class="box-card">
                        <img src="<?php echo base_url('front/img/jne.png') ?>" width="30px">
                    </div>
                    <div class="box-card">
                        <img src="<?php echo base_url('front/img/jne.png') ?>" width="30px">
                    </div>
                    <div class="box-card">
                        <img src="<?php echo base_url('front/img/jne.png') ?>" width="30px">
                    </div>
                </div>
            </div>
        </div>
        <p class="m-0 text-center pt-5 cs-copyright">Copyright &copy; IT Je-stok 2019</p>
    </div>
    <!-- /.container -->
</footer>
<div class="mobile-menu-bottom">
    <div class="container-mobile">
        <a href="" class="menu-icon active">
            <img src="<?= base_url('front/img/house.svg') ?>" alt="">
            <span>Home</span>
        </a>
        <div class="menu-icon">
            <img src="<?= base_url('front/img/cabinet.svg') ?>" alt="">
            <span>Kategori</span>
        </div>
        <div class="menu-icon">
            <img src="<?= base_url('front/img/shopping-cart.svg') ?>" alt="">
            <span>Cart</span>
        </div>
        <div class="menu-icon">
            <img src="<?= base_url('front/img/refresh.svg') ?>" alt="">
            <span>Riwayat</span>
        </div>
        <div class="menu-icon">
            <img src="<?= base_url('front/img/user.svg') ?>" alt="">
            <span>User</span>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript -->
<script src="<?php echo base_url('front/vendor/jquery/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('front/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

<!-- Plugin JavaScript -->
<script src="<?php echo base_url('front/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>
<script src="<?php echo base_url('front/js/jquery.menu-aim.js') ?>"></script>
<script src="<?php echo base_url('front/js/core.js') ?>"></script>
<script src="<?php echo base_url('front/js/custom.js') ?>"></script>

<script>
    let $dropdown = $('.dropdown-cs-item');

    $dropdown.menuAim({
        activateCallback: activateSubmenu,
        deactivateCallback: deactivate,
        openClassName: '.is-hover',
        activationDelay: 0
    });

    function activateSubmenu(row) {
        var $row = $(row);
        $row.addClass('is-hover');
    }

    function deactivate(row) {
        $(row).removeClass('is-hover');
    }
    $('.btm-kategori').on('mouseover', function() {
        var tombol = $(this),
            list_menu = $('.kategori-list'),
            bg_active = $('.dropdown-bg');

        var openList = setTimeout(function() {
            list_menu.addClass('active');
            bg_active.addClass('bg-active');
        }, 300);

        tombol.one('mouseout', function() {
            clearTimeout(openList);
            var closeList = setTimeout(function() {
                list_menu.removeClass('active');
                bg_active.removeClass('bg-active');
            }, 0);
            tombol.one('mouseover', function() {
                clearTimeout(closeList);
            })
        })
    });
</script>

</body>

</html>
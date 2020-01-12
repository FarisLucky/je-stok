<!-- Footer -->
<footer class="footer-2" id="footer-2">
  <div class="container">
    <div class="body-copyright">
      <p class="m-0 text-center cs-copyright">Copyright &copy; IT Je-stok 2019</p>
    </div>
  </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="<?php echo base_url('front/vendor/jquery/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('front/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

<!-- Plugin JavaScript -->
<script src="<?php echo base_url('front/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>
<script src="<?php echo base_url('front/js/jquery.menu-aim.js') ?>"></script>
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
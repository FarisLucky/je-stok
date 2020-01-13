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
<script src="<?php echo base_url('front/js/custom.js') ?>"></script>

<script>
let $dropdown = $('.dropdown-cs-item');
var flash_component = document.getElementById('flash_data');
var toast_text = document.querySelector('.toast-body');
var toast = document.querySelector('.toast');
var flash_success = flash_component.dataset.success;
var flash_failed = flash_component.dataset.failed;

flash_success && showToast(flash_success);
flash_failed && showToast(flash_failed);

function showToast(body_toast) {
  console.log(body_toast);
  toast_text.innerHTML = body_toast;
  toast.classList.remove("d-none");
  $('.toast').toast('show');
}
</script>

</body>

</html>
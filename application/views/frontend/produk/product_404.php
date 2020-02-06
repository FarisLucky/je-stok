<?php $this->load->view('frontend/partials/header'); ?>
<section id="homeContent">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-sm-9">
        <div class="card border-0 shadow">
          <div class="card-body">
            <div class="emot-icon">
              <div class="header-emot">
                <h4>Produk Kosong</h4>
              </div>
              <div>
                <img src="<?= base_url('front/img/failed-icon.png') ?>" alt="">
              </div>
              <div class="footer-emot">
                <span>Produk yang dicari tidak tersedia</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php $this->load->view('frontend/transaksi/modal_alamat') ?>
<?php $this->load->view('frontend/transaksi/modal_ongkir') ?>
<!-- Script For Core -->
<script defer src="<?php echo base_url('front/js/core.js') ?>"></script>

<!-- Script For Core -->
<?php $this->load->view('frontend/partials/footer'); ?>
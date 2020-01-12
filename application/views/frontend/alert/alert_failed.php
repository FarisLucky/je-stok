<?php $this->load->view('frontend/partials/header'); ?>
<section id="payment">
  <div class="container">
    <div class="row justify-content-center py-4">
      <div class="col-sm-9">
        <div class="card border-0 shadow">
          <div class="card-body">
            <div class="emot-icon">
              <div class="header-emot">
                <h4>Transaksi Gagal</h4>
              </div>
              <div>
                <img src="<?= base_url('front/img/failed-icon.png') ?>" alt="">
              </div>
              <div class="footer-emot">
                <span>Transaksi gagal di lakukan</span>
                <a href="<?= base_url('transaksi') ?>" class="btn btn-primary link-footer">Kembali Ke Transaksi</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php $this->load->view('frontend/partials/footer'); ?>
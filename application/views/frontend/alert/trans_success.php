<?php $this->load->view('frontend/partials/header'); ?>
<section id="payment">
  <div class="container">
    <div class="row justify-content-center py-4">
      <div class="col-sm-9">
        <div class="card border-0 shadow">
          <!-- <form action="<?= base_url('pembayaran') ?>" method="POST">
            <input type="hidden" name="id_order" value="<?= $id_order ?>"> -->
          <div class="card-body">
            <div class="emot-icon">
              <div class="header-emot">
                <h4>Transaksi Berhasil</h4>
              </div>
              <div>
                <img src="<?= base_url('front/img/trans-success-icon.png') ?>" alt="">
              </div>
              <div class="footer-emot">
                <span>Terima Kasih sudah Melakukan Transaksi</span>
                <a href="<?= base_url('pembayaran/index/'.$id_order) ?>" class="btn btn-primary">Lanjut
                  Pembayaran</button>
                  <a href="<?= base_url('profil/riwayattransaksi') ?>" class="btn btn-secondary link-footer">Lihat
                    Riwayat</a>
              </div>
            </div>
          </div>
          <!-- </form> -->
        </div>
      </div>
    </div>
  </div>
</section>
<?php $this->load->view('frontend/partials/footer'); ?>
<?php $this->load->view('frontend/partials/header'); ?>
<section id="payment">
  <div class="container">
    <div class="card">
      <div class="card-body">
        <div class="count-time">
          <div id="payment_date" data-start="<?= $payment['start_bayar'] ?>" data-exp="<?= $payment['exp_bayar'] ?>">
          </div>
          <h5 class="time-title">Bayar Sebelum Tanggal </h5>
          <span class="time-subtitle" id="time_count_down">24/12/2019 23:22:01</span>
        </div>
        <br>
        <div class="date-time">
          <div class="form-group custom-">
            <label for="">Pilih Tanggal Pembayaran</label>
            <input type="date" class="form-control">
          </div>
        </div>
        <div class="date-time">
          <div class="form-group custom-">
            <label for="">Masukkan Bukti Pembayaran</label>
            <input type="file" class="form-control">
          </div>
        </div>
        <button type="submit" class="btn btn-primary font-subtitle">Simpan</button>
        <button type="submit" class="btn btn-secondary font-subtitle">Reset</button>
      </div>
    </div>
  </div>
</section>
<script type="text/javascript" src="<?= base_url('front/js/core_payment.js') ?>" defer="true"></script>
<?php $this->load->view('frontend/partials/footer'); ?>
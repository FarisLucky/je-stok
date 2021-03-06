<?php $this->load->view('frontend/partials/header_2'); ?>
<!-- <link rel="stylesheet" href="<?= base_url('front/css/gijgo.min.css') ?>"> -->
<link rel="stylesheet" href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css">
<section id="payment">
  <div class="container">
    <h4 style="font-weight: 900; letter-spacing: 2px;padding: .5rem 0px;text-align: center">Pembayaran</h4>
    <div class="row justify-content-center py-4">
      <div class="col-sm-9">
        <div class="card border-0 shadow">
          <div class="card-body">
            <form action="<?= base_url('pembayaran/coreBayar') ?>" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="input_hidden" value="<?= $payment['id_order'] ?>">
              <div class="box-payment">
                <div class="left-box">
                  <div class="box-child">
                    <h5 class="time-title">Bayar Sebelum Tanggal </h5>
                    <span class="time-subtitle"
                      id="time_count_down"><?= date('d-m-Y H:i:s',strtotime($payment['exp_bayar'])) ?></span>
                  </div>
                  <div class="box-child">
                    <h5 class="time-title">Jumlah Bayar</h5>
                    <span class="time-subtitle">Rp
                      <?= number_format($payment['grand_total'],0,',','.'); ?></span>
                  </div>
                </div>
                <div class="right-box">
                  <div class="box-child">
                    <h5 class="time-title">tanggal pesan</h5>
                    <span class="time-subtitle" id="time_count_down">04-06-1999 12:00:02</span>
                  </div>
                  <div class="box-child">
                    <h5 class="time-title">rekening pembayaran</h5>
                    <span class="time-subtitle" id="time_count_down"><?= $payment['no_rekening'] ?></span>
                  </div>
                </div>
              </div>
              <div class="date-time">
                <div class="row">
                  <div class="col-sm-7">
                    <div class="form-group">
                      <label for="">Pilih Tanggal Pembayaran</label>
                      <input name="tgl_bayar" class="form-control" id="date_picker_switch" required>
                    </div>
                  </div>
                  <div class="col-sm-5">
                    <div class="form-group">
                      <label for="">Jam Bayar</label>
                      <input name="waktu_bayar" class="form-control" id="time_picker_switch" required>
                    </div>
                  </div>
                </div>
              </div>
              <div class="date-time">
                <div class="form-group">
                  <label for="">Masukkan Bukti Pembayaran <small class="text-danger font-subtitle">Max 800 kb</small>
                  </label>
                  <img id="img_preview" class="d-block py-2 w-100">
                  <input type="file" name="bukti_bayar" class="form-control" required>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-3 pb-2">
                  <button type="submit" class="btn btn-primary font-subtitle w-100">Simpan</button>
                </div>
                <div class="col-lg-2 px-lg-1 pb-2">
                  <button type="reset" class="btn btn-secondary font-subtitle w-100">Reset</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</section>
<script type="text/javascript" src="<?= base_url('front/js/gijgo.min.js') ?>" defer></script>
<script type="text/javascript" src="<?= base_url('front/js/core_payment.js') ?>" defer></script>
<?php $this->load->view('frontend/partials/footer_2'); ?>
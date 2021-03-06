<?php $this->load->view('frontend/partials/header_2'); ?>
<section class="position-relative my-5" id="transaksi">
  <div class="container">
    <h4 style="font-weight: 900; letter-spacing: 2px;padding: .5rem 0px;">Transaksi</h4>
    <form action="" method="POST" id="form_transaksi">
      <div class="row">
        <!-- Data Pengiriman Dan Data Barang -->
        <div class="col-md-6">
          <div class="address">
            <div class="title">
              <img src="<?= base_url('front/img/news.svg') ?>" class="mr-1" width="20px">
              <span>Alamat Pengiriman</span>
            </div>
            <div class="card border-0 shadow-card">
              <div class="card-body py-1 px-2">
                <!-- Jika Ada Alamat -->
                <?php if (empty($alamat)) { ?>
                <div class="address-add text-center">
                  <button type="button" class="btn btn-outline-primary w-100" data-target="#modal_tambah"
                    data-toggle="modal"><span class="fa fa-plus"> Tambah
                      Alamat</span></button>
                </div>
                <!-- Jika tidak ada alamat -->
                <?php } else { ?>
                <div class="address-1 p-2">
                  <div class="title-box">
                    <a href="#" class="float-right ganti_alamat" id="req_alamat">
                      ubah alamat
                    </a>
                  </div>
                  <div class="body-box " id="body_alamat">
                    <input type="hidden" name="alamat_input" id="alamat_input" value="<?= $alamat['id_alamat'] ?>">
                    <div class="address-text">
                      <span class="fa fa-home mr-1"></span>
                      <span id="nama_alamat"><?= $alamat['nama_alamat'] ?></span>
                    </div>
                    <div class="address-text">
                      <span class="fa fa-address-book mr-1"></span>
                      <span id="alamat_lengkap"><?= $alamat['alamat_lengkap'] ?></span>
                    </div>
                    <div class="address-text">
                      <span class="fa fa-phone mr-1"></span>
                      <span class="mb-1" id="telp"><?= $alamat['telp'] ?></span>
                    </div>
                    <div class="address-text">
                      <span class="fa fa-car mr-1"></span>
                      <i id="detail_alamat"><?= $alamat['kabupaten'] ?>
                        - <?= $alamat['provinsi'] ?></i>
                    </div>
                    <div class="address-text border-0">
                      <span class="fa fa-envelope mr-1"></span>
                      <i id="kode_pos"><?= $alamat['kode_pos'] ?></i>
                    </div>
                  </div>
                  <div class="footer-box design">
                    <h5>Deskripsi Pesanan</h5>
                    <textarea name="txt_deskripsi" cols="30" rows="3" class="form-control border-0"
                      placeholder="Masukkan Deskripsi Pesanan ......"></textarea>
                  </div>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
          <div class="pengiriman mt-2">
            <!-- <input type="hidden" name="ongkir_input" id="ongkir_input"
                            value="<?= $kurir['rajaongkir']['results'][0]['code'] ?>"> -->
            <div class="title">
              <img src="<?= base_url('front/img/box.svg') ?>" class="mr-1" width="20px">
              <span>Pengiriman</span>
            </div>

            <div class="card border-0 shadow-card">
              <div class="card-body p-1">
                <div class="d-flex flex-column p-2">
                  <div class="body-box">
                    <div>
                      <span>Pilih Ongkir</span>
                      <span class="fa fa-question-circle float-right fourth-color" data-target="#question_ongkir"
                        data-toggle="modal"></span>
                    </div>
                    <div class="limit"></div>
                    <div class="pilih-ongkir" id="body_ongkir">
                      <?php if (isset($kurir['status']) && $kurir['status'][0]['status'] === 'Error') { ?>

                      <div class="ongkir" id="ongkir_selectx">
                        <div class="d-flex flex-column">
                          <span class="font-15 weight-500">Ongkir Kosong</span>
                          <span class="font-13">-hari
                            kerja</span>
                        </div>
                        <span class="weight-500 mx-3">Rp.0</span>
                      </div>

                      <?php } else { ?>

                      <div class="ongkir" id="ongkir_selectx">
                        <div class="d-flex flex-column">
                          <span class="font-15 weight-500">Dakota Cargo -
                            Min(<?= $kurir['price'][0]['minkg']." kg" ?>) </span>
                          <span class="font-13 mt-1">harga selanjutnya Rp.
                            <?= number_format($kurir['price'][0]['kgnext'],0,',','.') ?>/kg
                          </span>
                        </div>
                        <span class="weight-500">Rp.
                          <?= number_format($kurir['price'][0]['pokok'],0,',','.') ?></span>
                      </div>

                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="product mt-2">
            <div class="title">
              <img src="<?= base_url('front/img/box-list.svg') ?>" class="mr-1" width="20px">
              <span>Detail Produk</span>
            </div>
            <div class="card border-0 shadow-card">
              <div class="card-body p-1">
                <?php $total_belanja = 0;
                      $total_berat = 0;
                foreach ($produk as $key => $value) { ?>
                <div class="d-flex flex-column p-3">
                  <div class="body-box">
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="cover-img">
                          <img src="<?= base_url('assets/uploads/img/foto_produk/'.$value['foto']) ?>" class="img-100">
                        </div>
                      </div>
                      <div class="col d-flex flex-column">
                        <div class="flex-row align-items-center">
                          <span class="font-15 weight-500"><?= $value['nama_produk'] ?></span>
                        </div>
                        <div class="limit"></div>
                        <span class="font-14 weight-500">Rp
                          <?= number_format($value['harga'],0,',','.') ?> / pcs</span>
                        <span class="font-14">jumlah :
                          <?= $value['jumlah'].' '.$value['satuan_produk'] ?></span>
                        <span class="font-14">berat : <?= $value['berat'] ?> gram</span>
                        <span class="font-14">total harga : Rp
                          <?= number_format(($value['harga'] * $value['jumlah']),0,',','.') ?></span>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="w-75">
                <?php $total_belanja += ($value['harga'] * $value['jumlah']);
                      $total_berat += ($value['berat'] * $value['jumlah']);
                } ?>
              </div>
            </div>
          </div>
        </div>
        <!-- Data Total Harga -->
        <div class="col-md-6">
          <div class="total-transaksi">
            <div class="title">
              <img src="<?= base_url('front/img/bill.svg') ?>" class="mr-1" width="20px">
              <span>Total Transaksi</span>
            </div>
            <div class="card border-0 shadow-card">
              <div class="card-body p-1">
                <div class="d-flex flex-column p-2" id="body_grand_total">
                  <div class="body-box">
                    <div class="row-total">
                      <div class="d-flex justify-content-between">
                        <span>Total Belanja</span>
                        <span>Rp <?= number_format($total_belanja,0,',','.') ?></span>
                      </div>
                      <div class="d-flex justify-content-between">
                        <span>Total Diskon</span>
                        <span>-</span>
                      </div>
                      <div class="d-flex justify-content-between">
                        <span>Total Berat</span>
                        <span id="total_biaya_kirim"><?= ceil($total_berat/1000) ?> kg</span>
                      </div>
                      <div class="d-flex justify-content-between align-item-center">
                        <span>Total Biaya Kirim</span>

                        <?php
                          if (!empty($alamat)) {
                            $minimum_dakota = $kurir['price'][0]['minkg'] * 1000; //minimun berat dakota
                            $biaya_kirim = $kurir['price'][0]['pokok'];
                            $biaya_tambahan = $kurir['price'][0]['kgnext'];
                            $final_biaya_kirim = $biaya_kirim;
                            $total_biaya_tambahan = 0;
                            if ($total_berat > $minimum_dakota) {
                              $berat_tambahan = $total_berat - $minimum_dakota;
                              $total_berat_tambahan = ceil($berat_tambahan / 1000); //dibagi 1000 gram
                              $total_biaya_tambahan = $total_berat_tambahan * $biaya_tambahan;
                              $final_biaya_kirim += $total_biaya_tambahan;
                            } 
                          } 
                        ?>

                        <span id="total_biaya_kirim">Rp
                          <?php $final_biaya_kirim ?? $final_biaya_kirim = 0; echo number_format($final_biaya_kirim,0,',','.') ?></span>
                      </div>
                      <div class="d-flex justify-content-between">
                        <span>Gratis Ongkir</span>
                        <span>-</span>
                      </div>
                    </div>
                  </div>
                  <div class="limit"></div>
                  <div class="footer-box d-flex justify-content-between mx-auto">
                    <span class="font-15 weight-500">Total Transaksi</span>
                    <span class="font-15 weight-500">Rp
                      <?= number_format($total_belanja+$final_biaya_kirim,0,',','.') ?></span>
                  </div>
                  <div class="my-2 limit"></div>
                </div>
              </div>
            </div>
            <div class="card border-0 shadow-card mt-4">
              <div class="card-body p-3">
                <div class="form-group">
                  <label>Pilih Rekening</label>
                  <select name="i_rekening" class="form-control font-subtitle" required>
                    <?php foreach ($rekening as $key => $value) { ?>
                    <option value="<?= $value['bank'].' - '. $value['no_rekening'].' - '.$value['pemilik'] ?>">
                      <?= strtoupper($value['bank']).' - '. $value['no_rekening'].' - '.$value['pemilik'] ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="process">
                  <button type="submit" class="btn btn-primary w-100 bg-tradic">Lanjutkan</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</section>
<div class="modal fade" id="modal_tambah">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <?php $this->load->view('frontend/transaksi/modal_tambah_alamat') ?>
    </div>
  </div>
</div>
<?php $this->load->view('frontend/transaksi/modal_alamat') ?>
<?php $this->load->view('frontend/transaksi/modal_ongkir') ?>
<?php $this->load->view('frontend/transaksi/modal_question') ?>
<!-- Script For Core -->
<script defer="true" src="<?php echo base_url('front/js/core.js') ?>"></script>
<!-- Script For Core -->
<?php $this->load->view('frontend/partials/footer_2'); ?>
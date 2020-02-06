<?php $this->load->view('frontend/partials/header'); ?>
<!-- ****** Cart Area Start ****** -->

<link rel="stylesheet" href="<?= base_url('assets/chart/css/core-style.css') ?>">
<link href="<?= base_url('assets/chart/css/responsive.css') ?>" rel="stylesheet">
<section class="cart_area section_padding_50 clearfix">
  <div class="container-lg">
    <div class="row">
      <div class="col-12">
        <div class="cart-table table-responsive clearfix">
          <table class="table">
            <thead>
              <tr>
                <th>Pilih</th>
                <th>Produk</th>
                <th>Tipe</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if (empty($items['detail_keranjang'])) {
                echo '<tr>
                          <td colspan="7" class="text-center font-subtitle" style="font-size: 30px">Keranjang Kosong</td>
                      </tr>';
              } else {
                foreach ($items['detail_keranjang'] as $key => $value) { ?>
                  <form action="" class="form_cart" method="POST">
                    <input type="hidden" name="input_hidden" value="<?= $value['id_detail'] ?>">
                    <tr>
                      <td>
                        <?php if ($value['status_pilih'] === 'iya') {
                          echo '<input type="checkbox" name="pilih" class="pilih_product" data-status="' . $value['status_pilih'] . '" data-detail="' . $value['id_detail'] . '" checked>';
                        } else {
                          echo '<input type="checkbox" name="pilih" class="pilih_product" data-status="' . $value['status_pilih'] . '" data-detail="' . $value['id_detail'] . '">';
                        } ?>
                      </td>
                      <td class="cart_product_img d-flex align-items-end">
                        <a href="#">
                          <img src="<?= base_url('assets/uploads/img/foto_produk/' . $value['foto']) ?>" alt="Product">
                        </a>
                        <div class="d-flex flex-column">
                          <h6 class="mb-2 font-weight-bold"><?= $value['nama_produk'] ?></h6>
                          <p>Stok tersedia <?= $value['stok'] ?></p>
                        </div>
                      </td>
                      <td class="mx-2">
                        <select name="tipe_harga" class="form-control form-control-sm">
                          <?php foreach ($value['harga_jual'] as $tipe_key => $tipe) {
                            $selected = $tipe['id_harga'] === $value['id_harga'] ? 'selected' : '';
                            echo "<option value='{$tipe['id_harga']}' {$selected}> {$tipe['nama']} min beli {$tipe['min_pembelian']} </option>";
                          } ?>
                        </select>
                      </td>
                      <td class="price"><span>Rp <?= number_format($value['harga'], 0, ',', '.') ?></span>
                      </td>
                      <td class="qty">
                        <div class="quantity">
                          <span class="qty-minus" onclick="var effect = document.querySelector('.qty-text'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>
                          <input type="number" class="qty-text" step="1" min="1" max="99" name="jumlah" value="<?= $value['jumlah'] ?>">
                          <span class="qty-plus" onclick="var effect = document.querySelector('.qty-text'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                        </div>
                      </td>
                      <td class="total_price">
                        <span>Rp
                          <?= number_format(($value['jumlah'] * $value['harga']), 0, ',', '.') ?></span>
                      </td>
                      <td>
                        <button type="submit" data-id="<?= $value['id_detail'] ?>">ubah</button>
                        <button type="button" class="hapus_detail" data-set=<?= $value['id_detail'] ?>>hapus</button>
                      </td>
                    </tr>
                  </form>
              <?php }
              } ?>
            </tbody>
          </table>
        </div>

        <div class="cart-footer d-flex mt-30">
          <div class="back-to-shop w-50">
          </div>
          <div class="update-checkout w-50 text-right">
            <a href="#" class="hapus_semua" data-set="<?= $keranjang['id_keranjang'] ?>">hapus semua</a>
          </div>
        </div>

      </div>
    </div>

    <div class="row">
      <div class="col-12 col-md-6 col-lg-4">
        <div class="coupon-code-area mt-70">
        </div>
      </div>
      <div class="col-12 col-lg-8">
        <div class="cart-total-area mt-70">
          <div class="cart-page-heading">
            <h5>Harga Total Semua Produk </h5>
          </div>
          <ul class="cart-total-chart">
            <li><span><strong>Total</strong></span>
              <span id="harga_total"><strong><?= number_format($items['total_detail'], 0, ',', '.') ?></strong></span></li>
          </ul>
          <a href="<?= base_url('transaksi') ?>" class="btn karl-checkout-btn" id="validasi_pesanan">Lanjutkan Ke
            Pemesanan</a>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="<?= base_url('front/js/core_keranjang.js') ?>" defer="true"></script>
<?php $this->load->view('frontend/partials/footer'); ?>
<!-- ****** Cart Area End ****** -->
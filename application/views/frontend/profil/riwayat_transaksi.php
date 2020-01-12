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
                <th>Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if (empty($riwayat)) {
                echo '<tr>
                          <td colspan="6" class="text-center font-subtitle">Tidak Ada Riwayat Transaksi</td>
                      </tr>';
              } else {
                foreach ($riwayat as $rows) : ?>
                  <form action="" class="form_cart" method="POST">
                    <tr>
                      <td class="cart_product_img d-flex align-items-center">
                        <a href="#">
                          <img src="<?= base_url('assets/uploads/img/foto_produk/' . $rows->foto) ?>" alt="Product">
                        </a>
                        <h6><?= $rows->nama_produk ?></h6>
                      </td>
                      <td class="price"><span><?= $rows->harga ?></span>
                      </td>
                      <td class="price"><span><?= $rows->jumlah ?></span>
                      </td>
                      <td class="price"><span><?= $rows->total_harga ?></span>
                      </td>
                    </tr>
                  </form>
                <?php endforeach; ?>
              <?php } ?>
            </tbody>
          </table>
        </div>
        <div class="cart-footer d-flex mt-30">
          <div class="back-to-shop w-50">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="<?= base_url('front/js/core_keranjang.js') ?>" defer="true"></script>
<?php $this->load->view('frontend/partials/footer'); ?>
<!-- ****** Cart Area End ****** -->
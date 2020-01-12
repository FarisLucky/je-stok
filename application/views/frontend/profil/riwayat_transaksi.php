<!-- CSS-->
<link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/profil/sidebar.css') ?>" />
<link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/profil/page.css') ?>" />

<?php $this->load->view('frontend/partials/header'); ?>
<link rel="stylesheet" href="<?= base_url('assets/chart/css/core-style.css') ?>">
<link href="<?= base_url('assets/chart/css/responsive.css') ?>" rel="stylesheet">
<div class="profil my-5">
  <div class="container-md">
    <div class="sidebar-nav-custom">
      <?php $this->load->view('frontend/profil/sidebar_component'); ?>
      <div class="right-sidebar">
        <div class="right-header">
          <h4>Daftar Pesanan</h4>
        </div>
        <div class="right-body">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link active" href="#belum_bayar" data-toggle="tab">Belum Bayar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#pengiriman" data-toggle="tab">Pengiriman</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#sudah_selesai" data-toggle="tab">Sudah Selesai</a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="belum_bayar" role="tabpanel" aria-labelledby="home-tab">
              <div class="cart-table table-responsive clearfix">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Produk</th>
                      <th>Harga</th>
                      <th>Jumlah</th>
                      <th>Total</th>
                      <th>Deskripsi</th>
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
                            <td class="price"><span><?= $rows->deskripsi ?></span>
                            </td>
                          </tr>
                        </form>
                      <?php endforeach; ?>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="tab-pane fade" id="pengiriman" role="tabpanel" aria-labelledby="profile-tab">Pengiriman</div>
            <div class="tab-pane fade" id="sudah_selesai" role="tabpanel" aria-labelledby="contact-tab">Sudah Selesai
            </div>
          </div>
        </div>
        <div class="right-footer"></div>
      </div>
    </div>
  </div>
</div>
<!-- Script For Core -->
<?php $this->load->view('frontend/partials/footer'); ?>
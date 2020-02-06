<!-- CSS-->

<?php $this->load->view('frontend/partials/header'); ?>
<link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/profil/sidebar.css') ?>">
<link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/profil/page.css') ?>">
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
              <div class="table table-responsive table-borderless">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Produk</th>
                      <th>Harga</th>
                      <th>Jumlah</th>
                      <th>Total</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if (empty($order)) {
                      echo '<tr>
                              <td colspan="6" class="text-center font-subtitle">Tidak Ada Riwayat Transaksi</td>
                          </tr>';
                    } else {
                      foreach ($order as $key => $value) : ?>
                        <form action="<?= base_url('pembayaran/index/' . $value['id_order']); ?>" class="form_cart" method="POST">
                          <tr>
                            <td class="cart_product_img d-flex align-items-center">
                              <a href="#">
                                <img src="<?= base_url('assets/uploads/img/foto_produk/' . $value['foto']) ?>" alt="Product">
                              </a>
                              <h6><?= $value['nama_produk'] ?></h6>
                            </td>
                            <td class="price"><span><?= $value['harga'] ?></span>
                            </td>
                            <td class="price"><span><?= $value['jumlah'] ?></span>
                            </td>
                            <td class="price"><span><?= $value['total_harga'] ?></span>
                            </td>
                            <td>
                              <button type="submit" class="btn btn-danger btn-sm">Proses Bayar</button>
                            </td>
                          </tr>
                        </form>
                      <?php endforeach; ?>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="tab-pane fade" id="pengiriman" role="tabpanel" aria-labelledby="profile-tab">
              <div class="cart-table table-responsive clearfix">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Produk</th>
                      <th>Harga</th>
                      <th>Jumlah</th>
                      <th>Total</th>
                      <th>No Resi</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if (empty($order)) {
                      echo '<tr>
                              <td colspan="6" class="text-center font-subtitle">Tidak Ada Riwayat Transaksi</td>
                          </tr>';
                    } else {
                      foreach ($kirim as $key => $value) : ?>
                        <form action="<?= base_url('profil/terimabarang'); ?>" class="form_cart" method="POST">
                          <tr>
                            <td class="cart_product_img d-flex align-items-center">
                              <a href="#">
                                <img src="<?= base_url('assets/uploads/img/foto_produk/' . $value['foto']) ?>" alt="Product">
                              </a>
                              <h6><?= $value['nama_produk'] ?></h6>
                            </td>
                            <td class="price"><span><?= $value['harga'] ?></span>
                            </td>
                            <td class="price"><span><?= $value['jumlah'] ?></span>
                            </td>
                            <td class="price"><span><?= $value['total_harga'] ?></span>
                            </td>
                            <td class="price"><span><?= $value['no_resi'] ?></span>
                            </td>
                            <td>
                              <button type="submit" class="btn btn-success btn-sm">Terima Barang</button>
                            </td>
                          </tr>
                        </form>
                      <?php endforeach; ?>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>

            <div class="tab-pane fade" id="sudah_selesai" role="tabpanel" aria-labelledby="contact-tab">
              <div class="cart-table table-responsive clearfix">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Produk</th>
                      <th>Harga</th>
                      <th>Jumlah</th>
                      <th>Total</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if (empty($order)) {
                      echo '<tr>
                              <td colspan="6" class="text-center font-subtitle">Tidak Ada Riwayat Transaksi</td>
                          </tr>';
                    } else {
                      foreach ($selesai as $key => $value) : ?>
                        <form action="" class="form_cart" method="POST">
                          <tr>
                            <td class="cart_product_img d-flex align-items-center">
                              <a href="#">
                                <img src="<?= base_url('assets/uploads/img/foto_produk/' . $value['foto']) ?>" alt="Product">
                              </a>
                              <h6><?= $value['nama_produk'] ?></h6>
                            </td>
                            <td class="price"><span><?= $value['harga'] ?></span>
                            </td>
                            <td class="price"><span><?= $value['jumlah'] ?></span>
                            </td>
                            <td class="price"><span><?= $value['total_harga'] ?></span>
                            </td>
                            <td>
                              <button type="submit" class="btn btn-success btn-sm">Feed Back</button>
                            </td>
                          </tr>
                        </form>
                      <?php endforeach; ?>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
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
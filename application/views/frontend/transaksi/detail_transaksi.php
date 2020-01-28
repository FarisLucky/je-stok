<?php $this->load->view('frontend/partials/header'); ?>
<section class="position-relative my-5" id="transaksi">
  <div class="container">
    <div class="card mb-4">
      <div class="card-body">
        <h4>Detail Transaksi</h4>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-body">
        <div class="d-flex flex-column">
          <span class="fnt-left">Status</span>
          <span class="alert alert-success mb-0 fnt-right"><?= $transaksi['deskripsi'] ?></span>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
            <div class="d-flex flex-column">
              <div class="child-card">
                <span class="fnt-left">Pemesan</span>
                <span class="fnt-right"><?= $transaksi['nama_lengkap'] ?></span>
              </div>
              <div class="child-card">
                <span class="fnt-left">Alamat Lengkap</span>
                <span class="fnt-right"><?= $transaksi['alamat_lengkap'] ?></span>
              </div>
              <div class="child-card">
                <span class="fnt-left">Deskripsi</span>
                <span class="fnt-right"><?= $transaksi['pesan_user'] ?></span>
              </div>
              <div class="child-card">
                <span class="fnt-left">Tanggal Pesan</span>
                <span class="fnt-right"><?= date('d-m-Y H:i:s',strtotime($transaksi['tgl_pesan'])) ?></span>
              </div>
              <div class="child-card">
                <span class="fnt-left">Kurir</span>
                <span class="fnt-right"><?= $transaksi['kurir'] ?></span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="card h-100">
          <div class="card-body">
            <div class="d-flex flex-column">
              <div class="child-card">
                <span class="fnt-left">Tanggal Bayar</span>
                <span class="fnt-right"><?= date('d-m-Y H:i:s',strtotime($transaksi['tgl_bayar'])) ?></span>
              </div>
              <div class="child-card">
                <span class="fnt-left">Tanggal Input Bayar</span>
                <span class="fnt-right"><?= date('d-m-Y H:i:s',strtotime($transaksi['tgl_input_bayar'])) ?></span>
              </div>
              <div class="child-card">
                <span class="fnt-left">Rekening Bayar</span>
                <span class="fnt-right"><?= $transaksi['no_rekening'] ?></span>
              </div>
              <div class="child-card">
                <span class="fnt-left">Bukti Bayar</span>
                <span class="fnt-right">
                  <a href="<?= base_url('assets/uploads/img/payment/'.$transaksi['upload_bukti']) ?>"
                    target="_blank">Bukti Bayar</a>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card mt-4">
      <div class="card-body">
        <h5>Info Produk</h5>
        <div class="table-responsive">
          <table class="table table-borderless">
            <thead>
              <th>No</th>
              <th>Produk</th>
              <th>Jumlah</th>
              <th>Harga</th>
              <th>Total</th>
            </thead>
            <tbody>
              <?php
            $no = 1;
            $total_semua = 0;
            foreach ($data_produk as $key => $value) {
              $table = "<tr>
                          <td>$no</td>
                          <td>{$value['nama_produk']}</td>
                          <td>{$value['jumlah']}</td>
                          <td>".number_format($value['harga'],0,',','.')."</td>
                          <td>".number_format($value['total_harga'],0,',','.')."</td>
                        </tr>";
              echo $table;
              $total_semua += $value['total_harga'];
              $no++;
            } ?>
            </tbody>
            <tr>
              <tfoot>
                <td colspan="4" class="font-weight-bold">Total</td>
                <td><?= number_format($total_semua,0,',','.') ?></td>
            </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
<?php $this->load->view('frontend/partials/footer'); ?>
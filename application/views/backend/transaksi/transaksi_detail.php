<?php $this->load->view('backend/partials/navbar.php'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Table menu -->
  <div class="row">
    <div class="col-lg-12">
      <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Table Transaksi</h6>
          <a href="<?= base_url('admin/transaksi/list') ?>" class="btn btn-sm btn-dark"><span
              class="fa fa-arrow-alt-circle-left"></span> Kembali</a>
        </div>
        <div class="card-body">
          <div class="responsive">
            <div class="tbody-body">
              <h5 class="border-table-bottom">Info Transaksi</h5>
              <div class="row">
                <div class="col-md-6 border-table-right">
                  <div class="flex-column-cs p-2">
                    <div class="flex-column-cs">
                      <span>Pemesan</span>
                      <span class="font-weight-bold"><?= strtoupper($transaksi['nama_lengkap']) ?></span>
                    </div>
                    <div class="flex-column-cs">
                      <span>Tanggal Pesanan</span>
                      <span class="font-weight-bold"><?= date("d-m-Y",strtotime($transaksi['tgl_pesan'])) ?></span>
                    </div>
                    <div class="flex-column-cs">
                      <span>Kurir</span>
                      <span class="font-weight-bold"><?= $transaksi['tgl_pesan'] ?></span>
                    </div>
                    <div class="flex-column-cs">
                      <span>Total Produk</span>
                      <span class="font-weight-bold"><?= $transaksi['total_produk'] ?></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="d-flex flex-column p-2">
                    <div class="flex-column-cs">
                      <span>Total Harga Produk</span>
                      <span class="font-weight-bold">Rp
                        <?= number_format($transaksi['total_harga_produk'],0,',','.') ?></span>
                    </div>
                    <div class="flex-column-cs">
                      <span>Total Berat</span>
                      <span
                        class="font-weight-bold"><?= $transaksi['total_berat'].' '.$transaksi['satuan_berat'] ?></span>
                    </div>
                    <div class="flex-column-cs">
                      <span>Biaya Kirim</span>
                      <span class="font-weight-bold">Rp
                        <?= number_format($transaksi['biaya_kirim'],0,',','.') ?></span>
                    </div>
                    <div class="flex-column-cs">
                      <span>Total Akhir</span>
                      <span class="font-weight-bold">Rp
                        <?= number_format($transaksi['grand_total'],0,',','.') ?></span>
                    </div>
                  </div>
                </div>
              </div>
              <h5 class="border-table-bottom py-2">Info Pembayaran</h5>
              <div class="row">
                <div class="col-md-6 border-table-right">
                  <div class="d-flex flex-column p-2">
                    <div class="flex-column-cs">
                      <span>Mulai Bayar</span>
                      <span
                        class="font-weight-bold"><?= date('d-m-Y H:i:s',strtotime($transaksi['start_bayar']))  ?></span>
                    </div>
                    <div class="flex-column-cs">
                      <span>Sampai Tanggal</span>
                      <span
                        class="font-weight-bold"><?= date('d-m-Y H:i:s',strtotime($transaksi['exp_bayar'])) ?></span>
                    </div>
                    <div class="flex-column-cs">
                      <span>Ke Rekening</span>
                      <span class="font-weight-bold"><?= $transaksi['id_rekening'] ?></span>
                    </div>
                    <div class="flex-column-cs">
                      <span>Total Biaya</span>
                      <span class="font-weight-bold">Rp
                        <?= number_format($transaksi['grand_total'],0,',','.') ?></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="d-flex flex-column p-2">
                    <div class="flex-column-cs">
                      <span>Tanggal Bayar</span>
                      <span
                        class="font-weight-bold"><?= $transaksi['tgl_bayar'] ? $transaksi['tgl_bayar'] : "Belum Bayar" ?></span>
                    </div>
                    <div class="flex-column-cs">
                      <span>Tanggal Input Bayar</span>
                      <span
                        class="font-weight-bold"><?= $transaksi['tgl_input_bayar'] ? $transaksi['tgl_input_bayar'] : "Belum Bayar" ?></span>
                    </div>
                    <div class="flex-column-cs">
                      <span>Bukti Bayar</span>
                      <span
                        class="font-weight-bold"><?= $transaksi['upload_bukti'] ? $transaksi['upload_bukti'] : "Belum Bayar" ?></span>
                    </div>
                    <div class="flex-column-cs">
                      <span>No Resi</span>
                      <span
                        class="font-weight-bold"><?= $transaksi['no_resi'] ? $transaksi['no_resi'] : "Belum di inputkan" ?></span>
                    </div>
                  </div>
                </div>
              </div>
              <h5 class="py-2">Detail Produk</h5>
              <div class="table-responsive">
                <table class="table table-hover table-bordered">
                  <thead>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jumlah</th>
                    <th>Berat</th>
                    <th>Harga</th>
                    <th>Total Harga</th>
                  </thead>
                  <tbody>
                    <?php
                    if (empty($detail_produk)) {
                      echo "<tr>
                        <td colspan='100%' class='text-center font-weight-bold'>Kosong</td>
                      </tr>";
                    } else {
                      $no=1; foreach ($detail_produk as $key => $value) { ?>
                    <tr>
                      <td><?= $no; ?></td>
                      <td><?= $value[''] ?></td>
                      <td>1 pcs</td>
                      <td>0,5 kg</td>
                      <td>190000</td>
                      <td>190000</td>
                    </tr>
                    <?php } } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="5" class="text-center">Total Harga Produk</td>
                      <td><?= $detail_produk ? $value['grand_total'] : ' - ' ?></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- !Table Menu -->
</div>
<!-- /.container-fluid -->


<?php $this->load->view('backend/partials/footer.php'); ?>
<!-- Load Footer View -->
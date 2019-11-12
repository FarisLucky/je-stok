<?php $this->load->view('backend/partials/navbar.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Table menu -->
  <div class="row">
    <div class="col-lg-12">
      <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Table Transaksi</h6>
          <a href="<?= base_url('admin/transaksi/list') ?>" class="btn btn-sm btn-dark"><span class="fa fa-arrow-alt-circle-left"></span> Kembali</a>
        </div>
        <div class="card-body">
          <div class="responsive">
            <div class="tbody-body">
              <h5 class="border-table-bottom">Info Transaksi</h5>
              <div class="row">
                <div class="col-md-6 border-table-right">
                  <div class="d-flex flex-column p-2">
                    <span>No Pesanan</span>
                    <span>Pemesan</span>
                    <span>Kurir</span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="d-flex flex-column p-2">
                    <span>Tanggal Pesanan</span>
                    <span>Jasa Pengiriman</span>
                    <span class="mr-2">Status Pesanan 
                    <i>Verifikasi Order Proses</i></span>
                  </div>
                </div>
              </div>
              <h5 class="border-table-bottom py-2">Info Pembayaran</h5>
              <div class="row">
                <div class="col-md-6 border-table-right">
                  <div class="d-flex flex-column p-2">
                    <span>Mulai Bayar</span>
                    <span>Sampai Tanggal</span>
                    <span>Ke Rekening</span>
                    <span class="mr-2">Status Pembayaran<i>Belum Bayar</i></span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="d-flex flex-column p-2">
                    <span>Tanggal Bayar</span>
                    <span>Tanggal Input Bayar</span>
                    <span>Bukti Bayar</span>
                    <span>No Resi</span>
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
                    <tr>
                      <td>1</td>
                      <td>Baju Koko Muslim</td>
                      <td>1 pcs</td>
                      <td>0,5 kg</td>
                      <td>190000</td>
                      <td>190000</td>
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="5" class="text-center">Total Semua</td>
                      <td>190000</td>
                    </tr>
                    <tr>
                      <td colspan="5" class="text-center">Discount</td>
                      <td>20000</td>
                    </tr>
                    <tr>
                      <td colspan="5" class="text-center">Grand Total</td>
                      <td>170000</td>
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
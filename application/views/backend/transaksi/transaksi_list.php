<?php $this->load->view('backend/partials/navbar.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Header Title -->
  <div class="card border-left-primary shadow">
    <div class="card-body">
      <div class="d-sm-flex align-items-center justify-content-between">
        <h1 class="h3 mb-0 text-gray-800">Transaksi</h1>
      </div>
    </div>
  </div>
  <br>
  <!-- !Header Title -->
  <?php var_dump($transaksi) ?>
  <!-- Table menu -->
  <div class="row">
    <div class="col-lg-12">
      <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Table Transaksi</h6>
        </div>
        <div class="card-body">
          <div class="responsive">
            <table class="table table-hover table-bordered">
              <thead class="table-primary text-center">
                <th width='10%'>No</th>
                <th>Transaksi</th>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>
                    <div class="tbody-body">
                      <h5 class="border-table-bottom">Info Transaksi</h5>
                      <div class="row">
                        <div class="col-md-6 border-table-right">
                          <div class="d-flex flex-column p-2">
                            <span>No Pesanan</span>
                            <span>Pemesan</span>
                            <span>Tanggal Pesanan</span>
                            <span>Kurir</span>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="d-flex flex-column p-2">
                            <span>Total Produk</span>
                            <span>Total Berat</span>
                            <span>Biaya Kirim</span>
                            <span>Total Akhir</span>
                          </div>
                        </div>
                      </div>                      
                      <div class="border-y mt-1 p-2">
                        <span class="mr-2">Status Pesanan</span>
                        <i>Verifikasi Order Proses</i>
                      </div>
                      <h5 class="border-table-bottom py-2">Info Pembayaran</h5>
                      <div class="row">
                        <div class="col-md-6 border-table-right">
                          <div class="d-flex flex-column p-2">
                            <span>Mulai Bayar</span>
                            <span>Sampai Tanggal</span>
                            <span>Ke Rekening</span>
                            <span>Total Biaya</span>
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
                      <div class="border-y mt-1 p-2">
                        <span class="mr-2">Status Pembayaran</span>
                        <i>Belum Bayar</i>
                      </div>
                      <div class="border-table-top p-2 mt-2">
                        <a href="<?= base_url('admin/transaksi/detail/') ?>" class="btn btn-sm btn-outline-info">Detail</a>
                        <button role="button" class="btn btn-sm btn-outline-primary">Konfirmasi Bayar</button>
                        <button role="button" class="btn btn-sm btn-outline-danger">Hapus Pembayaran</button>
                        <button role="button" class="btn btn-sm btn-outline-danger">Batal Transaksi</button>
                      </div>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
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
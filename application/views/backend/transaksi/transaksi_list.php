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
                <?php $no = 1; foreach ($transaksi as $key => $value) { ?>
                <tr>
                  <td><?= $no ?></td>
                  <td>
                    <div class="tbody-body">
                      <h5 class="border-table-bottom">Info Transaksi</h5>
                      <div class="row">
                        <div class="col-md-6 border-table-right">
                          <div class="flex-column-cs p-2">
                            <div class="flex-column-cs">
                              <span>Pemesan</span>
                              <span class="font-weight-bold"><?= strtoupper($value['nama_lengkap']) ?></span>
                            </div>
                            <div class="flex-column-cs">
                              <span>Tanggal Pesanan</span>
                              <span
                                class="font-weight-bold"><?= date('d-m-Y H:i:s',strtotime($value['tgl_pesan'])) ?></span>
                            </div>
                            <div class="flex-column-cs">
                              <span>Kurir</span>
                              <span
                                class="font-weight-bold"><?= date('d-m-Y H:i:s',strtotime($value['tgl_pesan'])) ?></span>
                            </div>
                            <div class="flex-column-cs">
                              <span>Total Produk</span>
                              <span class="font-weight-bold"><?= $value['total_produk'] ?></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="d-flex flex-column p-2">
                            <div class="flex-column-cs">
                              <span>Total Harga Produk</span>
                              <span class="font-weight-bold">Rp
                                <?= number_format($value['total_harga_produk'],0,',','.') ?></span>
                            </div>
                            <div class="flex-column-cs">
                              <span>Total Berat</span>
                              <span
                                class="font-weight-bold"><?= $value['total_berat'].' '.$value['satuan_berat'] ?></span>
                            </div>
                            <div class="flex-column-cs">
                              <span>Biaya Kirim</span>
                              <span class="font-weight-bold">Rp
                                <?= number_format($value['biaya_kirim'],0,',','.') ?></span>
                            </div>
                            <div class="flex-column-cs">
                              <span>Total Akhir</span>
                              <span class="font-weight-bold">Rp
                                <?= number_format($value['grand_total'],0,',','.') ?></span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="border-y mt-1 p-2">
                        <span class="mr-2">Status Pesanan</span>
                        <i class="px-2 font-weight-bold"><?= $value['status'] ?></i>
                      </div>
                      <h5 class="border-table-bottom py-2">Info Pembayaran</h5>
                      <div class="row">
                        <div class="col-md-6 border-table-right">
                          <div class="d-flex flex-column p-2">
                            <div class="flex-column-cs">
                              <span>Mulai Bayar</span>
                              <span
                                class="font-weight-bold"><?= date('d-m-Y H:i:s',strtotime($value['start_bayar']))  ?></span>
                            </div>
                            <div class="flex-column-cs">
                              <span>Sampai Tanggal</span>
                              <span
                                class="font-weight-bold"><?= date('d-m-Y H:i:s',strtotime($value['exp_bayar'])) ?></span>
                            </div>
                            <div class="flex-column-cs">
                              <span>Ke Rekening</span>
                              <span class="font-weight-bold"><?= $value['no_rekening'] ?></span>
                            </div>
                            <div class="flex-column-cs">
                              <span>Total Biaya</span>
                              <span class="font-weight-bold">Rp
                                <?= number_format($value['grand_total'],0,',','.') ?></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="d-flex flex-column p-2">
                            <div class="flex-column-cs">
                              <span>Tanggal Bayar</span>
                              <span
                                class="font-weight-bold"><?= $value['tgl_bayar'] ? $value['tgl_bayar'] : "Belum Bayar" ?></span>
                            </div>
                            <div class="flex-column-cs">
                              <span>Tanggal Input Bayar</span>
                              <span
                                class="font-weight-bold"><?= $value['tgl_input_bayar'] ? $value['tgl_input_bayar'] : "Belum Bayar" ?></span>
                            </div>
                            <div class="flex-column-cs">
                              <span>Bukti Bayar</span>
                              <span
                                class="font-weight-bold"><?= $value['upload_bukti'] ? $value['upload_bukti'] : "Belum Bayar" ?></span>
                            </div>
                            <div class="flex-column-cs">
                              <span>No Resi</span>
                              <span
                                class="font-weight-bold"><?= $value['no_resi'] ? $value['no_resi'] : "Belum di inputkan" ?></span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="border-y mt-1 p-2">
                        <span class="mr-2">Status Pembayaran</span>
                        <i
                          class="font-weight-bold"><?= $value['status_bayar'] !== NULL ? ($value['status_bayar'] === 'terima' ? 'Sudah diterima' : 'Ditolak' ) : 'Belum Bayar'  ?></i>
                      </div>
                      <div class="border-table-top p-2 mt-2">
                        <a href="<?= base_url('admin/transaksi/detail/'.$value['id_order']) ?>"
                          class="btn btn-sm btn-outline-info">Detail</a>
                        <?php if ($value['status_pesanan'] === '1') {?>
                        <button role="button" class="btn btn-sm btn-outline-primary konfirmasi_bayar"
                          data-confirm="<?= $value['id_order'] ?>">Konfirmasi Bayar</button>
                        <?php } ?>
                        <button role="button" class="btn btn-sm btn-outline-secondary button_resi"
                          data-order="<?= $value['id_order'] ?>">Input
                          Resi</button>
                        <button role="button" class="btn btn-sm btn-outline-danger hapus_pembayaran"
                          data-hapus="<?= $value['id_order'] ?>">Hapus Pembayaran</button>
                        <button role="button" class="btn btn-sm btn-outline-danger">Batal Transaksi</button>
                      </div>
                    </div>
                  </td>
                </tr>
                <?php $no++;} ?>
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

<!-- Modal Resi -->

<div class="modal fade" id="modal_resi">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?= base_url('admin/transaksi/inputresi') ?>" method="POST" id="form_resi">
        <input type="hidden" name="input_hidden" value="">
        <div class="modal-header">
          <h5 class="modal-title">Nomer Resi</h5>
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="">Masukkan Resi</label>
            <input type="text" name="i_resi" class="form-control" required="true">
            <span class="text-danger"></span>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary w-100">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript" src="<?= base_url('assets/js/admin_transaksi.js') ?>"></script>
<?php $this->load->view('backend/partials/footer.php'); ?>
<!-- Load Footer View -->
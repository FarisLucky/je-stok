<?php $this->load->view('frontend/partials/header'); ?>
<section class="position-relative my-5" id="transaksi">
  <div class="container-transaksi">
    <div class="row">
      <!-- Data Pengiriman Dan Data Barang -->
      <div class="col-sm-6">
        <div class="address">
          <div class="title">
            <img src="<?= base_url('front/img/news.svg') ?>" class="mr-1" width="20px">
            <span>Alamat Pengiriman</span>
          </div>
          <div class="card border-0 shadow-card">
            <div class="card-body p-1">
              <div class="d-flex flex-column p-2">
                <div class="title-box">
                  <span>Judul Alamat</span>
                  <a href="#" class="float-right ganti_alamat" data-target="#modal" data-toggle="modal">
                    ubah alamat
                  </a>
                </div>
                <div class="limit"></div>
                <div class="body-box">
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit officia quos molestias
                    magni autem, facere
                    tenetur repellat laboriosam sunt illum at temporibus dolore, cum quaerat reprehenderit recusandae!
                    Atque, ut at.</p>
                </div>
                <div class="limit"></div>
                <div class="footer-box">
                  <p>Deskripsi Pesanan</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="pengiriman mt-2">
          <div class="title">
            <img src="<?= base_url('front/img/box.svg') ?>" class="mr-1" width="20px">
            <span>Pengiriman</span>
          </div>

          <div class="card border-0 shadow-card">
            <div class="card-body p-1">
              <div class="d-flex flex-column p-2">
                <div class="body-box">
                  <span>Pilih Ongkir</span>
                  <div class="limit"></div>
                  <div class="ongkir" id="ongkir_select">
                    <img src="<?= base_url('front/img/shipped.svg') ?>" width="35px">
                    <span class="weight-500 mx-3">Dakota </span>
                    <span class="weight-500 mx-3">Rp 33.000 </span>
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
              <div class="d-flex flex-column p-2">
                <div class="body-box">
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="cover-img">
                        <img src="<?= base_url('front/img/nabati.jpg') ?>" class="img-100">
                      </div>
                    </div>
                    <div class="col d-flex flex-column">
                      <div class="flex-row align-items-center">
                        <span class="font-15 weight-500">Nama Produk</span>
                        <a href="" class="float-right">
                          <img src="<?= base_url('front/img/menu.svg') ?>" width="17px">
                        </a>
                      </div>
                      <div class="limit"></div>
                      <span class="font-14 weight-500">Rp 300.000 / pcs</span>
                      <span class="font-14">jumlah : 2 pcs</span>
                      <span class="font-14">total harga : Rp 600.000</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Data Total Harga -->
      <div class="col-sm-6">
        <div class="total-transaksi">
          <div class="title">
            <img src="<?= base_url('front/img/bill.svg') ?>" class="mr-1" width="20px">
            <span>Total Transaksi</span>
          </div>
          <div class="card border-0 shadow-card">
            <div class="card-body p-1">
              <div class="d-flex flex-column p-2">
                <div class="body-box">
                  <div class="row-total">
                    <div class="d-flex justify-content-between">
                      <span>Total Belanja</span>
                      <span>Rp 700.000</span>
                    </div>
                    <div class="d-flex justify-content-between">
                      <span>Total Diskon</span>
                      <span>-</span>
                    </div>
                    <div class="d-flex justify-content-between">
                      <span>Total Biaya Kirim</span>
                      <span>Rp 33.000</span>
                    </div>
                    <div class="d-flex justify-content-between">
                      <span>Gratis Ongkir</span>
                      <span>-</span>
                    </div>
                  </div>
                </div>
                <div class="limit"></div>
                <div class="footer-box d-flex justify-content-between">
                  <span class="font-15 weight-500">Total Transaksi</span>
                  <span class="font-15 weight-500">Rp 733.000</span>
                </div>
                <div class="limit my-4"></div>
                <div class="process">
                  <button class="btn btn-primary w-100 bg-tradic">Lanjutkan</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="modal fade" id="modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Pilih Alamat Pengiriman</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body modal-box">
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label>Nama Alamat</label>
              <input type="text" class="form-control border-blue">
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <label>Telepon</label>
              <input type="number" class="form-control border-blue">
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <label>Alamat Lengkap</label>
              <textarea class="form-control border-blue"></textarea>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <label>Provinsi</label>
              <select class="form-control border-blue">
                <option value="">-- Pilih Provinsi --</option>
                <option value="">Jawa Timur</option>
              </select>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <label>Provinsi</label>
              <select class="form-control border-blue">
                <option value="">-- Pilih Provinsi --</option>
                <option value="">Jawa Timur</option>
              </select>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <label>Provinsi</label>
              <select class="form-control border-blue">
                <option value="">-- Pilih Provinsi --</option>
                <option value="">Jawa Timur</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary w-100 py-2">Simpan</button>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('frontend/partials/footer'); ?>
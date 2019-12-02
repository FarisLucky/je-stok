<?php $this->load->view('frontend/partials/header'); ?>
<section class="position-relative my-5" id="transaksi">
    <div class="container">
        <form action="" method="POST">
            <div class="row">
                <!-- Data Pengiriman Dan Data Barang -->
                <div class="col-md-6">
                    <div class="address">
                        <input type="hidden" name="alamat_input" id="alamat_input" value="<?= $alamat['id_alamat'] ?>">
                        <div class="title">
                            <img src="<?= base_url('front/img/news.svg') ?>" class="mr-1" width="20px">
                            <span>Alamat Pengiriman</span>
                        </div>
                        <div class="card border-0 shadow-card">
                            <div class="card-body p-1">
                                <!-- Jika Ada Alamat -->
                                <?php if (empty($alamat)) { ?>
                                <div class="address-add text-center">
                                    <button class="btn btn-outline-primary w-100" data-target="#modal_tambah"
                                        data-toggle="modal"><span class="fa fa-plus"> Tambah
                                            Alamat</span></button>
                                </div>
                                <!-- Jika tidak ada alamat -->
                                <?php } else { ?>
                                <div class="address-1 p-2">
                                    <div class="title-box">
                                        <span class="fa fa-home"></span>
                                        <span id="nama_alamat"><?= $alamat['nama_alamat'] ?></span>
                                        <a href="#" class="float-right ganti_alamat" id="req_alamat">
                                            ubah alamat
                                        </a>
                                    </div>
                                    <div class="limit"></div>
                                    <div class="body-box">
                                        <div class="my-2">
                                            <span class="fa fa-address-book"></span>
                                            <span id="alamat_lengkap"><?= $alamat['alamat_lengkap'] ?></span>
                                        </div>
                                        <div class="my-2">
                                            <span class="fa fa-phone"></span>
                                            <span class="mb-1" id="telp"><?= $alamat['telp'] ?></span>
                                        </div>
                                        <div class="my-2">
                                            <span class="fa fa-car"></span>
                                            <i id="detail_alamat"><?= $alamat['kabupaten'] ?>
                                                - <?= $alamat['provinsi'] ?></i>
                                        </div>
                                        <div class="my-2">
                                            <span class="fa fa-envelope"></span>
                                            <i id="kode_pos"><?= $alamat['kode_pos'] ?></i>
                                        </div>
                                    </div>
                                    <div class="limit"></div>
                                    <div class="footer-box">
                                        <p>Deskripsi Pesanan</p>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="pengiriman mt-2">
                        <input type="hidden" name="ongkir_input" id="ongkir_input"
                            value="<?= $kurir['rajaongkir']['results'][0]['code'] ?>">
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
                                        <div class="pilih-ongkir">
                                            <div class="ongkir" id="ongkir_select">
                                                <div class="d-flex flex-column">
                                                    <span
                                                        class="font-15 weight-500"><?= strtoupper($kurir['rajaongkir']['results'][0]['code'].' - '.$kurir['rajaongkir']['results'][0]['costs'][0]['service']); ?></span>
                                                    <span
                                                        class="font-13"><?= $kurir['rajaongkir']['results'][0]['costs'][0]['cost'][0]['etd'] ?>-hari
                                                        kerja</span>
                                                </div>
                                                <span class="weight-500 mx-3">Rp.
                                                    <?= number_format($kurir['rajaongkir']['results'][0]['costs'][0]['cost'][0]['value'],0,',','.') ?></span>
                                            </div>
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
                <div class="col-md-6">
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
                                                <span id="total_biaya_kirim">Rp
                                                    <?= number_format($kurir['rajaongkir']['results'][0]['costs'][0]['cost'][0]['value'],0,',','.') ?></span>
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
        </form>
    </div>
</section>
<div class="modal fade" id="modal_tambah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php $this->load->view('frontend/transaksi/modal_tambah_alamat') ?>
        </div>
    </div>
</div>
<?php $this->load->view('frontend/transaksi/modal_alamat') ?>
<?php $this->load->view('frontend/transaksi/modal_ongkir') ?>
<!-- Script For Core -->
<script defer src="<?php echo base_url('front/js/core.js') ?>"></script>
<!-- Script For Core -->
<?php $this->load->view('frontend/partials/footer'); ?>
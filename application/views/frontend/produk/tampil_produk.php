<?php $this->load->view('frontend/partials/header'); ?>
<section id="homeContent">
    <div class="container content">        
        <div class="row m-0 bg-product">
            <?php foreach($produk as $row) { ?>
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-produk">
                <div class="card card-produk">
                    <div class="card-header card-produk-header">
                        <img src="<?= base_url('assets/uploads/img/foto_produk/'.$row['foto']) ?>" class="foto_produk">
                    </div>
                    <div class="card-body card-produk-body">
                        <div class="product-desc">
                            <span class="desc-title mb-1"><?= $row['nama_produk']?></span>
                            <span class="desc-price mb-1">Rp. <?= $row['harga']?></span>
                            <span>/ <?=$row['satuan_produk']?></span>
                            <p><?= $row['nama_lengkap']?></p>
                        </div>
                        <div class="product-action">
                            <a href="<?= base_url(); ?>detail_produk/index/<?= $row['id_produk'] ?>" class="btn btn-primary w-100">
                                <span class="fa fa-plus"></span>
                                &nbsp;Detail
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>	
        </div>
    </div>
</section>

<?php $this->load->view('frontend/transaksi/modal_alamat') ?>
<?php $this->load->view('frontend/transaksi/modal_ongkir') ?>
<!-- Script For Core -->
<script defer src="<?php echo base_url('front/js/core.js') ?>"></script>

<!-- Script For Core -->
<?php $this->load->view('frontend/partials/footer'); ?>
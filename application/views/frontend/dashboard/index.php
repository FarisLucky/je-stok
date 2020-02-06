<?php $this->load->view('frontend/partials/header.php'); ?>
<!-- Load Header View -->
<link rel="stylesheet" type="text/css" href="<?= base_url('front/flickity/flickity.min.css') ?>">
<!-- Navigation -->

<section class="mt-3">
  <div class="container-md banner text-center">
    <div class="main-carousel" data-flickity='{ "wrapAround": true }'>
      <div class="carousel-cell">
        <img src="<?= base_url('front/header/banner2.jpg') ?>" alt="">
      </div>
      <div class="carousel-cell">
        <img src="<?= base_url('front/header/banner1.jpg') ?>" alt="">
      </div>
      <!-- <div class="carousel-cell">
        <img src="<?= base_url('front/header/banner3.jpg') ?>" alt="">
      </div> -->
    </div>
  </div>
</section>

<section id="homeContent">
  <div class="container content">
    <div class="content-item d-flex flex-column flex-lg-row">
      <div class="category">
        <h5>Kategori</h5>
        <div class="card home">
          <div class="card-body">
            <div class="row">
              <?php for ($i=1; $i <= 3 ; $i++) {
                echo '<div class="col-3 col-sm-3 col-lg-2 mb-2">
                <a href="#" class="cat-icon">
                <img src="'.base_url('front/img/apple-pie.svg') .'" alt="" class="d-block">
                <span>Makanan</span>
                </a>
                </div>
                <div class="col-3 col-sm-3 col-lg-2">
                <a href="#" class="cat-icon">
                <img src="'.base_url('front/img/cup.svg') .'" alt="" class="d-block">
                <span>Minuman</span>
                </a>
                </div>';
              } ?>
            </div>
          </div>
        </div>
      </div>
      <div class="promo">
        <h5>Promo Lainnya</h5>
        <div class="card home">
          <div class="card-body">
            <div class="d-flex flex-row">
              <div>
                <img src="<?= base_url('front/header/banner.jpg') ?>" class="img-promo">
              </div>
              <div>
                <img src="<?= base_url('front/header/banner.jpg') ?>" class="img-promo">
              </div>
              <div>
                <img src="<?= base_url('front/header/banner.jpg') ?>" class="img-promo">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="product-home">
      <div class="row">
        <div class="col-12">
          <div class="custom-title">
            <h5>Rekomendasi</h5>
          </div>
        </div>
      </div>
      <div class="row m-0 bg-product">
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-produk">
          <div class="card card-produk">
            <div class="card-header card-produk-header">
              <img src="<?= base_url('front/img/nabati.jpg') ?>" class="foto_produk">
            </div>
            <div class="card-body card-produk-body">
              <div class="product-desc">
                <span class="desc-title mb-1">Nama Produk</span>
                <span class="desc-price mb-1">Rp 500.000</span>
                <span>/5pcs</span>
                <p>PT. Gendong Indonesia</p>
              </div>
              <div class="product-action">
                <a href="#" class="btn btn-primary w-100">
                  <span class="fa fa-plus"></span>
                  &nbsp;Detail
                </a>
              </div>
            </div>
          </div>
        </div>
        <?php for($i =0 ; $i <= 10 ; $i++) { ?>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-produk">
          <div class="card card-produk">
            <div class="card-header card-produk-header">
              <img src="<?= base_url('front/img/hai.jpeg') ?>" class="foto_produk">
            </div>
            <div class="card-body card-produk-body">
              <div class="product-desc">
                <span class="desc-title mb-1">Nama Produk</span>
                <span class="desc-price mb-1">Rp 500.000</span>
                <span>/5pcs</span>
                <p>PT. Gendong Indonesia</p>
              </div>
              <?php $key = $data->row(); ?>
              <div class="product-action">
                <a href="<?= base_url(); ?>detail_produk/index/<?= $key->id_produk; ?>" class="btn btn-primary w-100">
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
  </div>
</section>

<script type="text/javascript" src="<?= base_url('front/flickity/flickity.pkgd.min.js') ?>" defer></script>
<?php $this->load->view('frontend/partials/footer.php'); ?>
<!-- Load Footer View -->
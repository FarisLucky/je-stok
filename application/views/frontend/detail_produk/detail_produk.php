<!-- detail css -->
<link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/detail/slick.css') ?>" />
<link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/detail/slick-theme.css') ?>" />
<link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/detail/nouislider.min.css') ?>" />
<!-- <link rel="stylesheet" href="<?= base_url('assets/css/detail/icon.min.css') ?>"> -->
<link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/detail/styles.css') ?>" />
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb-tree">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">All Categories</a></li>
                    <li><a href="#">xxxxxx</a></li>
                    <li><a href="#">Hxxxx</a></li>
                    <li class="active">XXXXXX</li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container-lg">
        <!-- row -->
        <div class="row">

            <div class="col-md-2  col-md-pull-5">
                <div id="product-imgs">
                    <div class="product-preview">
                        <img src="<?php echo base_url('upload/img/batik.jpg') ?>" alt="">
                    </div>

                    <div class="product-preview">
                        <img src="<?php echo base_url('upload/img/batik.jpg') ?>" alt="">
                    </div>

                    <div class="product-preview">
                        <img src="<?php echo base_url('upload/img/batik.jpg') ?>" alt="">
                    </div>

                    <div class="product-preview">
                        <img src="<?php echo base_url('upload/img/batik.jpg') ?>" alt="">
                    </div>
                </div>
            </div>

            <div class="col-md-5 col-md-push-2">
                <div id="product-main-img">
                    <div class="product-preview">
                        <img src="<?php echo base_url('upload/img/batik.jpg') ?>" alt="">
                    </div>

                    <div class="product-preview">
                        <img src="<?php echo base_url('upload/img/batik.jpg') ?>" alt="">
                    </div>

                    <div class="product-preview">
                        <img src="<?php echo base_url('upload/img/batik.jpg') ?>" alt="">
                    </div>

                    <div class="product-preview">
                        <img src="<?php echo base_url('upload/img/batik.jpg') ?>" alt="">
                    </div>
                </div>
            </div>
            <!-- /Product thumb imgs -->

            <!-- Product details -->
            <div class="col-md-5">
                <div class="product-details">
                    <h2 class="product-name"><?= ucfirst($data_produk['nama_produk']); ?></h2>
                    <div class="font-subtitle">
                        <div>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <a class="review-link" href="#">10 Review(s) | Add your review</a>
                        </div>
                        <div>
                            <h2 class="product-price">Rp <?= number_format($data_produk['harga'], 0, ',', '.'); ?>
                            </h2>
                        </div>
                        <p><?= ucfirst($data_produk['deskripsi']); ?></p>
                        <form action="" id="form_detail">
                            <input type="hidden" name="id_produk" value="<?= $data_produk['id_produk'] ?>">
                            <div class="d-flex flex-row justify-content-start add-to-cart">
                                <div class="label-stok padding-5-1">
                                    <span>Stok</span>
                                    <span><?= ucfirst($data_produk['stok']) ?></span>
                                </div>
                                <div class="qty-label padding-5-1">
                                    <label for="">Jumlah</label>
                                    <div class="input-number">
                                        <input type="number" min="1" value="1" name="jumlah" require>
                                        <span class="qty-up">+</span>
                                        <span class="qty-down">-</span>
                                    </div>
                                </div>
                                <div class="form-group padding-5-1">
                                    <label for="tipe_harga">Tipe </label>
                                    <select name="tipe_harga" id="tipe_harga" class="form-control form-control-sm"
                                        require>
                                        <?php foreach ($list_harga as $key => $value) { 
													echo "<option value='{$value['id_harga']}'>{$value['nama']} min({$value['min_pembelian']})</option>";
												} ?>
                                    </select>
                                    <div class="invalid-feedback">
                                    </div>
                                </div>
                            </div>
                            <div class="add-to-cart">
                                <button name="addCart" class="text-white add-to-cart-btn" id="add_cart"><i
                                        class="fa fa-shopping-cart"></i> add to cart</button>
                                <button type="button" class="btn btn-secondary mt-2" id="beli">beli sekarang</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /Product details -->

            <!-- produck tab -->
            <div class="col-md-12 mt-5 mb-5">
                <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                            role="tab" aria-controls="nav-home" aria-selected="true">Project Tab 1</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                            role="tab" aria-controls="nav-profile" aria-selected="false">Project Tab 2</a>
                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact"
                            role="tab" aria-controls="nav-contact" aria-selected="false">Project Tab 3</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                    </div>
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <table class="table" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Contest Name</th>
                                    <th>Date</th>
                                    <th>Award Position</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><a href="#">Work 1</a></td>
                                    <td>Doe</td>
                                    <td>john@example.com</td>
                                </tr>
                                <tr>
                                    <td><a href="#">Work 2</a></td>
                                    <td>Moe</td>
                                    <td>mary@example.com</td>
                                </tr>
                                <tr>
                                    <td><a href="#">Work 3</a></td>
                                    <td>Dooley</td>
                                    <td>july@example.com</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- /product tab -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- detail -->
<script src="<?php echo base_url('assets/js/detail/slick.min.js') ?>" defer="true"></script>
<script src="<?php echo base_url('assets/js/detail/nouislider.min.js') ?>" defer="true"></script>
<script src="<?php echo base_url('assets/js/detail/jquery.zoom.min.js') ?>" defer="true"></script>
<script src="<?php echo base_url('assets/js/detail/main.js') ?>" defer="true"></script>
<script src="<?php echo base_url('front/js/core_keranjang.js') ?>" defer="true"></script>

<?php $this->load->view('frontend/detail_produk/modal_detail') ?>
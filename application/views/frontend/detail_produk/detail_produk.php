  <!-- detail css -->
  <link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/detail/slick.css') ?>"/>
  <link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/detail/slick-theme.css') ?>"/>
  <link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/detail/nouislider.min.css') ?>"/>
  <link rel="stylesheet" href="<?= base_url('assets/css/detail/icon.min.css') ?>">
  <link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/detail/styles.css') ?>"/>


  <!-- Product tab -->
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!------ Include the above in your HEAD tag ---------->
  <!-- BREADCRUMB -->
  <?php
  $key = $data->row();
  ?>
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
    <div class="container">
      <!-- row -->
      <div class="row">

        <div class="col-md-2  col-md-pull-5">
          <div id="product-imgs">
            <div class="product-preview">
              <img src="<?php echo('upload/img/batik.jpg') ?>" alt="">
            </div>

            <div class="product-preview">
              <img src="<?php echo('upload/img/batik.jpg') ?>" alt="">
            </div>

            <div class="product-preview">
              <img src="<?php echo('upload/img/batik.jpg') ?>" alt="">
            </div>

            <div class="product-preview">
              <img src="<?php echo('upload/img/batik.jpg') ?>" alt="">
            </div>
          </div>
        </div>

        <div class="col-md-5 col-md-push-2">
          <div id="product-main-img">
            <div class="product-preview">
              <img src="<?php echo('upload/img/batik.jpg') ?>" alt="">
            </div>

            <div class="product-preview">
              <img src="<?php echo('upload/img/batik.jpg') ?>" alt="">
            </div>

            <div class="product-preview">
              <img src="<?php echo('upload/img/batik.jpg') ?>" alt="">
            </div>

            <div class="product-preview">
              <img src="<?php echo('upload/img/batik.jpg') ?>" alt="">
            </div>
          </div>
        </div>
        <!-- /Product thumb imgs -->

        <!-- Product details -->
        <div class="col-md-5">
          <div class="product-details">
            <h2 class="product-name"><?= ucfirst($key->nama_produk); ?></h2>
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
              <!-- <?= 'Rp. '.number_format($key->harga, 0, ',', '.'); ?> -->
              <h2 class="product-price">Rp 100000</h2>
              <span class="product-available"> <?= ucfirst('Stock  :  ' . $key->stok); ?></span>
            </div>
            <p><?= ucfirst($key->deskripsi); ?></p>

          <!--   <div class="product-options">
              <label>
                Size
                <select class="input-select">
                  <option value="0">X</option>
                </select>
              </label>

            </div>
          -->
          <div class="add-to-cart">
            <div class="qty-label">Qty
              <div class="input-number">
                <input type="number" min="1" value="1"name="jumlah">
                <span class="qty-up">+</span>
                <span class="qty-down">-</span>
              </div>
            </div>
            <button onclick="location.href='<?php echo base_url();?>cart/addCart/<?= $key->id_produk; ?>'" name="addCart" type="submit" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
          </div>

          <ul class="product-links">
            <li>Share:</li>
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="#"><i class="fa fa-envelope"></i></a></li>
          </ul>

        </div>
      </div>
      <!-- /Product details -->

      <!-- produck tab -->
      <div class="col-md-12 mt-5 mb-5">
        <nav>
          <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Project Tab 1</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Project Tab 2</a>
            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Project Tab 3</a>
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
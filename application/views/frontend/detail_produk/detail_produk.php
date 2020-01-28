<!-- detail css -->
<link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/detail/slick.css') ?>" />
<link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/detail/slick-theme.css') ?>" />
<link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/detail/nouislider.min.css') ?>" />
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
          <?php 
          $data_foto = $this->db->get_where('foto_produk',['id_produk'=>$data_produk['id_produk']])->result_array(); 
          foreach ($data_foto as $key => $value) {
            echo '<div class="product-preview">
              <img src="'.base_url("assets/uploads/img/foto_produk/".$value['foto']).'" alt="">
            </div>';
          }
          ?>
          <!-- <div class="product-preview">
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
          </div> -->
        </div>
      </div>

      <div class="col-md-5 col-md-push-2">
        <div id="product-main-img">
          <?php 
          foreach ($data_foto as $key => $value) {
            echo '<div class="product-preview">
              <img src="'.base_url("assets/uploads/img/foto_produk/".$value['foto']).'" alt="">
            </div>';
          }
          ?>
          <!-- <div class="product-preview">
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
          </div> -->
        </div>
      </div>
      <!-- /Product thumb imgs -->

      <!-- Product details -->
      <div class="col-md-5">
        <div class="product-details">
          <h2 class="product-name"><?= ucfirst($data_produk['nama_produk']); ?></h2>
          <div class="font-subtitle">
            <div class="mx-2">
              <div class="product-rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
              </div>
              <a class="review-link" href="#">10 Review(s) | Add your review</a>
            </div>
            <form action="" id="form_detail" class="pt-3">
              <input type="hidden" name="id_produk" value="<?= $data_produk['id_produk'] ?>">
              <div class="d-flex flex-row justify-content-start add-to-cart">
                <div class="label-stok padding-5-1">
                  <span>Stok</span>
                  <span><?= ucfirst($data_produk['stok']) ?></span>
                </div>
                <div class="qty-label padding-5-1">
                  <label for="">Jumlah</label>
                  <div class="input-number">
                    <input type="number" min="1" value="1" max="5" name="jumlah" require>
                    <span class="qty-up">+</span>
                    <span class="qty-down">-</span>
                  </div>
                </div>
                <div class="form-group padding-5-1">
                  <label for="tipe_harga">Tipe </label>
                  <select name="tipe_harga" id="tipe_harga" class="form-control form-control-sm" require>
                    <?php foreach ($list_harga as $key => $value) { 
                          echo "<option value='{$value['id_harga']}'>{$value['nama']} min({$value['min_pembelian']})</option>";
                    } ?>
                  </select>
                  <div class="invalid-feedback">
                  </div>
                </div>
              </div>
              <div class="table-prices">
                <table class="table table-borderless">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">Tipe</th>
                      <th scope="col">Harga</th>
                      <th scope="col">Min(beli)</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                                  foreach ($tab_harga as  $value) { ?>
                    <tr>
                      <td><?php echo $value->nama ?></td>
                      <td><?php echo $value->harga ?></td>
                      <td><?php echo $value->min_pembelian ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <div class="margin-top: 5px;">
                <div class="padding-left: 20px">
                  <div class="cart">
                    <button type="" class="btn btn-custom btn-lg addCart" style="font-size: 14px ;" id="add_cart"><i
                        class="fa fa-shopping-cart"></i> Masukkan
                      Keranjang</button>
                    <button type="" class="btn btn-primary btn-lg beli" style="font-size: 14px ;" id="beli">Beli
                      Sekarang</button>
                  </div>
                </div>

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
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-harga" role="tab"
              aria-controls="nav-home" aria-selected="true">Harga Produk</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-deskripsi" role="tab"
              aria-controls="nav-profile" aria-selected="false">Deskripsi</a>
            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-ulasan" role="tab"
              aria-controls="nav-contact" aria-selected="false">Ulasan</a>
          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-harga" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="container">
              <table class="table table-borderless">
                <thead>
                  <tr>
                    <th scope="col">Tipe Pembeli</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Minimum Pembelian</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                                  foreach ($tab_harga as  $value) { ?>
                  <tr>
                    <td><?php echo $value->nama ?></td>
                    <td><?php echo $value->harga ?></td>
                    <td><?php echo $value->min_pembelian ?></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="tab-pane fade" id="nav-deskripsi" role="tabpanel" aria-labelledby="nav-profile-tab">
            Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim
            occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit
            dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse
            consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod
            tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non
            adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occ
          </div>
          <div class="tab-pane fade" id="nav-ulasan" role="tabpanel" aria-labelledby="nav-contact-tab">
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
<!-- <script src="<?php echo base_url('assets/js/detail/jquery.zoom.min.js') ?>" defer="true"></script> -->
<script src="<?php echo base_url('assets/js/detail/main.js') ?>" defer="true"></script>
<script src="<?php echo base_url('front/js/core_detail.js') ?>" defer="true"></script>

<?php $this->load->view('frontend/detail_produk/modal_detail') ?>
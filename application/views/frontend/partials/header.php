<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>J-Stok || App</title>

  <!-- Font Awesome -->

  <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url('front/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
  <link href="<?php echo base_url('front/scss/custom.css') ?>" rel="stylesheet">
  <script type="text/javascript">
  const BASE_URL = '<?= base_url() ?>';
  </script>
</head>

<body id="page-top">
  <header id="header_jestok">
    <div class="container-desktop transition-05">
      <div class="header-top">
        <div class="top-menu">
          <div class="wrapper">
            <div class="left-section">
              <div class="item">
                <span>Home</span>
                <span>|</span>
              </div>
              <div class="item">
                <span>Blog</span>
                <span>|</span>
              </div>
            </div>
            <div class="right-section">
              <div class="item">
                <span>ikuti kami</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="header-btm">
        <div class="btm-logo">
          <a href="" class="logo">logo
          </a>
        </div>
        <div class="btm-kategori mr-4">
          <div class="kategori-btn">
            <img src="<?php echo base_url('front/img/list.svg') ?>" width="16px">
            <span class="mx-2">Kategori</span>
          </div>
          <div class="kategori-list dropdown-cs tsf-20">
            <div class="dropdown-cs-list">
              <ul class="dropdown-cs-item">
                <li class="item-list has-child">
                  <a href="" class="list-link">
                    <div class="box-item">
                      <span class="fa fa-adjust"></span>
                      <span class="ml-2">Menu</span>
                      <span class="fa fa-arrow-right ml-auto"></span>
                    </div>
                  </a>
                  <div class="dropdown-popup">
                    <ul class="dropdown-cs-item">
                      <li class="item-list has-child">
                        <a href="" class="list-link">
                          <div class="box-item">
                            <span class="fa fa-adjust"></span>
                            <span class="ml-2">Sub Menu</span>
                            <span class="fa fa-arrow-right ml-auto"></span>
                          </div>
                        </a>
                        <div class="dropdown-popup">
                          <ul class="dropdown-cs-item">
                            <li class="item-list">
                              <a href="" class="list-link">
                                <div class="box-item">
                                  <span class="fa fa-adjust"></span>
                                  <span class="ml-2">Kategori</span>
                                  <span class="fa fa-arrow-right ml-auto"></span>
                                </div>
                              </a>
                            </li>
                          </ul>
                        </div>
                      </li>
                      <li class="item-list has-child">
                        <a href="" class="list-link">
                          <div class="box-item">
                            <span class="fa fa-adjust"></span>
                            <span class="ml-2">Sub Menu</span>
                            <span class="fa fa-arrow-right ml-auto"></span>
                          </div>
                        </a>
                        <div class="dropdown-popup">
                          <ul class="dropdown-cs-item">
                            <li class="item-list">
                              <a href="" class="list-link">
                                <div class="box-item">
                                  <span class="fa fa-adjust"></span>
                                  <span class="ml-2">Kategori</span>
                                  <span class="fa fa-arrow-right ml-auto"></span>
                                </div>
                              </a>
                            </li>
                          </ul>
                        </div>
                      </li>
                      <li class="item-list has-child">
                        <a href="" class="list-link">
                          <div class="box-item">
                            <span class="fa fa-adjust"></span>
                            <span class="ml-2">Sub Menu</span>
                            <span class="fa fa-arrow-right ml-auto"></span>
                          </div>
                        </a>
                        <div class="dropdown-popup">
                          <ul class="dropdown-cs-item">
                            <li class="item-list">
                              <a href="" class="list-link">
                                <div class="box-item">
                                  <span class="fa fa-adjust"></span>
                                  <span class="ml-2">Kategori</span>
                                  <span class="fa fa-arrow-right ml-auto"></span>
                                </div>
                              </a>
                            </li>
                          </ul>
                        </div>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="item-list has-child">
                  <a href="" class="list-link">
                    <div class="box-item">
                      <span class="fa fa-adjust"></span>
                      <span class="ml-2">Menu</span>
                      <span class="fa fa-arrow-right ml-auto"></span>
                    </div>
                  </a>
                  <div class="dropdown-popup">
                    <ul class="dropdown-cs-item">
                      <li class="item-list has-child">
                        <a href="" class="list-link">
                          <div class="box-item">
                            <span class="fa fa-adjust"></span>
                            <span class="ml-2">Sub Menu</span>
                            <span class="fa fa-arrow-right ml-auto"></span>
                          </div>
                        </a>
                        <div class="dropdown-popup">
                          <ul class="dropdown-cs-item">
                            <li class="item-list">
                              <a href="" class="list-link">
                                <div class="box-item">
                                  <span class="fa fa-adjust"></span>
                                  <span class="ml-2">Kategori</span>
                                  <span class="fa fa-arrow-right ml-auto"></span>
                                </div>
                              </a>
                            </li>
                          </ul>
                        </div>
                      </li>
                    </ul>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="dropdown-cs dropdown-bg"></div>
        <div class="btm-search">
          <div class="search-box">
            <img src="<?php echo base_url('front/img/search.svg') ?>" width="20px">
            <input type="text" class="search-input" placeholder="Silahkan Cari Produk Anda">
            <button class="btn-stok btn-cari">
              <div class="purple-ripple">
                Cari
              </div>
            </button>
          </div>
        </div>
        <div class="btm-cart">
          <a href="" class="cart-item">
            <img src="<?php echo base_url('front/img/cart.svg') ?>" width="16px">
            <span class="mx-1">Keranjang</span>
          </a>
        </div>
        <div class="btm-core">
          <div class="core-form">
            <div class="form-item">
              <button class="btn-stok btn-login">
                <div class="purple-ripple">
                  Masuk
                </div>
              </button>
            </div>
            <div class="form-item mx-2">
              <button class="btn-stok btn-signup">
                <div class="purple-ripple">
                  Daftar
                </div>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
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
  <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Overlock&display=swap" rel="stylesheet">
  <link href="<?php echo base_url('front/css/main.css') ?>" rel="stylesheet">


  <script type="text/javascript">
  const BASE_URL = '<?= base_url() ?>';
  </script>
</head>

<body id="page-top">
  <div id="flash_data" data-success="<?= $this->session->flashdata('success') ?>"
    data-failed="<?= $this->session->flashdata('failed') ?>"></div>
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
          <a href="<?= base_url('') ?>" class="logo">logo
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
                  <a href="#" class="list-link">
                    <div class="box-item">
                      <span class="fa fa-adjust"></span>
                      <span class="ml-2">Menu</span>
                      <span class="fa fa-arrow-right ml-auto"></span>
                    </div>
                  </a>
                  <div class="dropdown-popup">
                    <ul class="dropdown-cs-item">
                      <li class="item-list has-child">
                        <a href="#" class="list-link">
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
                        <a href="#" class="list-link">
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
                        <a href="#" class="list-link">
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
                  <a href="#" class="list-link">
                    <div class="box-item">
                      <span class="fa fa-adjust"></span>
                      <span class="ml-2">Menu</span>
                      <span class="fa fa-arrow-right ml-auto"></span>
                    </div>
                  </a>
                  <div class="dropdown-popup">
                    <ul class="dropdown-cs-item">
                      <li class="item-list has-child">
                        <a href="#" class="list-link">
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
          <a href="<?= base_url('keranjang') ?>" class="cart-item">
            <img src="<?php echo base_url('front/img/cart.svg') ?>" width="16px">
            <span class="mx-1">Keranjang</span>
          </a>
        </div>
        <?php if (isset($_SESSION['id_user'])) {?>
        <div class="dropdown-show">
          <a href="" class="dropdown-toggle text-white" data-toggle="dropdown" dropdown-menu="dropdownMenuLink"
            aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i><span class="p-1">Nama</span></a>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item text-dark" id="profil" href="<?= base_url('profil/riwayattransaksi') ?>"><i
                class="fa fa-history">&nbspHistory</i></a>
            <a class="dropdown-item text-dark" id="profil" href="<?= base_url('profil') ?>"><i
                class="fa fa-user">&nbspProfil</i></a>
            <a class="dropdown-item text-dark" href="<?= base_url('auth/logout') ?>"><i
                class="fa fa-power-off">&nbspKeluar</i></a>
          </div>
        </div>
        <?php } else {?>
        <div class="btm-core">
          <div class="core-form">
            <div class="form-item">
              <a href="<?= base_url('auth') ?>" class="btn-stok btn-login">
                <div class="purple-ripple">
                  Masuk
                </div>
              </a>
            </div>
            <div class="form-item mx-2">
              <a href="<?= base_url('auth/register') ?>" class="btn-stok btn-signup">
                <div class="purple-ripple">
                  Daftar
                </div>
              </a>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </header>

  <div class="toast toast-custom d-none" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="true"
    data-delay="3000">
    <div class="toast-header">
      <span class="rounded mr-2 bg-primary"></span>
      <strong class="mr-auto">Info Penting !!</strong>
      <small>hide 3 detik</small>
      <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="toast-body">
      Hello, world! This is a toast message.
    </div>
  </div>
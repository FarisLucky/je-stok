
<?php $this->load->view('frontend/partials/header.php'); ?>
<!-- Load Header View -->
<link rel="stylesheet" type="text/css" href="<?= base_url('front/flickity/flickity.min.css') ?>">
<!-- Navigation -->

  <header class="mt-4">
    <div class="container banner text-center">
      <div class="carousel" data-flickity='{ "wrapAround": true }'>
        <div class="carousel-cell">
          <img src="<?= base_url('front/header/banner.jpg') ?>" alt="">
        </div>
        <div class="carousel-cell">
          <img src="<?= base_url('front/header/banner2.jpg') ?>" alt="">
        </div>
        <div class="carousel-cell">
          <img src="<?= base_url('front/header/banner3.jpg') ?>" alt="">
        </div>
      </div>
    </div>
  </header>

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
    </div>
  </section>
  <section id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>About this page</h2>
          <p class="lead">This is a great place to talk about your webpage. This template is purposefully unstyled so you can use it as a boilerplate or starting point for you own landing page designs! This template features:</p>
          <ul>
            <li>Clickable nav links that smooth scroll to page sections</li>
            <li>Responsive behavior when clicking nav links perfect for a one page website</li>
            <li>Bootstrap's scrollspy feature which highlights which section of the page you're on in the navbar</li>
            <li>Minimal custom CSS so you are free to explore your own unique design options</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section id="services" class="bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Services we offer</h2>
          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut optio velit inventore, expedita quo laboriosam possimus ea consequatur vitae, doloribus consequuntur ex. Nemo assumenda laborum vel, labore ut velit dignissimos.</p>
        </div>
      </div>
    </div>
  </section>

  <section id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Contact us</h2>
          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero odio fugiat voluptatem dolor, provident officiis, id iusto! Obcaecati incidunt, qui nihil beatae magnam et repudiandae ipsa exercitationem, in, quo totam.</p>
        </div>
      </div>
    </div>
  </section>

  <script type="text/javascript" src="<?= base_url('front/flickity/flickity.pkgd.min.js') ?>"></script>
<?php $this->load->view('frontend/partials/footer.php'); ?>
<!-- Load Footer View -->

<!-- CSS-->
<link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/profil/sidebar.css') ?>" />
<link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/profil/page.css') ?>" />

<?php $this->load->view('frontend/partials/header'); ?>
<div class="profil my-5">
  <div class="container-md">
    <div class="sidebar-nav-custom">
      <?php $this->load->view('frontend/profil/sidebar_component'); ?>
      <div class="right-sidebar">
        <div class="right-header">
          <h4>Daftar Pesanan</h4>
        </div>
        <div class="right-body">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link active" href="#belum_bayar" data-toggle="tab">Belum Bayar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#pengiriman" data-toggle="tab">Pengiriman</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#sudah_selesai" data-toggle="tab">Sudah Selesai</a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="belum_bayar" role="tabpanel" aria-labelledby="home-tab">
              <table class="table table-borderless">
                <thead>
                  <th>No</th>
                  <th>Tanggal Order</th>
                </thead>
              </table c>
            </div>
            <div class="tab-pane fade" id="pengiriman" role="tabpanel" aria-labelledby="profile-tab">Pengiriman</div>
            <div class="tab-pane fade" id="sudah_selesai" role="tabpanel" aria-labelledby="contact-tab">Sudah Selesai
            </div>
          </div>
        </div>
        <div class="right-footer"></div>
      </div>
    </div>
  </div>
</div>
<!-- Script For Core -->
<?php $this->load->view('frontend/partials/footer'); ?>
<!-- CSS-->
<link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/profil/sidebar.css') ?>" />
<link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/profil/page.css') ?>" />

<?php $this->load->view('frontend/partials/header'); ?>
<section class="position-relative my-5" id="profil">
  <div class="container-md">
    <!-- Header Title -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Profil User</h1>
    </div>
    <!-- !Header Title -->
    <!-- Button Insert -->
    <!-- Button Insert -->
    <!-- Table menu -->
    <div class="d-flex" id="wrapper">

      <?php $this->load->view('frontend/profil/sidebar_component'); ?>
      <!-- <div id="page-content-wrapper">
        <div class="album py-5 bg-light">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                  <img src="upload/img/KetuaHMJTI.png" width="320" height="200" class="img-rounded" alt="papuma">
                  <div class="card-body">
                    <p class="card-text">Ali Wajhah</p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-outline-secondary">Lihat Foto</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit Foto </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-8">
                <div class="card shadow mb-4">
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Biodata</h6>
                  </div>
                  <div class="card-body">
                    <div class="responsive">
                      <table class="table table-hover">
                        <tr>
                          <td>Nama</td>
                          <td>:</td>
                          <td>Ali Wajhah</td>
                        </tr>
                        <tr>
                          <td>Username</td>
                          <td>:</td>
                          <td>aliwajhah</td>
                        </tr>
                        <tr>
                          <td>Email</td>
                          <td>:</td>
                          <td>aliwajhah@gmail.com</td>
                        </tr>
                        <td>Telepon</td>
                        <td>:</td>
                        <td>087787869797979</td>
                        <td>
                          <a class="btn btn-outline-info"><span class="fa fa-edit"></span></a>
                        </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> -->

      <!-- wrapper-->
    </div>




    <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
    </script>

    <!-- Script For Core -->
    <?php $this->load->view('frontend/partials/footer'); ?>
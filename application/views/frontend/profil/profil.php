<?php $this->load->view('frontend/partials/header'); ?>
<!-- !Header Title -->
<!-- Button Insert -->
<!-- Button Insert -->
<!-- Table menu -->
<div class="profil my-5">
  <div class="container-md">
    <div class="sidebar-nav-custom">
      <?php $this->load->view('frontend/profil/sidebar_component'); ?>
      <div class="right-sidebar">
        <div class="right-header">
          <h4 class="profil">Profil</h4>
        </div>
        <div class="right-body profil">
          <div class="row">
            <div class="col-sm-6">
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="i_nama_lengkap" class="form-control">
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="i_username" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <div class="custom-control custom-radio">
                      <input type="radio" id="pria" name="i_jenis_kelamin" class="custom-control-input">
                      <label class="custom-control-label" for="pria">Pria</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" id="wanita" name="i_jenis_kelamin" class="custom-control-input">
                      <label class="custom-control-label" for="wanita">Wanita</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Telepon</label>
                    <input type="text" name="i_telepon" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="i_email" class="form-control">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="cover-image">
                <img src="./img/nabati.jpg" class="img-profile">
              </div>
            </div>
          </div>
          <div class="row row-btn">
            <button type="submit" class="btn btn-primary btn-simpan">Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Script For Core -->
<?php $this->load->view('frontend/partials/footer'); ?>
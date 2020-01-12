<!-- CSS-->
<?php $this->load->view('frontend/partials/header'); ?>
<div class="profil my-5">
  <div class="container-md">
    <div class="sidebar-nav-custom">
      <?php $this->load->view('frontend/profil/sidebar_component'); ?>
      <div class="right-sidebar ganti-password">
        <div class="right-header">
          <h4 class="profil">Ganti Kata Sandi</h4>
        </div>
        <div class="right-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Password Lama</label>
                <input type="text" name="i_password_lama" class="form-control">
              </div>
              <div class="form-group">
                <label>Password Baru</label>
                <input type="text" name="i_password_baru" class="form-control">
              </div>
              <div class="form-group">
                <label>Konfirmasi Password Baru</label>
                <input type="text" name="i_konfirmasi_password" class="form-control">
              </div>
            </div>
          </div>
          <div class="row-btn">
            <button type="submit" class="btn btn-primary btn-simpan">Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Script For Core -->
<?php $this->load->view('frontend/partials/footer'); ?>
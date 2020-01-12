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

          <form method="POST" href="<?= base_url('Profil/gantipassword'); ?>">
            <div class="row">
              <div class="col-md-6">
                <?= $this->session->flashdata('message'); ?>
                <div class="form-group">
                  <label>Password Lama</label>
                  <input type="password" name="password_lama" class="form-control">
                  <?= form_error('password_lama', '<small class = "text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                  <label>Password Baru</label>
                  <input type="password" name="password_baru1" class="form-control">
                  <?= form_error('password_baru1', '<small class = "text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                  <label>Konfirmasi Password Baru</label>
                  <input type="password" name="password_baru2" class="form-control">
                  <?= form_error('password_baru2', '<small class = "text-danger pl-3">', '</small>'); ?>
                </div>
              </div>
            </div>
            <div class="row-btn">
              <button type="submit" class="btn btn-primary btn-simpan">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Script For Core -->
<?php $this->load->view('frontend/partials/footer'); ?>
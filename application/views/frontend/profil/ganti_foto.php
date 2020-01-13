<!-- CSS-->
<?php $this->load->view('frontend/partials/header'); ?>
<div class="profil my-5">
  <div class="container-md">
    <div class="sidebar-nav-custom">
      <?php $this->load->view('frontend/profil/sidebar_component'); ?>
      <div class="right-sidebar ganti-password">
        <div class="right-header">
          <h4 class="profil">Ganti Profil</h4>
        </div>
        <div class="right-body">
          <form method="POST" action="<?= base_url('profil/coreganti'); ?>" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6">
                <?= $this->session->flashdata('message'); ?>
                <div class="form-group profil-image">
                  <?php if (empty($user['foto'])) { ?>
                  <img src="<?= base_url('assets/uploads/img/foto_customer/default.png') ?>" class="img-profile"
                    id="profil_img">
                  <?php } else { ?>
                  <img src="<?= base_url('assets/uploads/img/foto_customer/'.$user['foto']) ?>" class="img-profile"
                    id="profil_img">
                  <?php } ?>
                  <input type="file" name="ganti_foto" class="form-control">
                  <?= form_error('ganti_foto', '<small class = "text-danger pl-3">', '</small>'); ?>
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

<script src="<?= base_url('front/js/core_profil.js') ?>" defer></script>
<!-- Script For Core -->
<?php $this->load->view('frontend/partials/footer'); ?>
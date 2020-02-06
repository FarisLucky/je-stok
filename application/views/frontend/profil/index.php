<?php $this->load->view('frontend/partials/header'); ?>
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
          <form action="<?= base_url('Profil/profil'); ?>" method="POST">
            <?= $this->session->flashdata('message'); ?>
            <?php echo validation_errors('<div class="alert alert-warning">', '</div>'); ?>
            <div class="row">
              <div class="col-sm-6">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Nama Lengkap</label>
                      <input type="text" name="nama" class="form-control" value="<?= $user['nama_lengkap']; ?>">
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Username</label>
                      <input type="text" name="username" class="form-control" value="<?= $user['username']; ?>">
                    </div>
                    <div class="form-group">
                      <label>Jenis Kelamin</label>
                      <div class="custom-control custom-radio">
                        <input type="radio" name="jenis_kelamin" value="pria" <?php echo ($user['jenis_kelamin'] == 'pria' ? ' checked' : ''); ?>> Pria
                      </div>
                      <div class="custom-control custom-radio">
                        <input type="radio" name="jenis_kelamin" value="wanita" <?php echo ($user['jenis_kelamin'] == 'wanita' ? ' checked' : ''); ?>> Wanita
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Telepon</label>
                      <input type="text" name="telp" class="form-control" value="<?= $user['telp']; ?>">
                      <?= form_error('telp', '<small class = "text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input type="text" name="email" class="form-control" value="<?= $user['email']; ?>">
                      <?= form_error('email', '<small class = "text-danger pl-3">', '</small>'); ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="cover-image">
                  <?php if (empty($user['foto'])) { ?>
                    <img src="<?= base_url('assets/uploads/img/foto_customer/default.png') ?>" class="img-profile">
                  <?php } else { ?>
                    <img src="<?= base_url('assets/uploads/img/foto_customer/' . $user['foto']) ?>" class="img-profile">
                  <?php } ?>
                  <a href="<?= base_url('profil/ganti') ?>" class="btn btn-secondary mt-4 w-100">Ganti Profil</a>
                </div>
              </div>
            </div>
            <div class="row row-btn">
              <div class="col-sm-12">
                <button type="submit" class="btn btn-primary btn-simpan px-4">Simpan</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Script For Core -->
<?php $this->load->view('frontend/partials/footer'); ?>
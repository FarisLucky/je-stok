<?php $this->load->view('backend/partials/navbar.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Card Form Tambah -->
  <div class="card shadow">
    <div class="card-body">

      <!-- Ttile Form -->
      <div class="row">
        <div class="col-sm-12">
          <a href="<?= base_url('admin/profil') ?>" class="btn btn-sm btn-secondary float-right"><span
              class="fa fa-arrow-left"></span> Kembali</a>
        </div>
      </div>
      <hr>
      <!-- !Ttile Form -->

      <!-- Form Menu -->
      <div class="row">
        <div class="col-sm-12">
          <form action="<?= base_url('admin/profil/coreubah') ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="input_hidden" value="<?= $profil['id_perusahaan'] ?>">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="">Nama perusahaan</label>
                  <input type="text" name="i_nama_profil" class="form-control" value="<?= $profil['nama'] ?>">
                  <small class="text-danger"><?= form_error('i_nama_profil'); ?></small>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="">telepon</label>
                  <input type="text" name="i_telp_profil" class="form-control" value="<?= $profil['telp'] ?>">
                  <small class="text-danger"><?= form_error('i_telp_profil'); ?></small>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="">Alamat</label>
                  <input type="text" name="i_alamat_profil" class="form-control"
                    value="<?= $profil['alamat_lengkap'] ?>">
                  <small class="text-danger"><?= form_error('i_alamat_profil'); ?></small>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="">Provinsi</label>
                  <select name="i_provinsi_profil" class="form-control">
                    <?php foreach ($provinsi as $key => $value) {
                      $selected = $value['id_provinsi'] === $profil['id_provinsi'] ? 'selected' : '';
                      echo "<option value='{$value['id_provinsi']}' {$selected}>{$value['provinsi']}</option>";
                    } ?>
                  </select>
                  <small class="text-danger"><?= form_error('i_provinsi_profil'); ?></small>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="">Kota/Kabupaten</label>
                  <select name="i_kota_profil" class="form-control">
                    <?php foreach ($kabupaten as $key => $value) {
                      $selected = $value['id_kabupaten'] === $profil['id_kabupaten'] ? 'selected' : '';
                      echo "<option value='{$value['id_kabupaten']}' {$selected}>{$value['kabupaten']}</option>";
                    } ?>
                  </select>
                  <small class="text-danger"><?= form_error('i_kota_profil'); ?></small>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="">Kecamatan</label>
                  <select name="i_kecamatan_profil" class="form-control">
                    <?php foreach ($kecamatan as $key => $value) {
                      $selected = $value['id_kecamatan'] === $profil['id_kecamatan'] ? 'selected' : '';
                      echo "<option value='{$value['id_kecamatan']}' {$selected}>{$value['kecamatan']}</option>";
                    } ?>
                  </select>
                  <small class="text-danger"><?= form_error('i_kecamatan_profil'); ?></small>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="">Kode Pos</label>
                  <input type="text" name="i_kode_pos" class="form-control" value="<?= $profil['kode_pos'] ?>">
                  <small class="text-danger"><?= form_error('i_kode_pos'); ?></small>
                </div>
              </div>
            </div>

            <div class="form-group mt-5">
              <button type="submit" class="btn btn-success">Simpan</button>
              <button type="reset" class="btn btn-dark mx-2">Reset</button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
  <!-- /.container-fluid -->

  <script src="<?= base_url('front/js/core_profil.js') ?>" defer="true"></script>
  <?php $this->load->view('backend/partials/footer.php'); ?>
  <!-- Load Footer View -->
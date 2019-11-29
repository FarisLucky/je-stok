<?php $this->load->view('backend/partials/navbar.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
<title>Edit profil <?= $profil['foto'] ?></title>

  <!-- Card Form Tambah -->
  <div class="card shadow">
    <div class="card-body">

      <!-- Ttile Form -->
      <div class="row">
        <div class="col-sm-12">
          <a href="<?= base_url('admin/profil_supplier') ?>" class="btn btn-sm btn-secondary float-right"><span class="fa fa-arrow-left"></span> Kembali</a>
        </div>
      </div>
      <hr>
      <!-- !Ttile Form -->
      
 

      <!-- Form Menu -->
      <div class="row">
        <div class="col-sm-12">
          <form action="<?= base_url('admin/profil_supplier/coreubah') ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="input_hidden" value="<?= $profil['id_user'] ?>">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="">Nama </label>
                  <input type="text" name="i_nama_admin" class="form-control" value="<?= $profil['nama_lengkap'] ?>">
                  <small class="text-danger"><?= form_error('i_nama_admin'); ?></small>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="">Username</label>
                  <input type="text" name="i_username_admin" class="form-control" value="<?= $profil['username'] ?>">
                  <small class="text-danger"><?= form_error('i_username_admin'); ?></small>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="">Password</label>
                  <input type="password" name="i_password_admin" class="form-control" value="<?= $profil['password'] ?>">
                  <small class="text-danger"><?= form_error('i_password_admin'); ?></small>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="">Telepon</label>
                  <input type="text" name="i_telepon_admin" class="form-control" value="<?= $profil['telp'] ?>">
                  <small class="text-danger"><?= form_error('i_telepon_admin'); ?></small>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="">Email</label>
                  <input type="text" name="i_email_admin" class="form-control" value="<?= $profil['email'] ?>">
                  <small class="text-danger"><?= form_error('i_email_admin'); ?></small>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                
                  <label for="">Photo</label>
                  <input type="file" name="i_foto_admin" class="form-control" value="">
                  <img style="width:100px;height:100px;" src="<?php echo base_url('upload/img/'.$profil['foto']) ?>">
                  <small class="text-danger"><?= form_error('i_foto_admin'); ?></small>
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

<?php $this->load->view('backend/partials/footer.php'); ?>
<!-- Load Footer View -->
<?php $this->load->view('backend/partials/navbar.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Card Form Tambah -->
  <div class="card shadow">
    <div class="card-body">

      <!-- Ttile Form -->
      <div class="row">
        <div class="col-sm-12">
          <a href="<?= base_url('admin/menu') ?>" class="btn btn-sm btn-secondary float-right"><span class="fa fa-arrow-left"></span> Kembali</a>
        </div>
      </div>
      <hr>
      <!-- !Ttile Form -->

      <!-- Form Menu -->
      <div class="row">
        <div class="col-sm-12">
          <form action="<?= base_url('admin/menu/coreubah') ?>" method="POST">
            <input type="hidden" name="input_hidden" value="<?= $menu['id_menu'] ?>">
            <div class="form-group">
              <label for="">Nama Menu Grup</label>
              <input type="text" name="i_nama_menu" class="form-control" value="<?= $menu['nama'] ?>">
              <small class="text-danger"><?= form_error('i_nama_menu'); ?></small>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-success">Simpan</button>
              <button type="reset" class="btn btn-dark mx-2">Reset</button>
            </div>
          </form>
        </div>
      </div>
      <!-- !Form Menu -->

    </div>
  </div>
</div>
<!-- /.container-fluid -->


<?php $this->load->view('backend/partials/footer.php'); ?>
<!-- Load Footer View -->
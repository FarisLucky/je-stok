<?php $this->load->view('backend/partials/navbar.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Card Form Tambah -->
  <div class="card shadow">
    <div class="card-body">

      <!-- Ttile Form -->
      <div class="row">
        <div class="col-sm-12">
          <a href="<?= base_url('admin/kategori') ?>" class="btn btn-sm btn-secondary float-right"><span class="fa fa-arrow-left"></span> Kembali</a>
        </div>
      </div>
      <hr>
      <!-- !Ttile Form -->

      <!-- Form Menu -->
      <div class="row">
        <div class="col-sm-12">
          <form action="<?= base_url('admin/kategori/coretambah') ?>" method="POST">
            <div class="form-group">
                <div class="form-group">
                  <label for="">Nama Sub Menu</label>
                  <select name="i_sub_menu" id="i_sub_menu" class="form-control">
                    <?php foreach ($sub_menu as $key => $value) : ?>
                      <option value="<?= $value['id_sub_menu'] ?>"><?= $value['nama']  ?></option>
                    <?php endforeach; ?>
                  </select>
                  <small class="text-danger"><?= form_error('i_sub_menu'); ?></small>
                </div>
                <label for="">Nama Kategori Grup</label>
              <input type="text" name="i_nama_kategori" class="form-control" value="<?= set_value('i_nama_kategori') ?>">
              <small class="text-danger"><?= form_error('i_nama_kategori'); ?></small>
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
<?php $this->load->view('backend/partials/navbar.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Card Form Tambah -->
  <div class="card shadow">
    <div class="card-body">

      <!-- Ttile Form -->
      <div class="row">
        <div class="col-sm-12">
          <a href="<?= base_url('admin/produk') ?>" class="btn btn-sm btn-secondary float-right"><span class="fa fa-arrow-left"></span> Kembali</a>
        </div>
      </div>
      <hr>
      <!-- !Ttile Form -->

      <!-- Form Menu -->
      <div class="row">
        <div class="col-sm-12">
          <form action="<?= base_url('admin/produk/coretambah') ?>" method="POST" enctype="multipart/form-data">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="">Nama Produk</label>
                  <input type="text" name="i_nama_produk" class="form-control" value="<?= set_value('i_nama_produk') ?>">
                  <small class="text-danger"><?= form_error('i_nama_produk'); ?></small>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="">Nama Supplier</label>
                  <select name="i_supplier_produk" class="form-control" id="supplier">
                    <option value=""> -- Pilih Supplier -- </option>
                    <?php foreach ($supplier as $temp) { ?>
                      <option value="<?php echo $temp->id_user ?>"><?php echo $temp->nama_lengkap ?></option>
                    <?php } ?>
                  </select>
                  <small class="text-danger"><?= form_error('i_supplier_produk'); ?></small>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="">Stok</label>
                  <input type="number" name="i_stok_produk" class="form-control" value="<?= set_value('i_stok_produk') ?>">
                  <small class="text-danger"><?= form_error('i_stok_produk'); ?></small>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="">Satuan</label>
                  <input type="text" name="i_satuan_produk" class="form-control" value="<?= set_value('i_satuan_produk') ?>">
                  <small class="text-danger"><?= form_error('i_satuan_produk'); ?></small>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3">
                <div class="form-group">
                  <label for="">Harga <small class="text-danger"></small></label>
                  <input type="number" name="i_harga_produk" class="form-control" value="<?= set_value('i_harga_produk') ?>">
                  <small class="text-danger"><?= form_error('i_harga_produk'); ?></small>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label for="">Berat (gram)</label>
                  <input type="number" name="i_berat_produk" class="form-control" value="<?= set_value('i_berat_produk') ?>">
                  <small class="text-danger"><?= form_error('i_berat_produk'); ?></small>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="">Expired Date <small class="text-danger">boleh dikosongi</small></label>
                  <input type="date" name="i_expired_produk" class="form-control" value="<?= set_value('i_expired_produk') ?>">
                  <small class="text-danger"><?= form_error('i_expired_produk'); ?></small>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="">Deskripsi</label>
              <textarea name="i_deskripsi_produk" cols="20" rows="5" class="form-control"><?= set_value('i_deskripsi_produk') ?></textarea>
              <small class="text-danger"><?= form_error('i_deskripsi_produk'); ?></small>
            </div>
            <div class="form-group mt-5">
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
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
          <form action="<?= base_url('admin/produk/coreubah') ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="input_hidden" value="<?= $produk['id_produk'] ?>">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="">Nama Produk</label>
                  <input type="text" name="i_nama_produk" class="form-control" value="<?= $produk['nama_produk'] ?>" required>
                  <small class="text-danger"><?= form_error('i_nama_produk'); ?></small>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="">Nama Supplier</label>
                  <select name="i_supplier_produk" id="id_user" class="form-control">
                    <option value="" selected disabled> -- Pilih Supplier -- </option>
                    <?php foreach ($supplier as $temp) { ?>
                      <option value="<?php echo $temp->id_user ?>"
                        <?php if($produk['id_user'] == $temp->id_user){ echo "selected"; } ?>>
                        <?php echo $temp->nama_lengkap ?></option>
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
                  <input type="text" name="i_stok_produk" class="form-control" value="<?= $produk['stok'] ?>" required>
                  <small class="text-danger"><?= form_error('i_stok_produk'); ?></small>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="">Satuan</label>
                  <input type="text" name="i_satuan_produk" class="form-control" value="<?= $produk['satuan_produk'] ?>" required>
                  <small class="text-danger"><?= form_error('i_satuan_produk'); ?></small>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3">
                <div class="form-group">
                  <label for="">Harga <small class="text-danger"></small></label>
                  <input type="number" name="i_harga_produk" class="form-control" value="<?= $produk['harga'] ?>" required>
                  <small class="text-danger"><?= form_error('i_harga_produk'); ?></small>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label for="">Berat (gram)</label>
                  <input type="text" name="i_berat_produk" class="form-control" value="<?= $produk['berat'] ?>" required>
                  <small class="text-danger"><?= form_error('i_berat_produk'); ?></small>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="">Expired Date <small class="text-produk">boleh dikosongi</small></label>
                  <input type="date" name="i_expired_produk" class="form-control" value="<?= $produk['expired_date'] ?>">
                  <small class="text-danger"><?= form_error('i_expired_produk'); ?></small>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="">Deskripsi</label>
              <textarea name="i_deskripsi_produk" cols="20" rows="5" class="form-control" required><?= $produk['deskripsi'] ?></textarea>
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

      <hr>
      <div class="card shadow border-left-primary">
        <div class="card-body">
          <div class="row">
            <div class="col-sm-12">
              <h3>Foto Produk</h3>
              <button class="btn btn-sm btn-primary float-right" onclick="modal('#modal_id','<?= $produk['id_produk'] ?>')"><span class="fa fa-plus-circle"></span> Tambah</button>
            </div>
          </div>
          <!-- Table Foto -->
          <div class="row pt-3">
            <div class="col-sm-12">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                  </thead>
                  <tbody>
                    <?php $no = 1;
                    if (empty($foto)) {
                      echo "<tr><td colspan='100%' class='text-center'>Data Kosong</td></tr>";
                    }
                    foreach ($foto as $key => $value) { ?>
                      <tr>
                        <td><?= $no ?></td>
                        <td>
                          <img><a href="<?= base_url('assets/uploads/img/foto_produk/' . $value['foto']) ?>" data-lightbox="data<?= $value['id_foto'] ?>"><img src="<?= base_url('assets/uploads/img/foto_produk/' . $value['foto']) ?>" width="100px"></a></img>
                        </td>
                        <td>
                          <button class="btn btn-sm btn-info modal-edit" data-id="<?= $value['id_foto'] ?>"><span class="fa fa-edit"></span></button>
                          <button class="btn btn-sm btn-danger" onclick="deleteData('<?= base_url('admin/produk/hapusfoto/' . $value['id_foto']) ?>','Hapus Data')"><span class="fa fa-trash"></span></button>
                        </td>
                      </tr>
                    <?php $no++;
                    } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- !Table Foto -->
    </div>
  </div>
</div>
<!-- /.container-fluid -->

<div class="modal fade" id="modal_id">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Foto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('admin/produk/uploadfoto/') ?>" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="input_hidden">
          <div class="form-group">
            <label for="">Upload foto</label>
            <img class="d-block" src="" id="review_foto" width="300px">
            <input type="file" name="upload_foto" class="form-control form-control-file" onchange="readURL(this,'#review_foto')">
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-success">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('backend/partials/footer.php'); ?>
<!-- Load Footer View -->
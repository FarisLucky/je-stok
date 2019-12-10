<?php $this->load->view('backend/partials/navbar.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Header Title -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?=$title;?></h1>
  </div>
  
  <!-- Table menu -->
  <div class="row">
    <div class="col-lg-12">
      <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Tabel Harga Jual</h6>
        </div>
        <!-- <h6><?php echo $produk["id_produk"] ?></h6><br> -->
        <h6 style="margin-left: 20px; margin-top: 20px">Nama Produk : <?= $produk['nama_produk'] ?></h6><br>
        <h6 style="margin-left: 20px; margin-top: 10px">Kategori : </h6><br>
        <h6 style="margin-left: 20px; margin-top: 10px">Satuan : <?= $produk['satuan_produk'] ?></h6><br>
        <h6 style="margin-left: 20px; margin-top: 10px">Stok : <?= $produk['stok'] ?></h6><br>

        <div class="row my-1">
          <div class="col-sm-12">
            <a style="margin-right: 20px" href="" data-toggle="modal" data-target="#detailModal" class="btn btn-primary float-right"><span class="fa fa-plus"></span> Tambah Harga Jual</a>
          </div>
        </div>
        <div class="card-body">
          <div class="responsive">
            <table class="table table-hover">
              <thead class="table-primary">
                <th>No</th>
                <th>Jenis Pembeli</th>
                <th>Minimal beli</th>
                <th>Harga</th>
                <th>Aksi</th>
              </thead>
              <tbody>
               <?php $no = 1; ?>
                <?php foreach ($harga as $row) { ?>
                  <tr>
                    <td><?= $no; ?></td>
                    <td><?= $row["nama"] ?></td>
                    <td><?= $row["min_pembelian"] ?></td>
                    <td><?= $row["harga"] ?></td>
                    <td>
                      <a href="<?= base_url('admin/produk/ubah/' . $row['id_produk']) ?>" class="btn btn-outline-info"><span class="fa fa-edit"></span></a>
                      <button class="btn btn-outline-danger mx-2" onclick="deleteData('<?= base_url('admin/produk/hapus/' . $row['id_produk']) ?>','Hapus')"><span class="fa fa-trash"></span></button>
                    </td>
                  </tr>
                <?php $no++;
                } ?>
              </tbody>
            </table>
          </div>
          <div class="row justify-content-center">
            <nav class="mt-3">
              <?php echo $this->pagination->create_links(); ?>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- !Table Menu -->
</div>
<!-- /.container-fluid -->

<!--Modal Tambah Harga Jual-->
  <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Harga Barang</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form class="form-horizontal" action="<?php echo base_url('admin/Harga_Jual/tambahHargaJual')?>" method="post" enctype="multipart/form-data" role="form">
        <div class="modal-body">
          <div class="form-group">
              <label class="col-lg-1 col-sm-1 control-label">Jenis_Pembeli</label>
              <div class="col-lg-10">
                    <select class="form-control" name="id_tipe" required>
                      <option value="" selected disabled>Silahkan Pilih</option>
                      <?php foreach ($tipe_pembeli as $row) :?>
                        <option value="<?=$row->id_tipe; ?>"><?=$row->nama; ?></option>
                      <?php endforeach; ?>
                    </select>
              </div>
          </div>
          <div class="form-group">
              <label class="col-lg-2 col-sm-2 control-label">Minimal_Beli</label>
              <div class="col-lg-10">
                <input type="number" class="form-control" name="min_pembelian" required>
              </div>
          </div>
          <div class="form-group">
              <label class="col-lg-2 col-sm-2 control-label">Harga</label>
              <div class="col-lg-10">
                  <input type="number" class="form-control" name="harga" required>
              </div>
          </div>
          <div class="form-group">
              <div class="col-lg-10">
                <input type="hidden" class="form-control" value="<?=$produk["id_produk"]?>" name="id_produk">
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" type="submit">Simpan</button>
        </div>
      </form>
      </div>
    </div>
  </div>

<?php $this->load->view('backend/partials/footer.php'); ?>
<!-- Load Footer View -->
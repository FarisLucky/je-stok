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
          <h6 class="m-0 font-weight-bold text-primary"><?=$title;?></h6>
        </div>
        <div class="card-body">
          <div class="responsive">
            <table class="table table-hover">
              <thead class="table-primary">
                <th>No</th>
                <th>Nama Produk</th>
                <th>Stok</th>
                <th>Terjual</th>
                <th>Rupiah</th>
              </thead>
              <tbody>
               <!-- <?php $no = 1; ?>
                <?php foreach ($harga as $row) { ?>
                  <tr>
                    <td><?= $no; ?></td>
                    <td><?= $row["nama"] ?></td>
                    <td><?= $row["min_pembelian"] ?></td>
                    <td><?= $row["harga"] ?></td>
                    <td></td>
                    <td>
                      <a href="<?= base_url('admin/produk/ubah/' . $row['id_produk']) ?>" class="btn btn-outline-info"><span class="fa fa-edit"></span></a>
                      <button class="btn btn-outline-danger mx-2" onclick="deleteData('<?= base_url('admin/produk/hapus/' . $row['id_produk']) ?>','Hapus')"><span class="fa fa-trash"></span></button>
                    </td>
                  </tr>
                <?php $no++;
                } ?> -->
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

<?php $this->load->view('backend/partials/footer.php'); ?>
<!-- Load Footer View -->
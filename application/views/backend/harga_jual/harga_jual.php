<?php $this->load->view('backend/partials/navbar.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Header Title -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?=$title?></h1>
  </div>
  <!-- !Header Title -->
  <!-- Button Insert -->
  <!-- Table menu -->          
  <div class="row">
    <div class="col-lg-12">
       <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tabel Harga Jual</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead class="table-primary">
                <th>No</th>
                <th>Nama Produk</th>
                <th>Stok</th>
                <th>Berat</th>
                <th>Expired Date</th>
                <th>Aksi</th>
              </thead>
              <tbody>
                <?php $no = 1 + $row;
                foreach ($produk as $key => $value) { ?>
                  <tr>
                    <td><?= $no ?></td>
                    <td><?= $value['nama_produk'] ?></td>
                    <td><?= $value['stok'] . ' ' . $value['satuan_produk'] ?></td>
                    <td><?= $value['berat'] . ' ' . $value['satuan_berat'] ?></td>
                    <td><?= date($value['expired_date'], strtotime($value['berat'])) ?></td>
                    <td>
                      <a href="<?= base_url('admin/Harga_Jual/tampilHargaJual/' . $value['id_produk']) ?>" class="btn btn-outline-info"><span class="fa fa-edit"> Detail</span></a>
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

<?php $this->load->view('backend/partials/footer.php'); ?>
<!-- Load Footer View -->
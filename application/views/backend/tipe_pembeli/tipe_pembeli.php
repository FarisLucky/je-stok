<?php $this->load->view('backend/partials/navbar.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Header Title -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?=$title?></h1>
  </div>
  <!-- !Header Title -->
  <!-- Button Insert -->
  <div class="row my-4">
    <div class="col-sm-12">
      <a href="<?= base_url('admin/menu/tambah') ?>" class="btn btn-sm btn-primary float-right"><span class="fa fa-plus"></span> Tambah</a>
    </div>
  </div>
  <!-- Button Insert -->
  <!-- Table menu -->
  <div class="row">
    <div class="col-lg-12">
      <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Table Tipe Pembeli</h6>
        </div>
        <div class="card-body">
          <div class="responsive">
            <table class="table table-hover">
              <thead class="table-primary">
                <th>No</th>
                <th>Tipe Pembeli</th>
                <th>Aksi</th>
              </thead>
              <tbody>
                <?php $no = 1;
                foreach ($tipe_pembeli as $key) { ?>
                  <tr>
                    <td><?= $no ?></td>
                    <td><?= $key['nama'] ?></td>
                    <td>
                      <a href="<?= base_url('admin/menu/ubah/' . $key['id_tipe']) ?>" class="btn btn-outline-info"><span class="fa fa-edit"></span></a>
                      <button class="btn btn-outline-danger mx-2" onclick="deleteData('<?= base_url('admin/menu/hapus/' . $key['id_tipe']) ?>','Hapus')"><span class="fa fa-trash"></span></button>
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
  <!-- !Table Menu -->
</div>
<!-- /.container-fluid -->


<?php $this->load->view('backend/partials/footer.php'); ?>
<!-- Load Footer View -->
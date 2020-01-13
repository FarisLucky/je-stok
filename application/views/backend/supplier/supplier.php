<?php $this->load->view('backend/partials/navbar.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Header Title -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">supplier</h1>
  </div>
 
  <div class="row my-4">
    <div class="col-sm-12">
      <a href="<?= base_url('admin/supplier/add') ?>" class="btn btn-sm btn-primary float-right"><span class="fa fa-plus"></span> Tambah</a>
    </div>
    <?php if ($this->session->flashdata('sukses')) : ?>
            <div class="col-md-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">Data Supplier <strong>berhasil</strong> <?php echo $this->session->flashdata('sukses'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('edit')) : ?>
            <div class="col-md-12">
                <div class="alert alert-warning alert-dismissible fade show" role="alert">Data Supplier <strong>berhasil</strong> <?php echo $this->session->flashdata('edit'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('hapus')) : ?>
            <div class="col-md-12">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">Data Supplier <strong>berhasil</strong> <?php echo $this->session->flashdata('hapus'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        <?php endif; ?>
  </div>
  <!-- Button Insert -->
  <!-- Table menu -->
  <div class="row">
    <div class="col-lg-12">
      <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Table supplier</h6>
        </div>
        <div class="card-body">
          <div class="responsive">
            <table class="table table-hover">
              <thead class="table-primary">
                <th>#</th>
                <th>Nama Supplier</th>
                <th>Username</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Aksi</th>
              </thead>
              <tbody>
                <?php $no = 1 + $row;
                foreach ($user as $key => $value) { ?>
                  <tr>
                    <td><?= $no ?></td>
                    <td><?= $value['nama_lengkap'] ?></td>
                    <td><?= $value['username'] ?></td>
                    <td><?= $value['email'] ?></td>
                    <td><?= $value['telp'] ?></td>
                    <td>


                      <a href="<?= base_url('admin/supplier/ubah/' . $value['id_user']) ?>" class="btn btn-outline-info"><span class="fa fa-edit"></span></a>
                      <button class="btn btn-outline-danger mx-2" onclick="deleteData('<?= base_url('admin/supplier/hapus/' . $value['id_user']) ?>','Hapus')"><span class="fa fa-trash"></span></button>

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
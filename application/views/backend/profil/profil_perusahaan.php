<?php $this->load->view('backend/partials/navbar.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Header Title -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Profil</h1>
  </div>
  <!-- !Header Title -->
  <!-- Button Insert -->
  <!-- Button Insert -->
  <!-- Table menu -->
  <div class="row">
    <div class="col-lg-12">
      <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Data Profil</h6>
        </div>
        <div class="card-body">
          <div class="responsive">
          <table class="table table-hover">
              <thead class="table-primary">
                <th>No</th>
                <th>Nama</th>
                <th>Telepon</th>
                <th>Alamat Lengkap</th>
                <th>Provinsi</th>
                <th>Kota</th>
                <th>Kecamatan</th>
                <th>Kode pos</th>
              </thead>
              <tbody>
                <?php $no = 1;
                foreach ($profil as $key => $value) { ?>
                  <tr>
                    <td><?= $no ?></td>
                    <td><?= $value['nama'] ?></td>
                    <td><?= $value['telp'] ?></td>
                    <td><?= $value['alamat_lengkap'] ?></td>
                    <td><?= $value['id_provinsi'] ?></td>
                    <td><?= $value['id_kota'] ?></td>
                    <td><?= $value['id_kecamatan'] ?></td>
                    <td><?= $value['kode_pos'] ?></td>
                    <td>
                      <a href="<?= base_url('admin/profil/ubah/' . $value['id_perusahaan']) ?>" class="btn btn-outline-info"><span class="fa fa-edit"></span></a>
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
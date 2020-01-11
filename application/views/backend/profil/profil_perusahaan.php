<?php $this->load->view('backend/partials/navbar.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Header Title -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Profil Perusahaan</h1>
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
              <tr>
                <td>Nama</td>
                <td>:</td>
                <td><?php echo $profil['nama']; ?></td>
              </tr>
              <tr>
                <td>Telepon</td>
                <td>:</td>
                <td><?php echo $profil['telp']; ?></td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><?php echo $profil['alamat_lengkap']; ?></td>
              </tr>
              <tr>
                <td>Provinsi</td>
                <td>:</td>
                <td><?php echo $profil['provinsi']; ?></td>
              </tr>
              <tr>
                <td>Kota / Kabupaten</td>
                <td>:</td>
                <td><?php echo $profil['kabupaten']; ?></td>
              </tr>
              <tr>
                <td>Kecamatan</td>
                <td>:</td>
                <td><?php echo $profil['kecamatan']; ?></td>
              </tr>
              <tr>
                <td>Kode Pos</td>
                <td>:</td>
                <td><?php echo $profil['kode_pos']; ?></td>
                <td>
                  <a href="<?= base_url('admin/profil/ubah/' . $profil['id_perusahaan']) ?>"
                    class="btn btn-outline-info"><span class="fa fa-edit"></span></a>
                </td>
              </tr>
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
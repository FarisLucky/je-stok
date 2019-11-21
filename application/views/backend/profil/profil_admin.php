<?php $this->load->view('backend/partials/navbar.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Header Title -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Profil Admin</h1>
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
              <!-- <thead class="table-primary">
                <th>No</th>
                <th>Nama</th>
                <th>Telepon</th>
                <th>Alamat Lengkap</th>
                <th>Provinsi</th>
                <th>Kota</th>
                <th>Kecamatan</th>
                <th>Kode pos</th>
              </thead>
              <tbody> -->
                <?php 
                foreach ($profil as $key => $value) {
                $nama=$value['nama_lengkap'];
                $username=$value['username'];
                $foto=$value['foto'];
                $email=$value['email'];
                $telepon=$value['telp'];
                
               
                 
               
                } ?>
                <tr>
                  <td >Nama</td>
                  <td >:</td>
                  <td ><?php echo $nama; ?></td>
                </tr>
                <tr>
                  <td >Username</td>
                  <td >:</td>
                  <td ><?php echo $username; ?></td>
               </tr>
               <tr>
                  <td >Foto</td>
                  <td >:</td>
                  <td ><img style="width:100px;height:100px;" src="<?php echo base_url()."upload/img/".$foto ?>"></td>
               </tr>
               <tr>
                  <td >Email</td>
                  <td >:</td>
                  <td ><?php echo $email; ?></td>
               </tr>
                  <td >Telepon</td>
                  <td >:</td>
                  <td ><?php echo $telepon; ?></td>
                  <td>
                      <a href="<?= base_url('admin/profil_admin/ubah/' . $value['id_user']) ?>" class="btn btn-outline-info"><span class="fa fa-edit"></span></a>
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
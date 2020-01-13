<?php $this->load->view('backend/partials/navbar.php'); 
$key=>

?>

<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Header Title -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">fed Admin</h1>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Data fed</h6>
        </div>
        <div class="card-body">
          <div class="responsive">
            <table class="table table-hover">

              <tr>
                <td >Nama Produk</td>
                <td >:</td>
                <td ><?php echo $fed['nama_produk']; ?></td>
              </tr>
              <tr>
                <td >Id Order</td>
                <td >:</td>
                <td ><?php echo $fed['id_order']; ?></td>
              </tr>
              <tr>
                <td >Rating</td>
                <td >:</td>
                <td ><?php echo $fed['rating']; ?></td>
                 
              </tr>
              <tr>
                <td >deskripsi</td>
                <td >:</td>
                <td >  <?php echo $fed['deskripsi']; ?></td>
              </tr>
              <tr>
                <td >foto</td>
                <td >:</td>
                <td > <img style="width:100px;height:100px;" src="<?php echo base_url('upload/img/'.$fed['foto']) ?>"></td>

              </tr>

              <td>
                <a href="<?= base_url('admin/fed_admin/ubah/' . $fed['id_user']) ?>" class="btn btn-outline-info"><span class="fa fa-edit"></span></a>
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
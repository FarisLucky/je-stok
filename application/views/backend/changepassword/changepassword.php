<?php $this->load->view('backend/partials/navbar.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Header Title -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ganti Password</h1>
    </div>
    <!-- !Header Title -->
    <!-- Button Insert -->
    <!-- <div class="row my-4">
    <div class="col-sm-12">
      <a href="base_url('admin/customer/tambah')" class="btn btn-sm btn-primary float-right"><span class="fa fa-plus"></span> Tambah</a>
    </div>
  </div> -->
    <!-- Button Insert -->
    <!-- Table menu -->
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <?= $this->session->flashdata('message'); ?>
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" href="<?= base_url("admin/changepassword"); ?>" method="post">
                        <div class="form-group">
                            <label for="password_lama" class="control-label col-md col-sm col-xs-12">Password Lama</label>
                            <div class="col-md col-sm col-xs-12">
                                <input class="form-control" placeholder="Enter Password Lama" name="password_lama" id="password_lama" type="password">
                            </div>
                            <?= form_error('password_lama', '<small class = "text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="password_baru1" class="control-label col-md col-sm col-xs-12">Password Baru</label>
                            <div class="col-md col-sm col-xs-12">
                                <input class="form-control" placeholder="Enter Password Baru" name="password_baru1" id="password_baru1" type="password">
                            </div>
                            <?= form_error('password_baru1', '<small class = "text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="password_baru2" class="control-label col-md col-sm col-xs-12">Konfirmasi Password Baru</label>
                            <div class="col-md col-sm col-xs-12">
                                <input class="form-control" placeholder="Konfirmasi Password" name="password_baru2" id="password_baru2" type="password">
                            </div>
                            <?= form_error('password_baru2', '<small class = "text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <div class="col-md col-sm col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-success float-right" class="btn btn-info pull-left">Update Data</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- !Table Menu -->
</div>
<!-- /.container-fluid -->


<?php $this->load->view('backend/partials/footer.php'); ?>
<!-- Load Footer View -->
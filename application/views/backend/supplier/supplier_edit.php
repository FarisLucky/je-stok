

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Card Form Tambah -->
  <div class="card shadow">
    <div class="card-body">

     <!-- Ttile Form -->
     <div class="row">
      <div class="col-sm-12">
        <a href="<?= base_url('admin/supplier') ?>" class="btn btn-sm btn-secondary float-right"><span class="fa fa-arrow-left"></span> Kembali</a>
      </div>
    </div>
    <hr>
    <!-- !Ttile Form -->
    <div class="row">
      <div class="col-sm-12">
       <?php foreach ($supplier as $item) { ?>
        <form class="" method="post" action="<?php base_url() . 'admin/supplier/update'; ?>">
          <div class="form-group row">
            <input type="hidden" name="id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $item->id_user ?>" readonly>
            <div class="col-sm-6 mb-3 mb-sm-0">

              <label for="exampleInputEmail1">Nama </label>
              <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan nama" value="<?php echo $item->nama_lengkap ?>">
              <small class="form-text text-danger"><?php echo form_error('name'); ?></small>

            </div>
            <div class="col-sm-6 mb-3 mb-sm-0">

              <label for="exampleInputEmail1">username </label>
              <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan username" value="<?php echo $item->username ?>">
              <small class="form-text text-danger"><?php echo form_error('username'); ?></small>

            </div>
            <div class="col-sm-6 mb-3 mb-sm-0">

              <label for="exampleInputEmail1">password </label>
              <input type="text" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan password"value="<?php echo $item->password ?>">
              <small class="form-text text-danger"><?php echo form_error('password'); ?></small>

            </div>
            <div class="col-sm-6 mb-3 mb-sm-0">

              <label for="exampleInputEmail1">email </label>
              <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan email" value="<?php echo $item->email ?>">
              <small class="form-text text-danger"><?php echo form_error('email'); ?></small>

            </div>

            <div class="col-sm-6 mb-3 mb-sm-0">

              <label for="nohp">Contact</label>
              <input type="number" name="contact" class="form-control" id="nohp" aria-describedby="emailHelp" placeholder="Masukan Nomor HP"value="<?php echo $item->telp ?>">
              <small class="form-text text-danger"><?php echo form_error('contact'); ?></small>


            </div>


          </div>
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="reset"  class="btn btn-dark">Reset</button>
        </form>
      <?php } ?>
    </div>
  </div>
  <!-- !Form Menu -->

</div>
</div>
</div>
<!-- /.container-fluid -->





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
        <form class="" method="post" action="<?php base_url() . 'admin/supplier/aksiAdd'; ?>">
          <div class="form-group row">

            <div class="col-sm-6 mb-3 mb-sm-0">

              <label for="role">Role</label>
              <select name="id_role" class="form-control" id="role">
                <option value="">--Pilih--</option>
                <?php foreach ($role as $temp) { ?>
                  <option value="<?php echo $temp->id_role ?>"><?php echo $temp->nama ?>
                </option>
              <?php } ?>
            </select>


          </div>

          <div class="col-sm-6 mb-3 mb-sm-0">

            <label for="exampleInputEmail1">Nama </label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan nama">
            <small class="form-text text-danger"><?php echo form_error('name'); ?></small>

          </div>
          <div class="col-sm-6 mb-3 mb-sm-0">

            <label for="exampleInputEmail1">username </label>
            <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan username">
            <small class="form-text text-danger"><?php echo form_error('username'); ?></small>

          </div>
          <div class="col-sm-6 mb-3 mb-sm-0">

            <label for="exampleInputEmail1">password </label>
            <input type="text" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan password">
            <small class="form-text text-danger"><?php echo form_error('password'); ?></small>

          </div>
          <div class="col-sm-6 mb-3 mb-sm-0">

            <label for="exampleInputEmail1">email </label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan email">
            <small class="form-text text-danger"><?php echo form_error('email'); ?></small>

          </div>

          <div class="col-sm-6 mb-3 mb-sm-0">

            <label for="nohp">Contact</label>
            <input type="number" name="contact" class="form-control" id="nohp" aria-describedby="emailHelp" placeholder="Masukan Nomor HP">
            <small class="form-text text-danger"><?php echo form_error('contact'); ?></small>


          </div>


        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="reset" class="btn btn-dark">Reset</button>

        
      </form>
    </div>
  </div>
  <!-- !Form Menu -->

</div>
</div>
</div>
<!-- /.container-fluid -->



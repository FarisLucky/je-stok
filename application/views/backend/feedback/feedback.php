
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Header Title -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Feedback</h1>
  </div>
  <!-- !Header Title -->
  <!-- Button Insert -->

  <!-- Button Insert -->
  <!-- Table menu -->
 
  <div class="row">
    <div class="col-lg-12">
      <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Table Menu</h6>
        </div>
        <div class="card-body">
          <div class="responsive">
            <table class="table table-hover">
              <thead class="table-primary">
                <th>#</th>
                <th>Nama Produk</th>
                <th>id_order</th>
                
                <th>Rating</th>
                <th>deskripsi</th>
                <th>foto</th>
               <!--  <th>Aksi</th> -->

              </thead>
              <tbody>
                <?php $no = 1;
                foreach ($fed as $key => $item) { ?>
                  <tr>
                    <td><?= $no ?></td>
                    <td><?= $item->nama_produk ?></td>
                    <td><?= $item->id_order ?></td>

                    <td><?= $item->rating ?></td>
                    <td><?= $item->deskripsi ?></td>
                    <td><?= $item->foto ?></td>
                   <!--  <td><a href="<?= base_url('admin/feedback/detail/') ?>" class="btn btn-sm btn-outline-info">Detail</a></td> -->
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


<!-- Load Footer View -->
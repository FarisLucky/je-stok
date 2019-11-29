<div class="modal-header">
    <h5 class="modal-title">Pilih Alamat Pengiriman</h5>
    <button type="button" class="close" data-dismiss="modal">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form action="" id="form_alamat_transaksi">
    <div class="modal-body modal-box">
        <div class="row">
            <div class="col-sm-12">
                <div class="d-flex flex-row">
                    <label class="img-checkbox checked">
                        <img src="<?= base_url('front/img/home.svg') ?>" width="100px">
                        <input type="checkbox" name="i_alamat_utama" class="d-none" value="1">
                        <span class="fa fa-check-circle"></span>
                    </label>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Nama Alamat</label>
                    <input type="text" name="i_alamat" class="form-control border-blue">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Telepon</label>
                    <input type="number" name="i_telepon" class="form-control border-blue">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Alamat Lengkap</label>
                    <textarea name="i_alamat_lengkap" class="form-control border-blue"></textarea>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Provinsi</label>
                    <select name="i_provinsi" class="form-control border-blue provinsi">
                        <option value="">-- Pilih Provinsi --</option>
                        <?php foreach ($provinsi as $key => $value) { ?>

                        <option value="<?= $value['id_provinsi'] ?>"><?php echo $value['provinsi'] ?></option>

                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-sm-12 hidden-form">
                <div class="form-group">
                    <label>Kabupaten</label>
                    <select name="i_kabupaten" class="form-control border-blue kabupaten">
                        <option value="">-- Pilih Kabupaten --</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-12 hidden-form">
                <div class="form-group">
                    <label>Kecamatan</label>
                    <select name="i_kecamatan" class="form-control border-blue kecamatan">
                        <option value="">-- Pilih Kecamatan --</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Kode Pos</label>
                    <input type="number" name="i_kode_pos" class="form-control border-blue">
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary w-100 py-2">Simpan</button>
    </div>
</form>
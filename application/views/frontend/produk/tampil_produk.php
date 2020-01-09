<?php $this->load->view('frontend/partials/header'); ?>
<div class="container">
<form action="" method="POST">
    <div class="row">
        <!-- Data Pengiriman Dan Data Barang -->
        <?php foreach($produk as $row) { ?>
        <div class="col-md-6" style="padding-top: 20px">
			<div class="card border-3 shadow-card">				
			    <div class="card-body p-1">			    	
			        <div class="d-flex flex-column p-2">			        	
			            <div class="body-box">
			                <div class="row">			          
			                    <div class="col-sm-4">
			                        <div class="cover-img">
			                            <img src="<?= base_url('front/img/nabati.jpg') ?>" class="img-100">
			                        </div>
			                    </div>
			                    <div class="col d-flex flex-column">
			                        <div class="flex-row align-items-center">
			                            <span class="font-15 weight-500"><?= $row->nama_produk;?></span>
			                            <a href="" class="float-right">
			                                <img src="<?= base_url('front/img/menu.svg') ?>" width="17px">
			                            </a>
			                        </div>
			                        <div class="limit"></div>
			                        <span class="font-14 weight-500">Rp 300.000 / pcs</span>
			                        <span class="font-14">jumlah : <?= $row->stok;?> pcs</span>
			                        <span class="font-14">total harga : Rp 600.000</span>
			                        <div class="limit my-2"></div>
                                    <div class="process">
                                        <button class="btn btn-primary w-100">Detail</button>
                                    </div>
                                    <div style="padding-top: 4px;">
                                    	<button class="btn btn-primary w-100 bg-tradic">Tambah Ke Keranjang</button>
                                    </div>                                    
			                    </div>			                    
			                </div>			                
			            </div>			            
			        </div>
			    </div>		
			</div>
		</div>
		<?php } ?>
	</div>
</form>
</div>

<?php $this->load->view('frontend/transaksi/modal_alamat') ?>
<?php $this->load->view('frontend/transaksi/modal_ongkir') ?>
<!-- Script For Core -->
<script defer src="<?php echo base_url('front/js/core.js') ?>"></script>
<!-- Script For Core -->
<?php $this->load->view('frontend/partials/footer'); ?>
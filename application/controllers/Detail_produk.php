<?php 

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Detail_produk extends CI_Controller
{	
	public function __construct()
	{
		parent::__construct();
		ceklogincustomer();
		
	}

	public function index($id = null)
	{
		$this->load->model('produk_model');
		$this->load->model('detail_keranjang_model');
		$data['data_produk'] = $this->produk_model->getWhereProduk(['id_produk' => $id])->row_array();
		$data['list_harga'] = $this->detail_keranjang_model->getProductPrices($id)->result_array();
		$data['tab_harga'] = $this->detail_keranjang_model->getProductPrices($id)->result();
    // $data['tabHarga'] = $this->ModelApp->getJoin();
		$data['title'] = 'Detail Produk';
		$this->load->view('frontend/partials/header'); 
		$this->load->view('frontend/detail_produk/detail_produk', $data);
		$this->load->view('frontend/partials/footer');
	}

	public function tambahKeranjang()
	{
		$this->load->library('form_validation');
		$this->load->model('keranjang_model');
		$this->load->model('detail_keranjang_model');
    $this->load->model('produk_model');
    $id_produk = $this->input->post('id_produk',true);
    $stok_produk = $this->produk_model->getWhereProduk(['id_produk'=>$id_produk])->row_array()['stok'];
    $jumlah = $this->input->post('jumlah',true);
    if ($jumlah > $stok_produk) {
      $data['data'] = ['error'=>TRUE,'capt'=>'Stok Tersedia '.$stok_produk];
      return $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
		$get_keranjang = $this->keranjang_model->getCart();
		if ($get_keranjang->num_rows() > 0) {
			$data_keranjang = $get_keranjang->row_array();
			$result = $this->detail_keranjang_model->insertDetail($data_keranjang['id_keranjang']);
			$data['data'] = $result;
		} else{
			$this->keranjang_model->insertCart();
			$id_keranjang = $this->db->insert_id();
			$result = $this->detail_keranjang_model->insertDetail($id_keranjang);
			$data['data'] = $result;
		}
		return $this->output->set_content_type('application/json')->set_output(json_encode($data));

	}


}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_Suplier extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('ModelLaporanSuplier');
		$this->load->model('ModelApp');
	}

	public function index()
	{

	}

	public function Laporan_Stok()
	{
		$data['title'] = 'Laporan Stok Barang';
		$data['stok'] = $this->ModelLaporanSuplier->tampilLaporanStok();
		$this->pagination();
		$this->load->view('backend/laporan_suplier/laporan_stok', $data);
	}

	public function Laporan_Penjualan()
	{
		$data['title'] = 'Laporan Penjualan Barang';
		$data['penjualan'] = $this->ModelLaporanSuplier->tampilLaporanPenjualan();
		$this->pagination();
		$this->load->view('backend/laporan_suplier/laporan_penjualan', $data);
	}

	private function pagination()
    {
        $this->load->library('pagination');

        $config['base_url'] = base_url('admin/Laporan_Suplier/Laporan_Stok');
        $config['total_rows'] = $this->ModelApp->getData('id_produk', 'produk')->num_rows();
        $config['use_page_numbers'] = TRUE;
        $config['per_page'] = 10;
        $config['num_links'] = 4;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = 'Awal';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tag_close'] = '</span></li>';
        $config['last_link'] = 'Akhir';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tag_close'] = '</span></li>';
        $config['next_link'] = '&raquo;';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tag_close'] = '</span></li>';
        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '</span></li>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';

        $this->pagination->initialize($config);
    }
}
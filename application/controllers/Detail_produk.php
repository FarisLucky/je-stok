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
		$this->load->library('form_validation');
		$this->load->model('ModelApp');
	}

	public function index()
	{
		if (is_numeric($this->uri->segment(3)))
		{
			$id = $this->uri->segment(3);

			$data['data'] = $this->ModelApp->tampil('produk', array('id_produk' => $id));
			$data['tabHarga'] = $this->ModelApp->getJoin();
			$data['title'] = 'Detail Produk';
			$this->load->view('frontend/partials/header'); 
			$this->load->view('frontend/detail_produk/detail_produk', $data);
			$this->load->view('frontend/partials/footer');
		} else {
			redirect('dashboard');
		}


		
	}


}

?>
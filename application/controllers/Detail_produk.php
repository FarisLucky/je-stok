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
	}

	public function index()
	{
		$data['title'] = 'Detail Produk';
		$this->load->view('frontend/partials/header'); 
		$this->load->view('frontend/detail_produk/detail_produk', $data);
		$this->load->view('frontend/partials/footer');

	}
}

?>
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelLaporanSuplier extends CI_Model
{
	public function tampilLaporanStok()
	{
		$this->db->select('*');
		$this->db->from('produk');
		$query = $this->db->get();
		return $query->result();
	}

	public function tampilLaporanPenjualan()
	{

	}
}
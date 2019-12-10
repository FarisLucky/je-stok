<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelKategori extends CI_Model
{
	public function tampilKategori()
	{
		$this->db->select('*');
        $this->db->from('kategori');
        $this->db->order_by('id_kategori','ASC');
        $query = $this->db->get();
        return $query->result();
	}
	
}
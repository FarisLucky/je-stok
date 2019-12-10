<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelTipePembeli extends CI_Model
{
	//menampilkan DB
	public function getAllData()
	{	
		$this->db->select('*');
        $this->db->from('tipe_pembeli');
        $this->db->order_by('id_tipe','ASC');
        $query = $this->db->get();
        return $query->result_array();
		// return $this->db->get($this->_table)->result();
		//select * from products;
	}
	
}

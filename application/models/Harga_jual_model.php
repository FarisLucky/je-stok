<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Harga_jual_model extends CI_Model 
{
    private $table = 'harga_jual';

    public function __construct()
    {
        parent::__construct();
    }
    
    public function getTipe()
    {
        $this->db->select('field1, field2');
        $this->db->from($this->table);
        $this->db->where('id_produk', $id_produk);
        return $this->db->get($this->table);
    }
}

/* End of file Keranjang_model.php */
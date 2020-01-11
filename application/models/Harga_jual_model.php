<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Harga_jual_model extends CI_Model 
{
    private $table = 'harga_jual';

    public function __construct()
    {
        parent::__construct();
    }
    
    public function getProductPrices($id_produk)
    {
        $this->db->select('');
        $this->db->from($this->table);
        $this->db->join('tipe_pembeli', 'harga_jual.id_tipe = tipe_pembeli.id_tipe', 'inner');
        $this->db->where('id_produk', $id_produk);
        return $this->db->get();
    }
}

/* End of file Keranjang_model.php */
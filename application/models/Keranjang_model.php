<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Keranjang_model extends CI_Model 
{
    private $table = 'keranjang';
    public $id_user,$total_produk,$total_harga,$total_berat;

    public function __construct()
    {
        parent::__construct();
    }
    
    public function getCart()
    {
        return $this->db->get_where($this->table,['id_user'=>$_SESSION['id_user']]);
    }
    public function insertCart()
    {
        $this->id_user = $_SESSION['id_user'];
        $this->total_produk = 1;
        $this->total_harga = 1;
        $this->total_berat = 1;
        return $this->db->insert($this->table,$this);
    }
    
    public function insertDetailCart()
    {
        $this->id_keranjang = 1;
        $this->jumlah = 1;
        $this->id_harga = 1;
        return $this->db->insert($this->table_2,$this);
    }
    public function deleteCart($id_keranjang)
    {
        $this->db->where('id_keranjang',$id_keranjang);
        return $this->db->delete($this->table);
    }
}

/* End of file Keranjang_model.php */
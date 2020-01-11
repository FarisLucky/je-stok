<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_transaksi_model extends CI_Model
{
  private $_table = 'detail_order';
  public function __construct()
  {
    parent::__construct();
    
  }
  
  public function getDetail($id_transaksi)
  {
    $this->db->select('*');
    $this->db->from($this->_table);
    $this->db->join('produk', 'detail_order.id_produk = produk.id_produk', 'inner');
    $this->db->where('id_order', $id_transaksi);
    return $this->db->get();
  }
}
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran_model extends CI_Model 
{
  
  public function __construct()
  {
    parent::__construct();
    
  }
  
  public function getPayment()
  {
    return $this->db->get_where('orders',['id_order'=>6]);
  }
}

/* End of file Pembayaran_model.php */
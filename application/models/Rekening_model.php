<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Rekening_model extends CI_Model 
{
  private $_table = "rekening";
  public $no_rekening;
  public $bank;
  public $pemilik;
  
  public function __construct()
  {
    parent::__construct();
    
  }
  
  public function getRekening()
  {
    return $this->db->get($this->_table);
  }
}

  /* End of file ModelName.php */
  
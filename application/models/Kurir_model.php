<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kurir_model extends CI_Model 
{
  private $table = "kurir";
  public $id_kurir,$kurir;
  
  public function __construct()
  {
    parent::__construct();
  }
  
  public function getKurir()
  {
    return $this->db->get($this->table);
  }
  
  public function getKurirById($where)
  {
    return $this->db->get_where($this->table,$where);
  }
  

}

  /* End of file ModelName.php */
  
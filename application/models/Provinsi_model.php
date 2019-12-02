<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Provinsi_model extends CI_Model 
{
  private $table = "provinsi";
  public $id_provinsi,$nama;
  
  public function getProvinsi()
  {
    return $this->db->get($this->table);
  }
  
  public function getProvinsiById($where)
  {
    return $this->db->get_where($this->table,$where);
  }

}

  /* End of file ModelName.php */
  
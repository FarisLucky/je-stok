<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kecamatan_model extends CI_Model 
{
  private $table = "kecamatan";
  
  public function getKecamatan()
  {
    return $this->db->get($this->table);
  }
  
  public function getWhereKecamatan($where)
  {
    return $this->db->get_where($this->table,$where);
  }

}

  /* End of file ModelName.php */
  
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kabupaten_model extends CI_Model 
{
  private $table = "kabupaten";
  
  public function getKabupaten()
  {
    return $this->db->get($this->table);
  }
  
  public function getWhereKabupaten($where)
  {
    return $this->db->get_where($this->table,$where);
  }

}

  /* End of file ModelName.php */
  
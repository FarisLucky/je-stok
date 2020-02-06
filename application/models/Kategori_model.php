<?php

class Kategori_model extends CI_Model 
{
  private $table = 'menu_grup';
  public function getAllMenu()
  {
    return $this->db->get($this->table);
  }
}
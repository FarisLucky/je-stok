<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_profil extends CI_Model
{

  public function getData($id_user)
  {
    $query = $this->db->query("SELECT nama_produk , detail_order.harga , jumlah , total_harga , foto_produk.foto FROM user JOIN orders USING(id_user) JOIN detail_order USING(id_order) JOIN produk USING(id_produk) JOIN foto_produk using(id_produk) WHERE user.id_user = $id_user");
    return $query->result();
  }

  public function getWhereKabupaten($where)
  {
    return $this->db->get_where($this->table, $where);
  }
}

  /* End of file ModelName.php */

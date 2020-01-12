<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_profil extends CI_Model
{

  public function getDataBelumBayar($id_user)
  {
    $query = $this->db->query("SELECT nama_produk , detail_order.harga , jumlah , total_harga , foto_produk.foto , status_pesanan.deskripsi FROM user JOIN orders USING(id_user) JOIN detail_order USING(id_order) JOIN produk USING(id_produk) JOIN foto_produk using(id_produk) JOIN status_pesanan ON orders.status_pesanan = status_pesanan.id_status WHERE user.id_user = 1 AND orders.status_pesanan = 1
    ");
    return $query->result();
  }

  // public function getdataprofil($username)
  // {
  //   $query = $this->db->query("SELECT * FROM user WHERE username = $username");
  //   return $query->result();
  // }

  public function updateprofil($id_user, $nama, $username, $jk, $telp, $email)
  {
    $data = $this->db->query("UPDATE user SET nama_lengkap='$nama' , username = '$username' , jenis_kelamin = '$jk' , telp = '$telp' , email = '$email' WHERE id_user = '$id_user'");
    return $data;
  }
}

  /* End of file ModelName.php */

<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_profil extends CI_Model
{

  public function getDataBelumBayar($id_user)
  {
    $query = $this->db->query("SELECT produk.id_produk, orders.id_order, nama_produk , detail_order.harga , jumlah , total_harga , orders.no_resi FROM user JOIN orders USING(id_user) JOIN detail_order USING(id_order) JOIN produk USING(id_produk) WHERE user.id_user = 1 AND orders.status_pesanan = 1");
    // echo "<pre>";
    // print_r($query->result_array());
    // echo "</pre>";
    // exit();
    return $query->result_array();
  }

  public function getDataPengiriman($id_user)
  {
    $query = $this->db->query("SELECT produk.id_produk, orders.id_order, nama_produk , detail_order.harga , jumlah , total_harga , orders.no_resi FROM user JOIN orders USING(id_user) JOIN detail_order USING(id_order) JOIN produk USING(id_produk) WHERE user.id_user = 1 AND orders.status_pesanan = 4");
    // echo "<pre>";
    // print_r($query->result_array());
    // echo "</pre>";
    // exit();
    return $query->result_array();
  }

  public function getDataSelesai($id_user)
  {
    $query = $this->db->query("SELECT produk.id_produk, orders.id_order, nama_produk , detail_order.harga , jumlah , total_harga , orders.no_resi FROM user JOIN orders USING(id_user) JOIN detail_order USING(id_order) JOIN produk USING(id_produk) WHERE user.id_user = 1 AND orders.status_pesanan = 5");
    // echo "<pre>";
    // print_r($query->result_array());
    // echo "</pre>";
    // exit();
    return $query->result_array();
  }

  public function tampil_foto($dataorder)
  {
    $order = $dataorder;
    $orderbaru = [];
    foreach ($order as $key => $value) {
      $tambah_foto = [];
      $foto = $this->db->get_where('foto_produk', ['id_produk' => $value['id_produk']]);
      if ($foto->num_rows() > 0) {
        $tambah_foto['foto'] = $foto->row_array()['foto'];
      } else {
        $tambah_foto['foto'] = 'default.jpg';
      }
      $tambah_foto['id_produk'] = $value['id_produk'];
      $tambah_foto['id_order'] = $value['id_order'];
      $tambah_foto['nama_produk'] = $value['nama_produk'];
      $tambah_foto['harga'] = $value['harga'];
      $tambah_foto['no_resi'] = $value['no_resi'];
      $tambah_foto['jumlah'] = $value['jumlah'];
      // $tambah_foto['jumlah'] = $value['jumlah'];
      $tambah_foto['total_harga'] = $value['total_harga'];
      $orderbaru[] = $tambah_foto;
    }
    return $orderbaru;
  }

  public function updateprofil($id_user, $nama, $username, $jk, $telp, $email)
  {
    $data = $this->db->query("UPDATE user SET nama_lengkap='$nama' , username = '$username' , jenis_kelamin = '$jk' , telp = '$telp' , email = '$email' WHERE id_user = '$id_user'");
    return $data;
  }
}

  /* End of file ModelName.php */

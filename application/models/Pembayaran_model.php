<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran_model extends CI_Model 
{
  private $_table = "orders";
  
  public function __construct()
  {
    parent::__construct();
    
  }
  
  public function getPayment($where)
  {
    return $this->db->get_where('orders',$where);
  }
  public function updatePayment()
  {
    date_default_timezone_set('Asia/Jakarta');
    $data = [
      'error'=>FALSE
    ];
    $id_order = $this->input->post('input_hidden', true);
    $tgl_bayar = $this->input->post('tgl_bayar',true).' '.$this->input->post('waktu_bayar',true);
    $config['upload_path'] = './assets/uploads/img/payment';
    $config['allowed_types'] = 'jpeg|jpg|png';
    $config['encrypt_name'] = true;
    $config['max_size']  = '800';
    $config['max_width']  = '1366';
    $config['max_height']  = '1366';
    $this->load->library('upload', $config);
    if (!empty($_FILES["bukti_bayar"]["name"])) {
      if ($this->upload->do_upload("bukti_bayar")) {
        $upload_gambar = $this->upload->data();
        $foto = $upload_gambar["file_name"];
        $data_update = [
          'tgl_bayar'=> $tgl_bayar,
          'tgl_input_bayar'=> date('Y-m-d H:i:s'),
          'upload_bukti'=>$foto
        ];
        $this->db->where('id_order', $id_order);
        $data['upload_foto'] = $this->db->update('orders',$data_update);
      } else {
        $error = $this->upload->display_errors();
        $data['error'] = TRUE;
        $data['capt_error'] = $error;
      }
    } else {
      $error = 'Inputan Kosong';
      $data['error'] = TRUE;
      $data['capt_error'] = $error;
    }
    return $data;
  }
}

/* End of file Pembayaran_model.php */
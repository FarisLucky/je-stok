<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_model extends CI_Model 
{
  private $table = "user";
  
  public function getPhoto()
  {
    return $this->db->get_where('user',['id_user'=>$_SESSION['id_user']]);
  }
  public function updatePhoto()
  {
    $data['error'] = FALSE;
    $id_user = $_SESSION['id_user'];
    $config['upload_path'] = './assets/uploads/img/foto_customer/';
    $config['allowed_types'] = 'jpeg|jpg|png';
    $config['encrypt_name'] = true;
    $config['max_size']  = '800';
    $config['max_width']  = '1366';
    $config['max_height']  = '1366';
    $this->load->library('upload', $config);
    $get_user = $this->db->get_where('user',['id_user'=>$id_user]);
    $data_user = $get_user->row_array();
    if (!empty($_FILES["ganti_foto"]["name"])) {
      if ($this->upload->do_upload("ganti_foto")) {
          $path = "./assets/uploads/img/foto_customer/" . $data_user['foto'];
          if (file_exists($path) && !is_dir($path)) {
              unlink($path);
          }
          $upload_gambar = $this->upload->data();
          $foto = $upload_gambar["file_name"];
          $this->db->where('id_user',$id_user);
          $upload_foto = $this->db->update('user',['foto' => $foto]);
          $data['upload'] = $upload_foto;
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

  /* End of file ModelName.php */
  
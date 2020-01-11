<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class profil_adminM extends CI_Model 
{
  private $table='user';
  public $nama_lengkap,$username,$email,$password,$telp,$foto;
  public function __construct()
  {
    parent::__construct();
    
  }
  
  public function getAdmin()
  {
    $this->db->select('id_user,user.id_role,user.nama_lengkap,user.username,user.email,user.password,user.telp,user.foto');
    $this->db->from($this->table);
    return $this->db->get();
  }

  public function updateAdmin()
  {
    $id_user = $this->input->post('input_hidden',true);
    $this->nama_lengkap = $this->input->post('i_nama_admin',true);
    $this->username = $this->input->post('i_username_admin',true);
    $this->email = $this->input->post('i_email_admin',true);
    $this->password = $this->input->post('i_password_admin',true);
    $this->telp = $this->input->post('i_telp_admin',true);
    $this->foto = $this->input->post('i_foto_admin',true);
    $this->db->where('id_user',$id_user);
    return $this->db->update($this->table,$this);
  }
  public function validate()
  {
    return [
      [
          'field' => 'i_nama_admin',
          'label' => 'Nama',
          'rules' => 'required',
      ],
      [
          'field' => 'i_username_admin',
          'label' => 'Username',
          'rules' => 'required',
      ],
      [
        'field' => 'i_email_admin',
        'label' => 'Email',
        'rules' => 'required',
    ],
      [
          'field' => 'i_password_admin',
          'label' => 'Password',
          'rules' => 'required',
      ],
      [
          'field' => 'i_telp_admin',
          'label' => 'Telepon',
          'rules' => 'required',
      ]
      // [
      //     'field' => 'i_foto_admin',
      //     'label' => 'Foto',
      //     'rules' => 'required',
      // ]
    ];
  }
}


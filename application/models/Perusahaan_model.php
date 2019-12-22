<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Perusahaan_model extends CI_Model 
{
  private $table='perusahaan';
  public $nama,$telp,$alamat_lengkap,$id_provinsi,$id_kabupaten,$id_kecamatan,$kode_pos;
  public function __construct()
  {
    parent::__construct();
    //Do your magic here
  }
  
  public function getCompany()
  {
    $this->db->select('id_perusahaan,perusahaan.nama,telp,perusahaan.telp,perusahaan.alamat_lengkap,perusahaan.kode_pos,kecamatan.id_kecamatan,kecamatan,kabupaten.id_kabupaten,kabupaten,provinsi.id_provinsi,provinsi');
    $this->db->from($this->table);
    $this->db->join('kecamatan', 'kecamatan.id_kecamatan = perusahaan.id_kecamatan', 'inner');
    $this->db->join('kabupaten', 'kabupaten.id_kabupaten = kecamatan.id_kabupaten', 'inner');
    $this->db->join('provinsi', 'provinsi.id_provinsi = kabupaten.id_provinsi', 'inner');
    return $this->db->get();
  }

  public function updateCompany()
  {
    $id_perusahaan = $this->input->post('input_hidden',true);
    $this->nama = $this->input->post('i_nama_profil',true);
    $this->telp = $this->input->post('i_telp_profil',true);
    $this->alamat_lengkap = $this->input->post('i_alamat_profil',true);
    $this->id_provinsi = $this->input->post('i_provinsi_profil',true);
    $this->id_kabupaten = $this->input->post('i_kota_profil',true);
    $this->id_kecamatan = $this->input->post('i_kecamatan_profil',true);
    $this->kode_pos = $this->input->post('i_kode_pos',true);
    $this->db->where('id_perusahaan',$id_perusahaan);
    return $this->db->update($this->table,$this);
  }
  public function validate()
  {
    return [
      [
          'field' => 'i_nama_profil',
          'label' => 'Nama perusahaan',
          'rules' => 'required',
      ],
      [
          'field' => 'i_telp_profil',
          'label' => 'Telepon',
          'rules' => 'required',
      ],
      [
          'field' => 'i_alamat_profil',
          'label' => 'Alamat',
          'rules' => 'required',
      ],
      [
          'field' => 'i_provinsi_profil',
          'label' => 'provinsi',
          'rules' => 'required',
      ],
      [
          'field' => 'i_kota_profil',
          'label' => 'kota',
          'rules' => 'required',
      ],
      [
          'field' => 'i_kecamatan_profil',
          'label' => 'kecamatan',
          'rules' => 'required',
      ],
      [
          'field' => 'i_kode_pos',
          'label' => 'Kode pos',
          'rules' => 'required',
      ]
    ];
  }
}

/* End of file Perusahaan_model.php */
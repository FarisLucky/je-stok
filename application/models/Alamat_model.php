<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Alamat_model extends CI_Model 
{
  private $table = "alamat";
  
  public $nama,$telp,$alamat_lengkap,$id_kabupaten,$kode_pos,$id_user,$alamat_utama;
  
	public function getLimitWhereAlamat($where)
	{
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where($where);
        $this->db->limit(1);
        $this->db->order_by('id_alamat', 'ASC');
		return $this->db->get();
	}
	public function getWhereAlamat($where)
	{
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where($where);
		return $this->db->get();
	}

    public function getJoinAlamat($where)
    {
        $this->db->select('id_alamat,alamat.nama as nama_alamat,telp,alamat_lengkap,kode_pos,kabupaten,provinsi');
        $this->db->from($this->table);
        $this->db->join('kabupaten', 'kabupaten.id_kabupaten = alamat.id_kabupaten', 'inner');
        $this->db->join('provinsi', 'provinsi.id_provinsi = kabupaten.id_provinsi', 'inner');
        $this->db->where($where);
        return $this->db->get();
    }
    public function insertAlamat()
    {
        $this->nama = $this->input->post('i_alamat',true);
        $this->telp = $this->input->post('i_telepon',true);
        $this->alamat_lengkap = $this->input->post('i_alamat_lengkap',true);
        $this->id_kabupaten = $this->input->post('i_kabupaten',true);
        $this->kode_pos = $this->input->post('i_kode_pos',true);
        $this->alamat_utama = isset($_POST['i_alamat_utama']) ? $this->input->post('i_alamat_utama') : '0';
        $this->id_user = 1;
        $this->db->insert($this->table,$this);
        return $this->db->affected_rows();
    }
  
  public function validate()
  {
      return [
          [
              'field' => 'i_alamat',
              'label' => 'Alamat',
              'rules' => 'required',
          ],
          [
              'field' => 'i_telepon',
              'label' => 'Telepon',
              'rules' => 'required',
          ],
          [
              'field' => 'i_alamat_lengkap',
              'label' => 'Alamat Lengkap',
              'rules' => 'required',
          ],
          [
              'field' => 'i_provinsi',
              'label' => 'Provinsi',
              'rules' => 'required',
          ],
          [
              'field' => 'i_kabupaten',
              'label' => 'Kabupaten',
              'rules' => 'required',
          ],
          [
              'field' => 'i_kode_pos',
              'label' => 'Kode Pos',
              'rules' => 'required',
          ]
      ];
  }

}

  /* End of file ModelName.php */
  
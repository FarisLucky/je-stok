<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model 
{
  private $table = "produk";
  public $id_user,$nama_produk,$stok,$deskripsi,$satuan_produk,$berat,$satuan_berat,$harga,$expired_date;

  public function getProduk($num)
  {
    $data = array(
      'title' => 'Produk',
      'user'  => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array()
    );
    //Pagination control
    $per_page = 10;
    if ($num != 0) {
      $num = ($num - 1) * $per_page;
    }
    $data['produk'] = $this->db->get($this->table, $per_page, $num)->result_array(); //get data produk
    $data['row'] = $num;
    $this->pagination();
    return $data;
  }

  function tampil($table = null, $where = null)
  {
      return $this->db->get_where($table,$where);
  }

  function tampil_foto($data_produk) 
    {
        $produk = $data_produk;
        $produk_baru = [];
        foreach ($produk as $key => $value) {
            $tambah_foto = [];
            $foto = $this->db->get_where('foto_produk',['id_produk'=>$value['id_produk']]);
            if ($foto->num_rows() > 0) {
                $tambah_foto['foto'] = $foto->row_array()['foto'];
            } else {
                $tambah_foto['foto'] = 'default.jpg';
            }
            $tambah_foto['id_produk'] = $value['id_produk'];
            $tambah_foto['nama_produk'] = $value['nama_produk'];
            $tambah_foto['harga'] = $value['harga'];
            $tambah_foto['nama_lengkap'] = $value['nama_lengkap'];
            // $tambah_foto['jumlah'] = $value['jumlah'];
            $tambah_foto['satuan_produk'] = $value['satuan_produk'];
            $tambah_foto['berat'] = $value['berat'];
            $produk_baru[] = $tambah_foto;
        }
        return $produk_baru;
    }

    public function tampil_produk()
    {
        $this->db->select('produk.id_produk, produk.satuan_produk,produk.berat,produk.nama_produk, harga_jual.harga ,user.nama_lengkap');
        $this->db->from('produk');
        $this->db->join('harga_jual', 'harga_jual.id_produk = produk.id_produk','inner');
        $this->db->join('user', 'produk.id_user = user.id_user','inner');
        // $this->db->join('tipe_pembeli', 'harga_jual.id_tipe = tipe_pembeli.id_tipe','inner');
        $this->db->where('harga_jual.id_tipe', 4);

        return $this->db->get();
    }

  public function tampilSupplier()
  {
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where('id_role = 3');
    return $this->db->get()->result();
  }
    
	public function getWhereProduk($where)
	{
    $this->db->select('*');
    $this->db->from($this->table);
    $this->db->where($where);
		return $this->db->get();
	}
  public function insertProduk()
  {
      $this->id_user = $this->input->post('i_supplier_produk');
      $this->nama_produk = $this->input->post('i_nama_produk',true);
      $this->stok = $this->input->post('i_stok_produk',true);
      $this->satuan_produk = $this->input->post('i_satuan_produk',true);
      $this->berat = $this->input->post('i_berat_produk',true);
      $this->satuan_berat = 'gram';
      $this->harga = $this->input->post('i_harga_produk',true);
      $this->expired_date = $this->input->post('i_expired_produk', true);
      $this->deskripsi = $this->input->post('i_deskripsi_produk', true);
      $this->db->insert($this->table,$this);
      return $this->db->affected_rows();
  }
  public function updateProduk($produk)
  {
      $this->id_user = $this->input->post('i_supplier_produk');
      $this->nama_produk = $this->input->post('i_nama_produk',true);
      $this->stok = $this->input->post('i_stok_produk',true);
      $this->satuan_produk = $this->input->post('i_satuan_produk',true);
      $this->berat = $this->input->post('i_berat_produk',true);
      $this->satuan_berat = 'gram';
      $this->harga = $this->input->post('i_harga_produk',true);
      $this->expired_date = $this->input->post('i_expired_produk', true);
      $this->deskripsi = $this->input->post('i_deskripsi_produk', true);
      // Query Db
      $this->db->where('id_produk',$produk);
      $this->db->update($this->table, $this);
      return $this->db->affected_rows();
  }

  public function deleteProduk($id_produk)
  {
      $where = ['id_produk'=>$id_produk];
      $this->db->trans_start();
      // Hapus Produk dari tabel produk
      $this->db->where($where);
      $this->db->delete($this->table);
      // Hapus Foto Produk dari tabel foto produk
      $get_foto = $this->db->get_where('foto_produk',$where);
      if ($get_foto->num_rows() > 0) {
          $data_foto = $get_foto->result_array();
          foreach ($data_foto as $key => $value) {
              $path = "./assets/uploads/img/foto_produk/" . $value['foto'];
              if (file_exists($path) && !is_dir($path)) {
                  unlink($path);
              }
              $this->db->where('id_produk',$id_produk);
              $this->db->delete('foto_produk');
          }
      }
      return $this->db->trans_complete();
  }

  public function uploadPhoto()
  {
      $data = ['error'=>FALSE,'upload'=>FALSE,'capt_error'=>''];
      $config = $this->uploadImg();
      $this->load->library('upload', $config);
      $id_produk = $this->input->post('input_hidden', true);
      if (!empty($_FILES["upload_foto"]["name"])) {
          if ($this->upload->do_upload("upload_foto")) {
              $upload_gambar = $this->upload->data();
              $foto = $upload_gambar["file_name"];
              $upload_foto = $this->db->insert('foto_produk',['foto' => $foto, 'id_produk' => $id_produk]);
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
  public function changePhoto()
  {
      $data = ['error'=>FALSE,'empty'=>FALSE,'upload'=>FALSE,'capt_error'=>'','id_produk'=>''];
      $config = $this->uploadImg();
      $this->load->library('upload', $config);
      $id_foto = $this->input->post('input_hidden', true);
      $get_foto = $this->db->get_where('foto_produk',['id_foto'=>$id_foto]);
      $data_foto = $get_foto->row_array();
      if ($get_foto->num_rows() > 0) {
          $data['id_produk'] = $data_foto['id_produk'];
          if (!empty($_FILES["upload_foto"]["name"])) {
                  if ($this->upload->do_upload("upload_foto")) {
                      $path = "./assets/uploads/img/foto_produk/" . $data_foto['foto'];
                      if (file_exists($path) && !is_dir($path)) {
                          unlink($path);
                      }
                      $upload_gambar = $this->upload->data();
                      $foto = $upload_gambar["file_name"];
                      $this->db->where('id_foto',$id_foto);
                      $upload_foto = $this->db->update('foto_produk',['foto' => $foto]);
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
      } else {
          $data['empty'] = TRUE;
      }
      return $data;
  }
  
  public function deletePhoto($id_foto)
  {
      $data = ['error'=>FALSE,'hapus'=>FALSE,'id_produk'=>''];
      $get_foto = $this->db->get_where('foto_produk',['id_foto'=>$id_foto]);
      if ($get_foto->num_rows() > 0) {
          $data_foto = $get_foto->row_array();
          $data['id_produk'] = $data_foto['id_produk'];
          $path = "./assets/uploads/img/foto_produk/" . $data_foto['foto'];
          if (file_exists($path) && !is_dir($path)) {
              unlink($path);
          }
          $this->db->where('id_foto', $id_foto);
          $hapus_foto = $this->db->delete('foto_produk');
          $data['upload'] = $hapus_foto;
      } else {
          $data['error'] = TRUE;
      }
      return $data;
  }

  public function getPhoto($where)
  {
      return $this->db->get_where('foto_produk',$where);
  }
  public function validate()
  {
      return [
          [
              'field' => 'i_supplier_produk',
              'label' => 'Supplier',
              'rules' => 'required|in_list['.implode(array_keys($data = array("1","2","3","4","5","6","7")),",").']'
          ],
          [
              'field' => 'i_nama_produk',
              'label' => 'Nama Produk',
              'rules' => 'required',
          ],
          [
              'field' => 'i_stok_produk',
              'label' => 'Stok Produk',
              'rules' => 'required',
          ],
          [
              'field' => 'i_satuan_produk',
              'label' => 'Satuan Produk',
              'rules' => 'required',
          ],
          [
              'field' => 'i_berat_produk',
              'label' => 'Berat Produk',
              'rules' => 'required',
          ],
          [
              'field' => 'i_harga_produk',
              'label' => 'Harga Produk',
              'rules' => 'required',
          ],
          [
              'field' => 'i_deskripsi_produk',
              'label' => 'Deskripsi Produk',
              'rules' => 'required',
          ]
      ];
  }

  private function uploadImg()
  {
    $config['upload_path'] = './assets/uploads/img/foto_produk/';
    $config['allowed_types'] = 'jpeg|jpg|png';
    $config['encrypt_name'] = true;
    $config['max_size']  = '400';
    $config['max_width']  = '800';
    $config['max_height']  = '600';
    return $config;
  }
  
  private function pagination()
  {
    $this->load->library('pagination');

    $config['base_url'] = base_url('admin/produk/index/');
    $config['total_rows'] = $this->db->get('produk')->num_rows();
    $config['use_page_numbers'] = TRUE;
    $config['per_page'] = 10;
    $config['num_links'] = 4;
    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';
    $config['first_link'] = 'Awal';
    $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
    $config['first_tag_close'] = '</span></li>';
    $config['last_link'] = 'Akhir';
    $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
    $config['last_tag_close'] = '</span></li>';
    $config['next_link'] = '&raquo;';
    $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
    $config['next_tag_close'] = '</span></li>';
    $config['prev_link'] = '&laquo;';
    $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
    $config['prev_tag_close'] = '</span></li>';
    $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
    $config['cur_tag_close'] = '</span></li>';
    $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
    $config['num_tag_close'] = '</span></li>';

    $this->pagination->initialize($config);
  }
}

  /* End of file ModelName.php */
  
<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_keranjang_model extends CI_Model 
{

    private $table = 'detail_keranjang';
    public $id_keranjang,$jumlah,$id_harga,$status_pilih,$deskripsi_status;

    public function __construct()
    {
        parent::__construct();
    }
    
    public function getDetailCart($id_keranjang,$status_pilih = null)
    {
        $this->db->select('detail_keranjang.id_keranjang,detail_keranjang.id_detail,produk.id_produk,detail_keranjang.id_harga,produk.nama_produk,harga_jual.harga,detail_keranjang.jumlah,produk.satuan_produk,produk.berat,produk.stok,detail_keranjang.status_pilih,detail_keranjang.deskripsi_status');
        $this->db->from($this->table);
        $this->db->join('harga_jual', 'harga_jual.id_harga = detail_keranjang.id_harga', 'inner');
        $this->db->join('produk', 'produk.id_produk = harga_jual.id_produk', 'inner');
        $this->db->where('detail_keranjang.id_keranjang', $id_keranjang);
        if ($status_pilih !== null) {
          $this->db->where(['detail_keranjang.id_keranjang'=>$id_keranjang,'status_pilih'=>$status_pilih]);
        }
        return $this->db->get();
    }

    public function getDetailWithPrices($detail_keranjang)
    {
      $data_detail = $detail_keranjang;
      $data_detail_prices = ['total_detail'=>0,'detail_keranjang'=>[]];
      foreach ($data_detail as $key => $value) {
        $items = [];
        $compare_stok = $value['stok'] < $value['jumlah'];
        if ($compare_stok) {
          $this->db->where('id_produk',$value['id_produk']);
          $this->db->update('produk',['status_pilih'=>'kosong','deskripsi'=>'Stok Terlalu banyak']);
          $update_detail = $this->db->get_where($this->table,['id_detail'=>$items['id_detail']])->row_array();
          $items['status_pilih'] = $update_detail['status_pilih'];
          $items['deskripsi_status'] = $update_detail['deskripsi_status'];
        } else{
          $items['status_pilih'] = $value['status_pilih'];
          $items['deskripsi_status'] = $value['deskripsi_status'];
        }
        $items['id_keranjang'] = $value['id_keranjang'];
        $items['id_detail'] = $value['id_detail'];
        $items['nama_produk'] = $value['nama_produk'];
        $items['harga_jual'] = $this->getProductPrices($value['id_produk'])->result_array();
        $items['foto'] = $this->db->get_where('foto_produk',['id_produk'=>$value['id_produk']])->row()->foto;
        $items['id_harga'] = $value['id_harga'];
        $items['harga'] = $value['harga'];
        $items['jumlah'] = $value['jumlah'];
        $items['total'] = $value['jumlah']*$value['harga'];
        $data_detail_prices['total_detail'] += ( $value['jumlah']*$value['harga']);
        $data_detail_prices['detail_keranjang'][] = $items; 
      }
      return $data_detail_prices;
    }

    public function getProductPrices($id_produk)
    {
        $this->db->select('');
        $this->db->from('harga_jual');
        $this->db->join('tipe_pembeli', 'harga_jual.id_tipe = tipe_pembeli.id_tipe', 'inner');
        $this->db->where('id_produk', $id_produk);
        return $this->db->get();
    }
    public function insertDetail($id_keranjang)
    {
        $data = ['error'=>FALSE,'capt'=>'','core'=>FALSE];
        $this->form_validation->set_rules($this->validate());
        if ($this->form_validation->run() == TRUE) {
            $id_produk = $this->input->post('id_produk',true);
            $jumlah = $this->input->post('jumlah',true);
            $tipe_harga = $this->input->post('tipe_harga',true);
            $list_harga = $this->db->get_where('harga_jual',['id_harga'=>$tipe_harga])->row_array();
            if ($jumlah >= $list_harga['min_pembelian']) {
                $where_detail = [
                    'id_keranjang'=>$id_keranjang,
                    'id_harga'=>$tipe_harga
                ];
                $get_detail = $this->db->get_where($this->table,$where_detail);
                if ($get_detail->num_rows() > 0) {
                    $data_detail = $get_detail->row_array();
                    $update_jumlah = $data_detail['jumlah'] + $jumlah;
                    $this->db->where('id_detail', $data_detail['id_detail']);
                    $data['core'] = $this->db->update($this->table, ['jumlah'=>$update_jumlah]);
                    $data['capt'] = 'Berhasil diubah detail keranjang';
                } else {
                    $this->id_keranjang = $id_keranjang;
                    $this->jumlah = $jumlah;
                    $this->id_harga = $list_harga['id_harga'];
                    $this->status_pilih = 'iya';
                    $this->deskripsi_status = "";
                    $data['core'] = $this->db->insert($this->table,$this);
                    $data['capt'] = 'Berhasil ditambah detail keranjang';
                }
            } else {
                $data['error'] = TRUE;
                $data['capt'] = 'Jumlah Kurang';
            }
        } else {
            $data['error'] = TRUE;
            foreach ($_POST as $key => $value) {
                $data['form_error'][$key] = form_error($key); 
            }
        }
        return $data;
    }
    
    public function updateCart()
    {
        $data = ['error'=>false,'capt'=>''];
        $this->form_validation->set_rules($this->validate());
        if ($this->form_validation->run() == TRUE ) {
            $id_detail = $this->input->post('input_hidden',true);
            $id_harga = $this->input->post('tipe_harga',true);
            $jumlah = $this->input->post('jumlah',true);
            $harga_jual = $this->db->get_where('harga_jual',['id_harga'=>$id_harga])->row_array();
            $compare = $jumlah >= $harga_jual['min_pembelian'];
            if ($compare === true) {
                $this->db->where('id_detail',$id_detail);
                $data_update = ['id_harga'=>$id_harga,'jumlah'=>$jumlah];
                $data['data'] = $this->db->update('detail_keranjang',$data_update);
            } else {
                $data['error'] = TRUE;
                $data['capt'] = 'jumlah kurang';
            }
        } else {
            foreach ($_POST as $key => $value) {
                $data['form_error'][$key] = form_error($key); 
            }
        }
        return $data;
    }

    public function deleteDetail($id_detail)
    {
        $this->db->where('id_detail', $id_detail);
        return $this->db->delete($this->table);
    }
    public function deleteAllDetail($id_keranjang)
    {
        $this->db->where('id_keranjang', $id_keranjang);
        return $this->db->delete($this->table);
    }

    public function updateStatusDetail($id_detail,$status)
    {
      $data_status = $status === 'iya' ? 'tidak' : 'iya';
      $this->db->where('id_detail',$id_detail);
      $data['update'] = $this->db->update($this->table,['status_pilih'=>$data_status]);
      $data['detail'] = $this->db->get_where($this->table,['id_detail'=>$id_detail])->row();
      return $data;
    }
    
    public function validate()
    {
        return [
            [
                'field' => 'jumlah',
                'label' => 'Jumlah Produk',
                'rules' => 'required',
            ],
            [
                'field' => 'tipe_harga',
                'label' => 'Stok Produk',
                'rules' => 'required',
            ]
        ];
    }
}

/* End of file Detail_produk_model.php */
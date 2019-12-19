<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_keranjang_model extends CI_Model 
{

    private $table = 'detail_keranjang';
    public $id_keranjang,$jumlah,$id_harga;

    public function __construct()
    {
        parent::__construct();
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
    
    public function validate()
    {
        return [
            [
                'field' => 'id_produk',
                'label' => 'Produk',
                'rules' => 'required',
            ],
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
<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_produk_model extends CI_Model 
{

    private $table = 'keranjang',$table_2 = 'detail_keranjang';
    public $id_user,$total_produk,$total_harga,$total_berat,$id_keranjang,$jumlah,$id_harga;

    public function __construct()
    {
        parent::__construct();
        
    }

    public function getCart($where)
    {
        return $this->db->get_where($this->table,$where);
    }
    
    public function insertCart()
    {
        $this->id_user = 1;
        $this->total_produk = 1;
        $this->total_harga = 1;
        $this->total_berat = 1;
        return $this->db->insert($this->table,$this);
    }
    
    public function insertDetail()
    {
        $data = ['error'=>FALSE,'capt'=>'','data'=>''];
        $where = ['id_user'=>1];
        $id_produk = $this->input->post('id_produk',true);
        $jumlah = $this->input->post('jumlah',true);
        $tipe_harga = $this->input->post('tipe_harga',true);
        $get_keranjang = $this->getCart($where);
        if ($get_keranjang->num_rows() > 0) {
            $data_keranjang = $get_keranjang->row_array();
            $this->db->order_by('min_pembelian', 'ASC');
            $list_harga = $this->db->get_where('harga_jual',['id_tipe'=>$tipe_harga])->row_array();
            if ($jumlah >= $list_harga['min_pembelian']) {
                $this->id_keranjang = $data_keranjang['id_keranjang'];
                $this->jumlah = $jumlah;
                $this->id_harga = $list_harga['harga'];
                $data['data'] = $this->db->insert($this->table_2,$this);
            } else {
                $data['error'] = TRUE;
                $data['capt'] = 'Jumlah Kurang';
            }
        } else {
            $data['data'] = $this->insertCart();
        }
        return $data;
    }

    public function getPrices($id_produk)
    {
        $this->db->select('id_harga,id_produk,harga_jual.id_tipe,harga,tipe_pembeli.nama,min_pembelian');
        $this->db->from('harga_jual');
        $this->db->join('tipe_pembeli', 'tipe_pembeli.id_tipe = harga_jual.id_tipe', 'inner');
        $this->db->where('id_produk', $id_produk);
        return $this->db->get_where();
    }
    
}

/* End of file Detail_produk_model.php */
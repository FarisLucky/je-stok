<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use GuzzleHttp\Client;

class Transaksi_model extends CI_Model 
{
    private $dakota;
    public function __construct() 
    {
        $this->dakota = new Client([
            'base_uri'=>'https://www.dakotacargo.co.id/api/'
        ]);
    }
    public function showData($alamat)
    {
        // Inisiasi Ongkir
        $kota = explode("KABUPATEN ",$alamat['kabupaten']);
        // !Akhir Inisiasi
        $asal_kota="jember";
        $provinsi = $alamat['provinsi'];
        $kabupaten = $kota[1];
        $kecamatan = $alamat['kecamatan'];
        $request = $this->getOngkir($asal_kota,$provinsi,$kabupaten,$kecamatan);
        return json_decode($request->getBody()->getContents(),true);
    }

    public function getKeranjang()
    {
        $keranjang = $this->db->get_where('keranjang',['id_user'=>1])->row_array();
        $this->db->select('produk.id_produk,produk.nama_produk,harga_jual.harga,detail_keranjang.jumlah,produk.satuan_produk,produk.berat');
        $this->db->from('detail_keranjang');
        $this->db->join('harga_jual', 'detail_keranjang.id_harga = harga_jual.id_harga', 'inner');
        $this->db->join('produk', 'harga_jual.id_produk = produk.id_produk', 'inner');
        $this->db->where('id_keranjang', $keranjang['id_keranjang']);
        $produk = $this->db->get()->result_array();

        $foto_produk = [];
        foreach ($produk as $key => $value) {
            $foto = $this->db->get_where('foto_produk',['id_produk'=>$value['id_produk']]);
            $tambah_foto = [];
            if ($foto->num_rows() > 0) {
                $tambah_foto['foto'] = $foto->row_array()['foto'];
            } else {
                $tambah_foto['foto'] = 'default.jpg';
            }
            $tambah_foto['id_produk'] = $value['id_produk'];
            $tambah_foto['nama_produk'] = $value['nama_produk'];
            $tambah_foto['harga'] = $value['harga'];
            $tambah_foto['jumlah'] = $value['jumlah'];
            $tambah_foto['satuan_produk'] = $value['satuan_produk'];
            $tambah_foto['berat'] = $value['berat'];
            $foto_produk[] = $tambah_foto;
        }
        return $foto_produk;
    }
    
    public function getOngkir($asal_kota,$tujuan_provinsi,$tujuan_kota,$tujuan_kecamatan)
    {
        $request = $this->dakota->request('POST','dbs/price/',[
        'query'=>[
            'ak'=>$asal_kota,
            'tpr'=>$tujuan_provinsi,
            'tko'=>$tujuan_kota,
            'tke'=>$tujuan_kecamatan
        ]
        ]);
        return $request;
    }
}

/* End of file Transaksi_model.php */
<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('alamat_model');
        $this->load->model('ModelApp');
        $this->load->model('Transaksi_model');
        $this->load->model('detail_keranjang_model');
        $this->load->model('keranjang_model');
        ceklogincustomer();
    }

    public function index()
    {
        // $data['produk'] = $this->ModelApp->getJoin();
        $keranjang = $this->ModelApp->getJoin()->row_array();
        $id_keranjang = $keranjang['id_produk'];
        // $status_pilih = 'iya';
        $detail_keranjang = $this->ModelApp->getDetailCart($id_keranjang)->result_array();
        $data['produk'] = $this->ModelApp->tampil_foto($detail_keranjang);
        // $data['foto'] = $this->ModelApp->tampil_foto($detail_foto);
        // var_dump($detail_keranjang);
        // echo "<br>";
        // var_dump($data['produk']);
        // exit();
        $this->load->view('frontend/produk/tampil_produk', $data);
    }
}

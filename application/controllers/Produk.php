<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('alamat_model');
        $this->load->model('Produk_model');
    }

    public function index()
    {
        $data_produk = $this->Produk_model->tampil_produk()->result_array();
        $data['produk'] = $this->Produk_model->tampil_foto($data_produk);
        $this->load->view('frontend/produk/tampil_produk', $data);
    }

}
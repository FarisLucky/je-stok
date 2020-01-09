<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('alamat_model');
        $this->load->model('ModelApp');
    }

    public function index()
    {
    	$data['produk'] = $this->ModelApp->getProduk();
    	$this->load->view('frontend/produk/tampil_produk', $data);
    }

}
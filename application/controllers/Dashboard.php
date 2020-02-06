<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Produk_model');
    }

    public function index()
    {
      $data['title'] = 'Dashboard';
      $data_produk = $this->Produk_model->tampil_produk()->result_array();
      $data['products'] = $this->Produk_model->tampil_foto($data_produk);
      $this->load->view('frontend/dashboard/index', $data);
    }
}

/* End of file Dashboard.php */
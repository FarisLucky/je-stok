<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('ModelApp');
    }

    public function index()
    {
        redirect('admin/transaksi/list');
    }
    public function list()
    {
        $data['title'] = 'Transaksi';
        $data['transaksi'] = $this->ModelApp->getData('*','orders')->result_array();
        $this->load->view('backend/transaksi/transaksi_list', $data);
    }
    public function detail($id = '')
    {
        $data['title'] = 'Detail Transaksi';
        $this->load->view('backend/transaksi/transaksi_detail', $data);
    }
}

/* End of file Dashboard.php */

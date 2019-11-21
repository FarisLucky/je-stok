<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'Transaksi';
        $this->load->view('frontend/transaksi/transaksi', $data);
    }
}

/* End of file Dashboard.php */

<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Keranjang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //$this->load->library('form_validation');
        //$this->load->model('ModelApp');
    }

    public function index()
    {
        $data['title'] = 'Sub_Menu';
        // $this->load->view('frontend/keranjang/header', $data);
        $this->load->view('frontend/keranjang/keranjang', $data);
    }

}

/* End of file Dashboard.php */

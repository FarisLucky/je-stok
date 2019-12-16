<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
     public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('ModelApp');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['data'] = $this->ModelApp->tampil('produk',['id_user '=> 1]);
        $this->load->view('frontend/dashboard/index', $data);
    }
}

/* End of file Dashboard.php */

<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'Profil';
        $this->load->view('frontend/profil/profil', $data);
    }
}

/* End of file Dashboard.php */

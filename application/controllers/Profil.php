<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_profil');

    }

    public function index()
    {

        $data['title'] = 'Profil';
        $this->load->view('frontend/profil/profil', $data);
    }

    public function riwayattransaksi()
    {
        $user  = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $id_user = $user['id_user'];
        $data = array(
            'title'  => 'Riwayat Transaksi',
            'riwayat' => $this->M_profil->getData($id_user)
        );
        $this->load->view('frontend/profil/riwayat_transaksi', $data);
    }
}

/* End of file Dashboard.php */

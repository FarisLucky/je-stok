<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        ceklogin();
    }

    public function index()
    {
        $data = array(
            'title' => 'Dashboard',
            'user'  => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array()
        );
        $this->load->view('backend/dashboard/admin', $data);
    }
}

/* End of file Dashboard.php */

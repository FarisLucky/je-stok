<?php

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('backend/auth/login');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->db->get_where('user', ['username' => $username])->row_array();
        //user ada
        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'username' => $user['username'],
                    'id_user_backend' => $user['id_user'],
                    'id_role' => $user['id_role'],
                ];
                $this->session->set_userdata($data);
                if ($user['id_role'] ==  1) {
                    $this->session->set_userdata($data);
                    redirect('admin/dashboard');
                } elseif ($user['id_role'] ==  3) {
                    $this->session->set_userdata($data);
                    redirect('admin/tampilansupplier');
                } elseif ($user['id_role'] ==  2) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username Tidak Terdaftar</div>');
                    redirect('Admin/auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password</div>');
                redirect('admin/auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username Belum Terdaftar</div>');
            redirect('admin/auth');
        }
    }
    function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('id_role');
        redirect('admin/auth');
    }
}

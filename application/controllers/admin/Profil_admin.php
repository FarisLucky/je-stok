<?php


defined('BASEPATH') or exit('No direct script access allowed');

class profil_admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('ModelApp');
        $this->load->model('profil_adminM');
        ceklogin();
    }

    public function index()
    {
        $data['title'] = 'Profil Admin || Je-stok';
        $data['profil'] = $this->profil_adminM->getAdmin()->row_array();
        $this->load->view('backend/profil/profil_admin', $data);
    }
    public function ubah($id_user)
    {
        $data['title'] = 'Ubah profil';
        $data['profil'] = $this->profil_adminM->getAdmin()->row_array();
        $this->load->view('backend/profil/profil_admin_ubah', $data);
    }
    public function coreUbah()
    {
        $id_user = $this->input->post('input_hidden',true);
        $validate_rules = $this->profil_adminM->validate();
        $this->form_validation->set_rules($validate_rules);
        if ($this->form_validation->run() === FALSE) {
            $this->ubah($id_user);
        } else {
            $update = $this->profil_adminM->updateAdmin();
            if ($update) {
                $this->session->set_flashdata('success', 'Data Berhasil diubah');
                redirect('admin/profil_admin');
            } else {
                $this->session->set_flashdata('failed', 'Data gagal diubah');
                redirect('admin/profil_admin/ubah' . $id_user);
            }
        }
    }
}

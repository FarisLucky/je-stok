<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Profil_supplier extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('ModelApp');
        $this->load->helper('url');
        ceklogin();
    }

    public function index()
    {
        $data = array(
            'title' => 'Profil Supplier',
            'user'  => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array()
        );
        $select = '*';
        $tbl = 'user';
        $data['profil'] = $this->ModelApp->getData($select, $tbl)->result_array();
        $this->load->view('backend/profil/profil_supplier', $data);
    }
    public function ubah($id_user)
    {
        $data['title'] = 'Ubah supplier Admin';
        $select = '*';
        $tbl = 'user';
        $where = ['id_user' => $id_user];
        $data['profil'] = $this->ModelApp->getData($select, $tbl, $where)->row_array();
        $this->load->view('backend/profil/profil_supplier_ubah', $data);
    }
    public function coreUbah()
    {
        $id_user = $this->input->post('input_hidden', true);
        $select = '*';
        $tbl = 'user';
        $where = ['id_user' => $id_user];
        $get_supplier = $this->ModelApp->getData($select, $tbl, $where);
        if ($get_supplier->num_rows() > 0) {

            // Inisiasi Validasi Input Codeigniter
            $validasi = $this->validate();
            $this->form_validation->set_rules($validasi);

            if ($this->form_validation->run() == FALSE) {

                $this->ubah($id_user);
            } else {

                $data_input = [
                    'nama_lengkap' => $this->input->post('i_nama_admin', true),
                    'username' => $this->input->post('i_username_admin', true),
                    'email' => $this->input->post('i_email_admin', true),
                    'password' => $this->input->post('i_password_admin', true),
                    'telp' => $this->input->post('i_telepon_admin', true),
                    'foto' => $this->input->post('i_foto_admin', true),
                ];
                $ubah_admin = $this->ModelApp->updateData($data_input, $tbl, $where);

                if ($ubah_admin) {

                    $this->session->set_flashdata('success', 'Data Berhasil diubah');
                    redirect('admin/profil_supplier/ubah/' . $id_user);
                } else {

                    $this->session->set_flashdata('failed', 'Data gagal diubah');
                    redirect('admin/profil_supplier/ubah' . $id_user);
                }
            }
        } else {

            $data['heading'] = 'Kesalahan 504';
            $data['message'] = 'Data tidak ditemukan';
            $this->load->view('errors/error_user', $data);
        }
    }
    public function validate()
    {
        return [
            [
                'field' => 'i_nama_admin',
                'label' => 'Nama',
                'rules' => 'required',
            ],
            [
                'field' => 'i_username_admin',
                'label' => 'Alamat',
                'rules' => 'required',
            ],
            [
                'field' => 'i_email_admin',
                'label' => 'email',
                'rules' => 'required',
            ],
            [
                'field' => 'i_password_admin',
                'label' => 'password',
                'rules' => 'required',
            ],
            [
                'field' => 'i_telepon_admin',
                'label' => 'telepon',
                'rules' => 'required',
            ]
        ];
    }
}

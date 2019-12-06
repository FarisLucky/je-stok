<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('ModelApp');
        ceklogin();
    }
    public function index()
    {
        $data = array(
            'title' => 'Profil',
            'user'  => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array()
        );
        $select = '*';
        $tbl = 'perusahaan';
        $data['profil'] = $this->ModelApp->getData($select, $tbl)->result_array();
        $this->load->view('backend/profil/profil_perusahaan', $data);
    }


    public function ubah($id_perusahaan)
    {
        $data['title'] = 'Ubah profil';
        $select = '*';
        $tbl = 'perusahaan';
        $where = ['id_perusahaan' => $id_perusahaan];
        $data['profil'] = $this->ModelApp->getData($select, $tbl, $where)->row_array();
        $this->load->view('backend/profil/profil_ubah', $data);
    }
    public function coreUbah()
    {
        $id_perusahaan = $this->input->post('input_hidden', true);
        $select = '*';
        $tbl = 'perusahaan';
        $where = ['id_perusahaan' => $id_perusahaan];
        $get_profil = $this->ModelApp->getData($select, $tbl, $where);
        if ($get_profil->num_rows() > 0) {

            // Inisiasi Validasi Input Codeigniter
            $validasi = $this->validate();
            $this->form_validation->set_rules($validasi);

            if ($this->form_validation->run() == FALSE) {

                $this->ubah($id_perusahaan);
            } else {

                $data_input = [
                    'nama' => $this->input->post('i_nama_profil', true),
                    'telp' => $this->input->post('i_telp_profil', true),
                    'alamat_lengkap' => $this->input->post('i_alamat_profil', true),
                    'id_provinsi' => $this->input->post('i_provinsi_profil', true),
                    'id_kota' => $this->input->post('i_kota_profil', true),
                    'id_kecamatan' => $this->input->post('i_kecamatan_profil', true),
                    'kode_pos' => $this->input->post('i_kode_pos', true)
                ];
                $ubah_profil = $this->ModelApp->updateData($data_input, $tbl, $where);

                if ($ubah_profil) {

                    $this->session->set_flashdata('success', 'Data Berhasil diubah');
                    redirect('admin/profil/ubah/' . $id_perusahaan);
                } else {

                    $this->session->set_flashdata('failed', 'Data gagal diubah');
                    redirect('admin/profil/ubah' . $id_perusahaan);
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
                'field' => 'i_nama_profil',
                'label' => 'Nama perusahaan',
                'rules' => 'required',
            ],
            [
                'field' => 'i_telp_profil',
                'label' => 'Alamat',
                'rules' => 'required',
            ],
            [
                'field' => 'i_alamat_profil',
                'label' => 'Alamat',
                'rules' => 'required',
            ],
            [
                'field' => 'i_provinsi_profil',
                'label' => 'provinsi',
                'rules' => 'required',
            ],
            [
                'field' => 'i_kota_profil',
                'label' => 'kota',
                'rules' => 'required',
            ],
            [
                'field' => 'i_kecamatan_profil',
                'label' => 'kecamatan',
                'rules' => 'required',
            ],
            [
                'field' => 'i_kode_pos',
                'label' => 'Kode pos',
                'rules' => 'required',
            ]
        ];
    }
}

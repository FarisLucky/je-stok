<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('ModelApp');
        $this->load->model('perusahaan_model');
        ceklogin();
    }
    public function index()
    {
        $data['title'] = 'Perusahaan || J-stok';
        $data['profil'] = $this->perusahaan_model->getCompany()->row_array();
        $this->load->view('backend/profil/profil_perusahaan', $data);
    }


    public function ubah($id_perusahaan)
    {
        $this->load->model('provinsi_model');
        $this->load->model('kabupaten_model');
        $this->load->model('kecamatan_model');
        $data['title'] = 'Ubah profil';
        $data['profil'] = $this->perusahaan_model->getCompany()->row_array();
        $data['provinsi'] = $this->provinsi_model->getProvinsi()->result_array();
        $id_provinsi = $data['profil']['id_provinsi'];
        $data['kabupaten'] = $this->kabupaten_model->getWhereKabupaten(['id_provinsi'=>$id_provinsi])->result_array();
        $id_kabupaten = $data['profil']['id_kabupaten'];
        $data['kecamatan'] = $this->kecamatan_model->getWhereKecamatan(['id_kabupaten'=>$id_kabupaten])->result_array();
        $this->load->view('backend/profil/profil_ubah', $data);
    }
    public function coreUbah()
    {
        $id_perusahaan = $this->input->post('input_hidden',true);
        $validate_rules = $this->perusahaan_model->validate();
        $this->form_validation->set_rules($validate_rules);
        if ($this->form_validation->run() === FALSE) {
            $this->ubah($id_perusahaan);
        } else {
            $update = $this->perusahaan_model->updateCompany();
            if ($update) {
                $this->session->set_flashdata('success', 'Data Berhasil diubah');
                redirect('admin/profil');
            } else {
                $this->session->set_flashdata('failed', 'Data gagal diubah');
                redirect('admin/profil/ubah' . $id_perusahaan);
            }
        }
    }

    public function kabupaten($id_provinsi)
    {
        $this->load->model('kabupaten_model');
        $data_json = [
            'status'=>false,
            'data' =>'tidak ditemukan'
        ];
        $where = ['id_provinsi'=>$id_provinsi];
        $get_kabupaten = $this->kabupaten_model->getWhereKabupaten($where);
        if ($get_kabupaten->num_rows() > 0) {
            $data_kabupaten = $get_kabupaten->result_array();
            $data_json = [
                'status'=>true,
                'data'=>$data_kabupaten,
            ];
            $this->output->set_content_type('application/json')->set_output(json_encode($data_json));
        }
    }
    
    public function kecamatan($id_kabupaten)
    {
        $this->load->model('kecamatan_model');
        $data_json = [
            'status'=>false,
            'data' =>'tidak ditemukan'
        ];
        $where = ['id_kabupaten'=>$id_kabupaten];
        $get_kabupaten = $this->kecamatan_model->getWhereKecamatan($where);
        if ($get_kabupaten->num_rows() > 0) {
            $data_kabupaten = $get_kabupaten->result_array();
            $data_json = [
                'status'=>true,
                'data'=>$data_kabupaten,
            ];
            $this->output->set_content_type('application/json')->set_output(json_encode($data_json));
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
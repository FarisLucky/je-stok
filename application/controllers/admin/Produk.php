<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('ModelApp');
        $this->load->model('produk_model');
        ceklogin();
    }

    public function index($num = 0)
    {
        $model_produk = $this->produk_model;
        $data = $model_produk->getProduk($num);
        $this->load->view('backend/produk/produk', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Produk';
        $data['supplier'] = $this->produk_model->tampilSupplier();
        $this->load->view('backend/produk/produk_tambah', $data);
    }
    public function ubah($id_produk)
    {
        $model_produk = $this->produk_model;
        $data['title'] = 'Ubah Produk';
        $where = ['id_produk' => $id_produk];
        $data['supplier'] = $model_produk->tampilSupplier();
        $data['produk'] = $model_produk->getWhereProduk($where)->row_array();
        $data['foto'] = $model_produk->getPhoto($where)->result_array();
        $this->load->view('backend/produk/produk_ubah', $data);
    }
    public function coreTambah()
    {
        $model_produk = $this->produk_model;
        $validasi = $model_produk->validate();
        $this->form_validation->set_rules($validasi);
        if ($this->form_validation->run() === FALSE) {
            $this->tambah();
        } else {
            $tambah = $model_produk->insertProduk();
            if ($tambah) {
                $this->session->set_flashdata('success', 'Data Berhasil ditambahkan');
                redirect('admin/produk/tambah');
            } else {
                $this->session->set_flashdata('failed', 'Data gagal ditambahkan');
                redirect('admin/produk/tambah');
            }
        }
    }
    public function coreUbah()
    {
        $model_produk = $this->produk_model;
        $id_produk = $this->input->post('input_hidden', true);
        $validasi = $model_produk->validate();
        $this->form_validation->set_rules($validasi);
        if ($this->form_validation->run() === FALSE) {
            $this->ubah($id_produk);
        } else {
            $tambah_menu = $model_produk->updateProduk($id_produk);
            if ($tambah_menu) {
                $this->session->set_flashdata('success', 'Data Berhasil diubah');
                redirect('admin/produk/ubah/' . $id_produk);
            } else {
                // var_dump($_POST);
                $this->session->set_flashdata('failed', 'Data gagal diubah');
                redirect('admin/produk/ubah/' . $id_produk);
            }
        }
    }

    public function hapus($id_produk)
    {
        $model_produk = $this->produk_model;
        $delete_data = $model_produk->deleteProduk($id_produk);
        if ($delete_data === TRUE) {
            $this->session->set_flashdata('success', 'Data Berhasil dihapus');
            redirect('admin/produk');
        } else {
            $this->session->set_flashdata('failed', 'Data gagal dihapus');
            redirect('admin/produk');
        }
    }

    public function uploadFoto()
    {
        $data_produk = $this->input->post('input_hidden',true);
        $model_produk = $this->produk_model;
        $upload_foto = $model_produk->uploadPhoto();
        if ($upload_foto['error'] === TRUE) {
            $this->session->set_flashdata('failed', $upload_foto['capt_error']);
            redirect('admin/produk/ubah/' . $data_produk);
        } else {
            $this->session->set_flashdata('success', 'Data Berhasil diupload');
            redirect('admin/produk/ubah/' . $data_produk);
        }
    }

    public function ubahFoto()
    {
        $data_produk = $this->input->post('input_hidden',true);
        $model_produk = $this->produk_model;
        $upload_foto = $model_produk->changePhoto();
        if ($upload_foto['error'] === TRUE) {
            $this->session->set_flashdata('failed', $upload_foto['capt_error']);
            redirect('admin/produk/ubah/' . $upload_foto['id_produk']);
        } elseif ($upload_foto['empty'] === TRUE) {
            $data['heading'] = 'Kesalahan 504';
            $data['message'] = 'Data tidak ditemukan';
            $this->load->view('errors/error_user', $data);
        } else {
            $this->session->set_flashdata('success', 'Data Berhasil diupload');
            redirect('admin/produk/ubah/' . $upload_foto['id_produk']);
        }
    }

    public function hapusFoto($id_foto)
    {
        $data_produk = $this->input->post('input_hidden',true);
        $model_produk = $this->produk_model;
        $hapus_foto = $model_produk->deletePhoto($id_foto);
        if ($hapus_foto['error'] === TRUE) {
            $data['heading'] = 'Kesalahan 504';
            $data['message'] = 'Data tidak ditemukan';
            $this->load->view('errors/error_user', $data);
        } else {
            $this->session->set_flashdata('success', 'Data Berhasil diupload');
            redirect('admin/produk/ubah/' . $hapus_foto['id_produk']);
        }
    }

    public function dataFoto($id_foto)
    {
        $data_produk = $this->input->post('input_hidden',true);
        $model_produk = $this->produk_model;
        $where = ['id_foto'=>$id_foto];
        $get_foto = $model_produk->getPhoto($where);
        if ($get_foto->num_rows() > 0) {
            $data_foto = $get_foto->row_array();
            echo json_encode(['foto' => $data_foto['foto'], 'id_foto' => $data_foto['id_foto']]);
        } else {
            $data['heading'] = 'Kesalahan 504';
            $data['message'] = 'Data tidak ditemukan';
            $this->load->view('errors/error_user', $data);
        }
    }

    private function pagination()
    {
        $this->load->library('pagination');

        $config['base_url'] = base_url('admin/produk/index/');
        $config['total_rows'] = $this->ModelApp->getData('id_produk', 'produk')->num_rows();
        $config['use_page_numbers'] = TRUE;
        $config['per_page'] = 10;
        $config['num_links'] = 4;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = 'Awal';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tag_close'] = '</span></li>';
        $config['last_link'] = 'Akhir';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tag_close'] = '</span></li>';
        $config['next_link'] = '&raquo;';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tag_close'] = '</span></li>';
        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '</span></li>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';

        $this->pagination->initialize($config);
    }
}

/* End of file Dashboard.php */

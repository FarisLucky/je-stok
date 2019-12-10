<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
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
            'title' => 'Kategori',
            'user'  => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array()
        );
        $select = '*';
        $tbl = 'kategori';
        $tbl2 = 'sub_menu';
        $data['katgor'] = $this->ModelApp->getData($select, $tbl)->result_array();
        $data['sub_menu'] = $this->ModelApp->getData($select, $tbl2)->result_array();
        $this->load->view('backend/kategori/kategori', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Kategori';
        $data['user']  = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $select = '*';
        $tbl2 = 'sub_menu';
        $data['sub_menu'] = $this->ModelApp->getData($select, $tbl2)->result_array();
        $this->load->view('backend/kategori/kategori_tambah', $data);
    }
    public function ubah($id_kategori)
    {
        $data['title'] = 'Ubah Kategori';
        $select = '*';
        $tbl = 'kategori';
        $where = ['id_kategori' => $id_kategori];
        $data['katgor'] = $this->ModelApp->getData($select, $tbl, $where)->row_array();
        $tbl2 = 'sub_menu';
        $data['sub_menu'] = $this->ModelApp->getData($select, $tbl2)->result_array();
        $this->load->view('backend/kategori/kategori_ubah', $data);
    }
    public function coreTambah()
    {
        $this->form_validation->set_rules('i_nama_kategori', 'Nama Kategori', 'trim|required|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('i_sub_menu', 'Sub Menu', 'trim|required');
        if ($this->form_validation->run() == FALSE) {

            $this->tambah();
        } else {

            $input_nama = $this->input->post('i_nama_kategori', true);
            $input_sub_menu = $this->input->post('i_sub_menu', true);
            $data_input = ['id_sub_menu' => $input_sub_menu];
            $data_input += ['nama' => $input_nama];
            $tbl = 'kategori';
            $tambah_menu = $this->ModelApp->insertData($data_input, $tbl);

            if ($tambah_menu) {

                $this->session->set_flashdata('success', 'Data Berhasil ditambahkan');
                redirect('admin/kategori/tambah');
            } else {

                $this->session->set_flashdata('failed', 'Data gagal ditambahkan');
                redirect('admin/kategori/tambah');
            }
        }
    }
    public function coreUbah()
    {
        $id_kategori = $this->input->post('input_hidden', true);
        $select = '*';
        $tbl = 'kategori';
        $where = ['id_kategori' => $id_kategori];
        $get_menu = $this->ModelApp->getData($select, $tbl, $where);
        if ($get_menu->num_rows() > 0) {

            $this->form_validation->set_rules('i_nama_kategori', 'Nama Kategori', 'trim|required|min_length[3]|max_length[50]');
            $this->form_validation->set_rules('i_sub_menu', 'Sub Menu', 'trim|required');
            if ($this->form_validation->run() == FALSE) {

                $this->ubah($id_kategori);
            } else {

                $input_nama = $this->input->post('i_nama_kategori', true);
                $input_sub_menu = $this->input->post('i_sub_menu', true);
                $data_input = ['id_sub_menu' => $input_sub_menu];
                $data_input += ['nama' => $input_nama];
                $tambah_kategori = $this->ModelApp->updateData($data_input, $tbl, $where);

                if ($tambah_kategori) {

                    $this->session->set_flashdata('success', 'Data Berhasil diubah');
                    redirect('admin/kategori/ubah/' . $id_kategori);
                } else {

                    $this->session->set_flashdata('failed', 'Data gagal diubah');
                    redirect('admin/kategori/ubah' . $id_kategori);
                }
            }
        } else {

            $data['heading'] = 'Kesalahan 504';
            $data['message'] = 'Data tidak ditemukan';
            $this->load->view('errors/error_user', $data);
        }
    }

    public function hapus($id_kategori)
    {
        $select = '*';
        $tbl = 'kategori';
        $where = ['id_kategori' => $id_kategori];
        $get_menu = $this->ModelApp->getData($select, $tbl, $where);
        if ($get_menu->num_rows() > 0) {

            $hapus_kategori = $this->ModelApp->deleteData($where, $tbl);
            if ($hapus_kategori) {

                $this->session->set_flashdata('success', 'Data Berhasil dihapus');
                redirect('admin/kategori');
            } else {

                $this->session->set_flashdata('failed', 'Data gagal dihapus');
                redirect('admin/kategori');
            }
        } else {
            $data['heading'] = 'Kesalahan 504';
            $data['message'] = 'Data tidak ditemukan';
            $this->load->view('errors/error_user', $data);
        }
    }
}

/* End of file Dashboard.php */

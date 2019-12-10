<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
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
            'title' => 'Menu',
            'user'  => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array()
        );
        $select = '*';
        $tbl = 'menu_grup';
        $data['menu'] = $this->ModelApp->getData($select, $tbl)->result_array();
        $this->load->view('backend/menu/menu', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Menu';
        $this->load->view('backend/menu/menu_tambah', $data);
    }
    public function ubah($id_menu)
    {
        $data['title'] = 'Ubah Menu';
        $select = '*';
        $tbl = 'menu_grup';
        $where = ['id_menu' => $id_menu];
        $data['menu'] = $this->ModelApp->getData($select, $tbl, $where)->row_array();
        $this->load->view('backend/menu/menu_ubah', $data);
    }
    public function coreTambah()
    {
        $this->form_validation->set_rules('i_nama_menu', 'Nama Menu', 'trim|required|min_length[3]|max_length[50]');

        if ($this->form_validation->run() == FALSE) {

            $this->tambah();
        } else {

            $input_nama = $this->input->post('i_nama_menu', true);
            $data_input = ['nama' => $input_nama];
            $tbl = 'menu_grup';
            $tambah_menu = $this->ModelApp->insertData($data_input, $tbl);

            if ($tambah_menu) {

                $this->session->set_flashdata('success', 'Data Berhasil ditambahkan');
                redirect('admin/menu/tambah');
            } else {

                $this->session->set_flashdata('failed', 'Data gagal ditambahkan');
                redirect('admin/menu/tambah');
            }
        }
    }
    public function coreUbah()
    {
        $id_menu = $this->input->post('input_hidden', true);
        $select = '*';
        $tbl = 'menu_grup';
        $where = ['id_menu' => $id_menu];
        $get_menu = $this->ModelApp->getData($select, $tbl, $where);
        if ($get_menu->num_rows() > 0) {

            $this->form_validation->set_rules('i_nama_menu', 'Nama Menu', 'trim|required|min_length[3]|max_length[50]');

            if ($this->form_validation->run() == FALSE) {

                $this->ubah($id_menu);
            } else {

                $input_nama = $this->input->post('i_nama_menu', true);
                $data_input = ['nama' => $input_nama];
                $tambah_menu = $this->ModelApp->updateData($data_input, $tbl, $where);

                if ($tambah_menu) {

                    $this->session->set_flashdata('success', 'Data Berhasil diubah');
                    redirect('admin/menu/ubah/' . $id_menu);
                } else {

                    $this->session->set_flashdata('failed', 'Data gagal diubah');
                    redirect('admin/menu/ubah' . $id_menu);
                }
            }
        } else {

            $data['heading'] = 'Kesalahan 504';
            $data['message'] = 'Data tidak ditemukan';
            $this->load->view('errors/error_user', $data);
        }
    }

    public function hapus($id_menu)
    {
        $select = '*';
        $tbl = 'menu_grup';
        $where = ['id_menu' => $id_menu];
        $get_menu = $this->ModelApp->getData($select, $tbl, $where);
        if ($get_menu->num_rows() > 0) {

            $hapus_menu = $this->ModelApp->deleteData($where, $tbl);
            if ($hapus_menu) {

                $this->session->set_flashdata('success', 'Data Berhasil dihapus');
                redirect('admin/menu');
            } else {

                $this->session->set_flashdata('failed', 'Data gagal dihapus');
                redirect('admin/menu');
            }
        } else {
            $data['heading'] = 'Kesalahan 504';
            $data['message'] = 'Data tidak ditemukan';
            $this->load->view('errors/error_user', $data);
        }
    }
}

/* End of file Dashboard.php */

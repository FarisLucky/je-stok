<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Sub_Menu extends CI_Controller
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
            'title' => 'Sub Menu',
            'user'  => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array()
        );
        $select = '*';
        $tbl = 'sub_menu';
        $tbl2 = 'menu_grup';
        $data['submen'] = $this->ModelApp->getData($select, $tbl)->result_array();
        $data['menu'] = $this->ModelApp->getData($select, $tbl2)->result_array();
        $this->load->view('backend/sub_menu/sub_menu', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Menu';
        $select = '*';
        $tbl2 = 'menu_grup';
        $data['menu'] = $this->ModelApp->getData($select, $tbl2)->result_array();
        $this->load->view('backend/sub_menu/sub_menu_tambah', $data);
    }
    public function ubah($id_sub_menu)
    {
        $data['title'] = 'Ubah Menu';
        $select = '*';
        $tbl = 'sub_menu';
        $tbl2 = 'menu_grup';
        $where = ['id_sub_menu' => $id_sub_menu];
        $data['submen'] = $this->ModelApp->getData($select, $tbl, $where)->row_array();
        $data['menu'] = $this->ModelApp->getData($select, $tbl2)->result_array();
        $this->load->view('backend/sub_menu/sub_menu_ubah', $data);
    }
    public function coreTambah()
    {
        $this->form_validation->set_rules('i_nama_sub_menu', 'Nama Sub Menu', 'trim|required|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('i_menu', 'Menu', 'trim|required');

        if ($this->form_validation->run() == FALSE) {

            $this->tambah();
        } else {

            $input_nama = $this->input->post('i_nama_sub_menu', true);
            $input_menu = $this->input->post('i_menu', true);
            $data_input = ['id_menu' => $input_menu];
            $data_input += ['nama' => $input_nama];
            $tbl = 'sub_menu';
            $tambah_menu = $this->ModelApp->insertData($data_input, $tbl);

            if ($tambah_menu) {

                $this->session->set_flashdata('success', 'Data Berhasil ditambahkan');
                redirect('admin/sub_menu/tambah');
            } else {

                $this->session->set_flashdata('failed', 'Data gagal ditambahkan');
                redirect('admin/sub_menu/tambah');
            }
        }
    }
    public function coreUbah()
    {
        $id_sub_menu = $this->input->post('input_hidden', true);
        $select = '*';
        $tbl = 'sub_menu';
        $where = ['id_sub_menu' => $id_sub_menu];
        $get_menu = $this->ModelApp->getData($select, $tbl, $where);
        if ($get_menu->num_rows() > 0) {

            $this->form_validation->set_rules('i_nama_sub_menu', 'Nama Sub Menu', 'trim|required|min_length[3]|max_length[50]');
            $this->form_validation->set_rules('i_menu', 'Menu', 'trim|required');

            if ($this->form_validation->run() == FALSE) {

                $this->ubah($id_sub_menu);
            } else {

                $input_nama = $this->input->post('i_nama_sub_menu', true);
                $input_menu = $this->input->post('i_menu', true);
                $data_input = ['id_menu' => $input_menu];
                $data_input += ['nama' => $input_nama];
                $tambah_sub_menu = $this->ModelApp->updateData($data_input, $tbl, $where);

                if ($tambah_sub_menu) {

                    $this->session->set_flashdata('success', 'Data Berhasil diubah');
                    redirect('admin/sub_menu/ubah/' . $id_sub_menu);
                } else {

                    $this->session->set_flashdata('failed', 'Data gagal diubah');
                    redirect('admin/sub_menu/ubah' . $id_sub_menu);
                }
            }
        } else {

            $data['heading'] = 'Kesalahan 504';
            $data['message'] = 'Data tidak ditemukan';
            $this->load->view('errors/error_user', $data);
        }
    }

    public function hapus($id_sub_menu)
    {
        $select = '*';
        $tbl = 'sub_menu';
        $where = ['id_sub_menu' => $id_sub_menu];
        $get_menu = $this->ModelApp->getData($select, $tbl, $where);
        if ($get_menu->num_rows() > 0) {

            $hapus_sub_menu = $this->ModelApp->deleteData($where, $tbl);
            if ($hapus_sub_menu) {

                $this->session->set_flashdata('success', 'Data Berhasil dihapus');
                redirect('admin/sub_menu');
            } else {

                $this->session->set_flashdata('failed', 'Data gagal dihapus');
                redirect('admin/sub_menu');
            }
        } else {
            $data['heading'] = 'Kesalahan 504';
            $data['message'] = 'Data tidak ditemukan';
            $this->load->view('errors/error_user', $data);
        }
    }
}

/* End of file Dashboard.php */

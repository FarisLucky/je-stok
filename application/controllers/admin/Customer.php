<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('ModelApp');
    }

    public function index($num = 0)
    {
        $data['title'] = 'Customer';
        $select = '*';
        $tbl = 'user';
        $order = 'id_user';
        $order_type = 'ASC';
        $where = 'id_role = 2';
        //Pagination control
        $per_page = 10;
        if ($num != 0) {
            $num = ($num - 1) * $per_page;
        }
        $data['user'] = $this->ModelApp->getDataUser($select, $tbl, $where, $order, $order_type, $per_page, $num)->result_array(); //get data customer
        $data['row'] = $num;
        $this->pagination();
        $this->load->view('backend/customer/customer', $data);
    }

    private function pagination()
    {
        $this->load->library('pagination');

        $config['base_url'] = base_url('admin/customer/index/');
        $config['total_rows'] = $this->ModelApp->getData('id_user', 'user')->num_rows();
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
    public function hapus($id_user)
    {
        $select = '*';
        $tbl = 'user';
        $where = ['id_user' => $id_user];
        $get_menu = $this->ModelApp->getData($select, $tbl, $where);
        if ($get_menu->num_rows() > 0) {

            $this->db->trans_start();
            // Hapus User dari tabel user
            $this->ModelApp->deleteData($where, $tbl);
            
            $this->db->trans_complete();
            if ($this->db->trans_status() == TRUE) {

                $this->session->set_flashdata('success', 'Data Berhasil dihapus');
                redirect('admin/customer');
            } else {

                $this->session->set_flashdata('failed', 'Data gagal dihapus');
                redirect('admin/customer');
            }
        } else {
            $data['heading'] = 'Kesalahan 504';
            $data['message'] = 'Data tidak ditemukan';
            $this->load->view('errors/error_user', $data);
        }
    }
}

/* End of file Dashboard.php */

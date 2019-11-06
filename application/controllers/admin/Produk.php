<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('ModelApp');
    }

    public function index($num = 0)
    {
        $data['title'] = 'Produk';
        $select = '*';
        $tbl = 'produk';
        $order = 'id_produk';
        $order_type = 'DESC';
        //Pagination control
        $per_page = 10;
        if ($num != 0) {
            $num = ($num - 1) * $per_page;
        }
        $data['produk'] = $this->ModelApp->getData($select, $tbl, '', $order, $order_type, $per_page, $num)->result_array(); //get data produk
        $data['row'] = $num;
        $this->pagination();
        $this->load->view('backend/produk/produk', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Produk';
        $this->load->view('backend/produk/produk_tambah', $data);
    }
    public function ubah($id_produk)
    {
        $data['title'] = 'Ubah Produk';
        $select = '*';
        $tbl = 'produk';
        $where = ['id_produk' => $id_produk];
        $data['produk'] = $this->ModelApp->getData($select, $tbl, $where)->row_array();
        $this->load->view('backend/produk/produk_ubah', $data);
    }
    public function coreTambah()
    {
        // Inisiasi Upload File Codeigniter
        $config = $this->uploadImg();
        $this->load->library('upload', $config);
        // Inisiasi Validasi Input Codeigniter
        $validasi = $this->validate();
        $this->form_validation->set_rules($validasi);

        if ($this->form_validation->run() == FALSE) {

            $this->tambah();
        } else {

            $data_input = [
                'nama_produk' => $this->input->post('i_nama_produk', true),
                'id_user' => $this->input->post('i_supplier_produk', true),
                'stok' => $this->input->post('i_stok_produk', true),
                'satuan_produk' => $this->input->post('i_satuan_produk', true),
                'berat' => str_replace(',', '.', $this->input->post('i_berat_produk', true)),
                'satuan_berat' => 'kg',
                'expired_date' => $this->input->post('i_expired_produk', true),
                'deskripsi' => $this->input->post('i_deskripsi_produk', true),
            ];
            $tbl = 'produk';
            //Tambah Data Produk
            $tambah = $this->ModelApp->insertData($data_input, $tbl);
            if ($tambah) {

                $this->session->set_flashdata('success', 'Data Berhasil ditambahkan');
                redirect('admin/produk/tambah');
            } else {

                $this->session->set_flashdata('failed', 'ata gagal ditambahkan');
                redirect('admin/produk/tambah');
            }
        }
    }
    public function coreUbah()
    {
        $id_produk = $this->input->post('input_hidden', true);
        $select = '*';
        $tbl = 'produk';
        $where = ['id_produk' => $id_produk];
        $get_produk = $this->ModelApp->getData($select, $tbl, $where);
        if ($get_produk->num_rows() > 0) {

            // Inisiasi Validasi Input Codeigniter
            $validasi = $this->validate();
            $this->form_validation->set_rules($validasi);

            if ($this->form_validation->run() == FALSE) {

                $this->ubah($id_produk);
            } else {

                $data_input = [
                    'nama_produk' => $this->input->post('i_nama_produk', true),
                    'id_user' => $this->input->post('i_supplier_produk', true),
                    'stok' => $this->input->post('i_stok_produk', true),
                    'satuan_produk' => $this->input->post('i_satuan_produk', true),
                    'berat' => str_replace(',', '.', $this->input->post('i_berat_produk', true)),
                    'satuan_berat' => 'kg',
                    'expired_date' => $this->input->post('i_expired_produk', true),
                    'deskripsi' => $this->input->post('i_deskripsi_produk', true),
                ];
                $tambah_menu = $this->ModelApp->updateData($data_input, $tbl, $where);

                if ($tambah_menu) {

                    $this->session->set_flashdata('success', 'Data Berhasil diubah');
                    redirect('admin/produk/ubah/' . $id_produk);
                } else {

                    $this->session->set_flashdata('failed', 'Data gagal diubah');
                    redirect('admin/produk/ubah' . $id_produk);
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
    public function validate()
    {
        return [
            [
                'field' => 'i_nama_produk',
                'label' => 'Nama Produk',
                'rules' => 'required',
            ],
            [
                'field' => 'i_supplier_produk',
                'label' => 'Supplier Produk',
                'rules' => 'required',
            ],
            [
                'field' => 'i_stok_produk',
                'label' => 'Stok Produk',
                'rules' => 'required',
            ],
            [
                'field' => 'i_satuan_produk',
                'label' => 'Satuan Produk',
                'rules' => 'required',
            ],
            [
                'field' => 'i_berat_produk',
                'label' => 'Berat Produk',
                'rules' => 'required',
            ],
            [
                'field' => 'i_deskripsi_produk',
                'label' => 'Deskripsi Produk',
                'rules' => 'required',
            ]
        ];
    }
    function reArrays(&$files)
    {
        $uploads = array();
        foreach ($_FILES as $key0 => $FILES) {
            foreach ($FILES as $key => $value) {
                foreach ($value as $key2 => $value2) {
                    $uploads[$key0][$key2][$key] = $value2;
                }
            }
        }
        $files = $uploads;
        return $uploads; // prevent misuse issue
    }

    private function uploadImg()
    {
        $config['upload_path'] = './assets/uploads/img/foto_produk/';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['encrypt_name'] = true;
        $config['max_size']  = '400';
        $config['max_width']  = '800';
        $config['max_height']  = '600';
        return $config;
    }
}

/* End of file Dashboard.php */


// $id_insert_produk = $this->db->insert_id();
// $foto = $this->reArrays($_FILES);
// $error = '';
// //Tambah foto produk => foto produk bisa lebih dari satu dan disimpan di array makanya di foreach;
// foreach ($foto['i_foto_produk'] as $key => $value) {
//     // apakah foto ada ?
//     if (!empty($value["name"])) {
//         if ($this->upload->do_upload("foto")) {
//             $upload_gambar = $this->upload->data();
//             $foto = $upload_gambar["file_name"];
//             $this->ModelApp->insertData(['id_produk' => $id_insert_produk, 'foto' => $foto], 'foto_produk');
//         } else {
//             $error = $this->upload->display_errors();
//             $this->session->set_flashdata("error", $error);
//             $this->tambah();
//         }
//     }
// }
// $this->db->trans_complete();
// // Apabila salah satu query gagal dijalankan maka false
// if ($this->db->trans_status() === FALSE) {
//     // generate an error... or use the log_message() function to log your error
//     $this->session->set_flashdata('success', 'Data Berhasil ditambahkan');
//     redirect('admin/produk/tambah');
// } else {

//     $tampil_error = empty($error) ? 'Data gagal ditambahkan' : $error;
//     $this->session->set_flashdata('failed', $tampil_error);
//     redirect('admin/produk/tambah');
// }

<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Keranjang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('keranjang_model');
    }

    public function index()
    {
        $this->load->model('Detail_keranjang_model');
        $this->load->model('Harga_jual_model');
        $data['title'] = 'Sub_Menu';
        $data['keranjang'] = $this->keranjang_model->getCart()->row_array();
        $data['items'] = $this->Detail_keranjang_model->getDetailWithPrices($data['keranjang']['id_keranjang']);
        $this->load->view('frontend/keranjang/keranjang', $data);
    }

    public function ubahKeranjang()
    {
        $this->load->model('Detail_keranjang_model');
        $update_keranjang = $this->Detail_keranjang_model->updateCart();
        $this->output->set_content_type('application/json')->set_output(json_encode($update_keranjang));
    }
    public function hapusDetail($id_detail)
    {
        $this->load->model('Detail_keranjang_model');
        $hapus_detail = $this->Detail_keranjang_model->deleteDetail($id_detail);
        if ($hapus_detail) {
            redirect('keranjang');
        } else {
            redirect('keranjang');
        }
    }
    public function hapusSemuaDetail($id_keranjang)
    {
        $this->load->model('Detail_keranjang_model');
        $hapus_detail = $this->Detail_keranjang_model->deleteAllDetail($id_keranjang);
        if ($hapus_detail) {
            // $this->keranjang_model->deleteCart($id_keranjang);
            redirect('keranjang');
        } else {
            redirect('keranjang');
        }
    }

}

/* End of file Dashboard.php */
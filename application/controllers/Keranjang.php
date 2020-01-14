<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Keranjang extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('keranjang_model');
    ceklogincustomer();
  }

  public function index()
  {
    $this->load->model('Detail_keranjang_model');
    $data['title'] = 'Sub_Menu';
    $data['keranjang'] = $this->keranjang_model->getCart()->row_array();
    $detail_keranjang = $this->Detail_keranjang_model->getDetailCart($data['keranjang']['id_keranjang'])->result_array();
    $data['items'] = $this->Detail_keranjang_model->getDetailWithPrices($detail_keranjang);
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
      redirect('keranjang');
    } else {
      redirect('keranjang');
    }
  }

  public function ubahStatusDetail($id_detail, $status)
  {
    $this->load->model('detail_keranjang_model');
    $data['status_produk'] = $this->detail_keranjang_model->updateStatusDetail($id_detail, $status);
    $id_keranjang = (int) $data['status_produk']['detail']->id_keranjang;
    $status_pilih = 'iya';
    $data['detail_keranjang'] = $this->detail_keranjang_model->getDetailCart($id_keranjang, $status_pilih)->result_array();
    return $this->output->set_content_type('application/json')->set_output(json_encode($data));
  }
}

/* End of file Dashboard.php */
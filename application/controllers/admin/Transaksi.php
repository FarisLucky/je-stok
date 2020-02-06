<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    ceklogin();
    $this->load->library('form_validation');
    $this->load->model('transaksi_model');
  }

  public function index()
  {
    redirect('admin/transaksi/list');
  }
  public function list()
  {
    $data['title'] = 'List Transaksi';
    $data['transaksi'] = $this->transaksi_model->getOrders()->result_array();
    $this->load->view('backend/transaksi/transaksi_list', $data);
  }
  public function detail($id)
  {
    $this->load->model('detail_transaksi_model');
    $data['title'] = 'Detail Transaksi';
    $where = ['orders.id_order'=> $id];
    $data['transaksi'] = $this->transaksi_model->getOrders($where)->row_array();
    $id_transaksi = $data['transaksi']['id_order'];
    $data['detail_produk'] = $this->detail_transaksi_model->getDetail($id_transaksi)->result_array();
    $this->load->view('backend/transaksi/transaksi_detail', $data);
  }
  public function konfirmasiBayar($id_order)
  {
    $where = ['id_order'=>$id_order];
    $payment = $this->transaksi_model->adminPaymentConfirm($where);
    if ($payment) {
      $this->session->set_flashdata('success','Berhasil di konfirmasi');
      redirect('admin/transaksi/list');
    } else{
      $this->session->set_flashdata('failed','Gagal di konfirmasi');
      redirect('admin/transaksi/list');
    }
  }
  public function hapusBayar($id_order)
  {
    $where = ['id_order'=>$id_order];
    $payment = $this->transaksi_model->deletePayment($where);
    if ($payment) {
      $this->session->set_flashdata('success','Berhasil di hapus');
      redirect('admin/transaksi/list');
    } else{
      $this->session->set_flashdata('failed','Gagal di hapus');
      redirect('admin/transaksi/list');
    }
  }

  public function inputResi()
  {
    $data = $this->transaksi_model->addResi();
    if ($data) {
      $this->session->set_flashdata('success',"Berhasil ditambahkan");
      redirect('admin/transaksi/list','refresh');
    } else{
      $this->session->set_flashdata('failed',"Gagal ditambahkan");
      redirect('admin/transaksi/list','refresh');
    }
  }
}

/* End of file Dashboard.php */
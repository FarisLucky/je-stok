<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller 
{
  
  public function __construct()
  {
    parent::__construct();
    $this->load->model('pembayaran_model');
  }
  
  public function index()
  {
    $payment = $this->pembayaran_model->getPayment()->row_array();
    $check_payment = $payment['upload_bukti'];
    if (empty($check_payment)) {
      $data['payment'] = $payment;
      $this->load->view('frontend/pembayaran/index',$data);
    } else {
      
      redirect('pembayaran/berhasil','refresh');
      
    }
  }
  
  public function berhasil()
  {
    $payment = $this->pembayaran_model->getPayment()->row_array()['upload_bukti'];
    if (empty($payment)) {
      redirect('pembayaran','refresh');
    } else {
      $this->load->view('frontend/pembayaran/payment_success');
    }
  }
  public function coreBayar()
  {
    $data_payment = $this->pembayaran_model->updatePayment();
    if ($data_payment['error'] === true) {
      $this->session->set_flashdata('failed', $data_payment['capt_error']);
      redirect('pembayaran');
    } else {
      redirect('pembayaran/berhasil');
    }
  }
}
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
    $data['payment'] = $this->pembayaran_model->getPayment()->row_array();
    $this->load->view('frontend/pembayaran/index',$data);
  }
}
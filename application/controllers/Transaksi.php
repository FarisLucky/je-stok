<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('transaksi_model');
    $this->load->model('alamat_model');
  }

  public function index()
  {
    $this->validationCheckout();
    $data['title'] = 'Transaksi';
    $this->load->model('provinsi_model');
    $this->load->model('detail_keranjang_model');
    $this->load->model('keranjang_model');
    $this->load->model('rekening_model');
    $keranjang = $this->keranjang_model->getCart()->row_array();
    $id_keranjang = $keranjang['id_keranjang'];
    $status_pilih = 'iya';
    $detail_keranjang = $this->detail_keranjang_model->getDetailCart($id_keranjang,$status_pilih)->result_array();
    $data['produk'] = $this->transaksi_model->getKeranjang($detail_keranjang);
    $data['alamat'] = $this->alamat_model->getJoinAlamat(['id_user'=>'1'])->row_array();
    $data['provinsi'] = $this->provinsi_model->getProvinsi()->result_array();
    $data['kurir'] = $this->transaksi_model->checkOngkir($data['alamat']);
    $data['rekening'] = $this->rekening_model->getRekening()->result_array();
    $this->load->view('frontend/transaksi/transaksi', $data);
  }

  public function coreAlamat()
  {
    $this->load->library('form_validation');
    $model_alamat = $this->alamat_model; //Inisiasi Provinsi Model
    $data_json = [
      'status'=>false,
      'data'=>[]
    ];
    $config = $model_alamat->validate(); //Load Rules Form Validation from model
    $this->form_validation->set_rules($config);
    if ($this->form_validation->run() == FALSE) {
      foreach ($_POST as $key => $value) {
        $data_json['data'][$key] = form_error($key,'<div class="invalid-feedback">','</div>');
      }
    } else {
      $tambah_alamat = $model_alamat->insertAlamat();
      if ($tambah_alamat) {
        $data_json['status'] = true;
      }
    }
    return $this->output->set_content_type('application/json')->set_output(json_encode($data_json));
  }

  public function alamatUser()
  {
    $data_alamat = $this->alamat_model->getJoinAlamat(['id_user'=>'1','id_tipe_alamat'=>1])->result_array();
    $alamat = $this->transaksi_model->modalAddressComponent($data_alamat);
    $data_json = [
      'status'=>true,
      'data'=>$alamat
    ];
    return $this->output->set_content_type('application/json')->set_output(json_encode($data_json));
  }
  
  public function ubahAlamatTujuan($id)
  {
    $this->load->model('detail_keranjang_model');
    $this->load->model('keranjang_model');
    $keranjang = $this->keranjang_model->getCart()->row_array();
    $detail_keranjang = $this->detail_keranjang_model->getDetailCart($keranjang['id_keranjang'])->result_array();
    $alamat = $this->alamat_model->getJoinAlamat(['id_alamat'=>$id])->row_array();
    $ongkir = $this->transaksi_model->checkOngkir($alamat);
    $grand_total = $this->transaksi_model->grandTotal($detail_keranjang,$ongkir);
    $component_alamat = $this->transaksi_model->addressComponent($alamat);
    $component_ongkir = $this->transaksi_model->ongkirComponent($ongkir);
    $component_total = $this->transaksi_model->totalComponent($grand_total);
    $data = [
      'alamat'=>$component_alamat,
      'ongkir'=>$component_ongkir,
      'grand_total'=>$component_total,
    ];
    return $this->output->set_content_type('application/json')->set_output(json_encode($data));
  }

  public function kabupaten($id_provinsi)
  {
    $this->load->model('kabupaten_model');
    $data_json = [
      'status'=>false,
      'data' =>'tidak ditemukan'
    ];
    $where = ['id_provinsi'=>$id_provinsi];
    $get_kabupaten = $this->kabupaten_model->getWhereKabupaten($where);
    if ($get_kabupaten->num_rows() > 0) {
      $data_kabupaten = $get_kabupaten->result_array();
      $data_json = [
          'status'=>true,
          'data'=>$data_kabupaten,
      ];
      $this->output->set_content_type('application/json')->set_output(json_encode($data_json));
    }
  }

  public function kecamatan($id_kabupaten)
  {
    $this->load->model('kecamatan_model');
    $data_json = [
      'status'=>false,
      'data' =>'tidak ditemukan'
    ];
    $where = ['id_kabupaten'=>$id_kabupaten];
    $get_kabupaten = $this->kecamatan_model->getWhereKecamatan($where);
    if ($get_kabupaten->num_rows() > 0) {
      $data_kabupaten = $get_kabupaten->result_array();
      $data_json = [
          'status'=>true,
          'data'=>$data_kabupaten,
      ];
      $this->output->set_content_type('application/json')->set_output(json_encode($data_json));
    }
  }

  public function coreTransaksi()
  {
    $id_alamat = $this->input->post('alamat_input',true);
    $this->load->model('detail_keranjang_model');
    $this->load->model('keranjang_model');
    $keranjang = $this->keranjang_model->getCart()->row_array();
    $id_keranjang = $keranjang['id_keranjang'];
    $status_pilih = 'iya';
    $detail_keranjang = $this->detail_keranjang_model->getDetailCart($id_keranjang,$status_pilih)->result_array();
    $alamat = $this->alamat_model->getJoinAlamat(['id_alamat'=>$id_alamat])->row_array();
    $check_ongkir = $this->transaksi_model->checkOngkir($alamat);
    $grand_total = $this->transaksi_model->grandTotal($detail_keranjang,$check_ongkir);
    $insert_transaksi = $this->transaksi_model->insertTransaction($alamat,$check_ongkir,$grand_total);
    if ($insert_transaksi === TRUE) {
      $data = [
        'status'=>TRUE,
        'redirect'=>base_url('transaksi/success')
      ];
    } else{
        $data = [
          'status'=>TRUE,
          'redirect'=>base_url('transaksi/failed')
        ];
    }
    $this->output->set_content_type('application/json')->set_output(json_encode($data));
  }

  public function validationCheckout()
  {
    $this->load->model('detail_keranjang_model');
    $this->load->model('keranjang_model');
    $status_pilih = 'iya';
    $keranjang = $this->keranjang_model->getCart()->row_array();
    $detail_keranjang = $this->detail_keranjang_model->getDetailCart($keranjang['id_keranjang'],$status_pilih);
    $data_detail = $detail_keranjang->result_array();
    $total_detail = $detail_keranjang->num_rows();
    $jumlah_produk = $this->detail_keranjang_model->getProduk($data_detail);
    $stok_produk = $this->detail_keranjang_model->checkStokProduk($jumlah_produk);
    $url = base_url('keranjang');
    if ($stok_produk === FALSE) {
      echo '<script>alert("Produk yang dimasukkan melebihi Stok");window.location.href="'.$url.'"</script>';
    } else if($total_detail < 1) {
      echo '<script>alert("Silahkan Tambahkan Produk Untuk Checkout :V");window.location.href="'.$url.'"</script>';
    }
  }

  public function failed()
  {
    $this->load->view('frontend/alert/alert_failed');
  }
  public function success()
  {
    $this->load->view('frontend/alert/trans_success');
  }
}

/* End of file Dashboard.php */
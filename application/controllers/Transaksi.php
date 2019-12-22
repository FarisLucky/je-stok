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
        $this->load->model('provinsi_model');
        $data['title'] = 'Transaksi';
        $model_transaksi = $this->transaksi_model;
        $data['alamat'] = $this->alamat_model->getJoinAlamat(['id_user'=>'1'])->row_array();
        $data['provinsi'] = $this->provinsi_model->getProvinsi()->result_array();
        $data['kurir'] = $this->transaksi_model->showData($data['alamat']);
        $data['produk'] = $this->transaksi_model->getKeranjang();
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
        $data_alamat = $this->alamat_model->getJoinAlamat(['id_user'=>'1'])->result_array();
        $alamat = $this->transaksi_model->modalAddressComponent($data_alamat);
        $data_json = [
            'status'=>true,
            'data'=>$alamat
        ];
        return $this->output->set_content_type('application/json')->set_output(json_encode($data_json));
    }
    
    public function ubahAlamatTujuan($id)
    {
        $alamat = $this->alamat_model->getJoinAlamat(['id_alamat'=>$id])->row_array();
        $key_explode1 = 'KABUPATEN ';
        $key_explode2 = 'KOTA ';
        $kota;
        if (strpos($alamat['kabupaten'],$key_explode1) !== FALSE) {
            $explode = explode($key_explode1,$alamat['kabupaten']);
            $kota = $explode[1];
        } elseif (strpos($alamat['kabupaten'],$key_explode2) !== FALSE) {
            $explode = explode($key_explode2,$alamat['kabupaten']);
            $kota = $explode[1];
        } else {
            $kota = $alamat['kabupaten'];
        }
        $asal_kota = 'jember';
        $tujuan_provinsi = $alamat['provinsi'];
        $tujuan_kota = $kota;
        $tujuan_kecamatan = $alamat['kecamatan'];
        $request_ongkir = $this->transaksi_model->getOngkir($asal_kota,$tujuan_provinsi,$tujuan_kota,$tujuan_kecamatan);
        $ongkir = json_decode($request_ongkir->getBody()->getContents(),true);
        $component_alamat = $this->transaksi_model->addressComponent($alamat);
        $component_ongkir = $this->transaksi_model->ongkirComponent($ongkir);
        $component_total = $this->transaksi_model->totalComponent($ongkir);
        $data = [
            'alamat'=>$component_alamat,
            'ongkir'=>$component_ongkir,
            'grand_total'=>$component_total,
        ];
        return $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public function modalAlamat()
    {
        $data['alamat_user'] = $this->alamat_model->getJoinAlamat(['id_user'=>'1'])->result_array();
        $this->load->view('frontend/transaksi/modal_alamat',$data);
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
        $data = $this->transaksi_model->insertTransaction();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
}

/* End of file Dashboard.php */
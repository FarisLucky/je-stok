<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('alamat_model');
        $this->load->model('Transaksi_model');
    }

    public function index()
    {
        $this->load->model('provinsi_model');
        $model_provinsi = $this->provinsi_model; //Inisiasi Provinsi Model;
        $model_alamat = $this->alamat_model; //Inisiasi Alamat Model;
        $data['title'] = 'Transaksi';
        $where = ['id_user'=>'1'];
        $data['alamat'] = $model_alamat->getJoinAlamat($where)->row_array();
        $data['provinsi'] = $model_provinsi->getProvinsi()->result_array();
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
        $model_alamat = $this->alamat_model;
        $model_transaksi = $this->Transaksi_model;
        $data_alamat = $model_alamat->getJoinAlamat(['id_user'=>'1'])->result_array();
        $data_json = [
            'status'=>true,
            'data'=>$data_alamat
        ];
        return $this->output->set_content_type('application/json')->set_output(json_encode($data_json));
        
    }
    
    public function getAlamatById($id)
    {
        $data_json = [
            'status'=>false,
            'data'=>''
        ];
        $model_alamat = $this->alamat_model;
        $data_json['data'] = $model_alamat->getJoinAlamat(['id_alamat'=>$id])->row_array();
        return $this->output->set_content_type('application/json')->set_output(json_encode($data_json));
        
    }

    public function modalAlamat()
    {
        $model_alamat = $this->alamat_model;
        $data['alamat_user'] = $model_alamat->getJoinAlamat(['id_user'=>'1'])->result_array();
        $this->load->view('frontend/transaksi/modal_alamat',$data);
    }
    public function getOngkir()
    {
        $model_transaksi = $this->Transaksi_model;
        $origin = '160';//jember
        $destination = '114';
        $weight = 1700;
        $courier = 'jne';
        $data_ongkir = $model_transaksi->getCost($origin,$destination,$weight,$courier);
        $json_value = json_decode($data_ongkir->getBody()->getContents(),true);
        echo"<pre>";
        print_r($json_value['rajaongkir']);
        echo"</pre>";
    }

    public function kabupaten($id_provinsi)
    {
        $this->load->model('kabupaten_model');
        $model_kabupaten = $this->kabupaten_model; //Inisiasi Provinsi Model
        $data_json = [
            'status'=>false,
            'data' =>'tidak ditemukan'
        ];
        $where = ['id_provinsi'=>$id_provinsi];
        $get_kabupaten = $model_kabupaten->getWhereKabupaten($where);
        if ($get_kabupaten->num_rows() > 0) {
            $data_kabupaten = $get_kabupaten->result_array();
            $data_json = [
                'status'=>true,
                'data'=>$data_kabupaten,
            ];
            $this->output->set_content_type('application/json')->set_output(json_encode($data_json));
        }
    }
    
}

/* End of file Dashboard.php */
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use GuzzleHttp\Client;

class Transaksi_model extends CI_Model {

  private $raja_ongkir,$raja_ongkir_key = '6aef1e6af3b597e4370f65b4858a853d';
  
  public function __construct()
  {
    parent::__construct();
    $this->raja_ongkir = new Client([
      'base_uri'=>'https://api.rajaongkir.com/starter/'
      ]);
  }

  public function getProvinsi()
  {
    $request = $this->raja_ongkir->request('GET','province',['query'=>['key'=>$this->raja_ongkir_key]]);
    return $request;
  }
  public function insertKabupaten()
  {
    $request = $this->raja_ongkir->request('GET','city',['query'=>['key'=>$this->raja_ongkir_key]]);
    $semua_data = json_decode($request->getBody()->getContents(),true);
    foreach ($semua_data['rajaongkir']['results'] as $key => $value) {
      $this->db->insert('kabupaten',['id_provinsi'=>$value['province_id'],'id_kabupaten'=>$value['city_id'],'kabupaten'=>$value['city_name']]);
    }
    return $this->db->affected_rows();
  }
  public function getKabupaten($id)
  {
    $request = $this->raja_ongkir->request('GET','city',[
      'query'=>[
        'province'=>$id,
        'key'=>$this->raja_ongkir_key
      ]
    ]);
    return $request;
  }
  public function getCost($origin,$destination,$weight,$courier)
  {
    $request = $this->raja_ongkir->request('POST','cost',[
      'form_params'=>[
        'key'=>$this->raja_ongkir_key,
        'origin'=>$origin,
        'weight'=>$weight,
        'destination'=>$destination,
        'courier'=>$courier
      ]
    ]);
    return $request;
  }

  public function getAllOngkir($origin,$destination,$weight)
  {
    $data_ongkir = $this->db->get('kurir')->result_array();
    $all_ongkir = [];
    foreach ($data_ongkir as $key => $value) {
      $raja_ongkir = json_decode($this->getCost($origin,$destination,$weight,$value['kurir'])->getBody()->getContents(),true);
      $all_ongkir[] = $raja_ongkir['rajaongkir']['results'][0];
    }
    return $all_ongkir;
  }
}

/* End of file Transaksi_model.php */
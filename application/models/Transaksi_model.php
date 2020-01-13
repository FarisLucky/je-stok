<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use GuzzleHttp\Client;

class Transaksi_model extends CI_Model 
{
  private $dakota,$table="orders";
  public $id_user,$tujuan_kirim,$asal_kiriman,$total_produk,$total_berat,$satuan_berat,$kode_kurir,$biaya_kirim,$grand_total,$no_rekening,$upload_bukti,$start_bayar,$exp_bayar,$status_pesanan,$pesan_user,$tgl_pengiriman,$tgl_sampai,$no_resi,$tgl_bayar,$tgl_input_bayar,$status_bayar;
  public function __construct() 
  {
    $this->dakota = new Client([
        'base_uri'=>'https://www.dakotacargo.co.id/api/'
    ]);
  }
  public function checkOngkir($alamat)
  {
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
    $request_ongkir = $this->getOngkir($asal_kota,$tujuan_provinsi,$tujuan_kota,$tujuan_kecamatan);
    return json_decode($request_ongkir->getBody()->getContents(),true);
  }
  
  public function insertTransaction($alamat,$check_ongkir,$grand_total)
  {
    $ongkir = $check_ongkir;
    $total = $grand_total;
    $date = new DateTime(); 
    $start = $date->format('Y-m-d H:i:s');
    $plus_day = $date->modify('+2 day');
    $end = $plus_day->format('Y-m-d H:i:s');
    $this->id_user = $_SESSION['id_user'];
    $this->total_produk = $total['total_produk']; 
    $this->total_harga_produk = $total['total_belanja']; 
    $this->total_berat = $total['total_berat']; 
    $this->satuan_berat = 'gram';
    $this->kode_kurir = 1;
    $this->biaya_kirim = $total['final_biaya_kirim'];
    $this->grand_total = $total['grand_total'];
    $this->no_rekening = $this->input->post('i_rekening',true);
    $this->upload_bukti = null;
    $this->start_bayar = $start;
    $this->exp_bayar = $end;
    $this->status_pesanan = 1;
    $this->pesan_user = $this->input->post('txt_deskripsi',true);
    $this->tgl_pengiriman = null;
    $this->tgl_sampai = null;
    $this->no_resi = null;
    $this->tgl_bayar = null;
    $this->tgl_input_bayar = null;
    $this->status_bayar = null;
    // Database Transaction
    $this->db->trans_start();
    $this->tujuan_kirim = $this->addDestination($alamat);
    $this->asal_kiriman = $this->addOriginShipment();
    $this->db->insert($this->table,$this);
    $id_order = $this->db->insert_id();
    $data['id_order'] = $this->db->insert_id();
    $id_keranjang = $this->db->get_where('keranjang',['id_user'=>1])->row_array();
    $where = ['id_keranjang'=>$id_keranjang['id_keranjang'],'status_pilih'=>'iya'];
    $detail_keranjang = $this->getDetailCart($where);
    $detail_produk = $detail_keranjang->result_array();
    foreach($detail_produk as $index => $produk) {
      $data_detail_order = [
        'id_order'=> $id_order,
        'id_produk'=> $produk['id_produk'],
        'jumlah'=> $produk['jumlah'],
        'harga'=> $produk['harga'],
        'total_harga'=> $produk['jumlah'] * $produk['harga']
      ];
      $this->db->insert('detail_order',$data_detail_order);
      $data_update = $produk['stok'] - $produk['jumlah'];
      $this->db->where('id_produk',$produk['id_produk']);
      $this->db->update('produk',['stok'=>$data_update]);
    }
    $this->db->where($where);
    $this->db->delete('detail_keranjang');
    $this->db->trans_complete();
    $data['status'] = $this->db->trans_status();
    return $data;
  }

  public function addDestination($alamat)
  {
    $query_1 = "CREATE TEMPORARY TABLE tmp_table SELECT * FROM alamat WHERE id_alamat = {$alamat['id_alamat']}";
    $query_2 = "UPDATE tmp_table SET id_alamat = NULL,id_tipe_alamat=2";
    $query_3 = "INSERT INTO alamat SELECT * FROM tmp_table";
    $query_4 = "DROP TEMPORARY TABLE IF EXISTS tmp_table;";
    $this->db->query($query_1);
    $this->db->query($query_2);
    $this->db->query($query_3);
    $id_tujuan = $this->db->insert_id();
    $this->db->query($query_4);
    return $id_tujuan;
  }
  
  public function addOriginShipment()
  {
    $address = $this->db->get_where('perusahaan',['id_perusahaan'=>1])->row_array();
    $data = [
      'id_user'=>$_SESSION['id_user'],
      'nama'=>$address['nama'],
      'telp'=>$address['telp'],
      'alamat_lengkap'=>$address['alamat_lengkap'],
      'id_kecamatan'=>$address['id_kecamatan'],
      'kode_pos'=>$address['kode_pos'],
      'id_tipe_alamat'=>3
    ];
    $this->db->insert('alamat',$data);
    return $this->db->insert_id();
  }
  
  public function getDetailCart($where)
  {
    $this->db->select('id_detail,produk.id_produk,produk.nama_produk,harga_jual.harga,detail_keranjang.jumlah,produk.satuan_produk,produk.berat,produk.stok');
    $this->db->from('detail_keranjang');
    $this->db->join('harga_jual', 'detail_keranjang.id_harga = harga_jual.id_harga', 'inner');
    $this->db->join('produk', 'harga_jual.id_produk = produk.id_produk', 'inner');
    $this->db->where($where);
    return $this->db->get();
  }
  public function getKeranjang($detail_keranjang)
  {
    $produk = $detail_keranjang;
    $foto_produk = [];
    foreach ($produk as $key => $value) {
        $foto = $this->db->get_where('foto_produk',['id_produk'=>$value['id_produk']]);
        $tambah_foto = [];
        if ($foto->num_rows() > 0) {
            $tambah_foto['foto'] = $foto->row_array()['foto'];
        } else {
            $tambah_foto['foto'] = 'default.jpg';
        }
        $tambah_foto['id_produk'] = $value['id_produk'];
        $tambah_foto['nama_produk'] = $value['nama_produk'];
        $tambah_foto['harga'] = $value['harga'];
        $tambah_foto['jumlah'] = $value['jumlah'];
        $tambah_foto['satuan_produk'] = $value['satuan_produk'];
        $tambah_foto['berat'] = $value['berat'];
        $foto_produk[] = $tambah_foto;
    }
    return $foto_produk;
  }
  
  public function getOngkir($asal_kota,$tujuan_provinsi,$tujuan_kota,$tujuan_kecamatan)
  {
    $request = $this->dakota->request('POST','dbs/price/',[
    'query'=>[
        'ak'=>$asal_kota,
        'tpr'=>$tujuan_provinsi,
        'tko'=>$tujuan_kota,
        'tke'=>$tujuan_kecamatan
    ]
    ]);
    return $request;
  }

  public function modalAddressComponent($alamat)
  {
    $html = '';
    foreach ($alamat as $key => $value) {
        $html .= '<div class="card mt-2">
        <div class="card-body">
            <div class="d-flex flex-column">
                <div class="form-check">
                    <input type="radio" name="pilih_alamat" class="form-check-input"
                        id="radio'.$value["id_alamat"].'" value="'.$value["id_alamat"].'"
                        required>
                    <label class="form-check-label"
                        for="radio'.$value["id_alamat"].'">'.$value["nama_alamat"].'</label>
                </div>
                <div class="limit"></div>
                <p>'.$value["alamat_lengkap"].'</p>
                <strong>'.$value["telp"].'</strong>
                <i>'.$value["kabupaten"].' - '.$value["provinsi"].'</i>
                <p>Kode Pos'.$value["kode_pos"].'</p>
            </div>
        </div>
    </div>';
    }
    return $html;
  }
  
  public function addressComponent($alamat)
  {
    $html = '
        <input type="hidden" name="alamat_hidden" value="'.$alamat['id_alamat'].'">
        <div class="address-text">
            <span class="fa fa-home mr-1"></span>
            <span id="nama_alamat">'.$alamat['nama_alamat'].'</span>
        </div>
        <div class="address-text">
            <span class="fa fa-address-book mr-1"></span>
            <span id="alamat_lengkap">'.$alamat['alamat_lengkap'].'</span>
        </div>
        <div class="address-text">
            <span class="fa fa-phone mr-1"></span>
            <span class="mb-1" id="telp">'.$alamat['telp'].'</span>
        </div>
        <div class="address-text">
            <span class="fa fa-car mr-1"></span>
            <i id="detail_alamat">'.$alamat['kecamatan'].' - '.$alamat['kabupaten'].' - '.$alamat['provinsi'].'</i>
        </div>
        <div class="address-text">
            <span class="fa fa-envelope mr-1"></span>
            <i id="kode_pos">'.$alamat['kode_pos'].'</i>
        </div>';
    return $html;
  }
  
  public function ongkirComponent($ongkir)
  {
    $html = '<div class="ongkir" id="ongkir_selectx">
        <div class="d-flex flex-column">
            <span class="font-15 weight-500">Dakota Cargo -
                Min('. $ongkir['price'][0]['minkg']." kg" .') </span>
            <span class="font-13 mt-1">harga selanjutnya Rp.
                '. number_format($ongkir['price'][0]['kgnext'],0,',','.') .'/kg
            </span>
        </div>
        <span class="weight-500">Rp.
            '. number_format($ongkir['price'][0]['pokok'],0,',','.') .'</span>
    </div>';
    return $html;
  }

  public function grandTotal($detail_keranjang,$ongkir)
  {
    $produk = $detail_keranjang;
    $total = ['total_belanja'=>0,'total_berat'=>0,'grand_total'=>0,'total_produk'=>0];
    foreach ($produk as $key => $value) {
        $total['total_produk'] += $value['jumlah'];
        $total['total_belanja'] += ($value['harga'] * $value['jumlah']);
        $total['total_berat'] += ($value['berat'] * $value['jumlah']);
    }
    $minimum_dakota = $ongkir['price'][0]['minkg'] * 1000; //minimun berat dakota
    $biaya_kirim = $ongkir['price'][0]['pokok'];
    $biaya_tambahan = $ongkir['price'][0]['kgnext'];
    $total['final_biaya_kirim'] = $biaya_kirim;
    $total_biaya_tambahan = 0;
    if ($total['total_berat'] > $minimum_dakota) {
        $berat_tambahan = $total['total_berat'] - $minimum_dakota;
        $total_berat_tambahan = ceil($berat_tambahan / 1000); //dibagi 1000 gram
        $total_biaya_tambahan = $total_berat_tambahan * $biaya_tambahan;
        $total['final_biaya_kirim'] += $total_biaya_tambahan;
    }
    $total['grand_total'] = $total['total_belanja'] + $total['final_biaya_kirim'];
    return $total;
  }
  public function totalComponent($grand_total)
  {
    $total = $grand_total;
    $html = '<div class="body-box">
    <div class="row-total">
        <div class="d-flex justify-content-between">
            <span>Total Belanja</span>
            <span>Rp '. number_format($total['total_belanja'],0,',','.') .'</span>
        </div>
        <div class="d-flex justify-content-between">
            <span>Total Diskon</span>
            <span>-</span>
        </div>
        <div class="d-flex justify-content-between">
            <span>Total Berat</span>
            <span id="total_biaya_kirim">'. ceil($total['total_berat']/1000) .' kg</span>
        </div>
        <div class="d-flex justify-content-between">
            <span>Total Biaya Kirim</span>
            <span id="total_biaya_kirim">Rp
                '. number_format($total['final_biaya_kirim'],0,',','.') .'</span>
        </div>
        <div class="d-flex justify-content-between">
            <span>Gratis Ongkir</span>
            <span>-</span>
        </div>
        </div>
        </div>
        <div class="limit"></div>
        <div class="footer-box d-flex justify-content-between mx-auto">
            <span class="font-15 weight-500">Total Transaksi</span>
            <span class="font-15 weight-500">Rp
                '. number_format($total['grand_total'],0,',','.') .'</span>
        </div>
        <div class="my-3"></div>
        <div class="process">
            <button class="btn btn-primary w-100 bg-tradic">Lanjutkan</button>
        </div>';
    return $html;
  }
  
  // Ambil Transaksi Admin
  public function getOrders($where)
  {
    $this->db->select('id_order,user.nama_lengkap,tgl_pesan,kurir.kurir,total_produk,total_berat,biaya_kirim,grand_total,orders.status_pesanan,status_pesanan.status,start_bayar,exp_bayar,no_rekening,tgl_bayar,tgl_input_bayar,upload_bukti,no_resi,status_bayar,orders.id_user,satuan_berat,total_harga_produk');
    $this->db->from('orders');
    $this->db->join('user', 'user.id_user = orders.id_user', 'inner');
    $this->db->join('kurir', 'orders.kode_kurir = kurir.id_kurir', 'inner');
    $this->db->join('status_pesanan', 'orders.status_pesanan = status_pesanan.id_status', 'inner');
    $this->db->where($where);
    return $this->db->get();
  }

  public function adminPaymentConfirm($where)
  {
    $this->db->where($where);
    $data_update = [
      'status_bayar'=>'terima',
      'status_pesanan'=>3
    ];
    return $this->db->update($this->table,$data_update);
  }
  public function deletePayment($where)
  {
    $data_update = [
      'status_bayar'=> null,
      'status_pesanan'=>1
    ];
    $this->db->where($where);
    return $this->db->update($this->table,$data_update);
  }
  public function addResi()
  {
    $input_resi = $this->input->post('i_resi',true);
    $input_order = $this->input->post('input_hidden',true);
    $this->db->where('id_order', $input_order);
    return $this->db->update($this->table,['no_resi'=>$input_resi]);
  }

}

/* End of file Transaksi_model.php */
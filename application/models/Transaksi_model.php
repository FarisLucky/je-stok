<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use GuzzleHttp\Client;

class Transaksi_model extends CI_Model 
{
    private $dakota;
    public function __construct() 
    {
        $this->dakota = new Client([
            'base_uri'=>'https://www.dakotacargo.co.id/api/'
        ]);
    }
    public function showData($alamat)
    {
        // Inisiasi Ongkir
        $kota = explode("KABUPATEN ",$alamat['kabupaten']);
        // !Akhir Inisiasi
        $asal_kota="jember";
        $provinsi = $alamat['provinsi'];
        $kabupaten = $kota[1];
        $kecamatan = $alamat['kecamatan'];
        $request = $this->getOngkir($asal_kota,$provinsi,$kabupaten,$kecamatan);
        return json_decode($request->getBody()->getContents(),true);
    }
    
    public function insertTransaction(Type $var = null)
    {
        $id_alamat = $this->input->post('alamat_input',true);
        $query_alamat_tujuan = "CREATE TEMPORARY TABLE tmp_table SELECT * FROM alamat WHERE id_alamat = {$id_alamat};
        UPDATE tmp_table SET id_alamat = NULL,id_tipe_alamat=2;
        INSERT INTO alamat SELECT * FROM tmp_table;
        DROP TEMPORARY TABLE IF EXISTS tmp_table;";
        $insert_alamat = $this->db->query($query_alamat_tujuan);
    }

    public function getKeranjang()
    {
        $keranjang = $this->db->get_where('keranjang',['id_user'=>1])->row_array();
        $this->db->select('produk.id_produk,produk.nama_produk,harga_jual.harga,detail_keranjang.jumlah,produk.satuan_produk,produk.berat');
        $this->db->from('detail_keranjang');
        $this->db->join('harga_jual', 'detail_keranjang.id_harga = harga_jual.id_harga', 'inner');
        $this->db->join('produk', 'harga_jual.id_produk = produk.id_produk', 'inner');
        $this->db->where('id_keranjang', $keranjang['id_keranjang']);
        $produk = $this->db->get()->result_array();

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
            <div class="my-2">
                <span class="fa fa-home"></span>
                <span id="nama_alamat">'.$alamat['nama_alamat'].'</span>
            </div>
            <div class="my-2">
                <span class="fa fa-address-book"></span>
                <span id="alamat_lengkap">'.$alamat['alamat_lengkap'].'</span>
            </div>
            <div class="my-2">
                <span class="fa fa-phone"></span>
                <span class="mb-1" id="telp">'.$alamat['telp'].'</span>
            </div>
            <div class="my-2">
                <span class="fa fa-car"></span>
                <i id="detail_alamat">'.$alamat['kecamatan'].' - '.$alamat['kabupaten'].' - '.$alamat['provinsi'].'</i>
            </div>
            <div class="my-2">
                <span class="fa fa-envelope"></span>
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

    public function grandTotal($ongkir)
    {
        $produk = $this->getKeranjang();
        $total = ['total_belanja'=>0,'total_berat'=>0,'grand_total'=>0];
        foreach ($produk as $key => $value) {
            $total['total_belanja'] += ($value['harga'] * $value['jumlah']);
            $total['total_berat'] += ($value['berat'] * $value['jumlah']);
        }
        $minimum_dakota = $ongkir['price'][0]['minkg'] * 1000; //minimun berat dakota
        $biaya_kirim = $ongkir['price'][0]['pokok'];
        $biaya_tambahan = $ongkir['price'][0]['kgnext'];
        $total['final_biaya_kirim'] = $biaya_kirim;
        $total_biaya_tambahan = 0;
        // var_dump($total['total_berat']);
        // exit();
        if ($total['total_berat'] > $minimum_dakota) {
            $berat_tambahan = $total['total_berat'] - $minimum_dakota;
            $total_berat_tambahan = ceil($berat_tambahan / 1000); //dibagi 1000 gram
            $total_biaya_tambahan = $total_berat_tambahan * $biaya_tambahan;
            $total['final_biaya_kirim'] += $total_biaya_tambahan;
        }
        $total['grand_total'] = $total['total_belanja'] + $total['final_biaya_kirim'];
        return $total;
    }
    public function totalComponent($ongkir)
    {
        $total = $this->grandTotal($ongkir);
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
            <div class="footer-box d-flex justify-content-between">
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
    
}

/* End of file Transaksi_model.php */
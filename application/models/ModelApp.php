<?php


defined('BASEPATH') or exit('No direct script access allowed');

class ModelApp extends CI_Model
{

    public function getData($select, $tbl, $where = null, $order = null, $order_by = null, $limit = null, $offset = null)
    {
        $this->db->select($select);
        $this->db->from($tbl);
        if ($where != null) {
            $this->db->where($where);
        }
        if ($order != null) {
            $this->db->order_by($order, $order_by);
        }
        if ($limit != null) {
            $this->db->limit($limit, $offset);
        }
        return $this->db->get();
    }
    public function getDataUser($select, $tbl, $where = ['id_role' == 2], $order = null, $order_by = null, $role= '2', $limit = null, $offset = null)
    {
        $this->db->select($select);
        $this->db->from($tbl);
        if ($where != 2) {
            $this->db->where($where);
        }
        if ($order != null) {
            $this->db->order_by($order, $order_by);
        }
        if ($limit != null) {
            $this->db->limit($limit, $offset);
        }
        return $this->db->get();
    }
    public function getDataLike($select, $tbl, $like = null, $order = null, $order_by = null, $limit = null, $offset = null, $where = null)
    {
        $this->db->select($select);
        $this->db->from($tbl);
        if ($where != null) {
            $this->db->where($where);
        }
        if ($like != null) {
            foreach ($like as $key => $value) {
                if ($key == 0) {
                    $this->db->like($key, $value);
                } else {
                    $this->db->or_like($key, $value);
                }
            }
        }
        if ($order != null) {
            $this->db->order_by($order, $order_by);
        }
        if ($limit != null) {
            $this->db->limit($limit, $offset);
        }
        return $this->db->get();
    }
    public function getJoinData($select, $tbl, $join, $where = null, $order = null, $order_by = null)
    {
        $this->db->select($select);
        $this->db->from($tbl);
        if (is_array($join)) {
            foreach ($join as $key => $value) {
                $this->db->join($key, $value, 'inner');
            }
        }
        if ($where != null) {
            $this->db->where($where);
        }
        if ($order != null) {
            $this->db->order_by($order, $order_by);
        }
        return $this->db->get();
    }
    public function updateData($data, $tbl, $where)
    {
        $this->db->update($tbl, $data, $where);
        return $this->db->affected_rows();
    }
    public function insertData($data, $tbl)
    {
        $this->db->insert($tbl, $data);
        return $this->db->affected_rows();
    }
    public function deleteData($where, $tbl)
    {
        $this->db->where($where);
        $this->db->delete($tbl);
        return $this->db->affected_rows();
    }

    function tampil($table = null, $where = null)
    {
        return $this->db->get_where($table,$where);
    }

    function tampil_foto($detail_foto) 
    {
        $produk = $detail_foto;
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

    public function getDetailCart($id_keranjang)
    {
        $this->db->select('*');
        $this->db->join('produk', 'harga_jual.id_produk = produk.id_produk');
        $this->db->join('tipe_pembeli', 'harga_jual.id_tipe = tipe_pembeli.id_tipe');
        $this->db->join('foto_produk', 'harga_jual.id_produk = foto_produk.id_produk');
        $this->db->from('harga_jual');
        $this->db->where('harga_jual.id_produk', $id_keranjang);

        return $this->db->get();
    }

    public function getDetailCarwt($where)
    {
        $this->db->select('id_detail,produk.id_produk,produk.nama_produk,harga_jual.harga,detail_keranjang.jumlah,produk.satuan_produk,produk.berat,produk.stok');
        $this->db->from('detail_keranjang');
        $this->db->join('harga_jual', 'detail_keranjang.id_harga = harga_jual.id_harga', 'inner');
        $this->db->join('produk', 'harga_jual.id_produk = produk.id_produk', 'inner');
        $this->db->where($where);
        return $this->db->get();
     }

    function getJoin()
    {
        $this->db->select('*');
        $this->db->join('produk', 'harga_jual.id_produk = produk.id_produk');
        $this->db->join('tipe_pembeli', 'harga_jual.id_tipe = tipe_pembeli.id_tipe');
        $this->db->join('foto_produk', 'harga_jual.id_produk = foto_produk.id_produk');
        $this->db->from('harga_jual');

        return $this->db->get();
        // return $query->result();

    }
}

/* End of file ModelApp.php */
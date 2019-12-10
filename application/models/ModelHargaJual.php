<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelHargaJual extends CI_Model
{

	private $_table = "produk";
	private $_table2= "tipe_pembeli";

	//Menampilkan dropdown tipe pembeli
	public function getPembeli()
    {
        return $this->db->get($this->_table2)->result();
    }

	//menampilkan DB
	public function getAllHarga($id_produk)
	{	
		$this->db->select('harga_jual.*, tipe_pembeli.nama');
        $this->db->from('harga_jual');
        $this->db->join('tipe_pembeli','tipe_pembeli.id_tipe = harga_jual.id_tipe', 'LEFT');
        // $this->db->join('produk','produk.id_produk = harga_jual.id_produk', 'LEFT');
        $this->db->order_by('id_tipe','ASC');
        $this->db->where(array('id_produk' => $id_produk));
        $query = $this->db->get();
        return $query->result_array();
	}

	public function getProdukById($id)
	{
		return $this->db->get_where("produk", ["id_produk"->$id])->row();
	}

	//CREAT = mengisikan data
	public function simpanHargaJual()
	{
		$data = array(
			"id_produk" => $this->input->post("id_produk"),
			"id_tipe"	=> $this->input->post("id_tipe"),
			"harga"		=> $this->input->post("harga"),
			"min_pembelian" => $this->input->post("min_pembelian")
		);
		$this->db->insert("harga_jual", $data);
	}

	public function delete($id)
	{
		return $this->db->delete($this->_table, array("no_rm" => $id));
	}

	function edit_data($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	function update_data($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	function get_jk(){
        $query = $this->db->query("SELECT id_jenis_kelamin as jk,count(id_jenis_kelamin) AS jumlah_jk FROM tb_pasien GROUP BY jk");
         
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
		}
		
	}

	function get_agama(){
        $query = $this->db->query("SELECT id_agama as agama,count(id_agama) AS jumlah_agama FROM tb_pasien GROUP BY agama");
		
         
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
		}
		
	}
}

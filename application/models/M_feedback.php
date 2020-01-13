<?php 

/**
 * 
 */
class M_feedback extends CI_Model
{
	
	function getFeed()
	{
		$this->db->select('produk.nama_produk,orders.id_order,feedback.rating,feedback.deskripsi,feedback.foto');
		$this->db->from('feedback');
		$this->db->join('produk', 'produk.id_produk = feedback.id_produk ');
		$this->db->join('orders', ' orders.id_order = feedback.id_orders ');
		

		$query =$this->db->get();
		return $query->result();

	}


}


?>
<?php 

/**
 * 
 */
class M_feedback extends CI_Model
{
	
	function getFeed()
	{
		$this->db->select('*');
		$this->db->join('produk', 'feedback.id_produk = produk.id_produk');
		$this->db->join('orders', 'feedback.id_orders = orders.id_order');
		$this->db->from('feedback');

		$query =$this->db->get();
		return $query->result();

	}


}


?>
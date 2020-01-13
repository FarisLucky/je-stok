<?php
class M_supplier extends CI_Model

{   

	function getJoinJabatan()
	{
		$this->db->select('*');
		$this->db->join('role', 'user.id_role = role.id_role');
		$this->db->from('user');

		$query =$this->db->get();
		return $query->result();

	}
	function getRole()
	{
		return $this->db->get_Where('role', array('id_role'=>'3'));

	}
	function tampil_data()
	{
		return $this->db->get('user');
	}

	function input_data($data, $table)
	{

		$this->db->insert($table, $data);
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
	function hapus_data($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}


}


?>
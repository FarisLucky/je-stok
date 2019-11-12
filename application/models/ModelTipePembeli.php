<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelTipePembeli extends CI_Model
{

	private $_table = "tb_pasien";
	private $_table2= "tb_agama";
	private $_table3= "tb_pendidikan";
	private $_table4= "tb_pekerjaan";
	private $_table5= "tb_jenis_kelamin";

	public $no_rm;
	public $password;
	public $nama_pasien;
	public $tgl_lahir;
	public $umur;
	public $alamat;
	public $nama_kk;
	public $id_agama;
	public $id_pendidikan;
	public $id_pekerjaan;
	public $id_jenis_kelamin;
	public $no_hp;
	public $NIK;

	public function rules()
	{
		return [
			[
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required'
			],

			[
				'field' => 'nama_pasien',
				'label' => 'Nama Pasien',
				'rules' => 'required'
			],

			[
				'field' => 'tgl_lahir',
				'label' => 'Tanggal Lahir',
				'rules' => 'required'
			],

			[
				'field' => 'umur',
				'label' => 'Umur',
				'rules' => 'required'
			],

			[
				'field' => 'alamat',
				'label' => 'Alamat',
				'rules' => 'required'
			],

			[
				'field' => 'nama_kk',
				'label' => 'Nama KK',
				'rules' => 'required|trim'
			],

			[
				'field' => 'id_agama',
				'label' => 'Agama',
				'rules' => 'required|in_list['.implode(array_keys($data = array("1","2","3","4","5","6","7")),",").']'
			],

			[
				'field' => 'id_pendidikan',
				'label' => 'Pendidikan',
				'rules' => 'required|in_list['.implode(array_keys($data = array("1","2","3","4","5","6","7")),",").']'
			],

			[
				'field' => 'id_pekerjaan',
				'label' => 'Pekerjaan',
				'rules' => 'required|in_list['.implode(array_keys($data = array("1","2","3","4","5","6","7")),",").']'
			],

			[
				'field' => 'id_jenis_kelamin',
				'label' => 'Jenis Kelamin',
				'rules' => 'required|in_list['.implode(array_keys($data = array("1","2","3")),",").']'
			],

			[
				'field' => 'no_hp',
				'label' => 'Nomor HP',
				'rules' => 'required'
			],

			[
				'field' => 'NIK',
				'label' => 'NIK',
				'rules' => 'required'
			],
		];
	}

	//menampilkan DB
	public function getAllData()
	{	
		$this->db->select('*');
        $this->db->from('tipe_pembeli');
        $this->db->order_by('id_tipe','ASC');
        $query = $this->db->get();
        return $query->result_array();
		// return $this->db->get($this->_table)->result();
		//select * from products;
	}

	public function getById($id)
	{
		return $this->db->get_where($this->_table, ["no_rm"->$id])->row();
		//select * from products where product_id=$id;
	}

	//CREAT = mengisikan data
	public function save()
	{
		$post = $this->input->post();
		$this->password = md5($post["password"]);
		$this->nama_pasien = $post["nama_pasien"];
		$this->tgl_lahir = date('Y-m-d',strtotime($post["tgl_lahir"]));
		$this->umur = $post["umur"];
		$this->alamat = $post["alamat"];
		$this->nama_kk = $post["nama_kk"];
		$this->id_agama = $post["id_agama"];
		$this->id_pendidikan = $post["id_pendidikan"];
		$this->id_pekerjaan = $post["id_pekerjaan"];
		$this->id_jenis_kelamin = $post["id_jenis_kelamin"];
		$this->no_hp = $post["no_hp"];
		$this->NIK = $post["NIK"];

		$this->db->insert($this->_table, $this);
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

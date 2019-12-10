<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Harga_Jual extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('ModelHargaJual');
		$this->load->model('ModelApp');
	}

	public function index($num = 0)
	{
        $data['title'] = 'Tabel Harga Jual';
        $select = '*';
        $tbl = 'produk';
        $order = 'id_produk';
        $order_type = 'ASC';
        //Pagination control
        $per_page = 10;
        if ($num != 0) {
            $num = ($num - 1) * $per_page;
        }
        $data['produk'] = $this->ModelApp->getData($select, $tbl, '', $order, $order_type, $per_page, $num)->result_array(); //get data produk
        $data['row'] = $num;
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->pagination();
        $this->load->view('backend/harga_jual/harga_jual', $data);
	}

	private function pagination()
    {
        $this->load->library('pagination');

        $config['base_url'] = base_url('admin/produk/index/');
        $config['total_rows'] = $this->ModelApp->getData('id_produk', 'produk')->num_rows();
        $config['use_page_numbers'] = TRUE;
        $config['per_page'] = 10;
        $config['num_links'] = 4;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = 'Awal';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tag_close'] = '</span></li>';
        $config['last_link'] = 'Akhir';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tag_close'] = '</span></li>';
        $config['next_link'] = '&raquo;';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tag_close'] = '</span></li>';
        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '</span></li>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';

        $this->pagination->initialize($config);
    }

    public function tampilHargaJual($id_produk)
    {
    		$data["title"]  = "Detail Harga Produk";
	    	$data["tipe_pembeli"] = $this->ModelHargaJual->getPembeli();
	    	$data["harga"] = $this->ModelHargaJual->getAllHarga($id_produk);
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
	    	$select = '*';
	        $tbl = 'produk';
	        $where = ['id_produk' => $id_produk];
	        $data['produk'] = $this->ModelApp->getData($select, $tbl, $where)->row_array();
    	$this->pagination();
    	$this->load->view('backend/harga_jual/tampil_harga_jual', $data);
    }

    public function tambahHargaJual()
    {
    	$validasi = $this->validate();
    	$this->form_validation->set_rules($validasi);

    	if ($this->form_validation->run() == FALSE)
    	{
    		$this->tampilHargaJual();
    	} else{

    		$this->ModelHargaJual->simpanHargaJual();
    		redirect('admin/Harga_Jual/tampilHargaJual/'.$this->input->post("id_produk"));
    		
    	}
    }

	public function validate()
    {
        return [
            [
				'field' => 'id_tipe',
				'label' => 'Tipe Pembeli',
				'rules' => 'required|in_list['.implode(array_keys($data = array("1","2","3","4")),",").']'
			],
            [
                'field' => 'harga',
                'label' => 'Harga',
                'rules' => 'required',
            ],
            [
                'field' => 'min_pembelian',
                'label' => 'Minimal Pembelian',
                'rules' => 'required',
            ]
        ];
    }

}

<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Keranjang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //$this->load->library('form_validation');
        //$this->load->model('ModelApp');
    }

    public function index()
    {
        $data['title'] = 'Sub_Menu';
        // $this->load->view('frontend/keranjang/header', $data);
        $this->load->view('frontend/keranjang/keranjang', $data);
    }

    public function addCart()
    {
        if (is_numeric($this->uri->segment(3)))
        {
            $id = $this->uri->segment(3);
            $get = $this->ModelApp->get_where('produk', array('id_produk' => $id))->row();

         $data = array(
            'id' => $get->id_item,
            'name' => $get->nama_item,
            'price' => $get->harga,
            'jumlah' => $get->jumlah
         );

         $this->cart->insert($data);

      
        } else {
            redirect('home');
        }
    }

}

/* End of file Dashboard.php */

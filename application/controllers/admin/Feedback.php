<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Feedback extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('m_feedback');
		ceklogin();
	}

	public function index()

	{
		$data = array(
			'title' => 'Data Feedback',
			'fed' => $this->m_feedback->getFeed(),
			'user'  => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array()
		);

		$this->load->view('backend/partials/navbar', $data);
		$this->load->view('backend/feedback/feedback', $data);
		$this->load->view('backend/partials/footer');
	}

	public function detail()

	{
		$data['detail'] = 'Detail Feedback';

		$this->load->view('backend/partials/navbar', $data);
		$this->load->view('backend/feedback/detail_feedback', $data);
		$this->load->view('backend/partials/footer');
	}
}

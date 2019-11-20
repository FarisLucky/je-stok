<?php 

defined('BASEPATH') or exit('No direct script access allowed');

Class Feedback extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('m_feedback');
	}

	public function index()

	{
		$data['title'] = 'Data Feedback';
		$data['fed'] = $this->m_feedback->getFeed();

		$this->load->view('backend/partials/navbar' ,$data);
		$this->load->view('backend/feedback/feedback', $data);
		$this->load->view('backend/partials/footer');
	}

	public function detail()

	{
		$data['detail'] = 'Detail Feedback';

		$this->load->view('backend/partials/navbar' ,$data);
		$this->load->view('backend/feedback/detail_feedback', $data);
		$this->load->view('backend/partials/footer');
	}

	
}

?>
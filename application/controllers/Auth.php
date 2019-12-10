<?php

class Auth extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}
	function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('frontend/auth/login');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$user = $this->db->get_where('user', ['username' => $username])->row_array();
		//user ada
		if ($user['id_role'] == 3) {
			// if ($user['id_role']) {
			if (password_verify($password, $user['password'])) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">berhasil</div>');
				if ($user['status_active']  == 1) {
					$username = $this->session->userdata('username');
					redirect('dashboard');
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">username belum di aktivasi</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username Belum Terdaftar</div>');
			redirect('auth');
		}
	}
	public function register()
	{
		$this->form_validation->set_rules('name', 'Nama', 'required');
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
		// $this->form_validation->set_rules('contact', 'contact', 'required|numeric|max_length[13]|min_length[10]');
		// $this->form_validation->set_rules('email', 'email', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Tidak Valid</div>');
			$this->load->view('frontend/auth/register');
		} else {
			$this->aksiRegister();
		}
	}

	public function aksiRegister()
	{
		$nama = $this->input->post('name', true);
		$username = $this->input->post('username', true);
		$email = $this->input->post('email', true);
		$password = $this->input->post('password', true);
		$contact = $this->input->post('contact', true);
		$passwordHash = password_hash($password, PASSWORD_DEFAULT);
		$data = array(
			'nama_lengkap' => $nama,
			'username' => $username,
			'email' => $email,
			'password' => $passwordHash,
			'id_role' => '3',
			'status_active' => '0',
			'telp' => $contact
		);
		$table = 'user';
		$this->db->insert($table, $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Registrasi Berhasil,Lakukan Aktivasi Melalui Email</div>');
		redirect('auth/register');
	}


	function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('id_role');
		redirect('auth');
	}
}

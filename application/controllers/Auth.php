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
			$this->load->view('frontend/auth/login1');
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
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|matches[password2]', array('required' => 'Password Baru belum diisi', 'min_length' => 'Minimal 6 Karakter', 'matches' => 'Password yang anda konfirmasi salah'));
		$this->form_validation->set_rules('password2', 'Konfirmasi password baru', 'required|trim|min_length[6]|matches[password]', array('required' => 'Konfirmasi Password kosong', 'min_length' => 'Minimal 6 Karakter', 'matches' => 'Korfirmasi Password salah'));
		$this->form_validation->set_rules('contact', 'contact', 'required|numeric|max_length[13]|min_length[10]');
		$this->form_validation->set_rules('email', 'email', 'required');

		if ($this->form_validation->run() == FALSE) {

			$this->load->view('frontend/auth/register1');
		} else {
			$this->aksiRegister();
		}
	}

	public function aksiRegister()
	{
		$nama = $this->input->post('name', true);
		$username = $this->input->post('username', true);
		$email = $this->input->post('email', true);
		$password = $this->input->post('password2', true);
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

		// Token
		$token = base64_encode(random_bytes(32));
		$user_token = [
			'email'	=> $email,
			'token'	=> $token,
			'date_created' = time()
		];


		$this->db->insert('user', $data);
		$this->db->insert('user_token', $user_token);

		$this->_sendEmail();

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Registrasi Berhasil,Lakukan Aktivasi Melalui Email</div>');
		redirect('auth/register');
	}

	private function _sendEmail()
	{
		$config = [
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'jemberstok@gmail.com',
			'smtp_pass' => 'jestok123',
			'smtp_port' => 465,
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"

		];

		$this->load->library('email', $config);
		$this->email->initialize($config);

		$this->email->from('jemberstok@gmail.com', 'Jember STOK');
		$this->email->to('fanifadilah76@gmail.com');
		$this->email->subject('Testing');
		$this->email->message('hello');

		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}


	function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('id_role');
		redirect('auth');
	}
}

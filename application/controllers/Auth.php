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
			$data = [
				'username' => $user['username'],
				'id_role' => $user['id_role']
			];
			$this->session->set_userdata($data);
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
		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', array('required' => 'Username Tidak Boleh kosong', 'is_unique' => 'Username Telah Terdaftar'));
		$this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[user.email]|valid_email', array('required' => 'Email Tidak Boleh kosong', 'is_unique' => 'Email Telah Terdaftar'));
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|matches[password2]', array('required' => 'Password Baru belum diisi', 'min_length' => 'Minimal 6 Karakter', 'matches' => 'Password yang anda konfirmasi salah'));
		$this->form_validation->set_rules('password2', 'Konfirmasi password baru', 'required|trim|min_length[6]|matches[password]', array('required' => 'Konfirmasi Password kosong', 'min_length' => 'Minimal 6 Karakter', 'matches' => 'Korfirmasi Password salah'));
		$this->form_validation->set_rules('contact', 'contact', 'required|numeric|max_length[13]|min_length[10]',  array('required' => 'No HP Tidak Boleh kosong', 'min_length' => 'No HP Minimal 10 Karakter', 'max_length' => 'No HP Maximal 13 Karakter', 'numeric' => 'No Hp Harus Angka'));

		if ($this->form_validation->run() == FALSE) {
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
			'date_created' => time()
		];

		// $dataEmail = $this->db->get_where('user', ['username' => $username, 'email' => $email]);
		// if ($dataEmail) {
		// 	$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Registrasi Berhasil,Lakukan Aktivasi Melalui Email</div>');
		// 	redirect('auth/register');
		// }

		$this->db->insert('user', $data);
		$this->db->insert('token', $user_token);

		$this->_sendEmail($token, 'verify');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Registrasi Berhasil,Lakukan Aktivasi Melalui Email</div>');
		redirect('auth/register');
	}

	private function _sendEmail($token, $type)
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
		$this->email->to($this->input->post('email'));

		$lupaemail = '<!DOCTYPE HTML PUBLIC 
		<HTML><HEAD></HEAD>
		<BODY bgColor=#ffffff>
		<P align=left><FONT face=Arial>Untuk ' . $this->input->post('email') . '</FONT></P>
		<P align=left><FONT color=#ff0000 size=4 face="Microsoft Sans Serif"><U>Lupa Akun Password Anda ?!</U></FONT></P>
		<P align=left><FONT face=Arial>Silahkan Reset Password Melalui Link Dibawah Ini</FONT></P>
		<P align=left><FONT face=Arial>	"<a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>"</FONT><FONT face="Times New Roman">
		<P align=left>Dari,</P>
		<P align=left>Jember Stok</P>
		Copyright; 2020 Jember Stok</P></BODY></HTML>';

		$aktivasiemail = '<!DOCTYPE HTML PUBLIC 
		<HTML><HEAD></HEAD>
		<BODY bgColor=#ffffff>
		<P align=left><FONT face=Arial>Untuk ' . $this->input->post('email') . '</FONT></P>
		<P align=left><FONT color=#ff0000 size=4 face="Microsoft Sans Serif"><U>Selamat Datang Di Jember Stok</U></FONT></P>
		<P align=left><FONT face=Arial>Silahkan Aktivasi Akun Melalui Link Dibawah Ini</FONT></P>
		<P align=left><FONT face=Arial>	"<a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Aktivasi Akun</a>"</FONT><FONT face="Times New Roman">
		<P align=left>Dari,</P>
		<P align=left>Jember Stok</P>
		Copyright; 2020 Jember Stok</P></BODY></HTML>';
		if ($type == 'verify') {
			$this->email->subject('Aktivasi');
			$this->email->message($aktivasiemail);
		} else if ($type == 'lupapassword') {
			$this->email->subject('Reset Passowrd');
			$this->email->message($lupaemail);
		}

		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}

	public function verify()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		if ($user) {
			$user_token = $this->db->get_where('token', ['token' => $token])->row_array();
			if ($user_token) {
				if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
					$this->db->set('status_active', 1);
					$this->db->where('email', $email);
					$this->db->update('user');

					$this->db->delete('token', ['email' => $email]);
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Aktivasi Berhasil,Silahkan Login</div>');
					redirect('auth/register');
				} else {
					$this->db->delete('user', ['email' => $email]);
					$this->db->delete('token', ['email' => $email]);
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Token Expired</div>');
					redirect('auth/register');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Token Ivalid</div>');
				redirect('auth/register');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun Aktivasi Gagal</div>');
			redirect('auth/register');
		}
	}

	public function lupapassword()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		if ($this->form_validation->run() == false) {
			$this->load->view('frontend/auth/lupapassword');
		} else {
			$email = $this->input->post('email', true);
			$dataEmail = $this->db->get_where('user', ['email' => $email, 'status_active' == 1])->row_array();
			if ($dataEmail) {
				$token = base64_encode(random_bytes(32));
				$user_token = [
					'email'	=> $email,
					'token'	=> $token,
					'date_created' => time()
				];
				$this->db->insert('token', $user_token);
				$this->_sendEmail($token, 'lupapassword');
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Cek Email Untuk Resset Password</div>');
				redirect('auth/lupapassword');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Tidak Terdaftar atau Belum Aktivasi</div>');
				redirect('auth/lupapassword');
			}
		}
	}

	public function resetpassword()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');
		$dataEmail = $this->db->get_where('user', ['email' => $email])->row_array();

		if ($dataEmail) {
			$user_token = $this->db->get_where('token', ['token' => $token])->row_array();
			if ($user_token) {
				$this->session->set_userdata('reset_email', $email);
				$this->gantiPassword();
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Token Invalid</div>');
				redirect('auth/lupapassword');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Tidak Terdaftar</div>');
			redirect('auth/lupapassword');
		}
	}

	public function gantiPassword()
	{
		if (!$this->session->userdata('reset_email')) {
			redirect('auth');
		}
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]', array('required' => 'Password Belum Diisi', 'min_length' => 'Password Minimal 6 Karakter'));
		$this->form_validation->set_rules('password2', 'Konfirmasi password baru', 'required|trim|matches[password]', array('required' => 'Konfirmasi Password kosong', 'matches' => 'Korfirmasi Password salah'));


		if ($this->form_validation->run() == FALSE) {
			$this->load->view('frontend/auth/gantipassword');
		} else {
			$passwordHash = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
			$email = $this->session->userdata('reset_email');
			$this->db->set('password', $passwordHash);
			$this->db->where('email', $email);
			$this->db->update('user');

			$this->session->unset_userdata('reset_email');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Berhasil Diubah</div>');
			redirect('auth');
		}
	}

	function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('id_role');
		redirect('auth');
	}
}
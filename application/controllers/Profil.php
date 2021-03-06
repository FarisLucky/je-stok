<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_profil');
        ceklogincustomer();
    }

    public function index()
    {
        $data = array(
            'user'  => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
            'title' => 'Profil'
        );
        $this->load->view('frontend/profil/index', $data);
    }

    public function profil()
    {
        $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $id_user = $user['id_user'];
        $this->form_validation->set_rules('telp', 'telp', 'required|trim|min_length[6]|integer', array('required' => 'Telepon belum diisi', 'min_length' => 'No Telepon Tidak Valid', 'integer' => 'No Telepon Tidak Valid'));
        $this->form_validation->set_rules('email', 'email', 'required|trim|Valid_email', array('required' => 'Email belum diisi', 'valid_email' => 'Email Tidak Valid'));
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">No HP atau Email Tidak Valid,Gagal Update Data</div>');
            redirect('Profil');
        } else {
            $id_user = $id_user;
            $nama = $this->input->post('nama');
            $username = $this->input->post('username');
            $jk = $this->input->post('jenis_kelamin');
            $telp = $this->input->post('telp');
            $email = $this->input->post('email');
            $this->M_profil->updateprofil($id_user, $nama, $username, $jk, $telp, $email);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasi Di Update</div>');
            redirect('Profil');
        }
    }
    public function riwayattransaksi()
    {
        $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $id_user = $user['id_user'];
        $dataorder = $this->M_profil->getDataBelumBayar($id_user);
        $datapengiriman = $this->M_profil->getDataPengiriman($id_user);
        $dataselesai = $this->M_profil->getDataSelesai($id_user);
        $data = array(
            'title'  => 'Riwayat Transaksi',
            'order' => $this->M_profil->tampil_foto($dataorder),
            'kirim' => $this->M_profil->tampil_foto($datapengiriman),
            'selesai' => $this->M_profil->tampil_foto($dataselesai)
        );
        $this->load->view('frontend/profil/riwayat_transaksi', $data);
    }

    public function gantipassword()
    {
        $data = array(
            'title' => 'Ganti Password',
            'user'  => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array()
        );

        $this->form_validation->set_rules('password_lama', 'Password lama', 'required|trim', array('required' => 'Password Lama belum diisi'));
        $this->form_validation->set_rules('password_baru1', 'Password baru', 'required|trim|min_length[6]|matches[password_baru2]', array('required' => 'Password Baru Belum Di isi', 'min_length' => ' Password Minimal 6 Karakter', 'matches' => 'Password yang anda konfirmasi salah'));
        $this->form_validation->set_rules('password_baru2', 'Konfirmasi password baru', 'required|trim|min_length[6]|matches[password_baru1]', array('required' => 'Konfirmasi Password Belum di Isi', 'min_length' => 'PasswordMinimal 6 Karakter', 'matches' => 'Korfirmasi Password salah'));

        if ($this->form_validation->run() == false) {
            $this->load->view("frontend/profil/ganti_password", $data);
        } else {
            $passwordLama = $this->input->post('password_lama');
            $passwordBaru = $this->input->post('password_baru1');
            if (!password_verify($passwordLama, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah</div>');
                redirect('Profil/gantipassword');
            } else {
                if ($passwordLama == $passwordBaru) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Tidak Boleh Sama Dengan Password Lama</div>');
                    redirect("Profil/gantipassword");
                } else {
                    $password_hash = password_hash($passwordBaru, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('username', $this->session->userdata('username'));
                    $this->db->update('user');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Berhasil Diubah</div>');
                    redirect('Profil/gantipassword');
                }
            }
        }
    }

    public function terimabarang()
    {
        $id_order = $this->input->post('id_order');
        $this->db->set('status_pesanan', 5);
        $this->db->where('id_order', $id_order);
        $this->db->update('orders');
    }

    public function ganti()
    {
        $this->load->model('profil_model');
        $data['title'] = 'Profil';
        $data['user'] = $this->profil_model->getPhoto()->row_array();
        $this->load->view('frontend/profil/ganti_foto', $data);
    }

    public function coreGanti()
    {
        $this->load->model('profil_model');
        $ganti_profil = $this->profil_model->updatePhoto();
        if ($ganti_profil['error'] === FALSE) {
            $this->session->set_flashdata('success', $ganti_profil['capt_error']);
            redirect('profil/ganti');
        } else {
            $this->session->set_flashdata('success', 'Data Berhasil diUbah');
            redirect('profil');
        }
    }
}

/* End of file Dashboard.php */

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		
	}

	// List all your items
	public function index()
	{
		$data['title'] = 'Selamat Datang';

		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('auth/login', $data);
		} else {
			$this->_login();
		}
	}


	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('tb_user', ['username' => $username])->row_array();

		if ($user) {
			if ($user['is_active'] == 1) {
				if (password_verify($password, $user['password'])) {
					$data = [
						'id_user' => $user['id_user'],
						'nama' => $user['nama'],
						'username' => $user['username'],
						'password' => $user['password'],
						'role' => $user['role']
					];
					$this->session->set_userdata($data);
					if ($user['role'] == 1) {
						redirect('Dashboard');
					} elseif ($user['role'] == 2) {
						redirect('Beranda');
					} elseif ($user['role'] == 3) {
						redirect('Beranda');
					} elseif ($user['role'] == 4) {
						redirect('Beranda');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Kata Sandi Anda Salah!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('Auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Nama Pengguna Ini Belum Aktif! Silahkan Hubingi CS (0811-4324-445)<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('Auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Nama Pengguna Belum Terdaftar!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('Auth');
		}
	}
}

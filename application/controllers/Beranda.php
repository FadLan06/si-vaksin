<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies

	}

	// List all your items
	public function index($offset = 0)
	{
		$data = [
			'title' => 'Selamat Datang',
            'user' => $this->db->get_where('tb_user',['nama' => $this->session->userdata('nama')])->row(),
            'dosen' => $this->db->get('tb_dosen')->row(),
            'tendik' => $this->db->get('tb_tendik')->row(),
            'mahasiswa' => $this->db->get('tb_mahasiswa')->row(),
            'vaksin' => $this->db->get_where('tb_vaksin',['kode' => $this->session->userdata('nama')])->row(),
		];

		$this->load->view('template/header', $data);
		$this->load->view('template/navbar', $data);
		$this->load->view('user/beranda', $data);
		$this->load->view('template/footer', $data);
	}

}

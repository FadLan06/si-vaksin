<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		if($this->session->userdata('username') == ''){
			redirect('Auth');
		}

	}

	// List all your items
	public function index($offset = 0)
	{
		$data = [
			'title' => 'Dashboard',
			'dosen' => $this->db->get('tb_dosen')->num_rows(),
			'tendik' => $this->db->get('tb_tendik')->num_rows(),
			'mahasiswa' => $this->db->get('tb_mahasiswa')->num_rows(),
			'sudah' => $this->db->get_where('tb_vaksin', ['status1' => 1, 'status2' => 1, 'status3' => 1])->num_rows(),
			'belum' => $this->db->get_where('tb_vaksin', ['status1' => 0, 'status2' => 0, 'status3' => 0])->num_rows(),
			'v1' => $this->db->get_where('tb_vaksin', ['status1' => 1])->num_rows(),
			'v11' => $this->db->get_where('tb_vaksin', ['status1' => 0])->num_rows(),
			'v2' => $this->db->get_where('tb_vaksin', ['status2' => 1])->num_rows(),
			'v22' => $this->db->get_where('tb_vaksin', ['status2' => 0])->num_rows(),
			'v3' => $this->db->get_where('tb_vaksin', ['status3' => 1])->num_rows(),
			'v33' => $this->db->get_where('tb_vaksin', ['status3' => 0])->num_rows(),
		];

		$this->load->view('template/header', $data);
		$this->load->view('template/navbar', $data);
		$this->load->view('admin/dashboard.php', $data);
		$this->load->view('template/footer', $data);
	}
}

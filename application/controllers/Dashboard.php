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
			'dv1' => $this->db->query("SELECT v.*, u.nama, u.role FROM tb_vaksin v LEFT JOIN tb_user u ON u.nama=v.kode WHERE u.role='2' AND v.status1='1'")->num_rows(),
			'dv11' => $this->db->query("SELECT v.*, u.nama, u.role FROM tb_vaksin v LEFT JOIN tb_user u ON u.nama=v.kode WHERE u.role='2' AND v.status1='0'")->num_rows(),
			'dv2' => $this->db->query("SELECT v.*, u.nama, u.role FROM tb_vaksin v LEFT JOIN tb_user u ON u.nama=v.kode WHERE u.role='2' AND v.status2='1'")->num_rows(),
			'dv22' => $this->db->query("SELECT v.*, u.nama, u.role FROM tb_vaksin v LEFT JOIN tb_user u ON u.nama=v.kode WHERE u.role='2' AND v.status2='0'")->num_rows(),
			'dv3' => $this->db->query("SELECT v.*, u.nama, u.role FROM tb_vaksin v LEFT JOIN tb_user u ON u.nama=v.kode WHERE u.role='2' AND v.status3='1'")->num_rows(),
			'dv33' => $this->db->query("SELECT v.*, u.nama, u.role FROM tb_vaksin v LEFT JOIN tb_user u ON u.nama=v.kode WHERE u.role='2' AND v.status3='0'")->num_rows(),
			'mv1' => $this->db->query("SELECT v.*, u.nama, u.role FROM tb_vaksin v LEFT JOIN tb_user u ON u.nama=v.kode WHERE u.role='4' AND v.status1='1'")->num_rows(),
			'mv11' => $this->db->query("SELECT v.*, u.nama, u.role FROM tb_vaksin v LEFT JOIN tb_user u ON u.nama=v.kode WHERE u.role='4' AND v.status1='0'")->num_rows(),
			'mv2' => $this->db->query("SELECT v.*, u.nama, u.role FROM tb_vaksin v LEFT JOIN tb_user u ON u.nama=v.kode WHERE u.role='4' AND v.status2='1'")->num_rows(),
			'mv22' => $this->db->query("SELECT v.*, u.nama, u.role FROM tb_vaksin v LEFT JOIN tb_user u ON u.nama=v.kode WHERE u.role='4' AND v.status2='0'")->num_rows(),
			'mv3' => $this->db->query("SELECT v.*, u.nama, u.role FROM tb_vaksin v LEFT JOIN tb_user u ON u.nama=v.kode WHERE u.role='4' AND v.status3='1'")->num_rows(),
			'mv33' => $this->db->query("SELECT v.*, u.nama, u.role FROM tb_vaksin v LEFT JOIN tb_user u ON u.nama=v.kode WHERE u.role='4' AND v.status3='0'")->num_rows(),
			'tv1' => $this->db->query("SELECT v.*, u.nama, u.role FROM tb_vaksin v LEFT JOIN tb_user u ON u.nama=v.kode WHERE u.role='3' AND v.status1='1'")->num_rows(),
			'tv11' => $this->db->query("SELECT v.*, u.nama, u.role FROM tb_vaksin v LEFT JOIN tb_user u ON u.nama=v.kode WHERE u.role='3' AND v.status1='0'")->num_rows(),
			'tv2' => $this->db->query("SELECT v.*, u.nama, u.role FROM tb_vaksin v LEFT JOIN tb_user u ON u.nama=v.kode WHERE u.role='3' AND v.status2='1'")->num_rows(),
			'tv22' => $this->db->query("SELECT v.*, u.nama, u.role FROM tb_vaksin v LEFT JOIN tb_user u ON u.nama=v.kode WHERE u.role='3' AND v.status2='0'")->num_rows(),
			'tv3' => $this->db->query("SELECT v.*, u.nama, u.role FROM tb_vaksin v LEFT JOIN tb_user u ON u.nama=v.kode WHERE u.role='3' AND v.status3='1'")->num_rows(),
			'tv33' => $this->db->query("SELECT v.*, u.nama, u.role FROM tb_vaksin v LEFT JOIN tb_user u ON u.nama=v.kode WHERE u.role='3' AND v.status3='0'")->num_rows(),
		];

		$this->load->view('template/header', $data);
		$this->load->view('template/navbar', $data);
		$this->load->view('admin/dashboard.php', $data);
		$this->load->view('template/footer', $data);
	}
}

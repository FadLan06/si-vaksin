<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dasar extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('Dasar_model');
	}

	// List all your items
	public function index($offset = 0)
	{
		$data = [
			'title' => 'Data Dasar Hukum',
			'dasar' => $this->Dasar_model->getKegiatan()->result(),
			'kegiatan' => $this->db->get('tb_kegiatan')->result()
		];

		$this->load->view('template/header', $data);
		$this->load->view('template/navbar', $data);
		$this->load->view('admin/dasar/index', $data);
		$this->load->view('template/footer', $data);
	}

	// Add a new item
	public function tambah()
	{
		$data = [
			'title' => 'Tambah Data Dasar Hukum'
		];

		$this->form_validation->set_rules('kegiatan', 'Kegiatan', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('template/header', $data);
			$this->load->view('template/navbar', $data);
			$this->load->view('admin/dasar/tambah', $data);
			$this->load->view('template/footer', $data);
		} else {
			if ($_POST) {
				$data = [
					'kegiatan' => htmlspecialchars($this->input->post('kegiatan')),
				];

				$this->db->insert("tb_kegiatan", $data);
				$id = $this->db->insert_id();
				redirect('Dasar/Tambahkan/' . $id . '');
			}
		}
	}

	public function tambahkan()
	{
		$data = [
			'title' => 'Tambah Data Dasar Hukum',
			'keg' => $this->db->get_where('tb_kegiatan', ['kd_keg' => $this->uri->segment(3)])->row(),
			'dasar' => $this->db->get_where('tb_dasar', ['kd_keg' => $this->uri->segment(3)])->result()
		];

		$this->form_validation->set_rules('dasar', 'Dasar', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('template/header', $data);
			$this->load->view('template/navbar', $data);
			$this->load->view('admin/dasar/tambahh', $data);
			$this->load->view('template/footer', $data);
		} else {
			if ($_POST) {
				$id = htmlspecialchars($this->input->post('kd'));
				$data = [
					'kd_keg' => $id,
					'dasar' => htmlspecialchars($this->input->post('dasar'))
				];

				$this->db->insert('tb_dasar', $data);
				redirect('Dasar/Tambahkan/' . $id . '');
			}
		}
	}

	//Update one item
	public function update($id = NULL)
	{
	}

	//Delete one item
	public function delete($id = NULL)
	{
	}
}

/* End of file Dasar.php */
/* Location: ./application/controllers/Dasar.php */

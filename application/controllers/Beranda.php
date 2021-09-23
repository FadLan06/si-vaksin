<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
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

	function aksi()
	{
		if(isset($_POST['submit1'])){
			if ($_FILES['berkas1']['error'] <> 4) {

				$config['upload_path'] = './assets/upload/berkas/';
				$config['allowed_types'] = 'jpeg|jpg|png|gif|bmp|ico';
				$config['encrypt_name'] = true;
				$config['max_size']     = '1024';

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if (!$this->upload->do_upload('berkas1')) {
					echo "<script>alert('Data Vaksin Gagal Upload!'); </script>";
					echo "<script>window.location=history.go(-1);</script>";
				} else {
					$hasil  = $this->upload->data();

					$data = [
						'status1' => htmlspecialchars($this->input->post('status1')),
						'berkas1' => htmlspecialchars($hasil['file_name']),
					];

					$kode = $this->session->userdata('nama');
					$this->db->where('kode', $kode);
					$this->db->update('tb_vaksin', $data);

					if ($this->db->affected_rows() > 0) {
						echo "<script>alert('Data Vaksin Berhasil di Input!'); </script>";
					}
					echo "<script>window.location='" . site_url('Beranda') . "';</script>";
				}
			}
		}elseif(isset($_POST['submit2'])){
			if ($_FILES['berkas2']['error'] <> 4) {

				$config['upload_path'] = './assets/upload/berkas/';
				$config['allowed_types'] = 'jpeg|jpg|png|gif|bmp|ico';
				$config['encrypt_name'] = true;
				$config['max_size']     = '1024';

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if (!$this->upload->do_upload('berkas2')) {
					echo "<script>alert('Data Vaksin Gagal Upload!'); </script>";
					echo "<script>window.location=history.go(-1);</script>";
				} else {
					$hasil  = $this->upload->data();

					$data = [
						'status2' => htmlspecialchars($this->input->post('status2')),
						'berkas2' => htmlspecialchars($hasil['file_name']),
					];

					$kode = $this->session->userdata('nama');
					$this->db->where('kode', $kode);
					$this->db->update('tb_vaksin', $data);

					if ($this->db->affected_rows() > 0) {
						echo "<script>alert('Data Vaksin Berhasil di Input!'); </script>";
					}
					echo "<script>window.location='" . site_url('Beranda') . "';</script>";
				}
			}
		}elseif(isset($_POST['submit3'])){
			if ($_FILES['berkas3']['error'] <> 4) {

				$config['upload_path'] = './assets/upload/berkas/';
				$config['allowed_types'] = 'jpeg|jpg|png|gif|bmp|ico';
				$config['encrypt_name'] = true;
				$config['max_size']     = '1024';

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if (!$this->upload->do_upload('berkas3')) {
					echo "<script>alert('Data Vaksin Gagal Upload!'); </script>";
					echo "<script>window.location=history.go(-1);</script>";
				} else {
					$hasil  = $this->upload->data();

					$data = [
						'status3' => htmlspecialchars($this->input->post('status3')),
						'berkas3' => htmlspecialchars($hasil['file_name']),
					];

					$kode = $this->session->userdata('nama');
					$this->db->where('kode', $kode);
					$this->db->update('tb_vaksin', $data);

					if ($this->db->affected_rows() > 0) {
						echo "<script>alert('Data Vaksin Berhasil di Input!'); </script>";
					}
					echo "<script>window.location='" . site_url('Beranda') . "';</script>";
				}
			}
		}
	}

}

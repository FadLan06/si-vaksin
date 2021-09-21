<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
			'title' => 'Dashboard'
		];

		$this->load->view('template/header', $data);
		$this->load->view('template/navbar', $data);
		$this->load->view('admin/dashboard.php', $data);
		$this->load->view('template/footer', $data);
	}

}

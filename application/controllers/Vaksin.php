<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vaksin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies

    }

    // List all your items
    public function index()
    {
        $data = [
            'title' => 'Data Vaksin'
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('admin/vaksin/index', $data);
        $this->load->view('template/footer', $data);
    }

    function get_vaksin()
    {
        $vaksin = $this->db->get('tb_vaksin')->result();
        $no = 1;
        foreach ($vaksin as $data) {
            echo '
                <tr>
                    <td align="center">' . $no++ . '</td>
                    <td> ' . $data->kode . '</td>
                    <td> ' . $data->nama . '</td>
                    <td align="center">';
            echo $data->status1 == 1 ? "<span class='badge badge-success'>Sudah</span>" : "<span class='badge badge-danger'>Belum</span>";
            echo '</td><td align="center">';
            echo $data->status2 == 1 ? "<span class='badge badge-success'>Sudah</span>" : "<span class='badge badge-danger'>Belum</span>";
            echo '</td><td align="center">';
            echo $data->status3 == 1 ? "<span class='badge badge-success'>Sudah</span>" : "<span class='badge badge-danger'>Belum</span>";
            echo '</td>
                </tr>
            ';
        }
    }
}

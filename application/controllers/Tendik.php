<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tendik extends CI_Controller
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
            'title' => 'Data Tendik'
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('admin/tendik/index', $data);
        $this->load->view('template/footer', $data);
    }

    function get_tendik()
    {
        $tendik = $this->db->get('tb_tendik')->result();
        $no = 1;
        foreach ($tendik as $data) {
            echo '
                <tr>
                    <td align="center">' . $no++ . '</td>
                    <td> ' . $data->id . '</td>
                    <td> ' . $data->nama . '</td>
                    <td> ' . $data->jabatan . '</td>
                    <td align="center"><a href=" ' . base_url('Tendik/Reset/') . $data->id . '" class="badge badge-warning"><i class="fas fa-sync-alt"></i> Reset</a></td>
                    <td align="center">
                    <a href="' . base_url('Tendik/Ubah/') . $data->id . '" class="badge badge-info"><i class="fas fa-edit"></i> Ubah</a>
                    <a onclick="return confirm("Yakin ingin menghapusnya ??")" href="' . base_url('Tendik/hapus/') . $data->id . '" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
                    </td>
                </tr>
            ';
        }
    }

    function cek_id()
    {
        if(isset($_POST)){
            $id = $_POST['id'];
            $data = $this->db->get_where('tb_tendik', ['id' => $id])->result_array();
            foreach ($data as $dat) {
                if ($dat['id'] == $id) {
                    echo $dat['id'];
                }
            }
        }
    }

    // Add a new item
    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Tendik'
        ];

        $this->form_validation->set_rules('id', 'id', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[password-confirm]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password-confirm', 'Password Confirm', 'required|trim|matches[password]');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('admin/tendik/tambah', $data);
            $this->load->view('template/footer', $data);
        } else {
            if (isset($_POST['simpan'])) {
                $data = [
                    'id' => htmlspecialchars($this->input->post('id', true)),
                    'nama' => htmlspecialchars($this->input->post('nama', true)),
                    'jabatan' => htmlspecialchars($this->input->post('jabatan', true))
                ];

                $this->db->insert('tb_tendik', $data);

                $dat = [
                    'nama' => htmlspecialchars($this->input->post('id', true)),
                    'username' => htmlspecialchars($this->input->post('username', true)),
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'role' => 3,
                    'created_at' => time(),
                    'is_active' => 1
                ];

                $this->db->insert('tb_user', $dat);

                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Tendik Berhasil di Tambahkan! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('Tendik');
            }
        }
    }

    //Update one item
    public function ubah($id)
    {
        $data = [
            'title' => 'Ubah Data Tendik',
            'tendik' => $this->db->get_where('tb_tendik', ['id' => $id])->row(),
            'user' => $this->db->get_where('tb_user', ['nama' => $id])->row()
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('admin/tendik/ubah', $data);
        $this->load->view('template/footer', $data);
    }

    function proses_edit()
    {
        if (isset($_POST['ubah'])) {
            $data = [
                'id' => htmlspecialchars($this->input->post('id', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'jabatan' => htmlspecialchars($this->input->post('jabatan', true)),
            ];

            $this->db->where('id', $this->input->post('id'));
            $this->db->update('tb_tendik', $data);

            $this->db->set('username', htmlspecialchars($this->input->post('username', true)));
            $this->db->where('nama', $this->input->post('id'));
            $this->db->update('tb_user');

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Tendik Berhasil di Ubah! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Tendik');
        }
    }

    //Delete one item
    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_tendik');
        $this->db->where('nama', $id);
        $this->db->delete('tb_user');

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Tendik Berhasil di Hapus! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Tendik');
    }

    public function reset($id)
    {
        $passnew = rand();
        $data = ['password' => password_hash($passnew, PASSWORD_DEFAULT)];

        $nama = $this->db->get_where('tb_tendik', ['id' => $id])->row();

        $this->db->where('nama', $id);
        $this->db->update('tb_user', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Password Baru ' . $nama->nama . ' Adalah <span class="text-warning">' . $passnew . '</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Tendik');
    }

    function import_data()
    {
        if (isset($_POST['submit'])) {
            $config = array(
                'upload_path'   => 'assets/upload',
                'allowed_types' => 'xlsx|xls|csv'
            );
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('file')) {
                $error = array('error' => $this->upload->display_errors());
                $this->import_data($error);
            } else {
                $data = $this->upload->data();
                @chmod($data['full_path'], 0777);

                $this->load->library('Spreadsheet_Excel_Reader');
                $this->spreadsheet_excel_reader->setOutputEncoding('CP1251');

                $this->spreadsheet_excel_reader->read($data['full_path']);
                $sheets = $this->spreadsheet_excel_reader->sheets[0];
                error_reporting(0);

                $data_excel = array();
                for ($i = 2; $i <= $sheets['numRows']; $i++) {
                    if ($sheets['cells'][$i][1] == '') break;

                    $data_excel[$i - 1]['id']    = $sheets['cells'][$i][1];
                    $data_excel[$i - 1]['nama']   = $sheets['cells'][$i][2];
                    $data_excel[$i - 1]['jabatan'] = $sheets['cells'][$i][3];

                    $id = $sheets['cells'][$i][1];
                }

                $data_excel1 = array();
                for ($i = 2; $i <= $sheets['numRows']; $i++) {
                    if ($sheets['cells'][$i][1] == '') break;

                    $data_excel1[$i - 1]['nama']    = $sheets['cells'][$i][1];
                    $data_excel1[$i - 1]['username']    = $sheets['cells'][$i][4];
                    $data_excel1[$i - 1]['password']   = password_hash($sheets['cells'][$i][5], PASSWORD_DEFAULT);
                    $data_excel1[$i - 1]['role']    = 3;
                    $data_excel1[$i - 1]['created_at']    = time();
                    $data_excel1[$i - 1]['is_active']    = 1;
                }

                $cek = $this->db->get_where('tb_tendik', ['id' => $id])->row();
                if ($cek->id == $id) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data Tendik Gagal di Tambahkan! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('Tendik');
                } else {
                    $this->db->insert_batch('tb_tendik', $data_excel);
                    $this->db->insert_batch('tb_user', $data_excel1);
                    unlink($data['full_path']);

                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Tendik Berhasil di Tambahkan! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('Tendik');
                }
            }
        }
    }
}

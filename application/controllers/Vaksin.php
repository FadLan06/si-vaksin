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

    // Add a new item
    public function input()
    {
        $data = [
            'title' => 'Input Data Vaksin'
        ];

        $this->form_validation->set_rules('nip', 'NIP', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[password-confirm]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password-confirm', 'Password Confirm', 'required|trim|matches[password]');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('admin/vaksin/tambah', $data);
            $this->load->view('template/footer', $data);
        } else {
            if (isset($_POST['simpan'])) {
                $data = [
                    'nip' => htmlspecialchars($this->input->post('nip', true)),
                    'nama' => htmlspecialchars($this->input->post('nama', true)),
                    'jabatan' => htmlspecialchars($this->input->post('jabatan', true))
                ];

                $this->db->insert('tb_dosen', $data);

                $dat = [
                    'nama' => htmlspecialchars($this->input->post('nip', true)),
                    'username' => htmlspecialchars($this->input->post('username', true)),
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'role' => 2,
                    'created_at' => time(),
                    'is_active' => 1
                ];

                $this->db->insert('tb_user', $dat);

                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Dosen Berhasil di Tambahkan! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('Dosen');
            }
        }
    }

    //Update one item
    public function ubah($id)
    {
        $data = [
            'title' => 'Ubah Data Dosen',
            'dosen' => $this->db->get_where('tb_dosen', ['nip' => $id])->row(),
            'user' => $this->db->get_where('tb_user', ['nama' => $id])->row()
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('admin/dosen/ubah', $data);
        $this->load->view('template/footer', $data);
    }

    function proses_edit()
    {
        if (isset($_POST['ubah'])) {
            $data = [
                'nip' => htmlspecialchars($this->input->post('nip', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'jabatan' => htmlspecialchars($this->input->post('jabatan', true)),
            ];

            $this->db->where('nip', $this->input->post('nip'));
            $this->db->update('tb_dosen', $data);

            $this->db->set('username', htmlspecialchars($this->input->post('username', true)));
            $this->db->where('nama', $this->input->post('nip'));
            $this->db->update('tb_user');

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Dosen Berhasil di Ubah! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Dosen');
        }
    }

    //Delete one item
    public function hapus($id)
    {
        $this->db->where('nip', $id);
        $this->db->delete('tb_dosen');
        $this->db->where('nama', $id);
        $this->db->delete('tb_user');

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Dosen Berhasil di Hapus! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Dosen');
    }

    public function reset($id)
    {
        $passnew = rand();
        $data = ['password' => password_hash($passnew, PASSWORD_DEFAULT)];

        $nama = $this->db->get_where('tb_dosen', ['nip' => $id])->row();

        $this->db->where('nama', $id);
        $this->db->update('tb_user', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Password Baru ' . $nama->nama . ' Adalah <span class="text-warning">' . $passnew . '</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Dosen');
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

                    $data_excel[$i - 1]['nip']    = $sheets['cells'][$i][1];
                    $data_excel[$i - 1]['nama']   = $sheets['cells'][$i][2];
                    $data_excel[$i - 1]['jabatan'] = $sheets['cells'][$i][3];

                    $nip = $sheets['cells'][$i][1];
                }

                $data_excel1 = array();
                for ($i = 2; $i <= $sheets['numRows']; $i++) {
                    if ($sheets['cells'][$i][1] == '') break;

                    $data_excel1[$i - 1]['nama']    = $sheets['cells'][$i][1];
                    $data_excel1[$i - 1]['username']    = $sheets['cells'][$i][4];
                    $data_excel1[$i - 1]['password']   = password_hash($sheets['cells'][$i][5], PASSWORD_DEFAULT);
                    $data_excel1[$i - 1]['role']    = 2;
                    $data_excel1[$i - 1]['created_at']    = time();
                    $data_excel1[$i - 1]['is_active']    = 1;
                }

                $cek = $this->db->get_where('tb_dosen', ['nip' => $nip])->row();
                if ($cek->nip == $nip) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data Dosen Gagal di Tambahkan! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('Dosen');
                } else {
                    $this->db->insert_batch('tb_dosen', $data_excel);
                    $this->db->insert_batch('tb_user', $data_excel1);
                    unlink($data['full_path']);

                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Dosen Berhasil di Tambahkan! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('Dosen');
                }
            }
        }
    }
}

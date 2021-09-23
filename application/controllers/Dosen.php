<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen extends CI_Controller
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
    public function index()
    {
        $data = [
            'title' => 'Data Dosen'
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('admin/dosen/index', $data);
        $this->load->view('template/footer', $data);
    }

    function get_dosen()
    {
        $dosen = $this->db->get('tb_dosen')->result();
        $no = 1;
        foreach ($dosen as $data) {
            echo '
                <tr>
                    <td align="center">' . $no++ . '</td>
                    <td> ' . $data->nip . '</td>
                    <td> ' . $data->nama . '</td>
                    <td> ' . $data->jabatan . '</td>
                    <td align="center"><a href=" ' . base_url('Dosen/Reset/') . $data->nip . '" class="badge badge-warning"><i class="fas fa-sync-alt"></i> Reset</a></td>
                    <td align="center">
                    <a href="' . base_url('Dosen/Ubah/') . $data->nip . '" class="badge badge-info"><i class="fas fa-edit"></i> Ubah</a>
                    <a onclick="return confirm("Yakin ingin menghapusnya ??")" href="' . base_url('Dosen/hapus/') . $data->nip . '" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
                    </td>
                </tr>
            ';
        }
    }

    function cek_nip()
    {
        if (isset($_POST)) {
            $nip = $_POST['nip'];
            $data = $this->db->get_where('tb_dosen', ['nip' => $nip])->result_array();
            foreach ($data as $dat) {
                if ($dat['nip'] == $nip) {
                    echo $dat['nip'];
                }
            }
        }
    }

    // Add a new item
    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Dosen'
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
            $this->load->view('admin/dosen/tambah', $data);
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

                $da = [
                    'kode' => htmlspecialchars($this->input->post('nip', true)),
                    'nama' => htmlspecialchars($this->input->post('nama', true))
                ];

                $this->db->insert('tb_vaksin', $da);

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
            'user' => $this->db->get_where('tb_user', ['nama' => $id])->row(),
            'vaksin' => $this->db->get_where('tb_vaksin', ['kode' => $id])->row(),
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

            $this->db->where('id_dosen', $this->input->post('id_dosen'));
            $this->db->update('tb_dosen', $data);

            $this->db->set('nama', htmlspecialchars($this->input->post('nip', true)));
            $this->db->set('username', htmlspecialchars($this->input->post('username', true)));
            $this->db->where('id_user', $this->input->post('id_user'));
            $this->db->update('tb_user');

            $this->db->set('kode', htmlspecialchars($this->input->post('nip', true)));
            $this->db->set('nama', htmlspecialchars($this->input->post('nama', true)));
            $this->db->where('id_vaksin', $this->input->post('id_vaksin'));
            $this->db->update('tb_vaksin');

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Dosen Berhasil di Ubah! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Dosen');
        }
    }

    //Delete one item
    public function hapus($id)
    {
        $data  = $this->db->get_where('tb_vaksin', array('kode' => $id))->result_array();
        foreach ($data as $dataa) {
            unlink("assets/upload/berkas/" . $dataa['berkas1']);
            unlink("assets/upload/berkas/" . $dataa['berkas2']);
            unlink("assets/upload/berkas/" . $dataa['berkas3']);
        }

        $this->db->where('nip', $id);
        $this->db->delete('tb_dosen');
        $this->db->where('nama', $id);
        $this->db->delete('tb_user');
        $this->db->where('kode', $id);
        $this->db->delete('tb_vaksin');

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

                $data_excel2 = array();
                for ($i = 2; $i <= $sheets['numRows']; $i++) {
                    if ($sheets['cells'][$i][1] == '') break;

                    $data_excel2[$i - 1]['kode']    = $sheets['cells'][$i][1];
                    $data_excel2[$i - 1]['nama']   = $sheets['cells'][$i][2];
                }

                $cek = $this->db->get_where('tb_dosen', ['nip' => $nip])->row();
                if ($cek->nip == $nip) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data Dosen Gagal di Tambahkan! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('Dosen');
                } else {
                    $this->db->insert_batch('tb_dosen', $data_excel);
                    $this->db->insert_batch('tb_user', $data_excel1);
                    $this->db->insert_batch('tb_vaksin', $data_excel2);
                    unlink($data['full_path']);

                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Dosen Berhasil di Tambahkan! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('Dosen');
                }
            }
        }
    }
}

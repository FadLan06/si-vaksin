<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
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
            'title' => 'Data Mahasiswa'
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('admin/mahasiswa/index', $data);
        $this->load->view('template/footer', $data);
    }

    function get_mahasiswa()
    {
        $mahasiswa = $this->db->get('tb_mahasiswa')->result();
        $no = 1;
        foreach ($mahasiswa as $data) {
            echo '
                <tr>
                    <td align="center">' . $no++ . '</td>
                    <td> ' . $data->nim . '</td>
                    <td> ' . $data->nama . '</td>
                    <td> ' . $data->jurusan . '</td>
                    <td> ' . $data->angkatan . '</td>
                    <td align="center"><a href=" ' . base_url('Mahasiswa/Reset/') . $data->nim . '" class="badge badge-warning"><i class="fas fa-sync-alt"></i> Reset</a></td>
                    <td align="center">
                    <a href="' . base_url('Mahasiswa/Ubah/') . $data->nim . '" class="badge badge-info"><i class="fas fa-edit"></i> Ubah</a>
                    <a onclick="return confirm("Yakin ingin menghapusnya ??")" href="' . base_url('Mahasiswa/hapus/') . $data->nim . '" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
                    </td>
                </tr>
            ';
        }
    }

    function cek_nim()
    {
        if(isset($_POST)){
            $nim = $_POST['nim'];
            $data = $this->db->get_where('tb_mahasiswa', ['nim' => $nim])->result_array();
            foreach ($data as $dat) {
                if ($dat['nim'] == $nim) {
                    echo $dat['nim'];
                }
            }
        }
    }

    // Add a new item
    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Mahasiswa'
        ];

        $this->form_validation->set_rules('nim', 'nim', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[password-confirm]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password-confirm', 'Password Confirm', 'required|trim|matches[password]');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('admin/mahasiswa/tambah', $data);
            $this->load->view('template/footer', $data);
        } else {
            if (isset($_POST['simpan'])) {
                $data = [
                    'nim' => htmlspecialchars($this->input->post('nim', true)),
                    'nama' => htmlspecialchars($this->input->post('nama', true)),
                    'jurusan' => htmlspecialchars($this->input->post('jurusan', true)),
                    'angkatan' => htmlspecialchars($this->input->post('angkatan', true)),
                ];

                $this->db->insert('tb_mahasiswa', $data);

                $dat = [
                    'nama' => htmlspecialchars($this->input->post('nim', true)),
                    'username' => htmlspecialchars($this->input->post('username', true)),
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'role' => 4,
                    'created_at' => time(),
                    'is_active' => 1
                ];

                $this->db->insert('tb_user', $dat);

                $da = [
                    'kode' => htmlspecialchars($this->input->post('nim', true)),
                    'nama' => htmlspecialchars($this->input->post('nama', true))
                ];

                $this->db->insert('tb_vaksin', $da);

                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Mahasiswa Berhasil di Tambahkan! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('Mahasiswa');
            }
        }
    }

    //Update one item
    public function ubah($id)
    {
        $data = [
            'title' => 'Ubah Data Mahasiswa',
            'mahasiswa' => $this->db->get_where('tb_mahasiswa', ['nim' => $id])->row(),
            'user' => $this->db->get_where('tb_user', ['nama' => $id])->row(),
            'vaksin' => $this->db->get_where('tb_vaksin', ['kode' => $id])->row(),
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('admin/mahasiswa/ubah', $data);
        $this->load->view('template/footer', $data);
    }

    function proses_edit()
    {
        if (isset($_POST['ubah'])) {
            $data = [
                'nim' => htmlspecialchars($this->input->post('nim', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'jurusan' => htmlspecialchars($this->input->post('jurusan', true)),
                'angkatan' => htmlspecialchars($this->input->post('angkatan', true)),
            ];
            
            $this->db->where('id_mahasiswa', $this->input->post('id_mahasiswa'));
            $this->db->update('tb_mahasiswa', $data);

            $this->db->set('nama', htmlspecialchars($this->input->post('nim', true)));
            $this->db->set('username', htmlspecialchars($this->input->post('username', true)));
            $this->db->where('id_user', $this->input->post('id_user'));
            $this->db->update('tb_user');

            $this->db->set('kode', htmlspecialchars($this->input->post('nim', true)));
            $this->db->set('nama', htmlspecialchars($this->input->post('nama', true)));
            $this->db->where('id_vaksin', $this->input->post('id_vaksin'));
            $this->db->update('tb_vaksin');

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Mahasiswa Berhasil di Ubah! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Mahasiswa');
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
        
        $this->db->where('nim', $id);
        $this->db->delete('tb_mahasiswa');
        $this->db->where('nama', $id);
        $this->db->delete('tb_user');
        $this->db->where('kode', $id);
        $this->db->delete('tb_vaksin');

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Mahasiswa Berhasil di Hapus! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Mahasiswa');
    }

    public function reset($id)
    {
        $passnew = rand();
        $data = ['password' => password_hash($passnew, PASSWORD_DEFAULT)];

        $nama = $this->db->get_where('tb_mahasiswa', ['nim' => $id])->row();

        $this->db->where('nama', $id);
        $this->db->update('tb_user', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Password Baru ' . $nama->nama . ' Adalah <span class="text-warning">' . $passnew . '</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Mahasiswa');
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

                    $data_excel[$i - 1]['nim']    = $sheets['cells'][$i][1];
                    $data_excel[$i - 1]['nama']   = $sheets['cells'][$i][2];
                    $data_excel[$i - 1]['jurusan'] = $sheets['cells'][$i][3];
                    $data_excel[$i - 1]['angkatan'] = $sheets['cells'][$i][4];

                    $nim = $sheets['cells'][$i][1];
                }

                $data_excel1 = array();
                for ($i = 2; $i <= $sheets['numRows']; $i++) {
                    if ($sheets['cells'][$i][1] == '') break;

                    $data_excel1[$i - 1]['nama']    = $sheets['cells'][$i][1];
                    $data_excel1[$i - 1]['username']    = $sheets['cells'][$i][5];
                    $data_excel1[$i - 1]['password']   = password_hash($sheets['cells'][$i][6], PASSWORD_DEFAULT);
                    $data_excel1[$i - 1]['role']    = 4;
                    $data_excel1[$i - 1]['created_at']    = time();
                    $data_excel1[$i - 1]['is_active']    = 1;
                }

                $data_excel2 = array();
                for ($i = 2; $i <= $sheets['numRows']; $i++) {
                    if ($sheets['cells'][$i][1] == '') break;

                    $data_excel2[$i - 1]['kode']    = $sheets['cells'][$i][1];
                    $data_excel2[$i - 1]['nama']   = $sheets['cells'][$i][2];
                }

                $cek = $this->db->get_where('tb_mahasiswa', ['nim' => $nim])->row();
                if ($cek->nim == $nim) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data Mahasiswa Gagal di Tambahkan! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('Mahasiswa');
                } else {
                    $this->db->insert_batch('tb_mahasiswa', $data_excel);
                    $this->db->insert_batch('tb_user', $data_excel1);
                    $this->db->insert_batch('tb_vaksin', $data_excel2);
                    unlink($data['full_path']);

                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Mahasiswa Berhasil di Tambahkan! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('Mahasiswa');
                }
            }
        }
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
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
            'title' => 'Data Pegawai',
            'pegawai' => $this->db->get_where('user', ['id !=' => 0])->result()
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('admin/pegawai/index', $data);
        $this->load->view('template/footer', $data);
    }

    // Add a new item
    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Pegawai'
        ];

        $this->form_validation->set_rules('nip', 'NIP', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[password-confirm]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password-confirm', 'Password Confirm', 'required|trim|matches[password]');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('admin/pegawai/tambah', $data);
            $this->load->view('template/footer', $data);
        } else {
            if (isset($_POST['simpan'])) {
                $email = $this->input->post('email', true);
                $data = [
                    'nip' => htmlspecialchars($this->input->post('nip', true)),
                    'nama' => htmlspecialchars($this->input->post('nama', true)),
                    'tempat' => htmlspecialchars($this->input->post('tempat', true)),
                    'tgl_lhr' => htmlspecialchars($this->input->post('tgl_lhr', true)),
                    'jk' => htmlspecialchars($this->input->post('jk', true)),
                    'pendidikan' => htmlspecialchars($this->input->post('pendidikan', true)),
                    'jurusan' => htmlspecialchars($this->input->post('jurusan', true)),
                    'status' => htmlspecialchars($this->input->post('status', true)),
                    'bekerja' => htmlspecialchars($this->input->post('bekerja', true)),
                    'pangkat' => htmlspecialchars($this->input->post('pangkat', true)),
                    'golongan' => htmlspecialchars($this->input->post('golongan', true)),
                    'jabatan' => htmlspecialchars($this->input->post('jabatan', true)),
                    'hp' => htmlspecialchars($this->input->post('hp', true)),
                    'email' => htmlspecialchars($email),
                    'image' => 'default.png',
                    'username' => htmlspecialchars($this->input->post('username', true)),
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'role_id' => 2,
                    'is_active' => 1,
                    'date_created' => time()
                ];

                $this->db->insert('user', $data);

                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Pegawai Berhasil di Tambahkan! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('Pegawai');
            }
        }
    }

    //Update one item
    public function ubah($id)
    {
        $data = [
            'title' => 'Ubah Data Pegawai',
            'pegawai' => $this->db->get_where('user', ['id' => $id])->row(),
            'role' => $this->db->get('user_role')->result()
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('admin/pegawai/ubah', $data);
        $this->load->view('template/footer', $data);
    }

    function proses_edit()
    {
        if (isset($_POST['ubah'])) {
            $data = [
                'nip' => htmlspecialchars($this->input->post('nip', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'tempat' => htmlspecialchars($this->input->post('tempat', true)),
                'tgl_lhr' => htmlspecialchars($this->input->post('tgl_lhr', true)),
                'jk' => htmlspecialchars($this->input->post('jk', true)),
                'pendidikan' => htmlspecialchars($this->input->post('pendidikan', true)),
                'jurusan' => htmlspecialchars($this->input->post('jurusan', true)),
                'status' => htmlspecialchars($this->input->post('status', true)),
                'bekerja' => htmlspecialchars($this->input->post('bekerja', true)),
                'pangkat' => htmlspecialchars($this->input->post('pangkat', true)),
                'golongan' => htmlspecialchars($this->input->post('golongan', true)),
                'jabatan' => htmlspecialchars($this->input->post('jabatan', true)),
                'hp' => htmlspecialchars($this->input->post('hp', true)),
                'role_id' => htmlspecialchars($this->input->post('role', true)),
            ];

            $this->db->where('id', $this->input->post('id'));
            $this->db->update('user', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Pegawai Berhasil di Ubah! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('Pegawai');
        }
    }

    //Delete one item
    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Pegawai Berhasil di Hapus! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Pegawai');
    }

    public function reset($id)
    {
        $passnew = rand();
        $data = ['password' => password_hash($passnew, PASSWORD_DEFAULT)];

        $nama = $this->db->get_where('user', ['id' => $id])->row();

        $this->db->where('id', $id);
        $this->db->update('user', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Password Baru ' . $nama->nama . ' Adalah <span class="text-danger">' . $passnew . '</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Administrator/Pegawai');
    }
}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */

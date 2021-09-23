<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pcr extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
        if ($this->session->userdata('username') == '') {
            redirect('Auth');
        }
    }

    // List all your items
    public function index()
    {
        $data = [
            'title' => 'Data PCR'
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('admin/pcr/index', $data);
        $this->load->view('template/footer', $data);
    }


    function get_pcr_dosen()
    {
        $pcr = $this->db->query("SELECT * FROM tb_pcr WHERE kategori='2'")->result();
        $no = 1;
        foreach ($pcr as $data) {
            echo '
                <tr>
                    <td align="center">' . $no++ . '</td>
                    <td> ' . $data->kode . '</td>
                    <td> ' . $data->nama . '</td>
                    <td> ' . $data->tanggal . '</td>
                    <td align="center"> ' . $data->hasil . '</td>
                </tr>
            ';
        }
    }

    function get_pcr_mahasiswa()
    {
        $pcr = $this->db->query("SELECT * FROM tb_pcr WHERE kategori='4'")->result();
        $no = 1;
        foreach ($pcr as $data) {
            echo '
                <tr>
                    <td align="center">' . $no++ . '</td>
                    <td> ' . $data->kode . '</td>
                    <td> ' . $data->nama . '</td>
                    <td> ' . $data->angkatan . '</td>
                    <td> ' . $data->tanggal . '</td>
                    <td align="center"> ' . $data->hasil . '</td>
                </tr>
            ';
        }
    }

    function get_pcr_tendik()
    {
        $pcr = $this->db->query("SELECT * FROM tb_pcr WHERE kategori='3'")->result();
        $no = 1;
        foreach ($pcr as $data) {
            echo '
                <tr>
                    <td align="center">' . $no++ . '</td>
                    <td> ' . $data->kode . '</td>
                    <td> ' . $data->nama . '</td>
                    <td> ' . $data->tanggal . '</td>
                    <td align="center"> ' . $data->hasil . '</td>
                </tr>
            ';
        }
    }

    function get_kode_nip()
    {
        if (isset($_GET['term'])) {
            $result = $this->db->query("SELECT * FROM tb_dosen WHERE (nip LIKE '%$_GET[term]%') ORDER BY nip ASC limit 10")->result();
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = array(
                        'label'  => $row->nip,
                        'value'  => $row->nip,
                        'nama'   => $row->nama,
                    );
                echo json_encode($arr_result);
            }
        }
    }

    function get_kode_id()
    {
        if (isset($_GET['term'])) {
            $result = $this->db->query("SELECT * FROM tb_tendik WHERE (id LIKE '%$_GET[term]%') ORDER BY id ASC limit 10")->result();
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = array(
                        'label'  => $row->id,
                        'value'  => $row->id,
                        'nama'   => $row->nama,
                    );
                echo json_encode($arr_result);
            }
        }
    }

    function get_kode_nim()
    {
        if (isset($_GET['term'])) {
            $result = $this->db->query("SELECT * FROM tb_mahasiswa WHERE (nim LIKE '%$_GET[term]%') ORDER BY nim ASC limit 10")->result();
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = array(
                        'label'  => $row->nim,
                        'value'  => $row->nim,
                        'nama'   => $row->nama,
                        'angkatan'   => $row->angkatan,
                    );
                echo json_encode($arr_result);
            }
        }
    }

    // Add a new item
    public function input()
    {
        if ($this->uri->segment(3) == '') {
            redirect('Pcr');
        }

        $data = [
            'title' => 'Input Hasil PCR'
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('admin/pcr/tambah', $data);
        $this->load->view('template/footer', $data);
    }

    function simpan()
    {
        if (isset($_POST['simpan'])) {
            if ($_FILES['berkas']['error'] <> 4) {

                $config['upload_path'] = './assets/upload/pcr/';
                $config['allowed_types'] = 'jpeg|jpg|png|gif|bmp|ico';
                $config['encrypt_name'] = true;
                $config['max_size']     = '1024';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('berkas')) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data PCR Gagal di Tambahkan! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('Pcr');
                } else {
                    $hasil  = $this->upload->data();

                    $data = [
                        'kategori' => htmlspecialchars($this->input->post('kategori')),
                        'kode' => htmlspecialchars($this->input->post('kode')),
                        'nama' => htmlspecialchars($this->input->post('nama')),
                        'angkatan' => htmlspecialchars($this->input->post('angkatan')),
                        'tanggal' => htmlspecialchars($this->input->post('tanggal')),
                        'hasil' => htmlspecialchars($this->input->post('hasil')),
                        'berkas' => htmlspecialchars($hasil['file_name']),
                    ];

                    $this->db->insert('tb_pcr', $data);

                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data PCR Berhasil di Tambahkan! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('Pcr');
                }
            }
        }
    }

    //Update one item
    public function ubah($id)
    {
        $data = [
            'title' => 'Ubah Hasil PCR',
            'dosen' => $this->db->get_where('tb_dosen', ['nip' => $id])->row(),
            'user' => $this->db->get_where('tb_user', ['nama' => $id])->row(),
            'vaksin' => $this->db->get_where('tb_vaksin', ['kode' => $id])->row(),
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('admin/pcr/ubah', $data);
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
}

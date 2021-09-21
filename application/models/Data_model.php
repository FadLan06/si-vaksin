<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_model extends CI_Model
{
    function spt()
    {
        $this->db->select('*');
        $this->db->join('tb_nama', 'tb_spt.kd_spt = tb_nama.no_surat');
        $this->db->from('tb_spt');
        $query = $this->db->get();
        return $query;
    }

    function getKegiatan()
    {
        $this->db->select('*');
        $this->db->join('tb_dasar', 'tb_kegiatan.kd_keg = tb_dasar.kd_keg');
        $this->db->from('tb_kegiatan');
        $query = $this->db->get();
        return $query;
    }

    function nama()
    {
        $this->db->select('*');
        $this->db->join('tb_spt', 'tb_nama.no_surat = tb_spt.kd_spt');
        $this->db->join('user', 'tb_nama.nama = user.id');
        $this->db->from('tb_nama');
        $query = $this->db->get();
        return $query;
    }

    function nama2()
    {
        $this->db->select('*');
        $this->db->join('tb_spt', 'tb_nama.no_surat = tb_spt.kd_spt');
        $this->db->join('user', 'tb_nama.nama = user.id');
        $this->db->from('tb_nama');
        $query = $this->db->get();
        return $query;
    }

    function nama1($id)
    {
        $this->db->select('*');
        $this->db->join('tb_spt', 'tb_nama.no_surat = tb_spt.kd_spt');
        $this->db->join('user', 'tb_nama.nama = user.id');
        $this->db->from('tb_nama');
        $this->db->like('nomor', $id, 'BOTH');
        $query = $this->db->get();
        return $query;
    }

    function namaa($id)
    {
        $this->db->select('*');
        $this->db->join('tb_spt', 'tb_nama.no_surat = tb_spt.kd_spt');
        $this->db->from('tb_nama');
        $this->db->where('no_surat', $id);
        $query = $this->db->get();
        return $query->row();
    }

    function spd()
    {
        $this->db->select('*');
        $this->db->join('tb_spt', 'tb_nama.no_surat = tb_spt.kd_spt');
        $this->db->join('user', 'tb_nama.nama = user.id');
        $this->db->from('tb_nama');
        // $this->db->where('kd_spt', $this->uri->segment(3));
        $query = $this->db->get();
        return $query;
    }

    function view()
    {
        $this->db->select('*');
        $this->db->join('tb_spt', 'tb_nama.no_surat = tb_spt.kd_spt');
        $this->db->join('user', 'tb_nama.nama = user.id');
        $this->db->from('tb_nama');
        $this->db->where('no_surat', $this->uri->segment(3));
        $query = $this->db->get();
        return $query;
    }

    function view1($id)
    {
        $this->db->select('*');
        $this->db->join('tb_spt', 'tb_nama.no_surat = tb_spt.kd_spt');
        $this->db->join('user', 'tb_nama.nama = user.id');
        $this->db->from('tb_nama');
        $this->db->like('nomor', $id, 'BOTH');
        $query = $this->db->get();
        return $query;
    }

    public function getAuto($title)
    {
        $this->db->like('nomor', $title, 'BOTH');
        $this->db->order_by('kd_spt', 'asc');
        $this->db->limit(10);
        return $this->db->get('tb_spt')->result();
    }

    function dasar()
    {
        $this->db->select('*');
        $this->db->join('tb_spt', 'tb_transaksi.no_surat = tb_spt.kd_spt');
        $this->db->join('tb_dasar', 'tb_transaksi.dasar = tb_dasar.kd_keg');
        $this->db->from('tb_transaksi');
        $query = $this->db->get();
        return $query;
    }

    function cetak()
    {
        $this->db->select('*');
        $this->db->join('tb_spt', 'tb_nama.no_surat = tb_spt.kd_spt');
        $this->db->join('user', 'tb_nama.nama = user.id');
        $this->db->from('tb_nama');
        $this->db->where('no_surat', $this->uri->segment(3));
        $query = $this->db->get();
        return $query;
    }

    function cetak3($kd)
    {
        $this->db->select('*');
        $this->db->join('tb_spt', 'tb_nama.no_surat = tb_spt.kd_spt');
        $this->db->join('user', 'tb_nama.nama = user.id');
        $this->db->from('tb_nama');
        $this->db->where('kd_spt', $kd);
        $query = $this->db->get();
        return $query;
    }

    function cetak1()
    {
        $this->db->select('*');
        $this->db->join('tb_spt', 'tb_nama.no_surat = tb_spt.kd_spt');
        $this->db->join('user', 'tb_nama.nama = user.id');
        $this->db->from('tb_nama');
        $this->db->where('kd_spt', $this->uri->segment(3));
        $query = $this->db->get();
        return $query;
    }

    function cetak11($kd)
    {
        $this->db->select('*');
        $this->db->join('tb_spt', 'tb_nama.no_surat = tb_spt.kd_spt');
        $this->db->join('user', 'tb_nama.nama = user.id');
        $this->db->from('tb_nama');
        $this->db->where('no_surat', $kd);
        $query = $this->db->get();
        return $query;
    }

    function cetak2($id)
    {
        $this->db->select('*');
        $this->db->join('tb_spt', 'tb_nama.no_surat = tb_spt.kd_spt');
        $this->db->join('user', 'tb_nama.nama = user.id');
        $this->db->from('tb_nama');
        $this->db->where('kd_spt', $id);
        $query = $this->db->get();
        return $query;
    }

    function kwitansi()
    {
        $this->db->select('*');
        $this->db->join('user', 'tb_nama.nama = user.id');
        $this->db->from('tb_nama');
        $this->db->where('kd_nama', $this->uri->segment(4));
        $query = $this->db->get();
        return $query;
    }

    function sppd()
    {
        $this->db->select('*');
        $this->db->join('user', 'tb_nama.nama = user.id');
        $this->db->from('tb_nama');
        $this->db->where('kd_nama', $this->uri->segment(4));
        $query = $this->db->get();
        return $query;
    }

    function v_sppd($kd)
    {
        $this->db->select('*');
        $this->db->join('user', 'tb_nama.nama = user.id');
        $this->db->from('tb_nama');
        $this->db->where('kd_nama', $kd);
        $query = $this->db->get();
        return $query;
    }

    function insert1($data)
    {
        $this->db->insert('tb_nama', $data);
    }

    function insert2($data)
    {
        $this->db->insert('tb_transaksi', $data);
    }

    public function kode()
    {
        $this->db->select('RIGHT(tb_spt.nomor,4) as nomor', FALSE);
        $this->db->order_by('kd_spt', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_spt');  //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->num_rows() <> 0) {
            //cek kode jika telah tersedia    
            $data = $query->row();
            $kode = intval($data->nomor) + 1;
        } else {
            $kode = 1;  //cek jika kode belum terdapat pada table
        }
        $batas = str_pad($kode, 2, "0", STR_PAD_LEFT);
        $kodetampil = $batas;  //format kode
        return $kodetampil;
    }
}

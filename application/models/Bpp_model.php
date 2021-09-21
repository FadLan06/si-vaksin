<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bpp_model extends CI_Model
{
    function getRincian()
    {
        $this->db->select('*');
        $this->db->join('tb_spt', 'tb_kwitansi.no_surat = tb_spt.kd_spt');
        $this->db->from('tb_kwitansi');
        $query = $this->db->get();
        return $query;
    }

    function v_rincian($kd)
    {
        $this->db->select('*');
        $this->db->join('user', 'tb_nama.nama = user.id');
        $this->db->from('tb_nama');
        $this->db->where('kd_nama', $kd);
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

    function kwitansi()
    {
        $this->db->select('*');
        $this->db->join('user', 'tb_nama.nama = user.id');
        $this->db->from('tb_nama');
        $this->db->where('kd_nama', $this->uri->segment(4));
        $query = $this->db->get();
        return $query;
    }

    function getTtd()
    {
        $this->db->select('*');
        $this->db->join('tb_spt', 'tb_nama.no_surat = tb_spt.kd_spt');
        $this->db->join('user', 'tb_nama.nama = user.id');
        $this->db->from('tb_nama');
        $this->db->where('kd_nama', $this->uri->segment(3));
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
}

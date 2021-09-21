<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dasar_model extends CI_Model
{
    function getKegiatan()
    {
        $this->db->select('*');
        $this->db->join('tb_dasar', 'tb_kegiatan.kd_keg = tb_dasar.kd_keg');
        $this->db->from('tb_kegiatan');
        $query = $this->db->get();
        return $query;
    }

    function pegawai()
    {
        $query = $this->db->get('user');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    function spt()
    {
        $query = $this->db->get('tb_spt');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    function sppd()
    {
        $query = $this->db->query("SELECT DISTINCT no_surat FROM tb_kwitansi ORDER BY no_surat");
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    function kwitansi()
    {
        $query = $this->db->query("SELECT SUM(total) FROM tb_kwitansi");
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
}

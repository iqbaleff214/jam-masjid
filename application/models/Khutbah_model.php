<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Khutbah_model extends CI_Model
{
    public function getKhutbahAll($cari = null)
    {
        $this->db->select('*');
        $this->db->from('tb_khutbah');
        if ($cari) {
            $this->db->like('tb_ustadz.nama', $cari);
            $this->db->or_like('tb_muadzin.muadzin', $cari);
        }
        $this->db->join('tb_ustadz', 'tb_khutbah.id_ustadz = tb_ustadz.id_ustadz');
        $this->db->join('tb_muadzin', 'tb_khutbah.id_muadzin = tb_muadzin.id_muadzin');
        $this->db->order_by('tanggal', 'ASC');
        return $this->db->get()->result_array();
    }

    public function getKhutbah($id)
    {
        $this->db->select('*');
        $this->db->from('tb_khutbah');
        $this->db->where('id_khutbah', $id);
        $this->db->join('tb_ustadz', 'tb_khutbah.id_ustadz = tb_ustadz.id_ustadz');
        $this->db->join('tb_muadzin', 'tb_khutbah.id_muadzin = tb_muadzin.id_muadzin');
        $this->db->order_by('tanggal', 'ASC');
        return $this->db->get()->row_array();
    }

    public function cekJadwalSama()
    {
        # code...
    }
}

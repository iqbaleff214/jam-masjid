<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kajian_model extends CI_Model
{
    public function getKajianAll($cari = null)
    {
        $this->db->select('*');
        $this->db->from('tb_kajian');
        if ($cari) {
            $this->db->like('tb_ustadz.nama', $cari);
            $this->db->or_like('tb_waktu.waktu', $cari);
        }
        $this->db->join('tb_ustadz', 'tb_kajian.id_ustadz = tb_ustadz.id_ustadz');
        $this->db->join('tb_waktu', 'tb_kajian.id_waktu = tb_waktu.id_waktu');
        $this->db->order_by('tanggal', 'ASC');
        return $this->db->get()->result_array();
    }

    public function getKajian($id)
    {
        $this->db->select('*');
        $this->db->from('tb_kajian');
        $this->db->where('id_kajian', $id);
        $this->db->join('tb_ustadz', 'tb_kajian.id_ustadz = tb_ustadz.id_ustadz');
        $this->db->join('tb_waktu', 'tb_kajian.id_waktu = tb_waktu.id_waktu');
        $this->db->order_by('tanggal', 'ASC');
        return $this->db->get()->row_array();
    }
}

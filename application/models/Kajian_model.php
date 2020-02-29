<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kajian_model extends CI_Model
{
    public function getKajianAll()
    {
        $this->db->select('*');
        $this->db->from('tb_kajian');
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

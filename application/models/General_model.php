<?php
defined('BASEPATH') or exit('No direct script access allowed');

class General_model extends CI_Model
{
    public function countUstadz()
    {
        return $this->db->count_all('tb_ustadz');
    }

    public function kajian($akhwat = null)
    {
        $this->db->select('*');
        $this->db->from('tb_kajian');
        $this->db->where('akhwat', $akhwat);
        $this->db->where('tanggal >', time());
        $this->db->join('tb_ustadz', 'tb_kajian.id_ustadz = tb_ustadz.id_ustadz');
        $this->db->join('tb_waktu', 'tb_kajian.id_waktu = tb_waktu.id_waktu');
        $this->db->order_by('tanggal', 'ASC');
        return $this->db->get()->row_array();
    }

    public function khotib()
    {
        $this->db->select('*');
        $this->db->from('tb_khutbah');
        $this->db->where('tanggal >', time() + (1 * 24 * 60 * 60));
        $this->db->join('tb_ustadz', 'tb_khutbah.id_ustadz = tb_ustadz.id_ustadz');
        $this->db->join('tb_muadzin', 'tb_khutbah.id_muadzin = tb_muadzin.id_muadzin');
        $this->db->order_by('tanggal', 'ASC');
        return $this->db->get()->row_array();
    }
}

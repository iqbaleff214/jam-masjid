<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kajian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        isLogin();
        $this->load->model('Kajian_model', 'kajian');
    }

    public function index()
    {
        $data['title']  = "Jadwal Kajian";
        $data['basic']  = $this->db->get('tb_pengurus')->row_array();
        $data['kajian'] = $this->kajian->getKajianAll();

        $this->load->view('layouts/admin/header', $data);
        $this->load->view('layouts/admin/sidebar');
        $this->load->view('layouts/admin/topbar');
        $this->load->view('admin/kajian');
        $this->load->view('layouts/admin/footer');
    }

    public function show($id)
    {
        $data['title']  = "Jadwal Kajian";
        $data['basic']  = $this->db->get('tb_pengurus')->row_array();
        $data['kajian'] = $this->kajian->getKajian($id);

        $this->load->view('layouts/admin/header', $data);
        $this->load->view('layouts/admin/sidebar');
        $this->load->view('layouts/admin/topbar');
        $this->load->view('admin/ustadz_detail');
        $this->load->view('layouts/admin/footer');
    }

    public function add()
    {
        $this->__valid();
        if ($this->form_validation->run()) {
            $this->__add();
        } else {
            $data['title']  = "Tambah Kajian";
            $data['basic']  = $this->db->get('tb_pengurus')->row_array();
            $data['ustadz'] = $this->db->get('tb_ustadz')->result_array();
            $data['waktu']  = $this->db->get('tb_waktu')->result_array();

            $this->load->view('layouts/admin/header', $data);
            $this->load->view('layouts/admin/sidebar');
            $this->load->view('layouts/admin/topbar');
            $this->load->view('admin/kajian_detail');
            $this->load->view('layouts/admin/footer');
        }
    }


    public function delete($id)
    {
        $this->db->delete('tb_kajian', ['id_kajian' => $id]);
        pesan('Data kajian berhasil dihapus', 'success');
        redirect('kajian');
    }

    private function __valid()
    {
        $this->form_validation->set_rules('tanggal', 'Surel', 'trim|required', [
            'required' => 'Tanggal tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('ustadz', 'Surel', 'trim|required', [
            'required' => 'Nama Ustadz tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('waktu', 'Surel', 'trim|required', [
            'required' => 'Waktu boleh kosong!'
        ]);
    }

    private function __add()
    {
        $tgl  = strtotime($this->input->post('tanggal'));
        $ust  = $this->input->post('ustadz');
        $wkt  = $this->input->post('waktu');
        $data       = [
            'tanggal'     => $tgl,
            'id_ustadz'   => $ust,
            'id_waktu'    => $wkt
        ];
        $add = $this->db->insert('tb_kajian', $data);
        if ($add) {
            pesan('Data kajian berhasil ditambahkan', 'success');
            redirect('kajian');
        } else {
            pesan('Data kajian gagal ditambahkan', 'error');
            redirect('kajian');
        }
    }
}

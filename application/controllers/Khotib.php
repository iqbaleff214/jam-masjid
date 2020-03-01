<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Khotib extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        isLogin();
        $this->load->model('Khutbah_model', 'khutbah');
    }

    public function index()
    {
        $data['title']  = "Khotib Jumat";
        $data['basic']  = $this->db->get('tb_pengurus')->row_array();
        $data['khotib'] = $this->khutbah->getKhutbahAll();

        $this->load->view('layouts/admin/header', $data);
        $this->load->view('layouts/admin/sidebar');
        $this->load->view('layouts/admin/topbar');
        $this->load->view('admin/khutbah');
        $this->load->view('layouts/admin/footer');
    }

    public function show($id)
    {
        $data['title']  = "Lihat Khotib";
        $data['basic']  = $this->db->get('tb_pengurus')->row_array();
        $data['khotib'] = $this->khutbah->getKhutbah($id);

        $this->load->view('layouts/admin/header', $data);
        $this->load->view('layouts/admin/sidebar');
        $this->load->view('layouts/admin/topbar');
        $this->load->view('admin/khutbah_detail');
        $this->load->view('layouts/admin/footer');
    }

    public function add()
    {
        $this->__valid();
        if ($this->form_validation->run()) {
            $this->__add();
        } else {
            $data['title']  = "Tambah Khotib";
            $data['basic']  = $this->db->get('tb_pengurus')->row_array();
            $data['ustadz'] = $this->db->get('tb_ustadz')->result_array();
            $data['muadzin'] = $this->db->get('tb_muadzin')->result_array();

            $this->load->view('layouts/admin/header', $data);
            $this->load->view('layouts/admin/sidebar');
            $this->load->view('layouts/admin/topbar');
            $this->load->view('admin/khutbah_detail');
            $this->load->view('layouts/admin/footer');
        }
    }

    public function edit($id)
    {
        $this->__valid();
        if ($this->form_validation->run()) {
            $this->__edit($id);
        } else {
            $data['title']   = "Edit Khotib";
            $data['basic']   = $this->db->get('tb_pengurus')->row_array();
            $data['ustadz']  = $this->db->get('tb_ustadz')->result_array();
            $data['muadzin'] = $this->db->get('tb_muadzin')->result_array();
            $data['khotib']  = $this->khutbah->getKhutbah($id);

            $this->load->view('layouts/admin/header', $data);
            $this->load->view('layouts/admin/sidebar');
            $this->load->view('layouts/admin/topbar');
            $this->load->view('admin/khutbah_detail');
            $this->load->view('layouts/admin/footer');
        }
    }

    public function delete($id)
    {
        $this->db->delete('tb_khutbah', ['id_khutbah' => $id]);
        pesan('Data khotib berhasil dihapus', 'success');
        redirect('khotib');
    }

    private function __valid()
    {
        $this->form_validation->set_rules('tanggal', 'Surel', 'trim|required', [
            'required' => 'Tanggal tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('ustadz', 'Surel', 'trim|required', [
            'required' => 'Nama Ustadz tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('muadzin', 'Surel', 'trim|required', [
            'required' => 'Muadzin boleh kosong!'
        ]);
    }

    private function __add()
    {
        $tgl  = strtotime($this->input->post('tanggal'));
        if (date('N', $tgl) == 5) {
            $ust  = $this->input->post('ustadz');
            $mzn  = $this->input->post('muadzin');

            $data       = [
                'tanggal'     => $tgl,
                'id_ustadz'   => $ust,
                'id_muadzin'  => $mzn,
            ];
            $add = $this->db->insert('tb_khutbah', $data);
            if ($add) {
                pesan('Data khotib berhasil ditambahkan', 'success');
                redirect('khotib');
            } else {
                pesan('Data khotib gagal ditambahkan', 'error');
                redirect('khotib');
            }
        } else {
            pesan('Data khotib gagal ditambahkan! Pilih hari Jumat', 'error');
            redirect('khotib');
        }
    }


    private function __edit($id)
    {
        $tgl  = strtotime($this->input->post('tanggal'));
        $ust  = $this->input->post('ustadz');
        $mzn  = $this->input->post('muadzin');

        $this->db->set('tanggal', $tgl);
        $this->db->set('id_ustadz', $ust);
        $this->db->set('id_muadzin', $mzn);

        $this->db->where('id_khutbah', $id);
        $add = $this->db->update('tb_khutbah');
        if ($add) {
            pesan('Data khotib berhasil diubah', 'success');
            redirect('khotib');
        } else {
            pesan('Data khotib gagal diubah', 'error');
            redirect('khotib');
        }
    }
}

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
        $kajian         = $this->kajian->getKajianAll($this->input->post('cari'));

        $data['title']  = "Jadwal Kajian";
        $data['basic']  = $this->db->get('tb_pengurus')->row_array();
        $data['umum']   = [];
        $data['akhwat'] = [];


        foreach ($kajian as $kjn) {
            if ($kjn['akhwat'] == 1) {
                array_push($data['akhwat'], $kjn);
            } else {
                array_push($data['umum'], $kjn);
            }
        }

        $this->load->view('layouts/admin/header', $data);
        $this->load->view('layouts/admin/sidebar');
        $this->load->view('layouts/admin/topbar');
        $this->load->view('admin/kajian');
        $this->load->view('layouts/admin/footer');
    }

    public function show($id)
    {
        $data['title']  = "Lihat Kajian";
        $data['basic']  = $this->db->get('tb_pengurus')->row_array();
        $data['kajian'] = $this->kajian->getKajian($id);

        $this->load->view('layouts/admin/header', $data);
        $this->load->view('layouts/admin/sidebar');
        $this->load->view('layouts/admin/topbar');
        $this->load->view('admin/kajian_detail');
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

    public function edit($id)
    {
        $this->__valid();
        if ($this->form_validation->run()) {
            $this->__edit($id);
        } else {
            $data['title']  = "Edit Kajian";
            $data['basic']  = $this->db->get('tb_pengurus')->row_array();
            $data['ustadz'] = $this->db->get('tb_ustadz')->result_array();
            $data['waktu']  = $this->db->get('tb_waktu')->result_array();
            $data['kajian'] = $this->kajian->getKajian($id);

            $this->load->view('layouts/admin/header', $data);
            $this->load->view('layouts/admin/sidebar');
            $this->load->view('layouts/admin/topbar');
            $this->load->view('admin/kajian_detail');
            $this->load->view('layouts/admin/footer');
        }
    }

    public function delete($id)
    {
        if ($this->db->delete('tb_kajian', ['id_kajian' => $id])) {
            pesan('Data kajian berhasil dihapus', 'success');
        } else {
            pesan('Data kajian gagal dihapus', 'error');
        }
        redirect('kajian');
    }

    public function addwaktu()
    {
        $this->form_validation->set_rules('waktu', 'Muadzin', 'trim|required', [
            'required' => 'Waktu tidak boleh kosong!'
        ]);
        if ($this->form_validation->run()) {
            $data = [
                'waktu'         => $this->input->post('waktu'),
                'keterangan'    => $this->input->post('keterangan')
            ];
            if ($this->db->insert('tb_waktu', $data)) {
                pesan('Data waktu berhasil ditambahkan', 'success');
                redirect('dashboard');
            } else {
                pesan('Data waktu gagal ditambahkan', 'error');
                redirect('dashboard');
            }
        } else {
            $data['title']  = "Tambah Waktu";
            $data['basic']  = $this->db->get('tb_pengurus')->row_array();

            $this->load->view('layouts/admin/header', $data);
            $this->load->view('layouts/admin/sidebar');
            $this->load->view('layouts/admin/topbar');
            $this->load->view('admin/waktu_detail');
            $this->load->view('layouts/admin/footer');
        }
    }

    public function editwaktu($id)
    {
        $this->form_validation->set_rules('waktu', 'Muadzin', 'trim|required', [
            'required' => 'Waktu tidak boleh kosong!'
        ]);
        if ($this->form_validation->run()) {
            $this->db->set('waktu', $this->input->post('waktu'));
            $this->db->set('keterangan', $this->input->post('keterangan'));
            $this->db->where('id_waktu', $id);
            if ($this->db->update('tb_waktu')) {
                pesan('Data waktu berhasil diubah', 'success');
                redirect('dashboard');
            } else {
                pesan('Data waktu gagal diubah', 'error');
                redirect('dashboard');
            }
        } else {
            $data['title']  = "Edit Waktu";
            $data['basic']  = $this->db->get('tb_pengurus')->row_array();
            $data['waktu']  = $this->db->get_where('tb_waktu', ['id_waktu' => $id])->row_array();

            $this->load->view('layouts/admin/header', $data);
            $this->load->view('layouts/admin/sidebar');
            $this->load->view('layouts/admin/topbar');
            $this->load->view('admin/waktu_detail');
            $this->load->view('layouts/admin/footer');
        }
    }

    public function deletewaktu($id)
    {
        if ($this->db->delete('tb_kajian', ['id_waktu' => $id])) {
            $this->db->delete('tb_waktu', ['id_waktu' => $id]);
            pesan('Data waktu berhasil dihapus', 'success');
        } else {
            pesan('Data gagal dihapus', 'error');
        }
        redirect('dashboard');
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
        $jdl  = $this->input->post('judul');
        $dsk  = $this->input->post('deskripsi');
        $akh  = $this->input->post('akhwat');

        $data       = [
            'tanggal'     => $tgl,
            'id_ustadz'   => $ust,
            'id_waktu'    => $wkt,
            'akhwat'      => $akh,
            'judul'       => $jdl,
            'deskripsi'   => $dsk
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

    private function __edit($id)
    {
        $tgl  = strtotime($this->input->post('tanggal'));
        $ust  = $this->input->post('ustadz');
        $wkt  = $this->input->post('waktu');
        $jdl  = $this->input->post('judul');
        $dsk  = $this->input->post('deskripsi');
        $akh  = $this->input->post('akhwat');

        $this->db->set('tanggal', $tgl);
        $this->db->set('id_ustadz', $ust);
        $this->db->set('id_waktu', $wkt);
        $this->db->set('judul', $jdl);
        $this->db->set('deskripsi', $dsk);
        $this->db->set('akhwat', $akh);

        $this->db->where('id_kajian', $id);
        $add = $this->db->update('tb_kajian');
        if ($add) {
            pesan('Data kajian berhasil diubah', 'success');
            redirect('kajian');
        } else {
            pesan('Data kajian gagal diubah', 'error');
            redirect('kajian');
        }
    }
}

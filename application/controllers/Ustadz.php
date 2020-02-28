<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ustadz extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        isLogin();
    }

    public function index()
    {
        $data['title']  = "Ustadz";
        $data['basic']  = $this->db->get('tb_pengurus')->row_array();
        $data['ustadz'] = $this->db->get('tb_ustadz')->result_array();

        $this->load->view('layouts/admin/header', $data);
        $this->load->view('layouts/admin/sidebar');
        $this->load->view('layouts/admin/topbar');
        $this->load->view('admin/ustadz');
        $this->load->view('layouts/admin/footer');
    }

    public function show($id)
    {
        $data['title']  = "Lihat Ustadz";
        $data['basic']  = $this->db->get('tb_pengurus')->row_array();
        $data['ustadz'] = $this->db->get_where('tb_ustadz', ['id_ustadz' => $id])->row_array();

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
            $data['title']  = "Tambah Ustadz";
            $data['basic']  = $this->db->get_where('tb_pengurus', ['username' => $_SESSION['username']])->row_array();

            $this->load->view('layouts/admin/header', $data);
            $this->load->view('layouts/admin/sidebar');
            $this->load->view('layouts/admin/topbar');
            $this->load->view('admin/ustadz_detail');
            $this->load->view('layouts/admin/footer');
        }
    }

    public function edit($id)
    {
        $this->__valid();
        if ($this->form_validation->run()) {
            $this->__edit($id);
        } else {
            $data['title']  = "Edit Ustadz";
            $data['basic']  = $this->db->get_where('tb_pengurus', ['username' => $_SESSION['username']])->row_array();
            $data['ustadz'] = $this->db->get_where('tb_ustadz', ['id_ustadz' => $id])->row_array();

            $this->load->view('layouts/admin/header', $data);
            $this->load->view('layouts/admin/sidebar');
            $this->load->view('layouts/admin/topbar');
            $this->load->view('admin/ustadz_detail');
            $this->load->view('layouts/admin/footer');
        }
    }

    public function delete($id)
    {
        $ust = $this->db->get_where('tb_ustadz', ['id_ustadz' => $id])->row_array();
        if ($ust['foto'] != 'default.png') {
            unlink(FCPATH . "assets/img/ustadz/" . $ust['foto']);
        }
        $this->db->delete('tb_ustadz', ['id_ustadz' => $id]);
        pesan('Data ustadz berhasil dihapus', 'success');
        redirect('ustadz');
    }

    private function __valid()
    {
        $this->form_validation->set_rules('nama', 'Surel', 'trim|required', [
            'required' => 'Nama tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('no_telp', 'Surel', 'trim|required', [
            'required' => 'No Telp tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('alamat', 'Surel', 'trim|required', [
            'required' => 'Alamat tidak boleh kosong!'
        ]);
    }

    private function __add()
    {
        $nama       = $this->input->post('nama');
        $no_telp    = $this->input->post('no_telp');
        $alamat     = $this->input->post('alamat');
        $facebook   = $this->input->post('facebook');
        $instagram  = $this->input->post('instagram');
        $bio        = $this->input->post('bio');
        $data       = [
            'nama'      => $nama,
            'no_telp'   => $no_telp,
            'alamat'    => $alamat,
            'facebook'  => $facebook,
            'instagram' => $instagram,
            'foto'      => 'default.png',
            'bio'       => $bio
        ];
        $upload_image = $_FILES['foto']['name'];
        if ($upload_image) {
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/img/ustadz/';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('foto')) {
                $data['foto'] = $this->upload->data('file_name');
            } else {
                echo $this->upload->display_errors();
                die;
            }
        }
        $add = $this->db->insert('tb_ustadz', $data);
        if ($add) {
            pesan('Data ustadz berhasil ditambahkan', 'success');
            redirect('ustadz');
        } else {
            pesan('Data ustadz gagal ditambahkan', 'error');
            redirect('ustadz');
        }
    }

    private function __edit($id)
    {
        $ustadz     = $this->db->get_where('tb_ustadz', ['id_ustadz' => $id])->row_array();

        $nama       = $this->input->post('nama');
        $no_telp    = $this->input->post('no_telp');
        $alamat     = $this->input->post('alamat');
        $facebook   = $this->input->post('facebook');
        $instagram  = $this->input->post('instagram');
        $bio        = $this->input->post('bio');

        $this->db->set('nama', $nama);
        $this->db->set('no_telp', $no_telp);
        $this->db->set('alamat', $alamat);
        $this->db->set('facebook', $facebook);
        $this->db->set('instagram', $instagram);
        $this->db->set('bio', $bio);

        $upload_image = $_FILES['foto']['name'];
        if ($upload_image) {
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/img/ustadz/';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('foto')) {
                $foto = $ustadz['foto'];
                if ($foto   != 'default.png') {
                    unlink(FCPATH . "assets/img/ustadz/" . $foto);
                }
                $this->db->set('foto',  $this->upload->data('file_name'));
            } else {
                echo $this->upload->display_errors();
                die;
            }
        }
        // $add = $this->db->insert('tb_ustadz', $data);
        $this->db->where('id_ustadz', $id);
        $add = $this->db->update('tb_ustadz');
        if ($add) {
            pesan('Data Ustadz ' . $ustadz['nama'] . ' berhasil diubah', 'success');
            redirect('ustadz');
        } else {
            pesan('Data Ustadz ' . $ustadz['nama'] . ' gagal diubah', 'error');
            redirect('ustadz');
        }
    }
}

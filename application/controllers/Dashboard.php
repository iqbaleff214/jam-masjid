<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        isLogin();
        // update_data();
        $this->load->model('General_model', 'dashboard');
    }

    public function index()
    {
        $data['title'] = "Dashboard";
        $data['basic'] = $this->db->get('tb_pengurus')->row_array();

        $data['count_ustadz'] = $this->dashboard->countUstadz();
        $data['kajian_umum'] = $this->dashboard->kajian();
        $data['kajian_akhwat'] = $this->dashboard->kajian(1);
        $data['khotib'] = $this->dashboard->khotib();
        // var_dump($data['khotib']);die;
        $data['waktu'] = $this->db->get('tb_waktu')->result_array();
        $data['muadzin'] = $this->db->get('tb_muadzin')->result_array();


        $this->load->view('layouts/admin/header', $data);
        $this->load->view('layouts/admin/sidebar');
        $this->load->view('layouts/admin/topbar');
        $this->load->view('admin/dashboard');
        $this->load->view('layouts/admin/footer');
    }

    public function reset()
    {
        $a = $this->db->truncate('tb_kajian');
        $b = $this->db->truncate('tb_khutbah');
        $c = $this->db->truncate('tb_ustadz');
        $d = $this->db->truncate('tb_muadzin');
        $e = $this->db->truncate('tb_waktu');
        if ($a && $b && $c && $d && $e) {
            pesan("Reset data berhasil", 'success');
        } else {
            pesan("Reset data gagal", 'error');
        }
        redirect('dashboard');
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        isLogin();
    }

    public function index()
    {
        $data['title'] = "Dashboard";
        $data['basic'] = $this->db->get('tb_pengurus')->row_array();

        $this->load->view('layouts/admin/header', $data);
        $this->load->view('layouts/admin/sidebar');
        $this->load->view('layouts/admin/topbar');
        $this->load->view('admin/dashboard');
        $this->load->view('layouts/admin/footer');
    }
}

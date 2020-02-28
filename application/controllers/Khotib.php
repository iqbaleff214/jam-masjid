<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Khotib extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        isLogin();
    }

    public function index()
    {
        $data['title'] = "Khotib Jumat";
        $data['basic'] = $this->db->get('tb_pengurus')->row_array();

        $this->load->view('layouts/admin/header', $data);
        $this->load->view('layouts/admin/sidebar');
        $this->load->view('layouts/admin/topbar');
        $this->load->view('admin/ustadz');
        $this->load->view('layouts/admin/footer');
    }
}

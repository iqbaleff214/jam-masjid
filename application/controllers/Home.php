<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // update_data();
        $this->load->model('Kajian_model', 'kajian');
        $this->load->model('Khutbah_model', 'khutbah');
    }

    public function index()
    {
        $kajian  = $this->kajian->getKajianAll();
        $khutbah = $this->khutbah->getKhutbahAll();

        $data['interval'] = 10000;

        $data['basic']   = $this->db->get('tb_pengurus')->row_array();
        $data['kajian']  = [];
        $data['khutbah'] = [];
        $data['akhwat']  = [];

        foreach ($kajian as $kjn) {
            if (date('m', $kjn['tanggal']) == date('m')) {
                if (pekan($kjn['tanggal']) == pekan(time())) {
                    if ($kjn['akhwat'] == 1) {
                        array_push($data['akhwat'], $kjn);
                    } else {
                        array_push($data['kajian'], $kjn);
                    }
                }
                // elseif (pekan($kjn['tanggal']) == (pekan(time())) + 1) {
                //     if ($kjn['akhwat'] == 1) {
                //         array_push($data['akhwat'], $kjn);
                //     } else {
                //         array_push($data['kajian'], $kjn);
                //     }
                // }
            }
        }

        foreach ($khutbah as $ktb) {
            if (date('m', $ktb['tanggal']) == date('m')) {
                array_push($data['khutbah'], $ktb);
            }
        }

        $data['col_khutbah'] = count($data['khutbah']);

        $view = ($data['basic']['view'] == 1) ? 'home/home01' : 'home/home02';

        $this->load->view('layouts/home/header', $data);
        $this->load->view($view);
        $this->load->view('layouts/home/footer');
    }
}

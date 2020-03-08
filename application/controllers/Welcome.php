<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kajian_model', 'kajian');
		$this->load->model('Khutbah_model', 'khutbah');
	}

	public function index()
	{
		$kajian 	= $this->kajian->getKajianAll();
		$khutbah 	= $this->khutbah->getKhutbahAll();

		$data['kajian'] 	= [];
		$data['khutbah'] 	= [];

		foreach ($kajian as $kjn) {
			if (pekan($kjn['tanggal']) == pekan(time())) {
				array_push($data['kajian'], $kjn);
			}
		}

		foreach ($khutbah as $ktb) {
			if (pekan($ktb['tanggal']) == pekan(time())) {
				array_push($data['khutbah'], $ktb);
			}
		}

		var_dump($data['kajian']);
		echo '<br>';
		var_dump($data['khutbah']);
		die;
		$this->load->view('home', $data);
	}
}

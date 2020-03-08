<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        stillLogin();
        $this->form_validation->set_rules('password', 'Sandi', 'trim|required', [
            'required' => 'Password tidak boleh kosong!',
        ]);

        if ($this->form_validation->run()) {
            $password = $this->input->post('password');
            $user = $this->db->get('tb_pengurus')->row_array();
            if ($user) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'nama' => $user['nama']
                    ];
                    $this->session->set_userdata($data);
                    redirect(base_url('dashboard'));
                } else {
                    redirect('auth');
                    pesan('Sandi salah!', 'error');
                }
            }
        } else {
            $data['title']  = 'Login';
            $this->load->view('layouts/admin/header', $data);
            $this->load->view('auth/login');
        }
    }

    public function logout()
    {
        unset($_SESSION['nama']);
        redirect('auth');
    }
}

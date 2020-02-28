<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function isLogin()
{
    if (!isset($_SESSION['nama'])) {
        redirect(base_url('auth'));
    }
}

function stillLogin()
{
    if (isset($_SESSION['nama'])) {
        redirect(base_url('dashboard'));
    }
}

function pesan($text, $tipe)
{
    $ci = &get_instance();
    $ci->session->set_flashdata(
        'pesan',
        "<script> $(document).ready(function() {Swal.fire('" . $text . "', '', '" . $tipe . "')});</script>"
    );
}

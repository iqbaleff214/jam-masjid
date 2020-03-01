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

function hari($date)
{
    $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Ahad'];
    return $hari[(date('N', $date)) - 1];
}

function pekan($date)
{
    $firstOfMonth = strtotime(date("Y-m-01", $date));
    return intval(date("W", $date)) - intval(date("W", $firstOfMonth)) + 1;
}

function bulan($date)
{
    $bulan = ['Januari', 'Februaru', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    return $bulan[(date('n', $date)) - 1];
}

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

function update_kajian()
{
    // var_dump(time() - (1 * 24 * 60 * 60)); die;
    $ci = &get_instance();
    // kajian
    $kajian_log = [];
    $kajian_logs = [];
    $kajian = $ci->db->get_where('tb_kajian', ['tanggal <' => time_spec(30)])->result_array();
    if ($kajian) {
        foreach ($kajian as $kjn) {
            $kajian_log = array_merge($kjn, array('waktu_tambah' => time()));
            array_push($kajian_logs, $kajian_log);
        }
        $ci->db->insert_batch('tb_kajian_log', $kajian_logs);
        $ci->db->delete('tb_kajian', ['tanggal <' => time_spec(30)]);
    }
}
function update_khutbah()
{
    $ci = &get_instance();
    // khutbah
    $khutbah_log = [];
    $khutbah_logs = [];
    $khutbah = $ci->db->get_where('tb_khutbah', ['tanggal <' => time_spec(7)])->result_array();
    if ($khutbah) {
        foreach ($khutbah as $kht) {
            $khutbah_log = array_merge($kht, array('waktu_tambah' => time()));
            array_push($khutbah_logs, $khutbah_log);
        }
        $ci->db->insert_batch('tb_khutbah_log', $khutbah_logs);
        $ci->db->delete('tb_khutbah', ['tanggal <' => time_spec(7)]);
    }
}

function time_spec($i)
{
    return time() - ($i * 24 * 60 * 60);
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
    $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    return $bulan[(date('n', $date)) - 1];
}

function warna()
{
    $warna = ['primary', 'danger', 'info', 'success', 'dark', 'warning'];
    return $warna[rand(0, 5)];
}

function timeAgo($time_ago)
{
    $cur_time   = time();
    $time_elapsed   =  $time_ago - $cur_time;
    $days       = round($time_elapsed / 86400);
    $weeks      = round($time_elapsed / 604800);

    if ($days <= 7) {
        if ($days == 1) {
            return "Besok";
        } else {
            return "$days hari lagi";
        }
    } else if ($weeks <= 4.3) {
        if ($weeks == 1) {
            return "Pekan depan";
        } else {
            return date('d ', $time_ago) . bulan($time_ago);
        }
    } else {
        return date('d ', $time_ago) . bulan($time_ago);
    }
}

<?php
if (!function_exists('id_mstoken')) {
  function id_mstoken($prefix = 'TK')
  {
    $CI = &get_instance();
    $CI->load->database();
    $micro_time = microtime();
    do {
      $kode = $prefix . str_replace([" ", "."], "", substr(sha1($micro_time), 0, 6) . substr(md5(rand()), 1, 10));
      $CI->db->where('id_token', $kode);
      $result = $CI->db->get('ms_token')->num_rows();
    } while ($result > 0);
    return $kode;
  }
}

if (!function_exists('generate_token')) {

  function generate_token()
  {
    $CI = &get_instance();
    $CI->load->database();

    // Generate new token
    $new_token = rand(10000000000, 99999999999);

    // Check if token already exists for any user
    $query = $CI->db->get_where('token_generate', array('nomor_token' => $new_token));
    while ($query->num_rows() > 0) {
      $new_token = rand(10000000000, 99999999999);
      $query = $CI->db->get_where('token_generate', array('nomor_token' => $new_token));
    }

    return $new_token;
  }
}
if (!function_exists('generate_idpel')) {

  function generate_idpel()
  {
    $CI = &get_instance();
    $CI->load->database();

    $new_number = str_pad(rand(1, 99999999), 8, '0', STR_PAD_LEFT);

    // Check if number already exists for any user
    $query = $CI->db->get_where('ms_pelanggan', array('id_pel' => $new_number));
    while ($query->num_rows() > 0) {
      $new_number = str_pad(rand(1, 99999999), 8, '0', STR_PAD_LEFT);
      $query = $CI->db->get_where('ms_pelanggan', array('id_pel' => $new_number));
    }

    return $new_number;
  }
}
if (!function_exists('generate_meter')) {

  function generate_meter()
  {
    $CI = &get_instance();
    $CI->load->database();

    $new_number = str_pad(rand(1, 9999999999), 10, '0', STR_PAD_LEFT);

    // Check if number already exists for any user
    $query = $CI->db->get_where('ms_pelanggan', array('no_meter' => $new_number));
    while ($query->num_rows() > 0) {
      $new_number = str_pad(rand(1, 9999999999), 10, '0', STR_PAD_LEFT);
      $query = $CI->db->get_where('ms_pelanggan', array('no_meter' => $new_number));
    }

    return $new_number;
  }
}

if (!function_exists('kodetransaksi')) {
  function kodetransaksi($prefix = 'ID-')
  {
    $CI = &get_instance();
    $CI->load->database();
    $micro_time = microtime();
    do {
      $kode = $prefix . str_replace([" ", "."], "", substr(sha1($micro_time), 0, 5) . substr(md5(rand()), 1, 3));
      $CI->db->where('id_token', $kode);
      $result = $CI->db->get('ms_token')->num_rows();
    } while ($result > 0);
    return $kode;
  }
}

if (!function_exists('hash_nama')) {
  function hash_nama($nama)
  {
    $arr_nama = explode(' ', $nama);
    $output = '';
    foreach ($arr_nama as $kata) {
      if (strlen($kata) <= 2) {
        $output .= $kata . ' ';
      } else {
        $output .= substr($kata, 0, 3) . str_repeat('*', strlen($kata) - 2) . ' ';
      }
    }
    return rtrim($output);
  }
}

// UBAH ANGKA MENJADI PECAHAN
if (!function_exists('rupiah_format')) {
  function rupiah_format($angka)
  {
    if ($angka >= 1000000000) {
      $hasil = round($angka / 1000000000, 2) . 'M';
    } elseif ($angka >= 1000000) {
      $hasil = round($angka / 1000000, 2) . 'jt';
    } elseif ($angka >= 1000) {
      $hasil = round($angka / 1000, 2) . 'k';
    } else {
      $hasil = $angka;
    }
    return $hasil;
  }
}

if (!function_exists('hash_url')) {
  function hash_url($route, $hashnya)
  {
    $CI = &get_instance();
    $CI->load->helper('url');
    // $hash = md5(uniqid(rand(), true));
    $url = base_url($route) . '/' . md5($hashnya);
    return $url;
  }
}

if (!function_exists('extract_hash')) {
  function extract_hash($url, $hashnya)
  {
    // Pecah URL menjadi array berdasarkan "/"
    $url_array = explode("/", $url);

    // Ambil nilai hash dari URL array (nilai pada indeks terakhir)
    if (end($url_array) == md5($hashnya)) {
      return true;
    } else {
      return false;
    }
    // $hash = end($url_array) == md5($hashnya);

  }
}

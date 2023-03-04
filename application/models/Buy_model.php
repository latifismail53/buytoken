<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buy_model extends CI_Model
{
  public function get_pelanggan($id_pelanggan)
  {
    $this->db->where('id_pel', $id_pelanggan);
    $query = $this->db->get('ms_pelanggan');
    return $query->row();
  }
  public function get_nama_pelanggan($id_pelanggan)
  {
    $query = $this->db->select('nama_lengkap')->from('ms_pelanggan')->where('id_pel', $id_pelanggan)->get();
    if ($query->num_rows() > 0) {
      $row = $query->row();
      return $row->nama_lengkap;
    }
  }

  public function getTrans($id)
  {
    return $this->db->select('a.id_transaksi,a.metode_pembayaran,a.id_pel,a.tgl_pembelian,a.jumlah_kwh,a.email,a.nmr_hp,a.total_bayar,b.nomor_token,c.harga')
      ->from('tr_pembayaran a')
      ->join('token_generate b', 'a.id_transaksi = b.id_transaksi')
      ->join('ms_token c', 'a.id_token = c.id_token')
      ->where(array('a.id_transaksi' => $id))
      ->get()->row();
  }

  public function get_pembayaran()
  {
    return $this->db->select('b.nama_lengkap,a.tgl_pembelian AS tgl, c.jumlah_kwh as kwh')
      ->from('tr_pembayaran a')
      ->join('ms_pelanggan b', 'a.id_pel = b.id_pel')
      ->join('ms_token c', 'a.id_token=c.id_token')
      ->get()->result_array();
  }
}


/* End of file User_model.php and path \application\models\User_model.php */

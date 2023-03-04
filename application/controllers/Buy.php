<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buy extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Buy_model', 'bm');
  }

  public function index()
  {
    $token = $this->db->get('ms_token')->result_array();
    $btn = array();
    foreach ($token as $v) {
      $btn[] = '<div class="form-group mt-1">
      <input type="radio" class="btn-check" name="options-outlined" id="' . $v['id_token'] . '" value="' . $v['id_token'] . '" autocomplete="off">
      <label class="btn btn-block btn-outline-primary" for="' . $v['id_token'] . '">
        <span class="align-baseline">Rp. ' . number_format($v['harga']) . '</span>
      </label></div>';
    }
    $data['test'] = $this->bm->get_pembayaran();
    $data['tombol'] = $btn;

    $data['title'] = 'Token Listrik';
    $data['content'] = 'Buy_page';
    $this->load->view('template/layout/buy_pages', $data);
  }


  public function payment()
  {
    $post = $this->input->post(null, TRUE);
    if (isset($post['btnbeli'])) {
      $id_harga = $post['options-outlined'];
      $id_pelanggan = $post['idpelanggan'];
    }
    $result = $this->bm->get_pelanggan($id_pelanggan);
    if ($result == null) {
      $this->session->set_flashdata('error', 'Maaf, ID Pelanggan ' . $id_pelanggan . ' Tidak Ditemukan');
      redirect('');
    } else {
      $items = $this->db->get_where('ms_token', ['id_token' => $id_harga])->row();

      $data['idtoken'] = $id_harga;
      $data['jmlkwh'] = $items->jumlah_kwh;
      $data['harga'] = $items->harga;
      $data['nama'] = $result->nama_lengkap;
      $data['idpel'] = $id_pelanggan;
      $data['totalharga'] = $items->harga + 2000;
      $data['title'] = 'Payment';
      $data['content'] = 'pelanggan/index';
      $this->load->view('template/layout/buy_pages', $data);
    }
  }

  public function process_payment()
  {
    $idpel = $this->input->post('id_pelanggan');
    $idtoken = $this->input->post('id_token');
    $kwh = $this->input->post('jumlah_kwh');
    $tothar = $this->input->post('total');
    $email = $this->input->post('email');
    $nohp = $this->input->post('nohp');
    $method = $this->input->post('metode_pembayaran');

    $kodetransaksi = kodetransaksi();
    $bikintoken = [
      'nomor_token' =>  generate_token(),
      'id_transaksi' => $kodetransaksi,
      'created_at' => date('Y-m-d H:i:s'),
    ];
    $this->db->insert('token_generate', $bikintoken);
    if ($this->db->affected_rows() > 0) {
      $data = [
        'id_transaksi' => $kodetransaksi,
        'id_pel' => $idpel,
        'id_token' => $idtoken,
        'nmr_hp' => $nohp,
        'email' => $email,
        'jumlah_kwh' => $kwh,
        'metode_pembayaran' => $method,
        'total_bayar' => $tothar,
        'tgl_pembelian' => date('Y-m-d H:i:s'),
        'created_at' => date('Y-m-d H:i:s'),
      ];
      $this->db->insert('tr_pembayaran', $data);
      if ($this->db->affected_rows() > 0) {
        redirect(hash_url('payout', 'payments') . '/' . $kodetransaksi);
      } else {
        $this->session->set_flashdata('error', 'Maaf, Transaksi gagal. Silahkan ulangi lagi');
        redirect('Buy/payment');
      }
    }
  }

  public function successpay($hash, $id)
  {
    $res = $this->bm->getTrans($id);

    $data['kode'] = $res;
    $data['title'] = 'Success Payment';
    $data['content'] = 'pelanggan/success_payment';
    $this->load->view('template/layout/buy_pages', $data);
  }

  public function get_nama()
  {
    $id_pelanggan = $this->input->post('id_pelanggan');
    $nama_pelanggan = $this->bm->get_nama_pelanggan($id_pelanggan);
    echo json_encode(array("nama_pelanggan" => $nama_pelanggan));
  }


  public function logout()
  {
    $this->session->sess_destroy();
    redirect('');
  }
}

/* End of file Home.php and path \application\controllers\Home.php */

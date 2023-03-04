<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    cek_not_login();
    $this->load->model('Pelanggan_model', 'pm');
  }

  public function index()
  {
    $data['loadpel'] = $this->pm->select();
    $data['title'] = 'Admin Dashboard | Pelanggan';
    $data['content'] = 'admin/pelanggan/view';
    $this->load->view('template/layout/base', $data);
  }

  public function add()
  {
    $data['title'] = 'Tambah Data Pelanggan';
    $data['content'] = 'admin/pelanggan/add';
    $this->load->view('template/layout/base', $data);
  }

  public function edit($id)
  {
    $data['title'] = 'Ubah Data User';
    $data['user'] = $this->pm->select_by_id($id);
    $data['content'] = 'admin/user/edit';
    $this->load->view('template/layout/base', $data);
  }

  public function create()
  {
    $post = $this->input->post(null, TRUE);
    $data = [
      'id_pel' => generate_idpel(),
      'no_meter' => generate_meter(),
      'daya_listrik' => 0,
      'kat_daya' => $post['kat_daya'],
      'nama_lengkap' => $post['name'],
      'alamat_lengkap' => $post['alamat'],
      'email' => $post['email'],
      'no_handphone' => $post['nmrhp'],
      'created_at' => date('Y-m-d H:i:s')
    ];
    $create = $this->pm->insert($data);

    // Cek Apakah berhasil atau tidak
    if ($create) {
      $this->session->set_flashdata('berhasil', 'Data berhasil ditambahkan!');
      redirect('Pelanggan');
    }

    $this->session->set_flashdata('gagal', 'Data gagal ditambahkan!');
    redirect('admin/pelanggan/add');
  }

  public function update()
  {
    $data = [
      "name" => $this->input->post('name', true),
      "username" => $this->input->post('username', true),
    ];
    $update = $this->pm->update($data, $this->input->post('id', true));

    // Cek Apakah berhasil atau tidak
    if ($update) {
      $this->session->set_flashdata('berhasil', 'Data berhasil diubah!');
      redirect('user');
    }

    $this->session->set_flashdata('gagal', 'Data gagal diubah!');
    redirect('admin/user/add');
  }

  public function delete($id)
  {
    $this->pm->delete($id);
    $this->session->set_flashdata('berhasil', 'Data berhasil dihapus!');
    redirect('user');
  }
}

/* End of file User.php and path \application\controllers\User.php */

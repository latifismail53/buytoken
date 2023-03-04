<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_not_login();
    }

    public function index()
    {
        $data['title'] = 'Admin Dashboard';
        $data['count_user'] = $this->db->count_all('user');
        $data['content'] = 'home';
        $this->load->view('template/layout/base', $data);
    }


    public function listToken()
    {
        $data['token'] = $this->db->get('ms_token')->result_array();
        $data['title'] = 'Admin Dashboard';
        $data['content'] = 'admin/token/index';
        $this->load->view('template/layout/base', $data);
    }

    public function addtoken()
    {
        $data['title'] = 'Admin Dashboard';
        $data['content'] = 'admin/token/add';
        $this->load->view('template/layout/base', $data);
    }

    public function createtoken()
    {
        $data = [
            "id_token" => id_mstoken(),
            "jumlah_kwh" => $this->input->post('kwh', true),
            "harga" => $this->input->post('harga', true),
            "created_at" => date('Y-m-d H:i:s'),
        ];
        $create = $this->db->insert('ms_token', $data);

        // Cek Apakah berhasil atau tidak
        if ($create) {
            $this->session->set_flashdata('berhasil', 'Data berhasil ditambahkan!');
            redirect('Home/listToken');
        }

        $this->session->set_flashdata('gagal', 'Data gagal ditambahkan!');
        redirect('Home/add');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('');
    }
}

/* End of file Home.php and path \application\controllers\Home.php */

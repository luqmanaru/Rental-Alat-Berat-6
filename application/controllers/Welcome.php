<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('ab_rental');
    }

    // Metode untuk menampilkan halaman login
    public function index()
    {
        $this->load->view('login');
    }

    // Metode untuk proses login
    function login()
    {
        // Ambil data username dan password dari form login
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // Atur validasi form
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        // Jika form valid, lanjutkan ke proses login
        if ($this->form_validation->run() != false) {
            // Cek apakah username dan password ada di tabel admin
            $where = array(
                'admin_username' => $username,
                'admin_password' => md5($password)
            );

            $data = $this->ab_rental->edit_data($where, 'admin');
            $cek = $data->num_rows();

            // Jika data ditemukan, buat session dan redirect ke halaman admin
            if ($cek > 0) {
                $session = array(
                    'id' => $data->row()->admin_id,
                    'nama' => $data->row()->admin_nama,
                    'status' => 'login'
              );
                $this->session->set_userdata($session);
                redirect(base_url(). 'admin');
            } else {
                // Jika data tidak ditemukan, redirect ke halaman login dengan pesan gagal
                redirect(base_url(). 'welcome?pesan=gagal');
            }
        } else {
            // Jika form tidak valid, tampilkan kembali halaman login
            $this->load->view('login');
        }
    }
}
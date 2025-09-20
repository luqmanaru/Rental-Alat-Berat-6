<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // cek Login
        if ($this->session->userdata('status') != "login") {
            redirect(base_url() . 'welcome?pesan-belumlogin');
        }
    }

    function index()
    {
        $data['transaksi'] = $this->db->query("select * from transaksi order by transaksi_id desc limit 10")->result();
        $data['kostumer'] = $this->db->query("select * from kostumer order by kostumer_id desc limit 10")->result();
        $data['mobil'] = $this->db->query("select * from mobil order by mobil_id desc limit 10")->result();
        $this->load->view('admin/header');
        $this->load->view('admin/index', $data);
        $this->load->view('admin/footer');
    }


    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url() . 'welcome?pesan-logout');
    }
}

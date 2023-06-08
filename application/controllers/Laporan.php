<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Laporan_model');
        $this->load->model('Transaksi_model');
    }

    public function index()
    {
        $data['title'] = 'Laporan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $get_laporan = $this->Laporan_model->get_data();
        $data_laporan = [
            'row' => $get_laporan,
            'title' => "Laporan",
            'no' => 1
        ];

        $get_transaksi = $this->Transaksi_model->get_data();
        $data_transaksi = [
            'row_transaksi' => $get_transaksi,
            'title' => "Transaksi",
            'no' => 1
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('laporan/laporan', $data_laporan, $data_transaksi);
        $this->load->view('template/footer');
    }
}

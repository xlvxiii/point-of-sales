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
        $get_transaksi = $this->Transaksi_model->get_data();

        $data_laporan = [
            'row' => $get_laporan,
            'title' => "Laporan",
            'no' => 1,

            'row_transaksi' => $get_transaksi,
            'no_transaksi' => 1
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('laporan/laporan', $data_laporan);
        $this->load->view('template/footer');
    }

    public function log_transaksi($id)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Log Transaksi';
        $get_transaksi = $this->Transaksi_model->get_by_id($id);
        $detail = unserialize($get_transaksi['detail']);

        $data_transaksi = [
            'row' => $get_transaksi,
            'detail' => $detail
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('laporan/log_transaksi', $data_transaksi);
        $this->load->view('template/footer');
    }
}

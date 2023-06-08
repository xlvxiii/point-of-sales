<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Transaksi_model');
        $this->load->model('Laporan_model');
        $this->load->library('cart');
    }
    public function index()
    {
        $data['title'] = 'Transaksi';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('transaksi/transaksi', $data);
        $this->load->view('template/footer');
    }

    public function cart()
    {

        if ($this->session->userdata('kode_transaksi') == null) {
            $is_exist = 1;
            while ($is_exist > 0) {
                $random_number = random_int(100000, 999999);
                $is_exist = $this->Transaksi_model->cek_kode($random_number);
                if ($is_exist == 0) {
                    $this->session->set_userdata('kode_transaksi', $random_number);
                }
            }
        }

        $data['title'] = 'Transaksi';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data_menu = $this->db->get_where('menu', ['kode_menu' => $this->input->post('kode_menu')])->row_array();

        $data_cart = array(
            'id' => $data_menu['id'],
            'qty' => $this->input->post('jumlah'),
            'price' => $data_menu['harga'],
            'name' => $data_menu['nama'],
            'kode_menu' => $data_menu['kode_menu']
        );
        $this->cart->insert($data_cart);

        redirect('transaksi');
    }

    public function save()
    {
        //save/update laporan

        foreach ($this->cart->contents() as $row) :
            $kode_menu = $row['kode_menu'];
            $jumlah = $row['qty'];

            $is_exist = $this->Laporan_model->cek_db($kode_menu);
            if ($is_exist == 0) {
                $data_laporan = [
                    'kode_menu' => $kode_menu,
                    'jumlah' => $jumlah

                ];
                $this->Laporan_model->save_laporan($data_laporan);
            } else {
                $row = $this->Laporan_model->get_jumlah_by_kode($kode_menu);
                $jumlah_awal = $row->jumlah;
                $sum = (int)$jumlah + $jumlah_awal;
                $data_laporan = [
                    'jumlah' => $sum
                ];
                $this->Laporan_model->update_laporan($kode_menu, $data_laporan);
            }

        endforeach;

        //Save transaksi
        $kode_transaksi = $this->session->userdata('kode_transaksi');
        $serialized_cart = serialize($this->cart->contents());
        $data_transaksi = [
            'kode_transaksi' => $kode_transaksi,
            'detail' => $serialized_cart
        ];
        $response = $this->Transaksi_model->save($data_transaksi);
        if ($response) {
            $this->session->unset_userdata('kode_transaksi');
            $this->cart->destroy();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Transaksi berhasil ditambah!</div>');
            redirect('transaksi');
        }
    }
}

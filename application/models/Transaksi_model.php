<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{
    private $_table = "transaksi";
    public $id_transaksi;
    public $id_produk;
    public $nama_produk;
    public $harga_produk;
    public $quantity;
    public $subtotal;
    public $tanggal_input;
    public $bayar;
    public $kembali;

    public function rules()
    {
        return [
            ['field' => 'id_produk',
            'label' => 'id_produk',
            'rules' => 'numeric'],

            ['field' => 'harga_produk',
            'label' => 'harga_produk',
            'rules' => 'numeric'],

            ['field' => 'quantity',
            'label' => 'quantity',
            'rules' => 'numeric'],

            ['field' => 'bayar',
            'label' => 'bayar',
            'rules' => 'numeric'],

        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_transaksi" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_transaksi = uniqid();
        $this->id_produk = $post["id_produk"];
        $this->id_produk = $post["nama_produk"];
        $this->id_produk = $post["harga_produk"];
        $this->id_produk = $post["quantity"];
        $this->id_produk = $post["subtotal"];
        $this->id_produk = $post["tanggal_input"];
        $this->id_produk = $post["bayar"];
        $this->id_produk = $post["kembali"];
    }

    
}
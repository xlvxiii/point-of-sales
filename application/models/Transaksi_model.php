<?php

class Transaksi_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'transaksi';
        $this->primary = 'id';
    }

    public function cek_kode($kode_transaksi)
    {
        return $this->db->query("SELECT COUNT(kode_transaksi) FROM transaksi WHERE kode_transaksi='$kode_transaksi'")->result;
    }

    public function save($data)
    {
        $this->db->insert('transaksi', $data);
        return true;
    }

    public function get_data()
    {
        return ($this->db->get('transaksi'))->result();
    }
}

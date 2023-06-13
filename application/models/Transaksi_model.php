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
        return $this->db->query("SELECT * FROM transaksi WHERE kode_transaksi='$kode_transaksi'");
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

    public function get_by_id($id)
    {
        return ($this->db->get_where('transaksi', array('id' => $id)))->row_array();
    }

}

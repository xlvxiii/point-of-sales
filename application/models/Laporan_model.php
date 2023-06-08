<?php

class Laporan_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'laporan';
        $this->primary = 'id';
    }

    public function save_laporan($data)
    {
        $this->db->insert('laporan', $data);
        return true;
    }

    public function update_laporan($kode_menu, $data)
    {
        $this->db->where('kode_menu', $kode_menu);
        $this->db->update('laporan', $data);
        return true;
    }

    public function cek_db($kode_menu)
    {
        return $this->db->query("SELECT COUNT(kode_menu) FROM laporan WHERE kode_menu='$kode_menu'")->result();
    }

    public function get_jumlah_by_kode($kode_menu)
    {
        return $this->db->query("SELECT jumlah FROM laporan WHERE kode_menu= '$kode_menu'")->row();
    }

    public function get_data()
    {
        return ($this->db->query("SELECT * FROM laporan INNER JOIN menu ON laporan.kode_menu = menu.kode_menu"))->result();
    }
}

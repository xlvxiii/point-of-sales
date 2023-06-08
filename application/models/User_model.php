<?php

class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'user';
        $this->primary = 'id';
    }

    public function save($data)
    {
        $this->db->insert('user', $data);
        return true;
    }

    public function get_data($username)
    {
        return $this->db->get_where('user', ['username' => $username])->row_array();
    }

    public function edit_akun($id, $data_user)
    {
        $this->db->where('id', $id);
        $this->db->update('user', $data_user);
        return true;
    }

    public function edit_password($id, $data_password)
    {
        $this->db->where('id', $id);
        $this->db->update('user', $data_password);
        return true;
    }
}

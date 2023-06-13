<?php

class Menu_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'menu';
        $this->primary = 'id';
    }

    public function save($data)
    {
        $this->db->insert('menu', $data);
        return true;
    }

    public function get_data()
    {
        return ($this->db->get('menu'))->result();
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('menu');
        return true;
    }

    public function get_by_id($id)
    {
        return ($this->db->get_where('menu', array('id' => $id)))->result();
    }

    public function edit($id, $data_menu)
    {
        $this->db->where('id', $id);
        $this->db->update('menu', $data_menu);
        return true;
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User extends CI_Controller
{
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        echo 'selamat datang' . $data['user']['nama'];
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');
    }
    public function index()
    {
        $this->load();
    }

    private function load()
    {
        $data['title'] = 'Kasir';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $get_menu = $this->Menu_model->get_data();
        $data_menu = [
            'row' => $get_menu,
            'title' => "Daftar Menu",
            'no' => 1
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('menu', $data_menu);
        $this->load->view('template/footer');
    }

    public function save()
    {
        $this->form_validation->set_rules('kode_menu', 'Kode Menu', 'required|trim|is_unique[menu.kode_menu]');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load();
        } else {
            $data_menu = [
                'kode_menu' => htmlspecialchars($this->input->post('kode_menu', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'harga' => htmlspecialchars($this->input->post('harga'))
            ];
            $response = $this->Menu_model->save($data_menu);
            if ($response) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu berhasil ditambah!</div>');
                redirect('menu');
            }
        }
    }

    public function delete($id)
    {
        $delete = $this->Menu_model->delete($id);
        if ($delete) {
            $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert">Menu berhasil dihapus!</div>');
            redirect('menu');
        }
    }

    public function edit_form($id)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Edit Menu';
        $data['menu'] = $this->Menu_model->get_by_id($id);

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('menu/edit_menu', $data);
        $this->load->view('template/footer');
    }

    public function edit()
    {
        $id = $this->input->post('id');
        $original_value = $this->db->query("SELECT kode_menu FROM menu WHERE id = " . $id)->row()->kode_menu;
        if ($this->input->post('kode_menu') != $original_value) {
            $is_unique =  '|is_unique[menu.kode_menu]';
        } else {
            $is_unique =  '';
        }

        $this->form_validation->set_rules('kode_menu', 'Kode Menu', 'required|trim' . $is_unique);
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['title'] = 'Edit Menu';
            $data['menu'] = $this->Menu_model->get_by_id($id);

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('menu/edit_menu', $data);
            $this->load->view('template/footer');
        } else {
            $id = $this->input->post('id');
            $data_menu = array(
                'id' => $this->input->post('id'),
                'kode_menu' => htmlspecialchars($this->input->post('kode_menu')),
                'nama' => htmlspecialchars($this->input->post('nama')),
                'harga' => htmlspecialchars($this->input->post('harga')),
            );

            $edit = $this->Menu_model->edit($id, $data_menu);
            if ($edit) {
                $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert">Menu berhasil diedit!</div>');
                redirect('menu');
            }
        }
    }
}

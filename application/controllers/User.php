<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }
    public function index()
    {
        $data['title'] = 'Kasir';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('template/footer');
    }

    public function pengaturan()
    {
        $data['title'] = 'Pengaturan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('user/pengaturan', $data);
        $this->load->view('template/footer');
    }

    public function edit_akun()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $id = $data['user']['id'];

        $original_value = $this->db->query("SELECT username FROM user WHERE id = " . $id)->row()->username;
        if ($this->input->post('username') != $original_value) {
            $is_unique =  '|is_unique[user.username]';
        } else {
            $is_unique =  '';
        }

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim' . $is_unique);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Pengaturan';

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('user/pengaturan', $data);
            $this->load->view('template/footer');
        } else {

            $data_user = array(
                'nama' => htmlspecialchars($this->input->post('nama')),
                'username' => htmlspecialchars($this->input->post('username'))
            );

            $edit_akun = $this->User_model->edit_akun($id, $data_user);
            if ($edit_akun) {
                $username = [
                    'username' => $data_user['username']
                ];
                $this->session->set_userdata($username);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun berhasil diedit!</div>');
                redirect('user/pengaturan');
            }
        }
    }

    public function edit_password()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $id = $data['user']['id'];

        $this->form_validation->set_rules('new_password', 'New Password', 'required|trim|min_length[8]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Pengaturan';

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('user/pengaturan', $data);
            $this->load->view('template/footer');
        } else {
            if (password_verify($this->input->post('password'), $data['user']['password'])) {

                $data_password = array(
                    'password' => password_hash($this->input->post('new_password'), PASSWORD_DEFAULT)
                );

                $edit_password = $this->User_model->edit_password($id, $data_password);
                if ($edit_password) {
                    $this->session->set_flashdata('message1', '<div class="alert alert-success" role="alert">Password berhasil diganti!</div>');
                    redirect('user/pengaturan');
                }
            } else {
                $this->session->set_flashdata('message1', '<div class="alert alert-danger" role="alert">Password salah!</div>');
                redirect('user/pengaturan');
                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar', $data);
                $this->load->view('template/topbar', $data);
                $this->load->view('user/pengaturan', $data);
                $this->load->view('template/footer');
            }
        }
    }
}

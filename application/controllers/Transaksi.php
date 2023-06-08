<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Transaksi_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["transaksi"] = $this->Kasir->getAll();
        $this->load->view("transaksi", $data);
    }
    public function add()
    {
        $id_transaksi = $this->Kasir;
        $validation = $this->form_validation;
        $validation->set_rules($transasi->rules());
        
        if ($validation->run()){
            $transaksi->save();
            $this->session->set_flashdata('success','Transaksi selesai');
        }

        $this->load->view("Menu.php");
    }
    

}

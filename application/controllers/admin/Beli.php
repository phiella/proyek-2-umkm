<?php

use LDAP\Result;

defined('BASEPATH') or exit('No direct script access allowed');

class Beli extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('beli_model');
        $this->load->model('prod_model');
        $this->load->model('sup_model');

        $current_user = $this->auth_model->current_user();
        if ($current_user) {
            if ($current_user->role != 'administrator') {
                redirect(base_url());
            }
        } else {
            redirect('login');
        }
    }

    public function index()
    {
        $data['current_user'] = $this->auth_model->current_user();
        $data['pembelian'] = $this->beli_model->getAll();
        $data['produk'] = $this->prod_model->getAll();
        $data['suplier'] = $this->sup_model->getAll();
        $this->load->view('admin/pembelian/index', $data);
    }

    public function add()
    {
        $pembelian = $this->beli_model;
        $produk = $this->prod_model;
        $validation = $this->form_validation;
        $validation->set_rules($pembelian->rules());

        $decrypt_id = $this->prod_model->getById($this->input->post('produk_id'));
        $getStok = $decrypt_id->stok;
        $getHargaBeli = $decrypt_id->harga_beli;

        if ($validation->run()) {
            $pembelian->save($getHargaBeli) && $produk->tambahStok($getStok);
            $this->session->set_flashdata('alert-success', 'Data berhasil ditambahkan');
        } else {
            $this->session->set_flashdata('alert-error', validation_errors('[invalid]: '));
        }

        redirect(site_url('admin/pembelian'));
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->beli_model->delete($this->secure->decrypt_url($id))) {
            $this->session->set_flashdata('alert-success', 'Data berhasil dihapus');
            redirect(site_url('admin/pembelian'));
        }
    }
}

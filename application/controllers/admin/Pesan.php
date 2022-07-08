<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pesan_model');
        $this->load->model('prod_model');

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
        $data['pesanan'] = $this->pesan_model->getAll();
        $data['produk'] = $this->prod_model->getAll();
        $this->load->view('admin/pesanan/index', $data);
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->pesan_model->delete($this->secure->decrypt_url($id))) {
            $this->session->set_flashdata('alert-success', 'Data berhasil dihapus');
            redirect(site_url('admin/pesanan'));
        }
    }
}

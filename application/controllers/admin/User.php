<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model', 'users');

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
        $data['users'] = $this->users->getAll();
        $this->load->view('admin/user/index', $data);
    }

    public function setActive($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->users->setActive($this->secure->decrypt_url($id))) {
            $this->session->set_flashdata('alert-success', 'Data berhasil diaktifkan');
            redirect(site_url('admin/user'), 'refresh');
        }
    }

    public function setNonactive($id = null)
    {
        if (!isset($id)) show_404();

        $decrypt_id = $this->secure->decrypt_url($id);
        $users_id = $this->users->getById($decrypt_id);

        $current_user = $this->auth_model->current_user();
        if ($decrypt_id == $current_user->id) {
            $this->session->set_flashdata('alert-error', 'Tidak bisa menonaktifkan akun anda sendiri!');
            redirect(site_url('admin/user'), 'refresh');
        }

        if ($decrypt_id == ($users_id->role == 'administrator')) {
            $this->session->set_flashdata('alert-error', 'Tidak bisa menonaktifkan akun administrator!');
            redirect(site_url('admin/user'), 'refresh');
        }

        if ($this->users->setNonactive($decrypt_id)) {
            $this->session->set_flashdata('alert-success', 'Data berhasil dinonaktifkan');
            redirect(site_url('admin/user'), 'refresh');
        }
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        $decrypt_id = $this->secure->decrypt_url($id);
        $users_id = $this->users->getById($decrypt_id);

        if ($decrypt_id == ($users_id->role == 'administrator')) {
            $this->session->set_flashdata('alert-error', 'Tidak bisa menghapus akun administrator!');
            redirect(site_url('admin/user'), 'refresh');
        }

        if ($this->users->delete($decrypt_id)) {
            $this->session->set_flashdata('alert-success', 'Data berhasil dihapus');
            redirect(site_url('admin/user'));
        }
    }
}
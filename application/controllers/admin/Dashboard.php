<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

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
        $this->load->view('admin/dashboard', $data);
    }
}

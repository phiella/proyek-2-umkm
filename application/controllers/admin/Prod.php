<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prod extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('prod_model');
        $this->load->model('jp_model');

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
        $data['produk'] = $this->prod_model->getAll();
        $data['jenis_produk'] = $this->jp_model->getAll();
        $this->load->view('admin/produk/index', $data);
    }

    public function add()
    {
        $produk = $this->prod_model;
        $validation = $this->form_validation;
        $validation->set_rules($produk->rules());
        $validation->set_rules('kode', 'Kode', 'required|min_length[3]|max_length[4]|is_unique[produk.kode]');

        if ($validation->run()) {

            $post = $this->input->post();
            $gambar = strtoupper($post['kode']);
            $config['upload_path']          = FCPATH . '/assets/images/produk/';
            $config['allowed_types']        = 'jpg|jpeg|png';
            $config['overwrite']            = TRUE;
            $config['max_size']             = 1024;
            $config['file_name']            = $gambar;
            $config['max_width']            = 1080;
            $config['max_height']           = 1080;
            $config['min_width']            = 480;
            $config['min_height']           = 480;
            $config['max_filename']         = 10;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('foto')) {
                $this->session->set_flashdata('alert-error', $this->upload->display_errors());
            } else {
                $uploaded_data = $this->upload->data();
                $data['foto'] = $uploaded_data['file_name'];

                if ($produk->save($data)) {
                    $this->session->set_flashdata('alert-success', 'Data berhasil ditambahkan');
                }
            }
        } else {
            $this->session->set_flashdata('alert-error', validation_errors('[invalid]: '));
        }

        redirect(site_url('admin/produk'));
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/produk');

        $produk = $this->prod_model;
        $validation = $this->form_validation;
        $validation->set_rules($produk->rules());

        if ($validation->run()) {
            $post = $this->input->post();
            $gambar = $this->secure->decrypt_url($post['kode']);
            $config['upload_path']          = FCPATH . '/assets/images/produk/';
            $config['allowed_types']        = 'jpg|jpeg|png';
            $config['overwrite']            = TRUE;
            $config['max_size']             = 1024;
            $config['file_name']            = $gambar;
            $config['max_width']            = 1080;
            $config['max_height']           = 1080;
            $config['min_width']            = 480;
            $config['min_height']           = 480;
            $config['max_filename']         = 10;

            $this->load->library('upload', $config);

            
                if (!$this->upload->do_upload('foto')) {
                    $data['foto'] = $post['gambar'];
                    $produk->update($data);
                    $this->session->set_flashdata('alert-error', $this->upload->display_errors());
                } else {
                    $uploaded_data = $this->upload->data();
                    $data['foto'] = $uploaded_data['file_name'];

                    if ($produk->update($data)) {
                        $this->session->set_flashdata('alert-success', 'Data berhasil ditambahkan');
                    }
                }
            redirect(site_url('admin/produk'), 'refresh');
            
        } else {
            $this->session->set_flashdata('alert-error', validation_errors('[invalid]: '));
        }

        $data['current_user'] = $this->auth_model->current_user();
        $data["produk"] = $produk->getById($this->secure->decrypt_url($id));
        $data['jenis_produk'] = $this->jp_model->getAll();
        if (!$data["produk"]) show_404();

        $this->load->view("admin/produk/edit", $data);
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();
        $del = $this->prod_model->getById($this->secure->decrypt_url($id));
        $foto = $del->foto;
        unlink(FCPATH . '/assets/images/produk/' . $foto);

        if ($this->prod_model->delete($this->secure->decrypt_url($id))) {
            $this->session->set_flashdata('alert-success', 'Data berhasil dihapus');
            redirect(site_url('admin/produk'));
        }
    }
}

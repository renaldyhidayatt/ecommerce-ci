<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        cek_login();
        cek_user();
    }

    public function index()
    {

        $this->form_validation->set_rules(
            'nama_kategori',
            'Nama Kategori',
            'required|min_length[6]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Nama Kategori Harus di Isi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>Nama Kategori Terlalu Pendek</div>"
            ]
        );


        $config['upload_path'] = './assets/img/upload/category';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['max_width'] = '3000';
        $config['max_height'] = '3000';
        $config['file_name'] = 'img' . time();
        $this->load->library('upload', $config);

        if ($this->form_validation->run() != true) {
            $data['title'] = 'Category - Ecommerce Admin';
            $data['heading'] = 'Category';
            $data['subview'] = 'admin/category/index';
            $data['category'] = $this->ModelCategory->findAll();


            $this->load->view('admin/_layout', $data);
        } else {
            if ($this->upload->do_upload('image')) 
            {
                $image = $this->upload->data();
                $gambar = $image['file_name'];
            } else { $gambar = ''; }


            $nama_kategori = $this->input->post('nama_kategori');
            $slug = url_title($nama_kategori, 'dash', true);
            $image = $gambar;
            
            if ($this->ModelCategory->createCategory($nama_kategori, $image, $slug) == true) {
                $this->session->set_flashdata('success_category', 'Proses membuat Category Berhasil');
                redirect("admin/category");
            } else {
                $this->session->set_flashdata('error_category', 'Error pembuatan category');
                redirect("admin/category", 'refresh');
            }
        }
    }

    public function edit(){
        

        $this->form_validation->set_rules(
            'nama_kategori',
            'Nama Kategori',
            'required|min_length[6]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Nama Kategori Harus di Isi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>Nama Kategori Terlalu Pendek</div>"
            ]
        );

        $id = $this->uri->segment(4);

        $config['upload_path'] = './assets/img/upload/category';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['max_width'] = '3000';
        $config['max_height'] = '3000';
        $config['file_name'] = 'img' . time();
        $this->load->library('upload', $config);

        if ($this->form_validation->run() != true) {
            $data['title'] = 'Category - Ecommerce Admin';
            $data['heading'] = 'Category';
            $data['subview'] = 'admin/category/edit';
            $data['category'] = $this->ModelCategory->findById($id);
    
            $this->load->view('admin/_layout', $data);
        } else {
            $id_category = $this->input->post('category_id');
            $nama_kategori = $this->input->post('nama_kategori');

            $slug = url_title($nama_kategori, 'dash', true);
            $old_image = $this->ModelCategory->getImage($id_category); 
    
            if ($this->upload->do_upload('image')) {
               
                $imageData = $this->upload->data();
                $image = $imageData['file_name'];

                
                
                if (!empty($old_image)) {
                    unlink('./assets/img/upload/category' . $old_image);
                }
            } else {
                $image = $old_image; 
            }
    
            if ($this->ModelCategory->updateCategory($id_category, $nama_kategori, $image, $slug) == true) {
                $this->session->set_flashdata('success_category', 'Proses update Category Berhasil');
                redirect("admin/category");
            } else {
                $this->session->set_flashdata('error_category', 'Error update category');
                redirect("admin/category", 'refresh');
            }
        }
    }

    public function delete()
    {
        $id = $this->uri->segment(4);
        
        $image = $this->ModelCategory->getImage($id);
        
        
        
        if (!empty($image)) {
            unlink('./assets/img/upload/category/' . $image);
        }
        $this->ModelCategory->deleteById($id);

        redirect("admin/category");
    }
    
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
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
            'name',
            'Nama Produk',
            'required|min_length[6]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Nama Produk Harus di Isi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>Nama Produk Terlalu Pendek</div>"
            ]
        );

        $this->form_validation->set_rules(
            'category_id',
            'ID Kategori',
            'required',
            [
                'required' => "<div class='alert alert-danger' role='alert'>ID Kategori harus diisi</div>"
            ]
        );

        $this->form_validation->set_rules(
            'description',
            'Deskripsi',
            'required|min_length[10]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Deskripsi harus diisi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>Deskripsi minimal 10 karakter</div>"
            ]
        );

        $this->form_validation->set_rules(
            'price',
            'Harga',
            'required|numeric',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Harga harus diisi</div>",
                'numeric' => "<div class='alert alert-danger' role='alert'>Harga harus berupa angka</div>"
            ]
        );

        $this->form_validation->set_rules(
            'countInStock',
            'Jumlah Stok',
            'required|integer',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Jumlah Stok harus diisi</div>",
                'integer' => "<div class='alert alert-danger' role='alert'>Jumlah Stok harus berupa bilangan bulat</div>"
            ]
        );


        $config['upload_path'] = './assets/img/upload/product';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['max_width'] = '3000';
        $config['max_height'] = '3000';
        $config['file_name'] = 'img' . time();
        $this->load->library('upload', $config);

        if ($this->form_validation->run() != true) {
            $data['title'] = 'Product - Ecommerce Admin';
            $data['heading'] = 'Product';
            $data['subview'] = 'admin/product/index';
            $data['category'] = $this->ModelCategory->findAll();
            $data['products'] = $this->ModelProduct->findAll();

            $this->load->view('admin/_layout', $data);
        } else {
            if ($this->upload->do_upload('image')) {
                $imageData = $this->upload->data();
                $image = $imageData['file_name'];
            } else {
                $image = '';
            }

            $name = $this->input->post('name');
            $category_id = $this->input->post('category_id');
            $description = $this->input->post('description');
            $slug = url_title($name, 'dash', true);
            $price = $this->input->post('price');
            $countInStock = $this->input->post('countInStock');


            if ($this->ModelProduct->createProduct($name, $image, $category_id, $description, $price, $countInStock, $slug)) {
                $this->session->set_flashdata('success_product', 'Proses membuat Produk Berhasil');
                redirect("admin/product");
            } else {
                $this->session->set_flashdata('error_product', 'Error pembuatan produk');
                redirect("admin/product");
            }
        }
    }

    public function edit()
    {
        $this->form_validation->set_rules(
            'name',
            'Nama Produk',
            'required|min_length[6]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Nama Produk Harus di Isi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>Nama Produk Terlalu Pendek</div>"
            ]
        );

        $this->form_validation->set_rules(
            'category_id',
            'ID Kategori',
            'required',
            [
                'required' => "<div class='alert alert-danger' role='alert'>ID Kategori harus diisi</div>"
            ]
        );

        $this->form_validation->set_rules(
            'description',
            'Deskripsi',
            'required|min_length[10]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Deskripsi harus diisi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>Deskripsi minimal 10 karakter</div>"
            ]
        );

        $this->form_validation->set_rules(
            'price',
            'Harga',
            'required|numeric',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Harga harus diisi</div>",
                'numeric' => "<div class='alert alert-danger' role='alert'>Harga harus berupa angka</div>"
            ]
        );

        $this->form_validation->set_rules(
            'countInStock',
            'Jumlah Stok',
            'required|integer',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Jumlah Stok harus diisi</div>",
                'integer' => "<div class='alert alert-danger' role='alert'>Jumlah Stok harus berupa bilangan bulat</div>"
            ]
        );


        try {
            $id_product = $this->uri->segment(4);

            if (!is_numeric($id_product)) {
                throw new Exception('Invalid product ID');
            }
            $config['upload_path'] = './assets/img/upload/product';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = '3000';
            $config['max_width'] = '3000';
            $config['max_height'] = '3000';
            $config['file_name'] = 'img' . time();
            $this->load->library('upload', $config);

            $findById = $this->ModelProduct->findById($id_product);

            if ($findById == null) {
                throw new Exception('Product not found');
            }

            if ($this->form_validation->run() != true) {
                $data['title'] = 'Product - Ecommerce Admin';
                $data['heading'] = 'Product';
                $data['subview'] = 'admin/product/edit';
                $data['category'] = $this->ModelCategory->findAll();
                $data['product'] = $findById;

                $this->load->view('admin/_layout', $data);
            } else {
                $id = $this->input->post('product_id');
                $name = $this->input->post('name');
                $category_id = $this->input->post('category_id');
                $description = $this->input->post('description');
                $price = $this->input->post('price');
                $countInStock = $this->input->post('countInStock');
                $slug = url_title($name, 'dash', true);
                $old_image = $this->ModelProduct->getImage($id);

                $image = $old_image;

                if (!empty($_FILES['image']['name'])) {
                    if ($this->upload->do_upload('image')) {
                        $imageData = $this->upload->data();
                        $image = $imageData['file_name'];

                        if (!empty($old_image)) {
                            unlink('./assets/img/upload/product/' . $old_image);
                        }
                    } else {
                        $this->session->set_flashdata('error_product', 'Error uploading image');
                        redirect("admin/product", 'refresh');
                    }
                }

                $data = [
                    'name' => $name,
                    'image_product' => $image,
                    'category_id' => $category_id,
                    'description' => $description,
                    'slug_product' => $slug,
                    'price' => $price,
                    'countInStock' => $countInStock
                ];

                if ($this->ModelProduct->update($id, $data) == true) {
                    $this->session->set_flashdata('success_product', 'Proses update Product Berhasil');
                    redirect("admin/product");
                } else {
                    $this->session->set_flashdata('error_product', 'Error update product');
                    redirect("admin/product", 'refresh');
                }
            }
        } catch (Exception $e) {
            $this->session->set_flashdata('error_product', $e->getMessage());
            redirect("admin/product", 'refresh');
        }
    }


    public function delete()
    {
        try {
            $id = $this->uri->segment(4);

            if (!is_numeric($id)) {
                throw new Exception('Invalid product ID');
            }

            $product = $this->ModelProduct->findById($id);

            if (!$product) {
                throw new Exception('Product not found');
            }

            $image = $this->ModelProduct->getImage($id);

            if (!empty($image)) {
                unlink('./assets/img/upload/product/' . $image);
            }

            $result = $this->ModelProduct->delete($id);

            if($result){
                $this->session->set_flashdata('success_product', 'Product deleted successfully');

                redirect("admin/product");
            }else{
                $this->session->set_flashdata('error_product','Failed to delete Product');

                redirect("admin/product", 'refresh');
            }

        } catch (Exception $e) {
            $this->session->set_flashdata('error_product', $e->getMessage());
            redirect("admin/product", 'refresh');
        }
    }
}

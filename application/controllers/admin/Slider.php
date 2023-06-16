<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Slider extends CI_Controller
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
            'nama',
            'Nama',
            'required|min_length[6]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Nama Slider Harus di Isi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>Nama Slider Terlalu Pendek</div>"
            ]
        );


        $config['upload_path'] = './assets/img/upload/slider';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['max_width'] = '3000';
        $config['max_height'] = '3000';
        $config['file_name'] = 'img' . time();
        $this->load->library('upload', $config);

        if ($this->form_validation->run() != true) {
            $data['title'] = 'Slider - Ecommerce Admin';
            $data['heading'] = 'Slider';
            $data['subview'] = 'admin/slider/index';
            $data['slider'] = $this->ModelSlider->findAll();


            $this->load->view('admin/_layout', $data);
        } else {
            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data();
                $gambar = $image['file_name'];
            } else {
                $gambar = '';
            }


            $nama = $this->input->post('nama');
            $image = $gambar;

            if ($this->ModelSlider->createSlider($nama, $image) == true) {
                $this->session->set_flashdata('success_slider', 'Proses membuat Slider Berhasil');
                redirect("admin/slider");
            } else {
                $this->session->set_flashdata('error_slider', 'Error pembuatan slider');
                redirect("admin/slider", 'refresh');
            }
        }
    }

    public function edit()
    {
        $this->form_validation->set_rules(
            'nama',
            'Nama',
            'required|min_length[6]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Nama Slider Harus di Isi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>Nama Slider Terlalu Pendek</div>"
            ]
        );

        try {
            $id = $this->uri->segment(4);


            if (!is_numeric($id)) {
                throw new Exception('Invalid slider ID');
            }

            $config['upload_path'] = './assets/img/upload/slider';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = '3000';
            $config['max_width'] = '3000';
            $config['max_height'] = '3000';
            $config['file_name'] = 'img' . time();
            $this->load->library('upload', $config);

            $findById =  $this->ModelSlider->findById($id);

            if ($findById == null) {
                throw new Exception('Slider not found');
            }

            if ($this->form_validation->run() != true) {
                $data['title'] = 'Slider - Ecommerce Admin';
                $data['heading'] = 'Slider';
                $data['subview'] = 'admin/slider/edit';
                $data['slider'] = $findById;

                $this->load->view('admin/_layout', $data);
            } else {
                $id_slider = $this->input->post('slider_id');
                $nama = $this->input->post('nama');

                $old_image = $this->ModelSlider->getImage($id_slider);

                if (!empty($_FILES['image']['name'])) {
                    if ($this->upload->do_upload('image')) {
                        $imageData = $this->upload->data();
                        $image = $imageData['file_name'];

                        if (!empty($old_image)) {
                            unlink('./assets/img/upload/slider/' . $old_image);
                        }
                    } else {
                        $this->session->set_flashdata('error_slider', 'Error uploading image');
                        redirect("admin/slider", 'refresh');
                    }
                } else {
                    $image = $old_image;
                }

                if ($this->ModelSlider->updateSlider($id_slider, $nama, $image) == true) {
                    $this->session->set_flashdata('success_slider', 'Proses update Slider Berhasil');
                    redirect("admin/slider");
                } else {
                    $this->session->set_flashdata('error_slider', 'Error update Slider');
                    redirect("admin/slider", 'refresh');
                }
            }
        } catch (Exception $e) {
            $this->session->set_flashdata('error_slider', $e->getMessage());
            redirect("admin/slider", 'refresh');
        }
    }


    public function delete()
    {

        try {
            $id = $this->uri->segment(4);

            if (!is_numeric($id)) {
                throw new Exception('Invalid Slider ID');
            }

            $slider = $this->ModelSlider->findById($id);

            if (!$slider) {
                throw new Exception('Slider not found');
            }

            $image = $this->ModelSlider->getImage($id);

            if (!empty($image)) {
                unlink('./assets/img/upload/slider/' . $image);
            }

            $result = $this->ModelCategory->deleteById($id);

            if ($result) {
                $this->session->set_flashdata('success_slider', 'Slider deleted successfully');
                redirect("admin/slider");
            } else {
                $this->session->set_flashdata('error_slider', 'Failed to delete Slider');
                redirect("admin/slider", 'refresh');
            }
        } catch (Exception $e) {
            $this->session->set_flashdata('error_slider', $e->getMessage());

            redirect("admin/slider", 'refresh');
        }
    }
}

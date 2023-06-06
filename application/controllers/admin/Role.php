<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Role extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();

        // Load the required models
        $this->load->model('ModelRole');
    }

    public function index()
    {
        $this->form_validation->set_rules(
            'role',
            'Nama Role',
            'required|min_length[6]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Nama Role Harus di Isi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>Nama Role Terlalu Pendek</div>"
            ]
        );


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Role - Ecommerce Admin';
            $data['heading'] = 'Role';
            $data['subview'] = 'admin/role/index';
            $data['role'] = $this->ModelRole->findAll();
            $this->load->view('admin/_layout', $data);
        } else {
            $role = $this->input->post('role');
            $result = $this->ModelRole->createRole($role);

            if ($result) {
                $this->session->set_flashdata('success_role', 'Role created successfully.');
            } else {
                $this->session->set_flashdata('error_role', 'Failed to create role.');
            }

            redirect('admin/role');
        }
    }

   

    public function edit()
    {
        $id = $this->uri->segment(4);
        $this->form_validation->set_rules(
            'role',
            'Nama Role',
            'required|min_length[6]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Nama Role Harus di Isi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>Nama Role Terlalu Pendek</div>"
            ]
        );

        if ($this->form_validation->run() != true) {
            $data['title'] = 'Role - Ecommerce Admin';
            $data['heading'] = 'Role';
            $data['subview'] = 'admin/role/edit';
            $data['role'] = $this->ModelRole->findById($id);
    
            $this->load->view('admin/_layout', $data);
        }else{
            $id_role = $this->input->post('role_id');
            $role = $this->input->post('role');

            $result = $this->ModelRole->updateRole($id_role, $role);

            if($result){
                $this->session->set_flashdata('success_role', 'Role updated successfully.');
            }else{
                $this->session->set_flashdata('error_role', 'Failed to update role.');
            }

            redirect('admin/role');
        }


       
    }

    public function delete($id)
    {
        $result = $this->ModelRole->deleteById($id);

        if ($result) {
            $this->session->set_flashdata('success_role', 'Role deleted successfully.');
        } else {
            $this->session->set_flashdata('error_role', 'Failed to delete role.');
        }

        redirect('admin/role');
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Role extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();
        cek_user();
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

        $this->form_validation->set_rules(
            'role',
            'Nama Role',
            'required|min_length[6]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Nama Role Harus di Isi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>Nama Role Terlalu Pendek</div>"
            ]
        );

        try {
            $id = $this->uri->segment(4);


            if (!is_numeric($id)) {
                throw new Exception('Invalid role ID');
            }

            $findById = $this->ModelRole->findById($id);

            if ($this->form_validation->run() != true) {
                $data['title'] = 'Role - Ecommerce Admin';
                $data['heading'] = 'Role';
                $data['subview'] = 'admin/role/edit';
                $data['role'] = $findById;

                $this->load->view('admin/_layout', $data);
            } else {
                $id_role = $this->input->post('role_id');
                $role = $this->input->post('role');

                $result = $this->ModelRole->updateRole($id_role, $role);

                if ($result) {
                    $this->session->set_flashdata('success_role', 'Role updated successfully.');
                    redirect("admin/role");
                } else {
                    $this->session->set_flashdata('error_role', 'Failed to update role.');
                    redirect("admin/role", 'refresh');
                }

                redirect('admin/role');
            }
        } catch (Exception $e) {
            $this->session->set_flashdata('error_role', $e->getMessage());
            redirect("admin/category", 'refresh');
        }
    }

    public function delete()
    {   
        try{
            $id = $this->uri->segment(4);

            if (!is_numeric($id)) {
                throw new Exception('Invalid Role ID');
            }


            $role = $this->ModelRole->findById($id);

            if(!$role){
                throw new Exception('Role not found');
            }

            $result = $this->ModelRole->deleteById($id);

            if($result){
                $this->session->set_flashdata('success_role', 'Role deleted successfully');

                redirect("admin/role");
            }else{
                $this->session->set_flashdata('error_role','Failed to delete role.');

                redirect("admin/role", 'refresh');
            }

            
        }catch(Exception $e){
            $this->session->set_flashdata('error_role', $e->getMessage());
            
            redirect("admin/role", 'refresh');
        }

    }
}

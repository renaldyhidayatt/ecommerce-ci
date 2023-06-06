<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        cek_login();
        cek_user();

        $this->load->model("ModelUser");
    }

    public function index()
    {

        $this->form_validation->set_rules(
            'firstname',
            'Firstname',
            'required|min_length[6]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Firstname Harus di Isi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>Firstname Terlalu Pendek</div>"
            ]
        );
        $this->form_validation->set_rules(
            'lastname',
            'Lastname',
            'required|min_length[6]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Lastname Harus di Isi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>Lastname Terlalu Pendek</div>"
            ]
        );
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|min_length[6]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Email Harus di Isi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>Email Terlalu Pendek</div>"
            ]
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|min_length[6]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Password Harus di Isi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>Password Terlalu Pendek</div>"
            ]
        );

        if ($this->form_validation->run() != true) {
            $data['title'] = 'User - Ecommerce Admin';
            $data['heading'] = 'User';
            $data['subview'] = 'admin/user/index';
            $data['user'] = $this->ModelUser->findAll();

            $this->session->set_flashdata('pesan', 'Proses Login User Berhasil');

            $this->load->view('admin/_layout', $data);
        } else {
            $firstname = $this->input->post('firstname');
            $lastname = $this->input->post('lastname');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            if ($this->ModelAuth->register($firstname, $lastname, $email, $password) == true) {
                $this->session->set_flashdata('success_user', 'Proses membuat User Berhasil');
                redirect("admin/user");
            } else {
                $this->session->set_flashdata('error_users', 'Error pembuatan users');
                redirect("admin/user", 'refresh');
            }
        }


   
    }

    public function edit()
    {

        $this->form_validation->set_rules(
            'firstname',
            'Firstname',
            'required|min_length[6]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Firstname Harus di Isi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>Firstname Terlalu Pendek</div>"
            ]
        );
        $this->form_validation->set_rules(
            'lastname',
            'Lastname',
            'required|min_length[6]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Lastname Harus di Isi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>Lastname Terlalu Pendek</div>"
            ]
        );
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|min_length[6]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Email Harus di Isi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>Email Terlalu Pendek</div>"
            ]
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|min_length[6]',
            [
                'required' => "<div class='alert alert-danger' role='alert'>Password Harus di Isi</div>",
                'min_length' => "<div class='alert alert-danger' role='alert'>Password Terlalu Pendek</div>"
            ]
        );
        $id = $this->uri->segment(4);

        if ($this->form_validation->run() != true) {
            $data['heading'] = 'User';
            $data['user'] = $this->ModelUser->findById($id);
            $data['subview'] = 'admin/user/edit';
            $this->load->view('admin/_layout', $data);
        } else {
            $id = $this->input->post('id');
            $firstname = $this->input->post('firstname');
            $lastname = $this->input->post('lastname');
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            if ($this->ModelUser->update($id, $firstname, $lastname, $email, $password) == true) {

                $this->session->set_flashdata('success_user', 'Proses update User Berhasil');
                redirect("admin/user");
            } else {
                $this->session->set_flashdata('error_users', 'Error update users');
                redirect("admin/user", 'refresh');
            }
        }
    }

    public function laporan_user_pdf()
	{
		$this->load->library('Dompdf_gen');

		$data['user'] = $this->ModelUser->findAll();

		$this->load->view('admin/user/export_pdf', $data);

		$paper = 'A4';
		$orien = 'landscape';
		$html = $this->output->get_output();
		
		$this->dompdf->set_paper($paper, $orien);
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream('laporan_data_user.pdf');
	}

    public function export_excel(){
        $data = array(
			'title' => 'Laporan User',
			'user' =>  $this->ModelUser->findAll()
		);
		
		$this->load->view('admin/user/export_excel_user', $data);
    }

    public function delete(){
        $id = $this->uri->segment(4);

        $this->ModelUser->deleteUser($id);

        redirect('admin/user');
    }
}

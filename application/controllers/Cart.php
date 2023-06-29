<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Cart extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $data['subview'] = 'cart/index';
        $user_id = $this->session->userdata('user_id');
        $data['cart'] = $this->ModelCart->findByUserId($user_id);
       
       

        $this->load->view('_layout', $data);
    }

    public function create()
    {
        $nama = $this->input->post('name');
        $price = $this->input->post('price');
        $image_product = $this->input->post('image_product');
        $quantity = $this->input->post('quantity');
        $product_id = $this->input->post('product_id');

        $user_id = $this->session->userdata('user_id');
        $email = $this->session->userdata('email');

        $result = $this->ModelCart->createCart($nama, $price, $image_product, $quantity, $user_id, $email, $product_id);

        if ($result != true) {
            $this->session->set_flashdata('pesan', 'Proses membuat Cart Berhasil');
            redirect("home");
        } else {
            $this->session->set_flashdata('error', 'Error membuat cart');
            redirect("home");
        }
    }

    public function delete(){
        $id = $this->uri->segment(3);
        $result = $this->ModelCart->deleteCart($id);

        if($result){
            redirect("cart", 'refresh');
        }else{
            
            redirect("cart", 'refresh');
        }
    }
}
